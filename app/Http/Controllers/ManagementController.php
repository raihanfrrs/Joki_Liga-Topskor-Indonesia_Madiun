<?php

namespace App\Http\Controllers;

use App\Models\AgeGroup;
use App\Models\Club;
use App\Models\DetailZone;
use App\Models\Player;
use App\Models\Zone;
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

    public function zone_index()
    {
        return view('admin.management.zone.index')->with([
            'title' => 'Management'
        ]);
    }

    public function zone_add()
    {
        return view('admin.management.zone.add-zone')->with([
            'title' => 'Management',
            'subtitle' => 'Zone',
            'ages' => AgeGroup::all()
        ]);
    }

    public function zone_store(Request $request)
    {
        $validateData = $request->validate([
            'zone' => 'required|min:2|max:255|unique:zones',
            'age' => 'required'
        ]);

        $zone = Zone::create($validateData);

        if ($zone) {
            foreach ($request->age as $item) {
                $data['zone_id'] = $zone->id;
                $data['age_group_id'] = $item;
                DetailZone::create($data);
            }

            return redirect('zone/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Adding Success!'
            ]);
        } else {
            return redirect('zone/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Adding Failed!'
            ]);
        }
    }

    public function zone_edit(Zone $zone)
    {
        return view('admin.management.zone.edit-zone')->with([
            'title' => 'Management',
            'subtitle' => 'Age Group',
            'zone' => $zone,
            'ages' => AgeGroup::all()
        ]);
    }

    public function zone_update(Request $request, Zone $zone)
    {

        if ($request->zone != $zone->zone) {
            $rules['zone'] = 'required|min:2|max:255|unique:zones';

            $validateData = $request->validate($rules);

            Zone::whereId($zone->id)->update($validateData);
        }

        DetailZone::where('zone_id', $zone->id)->delete();

        foreach ($request->age as $item) {
            $data['zone_id'] = $zone->id;
            $data['age_group_id'] = $item;
            DetailZone::create($data);
        }

        return redirect('zone')->with([
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Update Success!'
        ]);
        
    }

    public function zone_show(Zone $zone)
    {
        return view('admin.management.zone.show-zone')->with([
            'title' => 'Management',
            'subtitle' => 'Zone',
            'clubs' => Club::where('zone_id', $zone->id)->withTrashed()->get()
        ]);
    }

    public function zone_destroy(Zone $zone)
    {
        if ($zone->deleted_at == null) {
            $zone->delete();

            DetailZone::where('zone_id', $zone->id)->delete();
        } 

        return redirect('zone')->with([
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Move To Trash Success!'
        ]);
    }

    public function dataZones()
    {
        return DataTables::of(Zone::all())
        ->addColumn('group', function ($model) {
            return view('admin.management.zone.data-zone-group', compact('model'))->render();
        })
        ->addColumn('club', function ($model) {
            return view('admin.management.zone.data-club', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.management.zone.form-action', compact('model'))->render();
        })
        ->rawColumns(['group', 'action'])
        ->make(true);
    }
}
