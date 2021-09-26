<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == 'model') {
            session(['usertype' => 'model']);
        } elseif ($usertype == 'fan') {
            session(['usertype' => 'fan']);
        } elseif ($usertype == 'admin') {
            session(['usertype' => 'admin']);
        }
        return $next($request);
    }
}