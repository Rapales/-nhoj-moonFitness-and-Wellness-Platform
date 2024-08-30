@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <h2>Create New Progress Record</h2>
        </div>
        <div class="card-body">
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form to create a new progress record -->
            <form action="{{ route('progress.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="member_id" class="form-label">Member ID</label>
                    <input type="number" class="form-control" id="member_id" name="member_id" value="{{ old('member_id') }}" required>
                </div>

                <div class="mb-3">
                    <label for="workout_img" class="form-label">Workout Image</label>
                    <input type="file" class="form-control" id="workout_img" name="workout_img" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="task_description" class="form-label">Task Description</label>
                    <textarea class="form-control" id="task_description" name="task_description" rows="3" required>{{ old('task_description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="task_status" class="form-label">Task Status</label>
                    <select class="form-select" id="task_status" name="task_status" required>
                        <option value="pending" {{ old('task_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ old('task_status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="in-progress" {{ old('task_status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('progress.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
