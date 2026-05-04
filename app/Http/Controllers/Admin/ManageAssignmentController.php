<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageAssignmentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments = \App\Models\ManageAssignment::with(['schoolClass', 'subject', 'staff'])
            ->latest()
            ->get();

        return view('admin.assignment.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $school_classes = \App\Models\SchoolClass::where('is_enabled', '1')->get();
        $subjects = \App\Models\Subject::where('is_enabled', '1')->get();
        return view('admin.assignment.create', compact('school_classes', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_class_id' => 'nullable|exists:school_classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'note' => 'nullable|string',
            'submittion_date' => 'nullable|date_format:Y-m-d\TH:i|before_or_equal:9999-12-31T23:59',
        ]);

        $data = $request->only(['school_class_id', 'subject_id', 'note', 'submittion_date']);
        $data['staff_id'] = auth()->id();

        if (! empty($data['submittion_date'])) {
            $data['submittion_date'] = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $data['submittion_date'])
                ->format('Y-m-d H:i:s');
        }

        \App\Models\ManageAssignment::create($data);

        return redirect()->route('admin.assignment.management')->with('success', 'Assignment created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assignment = \App\Models\ManageAssignment::with(['schoolClass', 'subject', 'staff'])->findOrFail($id);
        return view('admin.assignment.show', compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assignment = \App\Models\ManageAssignment::findOrFail($id);
        $school_classes = \App\Models\SchoolClass::where('is_enabled', '1')->get();
        $subjects = \App\Models\Subject::where('is_enabled', '1')->get();
        return view('admin.assignment.edit', compact('assignment', 'school_classes', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'school_class_id' => 'nullable|exists:school_classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'note' => 'nullable|string',
            'submittion_date' => 'nullable|date_format:Y-m-d\TH:i|before_or_equal:9999-12-31T23:59',
        ]);

        $assignment = \App\Models\ManageAssignment::findOrFail($id);

        $data = $request->only(['school_class_id', 'subject_id', 'note', 'submittion_date']);
        $data['staff_id'] = auth()->id();

        if (! empty($data['submittion_date'])) {
            $data['submittion_date'] = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $data['submittion_date'])
                ->format('Y-m-d H:i:s');
        }

        $assignment->update($data);

        return redirect()->route('admin.assignment.management')->with('success', 'Assignment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assignment = \App\Models\ManageAssignment::findOrFail($id);

        $assignment->delete();

        return redirect()->route('admin.assignment.management')->with('success', 'Assignment deleted successfully.');
    }
}
