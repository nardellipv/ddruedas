<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;

    public function Items()
    {
        return $this->hasMany(Item::class);
    }

}
