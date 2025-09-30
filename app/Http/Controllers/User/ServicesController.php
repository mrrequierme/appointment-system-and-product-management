<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    public function index(){
        $services = Services::orderBy('services')
        ->get();
        return view('users.services.index',compact('services'));
    }
}
