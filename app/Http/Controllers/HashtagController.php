<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'timeline_id' => 'required|exists:timelines,id',
            'name' => 'required|string'
        ]);

        $hashtag = Hashtag::create($request->only(['timeline_id', 'name']));

        return response()->json([
            'message' => 'Hashtag created successfully',
            'data' => $hashtag
        ]);
    }

    public function index()
    {
        return response()->json([
            'message' => 'List of hashtags',
            'data' => Hashtag::with('timeline:id')->paginate(10)
        ]);
    }

}
