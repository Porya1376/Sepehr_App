<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'timeline_id' => 'required|exists:timelines,id',
            'content' => 'required|string'
        ]);

        $note = Note::create($request->only(['timeline_id', 'content']));

        return response()->json([
            'message' => 'Note created successfully',
            'data' => $note
        ]);
    }

    public function index()
    {
        return response()->json([
            'message' => 'List of notes',
            'data' => Note::with('timeline:id')->paginate(10)
        ]);
    }

}
