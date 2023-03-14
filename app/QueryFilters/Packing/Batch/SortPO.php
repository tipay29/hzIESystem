<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class SortPO{


    public function handle($request, Closure $next){

        if(!request()->has('plsort_po') || request('plsort_po') == ""){
            return $next($request);

        }

        $builder = $next($request);

        if(request('plsort_po') == 1){
            return $builder->orderBy('pl_po_cut','ASC');
        }

        if(request('plsort_po') == 2){
            return $builder->orderBy('pl_po_cut','DESC');
        }

    }


}
