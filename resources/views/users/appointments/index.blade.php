@extends('layouts.authenticated_layout')

@section('content')
    <div class="container h-100 overflow-y-auto">
        <h3 class="mb-4 text-center">Choose Appointment Date & Time</h3>

        @if (session('success'))
            <div class="alert alert-success d-flex align-items-center justify-content-between">
                <span>{{ session('success') }}</span>
                <a href="{{ route('user.appointments.show') }}" class="btn btn-sm btn-primary">
                    View Schedule
                </a>
            </div>
        @endif

        <form id="appointmentForm" class="mb-4 text-center">
            <label for="appointmentDate">Select Date:</label>
            <input type="date" name="date" id="appointmentDate" min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}"
                class="form-control w-25 d-inline">
        </form>

        <h5 class="text-center">Available Slots</h5>
        <div id="slots" class="d-flex flex-wrap"></div>

        <div class="row justify-content-center">
            <div id="appointmentDetails" class="mt-4 col-md-12 col-lg-6" style="display:none;">
                <h5 class="text-center">Appointment Details</h5>

                <form method="POST" action="{{ route('user.appointments.store') }}">
                    @csrf

                    <input type="hidden" name="date" id="selectedDate" required>
                    <input type="hidden" name="time" id="selectedTime" required>
                    <div class="mb-3">
                        <label for="pet_id">Select Pet</label>
                        <select name="pet_id" id="pet_id" class="form-control" required>
                            @foreach (auth()->user()->pets as $pet)
                                <option value="{{ $pet->id }}">
                                    {{ $pet->name }} ({{ $pet->pet_type }} -
                                    {{ \Carbon\Carbon::parse($pet->birthday)->format('d M Y') }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="services">Select Services</label>
                        <div>

                            @foreach ($services as $service)
                                <label>
                                    <input type="checkbox" name="services[]" value="{{ $service->id }}">
                                    {{ $service->services }}
                                </label><br>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Book Appointment</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        let selectedDate = null;

        document.getElementById("appointmentDate").addEventListener("change", function() {
            selectedDate = this.value;

            fetch(`/user/appointments/slots/${selectedDate}`)
                .then((res) => res.json())
                .then((data) => {
                    let slotsDiv = document.getElementById("slots");
                    slotsDiv.innerHTML = "";

                    data.slots.forEach((slot) => {
                        let isBooked = data.booked.includes(slot);

                        let btn = document.createElement("button");
                        btn.type = "button";
                        btn.innerText = slot;
                        btn.className =
                            "btn m-2 " +
                            (isBooked ? "btn-secondary disabled" : "btn-outline-primary");

                        if (!isBooked) {
                            btn.addEventListener("click", function() {

                                document.getElementById("appointmentDetails").style.display =
                                    "block";
                                document.getElementById("selectedDate").value = selectedDate;
                                document.getElementById("selectedTime").value = slot;
                                document.querySelectorAll("#slots button").forEach(b => {
                                    if (!b.classList.contains("disabled")) {
                                        b.classList.remove("btn-primary");
                                        b.classList.add("btn-outline-primary");
                                    }
                                });
                                btn.classList.remove("btn-outline-primary");
                                btn.classList.add("btn-primary");
                            });
                        }

                        slotsDiv.appendChild(btn);
                    });
                });
        });
    </script>
@endsection
