<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->morphedByMany(User::class, 'imageable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function blogs ()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function products ()
    {
        return $this->belongsToMany(Product::class);
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
