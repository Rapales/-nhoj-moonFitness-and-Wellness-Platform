<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); 
    }

    public function register(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'role' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }

    try {
        // Create a new user
        $user = new User();
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        // Create a token and retrieve it
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'status' => true,
            'access_token' => $token  // Ensure this is correctly sent back
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'An error occurred: ' . $e->getMessage()
        ], 500);
    }
}
}
