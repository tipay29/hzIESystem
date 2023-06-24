<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class Brand{


    public function handle($request, Closure $next){

        if(!request()->has('pls_brand') || request('pls_brand') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pls_brand');

        return $builder->where('pl_brand', 'like', '%'.$searchWord.'%');

    }


}
