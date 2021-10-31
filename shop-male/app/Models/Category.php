<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'user_id',
        'image_id',
        
    ];

    /* n - 1 */
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    /* n - n */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function products ()
    {
        return $this->hasMany(Product::class);
    }

    

}
