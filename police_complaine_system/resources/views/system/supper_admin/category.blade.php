
@extends('system.lay.dashbord_view')
@section('content')
@include('sweetalert::alert')
 
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<section >
    <div class="flex justify-center items-center min-h-screen p-5">
      <div class="w-full max-w-7xl border border-gray-400 rounded-lg overflow-x-auto  bg-white bg-opacity-100">
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

        

        <!-- Table -->

        <div class="flex justify-center items-center  p-5">
        <table class="w-full text-left min-w-[1000px] " id="categoryTable">

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
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                <!-- Edit Button -->
                <button onclick="openEditModal('{{ $category->id }}', '{{ $category->name }}')"
                    class="bg-green-800 text-white px-3 py-1 rounded-md hover:bg-green-700 inline-flex items-center space-x-1">
                    <span>Edit</span>
                </button>
                <button onclick="confirmDelete({{ $category->id }})"
                    class="bg-red-800 text-white px-3 py-1 rounded-md hover:bg-red-700 inline-flex items-center space-x-1 ml-2">
                    <span>Delete</span>
                </button>
              </td>   
            </tr>
            @endforeach
          </tbody>
        </table>
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
    
        <!-- Popup Background -->
        <div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <!-- Modal Content -->
            <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                <h2 class="text-xl font-bold mb-4">Edit Category</h2>
                
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="editCategoryId" name="id">

                    <label class="block mb-2 text-gray-700">Category Name</label>
                    <input type="text" id="editCategoryName" name="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <div class="mt-4 flex justify-end space-x-2">
                        <button type="button" onclick="closeEditModal()" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</button>
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-blue-700">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pagination -->
      </div>
    </div>  

  </section>

  @if(session('success'))
      <script>
          Swal.fire("Success!", "{{ session('success') }}", "success");
      </script>
  @endif

  @if(session('error'))
      <script>
          Swal.fire("Error!", "{{ session('error') }}", "error");
      </script>
  @endif

  
  <!--insert model js-->
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

    <!--edit model js-->
    <script>
        function openEditModal(id, name) {
            document.getElementById("editCategoryId").value = id;
            document.getElementById("editCategoryName").value = name;
            document.getElementById("editModal").classList.remove("hidden");
        }

        function closeEditModal() {
            document.getElementById("editModal").classList.add("hidden");
        }

        document.getElementById("editForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let formData = new FormData(this);

            fetch("{{ route('categories.update') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire("Updated!", data.success, "success");
                closeEditModal();
                location.reload(); // Refresh the page to reflect changes
            })
            .catch(error => console.error("Error:", error));
        });
    </script>

    <!-- SweetAlert for Success Message -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--delete js-->
    <script>
      function confirmDelete(id) {
          Swal.fire({
              title: "Are you sure?",
              text: "This action cannot be undone!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#d33",
              cancelButtonColor: "#3085d6",
              confirmButtonText: "Yes, delete it!"
          }).then((result) => {
              if (result.isConfirmed) {
                  deleteCategory(id);
              }
          });
      }
  
      function deleteCategory(id) {
          fetch(`/categories/${id}`, {
              method: "DELETE",
              headers: {
                  "X-CSRF-TOKEN": "{{ csrf_token() }}"
              }
          })
          .then(response => response.json())
          .then(data => {
              Swal.fire({
                  title: "Deleted!",
                  text: data.success,
                  icon: "success",
                  timer: 2000,  // Auto-close after 2 seconds
                  showConfirmButton: false
              }).then(() => {
                  location.reload(); // Refresh page after confirmation
              });
          })
          .catch(error => console.error("Error:", error));
      }
  </script>
  
    
    <!-- SweetAlert for Confirmation Popup -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>  
      $( document ).ready(function() {
         new DataTable('#categoryTable');
      });</script>

    <script>  
      $( document ).ready(function() {
         new DataTable('#categoryTable');
      });</script>

@endsection
 
