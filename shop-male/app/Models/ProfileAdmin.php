<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'age',
        'sex',
    ];

    /* 1 - 1 */
    public function user ()
    {
        return $this->belongsto(User::class);
    }

    
}
