<?php


namespace App\Http\View\Composers;


use App\Models\Brand;
use Illuminate\View\View;

class BrandComposer
{

    public function compose(View $view){
        $view->with('brands', Brand::all());
    }

}
