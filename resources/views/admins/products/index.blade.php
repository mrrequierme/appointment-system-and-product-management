@extends('layouts.authenticated_layout')

@section('content')
    <div class="container h-100 overflow-y-auto">
        <div class="container mt-2">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-2">Create Product</a>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Definition</th>
                            <th>Image</th>
                            <th>Added By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>₱{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->definition }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $product->file) }}" alt="{{ $product->name }}"
                                        class="img-thumbnail" width="50" height="50">

                                </td>
                                <td>
                                    {{ $product->user->name }} -
                                    {{ $product->user->email }}

                                </td>
                                <td class="d-flex gap-1">
                                    <a href="{{ route('admin.products.edit', ['product' => $product]) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $product->id }}">
                                        Delete
                                    </button>
                                    @include('admins.products.partials.modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
