<?php


namespace App\QueryFilters\PoTrace;

use Closure;

class Status{


    public function handle($request, Closure $next){

        if(!request()->has('pot_size')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pot_size');

        return $builder->where('size','like', '%'.$searchWord.'%');
    }


}
