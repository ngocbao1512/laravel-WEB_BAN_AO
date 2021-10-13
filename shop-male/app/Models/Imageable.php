<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageable extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_id',
        'imageable_id',
        'imageable_type',
    ];
}
