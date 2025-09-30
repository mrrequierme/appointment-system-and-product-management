<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

// In bootstrap/app.php, inside ->withMiddleware():

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  The required role (e.g. "admin" or "user")
     */
   public function handle(Request $request, Closure $next, string $roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        $allowedRoles = explode('|', $roles);

        if (in_array($userRole, $allowedRoles)) {
            return $next($request);
        }
        
        return redirect()->route(
            in_array($userRole, ['admin', 'staff'])
                ? 'admin.appointments.index'
                : 'user.appointments.index'
        )->with('error', 'You are not authorized to access that page.');
    }
}
