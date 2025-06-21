<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as FacadesLog;
use Symfony\Component\HttpFoundation\Response;

class LogDebugMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        try {
            if (in_array($request->method(), ['POST', 'PUT', 'DELETE'])) {
                 Log::create([
                    'user_id' => Auth::id(),
                    'method' => $request->method(),
                    'route' => $request->path(),
                    'payload' => json_encode($request->all()),
                    'ip_address' => $request->ip(),
                ]);
            }
        } catch (\Throwable $e) {
            FacadesLog::error('Error guardando Log en DB: '.$e->getMessage());
        }

        return $response;

        return $next($request);
    }
}
