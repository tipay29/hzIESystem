<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cut extends Model
{
    use HasFactory;
    protected $table='cuts';
    protected $guarded = [];

    public function building(){
        return $this->belongsTo(Building::class);
    }

    public function styles(){
        return $this->morphedByMany(Style::class, 'cuttable')->withTimestamps();
    }

    public function purchase_orders(){
        return $this->morphedByMany(PurchaseOrder::class, 'cuttable')->withTimestamps();
    }

    public function placements(){
        return $this->morphedByMany(Placement::class, 'cuttable')->withTimestamps();
    }

    public function fabric_colors(){
        return $this->morphedByMany(FabricColor::class, 'cuttable')->withTimestamps();
    }

    public function fabric_codes(){
        return $this->morphedByMany(FabricCode::class, 'cuttable')->withTimestamps();
    }

    public function fabric_types(){
        return $this->morphedByMany(FabricType::class, 'cuttable')->withTimestamps();
    }

    public function employees(){
        return $this->morphedByMany(Employee::class, 'cuttable')->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
