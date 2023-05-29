<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function age_group()
    {
        return $this->belongsTo(AgeGroup::class);
    }
}
