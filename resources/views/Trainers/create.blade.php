@extends('app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Trainers Creation</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('trainers.store') }}" method="POST" id="createFormElement" enctype="multipart/form-data">
                    @csrf
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Trainer Name</label>
                                    <select class="form-control" name="trainer_id" id="trainer_id">
                                        <option value="" selected disabled>Choose a trainer</option>
                                        @foreach($users as $id => $user)
                                        <option value="{{ $id }}">{{ $user }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Specialization</label>
                                    <input type="text" id="specialization" name="specialization" class="form-control form-control-alternative" placeholder="Specialization skills">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="form-group justify-content-center">
                                    <label class="form-control-label" for="input-first-name">Experience year</label>
                                    <input type="number" id="input-first-name" class="form-control form-control-alternative" name="experience_year" placeholder="Experience year">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
                    <a href="{{ route('trainers.index') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection