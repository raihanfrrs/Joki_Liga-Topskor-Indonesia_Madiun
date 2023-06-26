<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Player;
use App\Models\AgeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PlayerController extends Controller
{
    public function index()
    {
        return view('user.player.index')->with([
            'title' => 'Player',
            'subtitle' => 'Data'
        ]);
    }

    public function edit(Player $player)
    {
        return view('user.player.edit-player')->with([
            'title' => 'Player',
            'subtitle' => 'Data',
            'player' => $player,
            'ages' => AgeGroup::all()
        ]);
    }

    public function create()
    {
        return view('user.player.add-player')->with([
            'title' => 'Player',
            'subtitle' => 'Data',
            'ages' => AgeGroup::all()
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:2|max:255',
            'nik' => 'required|min:2|numeric|unique:players',
            'nisn' => 'required|min:2|numeric|unique:players',
            'birthPlace' => 'required|min:2|max:255|alpha',
            'birthDate' => 'required',
            'phone' => 'required|min:2|numeric',
            'address' => 'required',
            'position' => 'required',
            'age_group_id' => 'required',
            'photo' => 'image|file|max:2048',
            'akte' => 'image|file|max:2048',
            'kk' => 'image|file|max:2048',
            'photo_nisn' => 'image|file|max:2048'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('player-image');
        }

        if ($request->file('akte')) {
            $validateData['akte'] = $request->file('akte')->store('akte-image');
        }

        if ($request->file('kk')) {
            $validateData['kk'] = $request->file('kk')->store('kk-image');
        }

        if ($request->file('photo_nisn')) {
            $validateData['photo_nisn'] = $request->file('photo_nisn')->store('nisn-image');
        }

        $validateData['slug'] = slug($request->name);

        $date = Carbon::createFromFormat('j F, Y', $request->birthDate);
        $formattedDate = $date->format('Y-m-d');

        $validateData['birthDate'] = $formattedDate;
        $validateData['club_id'] = auth()->user()->club->id;
        $validateData['status'] = 'proses';

        $players = Player::create($validateData);

        if ($players) {
            return redirect('player-data')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Adding Success!'
            ]);
        } else {
            return redirect('player-data')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Adding Failed!'
            ]);
        }
    }

    public function update(Request $request, Player $player)
    {
        $rules = [
            'name' => 'required|min:2|max:255',
            'birthPlace' => 'required|min:2|max:255|alpha',
            'birthDate' => 'required',
            'phone' => 'required|min:2|numeric',
            'address' => 'required',
            'position' => 'required',
            'age_group_id' => 'required',
            'photo' => 'image|file|max:2048',
            'akte' => 'image|file|max:2048',
            'kk' => 'image|file|max:2048',
            'photo_nisn' => 'image|file|max:2048'
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
            $validateData['photo'] = $request->file('photo')->store('player-image');
        }

        if ($request->file('akte')) {
            if ($player->akte) {
                Storage::delete($player->akte);
            }
            $validateData['akte'] = $request->file('akte')->store('akte-image');
        }

        if ($request->file('kk')) {
            if ($player->kk) {
                Storage::delete($player->kk);
            }
            $validateData['kk'] = $request->file('kk')->store('kk-image');
        }

        if ($request->file('photo_nisn')) {
            if ($player->photo_nisn) {
                Storage::delete($player->photo_nisn);
            }
            $validateData['photo_nisn'] = $request->file('photo_nisn')->store('nisn-image');
        }

        $validateData['slug'] = slug($request->name);

        if ($request->birthDate != $player->birthDate) {
            $date = Carbon::createFromFormat('j F, Y', $request->birthDate);
            $formattedDate = $date->format('Y-m-d');

            $validateData['birthDate'] = $formattedDate;
        }

        $players = Player::whereId($player->id)->update($validateData);

        if ($players) {
            return redirect('player-data')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('player-data')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function show(Player $player)
    {
        return view('user.player.show-player')->with([
            'title' => 'Player',
            'subtitle' => 'Data',
            'player' => $player
        ]);
    }

    public function destroy(Player $player)
    {
        if ($player->deleted_at == null) {
            $player->delete();
        } 

        return redirect('player-data')->with([
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Move To Trash Success!'
        ]);
    }

    public function dataClubPlayers()
    {
        return DataTables::of(Player::where('club_id', auth()->user()->club->id))
        ->addColumn('age', function ($model) {
            return view('user.player.data-age', compact('model'))->render();
        })
        ->addColumn('birthPlaceDate', function ($model) {
            return view('user.player.data-place-date-birth', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('user.player.data-status', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('user.player.form-action', compact('model'))->render();
        })
        ->rawColumns(['age', 'status', 'action'])
        ->make(true);
    }
}
