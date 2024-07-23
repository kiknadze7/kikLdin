<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Get all files from the public/images directory
        $images = File::files(public_path('images'));

        // Pass the file paths to the view
        return view('imageUpload', compact('images'));
    }

    /**
     * Store a newly uploaded image in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        /* 
            Write Code Here for
            Store $imageName name in DATABASE from HERE 
        */

        return back()->with('success', 'Image uploaded successfully!')
            ->with('image', $imageName);
    }
}
