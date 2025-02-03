@include('site.component.navbar')

<div class="pt-20">

    <!-- Hero Section -->
   

    <!-- About Us Section -->
    <section id="about" class="py-16">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">About Us</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div>
            <img src="{{ asset('assets/logo.png') }}" alt="Sri Lanka Police" class="rounded-lg shadow-lg">
          </div>
          <div>
            <p class="text-gray-700 mb-4">
              The Sri Lanka Police is dedicated to serving and protecting the people of Sri Lanka with integrity, professionalism, and dedication. Established in [year], we have a long history of maintaining public safety and order.
            </p>
            <p class="text-gray-700">
              Our mission is to ensure a safe and secure environment for all citizens through community engagement, crime prevention, and effective law enforcement.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="bg-gray-200 py-16">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Contact Us</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div>
            <h3 class="text-xl font-semibold mb-4">Headquarters</h3>
            <p class="text-gray-700 mb-4">Sri Lanka Police Headquarters, Colombo.</p>
            <p class="text-gray-700 mb-4">Phone: <a href="tel:119" class="text-blue-600">119</a></p>
            <p class="text-gray-700 mb-4">Email: <a href="mailto:info@police.lk" class="text-blue-600">info@police.lk</a></p>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-4">Send Us a Message</h3>
            <form class="space-y-4">
              <input type="text" placeholder="Your Name" class="w-full p-2 rounded border border-gray-300">
              <input type="email" placeholder="Your Email" class="w-full p-2 rounded border border-gray-300">
              <textarea placeholder="Your Message" class="w-full p-2 rounded border border-gray-300" rows="4"></textarea>
              <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-700">Send</button>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>


@include('site.component.footer')