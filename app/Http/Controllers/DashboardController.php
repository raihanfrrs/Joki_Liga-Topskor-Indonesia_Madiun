<?php

namespace App\Http\Controllers;

use App\Models\AgeGroup;
use App\Models\Club;
use App\Models\Player;
use App\Models\Zone;

class DashboardController extends Controller
{
    public function totalClubs()
    {
        return Club::count();
    }

    public function totalPlayers()
    {
        return Player::count();
    }

    public function totalAges()
    {
        return AgeGroup::count();
    }

    public function totalZones()
    {
        return Zone::count();
    }

    public function totalTrashed()
    {
        $count = AgeGroup::onlyTrashed()->count() + Zone::onlyTrashed()->count() + Club::onlyTrashed()->count() + Club::onlyTrashed()->count();

        return $count;
    }
}
