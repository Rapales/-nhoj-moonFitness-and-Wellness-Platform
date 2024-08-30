@extends('app')

@section('content')
<div class="card">
    <div class="card-header">Workout Plans Page</div>
    <div class="card-body">
        <div class="container">
            <h1>Create New Workout Plan</h1>

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

            <!-- Form to create a new workout plan -->
            <form action="{{ route('workout-plans.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="trainer_id" class="form-label">Trainer ID</label>
                    <input type="number" class="form-control" id="trainer_id" name="trainer_id" value="{{ old('trainer_id') }}" required>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Duration (in minutes)</label>
                    <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="" disabled selected>Select Type</option>
                        <option value="Strength" {{ old('type') == 'Strength' ? 'selected' : '' }}>Strength</option>
                        <option value="Cardio" {{ old('type') == 'Cardio' ? 'selected' : '' }}>Cardio</option>
                        <option value="Flexibility" {{ old('type') == 'Flexibility' ? 'selected' : '' }}>Flexibility</option>
                        <option value="Balance" {{ old('type') == 'Balance' ? 'selected' : '' }}>Balance</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Workout Plan</button>
                <a href="{{ route('workout-plans.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
