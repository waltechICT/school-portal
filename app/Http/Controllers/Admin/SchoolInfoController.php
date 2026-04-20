<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolInfo;
use App\Models\EducationalLevel;

class SchoolInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['school_infos'] = SchoolInfo::orderBy('created_at', 'desc')->get();
        return view('admin.school-info.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['educational_levels'] = EducationalLevel::all();
        return view('admin.school-info.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'educational_level' => 'required',
            'school_name' => 'required|string|max:50',
            'school_address' => 'required|string|max:100',
            'school_phone' => 'required|string|max:11',
            'school_email' => 'required|string|max:50',
            'school_about' => 'required|string|max:255',
            'is_enabled' => 'required|in:0,1',
        ]);

        $school_info = new SchoolInfo();
        $school_info->educational_level_id = $request->educational_level;
        $school_info->school_name = $request->school_name;
        $school_info->school_address = $request->school_address;
        $school_info->school_phone = $request->school_phone;
        $school_info->school_email = $request->school_email;
        $school_info->school_about = $request->school_about;
        $school_info->is_enabled = $request->is_enabled;
        $school_info->save();

        return redirect()->route('admin.school-info.index')->with('success', 'School info created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['school_info'] = SchoolInfo::findOrFail($id);
        return view('admin.school-info.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['school_info'] = SchoolInfo::findOrFail($id);
        $data['educational_levels'] = EducationalLevel::all();
        return view('admin.school-info.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'educational_level' => 'required',
            'school_name' => 'required|string|max:50',
            'school_address' => 'required|string|max:100',
            'school_phone' => 'required|string|max:11',
            'school_email' => 'required|string|max:50',
            'school_about' => 'required|string|max:255',
            'is_enabled' => 'required|in:0,1',
        ]);


        $school_info = SchoolInfo::findOrFail($id);
        $school_info->educational_level_id = $request->educational_level;
        $school_info->school_name = $request->school_name;
        $school_info->school_address = $request->school_address;
        $school_info->school_phone = $request->school_phone;
        $school_info->school_email = $request->school_email;
        $school_info->school_about = $request->school_about;
        $school_info->is_enabled = $request->is_enabled;
        $school_info->save();

        return redirect()->route('admin.school-info.index')->with('success', 'School info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SchoolInfo::destroy($id);
        return redirect()->route('admin.school-info.index')->with('success', 'School info deleted successfully.');
    }
}
