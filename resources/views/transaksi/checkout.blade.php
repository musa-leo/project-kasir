<!DOCTYPE html>
<html>
<head>
    <title>Checkout Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eef2f7;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .title {
            font-weight: 700;
        }

        .info-box {
            background: #f9fafb;
            border-radius: 12px;
            padding: 15px;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card p-4">

                <h3 class="title mb-3">🧾 Cashier Checkout</h3>

                <!-- ALERT -->
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- CART PREVIEW (lebih rapi, bukan debug) -->
                @if(session('cart'))
                    <div class="info-box mb-3">
                        <h6 class="mb-2">🛒 Shopping Cart Summary</h6>

                        @php $total = 0; @endphp

                        @foreach(session('cart') as $item)
                            @php
                                $subtotal = $item['harga'] * $item['qty'];
                                $total += $subtotal;
                            @endphp

                            <div class="d-flex justify-content-between border-bottom py-1">
                                <small>
                                    {{ $item['nama'] }} (x{{ $item['qty'] }})
                                </small>
                                <small>
                                    Rp {{ number_format($subtotal,0,',','.') }}
                                </small>
                            </div>
                        @endforeach

                        <div class="d-flex justify-content-between mt-2">
                            <strong>Total</strong>
                            <strong class="text-success">
                                Rp {{ number_format($total,0,',','.') }}
                            </strong>
                        </div>
                    </div>
                @endif

                <!-- FORM -->
                <form action="{{ route('transaksi.checkout') }}" method="POST">
                @csrf

                <div class="mb-3">
        <label class="form-label">💵 Payment Money</label>
        <input type="number"
               name="payment"
               class="form-control"
               placeholder="Masukkan uang pelanggan"
               required>
            </div>

        <button type="submit" class="btn btn-success w-100">
        💰 Pay & Checkout
         </button>
    </form>
</div>

</body>
</html>