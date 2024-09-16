<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Example</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-10 rounded-xl shadow-xl max-w-lg w-full text-center space-y-10">
        <!-- Header Section -->
        <div class="space-y-2">
            <h1 class="text-4xl font-bold text-indigo-600">Peringkat: 
                <span class="text-gray-900">{{$assignment->peringkat}}</span>
            </h1>
            <h1 class="text-2xl font-semibold text-gray-600">Blok: 
                <span class="text-gray-900">{{$assignment->blok}}</span>
            </h1>
            <h1 class="text-xl font-medium text-gray-500">No Lot: 
                <span class="text-gray-800">{{$assignment->n_lot}}</span>
            </h1>
        </div>

        <!-- Question Section -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">Selesai Loading Buah di platform ini?</h2>
        </div>

        <!-- Buttons Section -->
        <div class="flex justify-center space-x-6">
            <!-- Form for Yes -->
            <form action="{{ route('driver-answer', ['selection' => 'yes', 'assignment_id' => $assignment->id]) }}" method="POST">
                @csrf
                <button type="submit" class="px-8 py-3 bg-green-500 text-white rounded-lg font-semibold hover:bg-green-600 hover:shadow-md transition-all duration-300 ease-in-out">
                    Ya
                </button>
            </form>

            <!-- Form for No -->
            <form action="{{ route('driver-answer', ['selection' => 'no', 'assignment_id' => $assignment->id]) }}" method="POST">
                @csrf
                <button type="submit" class="px-8 py-3 bg-red-500 text-white rounded-lg font-semibold hover:bg-red-600 hover:shadow-md transition-all duration-300 ease-in-out">
                    Tidak
                </button>
            </form>
        </div>
    </div>

</body>

</html>
