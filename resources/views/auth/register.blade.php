<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 mb-1">SudahRusak</h1>
        @if (session('status'))
            <p class="text-sm text-gray-600 mt-2">Silahkan verifikasi email Anda!</p>
        @endif
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-3.5">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                Nama Lengkap
            </label>
            <input id="name"
                   type="text"
                   name="name"
                   value="{{ old('name') }}"
                   required
                   autofocus
                   autocomplete="name"
                   class="block w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- No telepon -->
        <div>
            <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">
                No telepon
            </label>
            <input id="no_telepon"
                   type="tel"
                   name="no_telepon"
                   value="{{ old('no_telepon') }}"
                   autocomplete="tel"
                   class="block w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition" />
            <x-input-error :messages="$errors->get('no_telepon')" class="mt-1" />
        </div>

        <div class="bg-white shadow mt-4">
            <x-input-label for="email" value="Email" />
            <x-text-input id="email"
                class="block mt-1 w-full {{ $errors->has('email') ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '' }}"
                type="email" name="email" :value="old('email')" required autocomplete="username" />

            @error('email')
                <div class="mt-2 flex items-start gap-2 rounded-md border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-4 w-4 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-4a1 1 0 00-1 1v4a1 1 0 002 0V7a1 1 0 00-1-1zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <span>{{ $message }}</span>
                        @if ($message === 'Akun dengan email ini sudah terdaftar.')
                            <a href="{{ route('login') }}" class="ml-1 font-semibold underline">Masuk di sini</a>
                        @endif
                    </div>
                </div>
            @enderror
        </div>

        <!-- Alamat -->
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                Alamat
            </label>
            <input id="alamat"
                   type="text"
                   name="alamat"
                   value="{{ old('alamat') }}"
                   required
                   autocomplete="street-address"
                   class="block w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-1" />
        </div>


    <div class="bg-white shadow mt-4" x-data="{ show: false }">
        <x-input-label for="password" value="Kata Sandi" />

        <div class="relative mt-1">
            <x-text-input id="password" class="block w-full pr-10"
                type="password"
                x-bind:type="show ? 'text' : 'password'"
                name="password" required autocomplete="new-password" />

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

    <div class="bg-white shadow mt-4" x-data="{ show: false }">
        <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi" />

        <div class="relative mt-1">
            <x-text-input id="password_confirmation" class="block w-full pr-10"
                type="password"
                x-bind:type="show ? 'text' : 'password'"
                name="password_confirmation" required autocomplete="new-password" />

            <button type="button" @click="show = !show"
                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-700"
                x-bind:aria-label="show ? 'Sembunyikan konfirmasi kata sandi' : 'Tampilkan konfirmasi kata sandi'">
                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
            </button>
        </div>

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

        <!-- Daftar Button -->
        <div class="pt-3">
            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-lg bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 text-sm font-semibold text-white shadow-md hover:shadow-lg transition-all text-center block">
                Daftar
            </button>
        </div>

        <!-- Sudah punya akun? Masuk -->
        <p class="mt-4 text-center text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-500 transition">
                Masuk
            </a>
        </p>
    </form>
</x-guest-layout>
