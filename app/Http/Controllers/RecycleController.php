<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Mail;
use App\Models\Player;
use App\Models\AgeGroup;
use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                'officials' => Official::onlyTrashed()->get(),
                'mails' => Mail::onlyTrashed()->get(),
            ]);
        }elseif (auth()->user()->level === 'user') {
            return view('user.recycle.index')->with([
                'title' => 'Recycle',
                'officials' => Official::where('club_id', auth()->user()->club->id)->onlyTrashed()->get(),
                'players' => Player::where('club_id', auth()->user()->club->id)->onlyTrashed()->get()
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
        Player::where('slug', $request->data)->update(['status' => 'proses']);

        return true;
    }

    public function official_restore(Request $request)
    {
        Official::where('slug', $request->data)->onlyTrashed()->restore();
        Official::where('slug', $request->data)->update(['status' => 'proses']);

        return true;
    }

    public function age_restore(Request $request)
    {
        AgeGroup::whereId($request->data)->onlyTrashed()->restore();

        return true;
    }

    public function mail_restore(Request $request)
    {
        Mail::whereId($request->data)->onlyTrashed()->restore();

        return true;
    }

    public function club_destroy(Request $request)
    {
        $club = Club::where('slug', $request->data)->onlyTrashed()->first();

        Player::where('club_id', $club->id)->update(['club_id' => null]);

        Official::where('club_id', $club->id)->update(['club_id' => null]);

        Club::where('slug', $request->data)->onlyTrashed()->forceDelete();

        return true;
    }

    public function player_destroy(Request $request)
    {
        Player::where('slug', $request->data)->onlyTrashed()->forceDelete();

        return true;
    }

    public function official_destroy(Request $request)
    {
        Official::where('slug', $request->data)->onlyTrashed()->forceDelete();

        return true;
    }

    public function age_destroy(Request $request)
    {
        $age = AgeGroup::whereId($request->data)->onlyTrashed()->first();

        Player::where('age_group_id', $age->id)->update(['age_group_id' => null]);

        AgeGroup::whereId($request->data)->onlyTrashed()->forceDelete();

        return true;
    }

    public function mail_destroy(Request $request)
    {
        $mail = Mail::whereId($request->data)->onlyTrashed()->first();

        if ($mail->file) {
            Storage::delete($mail->file);
        }

        $mail->forceDelete();

        return true;
    }
}
