<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->hasFile('image')) {
            return response()->json(['message' => "Image doesn't exsit"], 400);
        }

        if (!Storage::directoryExists('images')) {
            Storage::makeDirectory('images');
        }

        $image = $request->image;
        $folder = uniqid('image-');

        $path = 'images/' . $folder;
        $file = $image;
        $name = $image->getClientOriginalName();

        Storage::putFileAs($path, $file, $name);
        Image::create([
            'name' => $name,
            'path' => $path
        ]);

        return response()->json(['message' => "Image uploaded succesfully!"]);
    }
}
