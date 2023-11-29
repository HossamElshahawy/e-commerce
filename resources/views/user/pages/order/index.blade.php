@extends('user.layout.main')
@section('head-page-user')
    Hossam Store
@endsection

@section('content')
    @include('user.inc.navbar')



    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-md-12">
                <h2>Orders List</h2>
                <table class="table table-bordered">
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
                        <td><a href="{{url('order/'.$order->id)}}" class="btn btn-primary btn-sm">View</a> </td>
                    </tr>
                   @empty
                    No Orders
                   @endforelse


                    </tbody>
                </table>
                {{$orders->links()}}
            </div>

        </div>

    </div>


    <!-- Checkout End -->


@endsection
