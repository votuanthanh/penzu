<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        DB::beginTransaction();
        try {
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        DB::listen(function ($query) {
            \Log::info('QUERY: ' . $query->sql . 'TIME: ' . $query->time);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
