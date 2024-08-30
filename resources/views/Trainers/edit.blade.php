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
                <form action="{{ route('trainers.update', $row->id) }}" method="POST" id="createFormElement" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="trainer_id">Trainer Name</label>
                                    <select class="form-control" name="trainer_id" id="trainer_id">
                                        <option value="" selected disabled>Choose a trainer</option>
                                        @foreach($users as $id => $user)
                                        <option value="{{ $id }}" {{ $row->trainer_id == $id ? 'selected' : '' }}>{{ $user }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="specialization">Specialization</label>
                                    <input type="text" id="specialization" name="specialization" class="form-control form-control-alternative" placeholder="Specialization skills" value="{{ $row->specialization }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="form-group">
                                    <label class="form-control-label" for="experience_year">Experience Year</label>
                                    <input type="number" id="experience_year" name="experience_year" class="form-control form-control-alternative" placeholder="Experience year" value="{{ $row->experience_year }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('Trainers.index') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection