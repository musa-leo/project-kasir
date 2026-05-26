<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6fb;
            font-family:Arial, Helvetica, sans-serif;
        }

        /* NAVBAR */
        .navbar{
            background:#111827;
            padding:14px 0;
        }

        .navbar-brand{
            font-weight:700;
            font-size:22px;
        }

        .nav-link-custom{
            color:white;
            text-decoration:none;
            margin-left:18px;
            transition:0.3s;
        }

        .nav-link-custom:hover{
            color:#60a5fa;
        }

        .logout-btn{
            border:none;
            background:#ef4444;
            color:white;
            padding:8px 14px;
            border-radius:8px;
            margin-left:15px;
        }

        .logout-btn:hover{
            background:#dc2626;
        }

        /* TITLE */
        .dashboard-title{
            font-weight:700;
            color:#111827;
        }

        .dashboard-subtitle{
            color:#6b7280;
        }

        /* CARD */
        .dashboard-card{
            border:none;
            border-radius:18px;
            padding:24px;
            color:white;
            transition:0.3s;
            height:100%;
            box-shadow:0 8px 20px rgba(0,0,0,0.08);
        }

        .dashboard-card:hover{
            transform:translateY(-5px);
        }

        .card-title{
            font-size:16px;
            margin-bottom:10px;
        }

        .card-value{
            font-size:30px;
            font-weight:700;
        }

        .bg-primary-custom{
            background:#3b82f6;
        }

        .bg-success-custom{
            background:#22c55e;
        }

        .bg-warning-custom{
            background:#f59e0b;
        }

        .bg-danger-custom{
            background:#ef4444;
        }

        /* TABLE */
        .table-box{
            background:white;
            border-radius:18px;
            padding:24px;
            box-shadow:0 8px 20px rgba(0,0,0,0.06);
        }

        .table thead{
            background:#111827;
            color:white;
        }

        .table thead th{
            border:none;
        }

        .table td,
        .table th{
            padding:14px;
            vertical-align:middle;
        }

        a{
            text-decoration:none;
        }

    </style>
</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-dark">

    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand" href="/dashboard">
            🧾 Kasir App
        </a>

        <div class="d-flex align-items-center">

            <a href="/dashboard" class="nav-link-custom">
                Dashboard
            </a>

            <a href="/produk" class="nav-link-custom">
                Produk
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

    <h2 class="dashboard-title">
        📊 Dashboard Penjualan
    </h2>

    <p class="dashboard-subtitle mb-4">
        Selamat datang di sistem informasi kasir.
    </p>

    {{-- CARDS --}}
    <div class="row g-4">

        {{-- PRODUK --}}
        <div class="col-md-3">

            <a href="/produk">

                <div class="dashboard-card bg-primary-custom">

                    <div class="card-title">
                        📦 Total Produk
                    </div>

                    <div class="card-value">
                        {{ $totalProduk }}
                    </div>

                </div>

            </a>

        </div>

        {{-- TRANSAKSI --}}
        <div class="col-md-3">

            <a href="/transaksi">

                <div class="dashboard-card bg-success-custom">

                    <div class="card-title">
                        🧾 Total Transaksi
                    </div>

                    <div class="card-value">
                        {{ $totalTransaksi }}
                    </div>

                </div>

            </a>

        </div>

        {{-- OMZET --}}
        <div class="col-md-3">

            <div class="dashboard-card bg-warning-custom">

                <div class="card-title">
                    💰 Total Omzet
                </div>

                <div class="card-value">
                    Rp {{ number_format($totalOmzet,0,',','.') }}
                </div>

            </div>

        </div>

        {{-- HARI INI --}}
        <div class="col-md-3">

            <div class="dashboard-card bg-danger-custom">

                <div class="card-title">
                    📅 Penjualan Hari Ini
                </div>

                <div class="card-value">
                    Rp {{ number_format($todaySales,0,',','.') }}
                </div>

            </div>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="table-box mt-5">

        <h4 class="mb-4">
            🧾 Transaksi Terakhir
        </h4>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($latestTransactions as $t)

                    <tr>

                        <td>
                            #{{ $t->id }}
                        </td>

                        <td>
                            Rp {{ number_format($t->total_price,0,',','.') }}
                        </td>

                        <td>
                            Rp {{ number_format($t->payment,0,',','.') }}
                        </td>

                        <td>
                            Rp {{ number_format($t->change_money,0,',','.') }}
                        </td>

                        <td>
                            {{ $t->created_at->format('d M Y H:i') }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center text-muted">
                            Belum ada transaksi
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>