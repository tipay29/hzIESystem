<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricColor extends Model
{
    use HasFactory;
    protected $table='fabric_colors';
    protected $guarded = [];

    public function purchase_orders(){
        return $this->morphToMany(PurchaseOrder::class,'poable')->withTimestamps();
    }

}
