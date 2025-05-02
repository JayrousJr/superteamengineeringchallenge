<!DOCTYPE html>
<html>

<head>
    <title>Sale #{{ $sale->id }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
        }

        .title {
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid #444;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h2 class="title">Sale Receipt #{{ $sale->id }}</h2>

    <table>
        <tr>
            <th>Date</th>
            <td>{{ $sale->created_at->format('Y-m-d H:i') }}</td>
        </tr>
        <tr>
            <th>Product</th>
            <td>{{ $sale->product->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>{{ $sale->quantity }}</td>
        </tr>
        <tr>
            <th>Total Amount</th>
            <td>{{ number_format($sale->amount, 2) }}</td>
        </tr>
    </table>

    <p style="margin-top: 20px;">Thank you for your purchase!</p>
</body>

</html>