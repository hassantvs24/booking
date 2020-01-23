<?php

namespace App\Providers;

use App\TempBook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        //
        Schema::defaultStringLength(191);

        view()->composer('*', function(View $view) {

            if (!Cookie::get('unique_session')) {
                $random = bcrypt(Str::random(20).date('Y-m-d H:i:s'));
                Cookie::queue('unique_session', $random, 4320);
            }

            $uniq_value = Cookie::get('unique_session');

            $temp_cart = TempBook::where('uniqValue', $uniq_value)->get();
            $view->with('temp_cart', $temp_cart);
        });
    }
}
