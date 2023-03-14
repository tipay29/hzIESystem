<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class CustomerName{


    public function handle($request, Closure $next){

        if(!request()->has('pls_customer_name') || request('pls_customer_name') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pls_customer_name');

        return $builder->where('pl_country', 'like', '%'.$searchWord.'%');

    }


}
