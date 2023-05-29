<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function age_index()
    {
        return view('admin.management.age.index')->with([
            'title' => 'Management'
        ]);
    }

    public function zone_index()
    {
        return view('admin.management.zone.index')->with([
            'title' => 'Management'
        ]);
    }
}
