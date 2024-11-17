<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /*
    
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $validate = $request->validate([
            'product' => 'required|string|max:255',
            'price' => 'required|integer',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        Product::create([
            'product' => $validate['product'],
            'price' => $validate['price'],
            'image' => $imagePath,

        ]
            
        );
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $validate = $request->validate([
            'product' => 'sometimes|string|max:255',
            'price' => 'sometimes|integer',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Add max size and allowed formats
        ]);

        // Find the product
        $product = Product::findOrFail($id);

        // Check if a new image has been uploaded
        if ($request->hasFile('image')) {
            // Store the image in the `storage/uploads` directory
            $imagePath = $request->file('image')->store('uploads', 'public');

            // Update the image path in the database
            $validate['image'] = $imagePath;
        }

        // Update the product with validated data
        $product->update($validate);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
