<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold tracking-tight text-black">SudahRusak</h1>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Nomor telepon atau email -->
        <div>
            <label for="login" class="block text-sm font-medium text-gray-800 mb-1">
                Nomor telepon atau email
            </label>
            <input id="login"
                   type="text"
                   name="login"
                   value="{{ old('login') }}"
                   required
                   autofocus
                   autocomplete="username"
                   class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-600" />
            <x-input-error :messages="$errors->get('login')" class="mt-1" />
        </div>

        <!-- Kata sandi -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-800 mb-1">
                Kata sandi
            </label>
            <input id="password"
                   type="password"
                   name="password"
                   required
                   autocomplete="current-password"
                   class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-600" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Lupa kata sandi? -->
        @if (Route::has('password.request'))
            <div class="text-right">
                <a class="text-sm font-normal text-gray-800 hover:text-black hover:underline" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="pt-2 space-y-3">
            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-md bg-[#BFBFBF] hover:bg-[#AFAFAF] active:bg-[#9F9F9F] border border-gray-400 text-sm font-medium text-black shadow-sm transition-colors text-center block">
                Masuk
            </button>

            <a href="{{ route('register') }}"
               class="w-full py-2.5 px-4 rounded-md bg-white hover:bg-gray-50 active:bg-gray-100 border border-gray-400 text-sm font-medium text-black shadow-sm transition-colors text-center block">
                Daftar
            </a>
        </div>
    </form>
</x-guest-layout>
