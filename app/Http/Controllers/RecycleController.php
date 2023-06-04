<?php

namespace App\Http\Controllers;

use App\Models\AgeGroup;
use App\Models\Club;
use App\Models\DetailZone;
use App\Models\Player;
use App\Models\Zone;
use Illuminate\Http\Request;

class RecycleController extends Controller
{
    public function index()
    {
        if (auth()->user()->level === 'admin') {
            return view('admin.recycle.index')->with([
                'title' => 'Recycle',
                'clubs' => Club::onlyTrashed()->get(),
                'players' => Player::onlyTrashed()->get(),
                'ages' => AgeGroup::onlyTrashed()->get(),
                'zones' => Zone::onlyTrashed()->get()
            ]);
        }elseif (auth()->user()->level === 'user') {
            return view('user.recycle.index')->with([
                'title' => 'Recycle'
            ]);
        }
    }

    public function club_restore(Request $request)
    {
        Club::where('slug', $request->data)->onlyTrashed()->restore();

        return true;
    }

    public function player_restore(Request $request)
    {
        Player::where('slug', $request->data)->onlyTrashed()->restore();

        return true;
    }

    public function age_restore(Request $request)
    {
        AgeGroup::whereId($request->data)->onlyTrashed()->restore();

        return true;
    }

    public function zone_restore(Request $request)
    {
        Zone::whereId($request->data)->onlyTrashed()->restore();

        return true;
    }

    public function club_destroy(Request $request)
    {
        $club = Club::where('slug', $request->data)->onlyTrashed()->first();

        Player::where('club_id', $club->id)->update(['club_id' => null]);

        Club::where('slug', $request->data)->onlyTrashed()->forceDelete();

        return true;
    }

    public function player_destroy(Request $request)
    {
        Player::where('slug', $request->data)->onlyTrashed()->forceDelete();

        return true;
    }

    public function age_destroy(Request $request)
    {
        $age = AgeGroup::whereId($request->data)->onlyTrashed()->first();

        Player::where('age_group_id', $age->id)->update(['age_group_id' => null]);

        DetailZone::where('age_group_id', $age->id)->update(['age_group_id' => null]);

        AgeGroup::whereId($request->data)->onlyTrashed()->forceDelete();

        return true;
    }

    public function zone_destroy(Request $request)
    {
        $zone = Zone::whereId($request->data)->onlyTrashed()->first();

        Player::where('zone_id', $zone->id)->update(['zone_id' => null]);

        DetailZone::where('zone_id', $zone->id)->delete();

        Club::where('zone_id', $zone->id)->update(['zone_id' => null]);

        Zone::whereId($request->data)->onlyTrashed()->forceDelete();

        return true;
    }
}
