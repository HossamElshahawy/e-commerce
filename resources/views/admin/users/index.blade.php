@extends('admin.layout.main')
@section('head-page')
    Users List
@endsection

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">

            <a href="{{route('user.create')}}"  class="btn btn-primary btn-sm float-right">Create</a>
            <h3 class="card-title">User</h3>
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

                    <th>Email</th>

                    <th>
                        Role
                    </th>
                    <th>
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)

                    <tr>
                        <td></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role_as}}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{route('user.edit',$user->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a  class="btn btn-danger btn-sm" href="{{route('user.delete',$user->id)}}" onclick="return confirm('Are you Sure For delete this User ?')">
                                delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                       <td colspan="7">
                           no Users
                       </td>
                    </tr>
                @endforelse

                </tbody>

            </table>

        </div>
        {{$users->links()}}
        <!-- /.card-body -->
    </div>
@endsection
