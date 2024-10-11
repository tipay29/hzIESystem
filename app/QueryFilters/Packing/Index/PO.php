<?php


namespace App\QueryFilters\Packing\Index;

use Closure;

class PO{


    public function handle($request, Closure $next){

        if(!request()->has('pls_po') || request('pls_po') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pls_po');

        return $builder->where('cost_brand', 'like', '%'.$searchWord.'%');

    }


}
