@extends('admin.layout.main')
@section('head-page')
    Slider List
@endsection

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">

            <a href="{{route('slider.create')}}"  class="btn btn-primary btn-sm float-right">Create</a>
            <h3 class="card-title">Slider</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>description</th>
                    <th>image</th>
                    <th>status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($sliders as $slider)

                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            {{$slider->title}}
                        </td>
                        <td>
                            {{$slider->description}}
                        </td>
                        <td>

                            <img src="{{asset('uploads/sliders/'.$slider->image)}}" width="80" height="80">
                        </td>

                        <td>
                            @if($slider->status == 'active')
                                <span class="badge badge-success">{{$slider->status}}</span>
                            @else
                                <span class="badge badge-danger">{{$slider->status}}</span>
                            @endif
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{route('slider.edit',$slider->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a  class="btn btn-danger btn-sm" href="{{route('slider.delete',$slider->id)}}" onclick="return confirm('Are you Sure For delete this Slider ?')">
                                delete
                            </a>
                        </td>
                    </tr>

                @empty
                    <div class="col-md-2">No Slider Found</div>
                @endforelse

                </tbody>

            </table>

        </div>
{{--        {{$colors->links()}}--}}
        <!-- /.card-body -->
    </div>
@endsection
