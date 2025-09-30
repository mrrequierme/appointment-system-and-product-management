<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppointmentHistory;
use App\Models\Appointment;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = AppointmentHistory::orderBy('date')
        ->orderBy('time')
        ->get();

        $noShowAppointments = Appointment::with(['user', 'pet','services'])
            ->where('status', 'no show')
            ->orderBy('date')
            ->orderBy('time','asc')
            ->get();
        return view('admins.histories.index', ['histories' => $histories, 'noShowAppointments' => $noShowAppointments]);
    }
}
