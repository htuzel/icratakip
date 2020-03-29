<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Court;

class CourtController extends Controller
{
    public function userCases ($userid)
    {
        $user = User::find($userid);
        $courts = $user->courts;
        return view('court.list')->with('courts', $courts)->with('user_id',$userid);
    }

    public function newCourtForm($userid)
    {
        return view('court.new')->with('userid', $userid);
    }

    public function newCourt(Request $request)
    {
        $court = new Court();
        $court->user_id = $request->userid;
        $court->casenumber = $request->casenumber;
        $court->courtname = $request->courtname;
        $court->save();
        $user = User::find($request->userid);
        $courts = $user->courts;
        return view('court.list')->with('courts', $courts)->with('user_id',$request->userid);
    }

    public function editCourt($courtid) 
    {
        $court = Court::find($courtid);
        return view('court.edit')->with('court', $court);
    }

public function updateCourt(Request $request){

    $request->validate([
        'casenumber' => 'numeric',
        'courtname' => 'alpha',
    ]);

    $court = Court::find($request->courtid);
    $court->casenumber = $request->casenumber;
    $court->courtname = $request->courtname;
    $court->save();
    $user =$court->user;  //mahkemenin kullanıcısını bulduk
    $courts = $user->courts; //kullanıcının tüm mahkemelerini bulduk ve artık bu mahkemeleri view'e gönderebiliriz.
    $user_id = $user->id;
    return view('court.list')->with('courts', $courts)->with('user_id', $user_id);
} 
    
    
}        