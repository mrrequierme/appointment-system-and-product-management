@extends('layouts.authenticated_layout')

@section('content')
    <div class="container overflow-y-auto h-100 p-2">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($pets->count() > 0)
        <div class="table-responsive-sm">
            <table class="table table-striped">
                <thead class="border">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Color</th>
                        <th scope="col">Breed</th>
                        <th scope="col">Pet Type</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $pet)
                        <tr>
                            <td class="text-capitalize">{{ $pet->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($pet->birthday)->format('d-M-Y') }}</td>
                            <td class="text-capitalize">{{ $pet->gender }}</td>
                            <td class="text-capitalize">{{ $pet->color }}</td>
                            <td class="text-capitalize">{{ $pet->breed }}</td>
                            <td class="text-capitalize">{{ $pet->pet_type }}</td>
                            <td class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('user.pets.edit', ['pet' => $pet->id]) }}"
                                    class="btn btn-primary btn-sm">Edit</a>

                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deletePetModal{{ $pet->id }}">
                                    Delete
                                </button>

                                @include('users.pets.partials.modal')
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
            <p class="text-center">Register your pet. <a href="{{ route('user.pets.create') }}"
                    class="btn btn-primary btn-sm">Add
                    Pet</a> </p>
        @endif
    </div>
@endsection
