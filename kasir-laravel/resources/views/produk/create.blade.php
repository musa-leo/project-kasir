<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#0f172a;
            font-family:Arial, Helvetica, sans-serif;
            color:white;
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

        .topbar{
            background:linear-gradient(135deg,#1e293b,#0f172a);
            border-radius:24px;
            padding:30px;
            margin-bottom:30px;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 10px 30px rgba(0,0,0,0.25);
        }

        .page-title{
            font-size:32px;
            font-weight:700;
        }

        .page-subtitle{
            color:#94a3b8;
            margin-top:10px;
        }

        /* FORM CARD */
        .form-card{
            background:#111827;
            border-radius:24px;
            padding:35px;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 10px 25px rgba(0,0,0,0.25);
            max-width:700px;
        }

        .form-label{
            color:#e2e8f0;
            font-weight:600;
            margin-bottom:10px;
        }

        .form-control{
            background:#1e293b;
            border:none;
            color:white;
            height:52px;
            border-radius:14px;
            padding:15px;
        }

        .form-control:focus{
            background:#1e293b;
            color:white;
            box-shadow:none;
            border:1px solid #38bdf8;
        }

        .form-control::placeholder{
            color:#94a3b8;
        }

        /* BUTTON */
        .btn-save{
            background:linear-gradient(135deg,#3b82f6,#2563eb);
            border:none;
            height:52px;
            border-radius:14px;
            color:white;
            font-weight:700;
            transition:0.3s;
        }

        .btn-save:hover{
            transform:translateY(-2px);
        }

        .btn-back{
            background:#374151;
            border:none;
            height:52px;
            border-radius:14px;
            color:white;
            font-weight:600;
            text-decoration:none;
            display:flex;
            justify-content:center;
            align-items:center;
            transition:0.3s;
        }

        .btn-back:hover{
            background:#4b5563;
            color:white;
        }

        .alert{
            border:none;
            border-radius:16px;
        }

    </style>

</head>
<body>

{{-- SIDEBAR --}}
<div class="sidebar">

    <div class="logo">
        ⚡ CASHIER ADMIN
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

        <div class="page-title">
            ➕ Add New Product
        </div>

        <div class="page-subtitle">
            Create and add new products into your inventory.
        </div>

    </div>

    {{-- ERROR --}}
    @if ($errors->any())

        <div class="alert alert-danger mb-4">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    {{-- FORM --}}
    <div class="form-card">

        <form action="{{ route('produk.store') }}" method="POST">

            @csrf

            {{-- PRODUCT NAME --}}
            <div class="mb-4">

                <label class="form-label">
                    Product Name
                </label>

                <input type="text"
                       name="nama"
                       class="form-control"
                       placeholder="Enter product name"
                       required>

            </div>

            {{-- PRICE --}}
            <div class="mb-4">

                <label class="form-label">
                    Product Price
                </label>

                <input type="number"
                       name="harga"
                       class="form-control"
                       placeholder="Enter product price"
                       required>

            </div>

            {{-- STOCK --}}
            <div class="mb-4">

                <label class="form-label">
                    Product Stock
                </label>

                <input type="number"
                       name="stok"
                       class="form-control"
                       placeholder="Enter product stock"
                       required>

            </div>

            {{-- BUTTON --}}
            <div class="row g-3">

                <div class="col-md-6">

                    <button type="submit" class="btn btn-save w-100">
                        💾 Save Product
                    </button>

                </div>

                <div class="col-md-6">

                    <a href="{{ route('produk.index') }}"
                       class="btn-back w-100">
                        ← Back
                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

</body>
</html>