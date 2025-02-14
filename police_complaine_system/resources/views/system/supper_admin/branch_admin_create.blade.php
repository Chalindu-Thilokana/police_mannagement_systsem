@extends('system.lay.dashbord_view')
@section('content')

<section>
    <div class="flex justify-center items-center min-h-screen p-5">
        <div class="bg-white px-14 py-8 rounded-lg border lg:w-[768px] border-gray-400 max-w-lg lg:max-w-[768px]">
            <h4 class="text-xl md:text-3xl font-bold mb-5 text-center">
                User Details
            </h4>
        
            <form action="{{ route('branchadmin.store') }}" method="POST" class="py-14" id="userForm">
                @csrf
        
                <div class="mt-8">
                    <label class="block font-semibold text-black">User Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                        class="mt-2 block w-full h-12 rounded-md border border-gray-400 shadow-sm sm:text-sm md:text-base pl-3 @error('name') border-red-500 @enderror" required>
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
        
                <div class="mt-8">
                    <label class="block font-semibold text-black">User E-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" 
                        class="mt-2 block w-full h-12 rounded-md border border-gray-400 shadow-sm sm:text-sm md:text-base pl-3 @error('email') border-red-500 @enderror" required pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
        
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                    <div>
                        <label class="block font-semibold text-black">Password</label>
                        <input type="password" name="password" 
                            class="mt-2 block w-full h-12 rounded-md border border-gray-400 shadow-sm sm:text-sm md:text-base pl-3 @error('password') border-red-500 @enderror" required min="8" maxlength="20">
                        @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block font-semibold text-black">Confirm Password</label>
                        <input type="password" name="password_confirmation" 
                            class="mt-2 block w-full h-12 rounded-md border border-gray-400 shadow-sm sm:text-sm md:text-base pl-3" required min="8" maxlength="20">
                    </div>
                </div>
               
                <div class="mt-8">
                    <label class="block font-semibold text-black">User brach </label>
                    <select name="branch" 
                        class="mt-2 block w-full h-12 rounded-md border text-black border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-400 shadow-sm sm:text-sm md:text-base pl-3 @error('branch') border-red-500 @enderror" required>
                        <option value="" disabled selected>Select a user brach</option>
                        @foreach ($branches as $branch)
                      
                            <option value="{{$branch->id}}" >{{$branch->branch_name}}
                               
                            </option>
                        @endforeach
                    </select>
                    @error('branch') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <input type="hidden" id="hiddenRole" name="role" value="branchAdmin" required>
                <br>
                <div class="flex justify-end">
                    <a href="{{ route('branchadmin') }}" class="mr-3 px-5 py-2 border border-gray-400 rounded-md shadow-sm font-semibold text-black bg-white hover:bg-gray-500">
                        Cancel
                    </a>
                    <button type="submit" class="px-5 py-2 border border-transparent rounded-md shadow-sm font-semibold text-white bg-blue-900 hover:bg-blue-800">
                        Add User
                    </button>
                </div>
            </form>
        
        </div>
    </div>
</section>

@endsection

 
