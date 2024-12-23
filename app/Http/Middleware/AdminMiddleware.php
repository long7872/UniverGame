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
        if (!Auth::check()) {
            return redirect(route('auth.login'))->with('error', 'You must be logged in to access this page.');
        }
        // Kiểm tra nếu user là admin
        if (Auth::user()->privilege) {
            return $next($request);
        }

        // Nếu không phải admin, chuyển hướng hoặc trả lỗi
        return redirect()->intended('index')->with('error', 'Access denied. Admins only.');
    }
}
