<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\IsRevisor;
use App\Http\Middleware\SetLocaleMiddleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware){

        // middleware per impostare la lingua (richiamiamo il metodo web() con opzione append per aggiungere il nostro middleware alle rotte esistenti)
        $middleware->web(append: [SetLocaleMiddleware::class]);

        // middleware per verificare se l'utente loggato ha il ruolo di revisore
        $middleware->alias(['isRevisor'=> IsRevisor::class]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
