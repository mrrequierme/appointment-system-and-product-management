<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentHistory;
use App\Models\Pet;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index(){
       $appointments = Appointment::with(['user','pet'])
       ->where('status', 'approved')
       ->orderBy('date')
       ->orderBy('time')
       ->get()
       ->groupBy('date');
       
       return view('admins.appointments.index',compact('appointments'));
    }

    public function noShow(Appointment $appointment)
    {
        $appointment->update([
            'status'=>'no show',
            'staff_id' => auth()->id(),
        ]);
        return redirect()->route('admin.appointments.index')
        ->with('success','Marked as no show by '. auth()->user()->name);
        
    }
public function markDone($appointmentId)
{
    $appointment = Appointment::with(['pet', 'user', 'services'])
        ->findOrFail($appointmentId);

    $serviceNames = $appointment->services
        ->pluck('services') 
        ->toArray();

    AppointmentHistory::create([
        'user_id'       => $appointment->user->id ?? null,

        'owner_name'    => $appointment->user->name ?? 'Deleted user',
        'owner_email'   => $appointment->user->email ?? null,
        'contact'       => $appointment->user->contact ?? null,

        'pet_name'      => $appointment->pet->name ?? null,
        'pet_gender'    => $appointment->pet->gender ?? null,
        'pet_breed'     => $appointment->pet->breed ?? null,
        'pet_type'      => $appointment->pet->pet_type ?? null,
        'pet_birthday'  => $appointment->pet->birthday ?? null,
        'pet_color'     => $appointment->pet->color ?? null,

        'date'          => $appointment->date,
        'time'          => $appointment->time,
        'status'        => 'done',

        'services'      => $serviceNames,

        'staff_name'    => Auth::user()->name,
        'staff_email'   => Auth::user()->email,
    ]);

    $appointment->update(['status' => 'done']);

    return back()->with('success', 'Appointment marked as done and moved to history!');
}

public function edit($id)
{
    $appointment = Appointment::with('services', 'pet', 'user')->findOrFail($id);
    $pets = Pet::where('user_id', $appointment->user_id)->get();
    $services = Services::all();

    return view('admins.appointments.edit', compact('appointment', 'services', 'pets'));
}


public function update(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);

    $request->validate([
        'pet_id'   => 'required|exists:pets,id',
        'services' => 'required|array',
        'services.*' => 'exists:services,id',
    ]);

    $appointment->update([
        'pet_id' => $request->pet_id,
    ]);

    $appointment->services()->sync($request->services);

    return redirect()->route('admin.appointments.index')
        ->with('success', 'Appointment updated successfully!');
}

}
