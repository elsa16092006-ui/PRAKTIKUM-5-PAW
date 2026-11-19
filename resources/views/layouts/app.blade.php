<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko Laravel')</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f4f5f7;
            color: #111827;
        }

        .navbar {
            background-color: #111827;
            color: #ffffff;
            padding: 14px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .navbar-nav {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .navbar-nav a {
            color: #f9fafb;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .navbar-nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1100px;
            margin: 32px auto;
            padding: 0 20px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 28px 32px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
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
            color: #6b7280;
            margin-bottom: 6px;
        }

        h1 {
            margin: 0 0 20px;
            font-size: 1.75rem;
            color: #111827;
        }

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

        .form-group input:focus {
            outline: none;
            border-color: #111827;
        }

        .btn {
            display: inline-block;
            background-color: #111827;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 11px 18px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #1f2937;
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
        <a href="{{ url('/') }}" class="navbar-brand">Toko Laravel</a>
        <nav class="navbar-nav">
            <a href="{{ url('/') }}">Produk</a>
            @if (Route::has('login'))
                <a href="{{ route('login') }}">Login</a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>