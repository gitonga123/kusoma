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
            if (auth()->user()->isAdmin()) {
                return $next($request);
            } else {
                session()->flash('error', 'You are not authorized to perform this action');
                redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
}
