@extends('admin.layout')

@section('title', 'Edit Product')

@section('content')
    <h1>Edit Product 🍮</h1>

    @if($errors->any())
        <div style="color:#e74c3c; margin-bottom:16px;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div style="display:flex; justify-content:center;">
        <div class="form-card" style="width:100%; max-width:600px;">
            <form method="POST" action="/admin/products/{{ $product->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="3" required>{{ $product->description }}</textarea>
                </div>

              <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
    <div class="form-group">
        <label>Prix par pièce (TND)</label>
        <input type="number" name="price" step="0.01" value="{{ $product->price }}" placeholder="ex: 2.500">
    </div>
    <div class="form-group">
        <label>Prix par kg (TND)</label>
        <input type="number" name="price_kg" step="0.01" value="{{ $product->price_kg }}" placeholder="ex: 25.000">
    </div>
</div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" value="{{ $product->stock }}" required>
                </div>

               <div class="form-group">
    <label>Category</label>
    <input type="text" name="category_name" value="{{ $product->category ? $product->category->name : '' }}" placeholder="ex: Baklawa, Ka3k, Mlabes...">
</div>

                <div class="form-group">
                    <label>Current Photo</label><br>
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" width="100" height="100" style="object-fit:cover; border-radius:8px; margin-bottom:10px;"><br>
                    @else
                        <p style="color:#9e7b6b;">No photo</p>
                    @endif
                    <label>Change Photo</label>
                    <input type="file" name="image" accept="image/*">
                </div>

                <button type="submit" class="btn">Update Product</button>
                <a href="/admin/products" style="margin-left:16px; color:#C8853A;">Cancel</a>
            </form>
        </div>
    </div>
@endsection