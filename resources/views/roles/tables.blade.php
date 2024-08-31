@extends('app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Roles</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">Add new</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->role_name }}</td>
                            <td>
                                <a class="bx bx-edit-alt me-1" href="{{ route('roles.edit', $row->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="bx bx-trash me-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{$row->id}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                                @include('roles.modal.delete')
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