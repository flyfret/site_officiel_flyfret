<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Vérifier le rôle de l'utilisateur connecté
        $user = Auth::user();

        // Si le rôle ne correspond pas, redirige vers une autre page (par exemple, une page d'erreur)
        if ($role === 'logisticien' && !isset($user->password_logist)) {
            return redirect()->route('login');
        }

        if ($role === 'admin' && !isset($user->password_admin)) {
            return redirect()->route('login');
        }

        if ($role === 'comptable' && !isset($user->Password_compta)) {
            return redirect()->route('login');
        }

        // Si l'utilisateur a le bon rôle, continue avec la requête
        return $next($request);
    }
}