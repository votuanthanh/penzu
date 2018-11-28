<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Validator;

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
        Validator::extend('email_input', function ($attr, $value){
            return preg_match(' /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $value);
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
