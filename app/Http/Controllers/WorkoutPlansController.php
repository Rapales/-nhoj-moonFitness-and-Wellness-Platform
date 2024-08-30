<?php

namespace App\Http\Controllers;

use App\Models\workout_plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class WorkoutPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    public function trainerWorkoutPlan(Request $request)
    {
        if ($request->user()) {
            return response()->json($request->user());
        }
        return response()->json(['message' => 'Unauthenticated.'], 401);

        $user = $request->user();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(workout_plans $workout_plans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(workout_plans $workout_plans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, workout_plans $workout_plans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(workout_plans $workout_plans)
    {
        //
    }
}
