<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- 🌍 Navigation Bar -->
    <nav class="bg-blue-900 text-white fixed w-full top-0 shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-2 text-2xl font-bold">
                        
                        <img src="{{ url('frontend/images/logowhite.png') }}" alt="Police Logo" class="h-10">
                        <span>PoliceCMS</span>
                    </a>                    
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="#about" class="hover:text-yellow-300">About</a>
                    <a href="#how-it-works" class="hover:text-yellow-300">How It Works</a>
                    <a href="#complaint-form" class="hover:text-yellow-300">Report Complaint</a>
                    <a href="#contact" class="hover:text-yellow-300">Contact</a>
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="bg-yellow-300 text-black px-4 py-2 rounded hover:bg-yellow-400 transition">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Logout</button>
                    </form>
                    @else
                    <a href="{{route('login')}}" class="bg-yellow-300 text-black px-4 py-2 rounded hover:bg-yellow-400 transition">Login/Register</a>
                    @endauth
                    @endif
                </div>
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-white focus:outline-none">
                        ☰
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-blue-800 p-4">
            <a href="#about" class="block py-2 hover:text-yellow-300">About</a>
            <a href="#how-it-works" class="block py-2 hover:text-yellow-300">How It Works</a>
            <a href="#complaint-form" class="block py-2 hover:text-yellow-300">Report Complaint</a>
            <a href="#contact" class="block py-2 hover:text-yellow-300">Contact</a>
        
            @if (Route::has('login'))
                @auth
                <div class="flex flex-col gap-2 mt-3">
                    <a href="{{ url('/dashboard') }}" class="block w-full text-center bg-yellow-300 text-black px-4 py-2 rounded hover:bg-yellow-400 transition">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="block w-full text-center bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                            Logout
                        </button>
                    </form>
                </div>
                @else
                <a href="{{route('login')}}" class="block w-full text-center bg-yellow-300 text-black px-4 py-2 rounded hover:bg-yellow-400 transition mt-3">
                    Login/Register
                </a>
                @endauth
            @endif
        </div>
        
    </nav>

    <!-- 🌟 Hero Section -->
    <header class="bg-blue-800 text-white text-center py-20 mt-16">
        <h1 class="text-4xl font-bold">Police Complaint Management System</h1>
        <p class="text-lg mt-4">Report your complaints online and get assistance quickly.</p>
        <a href="#complaint-form" class="mt-6 inline-block bg-yellow-500 px-6 py-3 rounded-lg font-semibold">Report a Complaint</a>
    </header>

    <!-- 🔍 About Us -->
    <section id="about" class="py-16 px-6 bg-white">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-blue-800">About Us</h2>
    
            <!-- Image Slider -->
    
            <!-- Content Sections -->
            <div class="mt-8 text-left space-y-8">
                <div>
                    <h3 class="text-2xl font-semibold text-blue-800">Vision</h3>
                    <p class="mt-2 text-gray-700">Towards a peaceful environment to live with confidence, without fear of crime and violence.</p>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold text-blue-800">Mission</h3>
                    <p class="mt-2 text-gray-700">Sri Lanka Police is committed and confident to uphold and enforce the law, preserve public order, prevent crime and terrorism with equity for all.</p>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold text-blue-800">History</h3>
                    <p class="mt-2 text-gray-700">The Sri Lankan Police has a rich history dating back to the colonial era, established in 1865 under British rule. Initially tasked with maintaining law and order, the force evolved through various reforms, adapting to the island's unique socio-political landscape.</p>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold text-blue-800">Evolution & Modernization</h3>
                    <p class="mt-2 text-gray-700">Post-independence, the Sri Lankan Police underwent significant transformations, incorporating modern policing techniques and community engagement strategies. Challenges such as civil unrest and terrorism prompted the force to enhance its capabilities, focusing on crime prevention, public safety, and human rights.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 📌 How It Works -->
    <section id="how-it-works" class="py-16 px-6 bg-gray-200">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-800">How It Works</h2>
            <div class="grid md:grid-cols-3 gap-6 mt-8">
                <div class="p-6 bg-white rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-gray-800">1. Submit Complaint</h3>
                    <p class="mt-2 text-gray-600">Provide the necessary details of the crime or issue.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-gray-800">2. Police Review</h3>
                    <p class="mt-2 text-gray-600">Your complaint is reviewed and assigned to the relevant department.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-gray-800">3. Get Updates</h3>
                    <p class="mt-2 text-gray-600">Track the progress of your complaint through updates.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 📝 Complaint Form -->
    <section id="complaint-form" class="py-16 px-6 bg-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-800">Report a Complaint</h2>
            <form class="mt-6 bg-gray-100 p-6 rounded-lg shadow">
                <div class="mb-4">
                    <input type="text" placeholder="Full Name" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <input type="email" placeholder="Email Address" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <textarea placeholder="Describe your complaint..." class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <button type="submit" class="bg-blue-900 text-white px-6 py-3 rounded-lg font-semibold">Submit Complaint</button>
            </form>
        </div>
    </section>

    <!-- 📞 Contact Us -->
    <section id="contact" class="py-16 px-6 bg-gray-200">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-800">Contact Us</h2>
            <p class="mt-4 text-gray-700">For urgent assistance, reach out to our police department.</p>
            <p class="mt-2 font-semibold text-gray-800">📞 Emergency Hotline: 911</p>
            <p class="mt-2 font-semibold text-gray-800">📧 Email: support@policecms.com</p>
        </div>
    </section>

    <!-- Footer -->
    @include('frontend.footerbar')

    <!-- JavaScript for Mobile Menu -->
    <script>
        const menuToggle = document.getElementById("menu-toggle");
        const mobileMenu = document.getElementById("mobile-menu");

        menuToggle.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    </script>


</body>
</html>
