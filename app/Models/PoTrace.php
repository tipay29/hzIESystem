<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoTrace extends Model
{
    use HasFactory;
    protected $table='po_traces';
    protected $guarded = [];
}
