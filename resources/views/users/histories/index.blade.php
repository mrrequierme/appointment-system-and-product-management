@extends('layouts.authenticated_layout')

@section('content')
    <div class="container h-100 overflow-y-auto">
        <div class="table-responsive-sm">
        <table class="table table-striped w-75 mx-auto">
            <thead>
                <tr>
                    <th>Pet Details</th>
                    <th>Appointment Details</th>
                    <th>Managed By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td class="text-capitalize">
                            <div><small class="text-muted">Name:</small> {{ $history->pet_name }}</div>
                            <div><small class="text-muted">DOB:</small>
                                {{ \Carbon\Carbon::parse($history->pet_birthday)->format('d-M-Y') }}</div>
                            <div><small class="text-muted">Breed:</small> {{ $history->pet_breed }}</div>
                            <div><small class="text-muted">Color:</small> {{ $history->pet_color }}</div>
                            <div><small class="text-muted">Gender:</small> {{ $history->pet_gender }}</div>
                            <div><small class="text-muted">Type:</small> {{ $history->pet_type }}</div>

                        </td>

                        <td class="text-capitalize">
                            <div><small class="text-muted">Date:</small>
                                {{ $history->date->format('d-M-Y') }}</div>
                            <div><small class="text-muted">Time:</small>
                                {{ $history->time->format('h:i A') }}</div>

                            <div><small class="text-muted">Services:</small>
                                {{ is_array($history->services) ? implode(', ', $history->services) : $history->services }}

                            </div>
                            <div><small class="text-muted">Status:</small> <span
                                    class="bg-success text-white px-2 rounded-1">{{ $history->status }}</span></div>

                        </td>
                        <td>
                            <div><small class="text-muted">Name:</small> {{ $history->staff_name }}</div>
                            <div><small class="text-muted">Email:</small> {{ $history->staff_email }}</div>

                        </td>
                    </tr>
                @endforeach
                @foreach ($noShows as $noShowData)
                    <tr>
                        <td class="text-capitalize">
                            <div><small class="text-muted">Name:</small> {{ $noShowData->pet->name }}</div>
                            <div><small class="text-muted">DOB:</small>
                                {{ $noShowData->pet->birthday->format('d-M-Y') }}</div>
                            <div><small class="text-muted">Breed:</small> {{ $noShowData->pet->breed }}</div>
                            <div><small class="text-muted">Color:</small> {{ $noShowData->pet->color }}</div>
                            <div><small class="text-muted">Gender:</small> {{ $noShowData->pet->gender }}</div>
                            <div><small class="text-muted">Type:</small> {{ $noShowData->pet->pet_type }}</div>

                        </td>

                        <td class="text-capitalize">
                            <div><small class="text-muted">Date:</small>
                                {{ $noShowData->date->format('d-M-Y') }}</div>
                            <div><small class="text-muted">Time:</small>
                                {{ $noShowData->time->format('h:i A') }}</div>


                            <div><small class="text-muted">Services:</small>
                                {{ $noShowData->services->pluck('services')->join(', ') }}</div>
                            <div><small class="text-muted">Status:</small> <span
                                    class="bg-warning px-2 rounded-1">{{ $noShowData->status }}</span></div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
