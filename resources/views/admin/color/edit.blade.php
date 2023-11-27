@extends('admin.layout.main')
@section('head-page')
    Update  Color
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

                    <form method="POST" action="{{route('color.update',$color->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" value="{{$color->name}}" name="name" class="form-control" >
                            @error('name') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" id="code" name="code" class="form-control" value="{{$color->code}}">
                            @error('code') <em class="alert-danger">{{$message}}</em> @enderror

                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status"  class="form-control">
                                <option value="active" @if($color->status  == 'active') selected @endif>Active</option>
                                <option value="inactive" @if($color->status  == 'inactive') selected @endif>inActive</option>
                            </select>
                            @error('status') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"> Update </button>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
