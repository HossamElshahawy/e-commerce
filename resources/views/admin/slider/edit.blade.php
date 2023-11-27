@extends('admin.layout.main')
@section('head-page')
    Update Slider
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

                    <form method="POST" action="{{route('slider.update',$slider->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{$slider->title}}">
                            @error('title') <em class="alert-danger">{{$message}}</em> @enderror
                        </div>


                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea id="Description" name="description" class="form-control" rows="4">{{$slider->description}}</textarea>
                            @error('description') <em class="alert-danger">{{$message}}</em> @enderror

                        </div>

                        <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" id="image" name="image" class="form-control">
                            <img src="{{asset('uploads/sliders/'.$slider->image)}}" width="80" height="80">
                            @error('image') <em class="alert-danger">{{$message}}</em> @enderror

                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status"  class="form-control">
                                <option value="active" @if($slider->status  == 'active') selected @endif>Active</option>
                                <option value="inactive" @if($slider->status  == 'inactive') selected @endif>inActive</option>
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
