<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    //

    public function index($game_id)
    {
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
        return view('games', compact('game', 'relatedGames', 'controlTypes', 'sameControlGames'));
    }

    public function filterByCategory($category_id)
    {
        if ($category_id === '1') {
            $games = Game::orderBy('game_id', 'desc')->take(24)->get(); // Lấy tất cả game nếu chọn "All"
        } else if ($category_id === 'most') {
            $games = Game::orderBy('total_plays', 'desc')->take(24)->get();
        } else {
            $query = Game::orderBy('game_id', 'desc');
            $games = $query->where('category_id', $category_id)->take(24)->get(); // Lọc game theo category
        }

        // Trả về danh sách game dưới dạng JSON
        return response()->json($games);
    }

    public function paging($category_id, $page)
    {
        if (!is_numeric($page) || $page <= 0) {
            return response()->json(['error' => 'Invalid page number'], 400);
        }

        $perPage = 24; // Số item mỗi trang

        if ($category_id === '1') {
            $query = Game::orderBy('game_id', 'desc');
        } else if ($category_id === 'most') {
            $query = Game::orderBy('total_plays', 'desc');
        } else {
            $query = Game::orderBy('game_id', 'desc');
            $query->where('category_id', $category_id);
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
