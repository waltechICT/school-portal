<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of roles.
     */
    public function index()
    {
        $data['roles'] = Role::orderBy('name')->paginate(15);
        return view('admin.role.index', $data);
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created role.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:roles,name',
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Show the form for editing a role.
     */
    public function edit(string $id)
    {
        $data['role'] = Role::findOrFail($id);
        return view('admin.role.edit', $data);
    }

    /**
     * Update the specified role.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100|unique:roles,name,' . $id,
        ]);

        $role->update(['name' => $request->name]);

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified role.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
