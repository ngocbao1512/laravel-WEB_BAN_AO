<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    /* n - 1 */
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    /* n - n */
    public function tags ()
    {
        return $this->belongsToMany(Tag::class)->using(BlogTag::class);
    }

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }
}

