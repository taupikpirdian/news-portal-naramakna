<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('X-API-Key');
        $validApiKey = env('CACHE_API_KEY');

        // Jika API key tidak di-set di env, bypass middleware (untuk development)
        if (empty($validApiKey)) {
            return $next($request);
        }

        // Validasi API key
        if ($apiKey !== $validApiKey) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized - Invalid API Key',
            ], 401);
        }

        return $next($request);
    }
}
