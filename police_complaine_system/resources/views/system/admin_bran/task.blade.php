@extends('system.lay.dashbord_view')
@section('content')
<section>
    <div class="flex justify-center items-center min-h-screen p-5">
        <div class="bg-white px-14 py-8 rounded-lg border lg:w-[768px] border-gray-400 max-w-lg lg:max-w-[768px]">
            <h4 class="text-xl md:text-3xl font-bold mb-5 text-center">
                Assign Subadmin
            </h4>
        
            <form action="{{ route('asign', $id) }}" method="POST" class="py-14" id="assignForm">
                @csrf
                @method('PUT')
        
                <div class="mt-8">
                    <label class="block font-semibold text-black">Select Subadmin</label>
                    <select name="asign" id="subadmin" 
                        class="mt-2 block w-full h-12 rounded-md border border-gray-400 shadow-sm sm:text-sm md:text-base pl-3" required>
                        <option value="" disabled selected>Select a Subadmin</option>
                        @foreach($users as $user)
                            @isset($user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endisset
                        @endforeach
                    </select>
                </div>
        
                <br>
                <div class="flex justify-end">
                    <a href="{{ route('dashboard') }}" class="mr-3 px-5 py-2 border border-gray-400 rounded-md shadow-sm font-semibold text-black bg-white hover:bg-gray-500">
                        Cancel
                    </a>
                    <button type="submit" class="px-5 py-2 border border-transparent rounded-md shadow-sm font-semibold text-white bg-blue-900 hover:bg-blue-800">
                        Assign
                    </button>
                </div>
            </form>
        </div>
    </div>
    
</section>
@endsection