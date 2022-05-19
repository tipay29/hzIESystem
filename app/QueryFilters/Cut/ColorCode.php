<?php


namespace App\QueryFilters\Cut;

use Closure;

class ColorCode{


    public function handle($request, Closure $next){

        if(!request()->has('fi_color_code')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('fi_color_code');

        return $builder->whereHas('fabric_codes', function ($query) use ($searchWord){
            $query->where('fabric_code', 'like', '%'.$searchWord.'%');
        });
    }


}
