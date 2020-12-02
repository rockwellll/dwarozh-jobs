<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RemoveEmptyQueryParams
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

        if (empty($request->query('category'))) {
            $request->query->remove('category');
        }

        if (is_null($request->query('location'))) {
            $request->query->remove('location');
        }

        return $next($request);
    }
}
