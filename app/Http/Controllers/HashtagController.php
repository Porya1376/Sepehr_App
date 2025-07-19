<?php

namespace App\Http\Controllers;

use App\Http\Requests\HashtagRequest;
use App\Http\Resources\HashtagResource;
use App\Models\Hashtag;

class HashtagController extends Controller
{
    public function store(HashtagRequest $request)
    {

        $hashtag = Hashtag::create($request->validated());

        return response()->json([
            'message' => 'Hashtag created successfully',
            'data' => new HashtagResource($hashtag),
        ]);
    }

    public function index()
    {
        return response()->json([
            'message' => 'List of hashtags',
            'data' => HashtagResource::collection(Hashtag::with('timeline:id')->paginate(10)),
        ]);
    }
}
