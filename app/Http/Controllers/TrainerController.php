<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trainers;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $trainers = Trainers::with('users')->orderBy('created_at', 'desc')->get();


        // dd($trainers);

        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'trainer')->pluck('name', 'id');
        return view('trainers.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'trainer_id' => 'required',
            'specialization' => 'required',
            'experience_year' => 'required',
        ]);

        $create = new Trainers([
            'trainer_id' => $request->trainer_id,
            'specialization' => $request->specialization,
            'experience_year' => $request->experience_year
        ]);

        $create->save();

        return redirect()->route('trainers.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Trainers::with('users')->findorFail($id);
        $users = User::where('role', 'trainer')->pluck('name', 'id');
        return view('trainers.edit', compact('row', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'trainer_id' => 'required',
            'specialization' => 'required',
            'experience_year' => 'required'

        ]);

        $trainer = Trainers::findOrFail($id);

        $trainer->trainer_id = $request->input('trainer_id');
        $trainer->specialization = $request->input('specialization');
        $trainer->experience_year = $request->input('experience_year');

        $trainer->save();

        return redirect()->route('trainers.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trainer = Trainers::findOrFail($id);

        $trainer->delete();

        return redirect()->route('trainers.index')->with('success', 'Updated Successfully');
    }
}
