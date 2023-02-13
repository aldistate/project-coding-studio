<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public function create()
    {
        return view('create_pictures');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $name = $request->name;

        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        Picture::create([
            'name' => $name,
            'path' => $path,
        ]);
        
        return Redirect::route('create_picture');
    }

    public function show(Picture $picture)
    {
        $url = Storage::url($picture->path);
        return view('show_pictures', compact('url', 'picture'));
    }

    public function delete(Picture $picture)
    {
        Storage::delete('public/' . $picture->path);
        $picture->delete();
        return Redirect::route('create_picture');
    }
}
