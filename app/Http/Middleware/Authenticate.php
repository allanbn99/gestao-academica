<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException|ValidationException
     */
    public function handle($request, \Closure $next, ...$guards)
    {
        if (!is_null(Auth::user()) && !Auth::user()->is_activated) {


            if (Hash::check('default', Auth::user()->password)) {
                Auth::logout();
                return redirect()->route('password.request')->with('status', trans('auth.passwordDefault'));
            }

            Auth::logout();
            throw ValidationException::withMessages([
                'email' => [trans('auth.activated')],
            ]);
        }

        $this->authenticate($request, $guards);

        return $next($request);
    }
}
