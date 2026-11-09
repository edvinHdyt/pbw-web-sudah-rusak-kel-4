<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold tracking-normal text-black mb-3">Verifikasi Email</h1>

        @if (auth()->user() && auth()->user()->hasVerifiedEmail())
            <p class="text-sm text-black leading-relaxed">
                Email anda telah terverifikasi!
            </p>
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('dashboard') }}";
                }, 5000);
            </script>
        @else
            <p class="text-sm text-black leading-relaxed">
                Verifkasi email telah dikirim ke email anda, mohon konfirmasi terlebih dahulu!
            </p>
            <p class="text-sm text-black leading-relaxed">
                Kirim ulang email? tekan tombol dibawah ini.
            </p>
        @endif
    </div>

    @if (auth()->user() && auth()->user()->hasVerifiedEmail())
        <div class="pt-2 text-center">
            <a href="{{ route('dashboard') }}"
               class="inline-block w-64 py-2.5 px-4 rounded-[4px] bg-[#BFBFBF] hover:bg-[#B3B3B3] active:bg-[#A6A6A6] border border-[#7F7F7F] text-sm font-normal text-black shadow-[0_2px_3px_rgba(0,0,0,0.2)] transition-colors text-center">
                Kembali ke Dashboard
            </a>
        </div>
    @else
        <div class="pt-2 text-center">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                        class="inline-block w-64 py-2.5 px-4 rounded-[4px] bg-[#BFBFBF] hover:bg-[#B3B3B3] active:bg-[#A6A6A6] border border-[#7F7F7F] text-sm font-normal text-black shadow-[0_2px_3px_rgba(0,0,0,0.2)] transition-colors text-center">
                    Verifikasi
                </button>
            </form>
        </div>
    @endif
</x-guest-layout>
