@extends('app')

@section('content')
<div class="container">
    <h1 class="mb-4">Progress Records</h1>
    
    <!-- Display a message if there are no records -->
    @if($progress->isEmpty())
        <div class="alert alert-info">
            No progress records found.
        </div>
    @else
        
        <!-- Table to display the progress records -->
        <a href="{{ route('progress.create') }}" class="btn btn-success">Add New Record</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member ID</th>
                    <th>Workout Image</th>
                    <th>Task Description</th>
                    <th>Task Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($progress as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->member_id }}</td>
                        <td>
                            @if($record->workout_img)
                                <img src="{{ asset('storage/' . $record->workout_img) }}" alt="Workout Image" class="img-thumbnail" style="width: 100px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $record->task_description }}</td>
                        <td>{{ $record->task_status }}</td>
                        <td>
                            <a href="{{ route('progress.edit', $record->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('progress.destroy', $record->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
</div>
@endsection
