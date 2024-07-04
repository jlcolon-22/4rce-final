<div x-data="{ aside: true }">
    <div class="flex">
        <div class="relative" wire:ignore>
            <aside x-cloak x-transition class="bg-[#072D44] min-w-[230px] sm:min-w-[270px] max-w-[230px] sm:max-w-[270px] min-h-[100svh] text-white " :class="aside ? 'hidden lg:block'  : 'block fixed top-0 left-0 z-50 lg:hidden'">
                <div class="h-[5rem] flex items-center justify-center">
                    <h1 class="text-main font-extrabold text-2xl text-center">EMPLOYEE PANEL</h1>
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
                    <a href="{{ route('employee.home') }}"
                        class=" flex gap-2 item-center  px-5 py-3 {{ request()->routeIs('employee.home') ? 'border-l-4 border-main font-bold bg-black/40' : 'border-l-4 border-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('employee.logout') }}"
                        class=" flex gap-2 item-center  px-5 py-3 {{ request()->routeIs('admin.employee.account') ? 'border-l-4 border-main font-bold bg-black/40' : 'border-l-4 border-[#072D44] hover:bg-black/40 hover:border-black/40 opacity-70' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                          </svg>

                        <span>Logout</span>
                    </a>


                </div>
            </aside>
        </div>
        <main class="w-full max-h-[100svh] px-4 md:px-10 pb-10">
            {{-- top nav --}}
            <div class="flex justify-between items-center py-4 mt-2">
                <button x-on:click="aside = !aside">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                </button>


            </div>


            {{-- main content --}}
            <section class="max-h-[84svh] overflow-y-auto scrollContent">

                <div class="mt-8 flex gap-2">
                    {{-- {{ $this->table }} --}}
                    <div class="min-w-[20rem] max-w-[20rem] h-fit bg-white rounded-md p-2 space-y-1">
                        @if (!!$projectInfo?->final_image)
                           <img src="{{ asset('/storage/'.$projectInfo?->final_image) }}" class="h-[14rem] w-full border" alt="">
                           @else
                           <img src="{{ asset('images/project_preview.jpg') }}" class="h-[14rem] w-full border" alt="">
                           @endif
                        <div class="flex gap-2">
                            <h2 class="font-bold">Project Name:</h2>
                            <span>{{ $projectInfo->project_name }}</span>
                        </div>
                        <div class="flex gap-2">
                            <h2 class="font-bold">Start Date:</h2>
                            <span>{{ $projectInfo->start_date }}</span>
                        </div>
                        <div class="flex gap-2">
                            <h2 class="font-bold">Deadline:</h2>
                            <span>{{ $projectInfo->deadline }}</span>
                        </div>
                        <div class="flex gap-2">
                            <h2 class="font-bold">Location:</h2>
                            <span>{{ $projectInfo->project_location }}</span>
                        </div>
                        <div class="flex gap-2">
                            <h2 class="font-bold">Project Cost:</h2>
                            <span>{{ $projectInfo->cost }}</span>
                        </div>
                        <div class="flex gap-2">
                            <h2 class="font-bold">Client:</h2>
                            <span>{{ $projectInfo->customerInfo?->fullname }}/{{ $projectInfo->customerInfo?->email }}</span>
                        </div>
                        <div class="flex gap-2">
                            <h2 class="font-bold">Proposed project:</h2>
                            <span>{{ $projectInfo->proposed_project }}</span>
                        </div>
                        <div class="flex gap-2">
                            <h2 class="font-bold">Project Status:</h2>
                            <span>{{ $projectInfo->status }}</span>
                        </div>
                    </div>
                    <div class="w-full  space-y-2">

                       <div >
                        {{-- @livewire(\App\Livewire\Admin\Project\Chart::class,['data'=>$projectInfo->divisions]) --}}
                       </div>
                       {{ $this->table }}
                    </div>

                </div>
            </section>
        </main>
    </div>
  {{-- <x-filament-actions::modals /> --}}
    @livewire('notifications')


</div>
