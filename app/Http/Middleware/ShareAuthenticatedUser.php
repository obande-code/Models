<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class ShareAuthenticatedUser
{
    /**
     * The View Factory.
     *
     * @var \Illuminate\Contracts\View\Factory
     */
    protected Factory $factory;

    /**
     * The Authenticated user, if any.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     */
    protected Authenticatable $user;

    /**
     * Create a new Share Authenticated User instance.
     *
     * @param  \Illuminate\Contracts\View\Factory  $factory
     * @param  \Illuminate\Contracts\Auth\Authenticatable|null  $user
     */
    public function __construct(Factory $factory, Authenticatable $user = null)
    {
        if (Auth::check()) {
            $this->factory = $factory;
            $this->user = $user;
        }
    }

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
            $this->factory->share('authenticated', $this->user);
        }

        return $next($request);
    }
}