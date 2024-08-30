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
                <form action="{{ route('members.update', $row->id) }}" method="POST" id="createFormElement" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Customer Name</label>
                                    <select class="form-control" name="member_id" id="member_id">
                                        <option value="" selected disabled>Choose a Member</option>
                                        @foreach($members as $id => $user)
                                        <option value="{{ $id }}" {{ $row->member_id == $id ? 'selected' : '' }}>{{ $user }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Trainer Name</label>
                                    <select class="form-control" name="trainer_id" id="trainer_id">
                                        <option value="" selected disabled>Choose a trainer</option>
                                        @foreach($trainers as $id => $user)
                                        <option value="{{ $id }}" {{ $row->trainer_id == $id ? 'selected' : '' }}>{{ $user }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Fitness level</label>
                                    <select class="form-control" name="fitness_level" id="fitness_level">
                                        <option value="" disabled>Choose a level</option>
                                        <option value="Beginner" {{ $row->fitness_level == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                        <option value="Intermediate" {{ $row->fitness_level == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                        <option value="Advanced" {{ $row->fitness_level == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('Members.index') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection