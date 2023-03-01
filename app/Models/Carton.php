<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carton extends Model
{
    use HasFactory;
    protected $table='cartons';
    protected $guarded = [];

//    public function styles(){
//        return $this->morphedByMany(Style::class, 'cartonable')->withTimestamps()->withPivot('bags_per_carton');
//    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
