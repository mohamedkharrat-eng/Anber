@extends('admin.layout')

@section('title', 'Orders')

@section('content')
    <h1>Orders 📦</h1>

    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Phone</th>
                <th>Address</th>
                <th>City</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->city }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->quantity }} {{ $order->unit }}</td>
                <td>{{ $order->total_price }} TND</td>
                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                <td>
                    <form method="POST" action="/admin/orders/{{ $order->id }}/delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; cursor:pointer; font-size:20px;" title="Delete">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection