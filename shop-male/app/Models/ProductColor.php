<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_id',
        'quantity',
    ];

    /* n - 1 */
    public function product ()
    {
        return $this->belongsto(Product::class);
    }

    public function color ()
    {
        return $this->belongsto(Color::class);
    }
}
