<?php

namespace App\Http\Controllers;

use App\Models\Progress_tables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgressController extends Controller
{
    public function index()
    {
        // Retrieve all progress records from the database
        $progress = Progress_tables::get();
        
        // Pass the records to the view
        return view('progress.index', compact('progress'));
    }
    
    public function create()
    {
        return view('progress.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|integer',
            'workout_img' => 'nullable|image',
            'task_description' => 'required|string',
            'task_status' => 'required|string',
        ]);

        if ($request->hasFile('workout_img')) {
            $path = $request->file('workout_img')->store('public/images');
            $validated['workout_img'] = basename($path);
        }

        Progress_tables::create($validated);

        return redirect()->route('progress.index')->with('success', 'Record added successfully.');
    }

    public function edit($id)
    {
        $record = Progress_tables::findOrFail($id);
        return view('progress.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $record = Progress_tables::findOrFail($id);
    
        $validated = $request->validate([
            'member_id' => 'required|integer',
            'workout_img' => 'nullable|image',
            'task_description' => 'required|string',
            'task_status' => 'required|string',
        ]);
    
        if ($request->hasFile('workout_img')) {
            // Delete old image if exists
            if ($record->workout_img) {
                Storage::delete('public/images/' . $record->workout_img);
            }
            $path = $request->file('workout_img')->store('public/images');
            $validated['workout_img'] = basename($path);
        }
    
        $record->update($validated);
    
        return redirect()->route('progress.index')->with('success', 'Record updated successfully.');
    }
    
    public function destroy($id)
    {
        $record = Progress_tables::findOrFail($id);
        
        // Delete image if exists
        if ($record->workout_img) {
            Storage::delete('public/images/' . $record->workout_img);
        }

        $record->delete();

        return redirect()->route('progress.index')->with('success', 'Record deleted successfully.');
    }


}
