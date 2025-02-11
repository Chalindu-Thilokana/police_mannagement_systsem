@extends('system.lay.dashbord_view')
@section('content')
 
<section >
    <div class="flex justify-center items-center min-h-screen p-5">
      <div class="w-full max-w-7xl border border-gray-400 rounded-lg overflow-x-auto  bg-white bg-opacity-100">
        <!-- Header -->
        <div class="p-10 min-w-[1000px]">
          <div class="flex justify-between items-center">
            <div>
              <p class="text-lg font-bold mb-5">Messages</p>
              <p class="text-gray-500">
                messages sent by guests
              </p>
            </div>
          </div>

            <div class="flex justify-center items-center  p-5">
                <table class="w-full text-left min-w-[1000px] " id="messageTable">

                    <thead>
                      <tr>
                        <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                          No.
                        </th>
                        <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                          Name
                        </th>
                        <th class="px-8 py-3 border-b border-gray-400 w-[25%]">
                          Recieved At
                        </th>
                        <th class="px-8 py-3 border-b border-gray-400 w-[30%]">
                          Action
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach( $messages as $message )    
                      <tr>
                        <td class="px-8 py-5 border-b border-gray-400 w-[25%]">
                          {{ $message->id }}
                        </td>
                        <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                          {{ $message->name }}
                        </td>
                        <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                          {{ $message->created_at }}
                        </td>
                        <td class="px-8 py-5 text-gray-500 border-b border-gray-400 w-[25%]">
                          <!-- View Message Button -->
                          <button onclick="showMessage('{{ $message->message }}')" 
                            class="px-3 py-1 bg-blue-900 text-white rounded-md hover:bg-blue-800">
                            Message
                        </button>

                        <!-- Delete Button -->
                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="px-3 py-1 bg-red-800 text-white rounded-md hover:bg-red-500">
                                Delete
                            </button>
                        </form>
                        </td>   
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
          
            </div>

          </div>
        </div>
      </div>
    </div>

    <div id="messageModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-lg font-semibold">Message</h3>
            <p id="modalMessage" class="mt-4 text-gray-700"></p>
            <button onclick="closeModal()" 
                class="mt-4 px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-500">
                Close
            </button>
        </div>
    </div>


<script>
    function showMessage(message) {
        document.getElementById('modalMessage').innerText = message;
        document.getElementById('messageModal').classList.remove('hidden');
    }
    function closeModal() {
        document.getElementById('messageModal').classList.add('hidden');
    }
</script>

</section>
@endsection