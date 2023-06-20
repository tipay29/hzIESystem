<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartonOrder extends Model
{
    use HasFactory;
    protected $table='carton_orders';
    protected $guarded = [];

    public function carton_order_contents(){
        return $this->hasMany(CartonOrderContent::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
