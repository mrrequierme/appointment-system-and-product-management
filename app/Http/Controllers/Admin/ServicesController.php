<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
class ServicesController extends Controller
{
    public function index(){
        $services = Services::with('user')->orderBy('created_at','desc') 
        ->get();
        return view('admins.services.index',compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'services' => 'required|string|max:255',
    ]);

    Services::create([
        'services' =>$request->services,
        'user_id' => auth()->id(), 
    ]);
    return redirect()->route('admin.services.index')->with('success','Added successfully!');
    }

    public function delete(Services $service){
        $service->delete();
        return redirect()->route('admin.services.index')
        ->with('success','Deleted successfully!');
    }
}
