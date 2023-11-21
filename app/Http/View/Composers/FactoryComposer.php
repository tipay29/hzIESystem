<?php


namespace App\Http\View\Composers;



use App\Models\Factory;
use Illuminate\View\View;

class FactoryComposer
{

    public function compose(View $view){
        $view->with('factory', Factory::first());
    }

}
