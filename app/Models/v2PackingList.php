<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v2PackingList extends Model
{
    use HasFactory;
    protected $table='v2_packing_lists';
    protected $guarded = [];

    public function v2_packing_list_contents(){
        return $this->hasMany(v2PackingListContent::class);
    }

    public function v2_packing_list_batch(){
        return $this->belongsTo(v2PackingListBatch::class);
    }
}
