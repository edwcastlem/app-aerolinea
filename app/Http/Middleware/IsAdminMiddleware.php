<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Solo el administrador puede ver la parte del backend
        $user = Auth::user();

        if ($user->rol->descripcion != 'Administrador' )
        {
            return redirect()->intended(route('index', absolute: false));
        }

        return $next($request);
    }
}
