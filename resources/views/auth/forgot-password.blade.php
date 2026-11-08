<x-guest-layout>
    <div class="mb-5 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-black">Lupa Kata Sandi</h1>
        <p class="text-xs text-gray-700 mt-2 max-w-xs mx-auto leading-relaxed">
            Tolong masukan email atau nomor telepon, kami akan mengirimkan link untuk mereset kata sandi anda
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email/Nomor telepon -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-800 mb-1">
                Email/Nomor telepon
            </label>
            <input id="email"
                   type="text"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autofocus
                   class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-600" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Buttons -->
        <div class="pt-2 space-y-3">
            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-md bg-[#BFBFBF] hover:bg-[#AFAFAF] active:bg-[#9F9F9F] border border-gray-400 text-sm font-medium text-black shadow-sm transition-colors text-center block">
                Lanjutkan
            </button>

            <a href="{{ route('login') }}"
               class="w-full py-2.5 px-4 rounded-md bg-white hover:bg-gray-50 active:bg-gray-100 border border-gray-400 text-sm font-medium text-black shadow-sm transition-colors text-center block">
                Keluar
            </a>
        </div>
    </form>
</x-guest-layout>
