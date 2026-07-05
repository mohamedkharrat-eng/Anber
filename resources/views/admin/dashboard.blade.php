@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard 🌸</h1>
    
       <div class="stat-card">
    <h3>Messages</h3>
    <p>{{ $totalMessages }}</p>
       </div>
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total Products</h3>
            <p>{{ $totalProducts }}</p>
        </div>
        <div class="stat-card">
            <h3>Total Orders</h3>
            <p>{{ $totalOrders }}</p>
        </div>
        <div class="stat-card">
            <h3>Total Revenue</h3>
            <p style="font-size:28px;">{{ number_format($totalRevenue, 3) }} TND</p>
        </div>
        <div class="stat-card">
            <h3>Total Clients</h3>
            <p>{{ $totalClients }}</p>
        </div>
    </div>

    <h2 style="color:#5C3D2E; font-family:Georgia,serif; margin:40px 0 20px;">Recent Orders</h2>

    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Phone</th>
                <th>City</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach(\App\Models\Order::with('product')->latest()->take(5)->get() as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->city }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total_price }} TND</td>
                <td>{{ $order->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection