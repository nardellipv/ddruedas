<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPayment extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'item_id', 'payment_id'
    ];

    public function Payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function Item()
    {
        return $this->belongsTo(Item::class);
    }
}
