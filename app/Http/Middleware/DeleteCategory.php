<?php

namespace Desire2learn\Http\Middleware;

use Alert;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Desire2learn\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use Desire2Learn\Http\Middleware\DeleteCategory;

class DeleteCategory
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
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
        $user = $this->auth->user();

        if (is_null($user)) {
            return redirect()->guest('login');
        }

        if ($user->role_id == 1 || $user->role_id == 2) {
            Alert::error('You have no access to visit this page', 'Error');

            return redirect()->route('dashboard.home');
        }

        return $next($request);
    }
}
