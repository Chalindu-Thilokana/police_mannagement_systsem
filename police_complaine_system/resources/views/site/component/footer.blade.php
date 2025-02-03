<!-- Footer -->
<footer class="bg-blue-950 text-white py-10 mt-10">
    <div class="container mx-auto flex justify-between items-center">
      <!-- Left Logo -->
      <div class="flex-shrink-0">
        <img src="{{ asset('assets/logo_white.png') }}" alt="Sri Lanka Police Logo" class="h-32">
      </div>
      
      <!-- Footer Content -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
        <!-- About Us -->
        <div>
          <h2 class="font-bold text-xl mb-4">About Us</h2>
          <p>The Sri Lanka Police is committed to maintaining law and order, ensuring public safety, and upholding the rule of law in Sri Lanka.</p>
        </div>
  
        <!-- Quick Links -->
        <div>
          <h2 class="font-bold text-xl mb-4">Quick Links</h2>
          <ul class="space-y-2">
            <li><a href="#" class="hover:text-blue-200">Home</a></li>
            <li><a href="#" class="hover:text-blue-200">Services</a></li>
            <li><a href="#" class="hover:text-blue-200">About Us</a></li>
            <li><a href="#" class="hover:text-blue-200">Contact Us</a></li>
          </ul>
        </div>
  
        <!-- Contact Info -->
        <div>
          <h2 class="font-bold text-xl mb-4">Contact Us</h2>
          <ul class="space-y-2">
            <li>Phone: +94 11 244 4480</li>
            <li>Email: info@police.lk</li>
            <li>Address: Colombo 01, Sri Lanka</li>
          </ul>
        </div>
      </div>
  
      <!-- Right Logo -->
      <div class="flex-shrink-0">
        <img src="{{ asset('assets/logo2.png') }}" alt="Sri Lanka Police Logo" class="h-32">
      </div>
    </div>
  
    <div class="border-t border-blue-700 mt-8 pt-4">
      <p class="text-center text-sm">&copy; 2025 Sri Lanka Police. All rights reserved.</p>
    </div>
  </footer>
  
  

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

    @livewireScripts
</body>
</html>