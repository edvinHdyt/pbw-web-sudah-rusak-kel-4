<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold tracking-normal text-black mb-3">Lupa Kata Sandi</h1>
        <p class="text-xs text-black leading-relaxed">
            Silahkan masukan kata sandi baru anda
        </p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

        <!-- Kata Sandi Baru -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <label for="password" class="text-sm font-normal text-black sm:w-1/2">
                Kata Sandi Baru
            </label>
            <div class="sm:w-1/2">
                <input id="password"
                       type="password"
                       name="password"
                       required
                       autocomplete="new-password"
                       class="block w-full rounded-[4px] border border-[#7F7F7F] bg-white px-3 py-1.5 text-sm text-black shadow-[0_1px_2px_rgba(0,0,0,0.15)] focus:border-black focus:outline-none focus:ring-0" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>
        </div>

        <!-- Konfirmasi Kata Sandi -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <label for="password_confirmation" class="text-sm font-normal text-black sm:w-1/2">
                Konfirmasi Kata Sandi
            </label>
            <div class="sm:w-1/2">
                <input id="password_confirmation"
                       type="password"
                       name="password_confirmation"
                       required
                       autocomplete="new-password"
                       class="block w-full rounded-[4px] border border-[#7F7F7F] bg-white px-3 py-1.5 text-sm text-black shadow-[0_1px_2px_rgba(0,0,0,0.15)] focus:border-black focus:outline-none focus:ring-0" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>
        </div>

        <!-- Buttons -->
        <div class="pt-4 space-y-3">
            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-[4px] bg-[#BFBFBF] hover:bg-[#B3B3B3] active:bg-[#A6A6A6] border border-[#7F7F7F] text-sm font-normal text-black shadow-[0_2px_3px_rgba(0,0,0,0.2)] transition-colors text-center block">
                Simpan Perubahan
            </button>

            <a href="{{ route('login') }}"
               class="w-full py-2.5 px-4 rounded-[4px] bg-white hover:bg-gray-50 active:bg-gray-100 border border-[#7F7F7F] text-sm font-normal text-black shadow-[0_2px_3px_rgba(0,0,0,0.2)] transition-colors text-center block">
                Keluar
            </a>
        </div>
    </form>
</x-guest-layout>
