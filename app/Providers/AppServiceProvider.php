<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('routeactive', function ($route){
            // метод для Blade который будет подставлять PHP код в шаблон index для добавления active в класс
            return "<?php echo
            Route::currentRouteNamed($route) ? 'active' : ' '
            ?>";
        });

        Blade::if('admin', function (){
           return Auth::user()->isAdmin();
        });
    }
}
