<div>

    @include('components.layouts.client.header')
    <div x-data="main" class="mt-[114px]">
        <section ref="top" class="flex  relative overflow-hidden z-0 w-full">
            <div class="w-full bg-ylw -z-10  py-28">

                <div class="bg-dark min-w-[1000px]  h-fit max-w-[1000px] mx-auto relative  rounded    ">
                    <img src="/assets/faqs_bg.png" class="object-cover absolute top-0 left-0 h-full w-full z-0 opacity-20"
                        alt="">
                    <small class="absolute top-3 right-3 text-blue-300 text-lg font-semibold">#<span
                            x-text="page"></span></small>
                    <div class=" w-full h-full pt-10 pb-32 px-10 z-50">
                        <h1 class=" text-4xl font-semibold text-ylw text-center ">Construction Cost Estimator</h1>

                        <div  class=" z-40  grid gap-y-5 pt-7  w-full">
                            <!--question container-->
                            <section x-show="page == 1">
                                <div class="grid grid-cols-1 gap-y-2 z-30">
                                    <label for="" class="text-ylw font-medium z-30 ">1. AREA PER FLOOR
                                        (SQM)</label>
                                    <input type="number" x-model="qzOne"
                                        class="px-3 z-30 w-[400px] py-2 rounded outline-none bg-white" placeholder="0">
                                </div>
                                <div class="grid grid-cols-1 mt-5">
                                    <label for="" class="text-ylw font-medium z-30">2. TYPE OF FINISH</label>
                                    <div class="p-4 grid grid-cols-3 gap-20">
                                        <div class="flex flex-col justify-center items-center">
                                            <h1 class="text-ylw z-30">Bare Finished</h1>
                                            <input type="radio" x-model="qzTwo" id="bare" value="0"
                                                class="peer z-30 hidden">
                                            <img src="https://www.arcgo-ph.com/wp-content/uploads/2022/12/Rough-or-Bare-Finish-house-cost-example.png"
                                                class="peer-checked:ring-4 ring-blue-500 z-30 rounded my-1 h-[200px] w-[300px]"
                                                alt="">
                                            <label for="bare"
                                                class="px-3 py-2 text-white bg-blue-500 text-sm mt-2 peer-checked:bg-green-500 z-30">Select</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-center">
                                            <h1 class="text-ylw z-30">Standard Finished</h1>
                                            <input type="radio" id="standard" x-model="qzTwo" value="1"
                                                class="peer hidden">
                                            <img src="https://www.arcgo-ph.com/wp-content/uploads/2022/12/Standard-Finish-house.jpg"
                                                class="peer-checked:ring-4 z-30  ring-blue-500 rounded my-1 h-[200px] w-[300px]"
                                                alt="">
                                            <label for="standard"
                                                class="px-3 py-2 z-30 text-white bg-blue-500 text-sm mt-2 peer-checked:bg-green-500">Select</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-center">
                                            <h1 class="text-ylw z-30">Luxury Finished</h1>
                                            <input type="radio" id="luxury" x-model="qzTwo" value="2"
                                                class="peer hidden">
                                            <img src="https://www.arcgo-ph.com/wp-content/uploads/2022/12/Semi-Elegant-Finish-house-interior.png"
                                                class="peer-checked:ring-4  z-30 ring-blue-500 rounded my-1 h-[200px] w-[300px]"
                                                alt="">
                                            <label for="luxury"
                                                class="px-3 py-2 z-30 text-white bg-blue-500 text-sm mt-2 peer-checked:bg-green-500">Select</label>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section x-show="page == 2">

                                <div class="grid grid-cols-1">
                                    <label for="" class="text-ylw font-medium z-30">3. Number of Floors</label>
                                    <div class="p-4 grid grid-cols-3 gap-20">
                                        <div class="flex flex-col justify-center items-center">
                                            <h1 class="text-ylw z-30">1 Floor</h1>
                                            <input type="radio" x-model="qzThree" id="floor1" value="1"
                                                class="peer hidden">
                                            <img src="/estimates/house_1.jpg"
                                                class="peer-checked:ring-4 z-30 ring-blue-500 rounded my-1 h-[200px] w-[300px]"
                                                alt="">
                                            <label for="floor1"
                                                class="px-3 py-2 z-30 text-white bg-blue-500 text-sm mt-2 peer-checked:bg-green-500">Select</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-center">
                                            <h1 class="text-ylw z-30">2 Floor</h1>
                                            <input type="radio" id="floor2" x-model="qzThree" value="2"
                                                class="peer hidden">
                                            <img src="/estimates/house_2.jpg"
                                                class="peer-checked:ring-4 z-30  ring-blue-500 rounded my-1 h-[200px] w-[300px]"
                                                alt="">
                                            <label for="floor2"
                                                class="px-3 py-2 text-white z-30 bg-blue-500 text-sm mt-2 peer-checked:bg-green-500">Select</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-center">
                                            <h1 class="text-ylw z-30">3 Floor</h1>
                                            <input type="radio" id="floor3" x-model="qzThree" value="3"
                                                class="peer hidden">
                                            <img src="/estimates/house_3.jpg"
                                                class="peer-checked:ring-4  z-30 ring-blue-500 rounded my-1 h-[200px] w-[300px]"
                                                alt="">
                                            <label for="floor3"
                                                class="px-3 py-2 text-white z-30 bg-blue-500 text-sm mt-2 peer-checked:bg-green-500">Select</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-y-2  mt-5">
                                    <label for="" class="text-ylw font-medium z-30 ">4. How many Custom
                                        Bathrooms in your home?</label>
                                    <input type="number" x-model="qzFour"
                                        class="px-3 z-30 w-[400px] py-2 rounded outline-none bg-white"
                                        placeholder="0">
                                </div>
                            </section>
                            <section x-show="page == 3">

                                <div class="grid grid-cols-1">
                                    <label for="" class="text-ylw font-medium z-30">5. Floor type</label>
                                    <div class="p-4 grid grid-cols-3 gap-20">
                                        <div class="flex flex-col justify-center items-center">
                                            <h1 class="text-ylw z-30">Wood</h1>
                                            <input type="radio" x-model="qzFive" id="floorType1" value="1"
                                                class="peer hidden">
                                            <img src="/estimates/floor_2.jpg"
                                                class="peer-checked:ring-4 z-30 ring-blue-500 rounded my-1 h-[200px] w-[300px]"
                                                alt="">
                                            <label for="floorType1"
                                                class="px-3 py-2 z-30 text-white bg-blue-500 text-sm mt-2 peer-checked:bg-green-500">Select</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-center">
                                            <h1 class="text-ylw z-30">Tiles</h1>
                                            <input type="radio" id="floorType2" x-model="qzFive" value="2"
                                                class="peer hidden">
                                            <img src="/estimates/floor_1.jpg"
                                                class="peer-checked:ring-4 z-30  ring-blue-500 rounded my-1 h-[200px] w-[300px]"
                                                alt="">
                                            <label for="floorType2"
                                                class="px-3 py-2 text-white z-30 bg-blue-500 text-sm mt-2 peer-checked:bg-green-500">Select</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-center">
                                            <h1 class="text-ylw z-30">Marble</h1>
                                            <input type="radio" id="floorType3" x-model="qzFive" value="3"
                                                class="peer hidden">
                                            <img src="/estimates/floor_3.jpg"
                                                class="peer-checked:ring-4  z-30 ring-blue-500 rounded my-1 h-[200px] w-[300px]"
                                                alt="">
                                            <label for="floorType3"
                                                class="px-3 py-2 text-white z-30 bg-blue-500 text-sm mt-2 peer-checked:bg-green-500">Select</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="grid grid-cols-1 mt-5">
                                      <label for="" class="text-ylw font-medium z-30">3. Number of Floors</label>
                                      <div class="p-4 grid grid-cols-3 gap-20">
                                        <div class="flex flex-col justify-center items-center">
                                          <h1 class="text-ylw z-30">1 Floor</h1>
                                          <input type="radio" x-model="qzThree" id="floor1" value="1" class="peer hidden">
                                          <img src="/estimates/house_1.jpg"
                                               class="peer-checked:ring-4 z-30 ring-blue-500 rounded my-1 h-[200px] w-[300px]"
                                               alt="">
                                          <label for="floor1"
                                                 class="px-3 py-2 z-30 text-white bg-blue-500 text-sm mt-2 peer-checked:bg-green-500">Select</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-center">
                                          <h1 class="text-ylw z-30">2 Floor</h1>
                                          <input type="radio" id="floor2"  x-model="qzThree" value="2" class="peer hidden">
                                          <img src="/estimates/house_2.jpg"
                                               class="peer-checked:ring-4 z-30  ring-blue-500 rounded my-1 h-[200px] w-[300px]"
                                               alt="">
                                          <label for="floor2"
                                                 class="px-3 py-2 text-white z-30 bg-blue-500 text-sm mt-2 peer-checked:bg-green-500">Select</label>
                                        </div>
                                        <div class="flex flex-col justify-center items-center">
                                          <h1 class="text-ylw z-30">3 Floor</h1>
                                          <input type="radio" id="floor3"  x-model="qzThree" value="3" class="peer hidden">
                                          <img src="/estimates/house_3.jpg"
                                               class="peer-checked:ring-4  z-30 ring-blue-500 rounded my-1 h-[200px] w-[300px]"
                                               alt="">
                                          <label for="floor3"
                                                 class="px-3 py-2 text-white z-30 bg-blue-500 text-sm mt-2 peer-checked:bg-green-500">Select</label>
                                        </div>
                                      </div>
                                    </div> -->

                            </section>
                            <!--button-->
                            <div class="grid grid-cols-2 items-center absolute bottom-10  left-0 w-full px-10">

                                <div class="flex gap-x-3 items-center">
                                    <button :disabled="page == 1" :class="page == 1 ? 'opacity-50' : ''"
                                        x-on:click="prev"
                                        class="px-5  py-2  outline-none bg-ylw  text-white text-sm">prev</button>

                                    <button :disabled="page == 3" :class="page == 3 ? 'hidden' : ''" x-on:click="next"
                                        class="px-5  py-2  outline-none bg-blue-500  text-white text-sm">next</button>
                                </div>
                                <div>
                                    <h3 class="flex justify-end items-center whitespace-nowrap text-ylw gap-x-3"> TOTAL
                                        ESTIMATED PROJECT COST: <input type="text"
                                            class="px-3 py-2 bg-gray-300 rounded font-bold w-[150px] text-dark "
                                            disabled :value="'₱' + total"></h3>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div
                        class="bg-ylw  border-l-[40px] border-t-[40px] border-dark absolute -z-10 -top-16 -left-16 min-w-[1000px]  min-h-[700px] max-h-[700px] max-w-[1000px]">

                    </div>

                    <div class="absolute -right-28 top-1/2 -translate-y-1/2">
                        <h2 class="font-extrabold text-7xl text-dark top-0">4 </h2>
                        <h2 class="font-extrabold text-7xl text-dark top-0">R </h2>
                        <h2 class="font-extrabold text-7xl text-dark top-0">C</h2>
                        <h2 class="font-extrabold text-7xl text-dark top-0">E </h2>
                        <h2 class="font-extrabold text-7xl text-dark top-0">+ </h2>
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
            top: null,
            qzOne: 0,
            qzTwo: '',
            qzThree: '',
            qzFour: 1,
            qzFive: '',
            total: 0,
            page: 1,
            withNumber: {
                totalOne: 1,
                totalTwo: 1,
                totalThree: 1,
                totalFour: 1,
                totalFive: 1,
            },
            next() {
                this.page++;

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                })
            },
            prev() {
                this.page--;
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                })
            },
            init() {
                this.$watch('qzOne', (newValue, oldValue) => {
                    this.withNumber.totalOne = newValue * 11232;
                })
                // question two
                this.$watch('qzTwo', (newValue, oldValue) => {
                    if (newValue == 0) {
                        this.withNumber.totalTwo = this.qzOne * 10000;
                    }
                    if (newValue == 1) {
                        this.withNumber.totalTwo = this.qzOne * 14000;
                    }
                    if (newValue == 2) {
                        this.withNumber.totalTwo = this.qzOne * 18000;
                    }
                })
                // question three
                this.$watch('qzThree', (newValue, oldValue) => {
                    this.withNumber.totalThree = newValue;
                })
                // question four
                this.$watch('qzFour', (newValue, oldValue) => {
                    //inputvalues * (persqmCost * standard size of bathroom)
                    this.withNumber.totalFour = newValue * (11232 * 5);
                })
                // question five
                this.$watch('qzFive', (newValue, oldValue) => {
                    if (newValue == 1) {
                        this.withNumber.totalFive = this.qzOne * 1000;
                    }
                    if (newValue == 2) {
                        this.withNumber.totalFive = this.qzOne * 2500;
                    }
                    if (newValue == 3) {
                        this.withNumber.totalFive = this.qzOne * 8000;
                    }
                })

                // total
                this.$watch('withNumber', (newCount, oldCount) => {
                    this.total = newCount.totalOne + newCount.totalTwo + newCount.totalFour + newCount
                        .totalFive;
                    this.total= this.total * newCount.totalThree;
                    this.total = this.total.toLocaleString("en-US")
                })
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
