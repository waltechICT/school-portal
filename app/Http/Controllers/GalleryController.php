<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $galleries = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('gallery.index', compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        if ($gallery->is_enabled == 0) {
            abort();
        }

        $relatedGalleries = Gallery::where('id', '!=', $gallery->id)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('gallery.show', compact('gallery', 'relatedGalleries'));
    }

    public function create() { /* ... */ }
    public function store(Request $request) { /* ... */ }
    public function edit(string $id) { /* ... */ }
    public function update(Request $request, string $id) { /* ... */ }
    public function destroy(string $id) { /* ... */ }
}