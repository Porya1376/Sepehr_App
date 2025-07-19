<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function store(Request $request)
    {
        $timeline = $request->user()->timelines()->create();
        return response()->json($timeline);
    }

    public function index()
    {
        $timelines = Timeline::with('user:id,name,email')
            ->latest()
            ->paginate(10);

        return response()->json([
            'message' => 'Timelines fetched successfully.',
            'data' => $timelines
        ]);
    }

    public function show($id)
    {
        $timeline = Timeline::with(['user:id,name,email', 'notes', 'hashtags', 'images'])
            ->find($id);

        if (!$timeline) {
            return response()->json([
                'message' => 'Timeline not found.'
            ], 404);
        }

        return response()->json([
            'message' => 'Timeline fetched successfully.',
            'data' => $timeline
        ]);
    }

}
