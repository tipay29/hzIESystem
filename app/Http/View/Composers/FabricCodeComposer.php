<?php


namespace App\Http\View\Composers;



use App\Models\FabricCode;
use Illuminate\View\View;

class FabricCodeComposer
{

    public function compose(View $view){
        $view->with('fabric_codes', FabricCode::all());

    }

}
