<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;

class NoteController extends Controller
{
    public function store(NoteRequest $request)
    {

        $note = Note::create($request->validated());

        return response()->json([
            'message' => 'Note created successfully',
            'data' => new NoteResource($note),
        ]);
    }

    public function index()
    {
        return response()->json([
            'message' => 'List of notes',
            'data' => NoteResource::collection(Note::with('timeline:id')->paginate(10)),
        ]);
    }
}
