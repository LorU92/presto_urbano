<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{

        // recupera il linguaggio della sessione preferito - default italiano
        $localeLanguage = session('locale', 'it');
        // metodo che imposta la lingua corrente sulla lingua scelta
        App::setLocale($localeLanguage);
        // ritorna la richiesta per proseguire il flusso per la rotta e il controller
        return $next($request);



        return $next($request);
    }
}
