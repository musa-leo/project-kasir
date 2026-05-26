<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6fb;
            font-family:Arial, Helvetica, sans-serif;
        }

        .navbar{
            background:#111827;
            padding:15px 0;
            box-shadow:0 4px 12px rgba(0,0,0,0.08);
        }

        .brand{
            color:white;
            font-weight:700;
            font-size:20px;
            text-decoration:none;
        }

        .nav-menu{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .nav-link-custom{
            color:#e5e7eb;
            text-decoration:none;
            padding:8px 14px;
            border-radius:8px;
        }

        .nav-link-custom:hover{
            background:#1f2937;
            color:white;
        }

        .logout-btn{
            border:none;
            background:#ef4444;
            color:white;
            padding:8px 14px;
            border-radius:8px;
        }

    </style>

</head>

<body>

<nav class="navbar">

    <div class="container d-flex justify-content-between align-items-center">

        <a href="/dashboard" class="brand">
            👑 ADMIN PANEL
        </a>

        <div class="nav-menu">

            <a href="/dashboard" class="nav-link-custom">
                Dashboard
            </a>

            <a href="/produk" class="nav-link-custom">
                Produk
            </a>

            <a href="/transaksi" class="nav-link-custom">
                Transaksi
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    🚪 Logout
                </button>
            </form>

        </div>

    </div>

</nav>

<div class="container py-4">

    @yield('content')

</div>

</body>
</html>