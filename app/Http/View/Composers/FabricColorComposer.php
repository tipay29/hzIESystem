<?php


namespace App\Http\View\Composers;



use App\Models\FabricColor;
use Illuminate\View\View;

class FabricColorComposer
{

    public function compose(View $view){
        $view->with('fabric_colors', FabricColor::all());

    }

}
