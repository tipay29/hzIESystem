<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table='brands';
    protected $guarded = [];

    public function cartons(){
        return $this->hasMany(Carton::class);
    }

    public function carton_orders(){
        return $this->hasMany(CartonOrder::class);
    }
}
