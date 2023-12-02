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
                <p class="m-0">Profile</p>
            </div>
        </div>
    </div>

    <!-- Page Header End -->
    <!-- profile Start -->
    <div class="container-fluid pt-5">
        <div class="col-lg-9 col-md-12">
            <a href="{{url('change-password')}}" class="btn btn-warning float-right">Change Password ?</a>

            <div class="card-header">
                <h4>User Details</h4>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row pb-3">
                <div class="card-body">
                    <form method="POST" action="{{url('profile/update')}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{Auth::user()->name}}">
                            @error('name') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                            @error('email') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{Auth::user()->userDetails->phone ?? ''}}" >
                            @error('email') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Zip Code</label>
                            <input type="text" id="pin_code" name="pin_code" class="form-control" value="{{Auth::user()->userDetails->pin_code ?? ''}}" >
                            @error('pin_code') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{Auth::user()->userDetails->address ?? ''}}" >
                            @error('address') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"> Update </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- profile End -->


@endsection

