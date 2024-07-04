<div>

    @include('components.layouts.client.header')
    <div x-data="main" class="mt-[114px]">
        <section
            class="min-h-[calc(98svh-110px)] relative overflow-hidden z-0 max-w-screen-lg mx-auto  px-10 lg:px-0  py-16">
            <div class="flex gap-2">
                <button
                    class="px-4 py-1.5 bg-lightYellow rounded hover:bg-lightYellow transition-all ease-in-out">All</button>
                <!-- <button class="px-4 py-1.5  rounded hover:bg-lightYellow transition-all ease-in-out">Construct</button>
                <button class="px-4 py-1.5  rounded hover:bg-lightYellow transition-all ease-in-out">Elevate</button>
                <button class="px-4 py-1.5  rounded hover:bg-lightYellow transition-all ease-in-out">Renovate</button> -->
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 py-10" ref="projects">

                @foreach ($projects as $project)
                    <div class=" bg-[#ffffff] shadow-md border overflow-hidden flex flex-col rounded ">
                        <div class="max-h-[350px] overflow-hidden relative">

                           @if (!!$project->final_image)
                           <img src="{{ asset('storage/'. $project->final_image) }}"
                           class="object-cover  w-full rounded-t h-[30rem] " alt="">
                           @else
                           <img src="{{ asset('images/project_preview.jpg') }}"
                           class="object-cover object-left-top w-full rounded-t" alt="">
                           @endif
                            <!-- class="absolute left-0 bottom-0"  -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-0 bottom-0"
                                viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,288L80,266.7C160,245,320,203,480,197.3C640,192,800,224,960,234.7C1120,245,1280,235,1360,229.3L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="px-4">
                            <h1 class="font-bold">Johnloyd</h1>
                            <div class="px-2 line-clamp-4">
                                <div v-html="value.description"></div>
                            </div>
                        </div>

                        <div class="px-2 py-2 flex justify-between items-end">
                            <small class="text-gray-600">2020-20-10</small>
                            <a href="{{ route('client.project.view', ['id' => $project?->id]) }}"
                                class=" px-4 rounded py-1 text-blue-500 border border-blue-500 text-sm hover:bg-blue-500 hover:text-gray-50 cursor-pointer transition-all ease-in-out">view</a>
                        </div>
                    </div>
                @endforeach
            </div>
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
