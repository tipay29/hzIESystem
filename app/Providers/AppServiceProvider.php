<?php

namespace App\Providers;

use App\Http\View\Composers\BuildingComposer;
use App\Http\View\Composers\EmployeeComposer;
use App\Http\View\Composers\EmployeeRegisterComposer;
use App\Http\View\Composers\FabricCodeComposer;
use App\Http\View\Composers\FabricColorComposer;
use App\Http\View\Composers\FabricTypeComposer;
use App\Http\View\Composers\JobComposer;
use App\Http\View\Composers\PlacementComposer;
use App\Http\View\Composers\PurchaseOrderComposer;
use App\Http\View\Composers\StylePOComposer;
use App\Http\View\Composers\StyleComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        View::composer('auth.register',EmployeeRegisterComposer::class);
        View::composer(['cut.create','cut.edit'],EmployeeComposer::class);
        View::composer('employee.form',JobComposer::class);
        View::composer('employee.form',BuildingComposer::class);
        View::composer('style.form',FabricColorComposer::class);
        View::composer('style.form',FabricCodeComposer::class);
        View::composer('style.form',FabricTypeComposer::class);
        View::composer('style.form',PlacementComposer::class);
        View::composer('style.form',PurchaseOrderComposer::class);
        View::composer('style.form',StylePOComposer::class);
        View::composer(['cut.edit','cut.create'],StyleComposer::class);
    }
}
