@extends('layouts.customer')

@section('title', 'Favoris')

@section('content')
    <div style="padding:40px 60px;">
        <h1 style="color:#5C3D2E; font-family:Georgia,serif; margin-bottom:32px; text-align:center;">Mes Favoris ❤️</h1>
        <div id="favourites-container" class="products-grid"></div>
        <div id="empty-msg" style="text-align:center; padding:60px; display:none;">
            <p style="font-size:24px;">🤍</p>
            <p style="color:#9e7b6b; margin-top:12px;">Aucun favori pour le moment</p>
            <a href="/products" class="btn" style="display:inline-block; margin-top:20px;">Voir les produits</a>
        </div>
    </div>

    <script>
        const favs = JSON.parse(localStorage.getItem('anber_favourites') || '[]');
        const container = document.getElementById('favourites-container');
        const emptyMsg = document.getElementById('empty-msg');

        if (favs.length === 0) {
            container.style.display = 'none';
            emptyMsg.style.display = 'block';
        } else {
            favs.forEach(product => {
                container.innerHTML += `
                    <div class="product-card">
                        <div class="product-image" style="display:flex; align-items:center; justify-content:center; font-size:60px; background:#F5EDE8;">${product.image ? `<img src="${product.image}" style="width:100%; height:100%; object-fit:cover;">` : '🍮'}</div>
                        <div class="product-info">
                            <h3>${product.name}</h3>
                            <div class="product-footer">
                                <span class="price">${product.price} TND</span>
                                <button onclick="removeFav(${product.id}, this)" style="background:#e74c3c; color:white; border:none; padding:8px 14px; border-radius:20px; cursor:pointer;">❌ Retirer</button>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        function removeFav(id, btn) {
            let favs = JSON.parse(localStorage.getItem('anber_favourites') || '[]');
            favs = favs.filter(p => p.id !== id);
            localStorage.setItem('anber_favourites', JSON.stringify(favs));
            location.reload();
        }
    </script>
@endsection