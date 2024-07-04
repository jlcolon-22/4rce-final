<div>

    @include('components.layouts.client.header')
    @livewire('notifications')
    <div x-data="main" class="mt-[114px]">
        <section
        class="min-h-[calc(98svh-110px)] relative overflow-hidden z-0 max-w-screen-lg mx-auto  px-10 lg:px-0  py-16">

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
        </section>

        @include('components.layouts.client.footer')
    </div>
</div>
@script
    <script>
        Alpine.data('main', () => ({
            open: false,
            swiper: null,

            toggle() {
                this.open = !this.open
            },
            init() {
                this.swiper = new Swiper(this.$refs.container, {
                    // Optional parameters
                    // Optional parameters

                    direction: 'horizontal', // or 'vertical'
                    loop: true, // enable loop mode
                    slidesPerView: 1, // number of slides per view
                    spaceBetween: 30, // space between slides
                    pagination: {
                        el: '.swiper-pagination', // pagination element
                        clickable: true, // enable pagination clicks
                    },
                    navigation: {
                        nextEl: '.swiper-button-next', // next button element
                        prevEl: '.swiper-button-prev', // previous button element
                    },
                    keyboard: {
                        enabled: true,

                    },
                });
                this.swiper.on('slideChange', () => {
                    console.log('Slide changed!');
                });
            }
        }))
    </script>
@endscript
