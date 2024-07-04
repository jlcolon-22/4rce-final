<div x-data="{aside: true}">
    <div class="flex">
        @include('components.layouts.admin.aside')
        <main class="w-full max-h-[100svh] px-4 md:px-10 pb-10">
            {{-- top nav --}}
            @include('components.layouts.admin.topnav')

            {{-- main content --}}
            <section class="max-h-[84svh] overflow-y-auto scrollContent">
                {{-- cards --}}
                <div class="mt-8">
                    @livewire(\App\Livewire\AdminWidget::class)
                </div>

                <div class="mt-10">
                    {{ $this->table }}
                </div>
            </section>
        </main>
    </div>
</div>
