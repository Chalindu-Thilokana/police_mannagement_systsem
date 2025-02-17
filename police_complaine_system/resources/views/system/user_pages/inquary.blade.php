@extends('system.lay.dashbord_view')
@section('content')
 
<section >
    <div class="flex justify-center items-center min-h-screen p-5">
      <div class="w-full max-w-7xl border border-gray-400 rounded-lg overflow-x-auto  bg-white bg-opacity-100">
        <!-- Header -->
        <div class="p-10 min-w-[1000px]">
          <div class="flex justify-between items-center">
            <div>
              <p class="text-lg font-bold mb-5">In details of complains</p>
              <p class="text-gray-500">
                A list of all the details of complains. You can view   details of complains
              </p>
            </div>
           
          </div>
        </div>

        

        <!-- Table -->

         <div class="flex  items-center  p-5"> {{-- justify-center --- me class eka ahak kala--}}

          {{--
        <table class="w-full text-left min-w-[1000px] responsive" id="pendingTable">

          <thead>
            <tr >
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                No.
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                name
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                Crim Category
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                address 
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                status  
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                topic
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                sub admin
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
             
            <tr>
              <td class="px-8 py-5 border-b border-gray-400 w-[25%]">
                
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                
              </td>
               <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                <!-- Edit Button -->
                
                <button class="bg-blue-800 text-white px-3 py-1 rounded-md hover:bg-blue-700 inline-flex items-center space-x-1">
                  <span>pdf</span>
              </button>
              @if(Auth::user()->userType == 'branchAdmin')   
                <button class="bg-red-800 text-white px-3 py-1 rounded-md hover:bg-red-700 inline-flex items-center space-x-1 ml-2">
                    <span>Delete</span>
                </button>
              @endif
              </td>   
            </tr>
            
          </tbody>
        </table>
      --}}
        
          <!-- Header -->
        
          <div class="flex justify-between items-center ">
          <!-- Details -->
          <div class="mt-4 space-y-3 text-gray-800">
              <p><span class="font-semibold">Name:</span> {{ $complain->user->name }}</p>
              <p><span class="font-semibold">Branch:</span> @if (@isset($complain->branch->branch_name)){{ $complain->branch->branch_name }}</span> 
                @else <span> not brach </span> @endif </p>
              <p><span class="font-semibold">category:</span>  @if (@isset( $complain->category->name  ))
                  
                {{ $complain->category->name }} </span> 
                @else <span> catagory is deleted  please enter new complaince </span> 
               
                     @endif</p>
              <p><span class="font-semibold">Created Date:</span> {{ $complain->created_at }}</p>
              <p><span class="font-semibold">Updated Date:</span> {{ $complain->updated_at }}</p>
              <p><span class="font-semibold">Status:</span> <span class="text-green-600 font-bold">{{ $complain->status }}</span></p>
              <p><span class="font-semibold">Address:</span> {{ $complain->address }}</p>
              <p><span class="font-semibold">Phone:</span> {{ $complain->phone }}</p>
              <p><span class="font-semibold">Email:</span> {{ $complain->user->email }}</p>
              <p><span class="font-semibold">topic:</span> {{ $complain->topic }}</p>
              <p><span class="font-semibold">Description:</span> {{ $complain->details }}</p>
              <p><span class="font-semibold">Description:</span> @isset($complain->incuvery_data){{ $complain->incuvery_data }} @endisset</p>
             
              <p><span class="font-semibold">oficer:  <span>@if (@isset($complain->admin->name ))
                  
             {{ $complain->admin->name }} </span> 
             @else <span> not asign oficer</span> 
            
                  @endif  </p>
          
              @php
    // Prepend 'storage/' to the file path stored in the database
    $filePath = 'storage/' . $complain->file;  // The file path stored in the database
    // Default fallback image path
    $defaultImage = 'storage/complain/default-image.jpg';

    // Extract the file extension to determine the type
    $fileExtension = pathinfo($complain->file, PATHINFO_EXTENSION);
@endphp

<div class="mt-4">
    <h3 class="text-lg font-semibold">Attached File:</h3>

    <!-- Check file extension to decide how to display the file -->
    @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
        <!-- Display Image -->
        <img src="{{ asset($filePath) }}" alt="Complain Attachment" class="mt-2 w-64 h-auto rounded shadow-lg">
    @elseif($fileExtension === 'pdf')
        <!-- Display PDF -->
        <iframe src="{{ asset($filePath) }}" width="100%" height="500px"></iframe>
        <a href="{{ asset($filePath) }}" target="_blank" class="text-blue-600 hover:underline mt-2 block">Open PDF in new tab</a>
    @else
        <!-- Fallback option for other file types (e.g., downloadable link) -->
        <a href="{{ asset($filePath) }}" download class="bg-blue-800 text-white px-3 py-1 rounded-md hover:bg-blue-700 inline-flex items-center space-x-1">
            <span>Download File</span>
        </a>
    @endif
</div>




            </div>
        </div>

                  <!-- Actions -->
                
         </div>


         @if(in_array(Auth::user()->userType, ['subAdmin', 'branchAdmin', ]))
         
   
         <div class="mt-4 space-x-3 flex  justify-center items-center  p-5">


          <a href="{{ route('dashboard') }}" class="mr-3 px-3 py-1 border border-gray-400 rounded-md shadow-sm font-semibold text-black bg-white hover:bg-gray-500">
            Cancel
        </a>
          <button class="bg-green-800 text-white px-3 py-1 rounded-md hover:bg-green-700 inline-flex items-center space-x-1">
            <span>incuvery</span></button>
          
      </div>
      @endif
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
    
    <!-- SweetAlert for Confirmation Popup -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>  
      $( document ).ready(function() {
         new DataTable('#pendingTable');
      });</script>

   

@endsection
