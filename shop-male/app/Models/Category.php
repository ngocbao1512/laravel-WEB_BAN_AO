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
<<<<<<< HEAD
        'user_id',        
=======
        'user_id',
        'image',
        
>>>>>>> 9b3f5568e9680f30f87938b2c369f8704648635a
    ];

    /* n - 1 */
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    /* n - n */
    public function images()
    {
        return $this->hasOne(Image::class);
    }

    public function products ()
    {
        return $this->hasMany(Product::class);
    }

    

}
