@extends('layouts.authenticated_layout')

@section('content')
    <div class="container h-100 overflow-y-auto">
        <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead>
                <tr class="border position-sticky top-0">
                    <th>Owner Details</th>
                    <th>Pet Details</th>
                    <th>Appointment</th>
                    <th>Services</th>
                    <th>Status</th>
                    <th>Managed By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td class="text-capitalize">
                            <div><small class="text-muted">Name:</small> {{ $history->owner_name }}</div>
                            <div><small class="text-muted">Email:</small> {{ $history->owner_email }}</div>
                            <div><small class="text-muted">Contact:</small> {{ $history->contact }}</div>
                        </td>
                        <td class="text-capitalize">
                            <div><small class="text-muted">Name:</small> {{ $history->pet_name }}</div>
                            <div><small class="text-muted">DOB:</small>
                                {{ $history->pet_birthday->format('d M Y') }}</div>
                            <div><small class="text-muted">Gender:</small> {{ $history->pet_gender }}</div>
                            <div><small class="text-muted">Breed:</small> {{ $history->pet_breed }}</div>
                            <div><small class="text-muted">Color:</small> {{ $history->pet_color }}</div>
                            <div><small class="text-muted">Type:</small> {{ $history->pet_type }}</div>
                        </td>
                        <td>
                            <div><small class="text-muted">Date:</small>
                                {{ $history->date->format('d M Y') }}</div>
                            <div><small class="text-muted">Time:</small>
                                {{ $history->time->format('h:i A') }}</div>
                        </td>
                        <td class="text-capitalize">
                            <ul>
                                @foreach ($history->services ?? [] as $service)
                                    <li>{{ $service }}</li>
                                @endforeach
                            </ul>
                        </td>


                        <td class="text-capitalize"> <span class="bg-success text-white px-2">{{ $history->status }}</span>
                        </td>
                        <td class="text-capitalize">
                            <div><small class="text-muted">Name:</small>
                                {{ $history->staff_name }}</div>
                            <div><small class="text-muted">Email:</small>
                                {{ $history->staff_email }}</div>
                        </td>
                    </tr>
                @endforeach
                @foreach ($noShowAppointments as $history)
                    <tr>
                        <td class="text-capitalize">
                            <div><small class="text-muted">Name:</small> {{ $history->user->name }}</div>
                            <div><small class="text-muted">Email:</small> {{ $history->user->email }}</div>
                            <div><small class="text-muted">Contact:</small> {{ $history->user->contact }}</div>
                        </td>
                        <td class="text-capitalize">
                            <div><small class="text-muted">Name:</small> {{ $history->pet->name }}</div>
                            <div><small class="text-muted">DOB:</small>
                                {{ $history->pet->birthday->format('d M Y') }}</div>
                            <div><small class="text-muted">Gender:</small> {{ $history->pet->gender }}</div>
                            <div><small class="text-muted">Breed:</small> {{ $history->pet->breed }}</div>
                            <div><small class="text-muted">Color:</small> {{ $history->pet->color }}</div>
                            <div><small class="text-muted">Type:</small> {{ $history->pet->pet_type }}</div>
                        </td>
                        <td>
                            <div><small class="text-muted">Date:</small>
                                {{ $history->date->format('d M Y') }}</div>
                            <div><small class="text-muted">Time:</small>
                                {{ $history->time->format('h:i A') }}</div>
                        </td>
                        <td class="text-capitalize">
                            <ul>
                                @foreach ($history->services->pluck('services') as $service)
                                    <li>{{ $service }}</li>
                                @endforeach
                            </ul>
                        </td>

                        <td class="text-capitalize"> <span class="bg-warning px-2"> {{ $history->status }} </span></td>
                        <td class="text-capitalize">
                            <div><small class="text-muted">Name:</small>
                                {{ $history->staff?->name ?? 'N/A' }}</div>
                            <div><small class="text-muted">Email:</small>
                                {{ $history->staff?->email ?? 'N/A' }}</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
