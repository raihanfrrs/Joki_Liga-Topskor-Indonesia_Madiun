<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailZone extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function age_group()
    {
        return $this->belongsTo(AgeGroup::class);
    }
}
