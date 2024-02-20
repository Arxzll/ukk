<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Jika pengguna sudah login, lanjutkan ke rute berikutnya
            return $next($request);
        }

        // Jika pengguna belum login, redirect ke halaman login
        return redirect('/login')->with(['error' => 'Anda harus login untuk mengakses halaman ini.']);
    }
}
