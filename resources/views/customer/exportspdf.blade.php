<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Customer - PDF</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">
    <div class="px-3 mt-4">
        <p class="text-green-600 font-semibold text-[20px]">Customer Data
        </p>
        <table class="border text-sm px-2 py-2 bg-green-50 text-gray-600">
            <thead class="bg-gray-100">
                <tr>
                    <th class="w-[120px] border">ID</th>
                    <th class="w-[220px] border">Customer Name</th>
                    <th class="w-[120px] border">Orders</th>
                    <th class="w-[120px] border">Amount</th>
                    <th class="w-[120px] border">Onboarded</th>
                    <th class="w-[120px] border">First Ordered</th>
                    <th class="w-[120px] border">Last Ordered</th>
                    <th class="w-[120px] border">Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td class="w-[120px] border">{{ $customer->id }}</td>
                        <td class="w-[220px] border">{{ $customer->customername }}</td>
                        <td class="w-[120px] border">{{ $customer->orders }}</td>
                        <td class="w-[120px] border">{{ $customer->amount }}</td>
                        <td class="w-[120px] border">{{ $customer->onboarded }}</td>
                        <td class="w-[120px] border">{{ $customer->firstordered }}</td>
                        <td class="w-[120px] border">{{ $customer->lastordered }}</td>
                        <td class="w-[120px] border">{{ $customer->score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer w-full text-center h-auto bg-gray-100  fixed right-3 left-3 top-[520px]">
        <small class="text-green-500">@ e-sandhai .</small>
    </div>
</body>

</html>
