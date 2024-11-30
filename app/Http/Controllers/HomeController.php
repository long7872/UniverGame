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
        $categories = DB::table('categories')
            ->select('category_id','name','descrip')
            ->orderByRaw("CASE WHEN name = 'All' THEN 0 ELSE 1 END")
            ->orderBy('name')
            ->limit(15) // Giới hạn chỉ 15 mục
            ->get();
        $newests = Game::orderBy('game_id', 'desc')->take(24)->get();
        return view('index', compact('mostPlayedGame', 'categories', 'newests'));
    }

    // public function update()
    // {
    //     // Lấy tất cả các games
    //     $games = Game::orderBy('game_id', 'desc')->take(24)->get();

    //     // Lặp qua từng game và cập nhật imagePath
    //     foreach ($games as $index => $game) {
    //         $imagePath = 'download (' . ($index + 1) . ').jpg'; // Tạo tên file ảnh
    //         $game->update(['imagePath' => $imagePath]); // Cập nhật cột imagePath
    //     }
    // }
}
