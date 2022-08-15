<?php


namespace App\QueryFilters\PoTrace;

use Closure;

class StyleCode{


    public function handle($request, Closure $next){

        if(!request()->has('pot_style_code')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pot_style_code');

        return $builder->where('style_code','like', '%'.$searchWord.'%');
    }


}
