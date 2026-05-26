<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f8fafc;
            font-family:Arial, Helvetica, sans-serif;
        }

        /* NAVBAR */
        .navbar{
            background:#111827;
            padding:14px 0;
            box-shadow:0 4px 12px rgba(0,0,0,0.08);
        }

        .brand{
            color:white;
            font-size:20px;
            font-weight:700;
        }

        .nav-menu{
            display:flex;
            align-items:center;
            gap:14px;
        }

        .nav-link-custom{
            color:#e5e7eb;
            text-decoration:none;
            padding:8px 14px;
            border-radius:8px;
            transition:0.3s;
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
            transition:0.3s;
        }

        .logout-btn:hover{
            background:#dc2626;
        }

        /* CARD */
        .card-kasir{
            border:none;
            border-radius:18px;
            padding:30px;
            background:white;
            box-shadow:0 8px 20px rgba(0,0,0,0.06);
        }

        .dashboard-title{
            font-weight:700;
            color:#111827;
        }

        .welcome-title{
            font-weight:700;
            margin-bottom:10px;
        }

        .subtitle{
            color:#6b7280;
            margin-bottom:25px;
        }

        .start-btn{
            height:48px;
            border-radius:12px;
            font-weight:600;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:8px;
        }

    </style>

</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar">

    <div class="container d-flex justify-content-between align-items-center">

        <div class="brand">
            🧾 KASIR PANEL
        </div>

        <div class="nav-menu">

            <a href="/kasir" class="nav-link-custom">
                Dashboard
            </a>

            <a href="/transaksi" class="nav-link-custom">
                Transaksi
            </a>

            {{-- LOGOUT --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    🚪 Logout
                </button>
            </form>

        </div>

    </div>

</nav>

{{-- CONTENT --}}
<div class="container py-5">

    <h2 class="dashboard-title mb-4">
        🧾 Dashboard Kasir
    </h2>

    <div class="card-kasir">

        <h4 class="welcome-title">
            Selamat datang, {{ auth()->user()->name }}
        </h4>

        <p class="subtitle">
            Kamu hanya bisa melakukan transaksi kasir.
        </p>

        <a href="/transaksi" class="btn btn-primary start-btn">
            ➕ Mulai Transaksi
        </a>

    </div>

</div>

</body>
</html>