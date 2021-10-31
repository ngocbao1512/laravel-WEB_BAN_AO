<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];


    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
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
        return $this->belongsToMany(Image::class, 'product_images');
    }

    

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }


}
