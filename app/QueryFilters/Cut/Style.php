<?php


namespace App\QueryFilters\Cut;

use Closure;

class Style{


    public function handle($request, Closure $next){

        if(!request()->has('fi_style')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('fi_style');

        return $builder->whereHas('styles', function ($query) use ($searchWord){
            $query->where('style_code', 'like', '%'.$searchWord.'%');
        });
    }


}
