<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricColor extends Model
{
    use HasFactory;
    protected $table='fabric_colors';
    protected $guarded = [];

    public function styles(){
        return $this->morphToMany(Style::class,'styleable')->withTimestamps();
    }

    public function cuts(){
        return $this->morphToMany(Cut::class,'cuttable')->withTimestamps();
    }

}
