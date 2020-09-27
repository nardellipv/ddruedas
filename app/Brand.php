<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    public function Patterns()
    {
        return $this->hasMany(Pattern::class);
    }

    public function Items()
    {
        return $this->hasMany(Item::class);
    }
}
