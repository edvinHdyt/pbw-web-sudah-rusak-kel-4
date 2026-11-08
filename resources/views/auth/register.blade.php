<x-guest-layout>
    <div class="mb-5 text-center">
        <h1 class="text-3xl font-bold tracking-tight text-black">SudahRusak</h1>
        @if (session('status'))
            <p class="text-sm text-gray-700 mt-1">{{ session('status') }}</p>
        @endif
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-3.5">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-800 mb-1">
                Nama Lengkap
            </label>
            <input id="nama"
                   type="text"
                   name="nama"
                   value="{{ old('nama') }}"
                   required
                   autofocus
                   autocomplete="name"
                   class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-600" />
            <x-input-error :messages="$errors->get('nama')" class="mt-1" />
        </div>

        <!-- No telepon -->
        <div>
            <label for="no_telpon" class="block text-sm font-medium text-gray-800 mb-1">
                No telepon
            </label>
            <input id="no_telpon"
                   type="tel"
                   name="no_telpon"
                   value="{{ old('no_telpon') }}"
                   autocomplete="tel"
                   class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-600" />
            <x-input-error :messages="$errors->get('no_telpon')" class="mt-1" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-800 mb-1">
                Email
            </label>
            <input id="email"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autocomplete="username"
                   class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-600" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Alamat -->
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-800 mb-1">
                Alamat
            </label>
            <input id="alamat"
                   type="text"
                   name="alamat"
                   value="{{ old('alamat') }}"
                   required
                   autocomplete="street-address"
                   class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-600" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-1" />
        </div>

        <!-- Kata Sandi -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-800 mb-1">
                Kata Sandi
            </label>
            <input id="password"
                   type="password"
                   name="password"
                   required
                   autocomplete="new-password"
                   class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-600" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Konfirmasi Kata Sandi -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-800 mb-1">
                Konfirmasi Kata Sandi
            </label>
            <input id="password_confirmation"
                   type="password"
                   name="password_confirmation"
                   required
                   autocomplete="new-password"
                   class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-600 focus:outline-none focus:ring-1 focus:ring-gray-600" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <!-- Daftar Button -->
        <div class="pt-3">
            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-md bg-[#BFBFBF] hover:bg-[#AFAFAF] active:bg-[#9F9F9F] border border-gray-400 text-sm font-medium text-black shadow-sm transition-colors text-center block">
                Daftar
            </button>
        </div>

        <!-- Sudah punya akun? Masuk -->
        <div class="pt-2 text-center text-sm text-gray-800">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-bold text-black hover:underline">
                Masuk
            </a>
        </div>
    </form>
</x-guest-layout>
