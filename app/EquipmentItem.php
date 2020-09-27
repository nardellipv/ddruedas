<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentItem extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'equipment_id', 'item_id'
    ];

    public function Equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function Item()
    {
        return $this->belongsTo(Item::class);
    }
}
