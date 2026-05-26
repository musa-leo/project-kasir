<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transaction Receipt</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#0f172a;
            font-family:Arial, Helvetica, sans-serif;
            color:white;
        }

        .receipt-wrapper{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px 20px;
        }

        .receipt-card{
            width:100%;
            max-width:700px;
            background:#111827;
            border-radius:28px;
            overflow:hidden;
            border:1px solid rgba(255,255,255,0.06);
            box-shadow:0 15px 40px rgba(0,0,0,0.35);
        }

        /* HEADER */
        .receipt-header{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            padding:35px;
            text-align:center;
        }

        .receipt-title{
            font-size:34px;
            font-weight:700;
            margin-bottom:10px;
        }

        .receipt-subtitle{
            color:rgba(255,255,255,0.8);
            font-size:15px;
        }

        /* BODY */
        .receipt-body{
            padding:35px;
        }

        .receipt-info{
            background:#1e293b;
            border-radius:20px;
            padding:22px;
            margin-bottom:30px;
        }

        .info-label{
            color:#94a3b8;
            font-size:14px;
        }

        .info-value{
            font-weight:700;
            font-size:17px;
            margin-top:5px;
        }

        /* TABLE */
        .table{
            color:white;
            margin-bottom:0;
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
            border-color:rgba(255,255,255,0.06);
            padding:18px 16px;
            vertical-align:middle;
        }

        .product-name{
            font-weight:600;
        }

        .subtotal{
            color:#38bdf8;
            font-weight:700;
        }

        /* SUMMARY */
        .summary-box{
            background:#1e293b;
            border-radius:20px;
            padding:25px;
            margin-top:30px;
        }

        .summary-item{
            display:flex;
            justify-content:space-between;
            margin-bottom:16px;
        }

        .summary-item:last-child{
            margin-bottom:0;
        }

        .summary-label{
            color:#cbd5e1;
        }

        .summary-value{
            font-weight:700;
        }

        .total-text{
            color:#22c55e;
            font-size:28px;
        }

        .change-text{
            color:#facc15;
            font-size:24px;
        }

        /* FOOTER */
        .receipt-footer{
            text-align:center;
            padding-top:30px;
        }

        .thank-you{
            font-size:24px;
            font-weight:700;
            margin-bottom:10px;
        }

        .footer-text{
            color:#94a3b8;
        }

        /* BUTTON */
        .btn-area{
            margin-top:35px;
            display:flex;
            gap:15px;
        }

        .btn-custom{
            flex:1;
            height:54px;
            border:none;
            border-radius:16px;
            font-weight:700;
            transition:0.3s;
        }

        .btn-print{
            background:linear-gradient(135deg,#22c55e,#16a34a);
            color:white;
        }

        .btn-back{
            background:#334155;
            color:white;
            text-decoration:none;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .btn-custom:hover{
            transform:translateY(-2px);
        }

        /* PRINT */
        @media print{

            body{
                background:white;
            }

            .btn-area{
                display:none;
            }

        }

    </style>

</head>
<body>

<div class="receipt-wrapper">

    <div class="receipt-card">

        {{-- HEADER --}}
        <div class="receipt-header">

            <div class="receipt-title">
                🧾 PAYMENT RECEIPT
            </div>

            <div class="receipt-subtitle">
                Cashier Transaction System
            </div>

        </div>

        {{-- BODY --}}
        <div class="receipt-body">

            {{-- INFO --}}
            <div class="receipt-info">

                <div class="row g-4">

                    <div class="col-md-4">

                        <div class="info-label">
                            Transaction ID
                        </div>

                        <div class="info-value">
                            #{{ $transaction->id }}
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="info-label">
                            Cashier
                        </div>

                        <div class="info-value">
                            {{ auth()->user()->name }}
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="info-label">
                            Transaction Date
                        </div>

                        <div class="info-value">
                            {{ $transaction->created_at->format('d M Y H:i') }}
                        </div>

                    </div>

                </div>

            </div>

            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table">

                    <thead>
                        <tr>
                            <th>Product</th>
                            <th width="100">Qty</th>
                            <th width="180">Price</th>
                            <th width="180">Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach($transaction->details as $detail)

                        <tr>

                            <td class="product-name">
                                {{ $detail->product->nama }}
                            </td>

                            <td>
                                {{ $detail->qty }}
                            </td>

                            <td>
                                Rp {{ number_format($detail->price,0,',','.') }}
                            </td>

                            <td class="subtotal">
                                Rp {{ number_format($detail->subtotal,0,',','.') }}
                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

            {{-- SUMMARY --}}
            <div class="summary-box">

                <div class="summary-item">

                    <div class="summary-label">
                        Total Price
                    </div>

                    <div class="summary-value total-text">
                        Rp {{ number_format($transaction->total_price,0,',','.') }}
                    </div>

                </div>

                <div class="summary-item">

                    <div class="summary-label">
                        Customer Payment
                    </div>

                    <div class="summary-value">
                        Rp {{ number_format($transaction->payment,0,',','.') }}
                    </div>

                </div>

                <div class="summary-item">

                    <div class="summary-label">
                        Change Money
                    </div>

                    <div class="summary-value change-text">
                        Rp {{ number_format($transaction->change_money,0,',','.') }}
                    </div>

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="receipt-footer">

                <div class="thank-you">
                    🎉 Thank You!
                </div>

                <div class="footer-text">
                    Thank you for shopping with us.<br>
                    Have a nice day and come back again.
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="btn-area">

                <button onclick="window.print()" class="btn-custom btn-print">
                    🖨 Print Receipt
                </button>

                <a href="{{ route('transaksi.index') }}"
                   class="btn-custom btn-back">
                    ← Back to Transaction
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>