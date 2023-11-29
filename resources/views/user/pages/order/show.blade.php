@extends('user.layout.main')
@section('head-page-user')
    Hossam Store
@endsection

@section('content')



    <!-- order Start -->
    <div class="container-fluid pt-5">
        <h4 class="text-primary">
            <i class="fa fa-shopping-cart text-dark"></i>My Order Details
        </h4>
        <div class="row mb-4">

            <div class="col-md-6">

                <div class="card">

                    <div class="card-header bg-white text-white">
                        <h5><i class="bi bi-bag"></i> Order Details</h5>
                    </div>
                    <div class="card-body">
                        <h6>Order Id: {{$order->id}}</h6>
                        <h6>Tracking No/Id: {{$order->tracking_on}}</h6>
                        <h6>Created Date:{{ optional($order->created_at)->format('d-m-y') }}</h6>
                        <h6>Payment Mode: {{$order->payment_mode}}</h6>
                        <h6 class="border p-2 text-success">
                            Order Status Message: <span class="text-uppercase">{{$order->status_message}}</span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white text-white">
                        <h5><i class="bi bi-person"></i> User Details</h5>
                    </div>
                    <div class="card-body">
                        <h6>Full Name: {{$order->full_name}}</h6>
                        <h6>Email: {{$order->email}}</h6>
                        <h6>Phone:{{ $order->phone }}</h6>
                        <h6>Address: {{$order->address}}</h6>
                        <h6>PinCode: {{$order->pincode}}</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <div class="card-header bg-white text-white">
                <h5><i class="bi bi-bag"></i> Order Items</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>item Id</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @forelse($order->orderItems as $orderItem)
                        <tr>
                            <td>{{$orderItem->id}}</td>
                            @if($orderItem->product->productImages)
                                <td class="align-middle"><img src="{{asset($orderItem->product->productImages[0]->image)}}" alt="" style="width: 50px;"></td>
                            @endif
                            <td>
                                {{ $orderItem->product->name }} - {{ $orderItem->productColors->color->name ?? 'N/A' }}
                            </td>
                            <td>${{$orderItem->price}}</td>
                            <td>{{$orderItem->quantity}}</td>
                            <td>${{$orderItem->price * $orderItem->quantity}}</td>
                            @php
                                $totalPrice += $orderItem->price * $orderItem->quantity;
                            @endphp
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No Orders</td>
                        </tr>
                    @endforelse
                    <tr class="font-weight-bold">
                        <td colspan="5" class="font-weight-bold text-end">Total Amount:</td>
                        <td class="fw-bold">${{$totalPrice}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- order End -->


@endsection
