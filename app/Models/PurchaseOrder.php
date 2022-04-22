<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table='purchase_orders';
    protected $guarded = [];

    public function fabric_colors(){
        return $this->morphedByMany(FabricColor::class, 'poable')->withTimestamps();
    }

    public function fabric_codes(){
        return $this->morphedByMany(FabricCode::class, 'poable')->withTimestamps();
    }

    public function fabric_types(){
        return $this->morphedByMany(FabricType::class, 'poable')->withTimestamps();
    }

    public function placements(){
        return $this->morphedByMany(Placement::class, 'poable')->withTimestamps();
    }

}
