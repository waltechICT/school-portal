<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\SchoolClass;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['subjects'] = Subject::orderBy('created_at', 'desc')->get();
        return view('admin.subject.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['school_classes'] = SchoolClass::where('is_enabled', '1')->get();
        return view('admin.subject.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:subjects,name',
        ]);

        // Store subject in the database
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->school_classes_id = $request->school_classes ?? [];
        $subject->save();

        return redirect()->route('admin.subjects.index')->with('success', 'Subject created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['subject'] = Subject::findOrFail($id);
        return view('admin.subject.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['subject'] = Subject::findOrFail($id);
        $data['school_classes'] = SchoolClass::where('is_enabled', '1')->get();
        return view('admin.subject.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:subjects,name,' . $id,
            'is_enabled' => 'required|boolean',
        ]);

        // Update subject in the database
        $subject = Subject::findOrFail($id);
        $subject->name = $request->name;
        $subject->is_enabled = $request->is_enabled;
        $subject->school_classes_id = $request->school_classes ?? [];
        $subject->save();

        return redirect()->route('admin.subjects.index')->with('success', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('admin.subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
