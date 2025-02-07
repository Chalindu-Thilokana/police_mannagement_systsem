
@extends('system.lay.dashbord_view')
@section('content')
@include('sweetalert::alert')
 
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<section>
    <div class="flex justify-center items-center min-h-screen p-5">
      <div class="w-full max-w-7xl border border-gray-400 rounded-lg overflow-x-auto">
        <!-- Header -->
        <div class="p-10 min-w-[1000px]">
          <div class="flex justify-between items-center">
            <div>
              <p class="text-lg font-bold mb-5">Crime categories</p>
              <p class="text-gray-500">
                A list of all the crime categories. You can manage detais of crime category
              </p>
            </div>
            <button id="openModalBtn" class="bg-blue-900 text-white px-8 py-3 rounded-md">
                Add Crime Category
            </button>
          </div>
        </div>

        <div id="modalOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
            <!-- Modal Box -->
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <div class="flex justify-between items-center border-b pb-2">
                    <h2 class="text-xl font-bold">Add Crime Category</h2>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-red-500 text-xl">&times;</button>
                </div>
                <form action="{{ route('category.store') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="categoryName" class="block font-semibold">Category Name</label>
                        <input type="text" name="name" id="categoryName" class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" id="closeModalBtn2" class="bg-gray-500 text-white px-4 py-2 rounded-md">Cancel</button>
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-md">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table -->
        <table class="w-full text-left min-w-[1000px]">
          <thead>
            <tr>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                No.
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                Crim Category
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                Created At
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[30%]">
                Action
              </th>
              
            </tr>
          </thead>
          <tbody>
            @foreach( $categories as $category )    
            <tr>
              <td class="px-8 py-5 border-b border-gray-400 w-[25%]">
                {{ $category->id }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $category->name }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $category->created_at }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[15%]">
                <!-- Edit Button -->
                <button class="bg-green-800 text-white px-3 py-1 rounded-md hover:bg-green-700 inline-flex items-center space-x-1">
                     <span>Edit</span>
                </button>
                <button onclick="confirmDelete()" class="bg-red-800 text-white px-3 py-1 rounded-md hover:bg-red-700 inline-flex items-center space-x-1 ml-2">
                     <span>Delete</span>
                </button>
              </td>
              
            </tr>
            @endforeach
            
          </tbody>
        </table>
        <!-- Pagination -->
        <div class="flex items-center p-5 justify-center min-w-[1000px]">
          <div class="flex border border-gray-400 rounded-md">
            <button class="text-black font-bold  px-4 py-2  ">
              Previous
            </button>
            <div class="flex space-x-2">
              <button class="px-4 py-2 bg-gray-400 text-white">1</button>
              <button class="px-4 py-2">2</button>
              <button class="px-4 py-2">3</button>
              <button class="px-4 py-2">4</button>
              <button class="px-4 py-2">5</button>
            </div>
            <button class=" text-black font-bold px-4 py-2">Next</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<script>
        document.addEventListener("DOMContentLoaded", function () {
            const openModalBtn = document.getElementById("openModalBtn");
            const closeModalBtn = document.getElementById("closeModalBtn");
            const closeModalBtn2 = document.getElementById("closeModalBtn2");
            const modalOverlay = document.getElementById("modalOverlay");

            openModalBtn.addEventListener("click", function () {
                modalOverlay.classList.remove("hidden");
            });

            closeModalBtn.addEventListener("click", function () {
                modalOverlay.classList.add("hidden");
            });

            closeModalBtn2.addEventListener("click", function () {
                modalOverlay.classList.add("hidden");
            });

            // Close modal when clicking outside the modal box
            modalOverlay.addEventListener("click", function (event) {
                if (event.target === modalOverlay) {
                    modalOverlay.classList.add("hidden");
                }
            });
        });
    </script>

 
@endsection
 
