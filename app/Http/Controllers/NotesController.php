<?php

namespace App\Http\Controllers;

use App\Notes;
use App\Court;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function courtNotes($court_id) {
        $court = Court::find($court_id);
        $notes = $court->notes;
        return view('notes.list')->with('notes', $notes)->with('court_id', $court_id);
    }

    public function createNote(Request $request) {
        $note = new Notes();
        $note->content = $request->not;
        $note->court_id = $request->courtid;
        $note->save();
        $court = Court::find($request->courtid); //court id'den court'u bulduk
        $notes = $court->notes;
        return view('notes.list')->with('notes', $notes)->with('court_id', $request->courtid);
    }
}
