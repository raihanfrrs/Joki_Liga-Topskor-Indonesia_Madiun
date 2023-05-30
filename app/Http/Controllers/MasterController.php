<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Player;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MasterController extends Controller
{
    public function club_index()
    {
        return view('admin.master.club.index')->with([
            'title' => 'Master Data'
        ]);
    }

    public function dataClubs()
    {
        return DataTables::of(Club::all())
        ->addColumn('zone', function ($model) {
            return view('admin.master.club.data-zone', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.master.club.form-action', compact('model'))->render();
        })
        ->rawColumns(['zone', 'action'])
        ->make(true);
    }

    public function player_index()
    {
        return view('admin.master.player.index')->with([
            'title' => 'Master Data'
        ]);
    }

    public function dataPlayers()
    {
        return DataTables::of(Player::all())
        ->addColumn('club', function ($model) {
            return view('admin.master.player.data-club', compact('model'))->render();
        })
        ->addColumn('zone', function ($model) {
            return view('admin.master.player.data-zone', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.master.player.form-action', compact('model'))->render();
        })
        ->rawColumns(['age', 'zone', 'action'])
        ->make(true);
    }
}
