<div>

    @include('components.layouts.client.header')
    <div x-data="main" class="mt-[114px]">
        <section  class="min-h-[calc(98svh-110px)] bg-gray-600 relative overflow-hidden z-0 w-full px-[30px] ">


            <div class="" ref="projects">
                  <div  class="bg-ylw opacity-100 mx-auto w-[90%] overflow-hidden relative h-auto px-10">
                      <div class="bg-dark z-60 py-10 px-20 ">
<div class="grid grid-cols-1 gap-10 ">
                      <div class="border-[2px] rounded z-20">

                        @if (!!$project?->final_image)
                             <img src="{{ asset('storage/'.$project->final_image) }}"  class="w-full h-[600px] rounded"  alt="">
                        @else
                        <img   src="{{ asset('assets/preview.png') }}" class="w-full h-[600px] rounded"  alt="">
                        @endif
                        {{-- <img src="{{ asset('assets/preview.png') }}"  class="w-[100px]  mx-auto h-[600px] rounded"  alt=""> --}}
                      </div>
                  <div class="grid gap-y-8 h-fit z-20 ">
                      <h1 class="font-sans text-gray-50 font-medium flex gap-x-3 text-base">Project Name: <span class="text-base  font-semibold ">{{ $project?->project_name }}</span></h1>
                      <h1 class="font-sans text-gray-50 font-medium flex gap-x-3 text-base">Project Type: <span class="text-base  font-semibold ">{{ $project?->proposed_project }}</span></h1>
                      <h1 class="font-sans text-gray-50 font-medium flex gap-x-3 text-base">Status: <span class="text-base  font-semibold ">{{$project?->status  }}</span></h1>
                      <h1 class="font-sans text-gray-50 font-medium flex gap-x-3 text-base">Cost: <span class="text-base  font-semibold ">₱ {{ $project?->cost }}</span></h1>
                      <h1 class="font-sans text-gray-50 font-medium flex gap-x-3 text-base">Start Date: <span class="text-base  font-semibold ">{{ $project?->start_date }}</span></h1>
                      <h1 class="font-sans text-gray-50 font-medium flex gap-x-3 text-base">Deadline: <span class="text-base  font-semibold ">{{ $project?->deadline }}</span></h1>
                      <h1 class="font-sans text-gray-50 font-medium flex gap-x-3 text-base">Location: <span class="text-base  font-semibold ">{{ $project?->project_location }}</span></h1>
                  </div>
                  </div>
                  <div class="py-10">
                    <small class="text-gray-300">description </small>
                      <div class="px-5 py-6 text-white">
                        {{-- <span x-html="" class="text-white py-10 "> --}}
                            {!! $project?->description !!}
                      </span>
                      </div>
                  </div>
                      </div>
                      <img src="/assets/construct.jpg" class="object-cover z-0 absolute opacity-10 top-0 left-0 h-full w-full" alt="">
                  </div>

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
