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

       

        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Title
                </label>

                <input value="{{ old('title',$transaction->title) }}"
                    type="text"
                    name="title"
                    placeholder="Enter title"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror"
                >

@error('title')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
@enderror

            </div>

            <!-- Amount -->
            <div class="mb-4">
                <label class="block mb-2 font-semibold">
                    Amount
                </label>

                <input value="{{ old('amount',$transaction->amount) }}"
                    type="number"
                    name="amount"
                    placeholder="Enter amount"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('amount') border-red-500 @enderror"
                >

                @error('amount')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
@enderror
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
                    {{-- <option {{ ($product->status == 'Active')? 'selected' : '' }} value="active">Active</option> --}}
                   
                    <option {{ ($transaction->type == 'income')? 'selected' : '' }} value="income">Income</option>
                    <option {{ ($transaction->type == 'expense')? 'selected' : '' }} value="expense">Expense</option>
                </select>
            </div>

            <!-- Category -->
            <div class="mb-6">
                <label class="block mb-2 font-semibold">
                    Category
                </label>

                <input value="{{ old('category',$transaction->category) }}"
                    type="text"
                    name="category"
                    placeholder="Food, Salary, Travel..."
                    class="w-full border  rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('category') border-red-500 @enderror"
                >

                     @error('category')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
@enderror
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-semibold"
            >
                Update
            </button>

        </form>

    </div>

</body>
</html>