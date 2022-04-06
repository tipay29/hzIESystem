<?php


namespace App\Http\View\Composers;


use App\Models\Building;
use App\Models\Job;
use Illuminate\View\View;

class BuildingComposer
{

    public function compose(View $view){
        $view->with('buildings', Building::all());
    }

}
