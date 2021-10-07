<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductTag extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'tag_id',
    ];

    /* n - 1 */
    public function product ()
    {
        return $this->belongsto(Product::class);
    }

    public function tag ()
    {
        return $this->belongsto(Tag::class);
    }
}
