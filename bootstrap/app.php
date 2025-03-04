<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (AuthenticationException $exception, Request $request) {

            if (request()->wantsJson()) {
                $response = [
                    'success' => false,
                    'data' => $exception,
                    'message' => 'Unauthenticated !'
                ];

                return response()->json($response, 401);
            }

            $segment = $request->segment(1);
            if ($segment == 'administration-dashboard') {
                return response()->redirectTo(route('admin.auth.lock'));
            }

            if ($segment != 'admin') {
                return response()->redirectTo(route('site.welcome'));
            }


        });

        $exceptions->render(function (UnauthorizedException $exception, Request $request) {

            if (request()->wantsJson()) {
                $response = [
                    'success' => false,
                    'data' => $exception,
                    'message' => 'Unauthorized !'
                ];

                return response()->json($response, 403);
            }

            $segment = $request->segment(1);
            if ($segment === 'admin') {
                return response()->redirectTo('/adminlockscreen');
            }

            if ($segment != 'admin') {
                return response()->redirectTo('/login');
            }


        });
    })->create();
