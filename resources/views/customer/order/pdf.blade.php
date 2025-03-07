<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details #{{ $order->id }}</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .table-dark {
            background: #333;
            color: white;
        }
    </style>
</head>

<body>
    <h2>📦 Order Details #{{ $order->id }}</h2>

    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

    <h3>🛍️ Produk yang Dibeli:</h3>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails as $detail)
                <tr>
                    <td>{{ $detail->product_name }}</td>
                    <td>Rp.{{ number_format($detail->price) }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td><strong>Rp. {{ number_format($detail->price * $detail->quantity) }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>💰 Price:</strong> Rp. {{ number_format($order->total_price) }}</p>
    <p><strong>🧾 Tax:</strong> Rp. {{ number_format($order->tax) }}</p>
    <h3><strong>💳 Total Price:</strong> Rp. {{ number_format($order->total_price + $order->tax) }}</h3>
</body>

</html>