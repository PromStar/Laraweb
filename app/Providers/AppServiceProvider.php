<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Artisan;
use File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      if (File::exists(storage_path() . '/framework/.install') && File::exists(base_path() . '/.env')) {

         Artisan::call('key:generate');
         Artisan::call('migrate');

         if (!File::exists(public_path() . '/storage'))
            Artisan::call('storage:link');

         Artisan::call('db:seed');
         Artisan::call('translations:import');
         File::delete(storage_path() . '/framework/.install');
      }
    }
}
