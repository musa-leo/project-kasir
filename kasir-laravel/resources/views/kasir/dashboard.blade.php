<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cashier Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#0f172a;
            font-family:Arial, Helvetica, sans-serif;
            color:white;
            overflow-x:hidden;
        }

        /* SIDEBAR */
        .sidebar{
            width:260px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:#111827;
            padding:30px 20px;
            border-right:1px solid rgba(255,255,255,0.06);
        }

        .logo{
            text-align:center;
            font-size:24px;
            font-weight:700;
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

        .menu-link.active{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            color:white;
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
            border-radius:28px;
            padding:40px;
            margin-bottom:35px;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 15px 35px rgba(0,0,0,0.25);
            position:relative;
            overflow:hidden;
        }

        .topbar::before{
            content:'';
            width:250px;
            height:250px;
            background:rgba(59,130,246,0.15);
            border-radius:50%;
            position:absolute;
            right:-80px;
            top:-80px;
        }

        .welcome-text{
            font-size:38px;
            font-weight:700;
            margin-bottom:12px;
            position:relative;
            z-index:2;
        }

        .sub-text{
            color:#94a3b8;
            font-size:16px;
            position:relative;
            z-index:2;
        }

        /* STATS */
        .stats-card{
            background:#111827;
            border-radius:24px;
            padding:28px;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 10px 25px rgba(0,0,0,0.25);
            height:100%;
            transition:0.3s;
        }

        .stats-card:hover{
            transform:translateY(-6px);
        }

        .stats-icon{
            width:70px;
            height:70px;
            border-radius:18px;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:30px;
            margin-bottom:20px;
        }

        .icon-blue{
            background:rgba(59,130,246,0.2);
        }

        .icon-green{
            background:rgba(34,197,94,0.2);
        }

        .icon-yellow{
            background:rgba(250,204,21,0.2);
        }

        .stats-title{
            color:#94a3b8;
            font-size:15px;
            margin-bottom:10px;
        }

        .stats-value{
            font-size:34px;
            font-weight:700;
        }

        /* QUICK ACTION */
        .action-card{
            background:#111827;
            border-radius:24px;
            padding:35px;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 10px 25px rgba(0,0,0,0.25);
            margin-top:35px;
        }

        .action-title{
            font-size:24px;
            font-weight:700;
            margin-bottom:12px;
        }

        .action-subtitle{
            color:#94a3b8;
            margin-bottom:30px;
        }

        .start-btn{
            display:inline-flex;
            align-items:center;
            gap:10px;
            padding:16px 28px;
            border-radius:16px;
            background:linear-gradient(135deg,#22c55e,#16a34a);
            color:white;
            text-decoration:none;
            font-weight:700;
            transition:0.3s;
        }

        .start-btn:hover{
            transform:translateY(-3px);
            color:white;
        }

        /* INFO BOX */
        .info-box{
            margin-top:35px;
            background:linear-gradient(135deg,#1e293b,#111827);
            border-radius:24px;
            padding:30px;
            border:1px solid rgba(255,255,255,0.06);
        }

        .info-title{
            font-size:22px;
            font-weight:700;
            margin-bottom:18px;
        }

        .info-item{
            display:flex;
            align-items:center;
            gap:12px;
            margin-bottom:14px;
            color:#cbd5e1;
        }

        .info-item:last-child{
            margin-bottom:0;
        }

    </style>

</head>
<body>

{{-- SIDEBAR --}}
<div class="sidebar">

    <div class="logo">
        ⚡ CASHIER BLAY MAX
    </div>

    <div class="menu-title">
        CASHIER MENU BLAY MAX
    </div>

    <a href="/kasir" class="menu-link active">
        🏠 Dashboard
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

        <div class="welcome-text">
            👋 Welcome, {{ auth()->user()->name }} BLAY MSJ PRO
        </div>

        <div class="sub-text">
            Ready to serve customers and manage transactions efficiently.
        </div>

    </div>

    {{-- STATS --}}
    <div class="row g-4">

        <div class="col-md-4">

            <div class="stats-card">

                <div class="stats-icon icon-blue">
                    🧾
                </div>

                <div class="stats-title">
                    Today's Transactions
                </div>

                <div class="stats-value">
                    {{ $todayTransactions ?? 0 }}
                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="stats-card">

                <div class="stats-icon icon-green">
                    💰
                </div>

                <div class="stats-title">
                    Today's Revenue
                </div>

                <div class="stats-value">
                    Rp {{ number_format($todaySales ?? 0,0,',','.') }}
                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="stats-card">

                <div class="stats-title mb-3">

    <h5 class="fw-bold text-white mb-3">
        👨‍💼 Active Cashiers
    </h5>

    <div class="d-flex flex-column gap-2">

        <div class="cashier-item">
            🟢 Musa Siregar
        </div>

        <div class="cashier-item">
            🟢 Surya Pranata
        </div>

        <div class="cashier-item">
            🟢 Jonathan Prahtama
        </div>

    </div>

</div>

        </div>

    </div>

    {{-- QUICK ACTION --}}
    <div class="action-card">

        <div class="action-title">
            🚀 Start New Transaction
        </div>

        <div class="action-subtitle">
            Quickly create transactions and process customer payments.
        </div>

        <a href="/transaksi" class="start-btn">
            ➕ Open Transaction Page
        </a>

    </div>

    {{-- INFO --}}
    <div class="info-box">

        <div class="info-title">
            📌 Cashier Information
        </div>

        <div class="info-item">
            ✅ You can manage cashier transactions
        </div>

        <div class="info-item">
            ✅ Print customer payment receipts
        </div>

        <div class="info-item">
            ✅ View transaction history
        </div>

        <div class="info-item">
            🔒 Product management is only available for admin
        </div>

    </div>

</div>

</body>
</html>