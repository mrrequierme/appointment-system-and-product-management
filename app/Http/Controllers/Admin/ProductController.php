<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->get();
        return view('admins.products.index', compact('products'));
    }

    public function create(){
        return view('admins.products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => [
                'required',
                'numeric',
                'min:0',
                'max:999999.99',
                'regex:/^\d{1,6}(\.\d{1,2})?$/', 
            ],
            'definition' => 'required|string',
            'file' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('file')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'definition' => $request->definition,
            'file' => $path,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created!');
    }

    public function edit(Product $product)
    {
        return view('admins.products.edit',['editingProduct' => $product]);
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|decimal:0,2',
            'definition' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->definition = $request->definition;
        $product->user_id = auth()->id();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('products', 'public');

            if ($product->file && \Storage::disk('public')->exists($product->file)) {
                \Storage::disk('public')->delete($product->file);
            }

            $product->file = $path;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('admin.products.index')->with('success','Product deleted successfully!');
    }
}
