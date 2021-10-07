<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    /* n - 1 */
    public function user ()
    {
        return $this->belongsto(User::class);
    }

    /* 1 - n */
    public function images ()
    {
        return $this->hasMany(Image::class);
    }

    public function products ()
    {
        return $this->hasMany(Product::class);
    }
}