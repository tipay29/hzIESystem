<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table='sizes';
    protected $guarded = [];

    public function styles(){
        return $this->morphedByMany(Style::class, 'sizeable')->withTimestamps()->withPivot('mcq','weight','carton_id','id');
    }
}
