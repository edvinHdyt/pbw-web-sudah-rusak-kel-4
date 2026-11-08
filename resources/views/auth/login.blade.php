<x-guest-layout>
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold tracking-normal text-black">SudahRusak</h1>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Nomor telepon atau email -->
        <div>
            <label for="login" class="block text-sm font-normal text-black mb-1.5">
                Nomor telepon atau email
            </label>
            <input id="login"
                   type="text"
                   name="login"
                   value="{{ old('login') }}"
                   required
                   autofocus
                   autocomplete="username"
                   class="block w-full rounded-[4px] border border-[#7F7F7F] bg-white px-3 py-2 text-sm text-black shadow-[0_1px_2px_rgba(0,0,0,0.15)] focus:border-black focus:outline-none focus:ring-0" />
            <x-input-error :messages="$errors->get('login')" class="mt-1" />
        </div>

        <!-- Kata sandi -->
        <div>
            <label for="password" class="block text-sm font-normal text-black mb-1.5">
                Kata sandi
            </label>
            <input id="password"
                   type="password"
                   name="password"
                   required
                   autocomplete="current-password"
                   class="block w-full rounded-[4px] border border-[#7F7F7F] bg-white px-3 py-2 text-sm text-black shadow-[0_1px_2px_rgba(0,0,0,0.15)] focus:border-black focus:outline-none focus:ring-0" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Lupa kata sandi? -->
        @if (Route::has('password.request'))
            <div class="text-right pt-1">
                <a class="text-sm font-normal text-black hover:underline" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="pt-4 space-y-3.5">
            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-[4px] bg-[#BFBFBF] hover:bg-[#B3B3B3] active:bg-[#A6A6A6] border border-[#7F7F7F] text-sm font-normal text-black shadow-[0_2px_3px_rgba(0,0,0,0.2)] transition-colors text-center block">
                Masuk
            </button>

            <a href="{{ route('register') }}"
               class="w-full py-2.5 px-4 rounded-[4px] bg-white hover:bg-gray-50 active:bg-gray-100 border border-[#7F7F7F] text-sm font-normal text-black shadow-[0_2px_3px_rgba(0,0,0,0.2)] transition-colors text-center block">
                Daftar
            </a>
        </div>
    </form>
</x-guest-layout>
