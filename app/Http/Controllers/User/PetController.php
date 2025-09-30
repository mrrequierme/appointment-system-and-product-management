<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function create()
    {
        return view('users.pets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'birthday' => 'required|date|before_or_equal:today',
            'gender' => 'required|string',
            'color' => 'required|string',
            'breed' => 'required|string',
            'pet_type' => 'required|string',
        ]);

        $request->user()->pets()->create($data);

        return redirect()->route('user.pets.index')->with('success', 'Pet added successfully!');
    }

    public function index()
    {
        $pets = auth()->user()->pets()->paginate(10);
        return view('users.pets.index', ['pets' => $pets]);
    }

    public function edit(Pet $pet){
    
        if($pet->user_id !== auth()->id()){
            return redirect()->route('user.pets.index')->with('error','Unauthorized action.');
        }

      return view('users.pets.edit',['pet' => $pet]);
    }

    public function update(Pet $pet, Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'birthday' => 'required|date|before_or_equal:today',
            'gender' => 'required|string',
            'color' => 'required|string',
            'breed' => 'required|string',
            'pet_type' => 'required|string',
        ]);
        $pet->update($data);
        return redirect()->route('user.pets.index')->with('success','Pet updated successfully!');
    }

    public function destroy(Pet $pet){
        if($pet->user_id !== auth()->id()){
            return redirect()->route('user.pets.index')->with('error','Unauthorized action.');
        }
        $pet->delete();
        return redirect()->route('user.pets.index')->with('success','Pet deleted successfully!');
    }
}
