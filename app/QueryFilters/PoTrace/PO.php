<?php


namespace App\QueryFilters\PoTrace;

use Closure;

class PO{


    public function handle($request, Closure $next){

        if(!request()->has('pot_po')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pot_po');

        return $builder->where('po_number','like', '%'.$searchWord.'%');
    }


}
