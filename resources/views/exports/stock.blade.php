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
    <h2>Sales Report</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                    <td>{{ $sale->product->name ?? 'N/A' }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ number_format($sale->amount, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>