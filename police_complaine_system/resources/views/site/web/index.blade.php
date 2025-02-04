@include('site.component.navbar')

<div class="pt-20">

    <!-- Hero Section -->
   

    <!-- About Us Section -->

    <section id="about"> <!-- Container -->
      <div class="mx-auto w-full max-w-7xl px-5 py-12 md:px-10 md:py-16 lg:py-20"> <!-- Component -->
        <div class="flex flex-col gap-8 lg:flex-row lg:gap-10"> <!-- Content -->
          <div class="flex flex-col gap-8 lg:w-3/5">
            <h2 class="mb-8 text-3xl font-bold md:text-5xl">About us</h2>
            <p class="text-sm sm:text-base"> The Sri Lankan Police has a rich history dating back to 1865, evolving from a colonial force under British rule. Initially tasked with maintaining order, it has transformed into a modern law enforcement agency. The police play a crucial role in upholding law and order amidst various socio-political challenges. </p>
            
            <div class="my-8 h-px w-full bg-black"></div> <!-- Testimonials -->
            <div class="grid gap-8 md:grid-cols-2 md:gap-4">

              <div class="flex flex-col gap-4 rounded-md border border-solid bg-gray-100 p-6 md:p-4">
                <div class="flex items-center gap-x-2">
                  <p class="text-sm font-semibold sm:text-base"> Vision </p>
                </div>
                <p class="text-sm"> Towards a Peaceful environment to live with confidence, without fear of Crime and Violence. </p>
                <div class="flex items-center gap-2 sm:gap-x-4">
                </div>
              </div>

              <div class="flex flex-col gap-4 rounded-md border border-solid bg-gray-100 p-6 md:p-4">
                <div class="flex items-center gap-x-2">
                  <p class="text-sm font-semibold sm:text-base"> Mission </p>
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
            <a href="#" class="flex flex-col gap-4 rounded-md border border-solid border-gray-300 px-4 py-8 md:p-0">
              <img src="{{ asset('assets/service1.png') }}" alt="" class="h-60" />
              <div class="px-6 py-4">
                <p class="mb-4 text-xl font-semibold"> Online Complaint Registration </p>
                <p class="mb-6 text-sm text-gray-500 sm:text-base lg:mb-8">Enables citizens to file complaints easily through a user-friendly online portal, enhancing accessibility and convenience. </p>
                <div class="flex">
                  <div class="flex flex-col">
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="flex flex-col gap-4 rounded-md border border-solid border-gray-300 px-4 py-8 md:p-0">
              <img src="{{ asset('assets/service2.png') }}" alt="" class="h-60" />
              <div class="px-6 py-4">
                <p class="mb-4 text-xl font-semibold"> Complaint Tracking </p>
                <p class="mb-6 text-sm text-gray-500 sm:text-base lg:mb-8"> Allows users to monitor the status of their complaints in real-time, ensuring transparency and accountability in the process. </p>
                <div class="flex">                  
                  <div class="flex flex-col">
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="flex flex-col gap-4 rounded-md border border-solid border-gray-300 px-4 py-8 md:p-0">
              <img src="{{ asset('assets/service3.png') }}" alt="" class="h-60" />
              <div class="px-6 py-4">
                <p class="mb-4 text-xl font-semibold"> Feedback Mechanism </p>
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
            <div class="absolute w-1 md:w-2 bg-black h-full left-1/2 transform -translate-x-1/2"></div>
            <!-- Static Event Entry -->
            <div class="mb-20 mt-20 flex items-center w-full">
              <div class="w-1/2 text-right pr-5 md:pr-12">
                <h5 class="text-lg md:text-2xl font-semibold"> Step 01 </h5>
              </div>
              <div class="w-4 h-4 md:w-5 md:h-5 rounded-full bg-black"></div>
              <div class="w-1/2 pl-5 md:pl-12">
                <h6 class="text-md md:text-xl font-semibold mb-3"> Complaint Submission </h6>
                <p class="text-gray-500"> Citizens submit their complaints through various channels, such as online forms, mobile apps, or in-person visits to police stations. </p>
              </div>
            </div>
            <!-- Another Static Event Entry -->
            <div class="mb-20 mt-20 flex items-center w-full">
              <div class="w-1/2 text-right pr-5 md:pr-12">
                <h5 class="text-lg md:text-2xl font-semibold"> Step 02 </h5>
              </div>
              <div class="w-4 h-4 md:w-5 md:h-5 rounded-full bg-black"></div>
              <div class="w-1/2 pl-5 md:pl-12">
                <h6 class="text-md md:text-xl font-semibold mb-3"> Complaint Acknowledgment </h6>
                <p class="text-gray-500"> The system acknowledges receipt of the complaint, providing a unique reference number for tracking purposes, ensuring the complainant feels heard. </p>
              </div>
            </div>
            <div class="mb-20 mt-20 flex items-center w-full">
              <div class="w-1/2 text-right pr-5 md:pr-12">
                <h5 class="text-lg md:text-2xl font-semibold"> Step 03 </h5>
              </div>
              <div class="w-4 h-4 md:w-5 md:h-5 rounded-full bg-black"></div>
              <div class="w-1/2 pl-5 md:pl-12">
                <h6 class="text-md md:text-xl font-semibold mb-3"> Investigation and Resolution </h6>
                <p class="text-gray-500"> Assigned officers investigate the complaint thoroughly, gathering evidence and interviewing relevant parties, aiming for a fair resolution. </p>
              </div>
            </div>
            <div class="mb-20 mt-20 flex items-center w-full">
              <div class="w-1/2 text-right pr-5 md:pr-12">
                <h5 class="text-lg md:text-2xl font-semibold"> Step 04 </h5>
              </div>
              <div class="w-4 h-4 md:w-5 md:h-5 rounded-full bg-black"></div>
              <div class="w-1/2 pl-5 md:pl-12">
                <h6 class="text-md md:text-xl font-semibold mb-3"> Feedback and Closure </h6>
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
          <h2 class="mb-4 text-3xl font-bold md:text-5xl max-w-2xl mx-auto"> Swift and Efficient Police Complaint Management Made Easy </h2>
          <p class="mx-auto mb-6 max-w-xl text-sm text-dark-500 sm:text-base md:mb-12"> Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna </p>
          <div class="mx-auto">
            <ul class="flex flex-wrap justify-center gap-6 items-center">
              <li class="w-50">
                <a href="#" class="flex items-center gap-4 rounded-full bg-gray-300 px-8 py-5 font-bold text-white transition hover:text-black">
                  <svg width="25" height="20" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.2015 2.69343C23.4474 3.01826 22.6546 3.24446 21.8427 3.36643C22.2223 3.3013 22.7808 2.61744 23.0031 2.34065C23.3143 1.95602 23.5572 1.52123 23.7218 1.0552C23.7498 0.975913 23.8307 0.864442 23.7623 0.815541V0.815541C23.7432 0.805091 23.7217 0.799614 23.6999 0.799614C23.6781 0.799614 23.6567 0.805091 23.6376 0.815541C22.756 1.29338 21.8177 1.65809 20.8449 1.90102C20.811 1.91139 20.775 1.91232 20.7406 1.90372C20.7062 1.89511 20.6748 1.87729 20.6497 1.85218C20.574 1.76194 20.4925 1.67673 20.4057 1.59709C20.009 1.24129 19.5588 0.950092 19.0718 0.73413C18.4143 0.464158 17.7041 0.347239 16.9949 0.392203C16.3067 0.435703 15.6349 0.620446 15.0211 0.934945C14.4167 1.26652 13.8854 1.71697 13.4594 2.25923C13.0112 2.81736 12.6876 3.46508 12.5104 4.15883C12.3785 4.75439 12.3522 5.36797 12.432 5.9717C12.4493 6.102 12.4937 6.30258 12.364 6.28095V6.28095C8.4977 5.71107 5.32548 4.33793 2.73348 1.39085C2.6196 1.26059 2.55995 1.26059 2.46777 1.39085C1.33987 3.10591 1.88755 5.81962 3.29743 7.16019V7.16019C3.4705 7.32352 3.34532 7.61208 3.11378 7.55711C2.74026 7.46843 2.3777 7.33539 2.03396 7.16019C1.92551 7.08963 1.86586 7.12763 1.86044 7.25788C1.84507 7.43847 1.84507 7.62004 1.86044 7.80062C1.97358 8.66608 2.31435 9.48593 2.84789 10.1763C3.38144 10.8667 4.08861 11.4029 4.89709 11.7301V11.7301C5.02514 11.785 5.01238 11.9966 4.8735 12.0075C4.48064 12.0384 4.08499 12.0274 3.69328 11.9743C3.56313 11.9472 3.51433 12.0177 3.56313 12.1426C4.36026 14.3135 6.09006 14.9757 7.35895 15.3447C7.52034 15.37 7.68174 15.3717 7.86059 15.4068C7.88111 15.4108 7.89218 15.4243 7.87739 15.4391V15.4391C7.87526 15.4413 7.86797 15.4491 7.86651 15.4518C7.48872 16.1335 5.98028 16.5935 5.28752 16.8318C4.02062 17.2873 2.66988 17.4614 1.32902 17.342C1.11754 17.3095 1.06874 17.3149 1.01451 17.342V17.342C0.907031 17.3958 1.12422 17.5169 1.22582 17.5811C1.44673 17.7207 1.66897 17.848 1.8984 17.9716C2.73784 18.4299 3.6253 18.7939 4.54462 19.0571C9.30566 20.3705 14.6632 19.4044 18.2367 15.8495C21.0456 13.0598 22.0325 9.21175 22.0325 5.35829C22.0325 5.21175 22.2114 5.12491 22.3145 5.04893C23.0251 4.49473 23.6516 3.84023 24.1744 3.10591C24.265 2.99645 24.3114 2.85708 24.3046 2.71514C24.3046 2.63373 24.3046 2.65001 24.2015 2.69343Z" fill="currentColor"></path>
                  </svg>
                  <p class="text-black text-sm sm:text-base">Twitter</p>
                </a>
              </li>
              <li class="w-50">
                <a href="#" class="flex items-center gap-4 rounded-full bg-gray-300 px-8 py-5 font-bold text-white transition hover:text-black">
                  <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.3522 1.68915C25.2886 6.04768 26.7388 10.964 26.1967 16.6238C26.1944 16.6477 26.182 16.6697 26.1625 16.6841C23.9389 18.3325 21.7845 19.3329 19.6603 19.9964C19.6437 20.0014 19.626 20.0011 19.6097 19.9955C19.5933 19.99 19.579 19.9793 19.5689 19.9652C19.0782 19.2758 18.6323 18.5491 18.2416 17.7859C18.2192 17.741 18.2397 17.6868 18.2858 17.6691C18.994 17.3997 19.6674 17.0769 20.3151 16.6946C20.3662 16.6645 20.3694 16.5906 20.3223 16.5552C20.1848 16.4522 20.0486 16.3439 19.9183 16.2356C19.8939 16.2156 19.8611 16.2117 19.8335 16.2251C15.6283 18.1855 11.0218 18.1855 6.76689 16.2251C6.73926 16.2127 6.70644 16.2169 6.68271 16.2366C6.55271 16.3449 6.41621 16.4522 6.28004 16.5552C6.23291 16.5906 6.23681 16.6645 6.28816 16.6946C6.93589 17.0697 7.60929 17.3997 8.31648 17.6704C8.36231 17.6881 8.38408 17.741 8.36133 17.7859C7.97914 18.5501 7.53324 19.2768 7.03339 19.9662C7.01161 19.9941 6.97586 20.0069 6.94206 19.9964C4.82794 19.3329 2.67352 18.3325 0.449872 16.6841C0.431347 16.6697 0.418022 16.6467 0.416072 16.6228C-0.0369773 11.7272 0.886346 6.77016 4.25692 1.68816C4.26504 1.67471 4.27739 1.66421 4.29169 1.65798C5.95016 0.88956 7.72694 0.324237 9.58398 0.00138313C9.61778 -0.00386653 9.65158 0.0118824 9.66913 0.042068C9.89858 0.452198 10.1609 0.978148 10.3383 1.40796C12.2958 1.10611 14.2838 1.10611 16.2822 1.40796C16.4597 0.987335 16.7128 0.452198 16.9413 0.042068C16.9495 0.0270933 16.9621 0.0150963 16.9774 0.00778993C16.9927 0.000483532 17.0098 -0.00175878 17.0265 0.00138313C18.8845 0.325221 20.6613 0.890544 22.3184 1.65798C22.3331 1.66421 22.3451 1.67471 22.3522 1.68915ZM11.3335 10.9975C11.3539 9.55018 10.3087 8.35261 8.99671 8.35261C7.69541 8.35261 6.66029 9.53969 6.66029 10.9975C6.66029 12.4549 7.71589 13.642 8.99671 13.642C10.2983 13.642 11.3335 12.4549 11.3335 10.9975ZM19.9726 10.9975C19.9931 9.55018 18.9479 8.35261 17.6362 8.35261C16.3345 8.35261 15.2994 9.53969 15.2994 10.9975C15.2994 12.4549 16.355 13.642 17.6362 13.642C18.9479 13.642 19.9726 12.4549 19.9726 10.9975Z" fill="currentColor"></path>
                  </svg>
                  <p class="text-black text-sm sm:text-base">Discord</p>
                </a>
              </li>
              <li class="w-50">
                <a href="#" class="flex items-center gap-4 rounded-full bg-gray-300 px-8 py-5 font-bold text-white transition hover:text-black">
                  <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.1488 0H11.148C10.2787 0.00026614 9.43192 0.167491 8.63121 0.497061C7.86261 0.813369 7.17088 1.26439 6.57524 1.83761C5.98039 2.41008 5.51225 3.07467 5.18385 3.81295C4.84239 4.58063 4.66874 5.392 4.66767 6.22453C4.66731 6.51019 4.66288 6.78996 4.65443 7.06222C4.6488 7.24353 4.47882 7.37336 4.30183 7.33363V7.33363C4.17729 7.30568 4.04923 7.29149 3.92131 7.29145C3.55191 7.2914 3.18751 7.41094 2.89525 7.62802C2.59034 7.85451 2.37652 8.17703 2.29326 8.53618C2.0951 9.39107 2.58816 10.2541 3.44261 10.5576V10.5576C4.01052 10.7771 4.3224 11.4195 4.00555 11.9394C3.31546 13.0718 2.38132 13.3571 1.7093 13.5623C1.48755 13.6301 1.29602 13.6886 1.11365 13.7752C0.387033 14.1205 0.308594 14.7054 0.308594 14.9409C0.308594 15.3918 0.531542 15.8034 0.936435 16.0996C1.13802 16.2472 1.38775 16.3689 1.69984 16.4717C1.97512 16.5625 2.27876 16.6318 2.56738 16.6887C2.836 16.7417 3.03343 16.9596 3.11472 17.2211V17.2211C3.31344 17.8603 3.73279 18.1465 4.0496 18.274C4.35021 18.3951 4.66081 18.4091 4.86829 18.4091C5.07122 18.4091 5.28573 18.3938 5.51285 18.3777C5.75651 18.3604 6.00846 18.3426 6.25703 18.3426C6.64224 18.3426 6.92898 18.3866 7.13363 18.4771C7.41463 18.6014 7.71264 18.769 8.02816 18.9464C8.90652 19.4402 9.90205 20 11.1581 20C12.4142 20 13.4096 19.4402 14.288 18.9464C14.6035 18.7689 14.9015 18.6014 15.1826 18.4771C15.3872 18.3866 15.674 18.3426 16.0592 18.3426C16.3077 18.3426 16.5597 18.3605 16.8033 18.3777C17.0304 18.3938 17.2449 18.4091 17.4479 18.4091C17.6553 18.4091 17.9659 18.3951 18.2665 18.274C18.5834 18.1465 19.0027 17.8603 19.2014 17.2211V17.2211C19.2827 16.9596 19.4802 16.7416 19.7488 16.6887C20.0374 16.6317 20.3411 16.5625 20.6163 16.4717C20.9284 16.3689 21.1781 16.2472 21.3797 16.0996C21.7846 15.8034 22.0076 15.3918 22.0076 14.9409C22.0076 14.7054 21.9291 14.1205 21.2024 13.7752C21.02 13.6886 20.8285 13.6301 20.6068 13.5624C19.9347 13.3571 19.0006 13.0718 18.3105 11.9394C17.9937 11.4196 18.3055 10.7771 18.8734 10.5577V10.5577C19.7278 10.2542 20.221 9.39107 20.0228 8.53618C19.9395 8.17703 19.7257 7.85451 19.4208 7.62802C19.1285 7.41099 18.7642 7.29145 18.3949 7.29145C18.267 7.29145 18.1389 7.30564 18.0143 7.33358V7.33358C17.8373 7.37332 17.6673 7.24346 17.6617 7.06213C17.6532 6.78991 17.6488 6.51016 17.6484 6.22449C17.6474 5.39129 17.4723 4.57912 17.1281 3.81042C16.7977 3.0725 16.3271 2.40808 15.7292 1.83557C15.1314 1.2631 14.4377 0.812571 13.6675 0.496529C12.8653 0.167358 12.0179 0.000310497 11.1488 0Z" fill="currentColor"></path>
                  </svg>
                  <p class="text-black text-sm sm:text-base">Snapchat</p>
                </a>
              </li>
            </ul>
          </div>
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
            <p class="mx-auto mb-6 mt-4 max-w-lg text-sm text-gray-500 lg:mb-8"> Lorem ipsum dolor sit amet consectetur adipiscing elit ut aliquam,purus sit amet luctus magna fringilla urna </p>
            <!-- Form -->
            <form class="mx-auto mb-4 max-w-sm text-left" name="wf-form-password" method="get">
              <div>
                <label htmlFor="name-2" class="mb-1 font-medium"> Your Name </label>
                <input type="text" class="mb-4 block h-9 w-full rounded-md border border-solid border-black px-3 py-6 pl-4 text-sm text-black" />
              </div>
              <div class="mb-2">
                <label htmlFor="name-2" class="mb-1 font-medium"> Email Address </label>
                <input type="text" class="mb-4 block h-9 w-full rounded-md border border-solid border-black px-3 py-6 pl-4 text-sm text-black" />
              </div>
              <div class="mb-5 md:mb-6 lg:mb-8">
                <label htmlFor="field-3" class="mb-1 font-medium"> Your Messase </label>
                <textarea placeholder="" maxLength="5000" name="field" class="mb-2.5 block h-auto min-h-32 w-full rounded-md border border-solid border-black p-3 text-sm text-black"></textarea>
              </div>
              <input type="submit" value="Send message" class="inline-block w-full cursor-pointer rounded-md bg-black px-6 py-3 text-center font-semibold text-white" />
            </form>
          </div>
        </div>
      </div>
    </section>

</div>


@include('site.component.footer')