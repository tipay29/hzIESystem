<?php


namespace App\QueryFilters\Packing;

use Closure;

class MasterPO{


    public function handle($request, Closure $next){

        if(!request()->has('pls_master_po') || request('pls_master_po') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pls_master_po');

        return $builder->where('pl_master_po', 'like', '%'.$searchWord.'%');

    }


}
