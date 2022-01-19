@extends('layouts.auth')
@section('title', 'Admin Login')
@section('css')
    <style>
        .forgot-button
        {
            margin-top: -35px;
            font-size: 11px !important;
            color: blue !important;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card card-login">
                        <div class="card-header card-header-success text-center">
                            <h4 class="card-title">Login</h4>
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
                            <span class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password...">
                                    @error('password')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </span>
                        </div>
                        <div class="card-footer justify-content-center p-2">
                            <button type="submit" class="btn btn-rose btn-link btn-lg">Lets Go</button>
                        </div>
                        <div class="text-right forgot-div">
                            <a href="{{ route('password.request') }}"><button type="button" class="btn btn-rose btn-link btn-lg forgot-button">Forgotten Password?</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
