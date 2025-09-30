@extends('layouts.authenticated_layout')

@section('content')
    <div class="container h-100 overflow-y-auto p-3">
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-sm-12 col-md-6 col-lg-4 product_container">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $product->file) }}" alt="{{ $product->name }}"
                            class="card-img-top product_img mx-auto d-block">
                        <div class="card-body text-center">
                            <h5 class="card-title text-capitalize">{{ $product->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">₱{{ number_format($product->price, 2) }}</h6>
                            <p class="card-text">{{ $product->definition }}</p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
