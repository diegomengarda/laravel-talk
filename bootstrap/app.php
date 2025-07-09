<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__ . '/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        /*
        $exceptions->render(function (\Illuminate\Database\QueryException $e) {
        });
        $exceptions->render(function (\App\Exceptions\ApiException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status_code' => $e->getCode(),
                'internal_code' => $e->getInternalCode(),
            ], $e->getCode());
        });
        */
    })->create();
