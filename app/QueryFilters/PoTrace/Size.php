<?php


namespace App\QueryFilters\PoTrace;

use Closure;

class Size{


    public function handle($request, Closure $next){

        if(!request()->has('pot_status')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pot_status');

        return $builder->where('status','like', '%'.$searchWord.'%');
    }


}
