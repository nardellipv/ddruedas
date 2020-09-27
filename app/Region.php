<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;

    public function Users()
    {
        return $this->hasMany(User::class);
    }

    public function Item()
    {
        return $this->hasMany(Item::class);
    }
}
