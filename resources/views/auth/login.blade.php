<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 mb-1">SudahRusak</h1>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Nomor telepon atau email -->
        <div>
            <label for="login" class="block text-sm font-medium text-gray-700 mb-1.5">
                Nomor telepon atau email
            </label>
            <input id="login"
                   type="text"
                   name="login"
                   value="{{ old('login') }}"
                   required
                   autofocus
                   autocomplete="username"
                   class="block w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition" />
            <x-input-error :messages="$errors->get('login')" class="mt-1.5" />
        </div>

        <!-- Kata sandi -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">
                Kata sandi
            </label>
            <input id="password"
                   type="password"
                   name="password"
                   required
                   autocomplete="current-password"
                   class="block w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition" />
            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
        </div>

        <!-- Lupa kata sandi? -->
        @if (Route::has('password.request'))
            <div class="flex items-center justify-end pt-1">
                <a class="text-sm font-medium text-indigo-600 hover:text-indigo-500 transition" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="pt-2 space-y-3">
            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-lg bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 text-sm font-semibold text-white shadow-md hover:shadow-lg transition-all text-center block">
                Masuk
            </button>

            <a href="{{ route('register') }}"
               class="w-full py-2.5 px-4 rounded-lg bg-white hover:bg-gray-50 active:bg-gray-100 border border-gray-300 text-sm font-medium text-gray-700 shadow-sm hover:shadow transition-all text-center block">
                Daftar
            </a>
        </div>
    </form>
</x-guest-layout>
