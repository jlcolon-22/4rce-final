<div x-data="{ toggleMobile: false,profileDropdown: false }" class="fixed top-0 left-0 w-full z-50 bg-[#ffffff] shadow ">
    <div class="bg-dark h-[32px] flex  justify-end items-center">

        <span class="px-3 text-gray-200 flex items-center gap-2 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>

            4rceservices@gmail.com</span>
        <span class="px-3 text-gray-200 flex items-center gap-2 text-sm"><svg xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
            </svg>
            09778210156</span>
        @if (Auth::guard('customer')->check())

            <a  type="button"
            x-on:click="profileDropdown = !profileDropdown"
        class="text-gray-50 bg-green-500 cursor-pointer h-full px-10 text-center flex justify-center items-center relative"><span>Account</span>



        <div x-cloak x-show="profileDropdown" x-transition  id="dropdown" class="absolute top-8 z-50 left-auto right-0 bg-gray-300 divide-y divide-gray-100 rounded-lg shadow w-44 max-h-[10rem]">
            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton">

              <li>
                <a href="{{ route('client.profile') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
              </li>
              <li>
                <a href="{{ route('client.myprojects') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Projects</a>
              </li>
              <li>
                <a href="{{ route('client.feedback') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Feedback</a>
              </li>
              <li>
                <a href="{{ route('client.logout') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
              </li>
            </ul>
        </div>





    </a>


        @else
        <a href="{{ route('client.login') }}"
        class="text-gray-50 bg-green-500 h-full px-10 text-center flex justify-center items-center"><span>{{ false ? 'Account' : 'Login' }}</span></a>
        @endif

    </div>
    <div class="  flex justify-between items-center h-[80px] max-w-screen-lg mx-auto px-10 lg:px-0">

        <img src="{{ asset('logo.jpg') }}" class="w-[60px]" alt="">
        <button x-on:click="toggleMobile = true" class="block md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-10 ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>

        </button>
        <div x-cloak x-show="toggleMobile" class="fixed top-0 left-0 w-full h-[100svh] bg-white">
            <div class="flex justify-end p-8">
                <svg x-on:click="toggleMobile = false" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 text-red-500 font-bold">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>

            </div>
            <div class="grid gap-4 px-8 ">

                <div
                    class=" h-full flex items-center {{ request()->routeIs('client.homepage') ? 'border-b-4 border-lightYellow bg-gray-100' : '' }}">
                    <a href="/"
                        class="px-6  hover:text-lightYellow {{ request()->routeIs('client.homepage') ? 'text-lightYellow font-bold mt-2 ' : 'text-dark' }}">Home</a>
                </div>

                <div
                    class=" h-full flex items-center {{ request()->routeIs('client.homepage') ? 'border-b-4 border-lightYellow bg-gray-100' : '' }}">
                    <a href="/project"
                        class="px-6  hover:text-lightYellow {{ request()->routeIs('client.homepage') ? 'text-lightYellow font-bold mt-2 ' : 'text-dark' }}">Projects</a>
                </div>
                <div class=" h-full flex items-center">
                    <a href="/estimate"
                        class="px-6  hover:text-lightYellow {{ request()->routeIs('client.homepage') ? 'text-lightYellow font-bold mt-2 ' : 'text-dark' }}">Estimate</a>
                </div>
                <div class=" h-full flex items-center">
                    <a href="/FAQS" class="px-6  hover:text-lightYellow">FAQ's</a>
                </div>
                <div class=" h-full flex items-center">
                    <a href="/about" class="px-6 hover:text-lightYellow ">About</a>
                </div>

                <div class=" h-full flex items-center">
                    <a href="/contact" class="px-6 hover:text-lightYellow ">Contact
                        Us</a>
                </div>
            </div>

        </div>
        <div class="md:flex gap-x-20 items-center hidden">
            <div class="flex  items-center  h-[80px]">

                <div
                    class=" h-full flex items-center {{ request()->routeIs('client.homepage') ? 'border-b-4 border-lightYellow bg-gray-100' : '' }}">
                    <a href="{{ route('client.homepage') }}"
                        class="px-6  hover:text-lightYellow  {{ request()->routeIs('client.homepage') ? 'text-lightYellow font-bold mt-2 ' : 'text-dark' }}">Home</a>
                </div>

                <div class=" h-full flex items-center {{ request()->routeIs('client.project') ? 'border-b-4 border-lightYellow bg-gray-100' : '' }}" >
                    <a href="{{ route('client.project') }}" class="px-6  hover:text-lightYellow {{ request()->routeIs('client.project') ? 'text-lightYellow font-bold mt-2 ' : 'text-dark' }}">Projects</a>
                </div>
                <div class=" h-full flex items-center {{ request()->routeIs('client.estimate') ? 'border-b-4 border-lightYellow bg-gray-100' : '' }}">
                    <a href="{{ route('client.estimate') }}" class="px-6  hover:text-lightYellow {{ request()->routeIs('client.estimate') ? 'text-lightYellow font-bold mt-2 ' : 'text-dark' }}">Estimate</a>
                </div>
                <div class=" h-full flex items-center {{ request()->routeIs('client.faqs') ? 'border-b-4 border-lightYellow bg-gray-100' : '' }}">
                    <a href="{{ route('client.faqs') }}" class="px-6  hover:text-lightYellow {{ request()->routeIs('client.faqs') ? 'text-lightYellow font-bold mt-2 ' : 'text-dark' }}">FAQ's</a>
                </div>
                <div class=" h-full flex items-center {{ request()->routeIs('client.about') ? 'border-b-4 border-lightYellow bg-gray-100' : '' }}">
                    <a href="{{ route('client.about') }}" class="px-6 hover:text-lightYellow {{ request()->routeIs('client.about') ? 'text-lightYellow font-bold mt-2 ' : 'text-dark' }}">About</a>
                </div>

                <div class=" h-full flex items-center {{ request()->routeIs('client.contact') ? 'border-b-4 border-lightYellow bg-gray-100' : '' }}">
                    <a href="{{ route('client.contact') }}" class="px-6 hover:text-lightYellow {{ request()->routeIs('client.contact') ? 'text-lightYellow font-bold mt-2 ' : 'text-dark' }}">Contact
                        Us</a>
                </div>
            </div>

        </div>
    </div>
</div>
