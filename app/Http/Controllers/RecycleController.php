<?php

namespace App\Http\Controllers;

use App\Models\AgeGroup;
use App\Models\Club;
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
        AgeGroup::whereId($request->data)->onlyTrashed()->forceDelete();

        return true;
    }

    public function zone_destroy(Request $request)
    {
        Zone::whereId($request->data)->onlyTrashed()->forceDelete();

        return true;
    }
}
