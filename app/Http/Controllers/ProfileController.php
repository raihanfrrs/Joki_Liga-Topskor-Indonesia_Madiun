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
                'phone' => 'required|numeric',
                'name' => 'required|min:5|max:255',
            ];

            if ($request->username != $user->username) {
                $users = $request->validate([
                    'username' => 'required|min:5|max:255'
                ]);

                User::whereId($user->id)->update($users);
            }

            if ($request->password) {
                $users = $request->validate([
                    'password' => [Password::min(8)]
                ]);
                
                $users['password'] = bcrypt($request->password);

                User::whereId($user->id)->update($users);
            }

            $validateData = $request->validate($rules);

            Admin::where('user_id', $user->id)->update($validateData);

            return redirect('profile')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } elseif ($user->level === 'user') {
            if ($request->username != $user->username) {
                $users = $request->validate([
                    'username' => 'required|min:5|max:255'
                ]);

                User::whereId($user->id)->update($users);
            }

            if ($request->password) {
                $users = $request->validate([
                    'password' => [Password::min(8)]
                ]);
                
                $users['password'] = bcrypt($request->password);

                User::whereId($user->id)->update($users);
            }

            return redirect('profile')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        }
    }
}
