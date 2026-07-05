@extends('layouts.customer')
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anber - Commande</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav>
    <div class="brand">
        <h1>Anber</h1>
        <p>Patisserie Fine</p>
    </div>
    <div class="nav-links">
        <a href="/">Accueil</a>
        <a href="/products">Produits</a>
        <a href="/contact">Contact</a>
        <a href="/cart">🛒 Panier</a>
    </div>
</nav>

    <div style="padding:40px; max-width:1100px; margin:0 auto; display:grid; grid-template-columns:1fr 1fr; gap:40px;">

        <!-- Form -->
        <div>
            <h1 style="color:#5C3D2E; font-family:Georgia,serif; margin-bottom:24px;">Informations de livraison</h1>

            <div class="form-card">
                <form method="POST" action="/order">
                    @csrf

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" name="first_name" required>
                            @error('first_name') <p style="color:#e74c3c; font-size:13px;">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="last_name" required>
                            @error('last_name') <p style="color:#e74c3c; font-size:13px;">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" name="phone" placeholder="ex: 0055 123 456" required>
                        @error('phone') <p style="color:#e74c3c; font-size:13px;">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" name="address" required>
                        @error('address') <p style="color:#e74c3c; font-size:13px;">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label>Ville</label>
                        <input type="text" name="city" required>
                        @error('city') <p style="color:#e74c3c; font-size:13px;">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn" style="width:100%;">Confirmer la commande ✓</button>
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div>
            <h1 style="color:#5C3D2E; font-family:Georgia,serif; margin-bottom:24px;">Récapitulatif</h1>
            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 16px rgba(200,133,58,0.1);">
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 0; border-bottom:1px solid #F5EDE8;">
                        <div style="display:flex; align-items:center; gap:12px;">
                            <span style="background:#F5EDE8; width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center;">{{ $item['quantity'] }}</span>
                            <span style="color:#5C3D2E; font-weight:500;">{{ $item['name'] }}</span>
                        </div>
                        <span style="color:#C8853A; font-weight:700;">{{ number_format($item['price'] * $item['quantity'], 3) }} TND</span>
                    </div>
                @endforeach
                <div style="display:flex; justify-content:space-between; margin-top:16px; font-size:18px; font-weight:700; color:#5C3D2E;">
                    <span>Total</span>
                    <span style="color:#C8853A;">{{ number_format($total, 3) }} TND</span>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
@endsection