<?php


namespace App\QueryFilters\Style;

use Closure;

class Style{


    public function handle($request, Closure $next){

        if(!request()->has('s_style') || request('s_style') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('s_style');

        return $builder->where('style_code', 'like', '%'.$searchWord.'%');

    }


}
