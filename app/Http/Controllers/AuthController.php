<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('main.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'password' => 'required',
        ]);

        $text = $request->input('text');

        // Tìm user qua email hoặc username
        $user = filter_var($text, FILTER_VALIDATE_EMAIL)
            ? User::where('email', $text)->first()
            : User::where('username', $text)->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Đăng nhập và sử dụng Remember Me nếu được chọn
            $remember = $request->has('remember');
            Auth::login($user, $remember);

            // Phân quyền
            if ($user->privilege) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->intended('/');;
            }
        }

        return redirect(route('login'))->with('error', 'Invalid credentials');
    }


    public function registerPost(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'verifypassword' => 'required|same:password',
        ]);
        $lastUser = User::orderBy('user_id', 'desc')->first();
        $userId = $lastUser ? $lastUser->user_id + 1 : 1; // Bắt đầu từ 0 nếu bảng trống

        $user = new User();
        $user->email = $request->email;
        $user->username = 'user' . $userId;
        $user->password = Hash::make($request->password);
        $user->timestamps = now();

        if ($user->save()) {
            return redirect(route('login'))->with('success', 'User created successfully');
        }
        return redirect(route('login'))->with('error', 'Failed to created account');
    }

    public function logout(Request $request)
    {
        // Xóa phiên đăng nhập
        Auth::logout();

        // Xóa dữ liệu session hiện tại
        $request->session()->invalidate();

        // Tạo lại token CSRF để bảo mật
        $request->session()->regenerateToken();

        // Chuyển hướng người dùng về trang chủ hoặc trang đăng nhập
        return redirect('/')->with('success', 'You have been logged out.');
    }

    public function authProviderRedirect($provider)
    {
        if ($provider) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    public function socialAuthenticate($provider)
    {
        try {
            if ($provider) {
                $social_user = Socialite::driver($provider)->user();
    
                $user = User::where('auth_provider_id', $social_user->getId())->first();
    
                if (!$user) {
                    $lastUser = User::orderBy('user_id', 'desc')->first();
                    $userId = $lastUser ? $lastUser->user_id + 1 : 1; // Bắt đầu từ 0 nếu bảng trống
    
                    $new_user = new User();
                    $new_user->username = 'user' . $userId;
                    $new_user->name = $social_user->getName();
                    $new_user->email = $social_user->getEmail();
                    $new_user->auth_provider = $provider;
                    $new_user->auth_provider_id = $social_user->getId();
                    $new_user->imagePath = $social_user->getAvatar();
                    $new_user->timestamps = now();
    
                    if ($new_user->save()) {
                        Auth::login($new_user, true);
                    } else {
                        return redirect(route('login'))->with('error', 'Failed to created account');
                    }
    
                } else {
                    Auth::login($user, true);
                }
                return redirect()->intended('/index');
            }
            abort(404);
        } catch (\Throwable $th) {
            Log::error('Social Authentication Failed', ['error' => $th->getMessage(), 'trace' => $th->getTraceAsString()]);
            return redirect(route('auth.login'))->with('error', 'Something went wrong! ' . $th->getMessage());
        }
    }
}
