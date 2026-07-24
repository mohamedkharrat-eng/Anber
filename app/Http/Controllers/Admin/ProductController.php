<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,|max:20480',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    $categoryId = null;
    if ($request->category_name) {
        $category = \App\Models\Category::firstOrCreate(['name' => $request->category_name]);
        $categoryId = $category->id;
    }

   Product::create([
    'name' => $request->name,
    'description' => $request->description,
    'price' => $request->price ?? 0,
    'price_kg' => $request->price_kg,
    'stock' => $request->stock,
    'image' => $imagePath,
    'category_id' => $categoryId,
]);
    return redirect('/admin/products')->with('success', 'Product added successfully!');
}

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = \App\Models\Category::all();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,|max:20480',
    ]);

    $product = Product::find($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }

    $categoryId = $product->category_id;
    if ($request->category_name) {
        $category = \App\Models\Category::firstOrCreate(['name' => $request->category_name]);
        $categoryId = $category->id;
    }

    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price ?? 0;
    $product->price_kg = $request->price_kg;
    $product->stock = $request->stock;
    $product->category_id = $categoryId;
    $product->save();

    return redirect('/admin/products')->with('success', 'Product updated successfully!');
}

   public function destroy($id)
{
    $product = Product::find($id);
    // Delete related orders first
    \App\Models\Order::where('product_id', $id)->delete();
    $product->delete();
    return redirect('/admin/products')->with('success', 'Product deleted successfully!');
}
}