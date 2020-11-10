<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Validator;

use Closure;

class CheckTours
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
            if ($request->session()->get('key_login')->level == 9 || $request->session()->get('key_login')->level == 0)
                return $next($request);
        }
        // switch($request->session()->get('key_login')->level) {
        //     case 0:
        //         return redirect('admins');
        //     break;
        //     case 1:
        //         return redirect('ads');
        //     break;
        //     case 2:
        //         return redirect('users');
        //     break;
        //     case 3:
        //         return redirect('transports');
        //     break;
        //     case 4:
        //         return redirect('chats');
        //     break;
        //     case 5:
        //         return redirect('notifications');
        //     break;
        //     case 6:
        //         return redirect('landhouses');
        //     break;
        //     case 7:
        //         return redirect('recruitments');
        //     break;
        //     case 8:
        //         return redirect('nails');
        //     break;
        //     case 9:
        //         return redirect('tours');
        //     break;
        //     case 10:
        //         return redirect('shops');
        //     break;
        //     default:
        //         return abort(404);
        // }
        return abort(404);
    }
}
