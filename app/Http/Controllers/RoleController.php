<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::orderBy('created_at', 'desc')->get();

        return view('roles.tables', compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'role_name' => 'required',
        ]);

        $create = new Role([
            'role_name' => $request->role_name,

        ]);

        $create->save();

        return redirect()->route('roles.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Role::findOrFail($id);
        return view('roles.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'role_name' => 'required',
        ]);

        $update = Role::findOrFail($id);

        $update->role_name = $request->input('role_name');

        $update->save();

        return redirect()->route('roles.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $delete = Role::findOrFail($id);

        $delete->delete();

        return redirect()->route('roles.index')->with('success', 'Deleted Successfully');
    }
}
