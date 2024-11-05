<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request)
{
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $path = $file->store('images', 'public');
        $url = asset("storage/{$path}");
        
        return response()->json([
            'data' => [
                'src' => $url,
                'alt' => 'Uploaded Image',
                'width' => 'auto',
                'height' => 'auto'
            ]
        ]);
    }

    return response()->json(['error' => 'No file uploaded'], 400);
}

}
