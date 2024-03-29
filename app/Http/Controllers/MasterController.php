<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Club;
use App\Models\Mail;
use App\Models\User;
use App\Models\Player;
use App\Models\AgeGroup;
use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
            'club' => $club
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
        ->addColumn('action', function ($model) {
            return view('admin.master.club.form-action', compact('model'))->render();
        })
        ->addColumn('option', function ($model) {
            return view('admin.master.club.form-option', compact('model'))->render();
        })
        ->rawColumns(['action', 'option'])
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
            'clubs' => Club::all(),
            'ages' => AgeGroup::all()
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
            $validateData['photo'] = $request->file('photo')->store('player-image');
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

    public function player_all(Club $club)
    {
        return view('admin.master.club.all-player')->with([
            'title' => 'Data Master',
            'subtitle' => 'Player of '.$club->name,
            'club' => $club,
            'players' => Player::where('club_id', $club->id)->get()
        ]);
    }

    public function dataPlayers()
    {
        return DataTables::of(Player::all())
        ->addColumn('club', function ($model) {
            return view('admin.master.player.data-club', compact('model'))->render();
        })
        ->addColumn('age', function ($model) {
            return view('admin.master.player.data-age', compact('model'))->render();
        })
        ->addColumn('birthPlaceDate', function ($model) {
            return view('admin.master.player.data-place-date-birth', compact('model'))->render();
        })
        ->addColumn('validator', function ($model) {
            return view('admin.master.player.data-validator', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.master.player.form-action', compact('model'))->render();
        })
        ->rawColumns(['club', 'age', 'birthPlaceDate','validator','action'])
        ->make(true);
    }

    public function official_index()
    {
        return view('admin.master.official.index')->with([
            'title' => 'Data Master',
            'subtitle' => 'Official'
        ]);
    }

    public function official_edit(Official $official)
    {
        return view('admin.master.official.edit-official')->with([
            'title' => 'Data Master',
            'subtitle' => 'Official',
            'official' => $official,
            'clubs' => Club::all()
        ]);
    }

    public function official_update(Request $request, Official $official)
    {

        $rules = [
            'name' => 'required|min:2|max:255',
            'birthPlace' => 'required|min:2|max:255|alpha',
            'birthDate' => 'required',
            'phone' => 'required|min:2|numeric',
            'email' => 'required|min:5|max:255|email:rfc,dns',
            'social_media' => 'required|min:2|max:255',
            'position' => 'required',
            'club_id' => 'required',
            'photo' => 'image|file|max:2048',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($official->photo) {
                Storage::delete($official->photo);
            }
            $validateData['photo'] = $request->file('photo')->store('official-image');
        }

        $validateData['slug'] = slug($request->name);

        if ($request->birthDate != $official->birthDate) {
            $date = Carbon::createFromFormat('j F, Y', $request->birthDate);
            $formattedDate = $date->format('Y-m-d');

            $validateData['birthDate'] = $formattedDate;
        }

        $officials = Official::whereId($official->id)->update($validateData);

        if ($officials) {
            return redirect('official')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('official')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function official_status_update(Request $request)
    {
        Official::where('slug', $request->official)->update(['status' => $request->status]);

        return true;
    }

    public function official_show(Official $official)
    {
        return view('admin.master.official.show-official')->with([
            'title' => 'Data Master',
            'subtitle' => 'Official',
            'official' => $official
        ]);
    }

    public function official_destroy(Official $official)
    {
        if ($official->deleted_at == null) {
            $official->delete();
        } 

        return redirect('official')->with([
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Move To Trash Success!'
        ]);
    }

    public function official_all(Club $club)
    {
        return view('admin.master.club.all-official')->with([
            'title' => 'Data Master',
            'subtitle' => 'Official of '.$club->name,
            'club' => $club,
            'officials' => Official::where('club_id', $club->id)->get()
        ]);
    }

    public function dataOfficials()
    {
        return DataTables::of(Official::all())
        ->addColumn('club', function ($model) {
            return view('admin.master.official.data-club', compact('model'))->render();
        })
        ->addColumn('birthPlaceDate', function ($model) {
            return view('admin.master.official.data-place-date-birth', compact('model'))->render();
        })
        ->addColumn('validator', function ($model) {
            return view('admin.master.official.data-validator', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.master.official.form-action', compact('model'))->render();
        })
        ->rawColumns(['club', 'zone', 'validator','action'])
        ->make(true);
    }

    public function mail_index()
    {
        return view('admin.master.mail.index')->with([
            'title' => 'Data Master',
            'subtitle' => 'Mail'
        ]);
    }

    public function mail_add()
    {
        return view('admin.master.mail.add-mail')->with([
            'title' => 'Data Master',
            'subtitle' => 'Mail'
        ]);
    }

    public function mail_store(Request $request)
    {
        $rules = [
            'name' => 'required|min:2|max:255'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('file')) {
            $validateData['file'] = $request->file('file')->store('document');
        }

        $validateData['admin_id'] = auth()->user()->id;
        $validateData['status'] = 'active';

        $mail = Mail::create($validateData);

        if ($mail) {
            return redirect('mail/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Adding Success!'
            ]);
        } else {
            return redirect('mail/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Adding Failed!'
            ]);
        }
    }

    public function mail_edit(Mail $mail)
    {
        return view('admin.master.mail.edit-mail')->with([
            'title' => 'Data Master',
            'subtitle' => 'Mail',
            'mail' => $mail
        ]);
    }

    public function mail_update(Request $request, Mail $mail)
    {
        $rules = [
            'name' => 'required|min:2|max:255'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('file')) {
            if ($mail->file) {
                Storage::delete($mail->file);
            }

            $validateData['file'] = $request->file('file')->store('document');
        }

        $validateData['admin_id'] = auth()->user()->id;

        $mail = Mail::whereId($mail->id)->update($validateData);

        if ($mail) {
            return redirect('mail')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('mail')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function mail_status_update(Request $request)
    {
        Mail::whereId($request->mail)->update(['status' => $request->status]);

        return true;
    }

    public function mail_destroy(Mail $mail)
    {
        if ($mail->deleted_at == null) {
            $mail->delete();
        } 

        return redirect('mail')->with([
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Move To Trash Success!'
        ]);
    }

    public function mail_show(Mail $mail)
    {
        return view('admin.master.mail.show-mail')->with([
            'title' => 'Data Master',
            'subtitle' => 'Mail',
            'mail' => $mail
        ]);
    }

    public function mail_download(Mail $mail)
    {
        $pathToFile = public_path("storage/{$mail->file}");
        $extension = pathinfo($mail->file, PATHINFO_EXTENSION);

        return Response::download($pathToFile, $mail->name.".".$extension);
    }

    public function dataMails()
    {
        return DataTables::of(Mail::all())
        ->addColumn('admin', function ($model) {
            return view('admin.master.mail.data-admin', compact('model'))->render();
        })
        ->addColumn('created_at', function ($model) {
            return view('admin.master.mail.data-created', compact('model'))->render();
        })
        ->addColumn('updated_at', function ($model) {
            return view('admin.master.mail.data-updated', compact('model'))->render();
        })
        ->addColumn('validator', function ($model) {
            return view('admin.master.mail.data-validator', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.master.mail.form-action', compact('model'))->render();
        })
        ->rawColumns(['validator', 'action'])
        ->make(true);
    }
}
