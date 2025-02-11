@extends('system.lay.dashbord_view')
@section('content')
 
<div class="max-w-4xl mx-auto bg-white p-6 mt-10 shadow-md rounded-lg">
    <h2 class="text-xl font-bold text-center text-blue-900 mb-4">Make a Complaint</h2>
    <form action="" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700">Your District</label>
                <select class="w-full p-2 border rounded">
                    <option>Select District</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700">Nearest Police Station</label>
                <select class="w-full p-2 border rounded">
                    <option>Select Police Station</option>
                </select>
            </div>
        </div>
        <div>
            <label class="block text-gray-700">Complaint Category</label>
            <select class="w-full p-2 border rounded">
                <option>Select Complaint Category</option>
            </select>
        </div>
        <div>
            <label class="block text-gray-700">Your Name</label>
            <input type="text" class="w-full p-2 border rounded" required>
        </div>
        <div>
            <label class="block text-gray-700">Address</label>
            <textarea class="w-full p-2 border rounded" rows="2" required></textarea>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-gray-700">NIC Number</label>
                <input type="text" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">Contact Number</label>
                <input type="text" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-700">Email Address</label>
                <input type="email" class="w-full p-2 border rounded">
            </div>
        </div>
        <div>
            <label class="block text-gray-700">Complaint Subject</label>
            <input type="text" class="w-full p-2 border rounded" required>
        </div>
        <div>
            <label class="block text-gray-700">Complaint</label>
            <textarea class="w-full p-2 border rounded" rows="4" required></textarea>
        </div>
        <input type="hidden" value="{{ Auth::user()->id }}">
        <div class="text-center">
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-700">Submit Complaint</button>
        </div>
    </form>
</div>

@endsection