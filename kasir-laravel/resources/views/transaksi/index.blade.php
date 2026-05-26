<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cashier Transaction</title>

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

        /* PRODUCT CARD */
        .product-card{
            background:#111827;
            border-radius:24px;
            padding:20px;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 10px 25px rgba(0,0,0,0.25);
            height:100%;
            transition:0.3s;
        }

        .product-card:hover{
            transform:translateY(-5px);
        }

        .product-image{
            width:100%;
            height:180px;
            object-fit:cover;
            border-radius:18px;
            margin-bottom:18px;
        }

        .product-name{
            font-size:20px;
            font-weight:700;
            margin-bottom:10px;
        }

        .product-price{
            color:#38bdf8;
            font-size:20px;
            font-weight:700;
        }

        .product-stock{
            color:#94a3b8;
            margin-top:6px;
            margin-bottom:18px;
        }

        .btn-cart{
            width:100%;
            border:none;
            padding:12px;
            border-radius:14px;
            background:linear-gradient(135deg,#22c55e,#16a34a);
            color:white;
            font-weight:700;
            transition:0.3s;
        }

        .btn-cart:hover{
            transform:translateY(-2px);
        }

        /* CART */
        .cart-box{
            background:#111827;
            border-radius:24px;
            padding:25px;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 10px 25px rgba(0,0,0,0.25);
            position:sticky;
            top:20px;
        }

        .cart-title{
            font-size:24px;
            font-weight:700;
            margin-bottom:25px;
        }

        .cart-item{
            background:#1e293b;
            padding:18px;
            border-radius:18px;
            margin-bottom:16px;
        }

        .cart-item-name{
            font-size:17px;
            font-weight:700;
        }

        .cart-item-price{
            color:#38bdf8;
            font-weight:700;
        }

        .qty-box{
            display:flex;
            align-items:center;
            gap:10px;
            margin-top:12px;
        }

        .qty-btn{
            width:35px;
            height:35px;
            border:none;
            border-radius:10px;
            font-weight:700;
            color:white;
        }

        .btn-minus{
            background:#ef4444;
        }

        .btn-plus{
            background:#22c55e;
        }

        .btn-remove{
            border:none;
            background:#ef4444;
            color:white;
            padding:8px 14px;
            border-radius:10px;
            margin-left:auto;
        }

        /* TOTAL */
        .total-box{
            background:#1e293b;
            border-radius:18px;
            padding:20px;
            margin-top:25px;
        }

        .total-title{
            color:#94a3b8;
        }

        .total-value{
            font-size:30px;
            font-weight:700;
            color:#22c55e;
        }

        /* PAYMENT */
        .payment-input{
            background:#1e293b;
            border:none;
            color:white;
            height:55px;
            border-radius:16px;
            padding:15px;
            margin-top:20px;
        }

        .payment-input:focus{
            background:#1e293b;
            color:white;
            box-shadow:none;
            border:2px solid #38bdf8;
        }

        .change-box{
            background:#0f172a;
            border-radius:18px;
            padding:20px;
            margin-top:20px;
            border:1px solid rgba(255,255,255,0.06);
        }

        .change-title{
            color:#94a3b8;
        }

        .change-value{
            color:#22c55e;
            font-size:28px;
            font-weight:700;
        }

        .checkout-btn{
            width:100%;
            border:none;
            padding:15px;
            border-radius:16px;
            background:linear-gradient(135deg,#3b82f6,#2563eb);
            color:white;
            font-weight:700;
            margin-top:20px;
            transition:0.3s;
        }

        .checkout-btn:hover{
            transform:translateY(-2px);
        }

        .empty-cart{
            background:#1e293b;
            padding:20px;
            border-radius:18px;
            text-align:center;
            color:#94a3b8;
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

    <a href="/transaksi" class="menu-link active">
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
            🧾 Cashier Transaction
        </div>

        <div class="page-subtitle">
            Manage customer orders and payments quickly.
        </div>

    </div>

    <div class="row g-4">

        {{-- PRODUCT LIST --}}
        <div class="col-lg-8">

            <div class="row g-4">

                @foreach($products as $p)

                <div class="col-md-6">

                    <div class="product-card">

                        @if($p->image)

                            <img src="{{ asset('storage/' . $p->image) }}"
                                 class="product-image">

                        @else

                            <img src="https://via.placeholder.com/300x180.png?text=No+Image"
                                 class="product-image">

                        @endif

                        <div class="product-name">
                            {{ $p->nama }}
                        </div>

                        <div class="product-price">
                            Rp {{ number_format($p->harga,0,',','.') }}
                        </div>

                        <div class="product-stock">
                            {{ $p->stok }} stock available
                        </div>

                        <form action="{{ route('transaksi.add', $p->id) }}"
                              method="POST">

                            @csrf

                            <button class="btn-cart">
                                ➕ Add to Cart
                            </button>

                        </form>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        {{-- CART --}}
        <div class="col-lg-4">

            <div class="cart-box">

                <div class="cart-title">
                    🛒 Shopping Cart
                </div>

                @php $grandTotal = 0; @endphp

                @if(count($cart) > 0)

                    @foreach($cart as $id => $item)

                        @php
                            $subtotal = $item['harga'] * $item['qty'];
                            $grandTotal += $subtotal;
                        @endphp

                        <div class="cart-item">

                            <div class="d-flex justify-content-between">

                                <div>

                                    <div class="cart-item-name">
                                        {{ $item['nama'] }}
                                    </div>

                                    <div class="cart-item-price">
                                        Rp {{ number_format($subtotal,0,',','.') }}
                                    </div>

                                </div>

                                <div>
                                    x{{ $item['qty'] }}
                                </div>

                            </div>

                            <div class="qty-box">

                                {{-- MINUS --}}
                                <form action="{{ route('transaksi.decrease', $id) }}"
                                      method="POST">

                                    @csrf

                                    <button class="qty-btn btn-minus">
                                        -
                                    </button>

                                </form>

                                {{-- PLUS --}}
                                <form action="{{ route('transaksi.increase', $id) }}"
                                      method="POST">

                                    @csrf

                                    <button class="qty-btn btn-plus">
                                        +
                                    </button>

                                </form>

                                {{-- REMOVE --}}
                                <form action="{{ route('transaksi.remove', $id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn-remove">
                                        Remove
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                    {{-- TOTAL --}}
                    <div class="total-box">

                        <div class="total-title">
                            Total Payment
                        </div>

                        <div class="total-value">
                            Rp {{ number_format($grandTotal,0,',','.') }}
                        </div>

                    </div>

                    {{-- CHECKOUT --}}
                    <form action="{{ route('transaksi.checkout') }}"
                          method="POST">

                        @csrf

                        <input type="number"
                               name="payment"
                               id="payment"
                               class="form-control payment-input"
                               placeholder="Enter payment amount"
                               required>

                        {{-- CHANGE --}}
                        <div class="change-box">

                            <div class="change-title">
                                Change Money
                            </div>

                            <div class="change-value"
                                 id="changeText">

                                Rp 0

                            </div>

                        </div>

                        <button class="checkout-btn">
                            💳 Complete Payment
                        </button>

                    </form>

                @else

                    <div class="empty-cart">
                        No products in cart
                    </div>

                @endif

            </div>

        </div>

    </div>

</div>

<script>

    const paymentInput = document.getElementById('payment');
    const changeText = document.getElementById('changeText');

    const total = {{ $grandTotal ?? 0 }};

    if(paymentInput){

        paymentInput.addEventListener('input', function(){

            let payment = parseInt(this.value) || 0;

            let change = payment - total;

            if(change < 0){
                change = 0;
            }

            changeText.innerHTML =
                'Rp ' + change.toLocaleString('id-ID');

        });

    }

</script>

</body>
</html>