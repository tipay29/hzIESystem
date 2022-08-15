<?php


namespace App\QueryFilters\PoTrace;

use Closure;

class StyleColorName{


    public function handle($request, Closure $next){

        if(!request()->has('pot_style_color_name')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pot_style_color_name');

        return $builder->where('style_color_name','like', '%'.$searchWord.'%');
    }


}
