<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* 1 - 1 */
    public function profileadmin()
    {
        return $this->hasOne(ProfileAdmin::class);
    }

     /* 1 - n */
     public function products()
     {
         return $this->hasMany(Product::class);
     }
 
     public function brands()
     {
         return $this->hasMany(Brand::class);
     }
 
     public function categories()
     {
         return $this->hasMany(Category::class);
     }

     public function blogs()
     {
         return $this->hasMany(Blog::class);
     }

     public function tags()
     {
         return $this->hasMany(Tag::class);
     }


}
