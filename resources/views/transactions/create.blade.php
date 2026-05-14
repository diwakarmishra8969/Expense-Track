<!-- resources/views/transactions/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Transaction</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">

        <h1 class="text-2xl font-bold mb-6 text-center">
            Add Income / Expense
        </h1>

        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    placeholder="Enter title"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <!-- Amount -->
            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Amount
                </label>

                <input
                    type="number"
                    name="amount"
                    placeholder="Enter amount"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Type
                </label>

                <select
                    name="type"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Select Type</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>

            <!-- Category -->
            <div class="mb-6">
                <label class="block mb-2 font-semibold">
                    Category
                </label>

                <input
                    type="text"
                    name="category"
                    placeholder="Food, Salary, Travel..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold"
            >
                Save Transaction
            </button>

        </form>

    </div>

</body>
</html>