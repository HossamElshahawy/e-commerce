@extends('user.layout.main')
@section('head-page-user')
    Hossam Store
@endsection
@section('content')
    @include('user.inc.navbar')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Result Search</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{url('home')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>

    <!-- Page Header End -->
    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                @forelse($searchProducts as $searchProduct)
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                @if($searchProduct->productImages()->count() > 0)
                                    <a href="{{url('/category/'.$searchProduct->category->slug.'/'.$searchProduct->slug)}}">
                                        <img class="img-fluid w-100" src="{{asset($searchProduct->productImages[0]->image)}}" alt="">
                                    </a>
                                @endif
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{$searchProduct->name}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>${{$searchProduct->original_price}}</h6><h6 class="text-muted ml-2"><del>${{$searchProduct->selling_price}}</del></h6>
                                </div>

                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{url('/category/'.$searchProduct->category->slug.'/'.$searchProduct->slug)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h5>No Result Found </h5>
                @endforelse
            </div>
        </div>

    </div>
    <!-- Shop End -->


@endsection

