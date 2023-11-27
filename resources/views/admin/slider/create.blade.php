@extends('admin.layout.main')
@section('head-page')
    Create Slider
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

                    <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control">
                            @error('title') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>


                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea id="Description" name="description" class="form-control" rows="4"></textarea>
                            @error('description') <em class="alert-danger">{{$message}}</em> @enderror

                        </div>

                        <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" id="image" name="image" class="form-control">
                            @error('image') <em class="alert-danger">{{$message}}</em> @enderror

                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status"  class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">inActive</option>
                            </select>
                            @error('status') <em class="alert-danger">{{$message}}</em> @enderror
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
