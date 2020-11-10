<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Validator;

use Closure;

class CheckLogin
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
        if ($request->session()->exists('key_login')) {
            return $next($request);
        } else {
            return redirect('login');
        }
    }
}
