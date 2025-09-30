@extends('layouts.authenticated_layout')

@section('content')
    <div class="container h-100">
        <div class="table-responsive-sm">
        <table class="table w-100 table-striped">
            <thead>
                <tr class="border">
                    <th class="border">Pet Name</th>
                    <th class="border">Birthday</th>
                    <th class="border">Type</th>
                    <th class="border">Appointment Details</th>
                    <th class="border">Services</th>
                    <th class="border text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td class="text-capitalize">{{ $appointment->pet->name }}</td>
                        <td>{{ $appointment->pet->birthday->format('d M Y') }}</td>
                        <td class="text-capitalize">{{ $appointment->pet->pet_type }}</td>
                        <td>
                            {{ $appointment->date->format('d M Y') }} -
                        {{ $appointment->time->format('h:i A') }}
                    </td>
               
                        <td class="text-capitalize">{{ $appointment->services->pluck('services')->join(', ') }}</td>
                   
                        <td class="text-center text-capitalize"><span class="bg-success text-white p-2">{{ ucfirst($appointment->status) }}</span></td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    </div>
@endsection
