<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GameStop
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $general = gs();
        $game_setting = $general->game_setting;
        $url = $request->url();
        $slug = basename($url);
        if($game_setting == 1 ) {
            if($slug != 'close') {
                return to_route('close');
            } else {
                return $next($request);
            }
        } else {
            if($slug == 'close') {
                return to_route('home');
            } else {
                return $next($request);
            }
        }
    }
}
