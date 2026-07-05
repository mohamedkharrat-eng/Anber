<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('home', ['products' => $products]);
    }

    public function products(Request $request)
    {
        $categories = \App\Models\Category::all();
        $query = Product::with('category');

        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->get();

        return view('products', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function contact()
    {
        return view('contact');
    }
    public function favourites()
{
    return view('favourites');
}
}