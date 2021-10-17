<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

  
    protected $fillable = [
        'name',
        'user_id',
    ];

    /* n - 1 */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* n - n */
    public function products ()
    {
        return $this->belongsToMany(Product::class)->using(ProductTag::class);
    }

    public function blogs ()
    {
        return $this->belongsToMany(Blog::class)->using(BlogTag::class);
    }
}
