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
    <div class="container-fluid pt-5">
        <div class="mb-3">
            <a href="{{ route('order.index') }}" class="btn btn-danger btn-sm float-right">Back</a>
            <a href="{{ route('invoice.show', $order->id) }}" class="btn btn-warning btn-sm float-right mx-2" target="_blank">View Invoice</a>
            <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-primary btn-sm float-right">Download Invoice</a>
        </div>

        <h4 class="text-primary">
            <i class="fa fa-shopping-cart text-dark"></i> Order Details
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
                        <h6>Created Date:{{ optional($order->created_at)->format('d-m-Y h:i A') }}</h6>
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


        <div class="row mb-4">


            <div class="col-md-6">
                <div class="card">
                   <form method="post" action="{{route('updateOrderStatus',$order->id)}}">
                       @csrf
                       @method('PUT')

                       <label>Update Order Status</label>
                       <div class="input-group">
                            <select name="status_message" class="form-control">
                                <option value=""></option>
                                <option value="in progress" {{Request::get('status') == 'in progress' ? 'selected' : ''}}>In Progress</option>
                                <option value="completed" {{Request::get('status') == 'completed' ? 'selected' : ''}}>Completed</option>
                                <option value="pending" {{Request::get('status') == 'pending' ? 'selected' : ''}}>Pending</option>
                                <option value="cancelled" {{Request::get('status') == 'cancelled' ? 'selected' : ''}}>Cancelled</option>
                                <option value="out-for-delivery" {{Request::get('status') == 'out-for-delivery' ? 'selected' : ''}}>Out For Delivery</option>
                            </select>
                           <button type="submit" class="btn btn-primary text-white">Update</button>
                       </div>

                   </form>
                </div>
            </div>
            <div class="col-md-6">
                <br>
                <h4 class="mt-3">Curent Order Status: <span class="text-uppercase"><mark>{{$order->status_message}}</mark></span></h4>

            </div>
        </div>
    </div>

@endsection
