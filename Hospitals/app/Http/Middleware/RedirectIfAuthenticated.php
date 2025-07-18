<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        if(auth('admin')->check())
        {
            return redirect(RouteServiceProvider::ADMIN);
        }

        if(auth('doctor')->check())
        {
            return redirect(RouteServiceProvider::DOCTOR);
        }

         if(auth('ray_employee')->check())
        {
            return redirect(RouteServiceProvider::RAYEMPLOYEE);
        }

         if(auth('web')->check())
        {
            return redirect(RouteServiceProvider::HOME);
        }


        return $next($request);
    }
}
