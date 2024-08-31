@extends('app')

@section('content')
<div class="container">
    <h1>Users List</h1>

    <!-- Display a success message if any -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>

    @if($users->isEmpty())
        <p>No users found.</p>
    @else
        <!-- Display the users in a table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                        @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" style="width: 45px; height: 45px" alt="User Avatar" class="rounded-circle">
                    @else
                    <img src="{{ asset('dashboard/assets/img/fitandwell.png') }}" style="width: 45px; height: 45px" alt="User Avatar" class="rounded-circle">
                    @endif
                    </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <!-- Action buttons for editing, and deleting users -->
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                           
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" id="delete-btn{{$user->id}}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                   Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        {{ $users->links() }}
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Are you sure you want to delete this user?
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
            var userId = button.getAttribute('data-user-id'); // Extract user ID from data-* attributes
            var form = document.getElementById('deleteForm'); // Select the form inside the modal
            form.action = '/users/' + userId; // Update form action with user ID
        });
    });
</script>
@endsection