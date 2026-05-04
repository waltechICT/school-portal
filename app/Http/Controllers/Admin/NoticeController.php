<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        $data['notices'] = Notice::orderBy('created_at', 'desc')->get();
        return view('admin.notices.index', $data);
    }

    public function create()
    {
        return view('admin.notices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        Notice::create($validated);

        return redirect()->route('admin.notices.index')->with('success', 'Notice created successfully.');
    }

    public function show(string $id)
    {
        $notice = Notice::findOrFail($id);
        return view('admin.notices.show', compact('notice'));
    }

    public function edit(string $id)
    {
        $notice = Notice::findOrFail($id);
        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'is_enabled'  => 'nullable|boolean',
        ]);

        $notice = Notice::findOrFail($id);
        
        $notice->update([
            'title'       => $request->title,
            'description' => $request->description,
            'is_enabled'  => $request->has('is_enabled') ? $request->is_enabled : $notice->is_enabled,
        ]);

        return redirect()->route('admin.notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(string $id)
    {
        Notice::destroy($id);  
        return redirect()->route('admin.notices.index')->with('success', 'Notice deleted successfully.');
    }
}