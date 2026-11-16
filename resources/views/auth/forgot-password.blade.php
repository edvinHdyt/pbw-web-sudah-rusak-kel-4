<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 mb-2">Lupa Kata Sandi</h1>
        <p class="text-sm text-gray-600 leading-relaxed max-w-xs mx-auto">
            Tolong masukan email atau nomor telepon, kami akan mengirimkan link untuk mereset kata sandi anda
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email/Nomor telepon -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">
                Email/Nomor telepon
            </label>
            <input id="email"
                   type="text"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autofocus
                   class="block w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        <!-- Buttons -->
        <div class="pt-2 space-y-3">
            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-lg bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 text-sm font-semibold text-white shadow-md hover:shadow-lg transition-all text-center block">
                Lanjutkan
            </button>

            <a href="{{ route('login') }}"
               class="w-full py-2.5 px-4 rounded-lg bg-white hover:bg-gray-50 active:bg-gray-100 border border-gray-300 text-sm font-medium text-gray-700 shadow-sm hover:shadow transition-all text-center block">
                Keluar
            </a>
        </div>
    </form>
</x-guest-layout>
