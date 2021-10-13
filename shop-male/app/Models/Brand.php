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
        return $this->belongsTo(User::class);
    }

    /* n - n */
    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

    public function products ()
    {
        return $this->hasMany(Product::class);
    }
}
