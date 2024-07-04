<div x-data="{ aside: true }">
    <div class="flex">
        @include('components.layouts.admin.aside')
        <main class="w-full max-h-[100svh] px-4 md:px-10 pb-10">
            {{-- top nav --}}
            @include('components.layouts.admin.topnav')

            {{-- main content --}}
            <section class="max-h-[84svh] overflow-y-auto scrollContent">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a href="{{ route('admin.dashboard') }}" class="text-blue-600">Dashboard</a></li>
                        <li>Project Management</li>
                        <li>Project List</li>
                    </ul>
                </div>
                <div class="mt-8 flex gap-2">
                    {{-- {{ $this->table }} --}}
                    <div class="min-w-[20rem] max-w-[20rem] h-fit bg-white rounded-md p-2 space-y-1">
                       @if (!!$projectInfo?->final_image)
                       <img src="{{ asset('/storage/'.$projectInfo?->final_image) }}" class="h-[14rem] w-full border" alt="">
                       @else
                       <img src="{{ asset('images/project_preview.jpg') }}" class="h-[14rem] w-full border" alt="">
                       @endif
                        {{ $this->modalFormAction }}
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
