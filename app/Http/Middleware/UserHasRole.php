<?php

namespace App\Http\Middleware;

use App\Exceptions\Forbidden;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = auth('sanctum')->user();
        if ($user && $user->role && $user->role->name === $role) return $next($request);
        throw new Forbidden("You don't have permission to access this resource");
    }
}
