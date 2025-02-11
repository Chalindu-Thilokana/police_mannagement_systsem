@include('site.component.navbar')

<div class="pt-20">

    <!-- Hero Section -->
   

    <!-- About Us Section -->

    <section id="about"> <!-- Container -->
      <div class="mx-auto w-full max-w-7xl px-5 py-12 md:px-10 md:py-16 lg:py-20"> <!-- Component -->
        <div class="flex flex-col gap-8 lg:flex-row lg:gap-10"> <!-- Content -->
          <div class="flex flex-col gap-8 lg:w-3/5">
            <h2 class="mb-8 text-3xl font-bold md:text-5xl">About us</h2>
            <p class="text-sm font-semibold sm:text-base text-blue-900"> History </p>
            <p class="text-sm sm:text-base"> The Sri Lankan Police has a rich history dating back to 1865, evolving from a colonial force under British rule. Initially tasked with maintaining order, it has transformed into a modern law enforcement agency. The police play a crucial role in upholding law and order amidst various socio-political challenges. </p>
            
            <div class="my-8 h-px w-full bg-black"></div> <!-- Testimonials -->
            <div class="grid gap-8 md:grid-cols-2 md:gap-4">

              <div class="flex flex-col gap-4 rounded-md border border-solid bg-gray-100 p-6 md:p-4">
                <div class="flex items-center gap-x-2">
                  <p class="text-sm font-semibold sm:text-base text-blue-900"> Vision </p>
                </div>
                <p class="text-sm"> Towards a Peaceful environment to live with confidence, without fear of Crime and Violence. </p>
                <div class="flex items-center gap-2 sm:gap-x-4">
                </div>
              </div>

              <div class="flex flex-col gap-4 rounded-md border border-solid bg-gray-100 p-6 md:p-4">
                <div class="flex items-center gap-x-2">
                  <p class="text-sm font-semibold sm:text-base text-blue-900"> Mission </p>
                </div>
                <p class="text-sm"> Sri Lanka Police is committed and confident to uphold and enforce the law of the land, to preserve the public order, prevent crime and Terrorism with prejudice to none – equity to all. </p>
              </div>

            </div>
          </div> <!-- Image -->
          <div class="w-full rounded-md bg-gray-100 max-[991px]:h-[475px] lg:w-2/5"><img src="{{ asset('assets/about2.jpg') }}" alt="" width="500" height="800"></div>
        </div>
      </div>
    </section>

    <!--services section-->
    
    <section id="services" class="bg-gray-200 py-16">
      <!-- Container -->
      <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">
        <!-- Component -->
        <div class="flex flex-col items-center">
          <h2 class="text-center text-3xl font-bold md:text-5xl"> Services </h2>
          <p class="mb-8 mt-4 text-center text-sm text-gray-500 sm:text-base md:mb-12 lg:mb-16"> The services you offered </p>
          <!-- Content -->
          <div class="mb-6 grid gap-4 sm:grid-cols-2 sm:justify-items-stretch md:mb-10 md:grid-cols-3 lg:mb-12 lg:gap-6">
            <a href="#" class="flex flex-col gap-4 rounded-md border border-solid border-blue-900 px-4 py-8 md:p-0">
              <img src="{{ asset('assets/service1.png') }}" alt="" class="h-60" />
              <div class="px-6 py-4">
                <p class="mb-4 text-xl font-semibold text-blue-900"> Online Complaint Registration </p>
                <p class="mb-6 text-sm text-gray-500 sm:text-base lg:mb-8">Enables citizens to file complaints easily through a user-friendly online portal, enhancing accessibility and convenience. </p>
                <div class="flex">
                  <div class="flex flex-col">
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="flex flex-col gap-4 rounded-md border border-solid border-blue-900 px-4 py-8 md:p-0 ">
              <img src="{{ asset('assets/service2.png') }}" alt="" class="h-60" />
              <div class="px-6 py-4">
                <p class="mb-4 text-xl font-semibold text-blue-900"> Complaint Tracking </p>
                <p class="mb-6 text-sm text-gray-500 sm:text-base lg:mb-8"> Allows users to monitor the status of their complaints in real-time, ensuring transparency and accountability in the process. </p>
                <div class="flex">                  
                  <div class="flex flex-col">
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="flex flex-col gap-4 rounded-md border border-solid border-blue-900 px-4 py-8 md:p-0">
              <img src="{{ asset('assets/service3.png') }}" alt="" class="h-60" />
              <div class="px-6 py-4">
                <p class="mb-4 text-xl font-semibold text-blue-900"> Feedback Mechanism </p>
                <p class="mb-6 text-sm text-gray-500 sm:text-base lg:mb-8"> Provides a platform for citizens to share their experiences and suggestions, promoting continuous improvement in police services and community relations. </p>
                <div class="flex">                 
                  <div class="flex flex-col">
                  </div>
                </div>
              </div>
            </a>
          </div>
          <!-- Button -->
          
          
        </div>
      </div>
    </section>

    <!--process section-->

    <section id="process">
      <!-- Container -->
      <div class="mx-auto w-full max-w-7xl px-5 py-12 md:px-10 md:py-16 lg:py-20">
        <!-- Component -->
        <div class="flex flex-col items-center">
          <!-- Item -->
          <div class="relative">
            <div class="absolute w-1 md:w-2 bg-blue-900 h-full left-1/2 transform -translate-x-1/2"></div>
            <!-- Static Event Entry -->
            <div class="mb-20 mt-20 flex items-center w-full">
              <div class="w-1/2 text-right pr-5 md:pr-12">
                <h5 class="text-lg md:text-2xl font-semibold text-blue-900"> Step 01 </h5>
              </div>
              <div class="w-4 h-4 md:w-5 md:h-5 rounded-full bg-blue-900"></div>
              <div class="w-1/2 pl-5 md:pl-12">
                <h6 class="text-md md:text-xl font-semibold mb-3 text-blue-900"> Complaint Submission </h6>
                <p class="text-gray-500"> Citizens submit their complaints through various channels, such as online forms, mobile apps, or in-person visits to police stations. </p>
              </div>
            </div>
            <!-- Another Static Event Entry -->
            <div class="mb-20 mt-20 flex items-center w-full">
              <div class="w-1/2 text-right pr-5 md:pr-12">
                <h5 class="text-lg md:text-2xl font-semibold text-blue-900"> Step 02 </h5>
              </div>
              <div class="w-4 h-4 md:w-5 md:h-5 rounded-full bg-blue-900"></div>
              <div class="w-1/2 pl-5 md:pl-12">
                <h6 class="text-md md:text-xl font-semibold mb-3 text-blue-900"> Complaint Acknowledgment </h6>
                <p class="text-gray-500"> The system acknowledges receipt of the complaint, providing a unique reference number for tracking purposes, ensuring the complainant feels heard. </p>
              </div>
            </div>
            <div class="mb-20 mt-20 flex items-center w-full">
              <div class="w-1/2 text-right pr-5 md:pr-12">
                <h5 class="text-lg md:text-2xl font-semibold text-blue-900"> Step 03 </h5>
              </div>
              <div class="w-4 h-4 md:w-5 md:h-5 rounded-full bg-blue-900"></div>
              <div class="w-1/2 pl-5 md:pl-12">
                <h6 class="text-md md:text-xl font-semibold mb-3 text-blue-900"> Investigation and Resolution </h6>
                <p class="text-gray-500"> Assigned officers investigate the complaint thoroughly, gathering evidence and interviewing relevant parties, aiming for a fair resolution. </p>
              </div>
            </div>
            <div class="mb-20 mt-20 flex items-center w-full">
              <div class="w-1/2 text-right pr-5 md:pr-12">
                <h5 class="text-lg md:text-2xl font-semibold text-blue-900"> Step 04 </h5>
              </div>
              <div class="w-4 h-4 md:w-5 md:h-5 rounded-full bg-blue-900"></div>
              <div class="w-1/2 pl-5 md:pl-12">
                <h6 class="text-md md:text-xl font-semibold mb-3 text-blue-900"> Feedback and Closure </h6>
                <p class="text-gray-500"> Once resolved, the complainant receives an update on the investigation outcome. The system often requests feedback to enhance future services. </p>
              </div>
            </div>
          </div>
          <!-- Item -->
          <div class="relative">
            <div class="absolute w-1 md:w-2 bg-gray-300 h-full left-1/2 transform -translate-x-1/2"></div>
          </div>
        </div>
      </div>
    </section>

    <!--decription-->

    <section class="bg-gray-200 py-16">
      <div class="px-5 py-16 md:px-10 md:py-20">
        <div class="mx-auto w-full max-w-7xl bg-gray-200 px-4 py-32 text-center">
          <h2 class="mb-4 text-3xl font-bold md:text-5xl max-w-2xl mx-auto text-blue-900"> Swift and Efficient Police Complaint Management Made Easy </h2>
          <p class="mx-auto mb-6 max-w-xl text-sm text-dark-500 sm:text-base md:mb-12"> Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna </p>
        </div>
      </div>
    </section>

    <!--contact usections-->
    <section id="contact">
      <!-- Container -->
      <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">
        <!-- Component -->
        <div class="grid items-center gap-8 sm:gap-20 lg:grid-cols-2">
          <div class="max-w-3xl">
            <!-- Title -->
            <h2 class="mb-2 text-3xl font-bold md:text-5xl">Contact Us</h2>
            <p class="my-4 max-w-lg pb-4 text-sm text-gray-500 sm:text-base md:mb-6 lg:mb-8"> Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus </p>
            <!-- Testimonial -->
            
            <div>
              <h3 class="text-xl font-semibold mb-4">Headquarters</h3>
              <p class="text-gray-700 mb-4">Sri Lanka Police Headquarters, Colombo.</p>
              <p class="text-gray-700 mb-4">Phone: <a href="tel:119" class="text-blue-600">119</a></p>
              <p class="text-gray-700 mb-4">Email: <a href="mailto:info@police.lk" class="text-blue-600">info@police.lk</a></p>
            </div>
            
          </div>
          <div class="mx-auto max-w-xl bg-gray-100 p-8 text-center">
            <h3 class="text-2xl font-bold md:text-3xl">Send us amessage</h3>
            <p class="mx-auto mb-6 mt-4 max-w-lg text-sm text-gray-500 lg:mb-8"> Share Your comments and suggestions </p>
            <!-- Form -->
            <form class="mx-auto mb-4 max-w-sm text-left" name="wf-form-password" action="{{ route('message') }}" method="Post">
              @csrf
              <div>
                <label htmlFor="name-2" class="mb-1 font-medium"> Your Name </label>
                <input type="text" name="name" class="mb-4 block h-9 w-full rounded-md border border-solid border-black px-3 py-6 pl-4 text-sm text-black" required/>
              </div>
              <div class="mb-2">
                <label htmlFor="name-2" class="mb-1 font-medium"> Email Address </label>
                <input type="text" name="email" class="mb-4 block h-9 w-full rounded-md border border-solid border-black px-3 py-6 pl-4 text-sm text-black" required/>
              </div>
              <div class="mb-5 md:mb-6 lg:mb-8">
                <label htmlFor="field-3" class="mb-1 font-medium"> Your Messase </label>
                <textarea placeholder="" maxLength="5000" name="message" class="mb-2.5 block h-auto min-h-32 w-full rounded-md border border-solid border-black p-3 text-sm text-black" required></textarea>
              </div>
              <input type="submit" value="Send message" class="inline-block w-full cursor-pointer rounded-md bg-blue-900 px-6 py-3 text-center font-semibold text-white" />
            </form>
          </div>
        </div>
      </div>
    </section>

</div>


@include('site.component.footer')