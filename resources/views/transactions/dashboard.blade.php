<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-6xl mx-auto">

        <h1 class="text-3xl font-bold mb-8">
            Expense Tracker Dashboard
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Income -->
            <div class="bg-green-500 text-white p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-semibold mb-2">
                    Total Income
                </h2>

                <p class="text-3xl font-bold">
                    ₹{{ $income }}
                </p>
            </div>

            <!-- Expense -->
            <div class="bg-red-500 text-white p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-semibold mb-2">
                    Total Expense
                </h2>

                <p class="text-3xl font-bold">
                    ₹{{ $expense }}
                </p>
            </div>

            <!-- Balance -->
            <div class="bg-blue-500 text-white p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-semibold mb-2">
                    Remaining Balance
                </h2>

                <p class="text-3xl font-bold">
                    ₹{{ $balance }}
                </p>
            </div>

        </div>

    </div>

</body>
</html>