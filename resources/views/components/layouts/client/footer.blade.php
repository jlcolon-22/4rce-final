<footer class="px-[70px] bg-[#ffffff] relative shadow" >
    <div class="grid grid-cols-4 py-10 ">
     <div class="grid grid-cols-2 gap-y-10 sm:grid-cols-3 col-span-4 sm:col-span-3 pt-6">
       <!-- links -->
       <div>
        <h1 class="font-bold text-lg text-gray-500">Links</h1>
        <span class="flex gap-1 ">
            <img src="{{ asset('svg/nut.svg') }}" alt="">
          <a href="/"
            class="hover:underline hover:text-lightYellow ">Home</a></span>
        <span class="flex gap-1 "><img src="{{ asset('svg/nut.svg') }}" alt=""><a href="/project"
            class="hover:underline hover:text-lightYellow ">Project</a></span>
        <span class="flex gap-1 "><img src="{{ asset('svg/nut.svg') }}" alt=""><a href="estimate"
            class="hover:underline hover:text-lightYellow ">Estimate</a></span>
        <span class="flex gap-1 "><img src="{{ asset('svg/nut.svg') }}" alt=""><a href="/about"
            class="hover:underline hover:text-lightYellow ">About</a></span>
        <span class="flex gap-1 "><img src="{{ asset('svg/nut.svg') }}" alt=""><a href="contact"
            class="hover:underline hover:text-lightYellow ">Contact</a></span>
      </div>

      <!-- services -->
      <div>
        <h1 class="font-bold text-lg text-gray-500">Services</h1>
        <span class="flex gap-1 "><img src="{{ asset('svg/nut.svg') }}" alt=""><a type="button"
            class="hover:underline hover:text-lightYellow ">Renovate</a></span>
        <span class="flex gap-1 "><img src="{{ asset('svg/nut.svg') }}" alt=""><a type="button"
            class="hover:underline hover:text-lightYellow ">Construct</a></span>
        <span class="flex gap-1 "><img src="{{ asset('svg/nut.svg') }}" alt=""><a type="button"
            class="hover:underline hover:text-lightYellow ">Elevate</a></span>


      </div>
      <!-- Follow us -->
      <div>
        <h1 class="font-bold text-lg text-gray-500">Follow us</h1>
        <span class="flex gap-2">
          <a href="https://web.facebook.com/4RCEBuildersCorp" target="_blank" ><img src="{{ asset('assets/facebookcolor.png') }}" class="w-[30px]" alt=""></a>
          <!-- <a href=""><img src="/assets/twitter.png" class="w-[30px]" alt=""></a>
          <a href=""><img src="/assets/instagram.png" class="w-[30px]" alt=""></a> -->
        </span>

      </div>
     </div>
      <img src="{{ asset('assets/construction.png') }}" class="w-[240px] hidden sm:block" alt="">
    </div>
    <p class="pb-10">© 2023 4RCE + BUILDERS CORPORATION. All Rights Reserved.</p>
  </footer>
