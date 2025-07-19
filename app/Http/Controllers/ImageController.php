<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;

class ImageController extends Controller
{
    public function store(ImageRequest $request)
    {

        $image = Image::create($request->validated());

        return response()->json([
            'message' => 'Image created successfully',
            'data' => new ImageResource($image),
        ]);
    }

    public function index()
    {
        return response()->json([
            'message' => 'List of images',
            'data' => ImageResource::collection(Image::with('timeline:id')->paginate(10)),
        ]);
    }
}
