<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // dd(Auth::user());
        if (!auth('sanctum')->check()) {
            return response()->json(['message' => 'Not Authorized'], 401);
        }
    
        $user = auth('sanctum')->user();
        if (!$user || !in_array($user->role, $roles)) {
            return response()->json(['message' => 'You have no permission to make this request!'], 403);
        }
    
        return $next($request);
    }
}
