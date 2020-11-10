<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Validator;

use Closure;

class CheckNails
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
            if ($request->session()->get('key_login')->level == 8 || $request->session()->get('key_login')->level == 0)
                return $next($request);
        }
        return abort(404);
    }
}
