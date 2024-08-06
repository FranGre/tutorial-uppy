<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteImageController extends Controller
{
    public function __invoke(Request $request)
    {
        $name = $request->name;
        $image = Image::where('name', $name)->first();

        $directory = $image->path;
        Storage::deleteDirectory($directory);

        $image->delete();
    }
}
