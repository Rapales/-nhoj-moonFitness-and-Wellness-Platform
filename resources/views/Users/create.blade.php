@extends('app')

@section('content')
<div class="card">
    <div class="card-header">Users Page</div>
    <div class="card-body">
        <div class="container">
            <h1>Create New User</h1>

            <!-- Display validation errors if any -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form to create a new user -->
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="avatar" class="form-label">Avatar</label>
                     <input type="file" class="form-control" id="avatar" name="avatar" value="{{ old('avatar') }}">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}">
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="others" {{ old('gender') == 'others' ? 'selected' : '' }}>Others</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" id="role" name="role" required>
                    <option value="" disabled selected>Select Role</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="trainer" {{ old('role') == 'trainer' ? 'selected' : '' }}>Trainer</option>
                        <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                        <option value="guest" {{ old('role') == 'guest' ? 'selected' : '' }}>Guest</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary">Create User</button>
                <a href="{{ route('Users.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection
