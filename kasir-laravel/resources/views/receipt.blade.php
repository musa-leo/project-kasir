<h2>STRUK PEMBELIAN</h2>

<p>ID Transaksi: {{ $transaction->id }}</p>

<table border="1" cellpadding="10">
    <tr>
        <th>Product</th>
        <th>Qty</th>
        <th>price</th>
        <th>Subtotal</th>
    </tr>

    @foreach($transaction->details as $item)
    <tr>
        <td>{{ $item->product->name }}</td>
        <td>{{ $item->qty }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->subtotal }}</td>
    </tr>
    @endforeach
</table>

<h3>Total: {{ $transaction->total_price }}</h3>
<h3>Bayar: {{ $transaction->cash_paid }}</h3>
<h3>Kembalian: {{ $transaction->change_money }}</h3>

<button onclick="window.print()">PRINT</button>