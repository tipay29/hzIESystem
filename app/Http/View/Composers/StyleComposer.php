<?php


namespace App\Http\View\Composers;

use App\Models\Style;
use Illuminate\View\View;

class StyleComposer
{

    public function compose(View $view){




        $view->with('styles', Style::
//        with([
//            'purchase_orders','fabric_colors',
//            'fabric_codes','fabric_types','placements'
//        ])
//        ->get())
        all())
        ;

    }

}
