@extends('layouts.authenticated_layout')

@section('content')
    <div class="container h-100 overflow-y-auto">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead>
                <tr class="text-center border">
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $date => $dayAppointments)
                    <tr class="text-center">
                        <td>{{ \Carbon\Carbon::parse($date)->format('d M Y') }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="collapse"
                                data-bs-target="#appointments-{{ $loop->index }}">
                                View Appointments
                            </button>
                        </td>
                    </tr>

                    <tr class="collapse" id="appointments-{{ $loop->index }}">
                        <td colspan="2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Owner Details</th>
                                        <th>Pet Details</th>
                                        <th>Services</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dayAppointments as $appointment)
                                        <tr>
                                            <td class="text-capitalize">
                                                <div><small class="text-muted">Name:</small> {{ $appointment->user->name }}
                                                </div>
                                                <div><small class="text-muted">Email:</small>
                                                    {{ $appointment->user->email }}</div>
                                                <div><small class="text-muted">Contact:</small>
                                                    {{ $appointment->user->contact }}</div>
                                            </td>

                                            <td class="text-capitalize">
                                                <div><small class="text-muted">Name:</small> {{ $appointment->pet->name }}
                                                </div>
                                                <div><small class="text-muted">DOB:</small>
                                                    {{ $appointment->pet->birthday->format('d M Y') }}</div>
                                                <div><small class="text-muted">Gender:</small>
                                                    {{ $appointment->pet->gender }}</div>
                                                <div><small class="text-muted">Breed:</small>
                                                    {{ $appointment->pet->breed }}</div>
                                                <div><small class="text-muted">Type:</small>
                                                    {{ $appointment->pet->pet_type }}</div>

                                            </td>
                                            <td>{{ $appointment->services->pluck('services')->join(', ') }}</td>
                                            <td class="text-center">
                                                {{ $appointment->time->format('h:i A') }}
                                            </td>
                                            <td class="text-capitalize text-center">
                                                <span
                                                    class="bg-success text-white px-2 py-1">{{ $appointment->status }}</span>
                                            </td>
                                            <td class="d-flex justify-content-center gap-1">
                                                <a href="{{ route('admin.appointments.edit', ['id' => $appointment->id]) }}"
                                                    class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $appointment->id }}">
                                                    Edit
                                                </a>

                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#doneModal{{ $appointment->id }}">
                                                    Done
                                                </button>

                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#noShowModal{{ $appointment->id }}">
                                                    No Show
                                                </button>
                                                {{-- ge seprate modal --}}
                                                @include('admins.appointments.partials.modal_done')
                                                @include('admins.appointments.partials.modal_edit')
                                                @include('admins.appointments.partials.modal_noshow')

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>
@endsection
