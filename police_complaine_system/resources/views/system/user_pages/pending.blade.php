@extends('system.lay.dashbord_view')
@section('content')
 
<section >
    <div class="flex justify-center items-center min-h-screen p-5">
      <div class="w-full max-w-7xl border border-gray-400 rounded-lg overflow-x-auto  bg-white bg-opacity-100">
        <!-- Header -->
        <div class="p-10 min-w-[1000px]">
          <div class="flex justify-between items-center">
            <div>
              <p class="text-lg font-bold mb-5">Pending complains</p>
              <p class="text-gray-500">
                A list of all the complains. You can manage detais of crime category
              </p>
            </div>
            @if(Auth::user()->userType == 'user')  
            <a href="{{ route('complain') }}" id="openModalBtn" class="bg-blue-900 text-white px-8 py-3 rounded-md">
                Add Complain
            </a>
            @endif
          </div>
        </div>

        

        <!-- Table -->

        <div class="flex  items-center   p-5">{{-- justify-center --- me class eka ahak kala--}}
        <table class="w-full text-left min-w-[1000px] " id="inquaringTable">

          <thead>
            <tr>
              <th class="px-8 py-3 border-b border-gray-400 w-[10%]">
                No.
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                name
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[15%]">
                Crim Category
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                address 
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[15%]">
                status  
              </th>
              
              <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                topic
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[15%]">
                Created At
              </th>
              <th class="px-8 py-3 border-b border-gray-400 w-[10%]">
                pdf
              </th>
              @if(Auth::user()->userType == 'branchAdmin')  

              <th class="px-8 py-3 border-b border-gray-400 w-[30%]">
                  admin Action
              </th>
              @endif
              @if(in_array(Auth::user()->userType, ['subAdmin', 'branchAdmin', 'user']))@endif
              @if(in_array(Auth::user()->userType, ['SubAdmin', 'branchAdmin', 'user','SuperAdmin']))
              <th class="px-8 py-3 border-b border-gray-400 w-[30%]">
                 sub admin Action
             </th>
              @endif
            </tr>
          </thead>
          <tbody>

             @foreach($complains as $complain)
            <tr>
              <td class="px-8 py-5 border-b border-gray-400 w-[25%]">
                {{ $complain->id }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $complain->user->name }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $complain->category->name }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $complain->address }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $complain->status }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $complain->topic }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $complain->created_at }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                 
                    <a href="{{ asset('complain/' . $complain->file) }}" target="_blank">
                        <button class="bg-blue-800 text-white px-3 py-1 rounded-md hover:bg-blue-700 inline-flex items-center space-x-1 ml-2">
                            <span>PDF</span>
                        </button>
                    </a>
                
            </td>
              @if(Auth::user()->userType == 'branchAdmin')  
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                <!-- Edit Button -->
               
                <button class="bg-green-800 text-white px-3 py-1 rounded-md hover:bg-green-700 inline-flex items-center space-x-1">
                    <span>asign</span>
                </button>
               
                <form action="{{ route('complain.delete', $complain->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="bg-red-800 text-white px-3 py-1 rounded-md hover:bg-red-700 inline-flex items-center space-x-1 ml-2">
                      <span>Delete</span>
                  </button>
              </form>
                <form action="{{ route('complain.reject', $complain->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="bg-black text-white px-3 py-1 rounded-md hover:bg-gray-700 inline-flex items-center space-x-1 ml-2">
                      <span>Reject</span>
                  </button>
              </form>
                
              </td>  
              @endif


              @if(in_array(Auth::user()->userType, ['subAdmin', 'branchAdmin', 'user']))@endif
              @if(in_array(Auth::user()->userType, ['SuperAdmin', 'branchAdmin', 'user','SubAdmin',]))
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                <a href="{{ route('complain.show', $complain->id) }}" class="bg-yellow-800 text-white px-3 py-1 rounded-md hover:bg-yellow-700 inline-flex items-center space-x-1">
                  <span>View</span>
              </a>
              
              </td>
              @endif
           
            </tr>
            @endforeach
            
          </tbody>
        </table>
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
    
    <!-- SweetAlert for Confirmation Popup -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>  
      $( document ).ready(function() {
         new DataTable('#inquaringTable');
      });</script>

@endsection