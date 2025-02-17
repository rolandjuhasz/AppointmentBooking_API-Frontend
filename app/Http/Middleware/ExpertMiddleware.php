<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ExpertMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        
        if (!$user || $user->role !== 'expert') {
            return response()->json(['message' => 'Access denied'], 403);
        }

        return $next($request);
    }
}
