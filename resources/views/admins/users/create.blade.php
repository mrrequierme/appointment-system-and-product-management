@extends('layouts.authenticated_layout')

@section('content')
    <div class="container h-100 overflow-y-auto">
        <div class="row">
            <div class="col-md-12 col-lg-6 mx-auto">

    
        <form action="{{route('admin.user.store')}}" method="post">
            @csrf
            <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm my-3">Back</a>
            <h5 class="text-center">Register Staff</h5>
            <div class="form-floating col-lg-12">
                <input type="text" class="form-control mb-2 @error('name') is-invalid @enderror" name="name" id="name"
                    placeholder="name">
                <label for="name">Name</label>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating col-lg-12">
                <input type="text" class="form-control mb-2 @error('address') is-invalid @enderror" name="address"
                    id="address" placeholder="address">
                <label for="address">Address</label>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating col-lg-12">
                <input type="text" class="form-control mb-2 @error('contact') is-invalid @enderror" name="contact"
                    id="contact" placeholder="phone/tel">
                <label for="contact">Phone/Tel</label>
                @error('contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating col-lg-12">
                <input type="email" class="form-control mb-2 @error('email') is-invalid @enderror" name="email"
                    id="email" placeholder="email">
                <label for="email">Email</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating col-lg-12 passwordTrigger ">
                <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password"
                    id="password" placeholder="password">
                <label for="password">Password</label>
                <i id="togglePassword" onclick="togglePasswordVisibility('password', 'togglePassword')"
                    class="fa-solid fa-eye-slash">
                </i>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating col-lg-12 passwordTrigger">
                <input type="password" class="form-control mb-2 @error('confirmPassword') is-invalid @enderror"
                    name="password_confirmation" id="confirmPassword" placeholder="confirm password">
                <label for="confirmPassword">Confirm Password</label>
                <i id="toggleConfirmPassword" onclick="togglePasswordVisibility('confirmPassword', 'toggleConfirmPassword')"
                    class="fa-solid fa-eye-slash">
                </i>
                @error('confirmPassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
                </div>
        </div>
    </div>
@endsection
