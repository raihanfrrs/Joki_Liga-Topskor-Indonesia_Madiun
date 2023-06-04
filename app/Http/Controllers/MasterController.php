<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Club;
use App\Models\User;
use App\Models\Zone;
use App\Models\Player;
use App\Models\DetailZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rules\Password;

class MasterController extends Controller
{
    public function club_index()
    {
        return view('admin.master.club.index')->with([
            'title' => 'Master Data'
        ]);
    }

    public function club_add()
    {
        return view('admin.master.club.add-club')->with([
            'title' => 'Master Data',
            'subtitle' => 'Club'
        ]);
    }

    public function club_store(Request $request)
    {
        $rules = [
            'username' => 'required|min:2|max:255|unique:users',
            'password' => ['required', Password::min(8)]
        ];

        $validateData = $request->validate($rules);

        $validateData['level'] = 'user';
        $validateData['password'] = bcrypt($request->password);

        $user = User::create($validateData);

        $club['user_id'] = $user->id;

        $clubs = Club::create($club);

        if ($user && $clubs) {
            return redirect('club')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Adding Success!'
            ]);
        } else {
            return redirect('club')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Adding Failed!'
            ]);
        }
    }

    public function club_edit(Club $club)
    {
        return view('admin.master.club.edit-club')->with([
            'title' => 'Master Data',
            'subtitle' => 'Club',
            'club' => $club,
            'zones' => Zone::all()
        ]);
    }

    public function club_update(Request $request, Club $club)
    {
        $rules = [
            'name' => 'required|min:2|max:255',
            'phone' => 'required|min:2|numeric',
            'address' => 'required',
            'social_media' => 'required',
            'club_manager' => 'required',
            'zone_id' => 'required',
            'logo' => 'image|file|max:2048',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('logo')) {
            if ($club->logo) {
                Storage::delete($club->logo);
            }
            $validateData['logo'] = $request->file('logo')->store('club-image');
        }

        $validateData['slug'] = slug($request->name);

        $clubs = Club::whereId($club->id)->update($validateData);

        if ($clubs) {
            return redirect('club')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('club')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function club_show(Club $club)
    {
        return view('admin.master.club.show-club')->with([
            'title' => 'Data Master',
            'subtitle' => 'Club',
            'club' => $club
        ]);
    }

    public function club_destroy(Club $club)
    {
        if ($club->deleted_at == null) {
            $club->delete();
        } 

        return redirect('club')->with([
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Move To Trash Success!'
        ]);
    }

    public function dataClubs()
    {
        return DataTables::of(Club::whereNotNull('slug')->get())
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

    public function player_edit(Player $player)
    {
        return view('admin.master.player.edit-player')->with([
            'title' => 'Master Data',
            'subtitle' => 'Player',
            'player' => $player,
            'clubs' => Club::all()
        ]);
    }

    public function player_update(Request $request, Player $player)
    {
        $rules = [
            'name' => 'required|min:2|max:255',
            'birthPlace' => 'required|min:2|max:255|alpha',
            'birthDate' => 'required',
            'phone' => 'required|min:2|numeric',
            'address' => 'required',
            'position' => 'required',
            'club_id' => 'required',
            'age_group_id' => 'required',
            'photo' => 'image|file|max:2048',
        ];

        if ($request->nik != $player->nik) {
            $rules['nik'] = 'required|min:2|numeric|unique:players';
        }

        if ($request->nisn != $player->nisn) {
            $rules['nisn'] = 'required|min:2|numeric|unique:players';
        }

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($player->photo) {
                Storage::delete($player->photo);
            }
            $validateData['photo'] = $request->file('photo')->store('profile-image');
        }

        $validateData['slug'] = slug($request->name);

        if ($request->birthDate != $player->birthDate) {
            $date = Carbon::createFromFormat('j F, Y', $request->birthDate);
            $formattedDate = $date->format('Y-m-d');

            $validateData['birthDate'] = $formattedDate;
        }

        $players = Player::whereId($player->id)->update($validateData);

        if ($players) {
            return redirect('player')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('player')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function player_status_update(Request $request)
    {
        Player::where('slug', $request->player)->update(['status' => $request->status]);

        return true;
    }

    public function player_read(Request $request)
    {
        $club = Club::whereId($request->club)->first();

        return view('admin.master.player.data-age-group')->with([
            'ages' => DetailZone::where('zone_id', $club->zone_id)->get(),
            'player' => Player::where('slug', $request->slug)->first()
        ]);
    }

    public function player_show(Player $player)
    {
        return view('admin.master.player.show-player')->with([
            'title' => 'Data Master',
            'subtitle' => 'Player',
            'player' => $player
        ]);
    }

    public function player_destroy(Player $player)
    {
        if ($player->deleted_at == null) {
            $player->delete();
        } 

        return redirect('player')->with([
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Move To Trash Success!'
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
        ->addColumn('validator', function ($model) {
            return view('admin.master.player.data-validator', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.master.player.form-action', compact('model'))->render();
        })
        ->rawColumns(['club', 'zone', 'validator','action'])
        ->make(true);
    }
}
