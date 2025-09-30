<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Services;

class AppointmentController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('users.appointments.index', compact('services'));
    }

    public function slots($date)
    {
        $slots = $this->generateSlots();

        $booked = Appointment::where('date', $date)
            ->pluck('time')
            ->map(function ($time) {
                return Carbon::parse($time)->format('h:i A');
            })
            ->toArray();

        return response()->json([
            'slots' => $slots,
            'booked' => $booked,
        ]);
    }

    private function generateSlots()
    {
        $slots = [];

        $start = Carbon::createFromTime(8, 0);
        $end = Carbon::createFromTime(12, 0);

        while ($start->lt($end)) {
            $slots[] = $start->format('h:i A');
            $start->addMinutes(30);
        }

        $start = Carbon::createFromTime(13, 0);
        $end = Carbon::createFromTime(17, 0);

        while ($start->lt($end)) {
            $slots[] = $start->format('h:i A');
            $start->addMinutes(30);
        }

        return $slots;
    }

    public function book(Request $request)
    {
        $request->validate([
            'date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->lte(Carbon::today())) {
                        $fail('You can only book starting tomorrow.');
                    }
                },
            ],
            'time' => 'required',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after:today',
            'time' => 'required',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
            'pet_id' => 'required|exists:pets,id',
        ]);

        $pet = Pet::findOrFail($request->pet_id);

        $time = Carbon::createFromFormat('h:i A', $request->time)->format('H:i:s');

        $appointment = Appointment::create([
            'date' => $request->date,
            'time' => $time,
            'user_id' => auth()->id(),
            'pet_id' => $pet->id,
        ]);

        $appointment->services()->sync($request->services);

        return redirect()->route('user.appointments.index')->with('success', 'Appointment booked successfully!');
    }

    public function show()
    {
        $appointments = Appointment::with('pet')
            ->where('user_id', auth()->id())
            ->where('status', 'approved')
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->get();

        return view('users.appointments.show', compact('appointments'));
    }
}
