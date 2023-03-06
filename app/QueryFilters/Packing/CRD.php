<?php


namespace App\QueryFilters\Packing;

use Closure;

class CRD{


    public function handle($request, Closure $next){

        if(!request()->has('pls_crd') || request('pls_crd') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWordOne = request('pls_crd') . ' 00:00:01';
        $searchWordTwo = request('pls_crd') . ' 23:59:59';

        return $builder->whereBetween('pl_crd', [$searchWordOne, $searchWordTwo]);

    }


}
