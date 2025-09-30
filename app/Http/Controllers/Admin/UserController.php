<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
         $users = User::orderByRaw("
                CASE 
                    WHEN role = 'admin' THEN 1
                    WHEN role = 'staff' THEN 2
                    ELSE 3
                END
            ")
            ->orderBy('name', 'asc')
            ->get();
        return view('admins.users.index', compact('users'));
    }
    public function create(){
        return view('admins.users.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name'     => 'required|string|max:255',
        'address'  => 'required|string|max:255',
        'contact'  => 'required|string|min:11|max:13',
        'email'    => 'required|email|unique:users',
        'password' => 'required|string|confirmed',
    ]);

    $data['role'] = 'staff';
    User::create($data);

    return redirect()->route('admin.user.index')
                     ->with('success', 'You created staff!');
}

}
