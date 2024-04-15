<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
               // Verifica si el usuario está autenticado
            if (!Auth::check()) {
                return redirect()->route('login');
            }

            // Obtiene el usuario autenticado
            $user = Auth::user();

            // Verifica si el usuario tiene el rol de administrador (role_id = 1) o de coordinador (role_id = 2)
            if ($user->role_id != 1 && $user->role_id != 2) {
                // Si el usuario no tiene el rol adecuado, redirige o muestra un mensaje de error
                return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta página.');
            }

            // Si el usuario tiene el rol adecuado, permite el acceso a la ruta solicitada
            return $next($request);
        }
}

