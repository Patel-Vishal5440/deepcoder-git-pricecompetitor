<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        if (!$request->user()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthenticated.',
                ], 401);
            }
            return redirect()->route('admin.login');
        }
        if (!$request->user()->hasPermission($permission)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Forbidden. Insufficient permissions.',
                ], 403);
            }
            
            return redirect()
                ->back()
                ->with('error', 'You do not have permission to access this resource.');
        }

        return $next($request);
    }
}
