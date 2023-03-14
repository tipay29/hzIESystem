<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class SortFactoryPO{


    public function handle($request, Closure $next){

        if(!request()->has('plsort_factory_po') || request('plsort_factory_po') == ""){
            return $next($request);

        }

        $builder = $next($request);

        if(request('plsort_factory_po') == 1){
            return $builder->orderBy('pl_factory_po','ASC');
        }

        if(request('plsort_factory_po') == 2){
            return $builder->orderBy('pl_factory_po','DESC');
        }

    }


}
