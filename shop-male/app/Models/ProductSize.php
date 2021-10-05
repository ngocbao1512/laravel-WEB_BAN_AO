<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductSize extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size_id',
        'quantity',
    ];

    /* n - 1 */

    public function product ()
    {
        return $this->belongsto(Product::class);
    }

    public function size ()
    {
        return $this->belongsto(Size::class);
    }
}
