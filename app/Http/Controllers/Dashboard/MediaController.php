<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $image = $request->file('image')->store('posts/images');

        return response()->json([
            'success' => !!$image,
            'file' => ['url' => Storage::url($image)]
        ]);
    }
}