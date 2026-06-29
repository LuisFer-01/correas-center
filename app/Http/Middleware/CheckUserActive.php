<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->estado !== 'activo') {
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['email' => 'Tu cuenta está inactiva. Contacta al administrador.']);
            }
        }

        return $next($request);
    }
}
