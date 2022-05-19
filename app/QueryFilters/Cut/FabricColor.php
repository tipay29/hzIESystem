<?php


namespace App\QueryFilters\Cut;

use Closure;

class FabricColor{


    public function handle($request, Closure $next){

        if(!request()->has('fi_fabric_color')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('fi_fabric_color');

        return $builder->whereHas('fabric_colors', function ($query) use ($searchWord){
            $query->where('fabric_color', 'like', '%'.$searchWord.'%');
        });
    }


}
