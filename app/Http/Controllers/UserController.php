<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function registerUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->tcn = $request->tcn;
        $password = $request->tcn . '123';
        $user->password = Hash::make($password);
        $user->save();
        return redirect('home');
    }

    public function editUser($userid) {
        $user = User::find($userid);
        return view('user.edit')->with('user', $user);
    }

    public function updateUser(Request $request) {
        $user = User::find($request->userid);
        $user->name = $request->name;
        $user->tcn = $request->tcn;
        $user->save();
        return view('user.list');

    }

    public function changePassword(Request $request) {

        $request->validate([
            'password' => 'min:6|required_with:password1|same:password1',
            'password1' => 'min:6',
        ]);

        $user = User::find($request->userid);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('home');

    }

}
