<div>
    {{-- <div class="fixed top-0 left-0 min-w-full min-h-[30svh] bg-gradient-to-r from-[#f4d941] to-[#ec8235] -z-10">

    </div> --}}

    <form wire:submit.prevent="login" class="bg-white max-w-md mx-auto px-5 pb-10 rounded-md mt-[20svh] border">
        <div class="py-10">
            <h1 class=" text-center font-bold text-4xl">ADMIN LOGIN</h1>
        </div>
        <div class="space-y-5">
            <div>
                <label class="input input-bordered flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="w-4 h-4 opacity-70">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                    </svg>
                    <input type="email" class="grow main-input" wire:model='email' placeholder="Username" />

                </label>
                @error('email')
                    <small class="text-red-500 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                          </svg>


                        {{ $message }}</small>
                @enderror
            </div>
            <div>
                <label class="input input-bordered flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M15.75 1.5a6.75 6.75 0 0 0-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 0 0-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 0 0 .75-.75v-1.5h1.5A.75.75 0 0 0 9 19.5V18h1.5a.75.75 0 0 0 .53-.22l2.658-2.658c.19-.189.517-.288.906-.22A6.75 6.75 0 1 0 15.75 1.5Zm0 3a.75.75 0 0 0 0 1.5A2.25 2.25 0 0 1 18 8.25a.75.75 0 0 0 1.5 0 3.75 3.75 0 0 0-3.75-3.75Z"
                            clip-rule="evenodd" />
                    </svg>

                    <input type="password" class="grow main-input" wire:model='password' placeholder="Password" />
                </label>

                @error('password')
                <small class="text-red-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                      </svg>

                    {{ $message }}</small>
                @enderror
            </div>


            <button class="btn bg-main border-none w-full hover:bg-main/85 ">Login</button>
        </div>
    </form>

</div>
