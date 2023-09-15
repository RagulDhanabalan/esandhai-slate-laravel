<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #dfeae1;
            /* margin: 80px 80px; */
            {{-- width: 100%; --}} {{-- display: flex; --}} {{-- align-items: center; --}} {{-- justify-content: center; --}} {{-- height: 100vh; --}} overflow-x: hidden;
        }

        #invoice-container {
            width: 100%;
            {{-- margin: 40px 40px 40px 40px; --}} background-color: white;

            border: 1px solid #d3d3d3;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #invoice-header {
            text-align: center;
        }

        #invoice-header h1 {
            color: #00a63f;
        }

        #invoice-table {
            width: 100%;
            padding: 25px;
            border-collapse: collapse;
            margin-top: 20px;
        }

        #invoice-table th,
        #invoice-table td {
            border: 1px solid #d3d3d3;
            padding: 8px;
            text-align: left;
        }

        #invoice-table th {
            background-color: #3cb371;
            color: white;
        }

        #invoice-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #invoice-footer {
            margin-top: 20px;
            text-align: right;
        }

        #invoice-footer small {
            color: #888;
        }
    </style>
</head>

<body>
    <div id="invoice-container">
        <div id="invoice-header">
            <h3>Invoice</h3>
            <hr>
        </div>
        <table id="invoice-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Orders</th>
                    <th>Amount</th>
                    <th>Onboarded</th>
                    <th>First Ordered</th>
                    <th>Last Ordered</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->customername }}</td>
                        <td>{{ $customer->orders }}</td>
                        <td>{{ $customer->amount }}</td>
                        <td>{{ $customer->onboarded }}</td>
                        <td>{{ $customer->firstordered }}</td>
                        <td>{{ $customer->lastordered }}</td>
                        <td>{{ $customer->score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="invoice-footer">
            <small>&copy; e-sandhai</small>
        </div>
    </div>
</body>

</html>
