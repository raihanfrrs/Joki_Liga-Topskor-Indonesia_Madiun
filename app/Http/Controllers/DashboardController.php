<?php

namespace App\Http\Controllers;

use App\Models\AgeGroup;
use App\Models\Club;
use App\Models\Official;
use App\Models\Player;

class DashboardController extends Controller
{
    public function totalClubs()
    {
        return Club::withTrashed()->count();
    }

    public function totalPlayers()
    {
        return Player::withTrashed()->count();
    }

    public function totalAges()
    {
        return AgeGroup::withTrashed()->count();
    }

    public function totalTrashed()
    {
        $count = AgeGroup::onlyTrashed()->count() + Club::onlyTrashed()->count() + Player::onlyTrashed()->count() + Official::onlyTrashed()->count();

        return $count;
    }
}
