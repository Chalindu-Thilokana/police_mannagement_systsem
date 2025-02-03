<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Navbar</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>


  <style>@keyframes scrollBackground {
    0% {
      background-image: url('assets/header_1.jpg') ;
    }
    25% {
        background-image: url('assets/header_2.jpg') ;
    }
    50% {
        background-image: url('assets/header_3.jpg') ;
    }
    75% {
        background-image: url('assets/header_4.jpg') ;
    }
    100% {
        background-image: url('assets/header_5.jpg') ;
    }
  }
  
  .animate-scroll {
    animation: scrollBackground 20s infinite;
  }
  </style>
</head>
<body class="bg-gray-100">
  <!-- Navbar -->
  <header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-white-200 fixed top-0 left-0 w-full z-50">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="https://flowbite.com" class="flex items-center">
                <img src="{{ asset('assets/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="text-3xl font-bold text-blue-900 tracking-wide">
                    Sri Lanka Police
                  </span>
                  
                  
            </a>
            <div class="flex items-center lg:order-2">
                @if (Route::has('login'))
                @auth
                  <a href="{{ url('/dashboard') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600">
                    Dashboard
                  </a>
                @else
                  <a href="{{ route('login') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600">
                    Login/Register
                  </a>
                @endauth
              @endif
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                  <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-blue-900 border-b border-blue-900 hover:text-blue-600 hover:bg-blue-950 lg:hover:bg-transparent lg:border-0 lg:p-0 dark:text-blue-900 dark:hover:text-blue-600 dark:hover:bg-blue-700 lg:dark:hover:bg-transparent dark:border-blue-700">Home</a>
                </li>
                  <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-blue-900 border-b border-blue-900 hover:text-blue-600 hover:bg-blue-950 lg:hover:bg-transparent lg:border-0 lg:p-0 dark:text-blue-900 dark:hover:text-blue-600 dark:hover:bg-blue-700 lg:dark:hover:bg-transparent dark:border-blue-700">About US</a>
                  </li>
                  <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-blue-900 border-b border-blue-900 hover:text-blue-600 hover:bg-blue-950 lg:hover:bg-transparent lg:border-0 lg:p-0 dark:text-blue-900 dark:hover:text-blue-600 dark:hover:bg-blue-700 lg:dark:hover:bg-transparent dark:border-blue-700">History</a>
                  </li>
                  <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-blue-900 border-b border-blue-900 hover:text-blue-600 hover:bg-blue-950 lg:hover:bg-transparent lg:border-0 lg:p-0 dark:text-blue-900 dark:hover:text-blue-600 dark:hover:bg-blue-700 lg:dark:hover:bg-transparent dark:border-blue-700">Services</a>
                  </li>
                  <li>
                    <a href="#contact" class="block py-2 pr-4 pl-3 text-blue-900 border-b border-blue-900 hover:text-blue-600 hover:bg-blue-950 lg:hover:bg-transparent lg:border-0 lg:p-0 dark:text-blue-900 dark:hover:text-blue-600 dark:hover:bg-blue-700 lg:dark:hover:bg-transparent dark:border-blue-700">Contact Us</a>
                  </li>

                </ul>
              </div>
              
        </div>
    
              
        </div>
    </nav>
</header>

<section class="relative bg-cover bg-center animate-scroll py-40" >
    <!-- Dark overlay -->
    <div class="absolute inset-0 bg-black opacity-50"></div>
  
    <!-- Animated floating elements -->
    <div class="absolute -top-10 -left-10 w-72 h-72 bg-blue-700 opacity-70 rounded-full mix-blend-multiply filter blur-2xl animate-float"></div>
    <div class="absolute -bottom-10 -right-10 w-72 h-72 bg-red-700 opacity-70 rounded-full mix-blend-multiply filter blur-2xl animate-float animation-delay-2000"></div>
  
    <!-- Content -->
    <div class="relative z-10 flex items-center justify-center h-full">
      <div class="text-center text-white px-4">
        <h1 class="text-5xl font-extrabold mb-4">Sri Lanka Police</h1>
        <p class="text-xl mb-6">Committed to ensuring safety and security for all citizens.</p>
        <p class="text-sm mb-6">The Sri Lanka Police is dedicated to creating a safe, secure, and peaceful environment for all citizens. <br>Their mission is to formulate and implement policies and strategies that eradicate crime, terrorism, and drugs, while preserving law and order and affirming the identity of legitimate citizens. </p>
        <a href="#contact" class="inline-block bg-blue-900 text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-700 transition duration-300">Contact Us</a>
      </div>
    </div>
  </section>
  
  