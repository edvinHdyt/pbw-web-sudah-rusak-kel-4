<x-guest-layout>
    <div class="mb-5 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-black">Verifikasi Email</h1>

        @if (session('status') == 'verification-link-sent')
            <p class="text-xs text-green-700 mt-2 max-w-xs mx-auto leading-relaxed">
                Link verifikasi baru telah dikirim ke alamat email Anda.
            </p>
        @elseif (auth()->user() && auth()->user()->hasVerifiedEmail())
            <p class="text-xs text-gray-700 mt-2 max-w-xs mx-auto leading-relaxed">
                Email anda telah terverifikasi! (Otomatis diarahkan dalam 5 detik...)
            </p>
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('dashboard') }}";
                }, 5000);
            </script>
        @else
            <p class="text-xs text-gray-700 mt-2 max-w-xs mx-auto leading-relaxed">
                Tekan tombol ini untuk verifikasi email anda!
            </p>
        @endif
    </div>

    @if (auth()->user() && auth()->user()->hasVerifiedEmail())
        <div class="space-y-3 pt-2">
            <a href="{{ route('dashboard') }}"
               class="w-full py-2.5 px-4 rounded-md bg-[#BFBFBF] hover:bg-[#AFAFAF] active:bg-[#9F9F9F] border border-gray-400 text-sm font-medium text-black shadow-sm transition-colors text-center block">
                Kembali ke Dashboard
            </a>
        </div>
    @else
        <div class="space-y-3 pt-2">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                        class="w-full py-2.5 px-4 rounded-md bg-[#BFBFBF] hover:bg-[#AFAFAF] active:bg-[#9F9F9F] border border-gray-400 text-sm font-medium text-black shadow-sm transition-colors text-center block">
                    Verifikasi
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full py-2.5 px-4 rounded-md bg-white hover:bg-gray-50 active:bg-gray-100 border border-gray-400 text-sm font-medium text-black shadow-sm transition-colors text-center block">
                    Keluar
                </button>
            </form>
        </div>
    @endif
</x-guest-layout>
