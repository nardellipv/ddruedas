<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    public $timestamps = false;

    public function Items()
    {
        return $this->hasMany(Item::class);
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
