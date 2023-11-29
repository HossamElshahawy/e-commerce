@extends('admin.layout.main')
@section('head-page')
    Order List
@endsection

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body p-0">
            {{--//filter bar--}}
            <form method="get" action="">
                <div class="row">
                    <div class="col-md-3">
                        <label>Filter By Date</label>
                        <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Filter By Status</label>
                        <select name="order_status" class="form-control">
                            <option value="">All</option>
                            <option value="in progress" {{Request::get('status_message') == 'in progress' ? 'selected' : ''}}>In Progress</option>
                            <option value="completed" {{Request::get('status_message') == 'completed' ? 'selected' : ''}}>Completed</option>
                            <option value="pending" {{Request::get('status_message') == 'pending' ? 'selected' : ''}}>Pending</option>
                            <option value="cancelled" {{Request::get('status_message') == 'cancelled' ? 'selected' : ''}}>Cancelled</option>
                            <option value="out-for-delivery" {{Request::get('status_message') == 'out-for-delivery' ? 'selected' : ''}}>Out For Delivery</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </div>

            </form>
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th>orderID</th>
                    <th>Tracking No</th>
                    <th>Username</th>
                    <th>Payment Mode</th>
                    <th>Ordered Date</th>
                    <th>Status Message</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->tracking_on}}</td>
                        <td>{{$order->full_name}}</td>
                        <td>{{$order->payment_mode}}</td>
                        <td>{{$order->created_at->format('d-m-y')}}</td>
                        <td>{{$order->status_message}}</td>
                        <td><a href="{{url('admin/order/'.$order->id)}}" class="btn btn-primary btn-sm">View</a> </td>
                    </tr>
                @empty
                    <td colspan="7">
                        <h5>No Orders</h5>
                    </td>
                @endforelse

                </tbody>

            </table>

        </div>
        {{$orders->links()}}
        <!-- /.card-body -->
    </div>
@endsection
