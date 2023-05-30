<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class Year{


    public function handle($request, Closure $next){

        if((!request()->has('pls_buy_year'))){
            return $next($request);
        }

        $builder = $next($request);

        $searchWordOne = request('pls_buy_year');

        return $builder->where('pl_buy_year',$searchWordOne);


    }


}
