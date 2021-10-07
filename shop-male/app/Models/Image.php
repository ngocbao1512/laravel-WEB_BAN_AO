<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'product_id',
        'blog_id',
        'category_id',
        'description',
        'user_id',
        'brand_id',
    ];

    /* n - 1 */
    public function user ()
    {
        return $this->belongsto(User::class);
    }

    public function blog ()
    {
        return $this->belongsto(Blog::class);
    }

    public function product ()
    {
        return $this->belongsto(Product::class);
    }

    public function category ()
    {
        return $this->belongsto(Category::class);
    }

    public function brand ()
    {
        return $this->belongsto(Brand::class);
    }
}
