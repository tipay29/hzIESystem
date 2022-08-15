<?php


namespace App\QueryFilters\PoTrace;

use Closure;

class StyleColor{


    public function handle($request, Closure $next){

        if(!request()->has('pot_style_color')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pot_style_color');

        return $builder->where('style_color','like', '%'.$searchWord.'%');
    }


}
