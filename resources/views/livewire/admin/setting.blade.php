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

                        <li>Setting</li>
                    </ul>
                </div>
                <form wire:submit.prevent='updateAdmin' class="mt-8">
                    <x-filament::section>
                        <x-slot name="heading">
                            Basic Information
                        </x-slot>
                        <div>
                            <label for="">Name</label>
                            <x-filament::input.wrapper>
                                <x-filament::input type="text" wire:model="name" required />
                            </x-filament::input.wrapper>
                        </div>
                        <div>
                            <label for="">email</label>
                            <x-filament::input.wrapper>
                                <x-filament::input type="text" wire:model="email" required />
                            </x-filament::input.wrapper>
                        </div>
                        <div>
                            <label for="">Password</label>
                            <x-filament::input.wrapper>
                                <x-filament::input type="password" wire:model="password" />
                            </x-filament::input.wrapper>
                        </div>
                        <div class="w-full">
                            <x-filament::button type="submit" color="success" class="w-full mt-4">
                                Update
                            </x-filament::button>
                        </div>
                        {{-- Content --}}
                    </x-filament::section>
                    {{-- {{ $this->table }} --}}
                </form>
            </section>
        </main>
    </div>
    {{-- <x-filament-actions::modals /> --}}
    @livewire('notifications')


</div>
