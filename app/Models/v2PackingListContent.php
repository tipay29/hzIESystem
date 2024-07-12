<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v2PackingListContent extends Model
{
    use HasFactory;
    protected $table='v2_packing_list_contents';
    protected $guarded = [];

    public function v2_packing_list(){
        return $this->belongsTo(v2PackingList::class);
    }
}
