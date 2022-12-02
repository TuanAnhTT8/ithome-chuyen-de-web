<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function report_house()
    {
        return $this->hasMany(Report::class);
    }

    public static function encode($id)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = rand(10000, 99999);
        $size = strlen($chars);
        $length = rand(1, 30);
        $str = '';
        for ($i = 0; $i <  $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }
        $str = substr(str_shuffle($chars), 0, $length);
        $id_security = base64_encode($id) . '_' . $rand . '_' . $str;
        return $id_security;
    }
    public static function decode($id){
        $id_base = explode('_', $id);
        $id = base64_decode($id_base[0]);
        return $id;
    }
    
}
