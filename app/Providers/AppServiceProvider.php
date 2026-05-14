<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    
    // Il metodo boot() viene eseguito automaticamente quando Laravel avvia l’applicazione.
    public function boot(): void
    {
        if(Schema::hasTable('categories')){
            View::share('categories', Category::orderBy('name')->get());
        }

        Paginator::useBootstrapFive();
    }

}
