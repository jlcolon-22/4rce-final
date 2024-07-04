<div>

    @include('components.layouts.client.header')
    <div x-data="main" class="mt-[114px]">
        <section class="min-h-[calc(98svh-110px)] bg-dark relative overflow-hidden z-0 w-full  ">
            <div class="bg-ylw h-[500px] z-0 relative">
                <div class=" absolute w-full h-full">
                    <div class="relative h-full p-10   grid grid-cols-1 md:grid-cols-2">


                        <div class="space-y-10">
                            <h1 class="text-3xl text-dark font-semibold ">About Us</h1>
                            <p class="text-5xl font-semibold">REINFORCING COMFORT WITH AN EDGE</p>
                            <p class=" text-[#1E1E1E] text-base sm:text-xl mt-2">
                                We are happy to serve and help you in making your dreamhouse turn into reality that
                                is built with quality and efficiency, providing the best comfort and safety that's
                                worth your budget.
                            </p>
                        </div>
                        <div class="hidden md:flex justify-center">
                            <div class=" w-[20rem] h-[20rem]  relative">
                            <img src="/logo.jpg" class="border-[12px] border-dark" alt="">

                        </div>
                        </div>
                        <!-- <img src="/projects/2.jpg"
                        class="absolute rounded shadow w-[650px] -bottom-[190px] left-1/2 -translate-x-1/2 h-[400px] object-cover "
                        alt=""> -->
                    </div>
                </div>

                <img src="/assets/about_bg.png" class="w-full h-[500px] opacity-10" alt="">
            </div>

            <div class=" py-[5rem] max-w-screen-xl mx-auto px-10">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="space-y-10">
                        <h1 class="text-white text-4xl font-bold">WE HELP BUILD YOUR DREAMS.</h1>
                        <p class="text-[#FFFFFF]">
                            The 4RCE + Builders Corporation is founded by a team of young civil engineers: Paolo Antazo, Royd Napuli, Jezreel Manacsa and Celso Manacsa who specialize in different areas, from designing to managing construction. They do improvements by renovations of existing structure and they also build a high rise condominium and commercial complex.
                        </p>
                    </div>
                    <div class="justify-center hidden md:flex py-[5rem]">

                        <div class=" min-w-[20rem] min-h-[20rem] max-w-[20rem] max-h-[20rem] border border-ylw relative">
                            <img src="/assets/Rectangle5.png" class="border-[12px] w-[13rem] h-[13rem] absolute -top-[6rem] -left-[6rem] border-dark" alt="">
                            <img src="/assets/Rectangle6.png" class="border-[12px] w-[13rem] h-[13rem] absolute -top-[6rem] -right-[6rem] border-dark" alt="">
                            <img id="bottom" src="/assets/Rectangle7.png" class="border-[12px] w-[13rem] h-[13rem] absolute translate-x-[28%] -bottom-[6rem]  border-dark" alt="">
                        </div>
                    </div>
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
