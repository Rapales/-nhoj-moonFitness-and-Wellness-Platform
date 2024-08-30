@extends('app')

@section('content')
<div class="container">
    <h1>Edit Workout Plan</h1>
    
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
    
    <form action="{{ route('workout-plans.update', $workoutPlan->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="trainer_id">Trainer ID</label>
            <input type="number" class="form-control" id="trainer_id" name="trainer_id" value="{{ old('trainer_id', $workoutPlan->trainer_id) }}" required>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $workoutPlan->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $workoutPlan->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="duration">Duration (in minutes)</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $workoutPlan->duration) }}" required>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="Strength" {{ old('type', $workoutPlan->type) == 'Strength' ? 'selected' : '' }}>Strength</option>
                <option value="Cardio" {{ old('type', $workoutPlan->type) == 'Cardio' ? 'selected' : '' }}>Cardio</option>
                <option value="Flexibility" {{ old('type', $workoutPlan->type) == 'Flexibility' ? 'selected' : '' }}>Flexibility</option>
                <option value="Balance" {{ old('type', $workoutPlan->type) == 'Balance' ? 'selected' : '' }}>Balance</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Workout Plan</button>
        <a href="{{ route('workout-plans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
