<x-guest-layout>
    <h1 class="text-center text-3xl font-bold text-gray-900 mb-6">SudahRusak</h1>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="bg-white shadow-lg>
            <x-input-label for="login" value="Nomor telepon atau email" />
            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <div class="bg-white shadow-lg mt-4">
            <x-input-label for="password" value="Kata sandi" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        @if (Route::has('password.request'))
            <div class="bg-white shadow-lg mt-2 text-right">
                <a class="text-sm text-gray-700 hover:text-gray-900" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            </div>
        @endif

        <div class="bg-white shadow-lg mt-4">
        <button type="submit" class="mt-4 w-full py-2 rounded-md bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm transition">
            Masuk
        </button>
        </div>
        <a href="{{ route('register') }}" class="mt-3 block w-full py-2 rounded-md border border-gray-300 bg-white hover:bg-gray-50 text-center text-gray-800 text-sm transition">
            Daftar
        </a>
    </form>
</x-guest-layout>h