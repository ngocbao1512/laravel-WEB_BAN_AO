<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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
        return $this->belongsTo(User::class);
    }

    public function brand ()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    
    

    /* n - n */
    public function colors ()
    {
        return $this->belongsToMany(Color::class)->using(ProductColorSize::class);
    }

    public function tags ()
    {
        return $this->belongsToMany(Tag::class)->using(ProductTag::class);
    }

    public function sizes ()
    {
        return $this->belongsToMany(Size::class)->using(ProductColorSize::class);
    }

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

 
}

