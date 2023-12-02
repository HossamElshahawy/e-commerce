@extends('user.layout.main')
@section('head-page-user')
    Hossam Store
@endsection
@section('content')
    @include('user.inc.navbar')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Profile</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{url('home')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Change Password</p>
            </div>
        </div>
    </div>
    <div class="card shadow">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h4 class="mb-0 text-white">Change Password</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('change-password') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Current Password</label>
                        <input type="password" name="current_password" class="form-control" />
                        @error('current_password') <em class="alert-danger">{{$message}}</em> @enderror

                    </div>
                    <div class="mb-3">
                        <label>New Password</label>
                        <input type="password" name="password" class="form-control" />
                        @error('password') <em class="alert-danger">{{$message}}</em> @enderror

                    </div>
                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" />
                        @error('password_confirmation') <em class="alert-danger">{{$message}}</em> @enderror

                    </div>
                    <div class="mb-3 text-end">
                        <hr>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>

    </div>




@endsection
