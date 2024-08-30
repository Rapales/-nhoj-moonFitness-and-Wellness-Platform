@extends('app')

@section('content')
<div class="container">
    <h1>Workout Plans List</h1>

    <!-- Display a success message if any -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('workout-plans.create') }}" class="btn btn-primary mb-3">Add New Workout Plan</a>

    @if($workoutPlans->isEmpty())
        <p>No workout plans found.</p>
    @else
        <!-- Display the workout plans in a table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Trainer ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workoutPlans as $plan)
                    <tr>
                        <td>{{ $plan->id }}</td>
                        <td>{{ $plan->trainer_id }}</td>
                        <td>{{ $plan->title }}</td>
                        <td>{{ $plan->description }}</td>
                        <td>{{ $plan->duration }}</td>
                        <td>{{ $plan->type }}</td>
                        <td>
                            <!-- Action buttons for editing, and deleting workout plans -->
                            <a href="{{ route('workout-plans.edit', $plan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-plan-id="{{ $plan->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        {{ $workoutPlans->links() }}
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Are you sure you want to delete this workout plan?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script to handle the delete button and form submission -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var planId = button.getAttribute('data-plan-id'); // Extract workout plan ID from data-* attributes
            var form = document.getElementById('deleteForm'); // Select the form inside the modal
            form.action = '/workout-plans/' + planId; // Update form action with workout plan ID
        });
    });
</script>
@endsection
