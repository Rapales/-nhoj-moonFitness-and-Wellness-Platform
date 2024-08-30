<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserMail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'age' => 'required|integer',
            'phone_number' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $password = $request->input('password');

        $user = new User([
            'name' => $request->name,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($password),
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatar', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save(); 

        return redirect()->route('users.index')->with('success', 'User has been created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        {
            // Find the user by ID
            $user = User::findOrFail($id);

            // Validate the incoming request
            $validatedData = $request->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'name' => 'required|string|max:255',
                'age' => 'required|integer',
                'phone_number' => 'required|string|max:15',
                'gender' => 'required|string',
                'role' => 'required|string',
                'email' => 'required|email',
            ]);

            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatar', 'public');
                $user->avatar = $avatarPath;
            }
    
            $user->save(); 

            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        }

    }

    public function destroy($id): RedirectResponse
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'User has been deleted successfully!');
    }
}
