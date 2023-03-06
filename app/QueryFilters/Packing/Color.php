<?php


namespace App\QueryFilters\Packing;

use Closure;

class Color{


    public function handle($request, Closure $next){

        if(!request()->has('pls_color') || request('pls_color') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pls_color');

        return $builder->where('pl_color', 'like', '%'.$searchWord.'%');

    }


}
