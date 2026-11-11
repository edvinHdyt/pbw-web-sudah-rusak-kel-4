<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 mb-3">Verifikasi Email</h1>

        @if (auth()->user() && auth()->user()->hasVerifiedEmail())
            <p class="text-sm text-gray-600 leading-relaxed">
                Email anda telah terverifikasi! (Otomatis diarahkan ke dashboard dalam 5 detik...)
            </p>
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('dashboard') }}";
                }, 5000);
            </script>
        @else
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    Link verifikasi baru telah dikirim ke alamat email Anda.
                </div>
            @endif

            <p class="text-sm text-gray-600 leading-relaxed mb-2">
                Tekan tombol ini untuk verifikasi email anda!
            </p>
            <p class="text-xs text-gray-500 leading-relaxed">
                Belum menerima email? Tekan tombol di bawah untuk mengirim ulang.
            </p>
        @endif
    </div>

    @if (auth()->user() && auth()->user()->hasVerifiedEmail())
        <div class="pt-2">
            <a href="{{ route('dashboard') }}"
               class="w-full py-2.5 px-4 rounded-lg bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 text-sm font-semibold text-white shadow-md hover:shadow-lg transition-all text-center block">
                Kembali ke Dashboard
            </a>
        </div>
    @else
        <div class="pt-2 space-y-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                        class="w-full py-2.5 px-4 rounded-lg bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 text-sm font-semibold text-white shadow-md hover:shadow-lg transition-all text-center block">
                    Verifikasi
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full py-2.5 px-4 rounded-lg bg-white hover:bg-gray-50 active:bg-gray-100 border border-gray-300 text-sm font-medium text-gray-700 shadow-sm hover:shadow transition-all text-center block">
                    Keluar
                </button>
            </form>
        </div>
    @endif
</x-guest-layout>
