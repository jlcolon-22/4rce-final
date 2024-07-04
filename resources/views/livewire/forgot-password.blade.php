<div>

    @include('components.layouts.client.header')
    @livewire('notifications')

    <div x-data="main" class="mt-[114px]">
        <section class="  relative overflow-hidden   z-0 w-full">
            <div class="min-h-[40rem] bg-gray-100 flex items-center justify-center w-full">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8  max-w-md w-full">
                    <h1 class="text-center text-2xl font-bold mb-6">Forgot Password</h1>
                    <form wire:submit.prevent="checkEmail">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="email">
                                Email Address
                            </label>
                            <input wire:model="email"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="email" type="email" placeholder="Enter your email address" />
                        </div>
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                            type="submit">
                           <span wire:loading.remove wire:target="checkEmail"> Reset Password</span>
                           <span wire:loading wire:target="checkEmail">Loading...</span>
                        </button>
                    </form>
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
