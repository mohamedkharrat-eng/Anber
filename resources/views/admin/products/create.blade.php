@extends('admin.layout')

@section('title', 'Add Product')

@section('content')
    <h1>Add Product 🍮</h1>

    @if($errors->any())
        <div style="color:#e74c3c; margin-bottom:16px;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div style="display:flex; justify-content:center;">
        <div class="form-card" style="width:100%; max-width:600px;">
            <form method="POST" action="/admin/products" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="3" required>{{ old('description') }}</textarea>
                </div>

              <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
    <div class="form-group">
        <label>Prix par pièce (TND)</label>
        <input type="number" name="price" step="0.01" value="{{ old('price') }}" placeholder="ex: 2.500">
    </div>
    <div class="form-group">
        <label>Prix par kg (TND)</label>
        <input type="number" name="price_kg" step="0.01" value="{{ old('price_kg') }}" placeholder="ex: 25.000">
    </div>
</div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" required>
                </div>

<div class="form-group">
    <label>Category</label>
    <input type="text" name="category_name" placeholder="ex: Baklawa, Ka3k, Mlabes..." value="{{ old('category_name') }}">
</div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="image" accept="image/*">
                </div>

                <button type="submit" class="btn">Add Product</button>
                <a href="/admin/products" style="margin-left:16px; color:#C8853A;">Cancel</a>
            </form>
        </div>
    </div>
@endsection