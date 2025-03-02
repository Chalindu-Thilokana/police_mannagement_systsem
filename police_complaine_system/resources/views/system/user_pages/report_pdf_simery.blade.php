<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">

    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-10 border border-gray-300">
        <!-- Header -->
        <div class="text-center border-b-2 border-gray-400 pb-4 mb-6">
            <h1 class="text-2xl font-bold text-gray-800 uppercase mt-2">{{ $title }}</h1>
            <p class="text-2xl font-bold text-gray-800 uppercase mt-2"> <span> document downlord by: </span>{{ auth()->user()->name }}</p>
           
        </div>

        <!-- Details Section -->
        <div class="space-y-3 text-gray-700">
            @foreach ($categories as $category)
          
            <h2><span class="font-semibold">category:</span> {{ $category->name }} : {{ $category->complain_count ?? 0 }}</h2>
            @endforeach

        </div>

        <!-- Footer -->
        <div class="mt-8 border-t-2 border-gray-400 pt-4 text-center text-gray-600 text-sm">
            <p>Sri Lanka Police | Confidential Report | Date: {{ now()->format('d M Y') }}</p>
        </div>
    </div>

</body>
</html>
