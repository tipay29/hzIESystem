<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class SortCRD{


    public function handle($request, Closure $next){

        if(!request()->has('plsort_crd') || request('plsort_crd') == ""){
            return $next($request);

        }

        $builder = $next($request);

        if(request('plsort_crd') == 1){
            return $builder->orderBy('pl_crd','ASC');
        }

        if(request('plsort_crd') == 2){
            return $builder->orderBy('pl_crd','DESC');
        }

    }


}
