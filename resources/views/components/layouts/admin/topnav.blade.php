<div class="flex justify-between items-center py-4">
    <button x-on:click="aside = !aside">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>

    </button>

    <div  x-data="{profileDropdown: false}" class="avatar relative">
        <div class="w-14 rounded-full cursor-pointer " x-on:click="profileDropdown = !profileDropdown">
            <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />

        </div>
        <div x-cloak x-show="profileDropdown" x-transition id="dropdown" class="absolute top-16 z-50 left-auto right-0 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 max-h-[10rem]">
            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton">

              <li>
                <a href="{{ route('admin.setting') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
              </li>

              <li>
                <a href="{{ route('admin.logout') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
              </li>
            </ul>
        </div>

    </div>
</div>
