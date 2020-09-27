<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $fillable = [
        'name', 'condition', 'description', 'price', 'picture', 'category_id', 'pattern_id', 'brand_id', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function Pattern()
    {
        return $this->belongsTo(Pattern::class);
    }
}
