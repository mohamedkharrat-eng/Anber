@extends('layouts.customer')

@section('title', 'Accueil')

@section('content')

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <h1>Bienvenue chez Anber 🌸</h1>
            <p>Découvrez nos délicieuses pâtisseries fines tunisiennes</p>
            <a href="/products" class="btn">Voir nos produits</a>
        </div>
    </section>

    <!-- INTRODUCTION -->
    <section style="padding:60px; background:white; text-align:center;">
        <div style="max-width:800px; margin:0 auto;">
            <h2 style="color:#C8853A; font-family:Georgia,serif; font-size:28px; margin-bottom:20px;">La Maison Anber</h2>
            <p style="color:#5C3D2E; font-size:16px; line-height:1.8;">
                Anber est la signature d'une gastronomie fine et la quintessence d'un héritage transmis. 
                Pâtisserie fine fondée à Sfax, en Tunisie, Anber est cette tradition fière et fidèle, 
                à la richesse subtile et intemporelle. Chaque pâtisserie est préparée avec soin, 
                en utilisant les meilleurs ingrédients pour vous offrir une expérience unique.
            </p>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="features">
        <div class="feature-card">
            <div class="icon">💳</div>
            <h3>Paiement à la livraison</h3>
            <p>Payez en cash à la réception de votre commande</p>
        </div>
        <div class="feature-card">
            <div class="icon">🎁</div>
            <h3>Coffrets cadeaux</h3>
            <p>Des coffrets élégants pour toutes les occasions</p>
        </div>
        <div class="feature-card">
            <div class="icon">⭐</div>
            <h3>Qualité garantie</h3>
            <p>Des pâtisseries fraîches préparées avec soin</p>
        </div>
        <div class="feature-card">
            <div class="icon">📞</div>
            <h3>Service 24h/24</h3>
            <p>Notre service client est toujours disponible</p>
        </div>
    </section>

    <!-- PRODUCTS SECTION -->
    <section class="products">
        <h2>Nos Produits</h2>
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
        <div style="text-align:center; margin-top:40px;">
            <a href="/products" class="btn">Voir tous les produits</a>
        </div>
    </section>

@endsection