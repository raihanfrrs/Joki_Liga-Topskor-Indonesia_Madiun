<?php

namespace App\Http\Controllers;

use App\Models\AgeGroup;
use App\Models\Club;
use App\Models\Mail;
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
        if (auth()->user()->level === 'admin') {
            return Player::withTrashed()->count();
        } else {
            return Player::where('club_id', auth()->user()->club->id)->withTrashed()->count();
        }
    }

    public function totalOfficials()
    {
        if (auth()->user()->level === 'admin') {
            return Official::withTrashed()->count();
        } else {
            return Official::where('club_id', auth()->user()->club->id)->withTrashed()->count();
        }
    }

    public function totalAges()
    {
        return AgeGroup::withTrashed()->count();
    }

    public function totalTrashed()
    {
        $count = AgeGroup::onlyTrashed()->count() + Club::onlyTrashed()->count() + Player::onlyTrashed()->count() + Official::onlyTrashed()->count() + Mail::onlyTrashed()->count();

        return $count;
    }
    
    public function totalTrashedClub()
    {
        $count = Player::where('club_id', auth()->user()->club->id)->onlyTrashed()->count() + Official::where('club_id', auth()->user()->club->id)->onlyTrashed()->count();

        return $count;
    }

    public function totalMails()
    {
        $mail = Mail::where('status', 'active')->withTrashed()->count();
        if ($mail > 0) {
            return $mail;
        }
    }

    public function listMail()
    {
        return view('user.data-mail-list')->with([
            'mails' => Mail::where('status', 'active')->withTrashed()->get()
        ]);
    }
}
