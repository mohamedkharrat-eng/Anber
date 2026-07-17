<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
        ]);

        $cart = session()->get('cart', []);

foreach ($cart as $productId => $item) {
    $currentPrice = ($item['unit'] === 'kg' && isset($item['price_kg']) && $item['price_kg'] > 0) 
        ? $item['price_kg'] 
        : $item['price'];

    Order::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'phone' => $request->phone,
        'address' => $request->address,
        'city' => $request->city,
        'product_id' => $productId,
        'quantity' => $item['quantity'],
        'unit' => $item['unit'] ?? 'piece',
        'total_price' => $currentPrice * $item['quantity'],
        'status' => 'pending',
    ]);
}

        session()->forget('cart');
        return redirect('/order/success');
    }

    public function success()
    {
        return view('order-success');
    }
}