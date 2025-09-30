<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Services;

class GuestController extends Controller
{
    public function index(){
        $products = Product::all();
        $services = Services::all();
        return view('home',compact('products','services'));
    }


}
