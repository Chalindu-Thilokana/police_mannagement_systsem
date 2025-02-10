
@extends('system.lay.dashbord_view')
@section('content')
 

<section>
    <div class="min-h-screen flex items-center justify-center">
      <div class="bg-white px-14 py-8 rounded-lg border lg:w-[768px] border-gray-400 max-w-lg lg:max-w-[768px]">
        <h4 class="text-xl md:text-3xl font-bold mb-5 text-center">
          User Details
        </h4>
        
        <form action="{{ route('users.store') }}" method="POST" class="py-14">
            @csrf
        
            <div class="mt-8">
                <label class="block font-semibold text-black">User Name</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                    class="mt-2 block w-full h-12 rounded-md border border-gray-400 shadow-sm sm:text-sm md:text-base pl-3">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        
            <div class="mt-8">
                <label class="block font-semibold text-black">User E-mail</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                    class="mt-2 block w-full h-12 rounded-md border border-gray-400 shadow-sm sm:text-sm md:text-base pl-3">
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                <div>
                    <label class="block font-semibold text-black">Password</label>
                    <input type="password" name="password" 
                        class="mt-2 block w-full h-12 rounded-md border border-gray-400 shadow-sm sm:text-sm md:text-base pl-3">
                    @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block font-semibold text-black">Confirm Password</label>
                    <input type="password" name="password_confirmation" 
                        class="mt-2 block w-full h-12 rounded-md border border-gray-400 shadow-sm sm:text-sm md:text-base pl-3">
                </div>
            </div>

            <div class="mt-8">
                <label class="block font-semibold text-black">User Role</label>
                <select name="role" 
                    class="mt-2 block w-full h-12 rounded-md border border-gray-400 shadow-sm sm:text-sm md:text-base pl-3">
                    <option value="branchAdmin" {{ old('role') == 'branchAdmin' ? 'selected' : '' }}>Branch Admin</option>
                    <option value="SubAdmin" {{ old('role') == 'SubAdmin' ? 'selected' : '' }}>Sub Admin</option>
                </select>
                @error('role') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
             <br>
            <div class="flex justify-end">
            <a href="{{ route('users.index') }}" class="mr-3 px-5 py-2 border border-gray-400 rounded-md shadow-sm font-semibold text-black bg-white hover:bg-gray-500">
                    Cancel
            </a>
            <button type="submit" class="px-5 py-2 border border-transparent rounded-md shadow-sm font-semibold text-white bg-blue-900 hover:bg-blue-800">
                Add User
            </button>
            </div>
        </form>
        
        <div class="flex justify-end">
          
        </div>
      </div>
    </div>
  </section>
  


 
@endsection
 
