<div class="relative" wire:ignore>
    <aside x-cloak x-transition class="bg-[#072D44] min-w-[230px] sm:min-w-[270px] max-w-[230px] sm:max-w-[270px] min-h-[100svh] text-white " :class="aside ? 'hidden lg:block'  : 'block fixed top-0 left-0 z-50 lg:hidden'">
        <div class="h-[5rem] flex items-center justify-center">
            <h1 class="text-main font-extrabold text-2xl text-center">ADMIN PANEL</h1>
        </div>
        <button x-on:click="aside = !aside" class="absolute text-black -right-10 top-8 block lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>

        </button>
        {{-- links --}}
        <div class="pt-16 space-y-1" x-data="{ employee: {{ request()->routeIs('admin.employee.position') || request()->routeIs('admin.employee.account') ? 'true' : 'false' }}, project: {{ request()->routeIs('admin.project.division') || request()->routeIs('admin.project.team') || request()->routeIs('admin.project.list') ? 'true' : 'false' }} }">
            <a href="{{ route('admin.dashboard') }}"
                class=" flex gap-2 item-center  px-5 py-3 {{ request()->routeIs('admin.dashboard') ? 'border-l-4 border-main font-bold bg-black/40' : 'border-l-4 border-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.customer') }}"
                class=" flex gap-2 item-center  px-5 py-3 border-l-4 {{ request()->routeIs('admin.customer') ? 'border-l-4 border-main font-bold bg-black/40' : 'border-l-4 border-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>

                <span>Customer Account</span>
            </a>
            <a type="button" x-on:click="employee = !employee"
                class=" flex gap-2 items-center justify-between cursor-pointer  border-l-4    px-5 py-3 {{ request()->routeIs('admin.employee.position') || request()->routeIs('admin.employee.account') ? 'border-l-4 border-main font-bold bg-black/40' : 'border-l-4 border-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>

                    <span>Employees</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>

            </a>
            {{-- employee dropdown --}}
            <div x-cloak x-show="employee" x-transition class="space-y-1 px-6">

                <a href="{{ route('admin.employee.account') }}"
                    class=" flex gap-2 items-center justify-between  w-full   px-5 py-3 {{ request()->routeIs('admin.employee.account') ? 'w-full border-main font-bold ' : 'w-fullborder-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
                    <div class="flex items-center gap-2">
                        <svg class="size-6 fill-white" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.5 9.125C8.39746 9.125 9.125 8.39746 9.125 7.5C9.125 6.60254 8.39746 5.875 7.5 5.875C6.60254 5.875 5.875 6.60254 5.875 7.5C5.875 8.39746 6.60254 9.125 7.5 9.125ZM7.5 10.125C8.94975 10.125 10.125 8.94975 10.125 7.5C10.125 6.05025 8.94975 4.875 7.5 4.875C6.05025 4.875 4.875 6.05025 4.875 7.5C4.875 8.94975 6.05025 10.125 7.5 10.125Z" />
                        </svg>

                        <span>Employees Account</span>
                    </div>


                </a>
                <a href="{{ route('admin.employee.position') }}"
                    class=" flex gap-2 items-center justify-between  w-full   px-5 py-3 {{ request()->routeIs('admin.employee.position') ? 'w-full border-main font-bold' : 'w-fullborder-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
                    <div class="flex items-center gap-2">
                        <svg class="size-6 fill-white" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.5 9.125C8.39746 9.125 9.125 8.39746 9.125 7.5C9.125 6.60254 8.39746 5.875 7.5 5.875C6.60254 5.875 5.875 6.60254 5.875 7.5C5.875 8.39746 6.60254 9.125 7.5 9.125ZM7.5 10.125C8.94975 10.125 10.125 8.94975 10.125 7.5C10.125 6.05025 8.94975 4.875 7.5 4.875C6.05025 4.875 4.875 6.05025 4.875 7.5C4.875 8.94975 6.05025 10.125 7.5 10.125Z" />
                        </svg>

                        <span>Employee Position</span>
                    </div>


                </a>

            </div>


            {{-- projects --}}
            <a type="button" x-on:click="project = !project"
                class=" flex gap-2 items-center justify-between cursor-pointer  border-l-4    px-5 py-3 {{ request()->routeIs('admin.project.team') || request()->routeIs('admin.project.division') || request()->routeIs('admin.project.list') ? 'border-l-4 border-main font-bold bg-black/40' : 'border-l-4 border-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                      </svg>


                    <span>Project Management </span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>

            </a>
            {{-- projects dropdown --}}
            <div x-cloak x-show="project" x-transition class="space-y-1 px-6">

                <a href="{{ route('admin.project.list') }}"
                    class=" flex gap-2 items-center justify-between  w-full   px-5 py-3 {{ request()->routeIs('admin.project.list') ? 'w-full border-main font-bold ' : 'w-fullborder-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
                    <div class="flex items-center gap-2">
                        <svg class="size-6 fill-white" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.5 9.125C8.39746 9.125 9.125 8.39746 9.125 7.5C9.125 6.60254 8.39746 5.875 7.5 5.875C6.60254 5.875 5.875 6.60254 5.875 7.5C5.875 8.39746 6.60254 9.125 7.5 9.125ZM7.5 10.125C8.94975 10.125 10.125 8.94975 10.125 7.5C10.125 6.05025 8.94975 4.875 7.5 4.875C6.05025 4.875 4.875 6.05025 4.875 7.5C4.875 8.94975 6.05025 10.125 7.5 10.125Z" />
                        </svg>

                        <span>Project List</span>
                    </div>


                </a>
                {{-- <a href="{{ route('admin.project.division') }}"
                    class=" flex gap-2 items-center justify-between  w-full   px-5 py-3 {{ request()->routeIs('admin.project.division') ? 'w-full border-main font-bold' : 'w-fullborder-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
                    <div class="flex items-center gap-2">
                        <svg class="size-6 fill-white" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.5 9.125C8.39746 9.125 9.125 8.39746 9.125 7.5C9.125 6.60254 8.39746 5.875 7.5 5.875C6.60254 5.875 5.875 6.60254 5.875 7.5C5.875 8.39746 6.60254 9.125 7.5 9.125ZM7.5 10.125C8.94975 10.125 10.125 8.94975 10.125 7.5C10.125 6.05025 8.94975 4.875 7.5 4.875C6.05025 4.875 4.875 6.05025 4.875 7.5C4.875 8.94975 6.05025 10.125 7.5 10.125Z" />
                        </svg>

                        <span>Project Divisions</span>
                    </div>


                </a> --}}
                <a href="{{ route('admin.project.team') }}"
                class=" flex gap-2 items-center justify-between  w-full   px-5 py-3 {{ request()->routeIs('admin.project.team') ? 'w-full border-main font-bold' : 'w-fullborder-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
                <div class="flex items-center gap-2">
                    <svg class="size-6 fill-white" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.5 9.125C8.39746 9.125 9.125 8.39746 9.125 7.5C9.125 6.60254 8.39746 5.875 7.5 5.875C6.60254 5.875 5.875 6.60254 5.875 7.5C5.875 8.39746 6.60254 9.125 7.5 9.125ZM7.5 10.125C8.94975 10.125 10.125 8.94975 10.125 7.5C10.125 6.05025 8.94975 4.875 7.5 4.875C6.05025 4.875 4.875 6.05025 4.875 7.5C4.875 8.94975 6.05025 10.125 7.5 10.125Z" />
                    </svg>

                    <span>Team</span>
                </div>


            </a>
            </div>
            <a href="{{ route('admin.feedback') }}"
            class=" flex gap-2 item-center  px-5 py-3 border-l-4 {{ request()->routeIs('admin.feedback') ? 'border-l-4 border-main font-bold bg-black/40' : 'border-l-4 border-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>

            <span>Feedback</span>
        </a>
        </div>
    </aside>
</div>
