<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsNotBusinessUser
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
        if($request->user()->isBusinessUser()) {
            return back()->with('notice', 'this action is not allowed');
        }

        return $next($request);
    }
}
