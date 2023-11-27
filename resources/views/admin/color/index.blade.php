@extends('admin.layout.main')
@section('head-page')
    Color List
@endsection

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">

            <a href="{{route('color.create')}}"  class="btn btn-primary btn-sm float-right">Create</a>
            <h3 class="card-title">Color</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Name
                    </th>

                    <th>Code</th>

                    <th>
                        Status
                    </th>
                    <th>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($colors as $color)

                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            {{$color->name}}
                        </td>
                        <td>
                                {{$color->code}}
                        </td>

                        <td>
                            @if($color->status == 'active')
                                <span class="badge badge-success">{{$color->status}}</span>
                            @else
                                <span class="badge badge-danger">{{$color->status}}</span>
                            @endif
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{route('color.edit',$color->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a  class="btn btn-danger btn-sm" href="{{route('color.delete',$color->id)}}" onclick="return confirm('Are you Sure For delete this Color ?')">
                                delete
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
        {{$colors->links()}}
        <!-- /.card-body -->
    </div>
@endsection
