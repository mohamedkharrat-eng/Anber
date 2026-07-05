<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show cart
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', ['cart' => $cart]);
    }

    // Add to cart
public function add(Request $request, $id)
{
    $product = Product::find($id);
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => 1,
            'unit' => 'piece',
        ];
    }

    session()->put('cart', $cart);
    return redirect('/cart')->with('success', 'Produit ajouté au panier!');
}

public function update(Request $request, $id)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        $cart[$id]['quantity'] = $request->quantity;
        $cart[$id]['unit'] = $request->unit;
        session()->put('cart', $cart);
    }
    return redirect('/cart');
}

    // Remove from cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect('/cart');
    }

    // Show checkout form
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/cart');
        }
        return view('checkout', ['cart' => $cart]);
    }
}