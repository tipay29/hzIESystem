<?php


namespace App\QueryFilters\Packing\Index;

use Closure;

class Status{


    public function handle($request, Closure $next){

        if(!request()->has('pls_status') || request('pls_status') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pls_status');

        return $builder->where('pl_status', 'like', '%'.$searchWord.'%');

    }


}
