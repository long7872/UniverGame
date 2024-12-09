<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu user đã đăng nhập và có quyền admin
        if (Auth::check() && Auth::user()->privilege) {
            return $next($request); // Cho phép truy cập
        }

        // Nếu không phải admin, chuyển hướng hoặc trả lỗi
        return redirect('/')->with('error', 'Access denied. Admins only.');
    }
}
