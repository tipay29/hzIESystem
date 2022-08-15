<?php


namespace App\QueryFilters\PoTrace;

use Closure;

class FactoryPO{


    public function handle($request, Closure $next){

        if(!request()->has('pot_factory_po')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pot_factory_po');

        return $builder->where('factory_po','like', '%'.$searchWord.'%');
    }


}
