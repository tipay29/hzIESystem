<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialDay extends Model
{
    use HasFactory;
    protected $table='special_days';
    protected $guarded = [];
}
