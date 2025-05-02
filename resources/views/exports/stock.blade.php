<!DOCTYPE html>
<html>

<head>
    <title>Sales Report</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #444;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>TUNZAA MAUZO INVENTORY MANAGEMENT</h2>
    <h2>Inventory Stock as on date {{ now() }}</h2>
    <table>
        <thead>
            <tr>
                <th>Import Date</th>
                <th>Product name</th>
                <th>Recorded by</th>
                <th>Available Quantity</th>
                <th>Price(Tsh)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->created_at->format('Y-m-d') }}</td>
                    <td>{{ $product->name ?? 'N/A' }}</td>
                    <td>{{ $product->user->name ?? 'N/A' }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>