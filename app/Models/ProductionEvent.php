<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionEvent extends Model
{
    use HasFactory;
    protected $table='production_events';
    protected $guarded = [];
}
