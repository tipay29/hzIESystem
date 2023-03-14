<?php


namespace App\QueryFilters\Packing\Index;

use Closure;

class CreateDate{


    public function handle($request, Closure $next){

        if(!request()->has('pls_date_created') || request('pls_date_created') == ""){
            return $next($request);

        }
        $builder = $next($request);

        $searchWordOne = request('pls_date_created') . ' 00:00:01';
        $searchWordTwo = request('pls_date_created') . ' 23:59:59';

        return $builder->whereBetween('created_at', [$searchWordOne, $searchWordTwo]);

    }


}
