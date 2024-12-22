<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\User_Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
        // Lấy tất cả các games
        $games = Game::orderBy('game_id', 'desc')->paginate($perPage, ['*'], 'page', 3);

        // Lặp qua từng game và cập nhật imagePath
        foreach ($games as $index => $game) {
            $imagePath = 'download (' . (($index + 12) % 24) . ').jpg'; // Tạo tên file ảnh
            $game->update(['imagePath' => $imagePath]); // Cập nhật cột imagePath
        }
    }
}
