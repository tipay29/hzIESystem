<?php


namespace App\QueryFilters\Cut;

use Closure;

class Table{


    public function handle($request, Closure $next){



        if(request('fi_table') == ''){
            return $next($request);
        }

        $builder = $next($request);

        $searchWord = request('fi_table');

        return $builder->where('table_num', $searchWord);

    }


}
