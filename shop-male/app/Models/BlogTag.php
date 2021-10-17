<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'tag_id',
    ];

    /* n - 1 */
    public function blog ()
    {
        return $this->belongsTo(Blog::class);
    }

    public function tag ()
    {
        return $this->belongsTo(Tag::class);
    }
}
