<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricCode extends Model
{
    use HasFactory;
    protected $table='fabric_codes';
    protected $guarded = [];

    public function purchase_orders(){
        return $this->morphToMany(PurchaseOrder::class,'poable')->withTimestamps();
    }
}
