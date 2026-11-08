<x-guest-layout>
    <div class="mb-5 text-center">
        <h1 class="text-2xl font-bold tracking-normal text-black mb-3">Lupa Kata Sandi</h1>
        <p class="text-xs text-black leading-relaxed max-w-xs mx-auto">
            Tolong masukan email atau nomor telepon, kami akan mengirimkan kode OTP untk mereset kata sandi anda
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email/Nomor telepon -->
        <div>
            <label for="email" class="block text-sm font-normal text-black mb-1.5">
                Email/Nomor telepon
            </label>
            <input id="email"
                   type="text"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autofocus
                   class="block w-full rounded-[4px] border border-[#7F7F7F] bg-white px-3 py-2 text-sm text-black shadow-[0_1px_2px_rgba(0,0,0,0.15)] focus:border-black focus:outline-none focus:ring-0" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Buttons -->
        <div class="pt-3 space-y-3">
            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-[4px] bg-[#BFBFBF] hover:bg-[#B3B3B3] active:bg-[#A6A6A6] border border-[#7F7F7F] text-sm font-normal text-black shadow-[0_2px_3px_rgba(0,0,0,0.2)] transition-colors text-center block">
                Lanjutkan
            </button>

            <a href="{{ route('login') }}"
               class="w-full py-2.5 px-4 rounded-[4px] bg-white hover:bg-gray-50 active:bg-gray-100 border border-[#7F7F7F] text-sm font-normal text-black shadow-[0_2px_3px_rgba(0,0,0,0.2)] transition-colors text-center block">
                Keluar
            </a>
        </div>
    </form>
</x-guest-layout>
