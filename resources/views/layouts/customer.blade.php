<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anber - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        <div class="brand">
            <h1>Anber</h1>
            <p>Patisserie Fine</p>
        </div>
        <div class="nav-links">
            <a href="/">Accueil</a>
            <a href="/products">Produits</a>
            <a href="/contact">Contact</a>
            <a href="/favourites">❤️ Favoris</a>
            <a href="/cart">🛒 Panier</a>
        </div>
    </nav>

    <!-- PAGE CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer>
        <div class="footer-grid">
            <div>
                <h3>Anber</h3>
                <p>Patisserie fine fondée à Sfax, Tunisie. Une tradition fière et fidèle.</p>
            </div>
            <div>
                <h3>Nos Produits</h3>
                <a href="/products">Boutique en ligne</a><br>
                <a href="/products?category=1">Baklawa</a><br>
                <a href="/products?category=2">Ka3k</a><br>
                <a href="/products?category=3">Mlabes</a>
            </div>
            <div>
                <h3>Navigation</h3>
                <a href="/">Accueil</a><br>
                <a href="/products">Produits</a><br>
                <a href="/contact">Contact</a>
            </div>
            <div>
                <h3>Contactez-nous</h3>
                <p>📞 +216 24 888 103</p>
                <p>📧 patisserieanber@gmail.com</p>
                <p>📍 Sfax, Tunisie</p>
                <p>🕐 24h/24</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2026 Anber Patisserie Fine. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        function toggleFav(id, btn) {
            let favs = JSON.parse(localStorage.getItem('anber_favourites') || '[]');
            const card = btn.closest('.product-card');
            const product = {
                id: id,
                name: card.querySelector('h3').innerText,
                price: card.querySelector('.price') ? card.querySelector('.price').innerText : '',
                image: card.querySelector('img') ? card.querySelector('img').src : null
            };

            const exists = favs.find(p => p.id === id);
            if (exists) {
                favs = favs.filter(p => p.id !== id);
                btn.innerText = '🤍';
            } else {
                favs.push(product);
                btn.innerText = '❤️';
            }
            localStorage.setItem('anber_favourites', JSON.stringify(favs));
        }

        document.addEventListener('DOMContentLoaded', function() {
            const favs = JSON.parse(localStorage.getItem('anber_favourites') || '[]');
            document.querySelectorAll('.fav-btn').forEach(btn => {
                const id = parseInt(btn.getAttribute('onclick').match(/\d+/)[0]);
                if (favs.find(p => p.id === id)) {
                    btn.innerText = '❤️';
                }
            });
        });
    </script>

</body>
</html>