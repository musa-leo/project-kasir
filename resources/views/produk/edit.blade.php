<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Product</title>

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
            padding:40px;
        }

        /* TOPBAR */
        .topbar{
            background:linear-gradient(135deg,#1e293b,#0f172a);
            border-radius:24px;
            padding:35px;
            margin-bottom:35px;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 10px 30px rgba(0,0,0,0.25);
        }

        .page-title{
            font-size:34px;
            font-weight:700;
        }

        .page-subtitle{
            color:#94a3b8;
            margin-top:10px;
        }

        /* FORM CARD */
        .form-card{
            background:#111827;
            border-radius:28px;
            padding:40px;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 10px 30px rgba(0,0,0,0.25);
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
            height:55px;
            border-radius:16px;
            padding:15px;
        }

        .form-control:focus{
            background:#1e293b;
            color:white;
            box-shadow:none;
            border:2px solid #3b82f6;
        }

        textarea.form-control{
            height:120px;
            resize:none;
        }

        /* IMAGE */
        .preview-box{
            text-align:center;
            margin-bottom:25px;
        }

        .product-preview{
            width:220px;
            height:220px;
            object-fit:cover;
            border-radius:24px;
            border:4px solid rgba(255,255,255,0.08);
            box-shadow:0 10px 25px rgba(0,0,0,0.35);
            transition:0.3s;
        }

        .product-preview:hover{
            transform:scale(1.03);
        }

        /* BUTTON */
        .btn-save{
            background:linear-gradient(135deg,#22c55e,#16a34a);
            border:none;
            padding:14px 26px;
            border-radius:16px;
            color:white;
            font-weight:700;
            transition:0.3s;
        }

        .btn-save:hover{
            transform:translateY(-3px);
        }

        .btn-back{
            background:#334155;
            border:none;
            padding:14px 26px;
            border-radius:16px;
            color:white;
            font-weight:700;
            text-decoration:none;
        }

        .btn-back:hover{
            background:#475569;
            color:white;
        }

        /* ALERT */
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
        MAIN MENU
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

    {{-- TOPBAR --}}
    <div class="topbar">

        <div class="page-title">
            ✏ Edit Product
        </div>

        <div class="page-subtitle">
            Update product information, stock, price and image easily.
        </div>

    </div>

    {{-- ERROR --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    {{-- FORM CARD --}}
    <div class="form-card">

        {{-- IMAGE PREVIEW --}}
        <div class="preview-box">

            @if($produk->image)

                <img src="{{ asset('storage/' . $produk->image) }}"
                     class="product-preview">

            @else

                <img src="https://via.placeholder.com/220x220.png?text=No+Image"
                     class="product-preview">

            @endif

        </div>

        {{-- FORM --}}
        <form action="{{ route('produk.update', $produk->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- PRODUCT NAME --}}
            <div class="mb-4">

                <label class="form-label">
                    Product Name
                </label>

                <input type="text"
                       name="nama"
                       class="form-control"
                       value="{{ old('nama', $produk->nama) }}"
                       placeholder="Enter product name">

            </div>

            {{-- PRICE --}}
            <div class="mb-4">

                <label class="form-label">
                    Product Price
                </label>

                <input type="number"
                       name="harga"
                       class="form-control"
                       value="{{ old('harga', $produk->harga) }}"
                       placeholder="Enter product price">

            </div>

            {{-- STOCK --}}
            <div class="mb-4">

                <label class="form-label">
                    Product Stock
                </label>

                <input type="number"
                       name="stok"
                       class="form-control"
                       value="{{ old('stok', $produk->stok) }}"
                       placeholder="Enter stock quantity">

            </div>

            {{-- IMAGE --}}
            <div class="mb-4">

                <label class="form-label">
                    Product Image
                </label>

                <input type="file"
                       name="image"
                       class="form-control">

            </div>

            {{-- BUTTON --}}
            <div class="d-flex gap-3">

                <button type="submit" class="btn-save">
                    💾 Update Product
                </button>

                <a href="{{ route('produk.index') }}"
                   class="btn-back">

                    ← Back

                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>