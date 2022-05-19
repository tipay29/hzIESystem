<?php


namespace App\QueryFilters\Cut;

use Closure;

class Building{


    public function handle($request, Closure $next){


        if(request('fi_building') == ''){
            return $next($request);
        }

        $builder = $next($request);

        $searchWord = request('fi_building');

        return $builder->where('building_id', $searchWord);

    }


}
