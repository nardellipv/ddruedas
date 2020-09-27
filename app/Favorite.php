<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'item_id', 'user_id'
    ];

    public function User()
    {
        return $this->hasOne(User::class);
    }

    public function Item()
    {
        return $this->belongsTo(Item::class);
    }
}
