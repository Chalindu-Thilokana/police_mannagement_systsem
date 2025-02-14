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
              <p><span class="font-semibold">Branch:</span> {{ $complain->branch->branc_name }}</p>
              <p><span class="font-semibold">Created Date:</span> {{ $complain->created_at }}</p>
              <p><span class="font-semibold">Updated Date:</span> {{ $complain->updated_at }}</p>
              <p><span class="font-semibold">Status:</span> <span class="text-green-600 font-bold">{{ $complain->status }}</span></p>
              <p><span class="font-semibold">Address:</span> 123, Galle Road, Colombo</p>
              <p><span class="font-semibold">Phone:</span> {{ $complain->phone }}</p>
              <p><span class="font-semibold">Email:</span> {{ $complain->user->email }}</p>
              <p><span class="font-semibold">Description:</span> {{ $complain->details }}</p>
          
          
            </div>
      

     
      
        </div>

                  <!-- Actions -->
                
         </div>

         @if(in_array(Auth::user()->userType, ['subAdmin', 'branchAdmin', ]))
     
         <div class="mt-4 space-x-3 flex  justify-center items-center  p-5">
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
