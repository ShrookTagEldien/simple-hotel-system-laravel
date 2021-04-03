<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Manager;

use App\Observers\UserObserver;
use App\Observers\ManagerObserver;
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
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::enableForeignKeyConstraints();
        User::observe(UserObserver::class);
        //Manager::observe(ManagerObserver::class);


    }
}
