<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
        'https://puh.web.id/sensor',
        'https://puh.web.id/sensor/ph',
        'https://puh.web.id/sensor/wl',
        'https://puh.web.id/man/ph',
        'https://puh.web.id/man/tds',
        'https://puh.web.id/man/turbid',
        'https://puh.web.id/man/temp',
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();