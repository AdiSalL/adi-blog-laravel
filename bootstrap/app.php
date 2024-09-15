<?php

use App\Http\Middleware\AlreadyLoggedIn;
use App\Http\Middleware\AuthCheck;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->appendToGroup("user-auth", [
            AuthCheck::class,
        ]);

        $middleware->appendToGroup("user-loggedin", [
            AlreadyLoggedIn::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
