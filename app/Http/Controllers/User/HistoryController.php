<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppointmentHistory;
use App\Models\Appointment;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = AppointmentHistory::where('user_id', auth()->id())
            ->orderBy('date', 'desc')
            ->get();

        $noShows = Appointment::with('pet') 
            ->where('user_id', auth()->id())
            ->where('status', 'no show')
            ->orderBy('date', 'desc')
            ->get();

        return view('users.histories.index',compact('histories','noShows'));
    }
}
