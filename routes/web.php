<?php

use App\Http\Controllers\DeleteImageController;
use App\Http\Controllers\UploadImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload/image', UploadImageController::class)->name('upload.image');
Route::delete('/delete/image', DeleteImageController::class)->name('delete.image');