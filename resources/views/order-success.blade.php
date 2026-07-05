@extends('layouts.customer')


@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anber - Commande confirmée</title>
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

    <div style="text-align:center; padding:80px 40px;">
        <div style="font-size:80px;">🎉</div>
        <h1 style="color:#5C3D2E; font-family:Georgia,serif; margin:24px 0 16px;">Commande confirmée!</h1>
        <p style="color:#9e7b6b; font-size:18px; margin-bottom:32px;">Merci pour votre commande. Nous vous contacterons bientôt.</p>
        <a href="/" class="btn">Retour à l'accueil</a>
    </div>
</body>
</html>
@endsection
