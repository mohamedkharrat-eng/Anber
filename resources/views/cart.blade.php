@extends('layouts.customer')

@section('title', 'Panier')

@section('content')
    <div style="padding:40px; max-width:900px; margin:0 auto;">
        <h1 style="color:#5C3D2E; font-family:Georgia,serif; margin-bottom:24px;">Mon Panier 🛒</h1>

        @if(session('success'))
            <p style="color:#27ae60; margin-bottom:16px;">{{ session('success') }}</p>
        @endif

        @if(empty($cart))
            <div style="text-align:center; padding:60px; background:white; border-radius:16px;">
                <p style="font-size:24px;">🛒</p>
                <p style="color:#9e7b6b; margin-top:12px;">Votre panier est vide</p>
                <a href="/" class="btn" style="display:inline-block; margin-top:20px;">Voir les produits</a>
            </div>
        @else
            <div style="background:white; border-radius:16px; overflow:hidden; box-shadow:0 4px 16px rgba(200,133,58,0.1);">
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php 
                        $currentPrice = ($item['unit'] === 'kg' && isset($item['price_kg']) && $item['price_kg'] > 0) 
                            ? $item['price_kg'] 
                            : $item['price'];
                        $total += $currentPrice * $item['quantity']; 
                    @endphp
                    <div style="display:flex; align-items:center; padding:20px; border-bottom:1px solid #F5EDE8;">
                        <div style="width:80px; height:80px; border-radius:10px; overflow:hidden; margin-right:20px; background:#F5EDE8;">
                            @if($item['image'])
                                <img src="{{ Storage::url($item['image']) }}" style="width:100%; height:100%; object-fit:cover;">
                            @else
                                <div style="display:flex; align-items:center; justify-content:center; height:100%; font-size:30px;">🍮</div>
                            @endif
                        </div>
                        <div style="flex:1;">
                            <h3 style="color:#5C3D2E;">{{ $item['name'] }}</h3>
                            <p style="color:#C8853A; font-weight:700;">
                                @if($item['unit'] === 'kg' && isset($item['price_kg']) && $item['price_kg'] > 0)
                                    {{ $item['price_kg'] }} TND/kg
                                @else
                                    {{ $item['price'] }} TND/pièce
                                @endif
                            </p>
                        </div>
                        <div style="display:flex; align-items:center; gap:12px;">
                            <form method="POST" action="/cart/update/{{ $id }}">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="0.1" step="0.1" style="width:70px; padding:8px; border:1.5px solid #E8A598; border-radius:8px; text-align:center;">
                                <select name="unit" style="padding:8px; border:1.5px solid #E8A598; border-radius:8px; color:#5C3D2E; margin-left:8px;">
                                    <option value="piece" {{ ($item['unit'] ?? 'piece') == 'piece' ? 'selected' : '' }}>Pièce</option>
                                    <option value="kg" {{ ($item['unit'] ?? 'piece') == 'kg' ? 'selected' : '' }}>Kg</option>
                                </select>
                                <button type="submit" style="background:#C8853A; color:white; border:none; padding:8px 12px; border-radius:8px; cursor:pointer; margin-left:8px;">✓</button>
                            </form>
                            <a href="/cart/remove/{{ $id }}" style="color:#e74c3c; text-decoration:none; font-size:20px;">✕</a>
                        </div>
                        <div style="margin-left:20px; font-weight:700; color:#5C3D2E; min-width:80px; text-align:right;">
                            {{ number_format($currentPrice * $item['quantity'], 3) }} TND
                        </div>
                    </div>
                @endforeach

                <div style="padding:20px; text-align:right;">
                    <p style="font-size:20px; font-weight:700; color:#5C3D2E;">Total: {{ number_format($total, 3) }} TND</p>
                    <a href="/checkout" class="btn" style="display:inline-block; margin-top:16px;">Valider ma commande →</a>
                </div>
            </div>
        @endif
    </div>
@endsection