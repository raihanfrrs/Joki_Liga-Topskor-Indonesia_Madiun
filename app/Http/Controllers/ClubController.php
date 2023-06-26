<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    public function index()
    {
        return view('user.club.index')->with([
            'title' => 'Club',
            'subtitle' => 'Data',
            'club' => Club::where('user_id', auth()->user()->id)->first()
        ]);
    }

    public function edit($club)
    {
        $club = Club::where('slug', $club)->orWhere('id', $club)->first();

        return view('user.club.edit-club')->with([
            'title' => 'Club',
            'subtitle' => 'Data',
            'club' => $club
        ]);
    }

    public function update(Request $request, $club)
    {
        $club = Club::where('slug', $club)->orWhere('id', $club)->first();

        $rules = [
            'name' => 'required|min:2|max:255',
            'phone' => 'required|min:2|numeric',
            'address' => 'required',
            'social_media' => 'required',
            'club_manager' => 'required',
            'logo' => 'image|file|max:2048'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('logo')) {
            if ($club->logo) {
                Storage::delete($club->logo);
            }
            $validateData['logo'] = $request->file('logo')->store('club-image');
        }

        if ($request->hasFile('surat_rekomendasi')) {
            if ($club->surat_rekomendasi) {
                Storage::delete($club->surat_rekomendasi);
            }

            $surat_rekomendasi = $request->file('surat_rekomendasi');

            $unique = uniqid('post', true);
            $file_name = $surat_rekomendasi->store('surat_rekomendasi/' . $unique);

            Club::whereId($club->id)->update(['surat_rekomendasi' => $file_name]);
        }

        if ($request->hasFile('surat_pendirian')) {
            if ($club->surat_pendirian) {
                Storage::delete($club->surat_pendirian);
            }
            
            $surat_pendirian = $request->file('surat_pendirian');

            $unique = uniqid('post', true);
            $file_name = $surat_pendirian->store('surat_pendirian/' . $unique);

            Club::whereId($club->id)->update(['surat_pendirian' => $file_name]);
        }

        if ($request->hasFile('surat_kepengurusan')) {
            if ($club->surat_kepengurusan) {
                Storage::delete($club->surat_kepengurusan);
            }

            $surat_kepengurusan = $request->file('surat_kepengurusan');

            $unique = uniqid('post', true);
            $file_name = $surat_kepengurusan->store('surat_kepengurusan/' . $unique);

            Club::whereId($club->id)->update(['surat_kepengurusan' => $file_name]);
        }

        if ($request->hasFile('susunan_pemain')) {
            if ($club->susunan_pemain) {
                Storage::delete($club->susunan_pemain);
            }

            $susunan_pemain = $request->file('susunan_pemain');

            $unique = uniqid('post', true);
            $file_name = $susunan_pemain->store('susunan_pemain/' . $unique);

            Club::whereId($club->id)->update(['susunan_pemain' => $file_name]);
        }

        if ($request->hasFile('surat_perpindahan')) {
            if ($club->surat_perpindahan) {
                Storage::delete($club->surat_perpindahan);
            }

            $surat_perpindahan = $request->file('surat_perpindahan');

            $unique = uniqid('post', true);
            $file_name = $surat_perpindahan->store('surat_perpindahan/' . $unique);

            Club::whereId($club->id)->update(['surat_perpindahan' => $file_name]);
        }

        $validateData['slug'] = slug($request->name);

        $clubs = $club->update($validateData);

        if ($clubs) {
            return redirect('club-data')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('club-data')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }
}
