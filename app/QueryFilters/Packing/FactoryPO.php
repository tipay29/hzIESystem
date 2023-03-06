<?php


namespace App\QueryFilters\Packing;

use Closure;

class FactoryPO{


    public function handle($request, Closure $next){

        if(!request()->has('pls_factory_po') || request('pls_factory_po') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pls_factory_po');

        return $builder->where('pl_factory_po', 'like', '%'.$searchWord.'%');

    }


}
