<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    use HasFactory;

    protected $table='placements';
    protected $guarded = [];

    public function purchase_orders(){
        return $this->morphToMany(PurchaseOrder::class,'poable')->withTimestamps();
    }
}
