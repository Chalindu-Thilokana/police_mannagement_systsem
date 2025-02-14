{{--@extends('system.lay.dashbord_view')
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

@endsection --}}

@extends('system.lay.dashbord_view')
@section('content')
 
<div class="max-w-4xl mx-auto bg-white p-6 mt-10 shadow-md rounded-lg">
    <h2 class="text-xl font-bold text-center text-blue-900 mb-4">File a Complaint (පැමිණිලි කරන්න)</h2>
    <hr>
    <!--complaining form-->
    <form action="{{ route('complain.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-900">NIC Number (ජාතික හැඳුනුම්පත් අංකය)</label>
                <input type="text" name="nic" class="w-full p-2 border rounded" required placeholder="e.g., 65xxxxxxxV or 200xxxxxxxxx">
            </div>
            <div>
                <label class="block text-gray-900">Nearest Police Station (ළඟම ඇති පොලිස් ස්ථානය)</label>
                <select class="w-full p-2 border rounded" name="branch_id" required>
                    <option value="" disabled selected>Select Nearest Police Station</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->branch_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <label class="block text-gray-900">Complaint Category (පැමිණිලි වර්ගය)</label>
            <select class="w-full p-2 border rounded" name="category_id" required>
                <option selected disabled>Select Complaint Category</option>
                @foreach($crimes as $crime)
                    <option value="{{ $crime->id }}">{{ $crime->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-gray-900">Address (ලිපිනය)</label>
            <textarea class="w-full p-2 border rounded" rows="2" required placeholder="No, Street, City" name="address"></textarea>
        </div>
        <div>
            <label class="block text-gray-900">Contact Number (ඇමතුම් අංකය)</label>
            <input type="tel" class="w-full p-2 border rounded" required placeholder="e.g., +94 712345678" name="phone">
        </div>
        <div>
            <label class="block text-gray-900">Complaint Subject (පැමිණිලි මාතෘකාව)</label>
            <input type="text" class="w-full p-2 border rounded" required placeholder="Enter the subject of your complaint (e.g., Robbery)" name="topic">
        </div>
        <div>
            <label class="block text-gray-900">Complaint (පැමිණිල්ල)</label>
            <textarea class="w-full p-2 border rounded" rows="4" required placeholder="Explain your complaint (Max 50 words)" name="details"></textarea>
        </div>
    
        <div>
            <label class="block text-gray-900">Attach any documents or images related to the complaint.</label>
            <label class="block text-gray-900">(පැමිණිල්ලට අදාළ ලියවිල්ලක් හෝ රූපයක් ඇත්නම් අමුණන්න.)</label><br>
    
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white dark:hover:bg-gray-500 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, pdf, jpg (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden custom-class" onchange="previewFile()" name="file" />
                </label>
            </div>
            
            <!-- Preview Area -->
            <div id="file-preview" class="mt-4">
                <!-- The selected file preview will appear here -->
            </div>
    
            @error('file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
        <div class="text-end">
            <button type="submit" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit Complain</button>
        </div>
    </form>
    
    
    
    <hr>
</div>
<br><br>



<script>
    function previewFile() {
        const fileInput = document.getElementById('dropzone-file');
        const previewArea = document.getElementById('file-preview');
        
        // Clear previous preview
        previewArea.innerHTML = '';

        const file = fileInput.files[0];
        if (file) {
            const fileReader = new FileReader();
            
            // Handle image files for preview
            if (file.type.startsWith('image/')) {
                fileReader.onload = function (e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.classList.add('w-full', 'h-auto', 'rounded-lg');
                    previewArea.appendChild(imgElement);
                };
                fileReader.readAsDataURL(file);
            } else {
                previewArea.innerHTML = `<p class="text-sm text-gray-500 dark:text-gray-400">Selected file: ${file.name}</p>`;
            }
        }
    }
</script>

@endsection