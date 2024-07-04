<div>

    @include('components.layouts.client.header')
    @livewire('notifications')

    <div x-data="main" class="mt-[114px]">
        <section class="flex  relative overflow-hidden z-0 w-full">
            <div class="hidden xl:block w-full bg-dark relative">
                <img src="/assets/login_left.png" class="object-cover h-full w-full opacity-20" alt="">
                <img src="/logo.jpg"
                    class="absolute z-50 top-1/2  -translate-y-1/2 left-1/2 -translate-x-1/2 w-[160px]" alt="">
            </div>
            <div class="bg-ylw w-full  xl:min-w-[800px] relative z-0 pb-14 ">
                <h1 class="pt-28 text-4xl font-semibold text-ylw text-center">WELCOME BACK!</h1>

                <form wire:submit.prevent="userLogin" class="w-full md:w-[400px] px-5 md:px-0   relative mx-auto grid gap-y-5 pt-7">
                    {{-- <div v-if="error" class="bg-red-400 text-red-800 px-5 py-4 rounded">
                        <strong>Wrong Credentials!</strong>
                    </div> --}}
                    <div class="grid grid-cols-1 ">
                        <label for="" class="text-white font-medium ">Email</label>
                        <input type="text" required wire:model="email"
                            class="px-3 py-2 rounded outline-none bg-white" placeholder="Email address">
                    </div>
                    <div class="grid grid-cols-1">
                        <label for="" class="text-white font-medium ">Password</label>
                        <input type="password" required wire:model="password"
                            class="px-3 py-2 rounded outline-none bg-white" placeholder="***********">
                    </div>
                    <div class="grid grid-cols-1 pt-2">
                        <button wire:loading.remove wire:targe="userLogin" type="submit"
                            class="px-3 py-2 rounded outline-none bg-ylw text-sm">LOGIN</button>
                        <button wire:loading wire:targe="userLogin" class="px-3 py-2 rounded outline-none bg-ylw opacity-90  text-sm"
                            disabled>Loading...</button>
                    </div>
                    <div class="">
                        <a href="{{ route('client.forgot.password') }}" class="float-right text-blue-400">Forgot password?</a>
                    </div>
                    <div class="flex items-center gap-3 justify-between">
                        <hr class="bg-white pt-[.2px] w-full md:w-[170px]"><span class="text-white opacity-70">or</span>
                        <hr class="bg-white pt-[.2px] w-full md:w-[170px]">
                    </div>
                    <div class="flex justify-center">


                        <a href="{{ route('google.redirect') }}"
                            class="bg-red-400 py-2 px-7 flex items-center gap-3 text-sm text-white rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                width="24" height="24" x="0" y="0" viewBox="0 0 512 512"
                                style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path
                                        d="M314.262 288.662c-12.359 82.097-74.152 126.234-153.6 126.234C71.503 414.897 0 345.159 0 256S71.503 97.103 160.662 97.103c43.255 0 81.214 12.359 108.579 38.841l-46.786 46.786c-15.007-15.89-37.076-23.834-61.793-23.834-52.966 0-98.869 44.138-98.869 97.103s45.903 97.103 98.869 97.103c44.138 0 77.683-28.248 87.393-70.621h-89.159V220.69h155.366c1.766 10.593 2.648 23.834 2.648 35.31 0 11.476-.882 22.069-2.648 32.662M512 264.828h-52.966v52.965h-44.137v-52.965h-52.966V220.69h52.966v-52.966h44.137v52.966H512z"
                                        style="" fill="#ffffff" data-original="#d95946" opacity="1" class=""></path>
                                </g>
                            </svg>
                            LOG IN USING GOOGLE
                        </a>
                    </div>
                    <div class="flex items-center justify-center">
                        <span class="text-white">Don’t have an account? <a href="{{ route('client.register') }}"
                                class="text-blue-700">Sign up </a></span>
                    </div>
                    <div
                        class="absolute min-w-[350px] h-[350px] bg-[#072D44] opacity-90 -z-10 -top-32 -left-28 rounded-full">
                    </div>
                    <div
                        class="absolute min-w-[350px] h-[350px] bg-[#072D44] opacity-90 -z-10 -top-24 -right-16 rounded-full">
                    </div>
                    <div
                        class="absolute min-w-[300px] h-[300px] bg-[#072D44] opacity-90 -z-10 bottom-9 -right-10 rounded-full">
                    </div>
                    <div
                        class="absolute min-w-[250px] h-[250px] bg-[#072D44] opacity-90 -z-10 bottom-7 -left-10 rounded-full">
                    </div>
                </form>
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
