<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    public $timestamps = false;

    public function EquipmentItems()
    {
        return $this->hasMany(EquipmentItem::class);
    }
}
