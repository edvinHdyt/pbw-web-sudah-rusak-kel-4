<x-guest-layout>
    <h1 class="text-center text-2xl font-bold text-gray-900">SudahRusak</h1>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div class="bg-white shadow mt-4">
            <x-input-label for="login" value="Nomor telepon atau email" />
            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <div class="bg-white shadow mt-4">
            <x-input-label for="password" value="Kata sandi" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 " />
        </div>

        @if (Route::has('password.request'))
            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-900 hover:text-gray-900" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            </div>
        @endif

        <div class="bg-white shadow mt-4">
        <button type="submit" class="mt- w-full py-2 rounded-md bg-gray-300 hover:bg-gray-400 text-white text-sm transition bg-indigo-500">
            Masuk
        </button>
        </div>
        <a href="{{ route('register') }}" class="mt-4 block w-full py-2 rounded-md border border-gray-300 bg-white hover:bg-gray-200 text-center text-black-50 text-sm transition">
            Daftar
        </a>
    </form>
</x-guest-layout>h
