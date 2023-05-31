<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgeGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function detail_zone()
    {
        return $this->hasMany(DetailZone::class);
    }

    public function player()
    {
        return $this->hasMany(Player::class);
    }
}
