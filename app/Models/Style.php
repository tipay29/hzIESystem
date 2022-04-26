<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;

    protected $table='styles';
    protected $guarded = [];

    public function purchase_orders(){
        return $this->morphedByMany(PurchaseOrder::class, 'styleable')->withTimestamps();
    }

    public function fabric_colors(){
        return $this->morphedByMany(FabricColor::class, 'styleable')->withTimestamps();
    }

    public function fabric_codes(){
        return $this->morphedByMany(FabricCode::class, 'styleable')->withTimestamps();
    }

    public function fabric_types(){
        return $this->morphedByMany(FabricType::class, 'styleable')->withTimestamps();
    }

    public function placements(){
        return $this->morphedByMany(Placement::class, 'styleable')->withTimestamps();
    }

    public function cuts(){
        return $this->morphToMany(Cut::class,'cuttable')->withTimestamps();
    }
}
