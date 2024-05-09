<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfPlayGame
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
       /* $guards = empty($guards) ? [null] : $guards;
        
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);*/

        if(isset($_COOKIE['userData']) && $_COOKIE['userData'] ) {
            return to_route('playgame');
        } else {
            $url = $request->url();
            $slug = basename($url);
            if($request->hasCookie('pointtype') ) {
                $typeDataArray = json_decode( $request->cookie('pointtype') ,true);
                
                
                $type = (isset($typeDataArray['type']) &&  $typeDataArray['type'] !="") ? $typeDataArray['type'] : '';
                if($type !="" && $slug != $type) {
                    return to_route($type);
                } else {
                    return $next($request);
                }
            } else {
                $slugArray = array('missed','saved','goal');
                if(!in_array($slug,$slugArray)) {
                    return $next($request);
                } else {
                   return to_route('home');  
                }
            }
        }
    }
}
