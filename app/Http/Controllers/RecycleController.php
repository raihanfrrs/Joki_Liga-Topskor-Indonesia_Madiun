<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecycleController extends Controller
{
    public function index()
    {
        if (auth()->user()->level === 'admin') {
            return view('admin.recycle.index')->with([
                'title' => 'Recycle'
            ]);
        }elseif (auth()->user()->level === 'user') {
            return view('user.recycle.index')->with([
                'title' => 'Recycle'
            ]);
        }
    }
}
