@extends('layouts.guest_layout')

@section('content')
    <div class="container fullscreen-navbar" id="login">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <h3 class="py-4 text-primary text-center text-lg-start">Welcome to the MCA Animal Care Clinic</h3>
                <p class="text-primary featuredIntro">
                    The lobby is the place where you can book your appointment to our beloved clinic. You can start your
                    journey by simply creating an account, if you already have one then you can just login into your account
                    .
                </p>
                <div class="gallery-section">
                    <div class="gallery-container">
                        <img class="img1" src="{{ asset('images/img1.webp') }}" alt="dog1">
                        <img class="img2" src="{{ asset('images/img2.webp') }}" alt="dog2">
                        <img class="img3" src="{{ asset('images/img3.webp') }}" alt="dog3">
                        <img class="img4" src="{{ asset('images/img4.webp') }}" alt="dog4">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="login-container">
                    <form action="{{ route('login.store') }}" method="post" class="row">
                        @csrf
                        <h3 class="text-center mb-4">Login</h3>
                        @error('error')
                        <p class="text-center text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-floating col-lg-10">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="usernameinput"
                                placeholder="Enter email">
                            <label for="usernameinput">Enter email here</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating col-lg-10">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="passwordinput"
                                placeholder="Enter password">
                            <label for="passwordinput">Enter password here</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-10 text-center mt-4">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <a href="{{ route('register.show') }}" class="btn btn-outline-primary btn-sm">Sign Up</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container home-product-section py-2" id="product">
        <h3 class="w-100 text-center">Product List</h3>
        <div class="row g-4 mt-1">
            @foreach ($products as $product)
                <div class="col-sm-12 col-md-6 col-lg-3 product_container">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $product->file) }}" alt="{{ $product->name }}"
                            class="card-img-top product_img mx-auto d-block">
                        <div class="card-body text-center">
                            <h5 class="card-title text-capitalize">{{ $product->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">₱{{ number_format($product->price, 2) }}</h6>
                            <p class="card-text text-start">{{ $product->definition }}</p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    <div class="container py-5" id="services">
        <div class="row">
            <div class="col-md-12 col-lg-6 mx-auto">
                <table class="table table-striped text-center border">
                    <thead>
                        <tr>
                            <th>Services</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->services }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="container" id="aboutUs">
        <div class="row">
            <div class="col-lg-6 col-md-12 py-5">
                <h3 class="text-center">About us</h3>
                <p>
                    Here in MCA Animal Care Clinic, we always maintain a safe and clean environment making
                    sure that the entire place is clean as we go. We also ensure that it will be comfortable
                    not only for you, but also to your beloved companions. Our clinic offers most of what you need to
                    keep your companion healthy and strong, giving them more time to spend together with you. A friendly
                    environment is also incorporated in
                    the establishment giving you a sense of assurance that your companions are in safe hands.
                </p>
            </div>
            <div class="col-lg-6 col-md-12 py-5">
                <h3 class="text-center">Our Staff</h3>
                <p>
                    The staff here in MCA Animal Care Clinic follows a strict protocol,
                    making sure that your companions are safe and sound as they come in and out. They are also
                    well-trained professionals capable of taking care of any services that you may require,
                    while giving you the best hospitality that we have to offer. In a way, giving you an idea
                    that they will welcome you again with open arms.
                </p>
            </div>
        </div>
    </div>

@endsection
