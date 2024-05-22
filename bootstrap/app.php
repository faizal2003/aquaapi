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
        'http://puh.web.id/sensor',
        'http://puh.web.id/sensor/ph',
        'http://puh.web.id/sensor/wl',
        'http://puh.web.id/man/ph',
        'http://puh.web.id/man/tds',
        'http://puh.web.id/man/turbid',
        'http://puh.web.id/man/temp',
        'http://puh.web.id/man/tem',
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();