<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arm;
use App\Models\SchoolClass;

class ArmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['arms'] = Arm::orderBy('created_at', 'desc')->get();
        return view('admin.arms.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['school_classes'] = SchoolClass::all();
        return view('admin.arms.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:50|unique:arms,name',
        ]);

        // Store subject in the database
        $arm = new Arm();
        $arm->name = $request->name;
        $arm->save();


        return redirect()->route('admin.arms.index')->with('success', 'Arm created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['arm'] = Arm::findOrFail($id);
        return view('admin.arms.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['arm'] = Arm::findOrFail($id);
        return view('admin.arms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:arms,name,' . $id,
            'is_enabled' => 'required|boolean',
        ]);

        // Update arm in the database
        $arm = Arm::findOrFail($id);
        $arm->name = $request->name;
        $arm->is_enabled = $request->is_enabled;
        $arm->save();

        return redirect()->route('admin.arms.index')->with('success', 'Arm updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $arm = Arm::findOrFail($id);
        $arm->delete();
        return redirect()->route('admin.arms.index')->with('success', 'Arm deleted successfully.');
    }
}
