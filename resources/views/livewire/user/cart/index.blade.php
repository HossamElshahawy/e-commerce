<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row px-xl-5">

        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                <tr>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                @forelse($cart as $cartItem)
                    @php $totalPrice = null; @endphp
                   @if($cartItem->product)
                <tr>
                    @if($cartItem->product->productImages)
                        <td class="align-middle"><img src="{{asset($cartItem->product->productImages[0]->image)}}" alt="" style="width: 50px;">
                            <a href="{{url('category/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug)}}">
                            {{$cartItem->product->name}}</td>
                        </a>
                    @endif
                    <td class="align-middle">${{$cartItem->product->selling_price}}</td>
                        @if($cartItem->productColors)
                        <td class="align-middle">{{$cartItem->productColors->color->name}}</td>
                        @else
                            <td></td>
                        @endif

                        <td class="align-middle">
                        <div class="input-group quantity mx-auto" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-primary btn-minus" wire:loading.attr="disabled" type="button" wire:click="decrementQuantity({{$cartItem->id}})">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>

                            <input type="text"   class="form-control form-control-sm bg-secondary text-center" value="{{$cartItem->quantity}}">

                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-primary btn-plus" wire:loading.attr="disabled" type="button" wire:click="incrementQuantity({{$cartItem->id}})">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">${{$cartItem->product->selling_price * $cartItem->quantity}}</td>
                    @php $totalPrice += $cartItem->product->selling_price * $cartItem->quantity @endphp
                        <td class="align-middle">
                            <button class="btn btn-sm btn-primary" type="button" wire:click="removeCartItem({{$cartItem->id}})">
                                <span wire:loading.remove>
                                      <i class="fa fa-times"></i>
                                </span>
                                <span wire:loading wire:target="removeCartItem">Removing</span>

                            </button>
                        </td>
                </tr>
                   @endif
                @empty
                    No Products At Cart
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">$150</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">$</h5>
                    </div>
                    <button wire:click="redirectToCheckout" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>



</div>
