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

    <div class="bg-white shadow mt-4" x-data="{ show: false }">
        <x-input-label for="password" value="Kata sandi" />

        <div class="relative mt-1">
            <x-text-input id="password" class="block w-full pr-10"
                type="password"
                x-bind:type="show ? 'text' : 'password'"
                name="password" required autocomplete="current-password" />

            <button type="button" @click="show = !show"
                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-700"
                x-bind:aria-label="show ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi'">

                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
            </button>
        </div>

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
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
