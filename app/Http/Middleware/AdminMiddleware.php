<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Tài khoản không có quyền');
    }
}