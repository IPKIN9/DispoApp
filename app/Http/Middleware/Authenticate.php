<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $guard = null)
    {
        $appEnv = env('APP_ENV');
        if ($this->auth->guard($guard)->guest() && $appEnv !== 'local') {
            return response('Your client is unauthorized.', 401);
        }
        return $next($request);
    }
}
