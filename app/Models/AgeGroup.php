<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgeGroup extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function detail_zone()
    {
        return $this->hasMany(DetailZone::class);
    }
}
