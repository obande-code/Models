<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAccept
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
            $accept = Auth::user()->isaccept;
            if ($accept != true) {
                session(['accept' => false]);
            }
            else {
                session(['accept' => true]);
            }
        }
        else {
            session(['accept' => true]);
        }
        return $next($request);
    }
}