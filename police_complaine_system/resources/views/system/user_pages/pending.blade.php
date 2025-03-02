@extends('system.lay.dashbord_view')
@section('content')
 
<section >
  <div class="container mx-auto mt-4 p-3 border border-gray-300 rounded-lg shadow-md max-w-6xl">
    <a href="{{ route('report-generate-pdf') }}"  class="mt-4 bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">generate-pdf</a>

    <section class="py-12 bg-gray-100">

        <div class="container mx-auto text-center">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Category Card -->
                @foreach ($categories as $category)
                <div class="bg-white p-3 rounded-lg shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                    <div class="flex items-center  justify-center space-x-4">
                        <!-- Image -->

                        <!-- Text -->
                        <div>
                            <h3 class="text-sm font-bold">{{ $category->name }}</h3>
                            <p class="text-xs font-bold text-center">{{ $category->complain_count ?? 0 }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
            <div class="flex justify-center mt-4">
                <nav aria-label="Pagination" class="flex items-center">
                    {{-- Previous Page Link --}}
                    @if ($categories->onFirstPage())
                        <span class="cursor-not-allowed text-gray-400">Previous</span>
                    @else
                        <a href="{{ $categories->previousPageUrl() }}" class="text-blue-600 hover:text-blue-900">Previous</a>
                    @endif
            
                    {{-- Pagination Numbers --}}
                    <ul class="flex space-x-1 mx-4">
                        @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                            @if ($page == $categories->currentPage())
                                <li>
                                    <span class="bg-blue-900 text-white px-3 py-1 rounded-md">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" class="text-blue-900 hover:text-blue-600 px-3 py-1 rounded-md transition">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
            
                    {{-- Next Page Link --}}
                    @if ($categories->hasMorePages())
                        <a href="{{ $categories->nextPageUrl() }}" class="text-blue-900 hover:text-blue-600">Next</a>
                    @else
                        <span class="cursor-not-allowed text-gray-400">Next</span>
                    @endif
                </nav>
            </div>
        </div>

    </section>
</div>

  <div class="flex justify-center items-center  p-5">
  <div class="flex-1 p-4 bg-white">
    <form action="{{ route('fillt_mycomplaince') }}" method="GET" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="space-y-8">
            <div class='flex items-end gap-4 pb-4'>
                <div class="w-1/3">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="catergory" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $catergory)
                            <option value="{{ $catergory->id }}" >{{ $catergory->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if(in_array(Auth::user()->userType, [ 'user','SuperAdmin']))
                <div class="w-1/3">
                    <label for="subCategory" class="block text-sm font-medium text-gray-700"> branch</label>
                    <select id="subCategory" name="branch" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option value="" disabled selected>Select a branch</option>
                      @foreach ($branchs as $branch)
                          <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                      @endforeach
                  </select>
                </div>
                @endif
                <div class="w-1/3">
                  <label for="subCategory" class="block text-sm font-medium text-gray-700">status</label>
                  <select id="subCategory" name="status" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" disabled selected>status</option>
                    
                        <option value="pending">pending</option>
                        <option value="Assigned">Assigned</option>
                        <option value="proceced">proceced</option>
                        <option value="Trancefered">Trancefered</option>
                   
                </select>
              </div>
                 

  
                <div class="w-1/3">
                    <label for="location" class="block text-sm font-medium text-gray-700">NIC number</label>
                    <input type="text" name="nic" id="location" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="w-1/3">
                    <label for="topic" class="block text-sm font-medium text-gray-700">ADD TOPIC</label>
                    <input type="text" name="topic" id="topic" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <button type="submit" class="mt-4 bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Filter</button>
            </div>
        </div>
    </form>
</div>
</div>
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
        <div class="flex  items-center   p-6">
        <div class="flex  items-center   p-6">{{-- justify-center --- me class eka ahak kala--}}
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
             {{-- <th class="px-8 py-3 border-b border-gray-400 w-[10%]">
                pdf
              </th> --}}
              @if(Auth::user()->userType == 'branchAdmin')  
              
              <th class="px-8 py-3 border-b border-gray-400 w-[30%]">
                  admin Action
              </th>
              @endif
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
                @if (@isset( $complain->category->name  ))
                  
                {{ $complain->category->name }} </span> 
                @else
                <span class="text-gray-500">No Category</span>
                @endif
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $complain->address }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
               
                

                {{ $complain->status }}
                @if(Auth::user()->userType == 'branchAdmin')
                 @if ($complain->status =='Rejected') 
                  <a  href="{{route('trancefer_create',$complain->id)}}" class="bg-green-800 text-white px-3 py-1 rounded-md hover:bg-green-700 inline-flex items-center space-x-1" >
                 
                    <span>trancefer</span></a>
                    @endif
                    
                    @endif

              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $complain->topic }}
              </td>
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                {{ $complain->created_at }}
              </td>

              {{--
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                 
                    <a href="{{ route('generate-pdf', $complain->id) }}" target="_blank">
                        <button class="bg-blue-800 text-white px-3 py-1 rounded-md hover:bg-blue-700 inline-flex items-center space-x-1 ml-2">
                            <span>PDF</span>
                        </button>
                    </a>
                
            </td> --}}
              @if(Auth::user()->userType == 'branchAdmin')  
              <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                <!-- Edit Button -->
                <div class="flex justify-start space-x-2">
                <a  href="{{route('asign_create',$complain->id)}}" class="bg-green-800 text-white px-3 py-1 rounded-md hover:bg-green-700 inline-flex items-center space-x-1" >
                    <span>asign</span>
                </a>
               
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
                  </div>
              </form>
                
              </td>  
              @endif


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
    </div>  

  </section>

  <!-- Modal  sub admin asign-->
  
 


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