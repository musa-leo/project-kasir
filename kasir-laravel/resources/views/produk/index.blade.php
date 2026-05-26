<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#0b1120;
            font-family:Arial, Helvetica, sans-serif;
            color:white;
            overflow-x:hidden;
        }

        /* SIDEBAR */
        .sidebar{
            width:270px;
            height:100vh;
            position:fixed;
            top:0;
            left:0;
            background:linear-gradient(180deg,#111827,#0f172a);
            padding:30px 20px;
            border-right:1px solid rgba(255,255,255,0.05);
        }

        .logo{
            text-align:center;
            font-size:26px;
            font-weight:700;
            margin-bottom:45px;
            color:#38bdf8;
            letter-spacing:1px;
        }

        .menu-title{
            color:#64748b;
            font-size:12px;
            margin-bottom:15px;
            text-transform:uppercase;
            letter-spacing:1px;
        }

        .menu-link{
            display:flex;
            align-items:center;
            gap:12px;
            padding:15px 18px;
            margin-bottom:12px;
            border-radius:16px;
            text-decoration:none;
            color:#e2e8f0;
            transition:0.3s;
            font-weight:600;
        }

        .menu-link:hover{
            background:#1e293b;
            color:#38bdf8;
            transform:translateX(5px);
        }

        .menu-link.active{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            color:white;
            box-shadow:0 10px 25px rgba(37,99,235,0.35);
        }

        .logout-btn{
            width:100%;
            margin-top:30px;
            border:none;
            padding:15px;
            border-radius:16px;
            background:linear-gradient(135deg,#ef4444,#dc2626);
            color:white;
            font-weight:700;
            transition:0.3s;
        }

        .logout-btn:hover{
            transform:translateY(-2px);
        }

        /* MAIN */
        .main{
            margin-left:270px;
            padding:35px;
        }

        /* HEADER */
        .topbar{
            background:linear-gradient(135deg,#111827,#1e293b);
            border-radius:30px;
            padding:40px;
            margin-bottom:35px;
            position:relative;
            overflow:hidden;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 15px 40px rgba(0,0,0,0.35);
        }

        .topbar::before{
            content:'';
            position:absolute;
            width:250px;
            height:250px;
            background:rgba(59,130,246,0.15);
            border-radius:50%;
            top:-100px;
            right:-80px;
        }

        .page-title{
            font-size:38px;
            font-weight:800;
            margin-bottom:10px;
            position:relative;
            z-index:2;
        }

        .page-subtitle{
            color:#94a3b8;
            font-size:16px;
            position:relative;
            z-index:2;
        }

        .btn-add{
            background:linear-gradient(135deg,#3b82f6,#2563eb);
            border:none;
            padding:15px 24px;
            border-radius:16px;
            color:white;
            font-weight:700;
            text-decoration:none;
            transition:0.3s;
            box-shadow:0 10px 25px rgba(37,99,235,0.35);
            position:relative;
            z-index:2;
        }

        .btn-add:hover{
            transform:translateY(-3px);
            color:white;
        }

        /* PRODUCT GRID */
        .product-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
            gap:25px;
        }

        .product-card{
            background:#111827;
            border-radius:28px;
            overflow:hidden;
            border:1px solid rgba(255,255,255,0.06);
            transition:0.3s;
            box-shadow:0 10px 30px rgba(0,0,0,0.25);
        }

        .product-card:hover{
            transform:translateY(-8px);
            box-shadow:0 20px 40px rgba(0,0,0,0.35);
        }

        .product-image{
            width:100%;
            height:230px;
            object-fit:cover;
            background:#1e293b;
        }

        .product-content{
            padding:24px;
        }

        .product-name{
            font-size:22px;
            font-weight:700;
            margin-bottom:12px;
        }

        .product-price{
            font-size:26px;
            font-weight:800;
            color:#38bdf8;
            margin-bottom:18px;
        }

        .stock-box{
            display:inline-block;
            background:rgba(34,197,94,0.15);
            color:#4ade80;
            padding:8px 16px;
            border-radius:999px;
            font-size:14px;
            font-weight:700;
            margin-bottom:22px;
        }

        .card-actions{
            display:flex;
            gap:12px;
        }

        .btn-edit{
            flex:1;
            border:none;
            padding:12px;
            border-radius:14px;
            background:linear-gradient(135deg,#f59e0b,#d97706);
            color:white;
            font-weight:700;
            text-decoration:none;
            text-align:center;
            transition:0.3s;
        }

        .btn-delete{
            flex:1;
            border:none;
            padding:12px;
            border-radius:14px;
            background:linear-gradient(135deg,#ef4444,#dc2626);
            color:white;
            font-weight:700;
            transition:0.3s;
        }

        .btn-edit:hover,
        .btn-delete:hover{
            transform:translateY(-2px);
            opacity:0.95;
            color:white;
        }

        .empty-box{
            background:#111827;
            border-radius:24px;
            padding:60px;
            text-align:center;
            color:#94a3b8;
            border:1px solid rgba(255,255,255,0.06);
        }

        .alert{
            border:none;
            border-radius:18px;
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
        Main Menu
    </div>

    <a href="/dashboard" class="menu-link">
        📊 Dashboard
    </a>

    <a href="/produk" class="menu-link active">
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

    {{-- HEADER --}}
    <div class="topbar">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>

                <div class="page-title">
                    📦 Product Management
                </div>

                <div class="page-subtitle">
                    Manage your products with a modern and clean dashboard.
                </div>

            </div>

            <a href="{{ route('produk.create') }}" class="btn-add">
                ➕ Add New Product
            </a>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>

    @endif

    {{-- PRODUCTS --}}
    @if(count($products) > 0)

        <div class="product-grid">

            @foreach($products as $p)

            <div class="product-card">

                {{-- IMAGE --}}
                @if($p->image)

                    <img src="{{ asset('images/' . $p->image) }}"
                         class="product-image"
                         alt="{{ $p->nama }}">

                @else

                    <img src="https://via.placeholder.com/500x300.png?text=No+Image"
                         class="product-image"
                         alt="No Image">

                @endif

                <div class="product-content">

                    <div class="product-name">
                        {{ $p->nama }}
                    </div>

                    <div class="product-price">
                        Rp {{ number_format($p->harga,0,',','.') }}
                    </div>

                    <div class="stock-box">
                        📦 {{ $p->stok }} Stock
                    </div>

                    <div class="card-actions">

                        <a href="{{ route('produk.edit', $p->id) }}"
                           class="btn-edit">
                            ✏ Edit
                        </a>

                        <form action="{{ route('produk.destroy', $p->id) }}"
                              method="POST"
                              style="flex:1;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn-delete w-100"
                                    onclick="return confirm('Delete this product?')">
                                🗑 Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    @else

        <div class="empty-box">

            <h3 class="mb-3">
                📦 No Products Available
            </h3>

            <p>
                Start adding products to your inventory.
            </p>

        </div>

    @endif

</div>

</body>
</html>