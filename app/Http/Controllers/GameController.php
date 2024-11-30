<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //
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
}
