<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Mymiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
         // Memeriksa apakah pengguna telah terotentikasi
         if (Auth::check()) {
            return $next($request);
        }

        return redirect()->route('login'); // Redirect jika pengguna tidak memiliki hak akses
    }
}
