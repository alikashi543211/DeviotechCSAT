
@extends('layouts.admin')
@section('title', 'Admin')
@section('nav-title', 'Admin List')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form class="validate-form" action="{{ route('admin.ops_manager.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">edit</i>
                            </div>
                            <h5 class="card-title">Edit Admin</h5>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <input type="hidden" name="role" value="ops_manager">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" data-default-file="{{ asset($user->avatar) ?? '' }}" class="dropify" accept=".png, .jpg, .jpeg, .gif, .svg">
                                        @error('image')
                                            <span class="invalid-feedback">
                        						<strong>{{ $message }}</strong>
                        					</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name"  required placeholder="Name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" autocomplete="off">
                                                @error('name')
                                                <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Email</label>
                                                <input type="email" name="email" placeholder="Email" required id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" autocomplete="off">
                                                @error('email')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer mt-4">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">Update</button>
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
