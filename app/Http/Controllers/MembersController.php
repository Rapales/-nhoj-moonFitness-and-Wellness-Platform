<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use App\Models\User;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $members = Members::with('usersMembers')->with('usersTrainers')->orderBy('created_at', 'desc')->get();

        // dd($members);
        return view('Members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $trainers = User::where('role', 'trainer')->pluck('name', 'id');
        $members = User::where('role', 'member')->pluck('name', 'id');

        return view('Members.create', compact('trainers', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'trainer_id' => 'required',
            'member_id' => 'required',
            'fitness_level' => 'required',
        ]);

        $create = new Members([
            'trainer_id' => $request->trainer_id,
            'member_id' => $request->member_id,
            'fitness_level' => $request->fitness_level
        ]);

        $create->save();

        return redirect()->route('Members.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Members $members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $row = Members::with('users')->findorFail($id);
        $trainers = User::where('role', 'trainer')->pluck('name', 'id');
        $members = User::where('role', 'member')->pluck('name', 'id');

        return view('members.edit', compact('row', 'trainers', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'trainer_id' => 'required',
            'member_id' => 'required',
            'fitness_level' => 'required',
        ]);

        $update = Members::findOrFail($id);

        $update->trainer_id = $request->input('trainer_id');
        $update->member_id = $request->input('member_id');
        $update->fitness_level = $request->input('fitness_level');

        $update->save();

        return redirect()->route('Members.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $delete = Members::findOrFail($id);

        $delete->delete();

        return redirect()->route('Members.index')->with('success', 'Deleted Successfully');
    }
}
