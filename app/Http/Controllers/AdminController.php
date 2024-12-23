<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Category;
use App\Models\Control_Type;
use App\Models\User;
use App\Models\User_Game;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    //
    public function managementUser()
    {

        $users = User::select('user_id', 'auth_provider', 'imagePath', 'name', 'created_at', 'privilege', 'status')->paginate(10);

        // dd($users);
        return view('admin.managermentUser', compact('users'));
    }

    public function exportUsers()
    {

        $headings = [
            'UserID',
            'Privilege',
            'Username',
            'Authentication Provider',
            'Email',
            'Name',
            'Image Path',
            'Gender',
            'Date of Birth',
            'Language',
            'Status',
            'Created At',
        ];
        $users = User::select('user_id', 'privilege', 'username', 'auth_provider', 'email', 'name', 'imagePath', 'gender', 'dateOfBirth', 'language', 'status', 'created_at')
            ->get();
        return Excel::download(new UsersExport($headings, $users), 'users.xlsx');
    }

    public function uploadGame() {

        $control_types = Control_Type::select('control_type_id', 'name')->get();
        $categories = Category::where('category_id', '!=', 1)->select('category_id', 'name')->get();

        return view('admin.uploadGame', compact('control_types', 'categories'));

    }

    public function reportGame() {

        $reports = User_Game::whereNotNull('report')->with(['user', 'game'])
        ->paginate(1); // Hiển thị 10 bản ghi mỗi trang

        // dd($reports);
        return view('admin.report', compact('reports'));

    }

}
