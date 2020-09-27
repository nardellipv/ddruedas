<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'name', 'item_id'
    ];

    public function Item()
    {
        return $this->belongsTo(Item::class);
    }
}
