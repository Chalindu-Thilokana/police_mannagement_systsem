@extends('system.lay.dashbord_view')
@section('content')
 
<div class="max-w-4xl mx-auto bg-white p-6 mt-10 shadow-md rounded-lg">
    <h2 class="text-xl font-bold text-center text-blue-900 mb-4">File a Complaint (පැමිණිලි කරන්න)</h2>
    <hr>
    <form action="" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-900">NIC Number (ජාතික හැඳුනුම්පත් අංකය)</label>
                <input type="text" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <label class="block text-gray-900">Nearest Police Station (ළඟම ඇති පොලිස් ස්ථානය)</label>
                <input type="text" class="w-full p-2 border rounded" required>
            </div>
        </div>
        <div>
            <label class="block text-gray-900">Complaint Category (පැමිණිලි වර්ගය)</label>
            <select class="w-full p-2 border rounded">
                <option>Select Complaint Category</option>
            </select>
        </div>
        <div>
            <label class="block text-gray-900">Address (ලිපිනය)</label>
            <textarea class="w-full p-2 border rounded" rows="2" required></textarea>
        </div>       
            <div>
                <label class="block text-gray-900">Contact Number (ඇමතුම් අංකය)</label>
                <input type="text" class="w-full p-2 border rounded" required>
            </div>
        <div>
            <label class="block text-gray-900">Complaint Subject (පැමිණිලි මාතෘකාව)</label>
            <input type="text" class="w-full p-2 border rounded" required>
        </div>
        <div>
            <label class="block text-gray-900">Complaint (පැමිණිල්ල)</label>
            <textarea class="w-full p-2 border rounded" rows="4" required></textarea>
        </div>
        <div>
            <label class="block text-gray-900">If you have any document or image related to the complaint, Please attach to this complaint. </label>
            <label class="block text-gray-900">(පැමිණිල්ලට අදාළ ලියවිල්ලක් හෝ රූපයක් ඇත්නම් කරුණාකර මෙම පැමිණිල්ලට අමුණන්න. )</label><br>
            <input type="file" id="fileInput" multiple class="hidden" accept="files/*">
            
            <div class="flex items-center space-x-2">
                <button onclick="document.getElementById('fileInput').click()" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-400">
                    Select Files
                </button>
                <span id="fileCount" class="text-gray-500">No files selected</span>
            </div>
        
            <!-- Preview Section -->
            <div id="previewContainer" class="flex flex-wrap gap-2 mt-4"></div>
        </div>
        <input type="hidden" value="{{ Auth::user()->id }}">
        <div class="text-end">
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-00">Submit Complaint</button>
        </div><br>
    </form>
    <hr>
</div>
<br><br>


<script>
    document.getElementById('fileInput').addEventListener('change', function(event) {
        let previewContainer = document.getElementById('previewContainer');
        previewContainer.innerHTML = ''; // Clear previous previews
    
        let files = event.target.files;
        document.getElementById('fileCount').textContent = files.length + " file(s) selected";
    
        Array.from(files).forEach((file, index) => {
            if (file.type.startsWith('image/')) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let previewDiv = document.createElement('div');
                    previewDiv.className = 'relative group w-12 h-12 border border-gray-300 rounded overflow-hidden';
    
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-full object-cover';
    
                    let removeBtn = document.createElement('button');
                    removeBtn.className = 'absolute top-0 right-0 bg-red-600 text-white text-xs px-1 rounded opacity-0 group-hover:opacity-100';
                    removeBtn.innerHTML = '×';
                    removeBtn.onclick = () => {
                        previewDiv.remove();
                        if (previewContainer.children.length === 0) {
                            document.getElementById('fileCount').textContent = "No files selected";
                        }
                    };
    
                    previewDiv.appendChild(img);
                    previewDiv.appendChild(removeBtn);
                    previewContainer.appendChild(previewDiv);
                };
                reader.readAsDataURL(file);
            }
        });
    });
    </script>

@endsection