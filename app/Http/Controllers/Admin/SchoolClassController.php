<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolClass;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['school_classes'] = SchoolClass::orderBy('created_at', 'desc')->get();
        return view('admin.classes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:school_classes,name',
        ]);

        // Store class in the database
        $schoolClass = new SchoolClass();
        $schoolClass->name = $request->name;
        $schoolClass->save();

        return redirect()->route('admin.classes.index')->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['school_class'] = SchoolClass::findOrFail($id);
        return view('admin.classes.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['school_class'] = SchoolClass::findOrFail($id);
        return view('admin.classes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|string|max:50|unique:school_classes,name,' . $id,
            'is_enabled' => 'required|boolean',
        ]);


        $schoolClass = SchoolClass::findOrFail($id);
        // Update class in the database
        $schoolClass->name = $request->name;
        $schoolClass->is_enabled = $request->is_enabled;
        $schoolClass->save();

        return redirect()->route('admin.classes.index')->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SchoolClass::destroy($id);  
        return redirect()->route('admin.classes.index')->with('success', 'Class  deleted successfully.');
    }
}

