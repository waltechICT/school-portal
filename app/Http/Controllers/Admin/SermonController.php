<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sermon;
use Illuminate\Support\Facades\Storage;

class SermonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sermons'] = Sermon::latest()->get();
        return view('admin.sermon.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sermon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:150|unique:sermons,title',
            'description'   => 'nullable|string',
            'date'          => 'nullable|date',
            'scripture'     => 'nullable|string|max:255',
            'speaker'       => 'nullable|string|max:150',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url'     => 'nullable|url',
            'audio_url'     => 'nullable|url',
            'is_enabled'    => 'required|in:0,1',
        ]);

        $sermon = new Sermon();
        $sermon->title          = $request->title;
        $sermon->description    = $request->description;
        $sermon->date           = $request->date;
        $sermon->scripture      = $request->scripture;
        $sermon->speaker        = $request->speaker;
        $sermon->video_url      = $request->video_url;
        $sermon->audio_url      = $request->audio_url;
        $sermon->is_enabled     = $request->is_enabled;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $sermon->image = 'uploads/' . $filename;
        }

        $sermon->save();

        return redirect()->route('admin.sermons.index')
            ->with('success', 'Sermon created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['sermon'] = Sermon::findOrFail($id);

        return view('admin.sermon.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['sermon'] = Sermon::findOrFail($id);
        return view('admin.sermon.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255|unique:sermons,title,' . $id,
            'description'   => 'nullable|string',
            'date'          => 'nullable|date',
            'scripture'     => 'nullable|string|max:255',
            'speaker'       => 'nullable|string|max:150',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video_url'     => 'nullable|url',
            'audio_url'     => 'nullable|url',
            'is_enabled'    => 'required|in:0,1',
        ]);

        $sermon = Sermon::findOrFail($id);
        $sermon->title          = $request->title;
        $sermon->description    = $request->description;
        $sermon->date           = $request->date;
        $sermon->scripture      = $request->scripture;
        $sermon->speaker        = $request->speaker;
        $sermon->video_url      = $request->video_url;
        $sermon->audio_url      = $request->audio_url;
        $sermon->is_enabled     = $request->is_enabled;

        if ($request->hasFile('image')) {
            if ($sermon->image && file_exists(public_path($sermon->image))) {
                unlink(public_path($sermon->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $sermon->image = 'uploads/' . $filename;
        }

        $sermon->save();

        return redirect()->route('admin.sermons.index')
            ->with('success', 'Sermon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sermon = Sermon::findOrFail($id);

        if ($sermon->image && file_exists(public_path($sermon->image))) {
            unlink(public_path($sermon->image));
        }

        $sermon->delete();
        return redirect()->route('admin.sermons.index')->with('success', 'Sermon deleted successfully.');
    }
}