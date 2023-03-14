<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class SortMaterial{


    public function handle($request, Closure $next){

        if(!request()->has('plsort_material') || request('plsort_material') == ""){
            return $next($request);

        }

        $builder = $next($request);

        if(request('plsort_material') == 1){
            return $builder->orderBy('pl_material','ASC');
        }

        if(request('plsort_material') == 2){
            return $builder->orderBy('pl_material','DESC');
        }

    }


}
