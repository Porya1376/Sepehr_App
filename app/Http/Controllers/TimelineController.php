<?php

namespace App\Http\Controllers;

use App\Http\Resources\TimelineResource;
use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function store(Request $request)
    {
        $timeline = $request->user()->timelines()->create();

        return new TimelineResource($timeline);
    }

    public function index()
    {
        $timelines = Timeline::with('user:id,name,email')
            ->latest()
            ->paginate(10);

        return TimelineResource::collection($timelines)
            ->additional(['message' => 'Timelines fetched successfully.']);
    }

    public function show(Timeline $timeline)
    {
        $timeline->load(['user:id,name,email', 'notes', 'hashtags', 'images']);

        if (! $timeline) {
            return response()->json([
                'message' => 'Timeline not found.',
            ], 404);
        }

        return response()->json([
            'message' => 'Timeline fetched successfully.',
            'data' => new TimelineResource($timeline),
        ]);
    }
}
