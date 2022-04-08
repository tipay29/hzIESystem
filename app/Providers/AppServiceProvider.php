<?php

namespace App\Providers;

use App\Http\View\Composers\BuildingComposer;
use App\Http\View\Composers\EmployeeComposer;
use App\Http\View\Composers\JobComposer;
use Illuminate\Support\Facades\View;
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
        View::composer(['auth.register','cut.create'],EmployeeComposer::class);
        View::composer('employee.form',JobComposer::class);
        View::composer('employee.form',BuildingComposer::class);
    }
}
