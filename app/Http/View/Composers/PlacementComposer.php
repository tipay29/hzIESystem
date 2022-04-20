<?php


namespace App\Http\View\Composers;



use App\Models\Placement;
use Illuminate\View\View;

class PlacementComposer
{

    public function compose(View $view){
        $view->with('placements', Placement::all());

    }

}
