<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    // Show login page
    public function loginPage()
    {
        return view('admin.login');
    }
    public function deleteOrder($id)
{
    \App\Models\Order::find($id)->delete();
    return back()->with('success', 'Order deleted!');
}
    // Handle login
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username === 'anber' && $password === 'anber2026') {
            session(['admin_logged_in' => true]);
            return redirect('/admin');
        }

        return back()->with('error', 'Username or password incorrect!');
    }

    // Logout
    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect('/admin/login');
    }

public function dashboard()
{
    $totalProducts = Product::count();
    $totalOrders = \App\Models\Order::count();
    $totalRevenue = \App\Models\Order::sum('total_price');
    $totalClients = \App\Models\Order::distinct('phone')->count('phone');
    $totalMessages = \App\Models\Message::count();
    return view('admin.dashboard', [
    'totalProducts' => $totalProducts,
    'totalOrders' => $totalOrders,
    'totalRevenue' => $totalRevenue,
    'totalClients' => $totalClients,
    'totalMessages' => $totalMessages,
]);

    return view('admin.dashboard', [
        'totalProducts' => $totalProducts,
        'totalOrders' => $totalOrders,
        'totalRevenue' => $totalRevenue,
        'totalClients' => $totalClients,
    ]);
}
public function orders()
{
    $orders = \App\Models\Order::with('product')->latest()->get();
    return view('admin.orders', ['orders' => $orders]);
}

public function updateStatus(Request $request, $id)
{
    $order = \App\Models\Order::find($id);
    $order->status = $request->status;
    $order->save();
    return back();
}
public function messages()
{
    $messages = \App\Models\Message::latest()->get();
    return view('admin.messages', ['messages' => $messages]);
}
public function deleteMessage($id)
{
    \App\Models\Message::find($id)->delete();
    return back()->with('success', 'Message deleted!');
}
}