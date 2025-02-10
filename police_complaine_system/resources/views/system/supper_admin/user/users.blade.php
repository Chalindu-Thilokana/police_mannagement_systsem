
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
              <p class="text-lg font-bold mb-5">Users</p>
              <p class="text-gray-500">
                A list of all Branch admins. You can manage detais of branch admins
              </p>
            </div>
            <a href="{{ route('users.create') }}" class="bg-blue-900 text-white px-8 py-3 rounded-md">
                Add User
            </a>
          </div>
        </div>
        
        @php
            $loggedUser = Auth::user();
        @endphp
        <!-- Table -->
        <table class="w-full text-left min-w-[1000px]">
          <thead>
            <tr>
              <th class="px-8 py-3 border-b border-gray-400 w-[10%]">
                No.
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                User Name
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                User E-mail
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[15%]">
                Created At
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                Action
              </th>
              
            </tr>
          </thead>
          <tbody>
            @foreach( $users as $user )
            @if (($loggedUser->userType == 'SuperAdmin' && $user->userType == 'branchAdmin') || 
                 ($loggedUser->userType == 'branchAdmin' && $user->userType == 'SubAdmin'))
            <tr>
              <td class="px-8 py-5 border-b border-gray-400 w-[10%]">
                {{ $user->id }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $user->name }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $user->email }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[15%]">
                {{ $user->created_at }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                <a href="{{ route('users.edit', $user->id) }}" 
                  class="bg-green-800 text-white px-3 py-1 rounded-md hover:bg-green-700 inline-flex items-center space-x-1">
                   <span>Edit</span>
               </a>
           
               <!-- Delete Button -->
               <button onclick="confirmDelete({{ $user->id }})" 
                   class="bg-red-800 text-white px-3 py-1 rounded-md hover:bg-red-700 inline-flex items-center space-x-1">
                   <span>Delete</span>
               </button>
           
               <!-- Delete Form (Hidden) -->
               <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                   @csrf
                   @method('DELETE')
               </form>
              </td>   
            </tr>
            @endif
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


    <!-- SweetAlert for Success Message -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--delete js-->
    <script>
      function confirmDelete(userId) {
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
                  document.getElementById('delete-form-' + userId).submit();
              }
          });
      }
  </script>
  
    
    <!-- SweetAlert for Confirmation Popup -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    

 
@endsection
 
