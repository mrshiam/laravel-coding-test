<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/products', $imageName);
        } else {
            $imageName = null;
        }

        Product::create([
            'name' => $validatedData['name'],
            'purchase_price' => $validatedData['purchase_price'],
            'sale_price' => $validatedData['sale_price'],
            'image' => $imageName,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/products', $imageName);
        } else {
            $imageName = $product->image;
        }

        $product->update([
            'name' => $validatedData['name'],
            'purchase_price' => $validatedData['purchase_price'],
            'sale_price' => $validatedData['sale_price'],
            'image' => $imageName,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        
        if ($product->image) {
            Storage::delete('public/products/' . $product->image);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
