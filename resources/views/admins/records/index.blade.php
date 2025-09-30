@extends('layouts.authenticated_layout')

@section('content')
    <div class="container h-100 overflow-y-auto">
        <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead>
                <tr class="text-center border">
                    <th>Owner</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="text-center">
                        <td class="text-capitalize">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="collapse"
                                data-bs-target="#user-{{ $user->id }}">
                                View Pets
                            </button>
                        </td>
                    </tr>

                    <tr class="collapse" id="user-{{ $user->id }}">
                        <td colspan="3">
                            @if ($user->pets->isNotEmpty())
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Pet Name</th>
                                            <th>Birthday</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Color</th>
                                            <th>Breed</th>
                                            <th>Type</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->pets as $pet)
                                            <tr>
                                                <td class="text-capitalize">{{ $pet->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pet->birthday)->format('d M Y') }}</td>
                                                <td>
                                                    @php
                                                        $birthday = \Carbon\Carbon::parse($pet->birthday);
                                                        $now = \Carbon\Carbon::now();
                                                        $age = $birthday->diff($now);
                                                    @endphp

                                                    {{ $age->y }}y, {{ $age->m }}m,
                                                    {{ $age->d }}d
                                                </td>
                                                <td class="text-capitalize">{{ $pet->gender }}</td>
                                                <td class="text-capitalize">{{ $pet->color }}</td>
                                                <td class="text-capitalize">{{ $pet->breed }}</td>
                                                <td class="text-capitalize">{{ $pet->pet_type }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted">This user has no pets.</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>
@endsection
