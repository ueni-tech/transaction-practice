<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HelloController extends Controller
{
  public function index()
  {
    $notes = Note::all();
    return view('form', compact('notes'));
  }

  public function sampleStore(Request $request)
  {
    // $note = Note::find(1);
    // $note->content = $request->input('content1');
    // $note->save();
    // $note2 = Note::find(2);
    // $note2->content = $request->input('content2');
    // $note2->save();
    // $notes = Note::all();
    try {
      DB::transaction(function () use (&$request) {
        $note = Note::find(1);
        $note->content = $request->input('content1');
        $note->save();
        $note2 = Note::find(2);
        $note2->content = $request->input('content2');
        $note2->save();
      });
    } catch(\Exception $e) {
      return back()->withErrors($e->getMessage());
    }
    return back();
  }
}
