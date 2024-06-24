<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $available_locales = ['es', 'en'];
        $param = $request->get('lang');
        $session = session()->has('lang') ? session()->get('lang') : 'en';
        $lang = in_array($param, $available_locales) ? $param : $session;
        App::setLocale($lang);
        session()->put('lang', $lang);
        return $next($request);
    }
}
