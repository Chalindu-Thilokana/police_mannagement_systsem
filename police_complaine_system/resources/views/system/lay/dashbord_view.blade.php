
@include('system.lay.branch_dashbord')
<div class="flex-1 ml-0 md:ml-20 lg:ml-64">
    <!-- Content here -->
    @if(Auth::user()->userType == 'SuperAdmin')

<x-app-layout>
   
    <x-slot name="header">
       
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('SuperAdmin dashboard') }}
            </h2>
           
          
          
    </x-slot>
</x-app-layout>

@endif 


@if(Auth::user()->userType == 'branchAdmin')

<x-app-layout>
   
    <x-slot name="header">
       
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('branch dashboard') }}
            </h2>
          
          
    </x-slot>
</x-app-layout>

@endif 



@if(Auth::user()->userType == 'sub Admin')

<x-app-layout>
   
    <x-slot name="header">
       
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('sub Admin dashboard') }}
            </h2>
          
          
    </x-slot>
</x-app-layout>

@endif 


@if(Auth::user()->userType == 'User')

<x-app-layout>
   
    <x-slot name="header">
       
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User dashboard') }}
            </h2>
          
    </x-slot>
</x-app-layout>

@endif
</div>
  
