<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricCode extends Model
{
    use HasFactory;
    protected $table='fabric_codes';
    protected $guarded = [];

    public function styles(){
        return $this->morphToMany(Style::class,'styleable')->withTimestamps();
    }

    public function cuts(){
        return $this->morphToMany(Cut::class,'cuttable')->withTimestamps();
    }
}
