<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v2PackingListBatch extends Model
{
    use HasFactory;
    protected $table='v2_packing_list_batches';
    protected $guarded = [];

    public function v2_packing_lists(){
        return $this->hasMany(v2PackingList::class);
    }
}
