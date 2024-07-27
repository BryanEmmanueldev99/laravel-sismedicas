<?php


namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *Ñ
     * @return void
     */
    public function boot()
    {
        //por defecto siempre tendra esta longitud de texto
       Schema::defaultStringLength(191);
        
    }
}
