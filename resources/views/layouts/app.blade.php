<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ruangbelanja.')</title>
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f7f7f2;
            color: #1f2937;
        }

        .navbar {
            background-color: #f7f7f2;
            padding: 18px 36px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(20, 83, 45, 0.08);
        }

        .navbar-brand {
            color: #14532d;
            text-decoration: none;
            font-weight: 800;
            font-size: 1.35rem;
            letter-spacing: -0.02em;
        }

        .navbar-nav {
            display: flex;
            gap: 22px;
            align-items: center;
        }

        .navbar-nav a,
        .navbar-nav button {
            color: #374151;
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 500;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }

        .navbar-nav a:hover {
            color: #14532d;
        }

        .nav-btn-outline {
            border: 1px solid #15803d !important;
            color: #15803d !important;
            padding: 6px 14px !important;
            border-radius: 8px;
            font-weight: 600 !important;
        }

        .container {
            max-width: 1160px;
            margin: 28px auto 48px;
            padding: 0 24px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 14px;
            padding: 24px 28px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
            border: 1px solid #eef0ea;
        }

        .auth-card {
            max-width: 480px;
            margin: 24px auto;
        }

        .eyebrow {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            color: #15803d;
            margin-bottom: 6px;
        }

        h1 {
            margin: 0 0 20px;
            font-size: 1.85rem;
            font-weight: 800;
            color: #111827;
        }

        /* Filter katalog satu baris */
        .filter-form {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            align-items: flex-end;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1 1 140px;
            min-width: 130px;
        }

        .filter-item label {
            font-size: 0.82rem;
            font-weight: 600;
            color: #374151;
        }

        .filter-item input,
        .filter-item select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.9rem;
            background-color: #ffffff;
            color: #111827;
        }

        .filter-check {
            display: flex;
            align-items: center;
            gap: 6px;
            padding-bottom: 8px;
            font-size: 0.88rem;
            color: #374151;
            white-space: nowrap;
        }

        /* Grid katalog produk 3 kolom */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
            margin-top: 24px;
        }

        @media (max-width: 900px) {
            .product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
        }

        .product-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 18px;
            border: 1px solid #eef0ea;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-card img {
            width: 100%;
            height: 190px;
            object-fit: contain;
            border-radius: 10px;
            background-color: #fafafa;
            margin-bottom: 14px;
        }

        /* Form umum (register/login) */
        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            color: #1f2937;
        }

        .form-group input {
            display: block;
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.95rem;
            color: #111827;
        }

        .form-group input:focus,
        .filter-item input:focus,
        .filter-item select:focus {
            outline: none;
            border-color: #15803d;
        }

        .btn {
            display: inline-block;
            background-color: #14532d;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 10px 18px;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #166534;
        }

        .muted {
            color: #6b7280;
            font-size: 0.85rem;
        }

        .helper-text {
            display: block;
            margin-top: 5px;
        }

        .text-danger {
            display: block;
            margin-top: 5px;
            color: #dc2626;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <a href="{{ url('/') }}" class="navbar-brand">ruangbelanja.</a>
        <nav class="navbar-nav">
            <a href="{{ url('/') }}">Produk</a>
            @if (Route::has('cart.index'))
                <a href="{{ route('cart.index') }}">Keranjang</a>
            @endif
            @if (Route::has('orders.index'))
                <a href="{{ route('orders.index') }}">Pesanan</a>
            @endif
            @auth
                @if (Route::has('logout'))
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-btn-outline">Logout</button>
                    </form>
                @endif
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">Login</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>