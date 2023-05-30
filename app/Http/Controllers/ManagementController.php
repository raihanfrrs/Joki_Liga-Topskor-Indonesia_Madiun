<?php

namespace App\Http\Controllers;

use App\Models\AgeGroup;
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

    public function dataAgeGroups()
    {
        return DataTables::of(AgeGroup::all())
        ->addColumn('amount', function ($model) {
            return view('admin.management.age.amount', compact('model'))->render();
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

    public function dataZones()
    {
        return DataTables::of(Zone::all())
        ->addColumn('action', function ($model) {
            return view('admin.management.zone.form-action', compact('model'))->render();
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
