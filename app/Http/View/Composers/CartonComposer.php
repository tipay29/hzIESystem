<?php


namespace App\Http\View\Composers;



use App\Models\Carton;
use Illuminate\View\View;

class CartonComposer
{

    public function compose(View $view){
        $view->with('cartons', Carton::with('brand')->get());
    }

}
