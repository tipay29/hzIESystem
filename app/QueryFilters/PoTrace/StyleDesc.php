<?php


namespace App\QueryFilters\PoTrace;

use Closure;

class StyleDesc{


    public function handle($request, Closure $next){

        if(!request()->has('pot_style_desc')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pot_style_desc');

        return $builder->where('style_description','like', '%'.$searchWord.'%');
    }


}
