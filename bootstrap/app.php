<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Middleware\CheckPermission;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(fn($request) => route('login'));
        $middleware->redirectUsersTo(fn($request) => route('admin.moderator.index'));
        
        // Register the CheckPermission middleware alias
        $middleware->alias([
            'check.permission' => CheckPermission::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e) {
            if ($e instanceof AuthorizationException || $e instanceof AccessDeniedHttpException) {
                if (request()->expectsJson()) {
                    return response()->json([
                        'message' => 'Unauthorized. Insufficient permissions.',
                    ], Response::HTTP_FORBIDDEN);
                }
                
                return redirect()
                    ->route('admin.login')
                    ->with('error', 'You do not have permission to access this resource.');
            }
        });
    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->command('scrape:prices')->daily();
    })
    ->create();
