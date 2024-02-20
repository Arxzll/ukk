<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{

    if ($this->auth->check()) {
        if($this->auth->user()->sign_up_complete == 1){
            return redirect('/');
        } else {
            if($this->auth->user()->step_one_complete == 0){
                return redirect('/register/step-1');
            } elseif($this->auth->user()->step_two_complete == 0){
                return redirect('/register/step-2');
            } else {
                return redirect('/');
            }
        }
    }

    return $next($request);
}
}
