@extends('layouts.auth')
@section('title', 'Forgotten Password')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="card card-login">
                        <div class="card-header card-header-success text-center">
                            <h4 class="card-title">Forgotten Password</h4>
                        </div>
                        <div class="card-body ">
                            <span class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">email</i>
                                        </span>
                                    </div>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email...">
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </span>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-rose btn-link btn-lg">Email Password Reset Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
