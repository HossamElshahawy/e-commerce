@extends('admin.layout.main')


@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">

        <div class="card-header">

            <a href="{{route('product.create')}}"  class="btn btn-primary btn-sm float-right">Create</a>
            <h3 class="card-title">Products</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>

                        <td>
                            #
                        </td>
                        <td>
                            @if($product->category)
                            {{$product->category->name}}
                            @else
                            No Category
                            @endif
                        </td>
                        <td>
                                {{$product->name}}
                        </td>
                        <td>
                            {{$product->selling_price}}
                        </td>
                        <td>
                            {{$product->quantity}}
                        </td>
                        <td>
                            @if($product->status == 'active')
                            <span class="badge badge-success">{{$product->status}}</span>
                            @else
                                <span class="badge badge-danger">{{$product->status}}</span>
                            @endif
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{route('product.edit',$product->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a  class="btn btn-danger btn-sm" href="{{route('product.delete',$product->id)}}"
                                onclick="return confirm('Are you Sure For Delete This Product')">
                                delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>No Product Found</tr>
                @endforelse

                </tbody>

            </table>

        </div>
{{--        {{$categories->links()}}--}}
        <!-- /.card-body -->
    </div>

@endsection
