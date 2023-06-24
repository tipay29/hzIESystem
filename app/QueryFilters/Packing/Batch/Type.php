<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class Type{


    public function handle($request, Closure $next){

        if(!request()->has('pls_type') || request('pls_type') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pls_type');

        return $builder->where('pl_type', 'like', '%'.$searchWord.'%');

    }


}
