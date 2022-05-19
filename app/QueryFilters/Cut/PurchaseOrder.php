<?php


namespace App\QueryFilters\Cut;

use Closure;

class PurchaseOrder{


    public function handle($request, Closure $next){

        if(!request()->has('fi_purchase_order')){
            return $next($request);

        }

        $builder = $next($request);

        $searchWord = request('fi_purchase_order');

        return $builder->whereHas('purchase_orders', function ($query) use ($searchWord){
            $query->where('purchase_order', 'like', '%'.$searchWord.'%');
        });
    }


}
