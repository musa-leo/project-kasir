<!DOCTYPE html>
<html>
<head>
    <title>Cashier Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3f4f6;
        }

        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        }

        .table thead {
            background: #1f2937;
            color: white;
        }

        .btn-add {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .title {
            font-weight: 700;
        }
    </style>
</head>

<body>

<div class="container py-4">

    <h3 class="mb-4">🛒 Transaksi Kasir</h3>

    <div class="row g-3">

        <!-- PRODUK -->
        <div class="col-md-8">
            <div class="card p-3">
                <h5 class="mb-3">📦 Product</h5>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>price</th>
                                <th>action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $i => $p)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>Rp {{ number_format($p->harga,0,',','.') }}</td>
                                <td>
                                    <a href="/cart/add/{{ $p->id }}" class="btn btn-primary btn-sm btn-add">
                                        ➕ Add
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- KERANJANG -->
        <div class="col-md-4">
            <div class="card p-3">

                <h5 class="mb-3">🧺 Cart</h5>

                @php $grandTotal = 0; @endphp

                @if(empty($cart))
                    <div class="alert alert-warning">
                        Shopping Cart Is Still Empty
                    </div>
                @else

                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($cart as $item)

                            @php
                                $total = $item['harga'] * $item['qty'];
                                $grandTotal += $total;
                            @endphp

                            <tr>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['qty'] }}</td>
                                <td>Rp {{ number_format($total,0,',','.') }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>

                <hr>

                <h6>Total:</h6>
                <h4 class="text-success">
                    Rp {{ number_format($grandTotal,0,',','.') }}
                </h4>

                <form action="/cart/checkout" method="POST">
                    @csrf

                    <input type="number" name="payment" class="form-control mb-2" placeholder="Uang bayar" required>

                    <button class="btn btn-success w-100">
                        Checkout
                    </button>
                </form>

                @endif

            </div>
        </div>

    </div>
</div>

</body>
</html>