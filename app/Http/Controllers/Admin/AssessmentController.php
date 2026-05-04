<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assessment;

class AssessmentController extends Controller
{
    /**
     * Display a listing of assessments.
     */
    public function index()
    {
        // Matches your index.blade.php loop variable $assessment
        $data['assessment'] = Assessment::orderBy('created_at', 'desc')->get();
        return view('admin.assessment.index', $data);
    }

    /**
     * Show the form for creating a new assessment.
     */
    public function create()
    {
        return view('admin.assessment.create');
    }

    /**
     * Store a newly created assessment in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'title' => 'required|string', // This is your 'Title' (Content) column
        ]);

        // Automatically enable new assessments
        $validated['is_enabled'] = true;

        Assessment::create($validated);

        return redirect()->route('admin.assessment.index')
            ->with('success', 'Assessment created successfully.');
    }

    /**
     * Display the specified assessment.
     */
    public function show(string $id)
    {
        $assessment = Assessment::findOrFail($id);
        return view('admin.assessment.show', compact('assessment'));
    }

    /**
     * Show the form for editing the specified assessment.
     */
    public function edit(string $id)
    {
        $assessment = Assessment::findOrFail($id);
        return view('admin.assessment.edit', compact('assessment'));
    }

    /**
     * Update the specified assessment in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'title'      => 'required|string',
            'is_enabled' => 'required|boolean',
        ]);

        $assessment = Assessment::findOrFail($id);
        
        $assessment->update([
            'name'       => $request->name,
            'title'      => $request->title,
            'is_enabled' => $request->is_enabled,
        ]);

        return redirect()->route('admin.assessment.index')
            ->with('success', 'Assessment updated successfully.');
    }

    /**
     * Remove the specified assessment from storage.
     */
    public function destroy(string $id)
    {
        $assessment = Assessment::findOrFail($id);
        $assessment->delete();

        return redirect()->route('admin.assessment.index')
            ->with('success', 'Assessment deleted successfully.');
    }
}