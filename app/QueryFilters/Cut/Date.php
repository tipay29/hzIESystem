<?php


namespace App\QueryFilters\Cut;

use Closure;

class Date{


    public function handle($request, Closure $next){

        if(request('fi_date_one') == '' or request('fi_date_two') == ''){
            return $next($request);
        }

        $builder = $next($request);

        $searchWordOne = request('fi_date_one') . ' 00:00:01';
        $searchWordTwo = request('fi_date_two') . ' 23:59:59';

        return $builder->whereBetween('spread_start', [$searchWordOne, $searchWordTwo]);

    }


}
