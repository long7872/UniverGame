<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\User_Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use ZipArchive;

class GameController extends Controller
{
    //

    public function index($game_id)
    {
        if (Auth::check()) {
            $user_id = auth()->id();

            $user_game = User_Game::where([
                ['user_id', $user_id],
                ['game_id', $game_id]
            ])->first();

            if (!$user_game) {
                $new_user_game = new User_Game();
                $new_user_game->user_id = $user_id;
                $new_user_game->game_id = $game_id;
                $new_user_game->timestamps = now();

                $new_user_game->save();
            }
        }

        $game = Game::find($game_id);
        if ($game) {
            $game->increment('total_plays'); // Tăng total_plays lên 1 và tự động lưu lại
        }

        $query = Game::where('game_id', '!=', $game->game_id)
            ->where('category_id', $game->category_id)
            ->take(12); // Cùng thể loại
        $relatedGames = $query->orderBy('total_plays', 'desc')->get();

        $controlTypes = $game->controls()
            ->with('controlType')
            ->get()
            ->map(function ($control) {
                return $control->controlType; // Trích xuất controlType từ mỗi control
            });

        // Lấy danh sách controlType ID
        $controlTypeIds = $controlTypes->pluck('control_type_id')->toArray();
        // Truy vấn các game có chung controlType
        $sameControlGames = Game::where('game_id', '!=', $game->game_id) // Đặt điều kiện loại bỏ game hiện tại trước
            ->whereHas('controls', function ($query) use ($controlTypeIds) {
                $query->whereIn('control_type_id', $controlTypeIds);
            })
            ->orderBy('total_plays', 'desc')
            ->take(12) // Giới hạn số lượng kết quả
            ->get();

        $userStatus = null;
        if (auth()->check()) {
            $userStatus = DB::table('user__games')
                ->where('user_id', auth()->id())
                ->where('game_id', $game_id)
                ->select('like_dislike', 'bookmark')  // Chọn cả 2 cột
                ->first();  // Lấy bản ghi đầu tiên
        }
        return view('main.games', compact('game', 'relatedGames', 'controlTypes', 'sameControlGames', 'userStatus'));
    }

    public function uploadGamePost(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:40',
            'descrip' => 'required|string|max:1000',
            'control_types' => 'required|array|min:1',
            'control_types.*' => 'exists:control__types,control_type_id', // Kiểm tra tồn tại
            'category' => 'required|exists:categories,category_id',
            'gamePath' => 'nullable|file|mimes:zip|max:153600', // Tối đa 150 MB
            'imagePath' => 'nullable|image|mimes:jpg,jpeg,png|max:8192', // Tối đa 2 MB
        ]);

        $game = new Game();
        $game->name = $request->name;
        $game->descrip = $request->descrip;
        $game->category_id = $request->category;
        // Image
        $imageName = time() . '.' . $request->imagePath->extension();
        // Lưu ảnh vào thư mục public/storage/images
        $request->imagePath->move(public_path('storage/gameImages'), $imageName);
        $game->imagePath = $imageName;
        // Game
        $game->gamePath = $this->getGamePath($request);
        // Time
        $game->timestamps = now();

        if ($game->save()) {
            return redirect()->back()->with('success', 'Game uploaded successfully!');
        } else {
            return redirect()->back()->with('error', 'Game uploaded failed!');
        }
    }

    public function rating($game_id, $action)
    {
        // Check and take
        $user_id = auth()->id();
        $user_game = User_Game::where([
            ['user_id', $user_id],
            ['game_id', $game_id]
        ])->first();
        // Nếu bản ghi không tồn tại, trả về lỗi
        if (!$user_game) {
            return response()->json(['success' => false, 'message' => 'User record not found for this game.'], 404);
        }
        $game = Game::findOrFail($game_id);

        $status = $user_game->like_dislike;
        // Xử lý thích hoặc không thích
        if ($action == 1) {
            $user_game->like_dislike = 1;
            if ($status === 0) {
                $game->increment('total_likes');
            } else if ($status === -1) {
                $game->decrement('total_dislikes');
                $game->increment('total_likes');
            }
            $message = 'You liked this game!';
        } else if ($action == -1) {
            $user_game->like_dislike = -1;
            if ($status === 0) {
                $game->increment('total_dislikes');
            } else if ($status === 1) {
                $game->increment('total_dislikes');
                $game->decrement('total_likes');
            }
            $message = 'You disliked this game!';
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid action.']);
        }
        // Rating
        $total = $game->total_likes + $game->total_dislikes;
        $rate = $game->total_likes / $total * 5;
        $game->rating = $rate;

        // Save
        $user_game->save();
        $game->save();

        // Trả về phản hồi thành công
        return response()->json(['success' => true, 'message' => $message]);
    }

    public function report(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validatedData = $request->validate([
            'gameId' => 'required|integer|exists:games,game_id', // Kiểm tra gameId có tồn tại không
            'report' => 'required|string|in:bug,harmful,illegal',
        ]);

        $user_id = auth()->id();
        $game_id = $validatedData['gameId'];
        $report = $validatedData['report'];

        Log::info('User ID: ' . $user_id);
        Log::info('Game ID: ' . $game_id);
        Log::info('Report: ' . $report);

        $user_game = User_Game::where([
            ['user_id', $user_id],
            ['game_id', $game_id]
        ])->first();
        // Nếu bản ghi không tồn tại, trả về lỗi
        if (!$user_game) {
            return response()->json(['success' => false, 'message' => 'User record not found for this game.'], 404);
        }

        $user_game->report = $report;

        $user_game->save();

        return response()->json(['message' => 'Report submitted successfully!']);
    }

    public function bookmark($game_id, $action)
    {
        $user_id = auth()->id();

        $user_game = User_Game::where([
            ['user_id', $user_id],
            ['game_id', $game_id]
        ])->first();
        // Nếu bản ghi không tồn tại, trả về lỗi
        if (!$user_game) {
            return response()->json(['success' => false, 'message' => 'User record not found for this game.'], 404);
        }

        if ($action == 1) {
            $user_game->bookmark = true;
            $message = 'You have successfully marked this game.';
        } else if ($action == 0) {
            $user_game->bookmark = false;
            $message = 'You have successfully unmarked this game.';
        }

        // Save
        $user_game->save();

        return response()->json(['success' => true, 'message' => $message]);
    }

    public function logTime(Request $request)
    {
        $data = $request->all();

        if (empty($data)) {
            // Manually decode raw input
            $data = json_decode($request->getContent(), true);
        }

        // Validate the data
        $validator = Validator::make($data, [
            'game_id' => 'required|numeric',
            'time_spent' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid input'], 400);
        }

        $user_id = auth()->id();

        $user_game = User_Game::where([
            ['user_id', $user_id],
            ['game_id', $data['game_id']],
        ])->first();

        $user_game->playtime += $data['time_spent'];
        $user_game->save();

        // Log::info('Playtime updated:', ['user_game' => $user_game]);
    }

    public function filterByCategory($category_id)
    {
        if ($category_id === '1') {
            $games = Game::orderBy('rating', 'desc')
                ->orderBy('game_id', 'desc')->take(24)->get(); // Lấy tất cả game nếu chọn "All"
        } else if ($category_id === 'most') {
            $games = Game::orderBy('total_plays', 'desc')
                ->orderBy('rating', 'desc')->take(24)->get();
        } else {
            $query = Game::orderBy('rating', 'desc')
                ->orderBy('game_id', 'desc');
            $games = $query->where('category_id', $category_id)->take(24)->get(); // Lọc game theo category
        }

        // Trả về danh sách game dưới dạng JSON
        return response()->json($games);
    }

    public function filterByName(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);
        $query = $request->input('query'); // Lấy từ khóa tìm kiếm
        $games = Game::where('name', 'LIKE', '%' . $query . '%')->paginate(24); // Tìm kiếm và phân trang
        // dd($games);

        return view('main.searchview', compact('games', 'query'));
    }


    public function paging($type, $id, $page)
    {
        if (!is_numeric($page) || $page <= 0) {
            return response()->json(['error' => 'Invalid page number'], 400);
        }

        $perPage = 24; // Số item mỗi trang

        if ($type === "category") {
            if ($id === '1') {
                $query = Game::orderBy('rating', 'desc')->orderBy('game_id', 'desc');
            } else if ($id === 'most') {
                $query = Game::orderBy('total_plays', 'desc')->orderBy('rating', 'desc');
            } else {
                $query = Game::orderBy('rating', 'desc')->orderBy('game_id', 'desc');
                $query->where('category_id', $id);
            }
        }
        if ($type === "user") {
            // Kiểm tra nếu người dùng tồn tại
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            // Truy vấn game của user
            $query = $user->games()
                ->orderBy('user__games.updated_at', 'desc') // Sắp xếp theo updated_at giảm dần
                ->select('user__games.game_id', 'games.name', 'games.imagePath', 'games.rating'); // Chọn cột cần thiết
        }
        if ($type === "bookmark") {
            // Kiểm tra nếu người dùng tồn tại
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            // Truy vấn game của user
            $query = $user->games()
                ->where('user__games.bookmark', true)  // Lọc game đã được đánh dấu bookmark
                ->orderBy('user__games.updated_at', 'desc') // Sắp xếp theo updated_at giảm dần
                ->select('user__games.game_id', 'games.name', 'games.imagePath', 'games.rating'); // Chọn các cột cần thiết

        }

        $games = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'data' => $games->items(),
            'current_page' => $games->currentPage(),
            'last_page' => $games->lastPage(),
            'total' => $games->total(),
        ]);
    }

    public function update()
{
    $perPage = 24;
    $page = 1;

    // Lặp qua tất cả các trang
    do {
        // Lấy các game từ trang hiện tại
        $games = Game::whereNotIn('game_id', [1, 2, 3])->paginate($perPage, ['*'], 'page', $page);

        // Lặp qua từng game trong trang hiện tại
        foreach ($games->items() as $index => $game) {
            $imagePath = 'download (' . (($index + 12) % 24) . ').jpg'; // Tạo tên file ảnh
            // dd($imagePath); // Kiểm tra giá trị của imagePath
            $game->imagePath = $imagePath;
            $game->save();
        }

        // Tăng số trang lên 1
        $page++;
    } while ($games->hasMorePages()); // Lặp cho đến khi hết các trang
}


    public function getGamePath($request)
    {
        // Kiểm tra xem file đã được gửi lên chưa
        if (!$request->hasFile('gamePath')) {
            return redirect()->back()->with('error', 'Not received file');
        }

        $file = $request->file('gamePath');

        // Kiểm tra định dạng file (zip)
        if ($file->getClientOriginalExtension() !== 'zip') {
            return redirect()->back()->with('error', 'Only zip files are allowed');
        }

        // Tạo thư mục lưu trữ file tạm thời nếu chưa tồn tại
        $tempDir = public_path('storage/gameArchive');
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0755, true);
        }

        // Lưu file zip vào thư mục tạm thời
        $tempPath = $tempDir . '/' . $file->getClientOriginalName();
        $file->move($tempDir, $file->getClientOriginalName());

        // Giải nén file zip
        $zip = new ZipArchive;
        if ($zip->open($tempPath) === true) {
            $destinationPath = public_path('storage/game');

            // Tạo thư mục đích nếu chưa tồn tại
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Lấy danh sách thư mục trước khi giải nén
            $beforeExtraction = scandir($destinationPath);

            // Giải nén file zip
            $zip->extractTo($destinationPath);
            $zip->close();

            // Lấy danh sách thư mục sau khi giải nén
            $afterExtraction = scandir($destinationPath);

            // Tìm thư mục mới được thêm
            $newItems = array_diff($afterExtraction, $beforeExtraction);
            $newFolders = [];
            foreach ($newItems as $item) {
                if (is_dir($destinationPath . '/' . $item)) {
                    $newFolders[] = $item; // Lọc các mục là thư mục
                }
            }

            if (count($newFolders) === 1) {
                $extractedFolderName = $newFolders[0]; // Thư mục mới được giải nén
                $extractedFolderPath = $extractedFolderName . '/index.html';

                // dd($extractedFolderPath);
                return $extractedFolderPath;


                // Xóa file zip sau khi giải nén
                // unlink($tempPath);

                return redirect()->back()->with('success', 'File uploaded and extracted successfully. Extracted folder: ' . $extractedFolderName);
            } elseif (count($newFolders) > 1) {
                return redirect()->back()->with('error', 'Multiple folders were extracted. Please check the archive.');
            } else {
                return redirect()->back()->with('error', 'No new folder found after extraction.');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to open zip file');
        }
    }
}
