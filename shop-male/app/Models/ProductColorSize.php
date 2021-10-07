<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'quantity',
    ];

    /* n - 1 */
    public function product ()
    {
        return $this->belongsTo(Product::class);
    }

    public function color ()
    {
        return $this->belongsTo(Color::class);
    }

    public function size ()
    {
        return $this->belongsTo(Size::class);
    }
}
