@extends('layouts.customer')

@section('title', 'Produits')

@section('content')
    <div style="padding:40px 60px;">
        <h1 style="color:#5C3D2E; font-family:Georgia,serif; margin-bottom:32px; text-align:center;">Nos Produits 🍮</h1>

        <!-- FILTERS -->
        <form method="GET" action="/products" style="background:white; padding:24px; border-radius:16px; box-shadow:0 4px 16px rgba(200,133,58,0.1); margin-bottom:40px; display:flex; gap:20px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label style="display:block; color:#5C3D2E; font-size:13px; font-weight:600; margin-bottom:6px;">Catégorie</label>
                <select name="category" style="padding:10px 16px; border:1.5px solid #E8A598; border-radius:10px; color:#5C3D2E; background:#FDF8F5; min-width:160px;">
                    <option value="">Toutes</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label style="display:block; color:#5C3D2E; font-size:13px; font-weight:600; margin-bottom:6px;">Prix min (TND)</label>
                <input type="number" name="min_price" value="{{ request('min_price') }}" step="0.1" placeholder="0" style="padding:10px 16px; border:1.5px solid #E8A598; border-radius:10px; color:#5C3D2E; background:#FDF8F5; width:120px;">
            </div>
            <div>
                <label style="display:block; color:#5C3D2E; font-size:13px; font-weight:600; margin-bottom:6px;">Prix max (TND)</label>
                <input type="number" name="max_price" value="{{ request('max_price') }}" step="0.1" placeholder="1000" style="padding:10px 16px; border:1.5px solid #E8A598; border-radius:10px; color:#5C3D2E; background:#FDF8F5; width:120px;">
            </div>
            <div style="display:flex; gap:10px;">
                <button type="submit" class="btn" style="padding:10px 24px;">Filtrer</button>
                <a href="/products" class="btn" style="padding:10px 24px; background:#9e7b6b;">Reset</a>
            </div>
        </form>

        <!-- PRODUCTS GRID -->
        @if($products->isEmpty())
            <div style="text-align:center; padding:60px;">
                <p style="font-size:24px;">🍮</p>
                <p style="color:#9e7b6b; margin-top:12px;">Aucun produit trouvé</p>
            </div>
        @else
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <button class="fav-btn" onclick="toggleFav({{ $product->id }}, this)">🤍</button>
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="product-image">
                        @else
                            <div class="product-image" style="display:flex; align-items:center; justify-content:center; font-size:60px; background:#F5EDE8;">🍮</div>
                        @endif
                        <div class="product-info">
                            @if($product->category)
                                <span style="background:#F5EDE8; color:#C8853A; font-size:12px; padding:4px 10px; border-radius:20px; font-weight:600;">{{ $product->category->name }}</span>
                            @endif
                            <h3 style="margin-top:8px;">{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                            <div class="product-footer">
                                <div>
                                    @if($product->price > 0)
                                        <span class="price">{{ $product->price }} TND/pièce</span><br>
                                    @endif
                                    @if($product->price_kg > 0)
                                        <span class="price" style="font-size:14px;">{{ $product->price_kg }} TND/kg</span>
                                    @endif
                                </div>
                                <form method="POST" action="/cart/add/{{ $product->id }}">
                                    @csrf
                                    <button type="submit" class="btn-small">🛒 Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection