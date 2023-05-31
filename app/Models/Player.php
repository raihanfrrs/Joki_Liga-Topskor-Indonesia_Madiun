<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $guarded = [
        'id'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

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
