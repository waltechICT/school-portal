<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['galleries'] = Gallery::latest()->get();
        return view('admin.gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:150|unique:galleries,title',
            'description'   => 'nullable|string',
            'images'        => 'required|array',
            'images.*'      => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_enabled'    => 'required|in:0,1',
        ]);

        $gallery = new Gallery();
        $gallery->title          = $request->title;
        $gallery->description    = $request->description;
        $gallery->is_enabled     = $request->is_enabled;

        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
                $uploadedImages[] = 'uploads/' . $filename;
            }
        }
        $gallery->images = $uploadedImages;

        $gallery->save();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery created successfully with ' . count($uploadedImages) . ' image(s).');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['gallery'] = Gallery::findOrFail($id);
        return view('admin.gallery.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['gallery'] = Gallery::findOrFail($id);
        return view('admin.gallery.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'         => 'required|string|max:150|unique:galleries,title,' . $id,
            'description'   => 'nullable|string',
            'images'        => 'nullable|array',
            'images.*'      => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_enabled'    => 'required|in:0,1',
        ]);

        $gallery = Gallery::findOrFail($id);
        $gallery->title          = $request->title;
        $gallery->description    = $request->description;
        $gallery->is_enabled     = $request->is_enabled;

        $currentImages = $gallery->images ?? [];

        // image removal
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $imgToRemove) {
                if (($key = array_search($imgToRemove, $currentImages)) !== false) {
                    if (file_exists(public_path($imgToRemove))) {
                        unlink(public_path($imgToRemove));
                    }
                    unset($currentImages[$key]);
                }
            }
            $currentImages = array_values($currentImages); 
        }

        // new image 
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
                $currentImages[] = 'uploads/' . $filename;
            }
        }

        $gallery->images = $currentImages;
        $gallery->save();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->images && is_array($gallery->images)) {
            foreach ($gallery->images as $img) {
                if (file_exists(public_path($img))) {
                    unlink(public_path($img));
                }
            }
        }

        $gallery->delete();
        return redirect()->route('admin.galleries.index')
            ->with('success', 'Gallery item deleted successfully.');
    }
}
