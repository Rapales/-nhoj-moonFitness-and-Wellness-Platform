@extends('app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Members</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('Members.create') }}" class="btn btn-sm btn-primary">Add new</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Member Name</th>
                            <th scope="col">Trainer Name</th>
                            <th scope="col">Fitness_level</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->usersMembers->name ?? 'No User Assigned' }}</td>
                            <td>{{ $row->usersTrainers->name ?? 'No User Assigned' }}</td>
                            <td>{{ $row->fitness_level }}</td>
                            <td>
                                <a class="bx bx-edit-alt me-1" href="{{ route('members.edit', $row->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="bx bx-trash me-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{$row->id}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                                @include('members.modal.delete')
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection