@extends('app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Edit Information</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $row->id) }}" method="POST" id="createFormElement" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Role Name</label>
                                    <input type="text" id="role_name" name="role_name" class="form-control form-control-alternative" value="{{ $row->role_name }}" placeholder="Enter Role">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection