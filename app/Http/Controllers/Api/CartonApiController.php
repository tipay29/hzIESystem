<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Carton;
use Illuminate\Http\Request;

class CartonApiController extends Controller
{
    public function showBrand(){

        $brand = Brand::where('brand_name',request()->brand)->first();

        $cartons = Carton::where(
        [
        ['brand_id',$brand->id],
        ['type',request()->type],
        ])->get();

        return response()->json($cartons,200);
    }
}
