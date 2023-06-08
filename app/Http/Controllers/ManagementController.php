<?php

namespace App\Http\Controllers;

use App\Models\AgeGroup;
use App\Models\Player;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManagementController extends Controller
{
    public function age_index()
    {
        return view('admin.management.age.index')->with([
            'title' => 'Management',
            'subtitle' => 'Age Group'
        ]);
    }

    public function age_add()
    {
        return view('admin.management.age.add-age')->with([
            'title' => 'Management',
            'subtitle' => 'Age Group'
        ]);
    }

    public function age_store(Request $request)
    {
        $validateData = $request->validate([
            'age' => 'required|min:2|max:255|unique:age_groups'
        ]);

        $agegroup = AgeGroup::create($validateData);

        if ($agegroup) {
            return redirect('age/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Adding Success!'
            ]);
        } else {
            return redirect('age/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Adding Failed!'
            ]);
        }
    }

    public function age_edit(AgeGroup $age)
    {
        return view('admin.management.age.edit-age')->with([
            'title' => 'Management',
            'subtitle' => 'Age Group',
            'age' => $age
        ]);
    }

    public function age_update(Request $request, AgeGroup $age)
    {
        $validateData = $request->validate([
            'age' => 'required|min:2|max:255|unique:age_groups'
        ]);

        $agegroup = AgeGroup::whereId($age->id)->update($validateData);

        if ($agegroup) {
            return redirect('age')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('age')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }
    public function age_destroy(AgeGroup $age)
    {
        if ($age->deleted_at == null) {
            $age->delete();
        }

        return redirect('age')->with([
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Move To Trash Success!'
        ]);
    }

    public function age_show(AgeGroup $age)
    {
        return view('admin.management.age.show-age')->with([
            'title' => 'Management',
            'subtitle' => 'Age Group',
            'players' => Player::where('age_group_id', $age->id)->withTrashed()->get()
        ]);
    }

    public function dataAgeGroups()
    {
        return DataTables::of(AgeGroup::all())
        ->addColumn('amount', function ($model) {
            return view('admin.management.age.data-amount', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.management.age.form-action', compact('model'))->render();
        })
        ->rawColumns(['amount', 'action'])
        ->make(true);
    }
}
