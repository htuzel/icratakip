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
        return view('notes.list')->with('notes', $notes);
    }
}
