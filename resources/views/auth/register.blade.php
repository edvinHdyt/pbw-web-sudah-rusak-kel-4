<x-guest-layout>
    <h1 class="text-center text-3xl font-bold text-gray-900">SudahRusak</h1>
    <p class="text-center text-sm text-gray-700"> Silahkan verifikasi email Anda! </p>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="bg-white shadow-lg">
            <x-input-label for="name" value="Nama Lengkap" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="bg-white shadow-lg mt-4">
            <x-input-label for="no_telepon" value="No telepon" />
            <x-text-input id="no_telepon" class="block mt-1 w-full" type="tel" name="no_telepon" :value="old('no_telepon')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('no_telepon')" class="mt-2" />
        </div>

        <div class="bg-white shadow-lg mt-4">
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="bg-white shadow-lg mt-4">
            <x-input-label for="alamat" value="Alamat" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autocomplete="street-address" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div class="bg-white shadow-lg mt-4">
            <x-input-label for="password" value="Kata Sandi" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="bg-white shadow-lg mt-4">
            <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="bg-white shadow-lg mt-4">
        <button type="submit" class="mt-4 w-full py-2 rounded-md bg-gray-300 hover:bg-gray-400 text-black-1000 text-sm transition">
            Daftar
        </button>
        </div>


        <p class="mt-3 text-center text-sm text-gray-700 ">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-bold text-gray-900">Masuk</a>
        </p>
    </form>
</x-guest-layout>