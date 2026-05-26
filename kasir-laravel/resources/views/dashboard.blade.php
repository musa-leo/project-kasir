<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#0f172a;
            font-family:Arial, Helvetica, sans-serif;
            color:white;
        }

        /* SIDEBAR */
        .sidebar{
            width:260px;
            height:100vh;
            background:#111827;
            position:fixed;
            left:0;
            top:0;
            padding:30px 20px;
            border-right:1px solid rgba(255,255,255,0.08);
        }

        .logo{
            font-size:24px;
            font-weight:700;
            text-align:center;
            margin-bottom:40px;
            color:#38bdf8;
        }

        .menu-title{
            color:#94a3b8;
            font-size:13px;
            margin-bottom:15px;
        }

        .menu-link{
            display:flex;
            align-items:center;
            gap:12px;
            text-decoration:none;
            color:#e2e8f0;
            padding:14px 16px;
            border-radius:14px;
            margin-bottom:12px;
            transition:0.3s;
            font-weight:500;
        }

        .menu-link:hover{
            background:#1e293b;
            color:#38bdf8;
            transform:translateX(5px);
        }

        .logout-btn{
            width:100%;
            border:none;
            padding:14px;
            border-radius:14px;
            background:linear-gradient(135deg,#ef4444,#dc2626);
            color:white;
            font-weight:600;
            margin-top:25px;
            transition:0.3s;
        }

        .logout-btn:hover{
            transform:scale(1.03);
        }

        /* MAIN */
        .main{
            margin-left:260px;
            padding:35px;
        }

        /* TOPBAR */
        .topbar{
            background:linear-gradient(135deg,#1e293b,#0f172a);
            border-radius:24px;
            padding:30px;
            margin-bottom:35px;
            border:1px solid rgba(255,255,255,0.08);
            box-shadow:0 10px 30px rgba(0,0,0,0.3);
        }

        .welcome-title{
            font-size:30px;
            font-weight:700;
            margin-bottom:10px;
        }

        .welcome-subtitle{
            color:#94a3b8;
        }

        /* CARD */
        .stat-card{
            background:#111827;
            border-radius:24px;
            padding:28px;
            height:100%;
            transition:0.3s;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 10px 25px rgba(0,0,0,0.25);
        }

        .stat-card:hover{
            transform:translateY(-6px);
        }

        .stat-icon{
            width:70px;
            height:70px;
            border-radius:18px;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:32px;
            margin-bottom:20px;
        }

        .bg-blue{
            background:rgba(59,130,246,0.2);
        }

        .bg-green{
            background:rgba(34,197,94,0.2);
        }

        .bg-yellow{
            background:rgba(250,204,21,0.2);
        }

        .bg-red{
            background:rgba(239,68,68,0.2);
        }

        .stat-title{
            color:#94a3b8;
            font-size:15px;
            margin-bottom:8px;
        }

        .stat-value{
            font-size:34px;
            font-weight:700;
            color:white;
        }

        /* TABLE */
        .table-box{
            background:#111827;
            border-radius:24px;
            padding:28px;
            margin-top:35px;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 10px 25px rgba(0,0,0,0.25);
        }

        .table-title{
            font-size:22px;
            font-weight:700;
            margin-bottom:20px;
        }

        .table{
            color:white;
        }

        .table thead{
            background:#1e293b;
        }

        .table thead th{
            border:none;
            padding:16px;
            color:#cbd5e1;
        }

        .table tbody td{
            padding:16px;
            border-color:rgba(255,255,255,0.05);
        }

        .badge-status{
            background:rgba(34,197,94,0.2);
            color:#4ade80;
            padding:8px 14px;
            border-radius:999px;
            font-size:12px;
            font-weight:600;
        }

        @media(max-width:992px){

            .sidebar{
                width:100%;
                height:auto;
                position:relative;
            }

            .main{
                margin-left:0;
            }

        }

    </style>
</head>

<body>

{{-- SIDEBAR --}}
<div class="sidebar">

    <div class="logo">
        ⚡ CASHIER MSJ PRO
    </div>

    <div class="menu-title">
        MAIN MENU
    </div>

    <a href="/dashboard" class="menu-link">
        📊 Dashboard
    </a>

    <a href="/produk" class="menu-link">
        📦 Products
    </a>

    <a href="/transaksi" class="menu-link">
        🧾 Transactions
    </a>

    {{-- LOGOUT --}}
    <form action="{{ route('logout') }}" method="POST">

        @csrf

        <button type="submit" class="logout-btn">
            🚪 Logout
        </button>

    </form>

</div>

{{-- MAIN --}}
<div class="main">

    {{-- TOPBAR --}}
    <div class="topbar">

        <h2 class="welcome-title">
            Welcome Back, {{ auth()->user()->name }} 👋
        </h2>

        <p class="welcome-subtitle">
            Manage products, transactions, and monitor your sales activity.
        </p>
    </div>

    {{-- STATS --}}
    <div class="row g-4">

        {{-- PRODUCTS --}}
        <div class="col-lg-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon bg-blue">
                    📦
                </div>

                <div class="stat-title">
                    Total Products
                </div>

                <div class="stat-value">
                    {{ $totalProduk }}
                </div>

            </div>

        </div>

        {{-- TRANSACTIONS --}}
        <div class="col-lg-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon bg-green">
                    🧾
                </div>

                <div class="stat-title">
                    Total Transactions
                </div>

                <div class="stat-value">
                    {{ $totalTransaksi }}
                </div>

            </div>

        </div>

        {{-- REVENUE --}}
        <div class="col-lg-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon bg-yellow">
                    💰
                </div>

                <div class="stat-title">
                    Total Revenue
                </div>

                <div class="stat-value">
                    Rp {{ number_format($totalOmzet,0,',','.') }}
                </div>

            </div>

        </div>

        {{-- TODAY SALES --}}
        <div class="col-lg-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon bg-red">
                    🔥
                </div>

                <div class="stat-title">
                    Today's Sales
                </div>

                <div class="stat-value">
                    Rp {{ number_format($todaySales,0,',','.') }}
                </div>

            </div>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="table-box">

        <h4 class="table-title">
            Latest Transactions
        </h4>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Change</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($latestTransactions as $t)

                    <tr>

                        <td>#{{ $t->id }}</td>

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
                            <span class="badge-status">
                                Completed
                            </span>
                        </td>

                        <td>
                            {{ $t->created_at->format('d M Y H:i') }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center text-secondary py-4">
                            No transactions yet
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