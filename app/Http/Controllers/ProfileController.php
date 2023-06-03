<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        if (auth()->user()->level === 'admin') {
            return view('settings.profile.index')->with([
                'title' => 'Profile',
                'subtitle' => 'Settings',
                'profile' => Admin::where('user_id', auth()->user()->id)->first()
            ]);
        }elseif (auth()->user()->level === 'user') {
            return view('settings.profile.index')->with([
                'title' => 'Profile',
                'subtitle' => 'Settings',
                'profile' => Club::where('user_id', auth()->user()->id)->first()
            ]);
        }
    }

    public function update(Request $request, User $user)
    {
        if ($user->level === 'admin') {
            $rules = [
                'email' => 'required|min:5|max:255|email:rfc,dns',
                'phone' => 'required|numeric'
            ];

            if ($request->password) {
                $password['password'] = [Password::min(8)];
            }

            $validateData = $request->validate($rules);
            $validatePassword = $request->validate($password);

            if ($request->password) {
                $validatePassword['password'] = bcrypt($request->password);

                User::whereId($user->id)->update($validatePassword);
            }

            Admin::where('user_id', $user->id)->update($validateData);

            return redirect('profile')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        }
    }
}
