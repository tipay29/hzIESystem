<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartonOrderContent extends Model
{
    use HasFactory;
    protected $table='carton_order_contents';
    protected $guarded = [];

    public function carton_order(){
        return $this->belongsTo(CartonOrder::class);
    }

    public function carton(){
        return $this->belongsTo(Carton::class);
    }
}
