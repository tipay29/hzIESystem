<?php


namespace App\QueryFilters\Packing\Index;

use Closure;

class CRD{


    public function handle($request, Closure $next){

        if((!request()->has('pls_crd_one') || request('pls_crd_one') == "") ||
            (!request()->has('pls_crd_two') || request('pls_crd_two') == "")){
            return $next($request);
        }

        $builder = $next($request);

        $searchWordOne = request('pls_crd_one') . ' 00:00:01';
        $searchWordTwo = request('pls_crd_two') . ' 23:59:59';

        return $builder->whereBetween('pl_crd', [$searchWordOne, $searchWordTwo]);


    }


}
