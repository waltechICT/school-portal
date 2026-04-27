<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['staff'] = Staff::orderBy('created_at', 'desc')->get();
        return view('admin.staff.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:staff,email',
            'phone'      => 'nullable|string|max:30',
            'sex'        => 'nullable|string|max:10',
            'password'   => 'required|string|min:8',
            'role'        => 'nullable|string|max:50',
            'photo'      => 'nullable|image|max:5120',
            'is_enabled' => 'required|in:1,0',
        ]);

        $staff = new Staff();
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->sex = $request->sex;
        $staff->password = bcrypt($request->password);
        $staff->role = $request->role; // Ensure your DB column is capitalized 'role' or change to 'role'
        $staff->is_enabled = $request->is_enabled;

        if ($request->hasFile('photo')) {
            $staff->photo = $request->file('photo')->store('staff_photos', 'public');
        }

        $staff->save();

        return redirect()->route('admin.staff.index')->with('success', 'Staff member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['staff'] = Staff::findOrFail($id);
        return view('admin.staff.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['staff'] = Staff::findOrFail($id);
        return view('admin.staff.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $request->validate([
        'name'       => 'required|string|max:255',
        'email'      => 'required|email|unique:staff,email,' . $id,
        'phone'      => 'nullable|string|max:30',
        'sex'        => 'required|string|max:10',   // if required
        'password'   => 'nullable|string|min:8',    // FIXED: added nullable
        'role'        => 'nullable|string|max:50',
        'photo'      => 'nullable|image|max:5120',
        'is_enabled' => 'required|in:1,0',
    ]);

    $staff = Staff::findOrFail($id);
    $staff->name = $request->name;
    $staff->email = $request->email;
    $staff->phone = $request->phone;
    $staff->sex = $request->sex;
    $staff->role = $request->role;
    $staff->is_enabled = $request->is_enabled;

    if ($request->filled('password')) {
        $staff->password = bcrypt($request->password);
    }

    if ($request->hasFile('photo')) {
        // Optional: delete old photo
        if ($staff->photo && \Storage::disk('public')->exists($staff->photo)) {
            \Storage::disk('public')->delete($staff->photo);
        }
        $staff->photo = $request->file('photo')->store('staff_photos', 'public');
    }

    $staff->save();

    return redirect()->route('admin.staff.index')->with('success', 'Staff member updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Staff::destroy($id);
        return redirect()->route('admin.staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
