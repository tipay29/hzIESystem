<?php


namespace App\Http\View\Composers;



use App\Models\FabricColor;
use App\Models\FabricType;
use Illuminate\View\View;

class FabricTypeComposer
{

    public function compose(View $view){
        $view->with('fabric_types', FabricType::all());

    }

}
