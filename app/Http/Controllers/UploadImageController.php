<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->hasFile('image')) {
            return response()->json(['message' => "Image doesn't exsit"], 400);
        }

        $image = $request->image;
    }
}
