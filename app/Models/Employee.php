<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function building(){
        return $this->belongsTo(Building::class);
    }
}
