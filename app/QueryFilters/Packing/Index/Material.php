<?php


namespace App\QueryFilters\Packing\Index;

use Closure;

class Material{


    public function handle($request, Closure $next){

        if(!request()->has('pls_material') || request('pls_material') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pls_material');

        return $builder->where('pl_material', 'like', '%'.$searchWord.'%');

    }


}
