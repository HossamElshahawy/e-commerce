@extends('admin.layout.main')
@section('head-page')
    Dashboard
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3">
                <label>Total Orders</label>
                <h1>{{$totalOrder}}</h1>
                <a href="{{url('admin/orders')}}">View</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3">
                <label>Total Today Order</label>
                <h1>{{$totalTodayOrder}}</h1>
                <a href="{{url('admin/orders')}}">View</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body bg-warning text-white mb-3">
                <label>Total This Month Order</label>
                <h1>{{$totalThisMonthOrder}}</h1>
                <a href="{{url('admin/orders')}}">View</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body bg-danger text-white mb-3">
                <label>Total This Years Order</label>
                <h1>{{$totalThisYearOrder}}</h1>
                <a href="{{url('admin/orders')}}">View</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3">
                <label>Total Products</label>
                <h1>{{$totalProducts}}</h1>
                <a href="{{url('admin/orders')}}">View</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3">
                <label>Total Category</label>
                <h1>{{$totalCategories}}</h1>
                <a href="{{url('admin/category')}}">View</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body bg-warning text-white mb-3">
                <label>Total Brand</label>
                <h1>{{$totalBrands}}</h1>
                <a href="{{url('admin/brand')}}">View</a>
            </div>
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3">
                <label>Total User</label>
                <h1>{{$totalAllUsers}}</h1>
                <a href="{{url('admin/users')}}">View</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3">
                <label>Total Admins</label>
                <h1>{{$totalAdmin}}</h1>
                <a href="{{url('admin/users')}}">View</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body bg-warning text-white mb-3">
                <label>Total Users</label>
                <h1>{{$totalUser}}</h1>
                <a href="{{url('admin/users')}}">View</a>
            </div>
        </div>

    </div>
@endsection
