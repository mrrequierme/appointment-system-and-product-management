@extends('auth.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

        
        <form action="{{route('register.store')}}" method="post" class="form-floating row g-3 col-lg-7">
            @csrf

            <div class="col-12">
                <a href="{{route('home')}}" class="btn btn-sm btn-primary">Login</a>
            </div>

            <h3 class="text-center text-primary">Sign Up</h3>
            <div class="form-floating col-lg-12">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="name" value="{{old('name')}}">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback"> {{$message}} </div>
                @enderror
            </div>
            <div class="form-floating col-lg-12">
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="address" value="{{old('address')}}">
                <label for="address">Address</label>
                 @error('address')
                <div class="invalid-feedback"> {{$message}} </div>
                @enderror
            </div>
            <div class="form-floating col-lg-12">
                <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" id="contact" placeholder="phone/tel" value="{{old('contact')}}">
                <label for="contact">Phone/Tel</label>
                 @error('contact')
                <div class="invalid-feedback"> {{$message}} </div>
                @enderror
            </div>
            <div class="form-floating col-lg-12">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email" value="{{old('email')}}">
                <label for="email">Email</label>
                 @error('email')
                <div class="invalid-feedback"> {{$message}} </div>
                @enderror
            </div>
            <div class="form-floating col-lg-12 passwordTrigger">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="password">
                <label for="password">Password</label>
                 <i id="togglePassword" onclick="togglePasswordVisibility('password', 'togglePassword')" 
                            class="fa-solid fa-eye-slash">
                            </i>
                             @error('password')
                <div class="invalid-feedback"> {{$message}} </div>
                @enderror
            </div>
            <div class="form-floating col-lg-12 passwordTrigger">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="confirmPassword" placeholder="confirm password">
                <label for="confirmPassword">Confirm Password</label>
                <i id="toggleConfirmPassword" onclick="togglePasswordVisibility('confirmPassword', 'toggleConfirmPassword')" 
                            class="fa-solid fa-eye-slash">
                            </i>
                             @error('password_confirmation')
                <div class="invalid-feedback"> {{$message}} </div>
                @enderror
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100">Register</button>
            </div>
        </form>
        </div>
    </div>
@endsection