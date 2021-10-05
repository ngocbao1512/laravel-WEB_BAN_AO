<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogTag extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'tag_id',
    ];

    /* n - 1 */
    public function blog ()
    {
        return $this->belongsto(Blog::class);
    }

    public function tag ()
    {
        return $this->belongsto(Tag::class);
    }
}
