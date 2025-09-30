@extends('layouts.authenticated_layout')
@section('content')
    <div class="container">
        <div class="row">

        <div class="col-md-12 col-lg-6 mx-auto">

            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-primary">Back</a>
            <form action="{{ route('admin.products.update', ['product' => $editingProduct]) }}" method="post"
                enctype="multipart/form-data" class="product_form p-3 mt-3">
                @csrf
                @method('put')
                <h5 class="text-center text-primary">Edit product</h5>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" value="{{ $editingProduct->name }}" placeholder="Enter name here">
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class=" form-floating mb-3">
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" step="any" value="{{ $editingProduct->price }}" placeholder="Enter price">
                    <label for="price" class="form-label">Price</label>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control @error('definition') is-invalid @enderror" name="definition"
                        placeholder="Description here" id="floatingTextarea">{{ $editingProduct->definition }}</textarea>
                    <label for="floatingTextarea">Description</label>
                    @error('definition')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    @if (Str::endsWith($editingProduct->file, ['.jpg', '.jpeg', '.png']))
                        <img src="{{ asset('storage/' . $editingProduct->file) }}" alt="{{ $editingProduct->name }}"
                            width="50" class="img-thumbnail">
                    @else
                        <a href="{{ asset('storage/' . $editingProduct->file) }}" target="_blank">
                            View File
                        </a>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="inputGroupFile02"
                        name="file">
                    <label class="input-group-text" for="inputGroupFile02">Upload New</label>
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm w-100">Submit</button>
            </form>

        </div>
        </div>
    </div>
@endsection
