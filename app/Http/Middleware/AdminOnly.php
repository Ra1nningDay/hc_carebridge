<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        // เพิ่ม log เพื่อตรวจสอบการทำงานของ Middleware
        Log::info('AdminOnly middleware called.');

        if (Auth::check() && Auth::user()->roles->contains('name', 'admin')) {
            return $next($request);
        }

        return redirect()->route('welcome');
    }
}
