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

    public function editNote($noteId) { //not edit için function
        $notes = Notes::find($noteId); //not id den notları bulma
        return view('notes.edit')->with('notes', $notes);
    }

    public function updateNote(Request $request) { //update için function
        $notes = Notes::find($request->note_id); // not id den not u bulduk
        $notes->content = $request->content;  //
        $notes->save();  //save yaptık

        $courtId = $notes->court_id;

        return redirect(route('mahkeme-notlari', $courtId));

    }

    public function destroy($id) {  //silmek için (id den yakalıyoruz)
        $notes = Notes::find($id);  // notları bulduruyoruz (id den yine buluyor)
        $court = $notes->court;
        $notes->delete();

        $notes = $court->notes;
        return view('notes.list')->with('notes', $notes)->with('court_id', $court->id);
    }
}
