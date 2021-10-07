<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'quantity',
        'rate',
        'sold',
        'description',
        'sale_off',
        'is_public',
        'user_id',
        'brand_id',
        'category_id',
    ];

    /* n - 1 */
    public function user ()
    {
        return $this->belongsto(User::class);
    }

    public function brand ()
    {
        return $this->belongsto(Brand::class);
    }

    public function category ()
    {
        return $this->belongsto(Category::class);
    }

    /* 1 - n */
    public function images ()
    {
        return $this->hasMany(image::class);
    }

    /* n - n */
    public function colors ()
    {
        return $this->belongsToMany(Color::class)->using(ProductColor::class);
    }

    public function tags ()
    {
        return $this->belongsToMany(Tag::class)->using(ProductTag::class);
    }

    public function sizes ()
    {
        return $this->belongsToMany(Size::class)->using(ProductSize::class);
    }

 
}

