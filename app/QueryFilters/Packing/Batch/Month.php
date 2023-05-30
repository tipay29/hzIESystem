<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class Month{


    public function handle($request, Closure $next){

        if((!request()->has('pls_buy_month')) ){
            return $next($request);
        }

        $builder = $next($request);

        $searchWord = request('pls_buy_month');

        return $builder->where('pl_buy_month',$searchWord);


    }


}
