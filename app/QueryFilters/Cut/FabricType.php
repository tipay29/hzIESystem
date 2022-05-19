<?php


namespace App\QueryFilters\Cut;

use Closure;

class FabricType{


    public function handle($request, Closure $next){

        if(!request()->has('fi_fabric_type')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('fi_fabric_type');

        return $builder->whereHas('fabric_types', function ($query) use ($searchWord){
            $query->where('fabric_type', 'like', '%'.$searchWord.'%');
        });
    }


}
