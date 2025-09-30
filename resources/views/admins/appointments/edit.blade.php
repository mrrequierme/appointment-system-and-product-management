@extends('layouts.authenticated_layout')

@section('content')
    <div class="container h-100 overflow-y-auto">
        <div class="row">

        
        <div class="col-md-12 col-lg-5 mx-auto border p-3 rounded">
            <a href="" class="btn btn-outline-primary btn-sm mb-3">Back</a>
            <h6 class="text-center">Update Appointment</h6>
            <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Select Pet -->
                <label for="pet_id">Select Pet</label>
                <select name="pet_id" id="pet_id" class="form-control mb-3">
                    @foreach ($pets as $pet)
                        <option value="{{ $pet->id }}" {{ $pet->id == $appointment->pet_id ? 'selected' : '' }}>
                            {{ $pet->name }} ({{ $pet->pet_type }} -
                            {{ \Carbon\Carbon::parse($pet->birthday)->format('d M Y') }})
                        </option>
                    @endforeach
                </select>

                <!-- Select Services -->
                <label>Select Services</label><br>
                @foreach ($services as $service)
                    <label>
                        <input type="checkbox" name="services[]" value="{{ $service->id }}"
                            {{ $appointment->services->contains($service->id) ? 'checked' : '' }}>
                        {{ $service->services }}
                    </label><br>
                @endforeach

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
        </div>

    </div>
@endsection
