@extends('admin.layout')

@section('title', 'Products')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Products 🍮</h1>
        <a href="/admin/products/create" class="btn">+ Add Product</a>
    </div>

    @if(session('success'))
        <p style="color:#27ae60; margin-bottom:16px;">{{ session('success') }}</p>
    @endif

    <table class="admin-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" width="60" height="60" style="object-fit:cover; border-radius:8px;">
                    @else
                        🍮
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }} TND</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="/admin/products/{{ $product->id }}/edit" class="btn-edit">Edit</a>
                    <form method="POST" action="/admin/products/{{ $product->id }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection