<!-- resources/views/transactions/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transactions</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Expense Tracker
        </h1>

        <a href="{{ route('transactions.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
            Add Transaction
        </a>

    </div>

    <!-- FILTER FORM (Search + Type + Date) -->
    <form action="{{ route('transactions.index') }}" method="GET" class="mb-6 flex gap-3">

        <!-- Search -->
        <input
            type="text"
            name="search"
            placeholder="Search transaction..."
            value="{{ request('search') }}"
            class="border border-gray-300 px-4 py-2 rounded-lg w-64"
        >

        <!-- Type Filter -->
        <select name="type" class="border border-gray-300 px-4 py-2 rounded-lg">

            <option value="">All</option>

            <option value="income" {{ request('type') == 'income' ? 'selected' : '' }}>
                Income
            </option>

            <option value="expense" {{ request('type') == 'expense' ? 'selected' : '' }}>
                Expense
            </option>

        </select>

        <!-- Date Filter -->
        <input
            type="date"
            name="date"
            value="{{ request('date') }}"
            class="border border-gray-300 px-4 py-2 rounded-lg"
        >

        <!-- Button -->
        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            Apply
        </button>

    </form>

    <!-- TABLE -->
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-200">

            <tr>
                <th class="p-4 text-left">ID</th>
                <th class="p-4 text-left">Title</th>
                <th class="p-4 text-left">Amount</th>
                <th class="p-4 text-left">Type</th>
                <th class="p-4 text-left">Category</th>
                <th class="p-4 text-left">Date</th>
                <th class="p-4 text-left">Action</th>
            </tr>

            </thead>

            <tbody>

            @foreach ($transactions as $item)

                <tr class="border-b">

                    <td class="p-4">{{ $item->id }}</td>

                    <td class="p-4">{{ $item->title }}</td>

                    <td class="p-4">₹{{ $item->amount }}</td>

                    <td class="p-4">

                        @if($item->type == 'income')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                Income
                            </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                Expense
                            </span>
                        @endif

                    </td>

                    <td class="p-4">{{ $item->category }}</td>

                    <td class="p-4">{{ $item->date }}</td>

                    <td class="p-4 flex gap-2">

                        <!-- Edit -->
                        <a href="{{ route('transactions.edit', $item->id) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                            Edit
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('transactions.destroy', $item->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Are you sure?')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        <!-- Pagination -->
<div class="mt-4">
    {{ $transactions->links() }}
</div>

    </div>

</div>

</body>
</html>