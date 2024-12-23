<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index($user_id)
    {
        $user = User::find($user_id);
        return view('user.profile', compact('user'));
    }

    public function setPassword(Request $request, $user_id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed', // Xác thực mật khẩu và sự trùng khớp
        ]);

        $user = User::findOrFail($user_id);
        $user->password = Hash::make($request->password); // Mã hóa mật khẩu
        $user->save();

        return redirect()->route('user.profile', ['id' => $user->user_id])->with('success', 'Password has been set successfully.');
    }

    public function uploadImage(Request $request, $user_id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:8192',
        ]);

        $user = User::findOrFail($user_id);;
        $imageName = time() . '.' . $request->image->extension();

        // Lưu ảnh vào thư mục public/storage/images
        $request->image->move(public_path('storage/images'), $imageName);

        // Cập nhật đường dẫn ảnh trong database
        $user->imagePath = $imageName;
        $user->save();

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('user.editprofile', compact('user'));
    }

    public function destroy($user_id)
    {

        // Logic để xóa tài khoản
        $user = User::findOrFail($user_id);
        $user->delete();

        // Redirect hoặc trả về thông báo
        return redirect()->back()->with('success', 'Account deleted successfully.');
    }

    public function showRecentGame($user_id)
    {
        // Lấy tất cả các game của user
        $user = User::find($user_id);

        if ($user) {
            $games = $user->games()
                ->orderBy('user__games.updated_at', 'desc') // Sắp xếp theo updated_at giảm dần
                ->select('user__games.game_id', 'name', 'games.imagePath', 'rating') // Chỉ lấy các cột cần thiết
                ->get(); // Trả về tất cả game của user
            return view('user.recent', compact('games'));
        }

        return redirect()->back()->with('error', 'User not found.'); // Trường hợp user không tồn tại
    }

    public function showBookmarkGame($user_id)
    {
        // Lấy tất cả các game của user
        $user = User::find($user_id);

        if ($user) {
            $games = $user->games()
                ->where('user__games.bookmark', true)
                ->orderBy('user__games.updated_at', 'desc') // Sắp xếp theo updated_at giảm dần
                ->select('user__games.game_id', 'name', 'games.imagePath', 'rating') // Chỉ lấy các cột cần thiết
                ->get(); // Trả về tất cả game của user
            return view('user.bookmark', compact('games'));
        }

        return redirect()->back()->with('error', 'User not found.'); // Trường hợp user không tồn tại
    }

    public function update(Request $request, $user_id)
    {
        // Lấy người dùng hiện tại
        $user = User::findOrFail($user_id);

        // Validate dữ liệu
        $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user_id . ',user_id',
            'gender' => 'nullable|in:-1,0,1',
            'date_of_birth' => 'nullable|date',
            'language' => 'nullable|string|max:50',
        ]);

        // Cập nhật từng thuộc tính
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->dateOfBirth = $request->input('date_of_birth');
        $user->language = $request->input('language');

        // Lưu dữ liệu vào database
        $user->save();
        // dd($user);
        // dd($request->all());
        // Redirect hoặc trả về phản hồi
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public static function getImage(User $user)
    {

        return $user->auth_provider != null ? $user->imagePath : asset('storage/images/' . $user->imagePath);
    }
}
