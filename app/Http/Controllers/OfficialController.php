<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Official;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class OfficialController extends Controller
{
    public function index()
    {
        return view('user.official.index')->with([
            'title' => 'Official',
            'subtitle' => 'Data'
        ]);
    }

    public function create()
    {
        return view('user.official.add-official')->with([
            'title' => 'Official',
            'subtitle' => 'Data'
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:2|max:255',
            'birthPlace' => 'required|min:2|max:255|alpha',
            'birthDate' => 'required',
            'phone' => 'required|min:2|numeric',
            'email' => 'required|min:5|max:255|email:rfc,dns',
            'social_media' => 'required|min:2|max:255',
            'position' => 'required',
            'photo' => 'image|file|max:2048',
            'licence_photo' => 'image|file|max:2048',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('official-image');
        }

        if ($request->file('licence_photo')) {
            $validateData['licence_photo'] = $request->file('licence_photo')->store('licence-image');
        }

        $validateData['slug'] = slug($request->name);

        $date = Carbon::createFromFormat('j F, Y', $request->birthDate);
        $formattedDate = $date->format('Y-m-d');

        $validateData['birthDate'] = $formattedDate;
        $validateData['club_id'] = auth()->user()->club->id;
        $validateData['status'] = 'proses';

        $officials = Official::create($validateData);

        if ($officials) {
            return redirect('official-data/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Add Success!'
            ]);
        } else {
            return redirect('official-data/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Add Failed!'
            ]);
        }
    }

    public function edit(Official $official)
    {
        return view('user.official.edit-official')->with([
            'title' => 'Official',
            'subtitle' => 'Data',
            'official' => $official
        ]);
    }

    public function show(Official $official)
    {
        return view('user.official.show-official')->with([
            'title' => 'Official',
            'subtitle' => 'Data',
            'official' => $official
        ]);
    }

    public function official_pdf()
    {
        $data = Official::where('club_id', auth()->user()->club->id)->withTrashed()->get();
        $pdf = PDF::loadView('user.official.official-pdf', ['data'=>$data]);
        $pdf->setPaper('A4', 'potrait');

        return $pdf->stream('official.pdf');
    }

    public function update(Request $request, Official $official)
    {
        $rules = [
            'name' => 'required|min:2|max:255',
            'birthPlace' => 'required|min:2|max:255|alpha',
            'birthDate' => 'required',
            'phone' => 'required|min:2|numeric',
            'email' => 'required|min:5|max:255|email:rfc,dns',
            'social_media' => 'required|min:2|max:255',
            'position' => 'required',
            'photo' => 'image|file|max:2048',
            'licence_photo' => 'image|file|max:2048',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($official->photo) {
                Storage::delete($official->photo);
            }
            
            $validateData['photo'] = $request->file('photo')->store('official-image');
        }

        if ($request->file('licence_photo')) {
            if ($official->licence_photo) {
                Storage::delete($official->licence_photo);
            }

            $validateData['licence_photo'] = $request->file('licence_photo')->store('licence-image');
        }

        $validateData['slug'] = slug($request->name);

        if ($request->birthDate != $official->birthDate) {
            $date = Carbon::createFromFormat('j F, Y', $request->birthDate);
            $formattedDate = $date->format('Y-m-d');

            $validateData['birthDate'] = $formattedDate;
        }

        $officials = Official::whereId($official->id)->update($validateData);

        if ($officials) {
            return redirect('official-data')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('official-data')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function destroy(Official $official)
    {
        if ($official->deleted_at == null) {
            $official->delete();
        } 

        return redirect('official-data')->with([
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Move To Trash Success!'
        ]);
    }

    public function dataClubOfficials()
    {
        return DataTables::of(Official::where('club_id', auth()->user()->club->id))
        ->addColumn('birthPlaceDate', function ($model) {
            return view('user.official.data-place-date-birth', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('user.official.data-status', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('user.official.form-action', compact('model'))->render();
        })
        ->rawColumns(['status','action'])
        ->make(true);
    }
}
