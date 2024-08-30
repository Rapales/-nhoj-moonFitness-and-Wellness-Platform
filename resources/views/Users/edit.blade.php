@extends('app')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    
    <!-- Display error messages if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
             <input type="file" class="form-control" id="avatar" name="avatar" value="{{ old('avatar') }}">
        </div>
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $users->name) }}" required>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $users->age) }}" required>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $users->phone_number) }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="Male" {{ old('gender', $users->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $users->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="Admin" {{ old('role', $users->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Trainer" {{ old('role', $users->role) == 'Trainer' ? 'selected' : '' }}>Trainer</option>
                <option value="Member" {{ old('role', $users->role) == 'Member' ? 'selected' : '' }}>Member</option>
                <option value="Guest" {{ old('role', $users->role) == 'Guest' ? 'selected' : '' }}>Guest</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $users->email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
