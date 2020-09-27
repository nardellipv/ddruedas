<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'version', 'displacement', 'year', 'mileage', 'price', 'money', 'condition',
        'fuel', 'typeEngine', 'barter', 'status', 'expire', 'visit', 'comment', 'type_id',
        'pattern_id', 'brand_id', 'user_id', 'province_id', 'region_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Type()
    {
        return $this->belongsTo(Type::class);
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function Pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function Pattern()
    {
        return $this->belongsTo(Pattern::class);
    }

    public function ItemPayments()
    {
        return $this->hasMany(ItemPayment::class);
    }

    public function EquipmentItems()
    {
        return $this->hasMany(EquipmentItem::class);
    }

    public function Favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function Province()
    {
        return $this->hasOne(Province::class);
    }

    public function Region()
    {
        return $this->hasOne(Region::class);
    }


    //Scope

    public function scopeType($query, $type)
    {
        if ($type)
            return $query->where('type_id', $type);
    }

    public function scopeProvince($query, $province)
    {
        if ($province != 'Provincia')
            return $query->where('province_id', $province);
    }
}
