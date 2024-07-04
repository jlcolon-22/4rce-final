<div>

    @include('components.layouts.client.header')
    <div x-data="main" class="mt-[114px]">
        <section class=" bg-ylw relative overflow-hidden z-0 w-full ">
            <div class=" w-full  z-20 flex justify-center px-5 lg:px-0">
                <div class="bg-dark max-w-screen-lg mx-auto   rounded p-8 h-fit my-20 z-20">
                    <div class="flex justify-center pb-16">
                        <h1 class="text-3xl text-center border-b-4 border-ylw w-fit text-ylw font-semibold">
                            Frequently Asked Questions (FAQs)</h1>
                    </div>
                    <!-- question -->
                    <div class="grid grid-cols-1 gap-y-2">
                        <div class="grid grid-cols-1 gap-y-2">
                            <div class="border-l-4 py-3 pl-3 border-ylw">
                                <p class="text-ylw text-lg">Q: How to estimate?</p>
                            </div>
                            <div class="border-l-4 py-3 pl-3 border-[#ffffff]">
                                <p class="text-[#ffffff] text-lg">A: Click the “Estimate” button on the front page
                                    of our website, choose your desired size (square meter), design/finish then
                                    click on estimate button below to find the total estimation of your project.</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-y-2">
                            <div class="border-l-4 py-3 pl-3 border-ylw">
                                <p class="text-ylw text-lg">Q: How to check the status of my project?</p>
                            </div>
                            <div class="border-l-4 py-3 pl-3 border-[#ffffff]">
                                <p class="text-[#ffffff] text-lg">A: You can check the status of your project by
                                    logging in to your account and clicking on projects tab.
                                    </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-y-2">
                            <div class="border-l-4 py-3 pl-3 border-ylw">
                                <p class="text-ylw text-lg">Q: How to register an account?</p>
                            </div>
                            <div class="border-l-4 py-3 pl-3 border-[#ffffff]">
                                <p class="text-[#ffffff] text-lg">A: To register an account, click the login button
                                    on the front page. In the login page, click the “Create an account”, fill up the
                                    needed information then you’re done!.</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-y-2">
                            <div class="border-l-4 py-3 pl-3 border-ylw">
                                <p class="text-ylw text-lg">Q: How long does it take to get my project done?</p>
                            </div>
                            <div class="border-l-4 py-3 pl-3 border-[#ffffff]">
                                <p class="text-[#ffffff] text-lg">A: The time may vary depending on the size of the
                                    project. There will be deadlines for projects but the time between the start
                                    date and deadline will depend on the projects itself.</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-y-2">
                            <div class="border-l-4 py-3 pl-3 border-ylw">
                                <p class="text-ylw text-lg">Q: Do I need an appointment to begin my desired project?
                                </p>
                            </div>
                            <div class="border-l-4 py-3 pl-3 border-[#ffffff]">
                                <p class="text-[#ffffff] text-lg">A: After you estimate, the company will contact
                                    you as soon as they can so make sure to put the right information when
                                    registering an account!</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-y-2">
                            <div class="border-l-4 py-3 pl-3 border-ylw">
                                <p class="text-ylw text-lg">Q: Can I contact you directly without estimating?</p>
                            </div>
                            <div class="border-l-4 py-3 pl-3 border-[#ffffff]">
                                <p class="text-[#ffffff] text-lg">A: You can contact us by going to contact us page.
                                    To do that, click the “Contact us” on the top right corner of the front page.
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-y-2">
                            <div class="border-l-4 py-3 pl-3 border-ylw">
                                <p class="text-ylw text-lg">Q: How do I cancel my project?</p>
                            </div>
                            <div class="border-l-4 py-3 pl-3 border-[#ffffff]">
                                <p class="text-[#ffffff] text-lg">A: To cancel your project, it’s best to contact
                                    the company directly.</p>
                            </div>
                        </div>
                        <!-- <div class="grid grid-cols-1 gap-y-2">
                        <div class="border-l-4 py-3 pl-3 border-ylw">
                            <p class="text-ylw text-lg">Q: What do I need to estimate?</p>
                        </div>
                        <div class="border-l-4 py-3 pl-3 border-[#ffffff]">
                            <p class="text-[#ffffff] text-lg">A: You can either estimate first then create an account later on or create an account first then estimate your desired project to save it.</p>
                        </div>
                    </div> -->
                        <!-- <div class="grid grid-cols-1 gap-y-2">
                            <div class="border-l-4 py-3 pl-3 border-ylw">
                                <p class="text-ylw text-lg">Q: How do I go to your website using smartphone?</p>
                            </div>
                            <div class="border-l-4 py-3 pl-3 border-[#ffffff]">
                                <p class="text-[#ffffff] text-lg">A: It is the same as in computer, just type
                                    “4rce+builders . com” on any web browser on your phone.</p>
                            </div>
                        </div> -->
                        <!-- <div class="grid grid-cols-1 gap-y-2">
                        <div class="border-l-4 py-3 pl-3 border-ylw">
                            <p class="text-ylw text-lg">Q: How do I cancel my project?</p>
                        </div>
                        <div class="border-l-4 py-3 pl-3 border-[#ffffff]">
                            <p class="text-[#ffffff] text-lg">A: To cancel your project, it’s best to contact the company directly.</p>
                        </div>
                    </div> -->

                    </div>
                </div>
            </div>
            <img src="/assets/faqs_bg.png"
                class="object-cover object-left-top absolute top-0 z-10 h-full w-full opacity-50" alt="">
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
