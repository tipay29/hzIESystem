<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class SortCustomerName{


    public function handle($request, Closure $next){

        if(!request()->has('plsort_customer_name') || request('plsort_customer_name') == ""){
            return $next($request);

        }

        $builder = $next($request);

        if(request('plsort_customer_name') == 1){
            return $builder->orderBy('pl_country','ASC');
        }

        if(request('plsort_customer_name') == 2){
            return $builder->orderBy('pl_country','DESC');
        }

    }


}
