<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'user_id',
        'description'
    ];

    /* n - 1 */
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    /* n - n */

    public function products ()
    {
        return $this->hasMany(Product::class);
    }
}
