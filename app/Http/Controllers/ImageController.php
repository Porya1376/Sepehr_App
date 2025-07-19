<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'timeline_id' => 'required|exists:timelines,id',
            'path' => 'required|string'
        ]);

        $image = Image::create($request->only(['timeline_id', 'path']));

        return response()->json([
            'message' => 'Image created successfully',
            'data' => $image
        ]);
    }

    public function index()
    {
        return response()->json([
            'message' => 'List of images',
            'data' => Image::with('timeline:id')->paginate(10)
        ]);
    }

}
