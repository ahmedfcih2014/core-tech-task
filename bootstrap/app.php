<?php

use App\Exceptions\Forbidden;
use App\Exceptions\Unauthorized;
use App\Exceptions\ValidationErrors;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withEvents(discover: [
        __DIR__ . '/../app/Listeners',
    ])
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->report(function (Unauthorized $exception) {
            return $exception->render();
        })->stop();
        $exceptions->report(function (Forbidden $exception) {
            return $exception->render();
        })->stop();
        $exceptions->report(function (ValidationErrors $exception) {
            return $exception->render();
        })->stop();
    })
    ->create();
