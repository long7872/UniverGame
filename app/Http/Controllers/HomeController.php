<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        $mostPlayedGame = Game::orderBy('total_plays', 'desc')->take(6)->get();
        $categories = Category::withCount('games') // Đếm số game trong mỗi danh mục
            ->orderByRaw("CASE WHEN name = 'All' THEN 0 ELSE 1 END")
            ->orderByDesc('games_count') // Sắp xếp giảm dần theo số lượng game
            ->orderBy('name') // Sắp xếp theo tên
            ->limit(15) // Giới hạn 15 mục
            ->get();
        $newests = Game::orderBy('game_id', 'desc')->take(24)->get();
        return view('index', compact('mostPlayedGame', 'categories', 'newests'));
    }

}
