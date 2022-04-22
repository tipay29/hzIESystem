<?php

namespace App\Providers;

use App\Http\View\Composers\BuildingComposer;
use App\Http\View\Composers\EmployeeComposer;
use App\Http\View\Composers\FabricCodeComposer;
use App\Http\View\Composers\FabricColorComposer;
use App\Http\View\Composers\FabricTypeComposer;
use App\Http\View\Composers\JobComposer;
use App\Http\View\Composers\PlacementComposer;
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
        View::composer('purchase-order.form',FabricColorComposer::class);
        View::composer('purchase-order.form',FabricCodeComposer::class);
        View::composer('purchase-order.form',FabricTypeComposer::class);
        View::composer('purchase-order.form',PlacementComposer::class);

    }
}
