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
            <h1 class="text-2xl font-bold text-gray-800 uppercase mt-2">Sri Lanka Police Inquiry Report</h1>
        </div>

        <!-- Details Section -->
        <div class="space-y-3 text-gray-700">
            <p><span class="font-semibold">Name:</span> {{ $complain->user->name }}</p>
            <p><span class="font-semibold">NIC number:</span> {{ $complain->nic }}</p>

            <p><span class="font-semibold">Branch:</span> {{ $complain->branch->branch_name ?? 'Not Assigned' }}</p>
            <p><span class="font-semibold">Category:</span> {{ $complain->category->name ?? 'Deleted - Please Re-enter Complaint' }}</p>
            <p><span class="font-semibold">Created Date:</span> {{ $complain->created_at->format('d M Y, h:i A') }}</p>
            <p><span class="font-semibold">Updated Date:</span> {{ $complain->updated_at->format('d M Y, h:i A') }}</p>
            <p><span class="font-semibold">Status:</span> <span class="font-bold text-green-600">{{ $complain->status }}</span></p>
            <p><span class="font-semibold">Address:</span> {{ $complain->address }}</p>
            <p><span class="font-semibold">Phone:</span> {{ $complain->phone }}</p>
            <p><span class="font-semibold">Email:</span> {{ $complain->user->email }}</p>
            <p><span class="font-semibold">Topic:</span> {{ $complain->topic }}</p>
            <p><span class="font-semibold">Description:</span> {{ $complain->details }}</p>
            <p><span class="font-semibold">Investigation Details:</span> {{ $complain->incuvery_data ?? 'N/A' }}</p>
            <p><span class="font-semibold">Assigned Officer:</span> {{ $complain->admin->name ?? 'Not Assigned' }}</p>
        </div>

        <!-- Footer -->
        <div class="mt-8 border-t-2 border-gray-400 pt-4 text-center text-gray-600 text-sm">
            <p>Sri Lanka Police | Confidential Report | Date: {{ now()->format('d M Y') }}</p>
        </div>
    </div>

</body>
</html>
