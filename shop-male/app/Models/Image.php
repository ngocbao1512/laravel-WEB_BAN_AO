<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
    ];

    public function users()
    {
        return $this->morphedByMany(User::class, 'imageable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function blogs()
    {
        return $this->morphedByMany(Blog::class, 'imageable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'imageable');
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'imageable');
    }

    public function brands()
    {
        return $this->morphedByMany(Brand::class, 'imageable');
    }

}
