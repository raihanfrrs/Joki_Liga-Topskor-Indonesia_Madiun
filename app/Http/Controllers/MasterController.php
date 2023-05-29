<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function club_index()
    {
        return view('admin.master.club.index')->with([
            'title' => 'Master Data'
        ]);
    }

    public function player_index()
    {
        return view('admin.master.player.index')->with([
            'title' => 'Master Data'
        ]);
    }
}
