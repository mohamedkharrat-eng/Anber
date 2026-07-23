<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mme Gargouri - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* ADMIN SIDEBAR */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #4A2040, #6A3060);
            padding: 30px 0;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 100;
        }

        .sidebar-brand {
            text-align: center;
            padding: 0 20px 30px;
            border-bottom: 1px solid #6A3060;
            margin-bottom: 20px;
        }

        .sidebar-brand h1 {
            font-size: 20px;
            color: #E8709A;
            font-family: Georgia, serif;
            letter-spacing: 1px;
        }

        .sidebar-brand p {
            font-size: 11px;
            color: #E8A0B8;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-top: 4px;
        }

        .sidebar-links {
            padding: 0 16px;
        }

        .sidebar-links a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #F8C8D8;
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 4px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .sidebar-links a:hover {
            background: rgba(232, 112, 154, 0.2);
            color: #E8709A;
        }

        .sidebar-links a.active {
            background: linear-gradient(135deg, #C8406A, #E8709A);
            color: white;
        }

        .sidebar-logout {
            margin: 20px 16px 0;
            padding-top: 20px;
            border-top: 1px solid #6A3060;
        }

        .sidebar-logout a {
            display: block;
            text-align: center;
            color: #E8709A;
            text-decoration: none;
            padding: 10px;
            border: 1.5px solid #E8709A;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.2s;
        }

        .sidebar-logout a:hover {
            background: #E8709A;
            color: white;
        }

        .admin-main {
            margin-left: 250px;
            padding: 40px;
            flex: 1;
            background: #FFF8F8;
            min-height: 100vh;
        }

        .admin-main h1 {
            color: #4A2040;
            font-family: Georgia, serif;
            margin-bottom: 24px;
            font-size: 28px;
        }

        /* MOBILE */
        .mobile-header {
            display: none;
            background: linear-gradient(135deg, #4A2040, #6A3060);
            padding: 16px 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 200;
            align-items: center;
            justify-content: space-between;
        }

        .mobile-header h1 {
            color: #E8709A;
            font-size: 18px;
            font-family: Georgia, serif;
            margin: 0;
        }

        .hamburger {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .admin-main {
                margin-left: 0;
                padding: 80px 20px 20px;
            }

            .mobile-header {
                display: flex;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .admin-table {
                font-size: 12px;
            }

            .admin-table th,
            .admin-table td {
                padding: 10px 12px;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- MOBILE HEADER -->
    <div class="mobile-header">
        <h1>Mme Gargouri</h1>
        <button class="hamburger" onclick="toggleSidebar()">☰</button>
    </div>

    <div class="admin-wrapper">
        <!-- SIDEBAR -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <h1>Mme Gargouri</h1>
                <p>Admin Panel</p>
            </div>
            <div class="sidebar-links">
                <a href="/admin">📊 Dashboard</a>
                <a href="/admin/orders">📦 Orders</a>
                <a href="/admin/products">🍮 Products</a>
                <a href="/admin/messages">📩 Messages</a>
            </div>
            <div class="sidebar-logout">
                <a href="/admin/logout">🚪 Logout</a>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="admin-main">
            @yield('content')
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
        }
    </script>

</body>
</html>