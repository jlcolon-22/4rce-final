<div x-data="{ aside: true }">
    <div class="flex max-w-[100swh] overflow-hidden">
        @include('components.layouts.admin.aside')
        <main class="w-full lg:min-w-[calc(100svw-270px)] lg:max-w-[calc(100svw-270px)] max-h-[100svh] px-4 md:px-10 pb-10">
            {{-- top nav --}}
            @include('components.layouts.admin.topnav')

            {{-- main content --}}
            <section class="max-h-[84svh]  overflow-y-auto scrollContent">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a href="{{ route('admin.dashboard') }}" class="text-blue-600">Dashboard</a></li>
                        <li>Project Management</li>
                        <li>Inventory</li>
                    </ul>
                </div>
                <div class="mt-8  ">
                    {{ $this->table }}
                </div>
            </section>
        </main>
    </div>
  {{-- <x-filament-actions::modals /> --}}
    @livewire('notifications')


</div>
