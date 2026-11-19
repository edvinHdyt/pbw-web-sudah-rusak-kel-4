<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold tracking-normal text-black">SudahRusak</h1>
        @if (session('status'))
            <p class="text-sm text-black mt-2">Silahkan verifikasi email anda!</p>
        @endif
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-3.5">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <label for="nama" class="block text-sm font-normal text-black mb-1">
                Nama Lengkap
            </label>
            <input id="nama"
                   type="text"
                   name="nama"
                   value="{{ old('nama') }}"
                   required
                   autofocus
                   autocomplete="name"
                   class="block w-full rounded-[4px] border border-[#7F7F7F] bg-white px-3 py-2 text-sm text-black shadow-[0_1px_2px_rgba(0,0,0,0.15)] focus:border-black focus:outline-none focus:ring-0" />
            <x-input-error :messages="$errors->get('nama')" class="mt-1" />
        </div>

        <!-- No telepon -->
        <div>
            <label for="no_telpon" class="block text-sm font-normal text-black mb-1">
                No telepon
            </label>
            <input id="no_telpon"
                   type="tel"
                   name="no_telpon"
                   value="{{ old('no_telpon') }}"
                   autocomplete="tel"
                   class="block w-full rounded-[4px] border border-[#7F7F7F] bg-white px-3 py-2 text-sm text-black shadow-[0_1px_2px_rgba(0,0,0,0.15)] focus:border-black focus:outline-none focus:ring-0" />
            <x-input-error :messages="$errors->get('no_telpon')" class="mt-1" />
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
            <label for="alamat" class="block text-sm font-normal text-black mb-1">
                Alamat
            </label>
            <input id="alamat"
                   type="text"
                   name="alamat"
                   value="{{ old('alamat') }}"
                   required
                   autocomplete="street-address"
                   class="block w-full rounded-[4px] border border-[#7F7F7F] bg-white px-3 py-2 text-sm text-black shadow-[0_1px_2px_rgba(0,0,0,0.15)] focus:border-black focus:outline-none focus:ring-0" />
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
                    class="mt-4 w-full py-2 rounded-md hover:bg-gray-400 text-white text-sm transition bg-indigo-500">
                Daftar
            </button>
        </div>

        <p class="mt-3 text-center text-sm text-gray-700 ">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-bold text-gray-900">Masuk</a>
        </p>
    </form>
</x-guest-layout>
