<div>
    <div class="row px-xl-5">
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
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                <tr>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                @forelse($wishlists as $wishlist)
                    @if($wishlist->product)
                <tr>
                    @if($wishlist->product->productImages)
                        <td class="align-middle"><img src="{{asset($wishlist->product->productImages[0]->image)}}" alt="{{$wishlist->product->name}}" style="width: 50px;">
                            <a href="{{url('category/'.$wishlist->product->category->slug.'/'.$wishlist->product->slug)}}">
                            {{$wishlist->product->name}}</td>
                        </a>
                    @endif
                            <td class="align-middle">${{$wishlist->product->selling_price}}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">${{$wishlist->product->selling_price}}</td>
                        <td class="align-middle">
                            <button class="btn btn-sm btn-primary" type="button" wire:click="removeWishListItem({{$wishlist->id}})">
                                <span wire:loading.remove>
                                      <i class="fa fa-times"></i>
                                </span>
                                <span wire:loading wire:target="removeWishListItem">Removing</span>

                            </button>
                        </td>
                </tr>
                    @endif
                @empty
                    No Products in Wishlist
                @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
