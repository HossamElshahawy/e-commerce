<div>
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Price Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>

                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" name="priceSort" wire:model.live="priceInputs" value="high-to-low" >
                    <label for="price-all">high to low</label>
                </div>

                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" name="priceSort" wire:model.live="priceInputs" value="low-to-high" >
                    <label for="price-all">low to high</label>
                </div>


            </div>
            <!-- Price End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                @forelse($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                @if($product->productImages()->count() > 0)
                                    <a href="{{url('/category/'.$product->category->slug.'/'.$product->slug)}}">
                                        <img class="img-fluid w-100" src="{{asset($product->productImages[0]->image)}}" alt="">
                                    </a>
                                @endif
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>${{$product->original_price}}</h6><h6 class="text-muted ml-2"><del>${{$product->selling_price}}</del></h6>
                                </div>

                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{url('/category/'.$product->category->slug.'/'.$product->slug)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h5>No Result Found For {{$category->name}}</h5>
                @endforelse
            </div>
        </div>


        <!-- Shop Product End -->
    </div>
</div>
