<?php

namespace App\Http\Middleware;

use Closure;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @throws \App\Exceptions\HackerAlertException
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (in_array(auth()->user()->email, config('blog.admins'))) {
                dd('You are an Administrator');
            } else {
                dd('You are not an admin');
            }
        } else {
            dd('Please Log In');
        }
        return $next($request);
    }
}
