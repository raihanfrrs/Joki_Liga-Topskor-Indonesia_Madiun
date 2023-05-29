<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailZone extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function agegroup()
    {
        return $this->belongsTo(AgeGroup::class);
    }
}
