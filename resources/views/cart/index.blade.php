<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eef2f7;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        }

        .table thead {
            background: #111827;
            color: white;
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 15px;
        }

        .price {
            font-weight: 600;
            color: #16a34a;
        }

        .btn-add {
            border-radius: 8px;
        }

        .cart-box {
            background: #f9fafb;
            border-radius: 12px;
            padding: 10px;
        }

        .total {
            font-size: 20px;
            font-weight: bold;
            color: #16a34a;
        }
    </style>
</head>

<body>

<div class="container py-4">

    <h3 class="mb-4">🛒 Transaksi Kasir</h3>

    <div class="row g-4">

        <!-- PRODUK -->
        <div class="col-lg-8">
            <div class="card p-3">

                <div class="section-title">📦 Daftar Produk</div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse(($products ?? []) as $i => $p)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td class="price">
                                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <a href="/cart/add/{{ $p->id }}"
                                           class="btn btn-primary btn-sm btn-add">
                                            ➕ Tambah
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">
                                        Produk tidak tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- KERANJANG -->
        <div class="col-lg-4">
            <div class="card p-3">

                <div class="section-title">🧺 Keranjang</div>

                @php
                    $cart = $cart ?? [];
                    $grandTotal = 0;
                @endphp

                @if(count($cart) === 0)
                    <div class="alert alert-warning mb-0">
                        Keranjang masih kosong
                    </div>
                @else

                <div class="cart-box mb-3">

                    @foreach($cart as $item)

                        @php
                            $total = $item['harga'] * $item['qty'];
                            $grandTotal += $total;
                        @endphp

                        <div class="d-flex justify-content-between border-bottom py-2">
                            <div>
                                <div class="fw-semibold">{{ $item['nama'] }}</div>
                                <small class="text-muted">Qty: {{ $item['qty'] }}</small>

                                <!-- tombol hapus -->
                                <div>
                                    <a href="/cart/remove/{{ $item['id'] ?? '' }}"
                                       class="btn btn-danger btn-sm mt-2">
                                        🗑 Hapus
                                    </a>
                                </div>
                            </div>

                            <div class="fw-bold">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span>Total</span>
                    <span class="total">
                        Rp {{ number_format($grandTotal, 0, ',', '.') }}
                    </span>
                </div>

                <form action="/cart/checkout" method="POST">
                    @csrf

                    <input type="number"
                           name="payment"
                           class="form-control mb-2"
                           placeholder="Uang bayar"
                           required>

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