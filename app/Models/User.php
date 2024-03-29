<?php

namespace App\Models;

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
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'username',
        'password',
        'level'
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function club()
    {
        return $this->hasOne(Club::class);
    }
}
