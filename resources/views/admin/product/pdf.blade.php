<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Product List</h2>
    <table>
        <thead>
            <tr>
                <th>Merchant Name</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['merchantName'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>Rp. {{ number_format($product['price'], 0, ',', '.') }}</td>
                    <td>{{ $product['stock'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
