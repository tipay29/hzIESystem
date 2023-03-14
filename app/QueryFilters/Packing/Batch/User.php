<?php


namespace App\QueryFilters\Packing\Batch;

use Closure;

class User{


    public function handle($request, Closure $next){

        if(!request()->has('pls_user') || request('pls_user') == ""){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('pls_user');

        return $builder->where('user_id', $searchWord);

    }


}
