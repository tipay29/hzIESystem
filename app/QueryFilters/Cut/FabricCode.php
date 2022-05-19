<?php


namespace App\QueryFilters\Cut;

use Closure;

class FabricCode{


    public function handle($request, Closure $next){

        if(!request()->has('fi_fabric_code')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('fi_fabric_code');

        return $builder->whereHas('placements', function ($query) use ($searchWord){
            $query->where('placement', 'like', '%'.$searchWord.'%');
        });
    }


}
