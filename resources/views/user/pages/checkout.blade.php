@extends('user.layout.main')
@section('head-page-user')
    Hossam Store
@endsection

@section('content')



    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <livewire:user.checkout.index/>
    </div>
    <!-- Checkout End -->

@endsection
