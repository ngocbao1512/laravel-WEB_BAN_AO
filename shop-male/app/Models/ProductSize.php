<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size_id',
    ];

    /* n - 1 */
    public function product ()
    {
        return $this->belongsTo(Product::class);
    }

    public function size ()
    {
        return $this->belongsTo(Size::class);
    }


}
