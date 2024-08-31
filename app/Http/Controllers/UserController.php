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
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(10);
        return view('Users.index', compact('users'));
       
    }

    public function create()
    {

        return view('Users.create');
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

        return redirect()->route('Users.index')->with('success', 'User has been created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('Users.edit', compact('users'));
    }

    public function update(Request $request, $id): RedirectResponse
    {

            $validatedData = $request->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'name' => 'required|string|max:255',
                'age' => 'required|integer',
                'phone_number' => 'required|string|max:15',
                'gender' => 'required|string',
                'role' => 'required|string',
                'email' => 'required|email',
            ]);

            $user = User::findOrFail($id);

            $user->name = $request->input('name');
            $user->age = $request->input('age');
            $user->role = $request->input('role');
            $user->email = $request->input('email');
            $user->phone_number = $request->input('phone_number');
            $user->gender = $request->input('gender');

            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatar', 'public');
                $user->avatar = $avatarPath;
            }
    
            $user->save(); 

            return redirect()->route('Users.index')->with('success', 'User updated successfully.');

    }

    public function destroy($id): RedirectResponse
    {
        User::destroy($id);
        return redirect()->route('Users.index')->with('success', 'User has been deleted successfully!');
    }

    public function userAPI()
    {
        $users = User::get();
        if($users)
        {
            return response()->json(['status' => 200,
            'data' => $users,
        ]);
        }else{
            return response()->json(['status' => 404,
            'message' => 'Not Found',
        ]);
        }
    }
}
