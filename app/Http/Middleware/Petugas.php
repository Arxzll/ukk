<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;

class Petugas extends Middleware
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
    // Check if the user is authenticated
    if (Auth::user()->level) {
        // Check the user's level from the session
        $userLevel = session('level');

        // Check if the user has the required level
        if ($userLevel == 'petugas') {
            // User has the required level, proceed
            return $next($request);
        }
    }

    // User doesn't have the required level or is not authenticated, redirect or take other actions
    return redirect('/login')->with(['error' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
}

}    