<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class SortMasterPO{


    public function handle($request, Closure $next){

        if(!request()->has('plsort_master_po') || request('plsort_master_po') == ""){
            return $next($request);

        }

        $builder = $next($request);

        if(request('plsort_master_po') == 1){
            return $builder->orderBy('pl_master_po','ASC');
        }

        if(request('plsort_master_po') == 2){
            return $builder->orderBy('pl_master_po','DESC');
        }

    }


}
