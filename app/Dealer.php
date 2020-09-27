<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable = [
        'nameAgency', 'address', 'email', 'phone', 'phone1', 'phoneWsp', 'logo', 'nameResponsable', 'slug', 'province_id', 'region_id', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Province()
    {
        return $this->belongsTo(Province::class);
    }

    public function Region()
    {
        return $this->belongsTo(Region::class);
    }
}
