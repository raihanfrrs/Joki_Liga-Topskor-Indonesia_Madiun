<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

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
