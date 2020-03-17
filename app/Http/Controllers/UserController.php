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
}
