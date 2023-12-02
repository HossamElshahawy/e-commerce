@extends('admin.layout.main')
@section('head-page')
    User Create
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                            @error('name') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control" value="{{old('email')}}">
                            @error('email') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}">
                            @error('password') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password Confirmation</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                            @error('password') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="form-group">
                            <label for="role_as">Role_As</label>
                            <select name="role_as"  class="form-control">
                                <option value="admin" {{ old('role_as') == "admin" ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('role_as') == "user" ? 'selected' : '' }}>User</option>
                            </select>
                            @error('role_as') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"> Save </button>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>



    </div>


@endsection
