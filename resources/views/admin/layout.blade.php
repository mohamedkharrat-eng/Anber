<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anber - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .admin-nav {
            background: white;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(200, 133, 58, 0.1);
        }
        .admin-nav .brand h1 { font-size: 24px; color: #C8853A; font-family: Georgia, serif; }
        .admin-nav .brand p { font-size: 11px; color: #E8A598; letter-spacing: 3px; text-transform: uppercase; }
        .admin-nav-links a { color: #5C3D2E; text-decoration: none; margin-left: 24px; font-weight: 500; }
        .admin-nav-links a:hover { color: #C8853A; }
        .logout-btn { background: none; border: 1.5px solid #C8853A; color: #C8853A; padding: 8px 18px; border-radius: 8px; cursor: pointer; font-size: 14px; margin-left: 24px; text-decoration: none; }
        .logout-btn:hover { background: #C8853A; color: white; }
        .admin-content { padding: 40px; }
        h1 { color: #5C3D2E; font-family: Georgia, serif; margin-bottom: 24px; }
    </style>
</head>
<body>

    <nav class="admin-nav">
        <div class="brand">
            <h1>Anber</h1>
            <p>Admin Panel</p>
        </div>
        <div class="admin-nav-links">
            <a href="/admin">Dashboard</a>
            <a href="/admin/orders">Orders</a>
            <a href="/admin/products">Products</a>
            <a href="/admin/messages">Messages</a>
            <a href="/admin/logout" class="logout-btn">Logout</a>
        </div>
    </nav>

    <div class="admin-content">
        @yield('content')
    </div>

</body>
</html>