@extends('layouts.admin')
@section('title', 'CAREGiver')
@section('nav-title', 'CAREGiver Add')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form class="validate-form" action="{{ route('caremanager.caregiver.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">add</i>
                            </div>
                            <h5 class="card-title">Add CAREGiver</h5>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" required placeholder="Name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="off">
                                        @error('name')
                                        <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">ID Number</label>
                                        <input type="text" name="id_number" placeholder="Unique ID Number" required id="id_number" class="form-control @error('id_number') is-invalid @enderror" value="{{ old('id_number') }}" autocomplete="off">
                                        @error('id_number')
                                        <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer mt-4">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">submit</button>
                                <a href="{{url()->previous()}}"  class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection

