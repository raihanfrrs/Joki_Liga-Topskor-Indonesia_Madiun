<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function official()
    {
        return $this->hasMany(Official::class);
    }

    public function player()
    {
        return $this->hasMany(Player::class);
    }
}
