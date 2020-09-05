<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->route()->parameter('locale');

        if (! in_array($locale, ['en', 'ku'])) {
            abort(404);
        }

        App::setLocale($locale);

        return $next($request);
    }
}
