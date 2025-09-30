<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RecordController extends Controller
{
    public function index(){
        $users = User::with('pets')
        ->where('role','user')
        ->orderBy('name')
        ->get();
        return view('admins.records.index',compact('users'));
    }
}
