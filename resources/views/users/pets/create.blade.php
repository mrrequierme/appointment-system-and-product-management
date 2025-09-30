@extends('layouts.authenticated_layout')

@section('content')
    <div class="container overflow-y-auto h-100">
        <div class="row h-100 justify-content-center align-items-center p-2">


            <form action="{{ route('user.pets.store') }}" method="post" class="col-sm-12 col-md-9 col-lg-6 p-3 create_pet">
                @csrf
                <h4 class="text-center mb-2">Register Pet</h4>

                @if (session()->has('success'))
                    <div class="text-center text-success">{{ session('success') }}</div>
                @endif

                <div class="form-floating mb-2">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" value="{{ old('name') }}" placeholder="Enter name here">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                        id="birthday" max="{{ date('Y-m-d') }}">
                    <label for="birthday">Birthday</label>
                    @error('birthday')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control @error('color') is-invalid @enderror" name="color"
                        id="color" value="{{ old('color') }}" placeholder="Enter color here">
                    <label for="color">Color</label>
                    @error('color')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control @error('breed') is-invalid @enderror" name="breed"
                        id="breed" value="{{ old('breed') }}" placeholder="Enter breed here">
                    <label for="breed">Breed</label>
                    @error('breed')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <select name="gender" class="form-select mb-2 @error('gender') is-invalid @enderror"
                    aria-label="Default select example">
                    <option value="" selected disabled>-- Select Gender --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <select name="pet_type" class="form-select mb-2 @error('pet_type') is-invalid @enderror"
                    aria-label="Default select example">
                    <option value="" selected disabled>-- Select Pet Type --</option>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                </select>
                @error('pet_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
@endsection
