<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SudahRusak - Servis Elektronik & Lacak Service</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen flex flex-col">

        <!-- ================= NAVBAR ================= -->
        <header class="w-full bg-white/95 backdrop-blur border-b border-indigo-100 py-3.5 px-6 sm:px-12 sticky top-0 z-50 shadow-sm transition-all">
            <div class="max-w-6xl mx-auto flex items-center justify-between">
                <!-- Brand -->
                <a href="{{ route('customer.index') }}" class="text-xl sm:text-2xl font-extrabold tracking-tight text-indigo-600 hover:text-indigo-700 transition">
                    SudahRusak
                </a>

                <!-- Nav Menu -->
                <nav class="flex items-center space-x-1 sm:space-x-3 text-sm font-medium">
                    <a href="#beranda"
                       class="text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 px-3.5 py-1.5 rounded-full transition">
                        Beranda
                    </a>
                    <a href="#tentang-kami"
                       class="text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 px-3.5 py-1.5 rounded-full transition">
                        Tentang Kami
                    </a>
                    <a href="#kontak-kami"
                       class="text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 px-3.5 py-1.5 rounded-full transition">
                        Kontak Kami
                    </a>
                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 text-white px-4 py-1.5 rounded-full font-semibold shadow-sm transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 text-white px-5 py-1.5 rounded-full font-semibold shadow-sm hover:shadow transition">
                            Masuk
                        </a>
                    @endauth
                </nav>
            </div>
        </header>

        <!-- ================= HERO SECTION ================= -->
        <section id="beranda" class="w-full bg-gradient-to-b from-indigo-50/80 via-indigo-50/30 to-slate-50 py-16 sm:py-20 px-6 text-center border-b border-indigo-100/60">
            <div class="max-w-4xl mx-auto">
                <span class="inline-block bg-indigo-100 text-indigo-700 text-xs font-semibold px-3.5 py-1 rounded-full uppercase tracking-wider mb-4 border border-indigo-200/60">
                    Layanan Servis Terpercaya
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-3 tracking-tight">
                    Selamat Datang
                </h1>
                <p class="text-base sm:text-lg text-slate-600 max-w-xl mx-auto font-normal leading-relaxed">
                    Lorem ipsum dolor sit amet
                </p>
            </div>
        </section>

        <!-- ================= LACAK SERVICE SECTION ================= -->
        <section id="lacak-service" class="w-full py-12 sm:py-16 px-4 sm:px-6">
            <div class="max-w-4xl mx-auto">

                <!-- Section Heading -->
                <div class="text-center mb-6">
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">
                        Lacak Service
                    </h2>
                    <div class="w-16 h-1 bg-indigo-500 rounded-full mx-auto mt-2"></div>
                </div>

                <!-- Search Bar Form -->
                <form method="GET" action="{{ route('customer.index') }}#lacak-service" class="max-w-2xl mx-auto mb-8">
                    <div class="flex items-center shadow-sm rounded-xl overflow-hidden border border-indigo-200 focus-within:ring-4 focus-within:ring-indigo-100 focus-within:border-indigo-500 transition-all">
                        <input type="text"
                               name="resi"
                               value="{{ old('resi', $resi) }}"
                               placeholder="Lacak Service (Contoh: 6X752)"
                               required
                               class="flex-1 bg-white hover:bg-slate-50 focus:bg-white text-slate-900 placeholder-slate-400 px-5 py-3.5 border-none focus:outline-none focus:ring-0 text-sm sm:text-base transition" />
                        <button type="submit"
                                class="bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 text-white px-7 py-3.5 flex items-center justify-center transition cursor-pointer font-medium">
                            <svg class="w-5 h-5 stroke-current text-white" fill="none" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Quick suggestions -->
                    <div class="mt-3 text-center text-xs text-slate-500 flex flex-wrap items-center justify-center gap-1.5">
                        <span>Coba nomor resi contoh:</span>
                        <a href="{{ route('customer.index', ['resi' => '6X752']) }}#lacak-service" class="bg-indigo-50 hover:bg-indigo-100 text-indigo-600 border border-indigo-200/70 px-2 py-0.5 rounded font-semibold transition">#6X752</a>
                        <a href="{{ route('customer.index', ['resi' => 'SR-001']) }}#lacak-service" class="bg-indigo-50 hover:bg-indigo-100 text-indigo-600 border border-indigo-200/70 px-2 py-0.5 rounded font-semibold transition">#SR-001</a>
                        <a href="{{ route('customer.index', ['resi' => 'SR-002']) }}#lacak-service" class="bg-indigo-50 hover:bg-indigo-100 text-indigo-600 border border-indigo-200/70 px-2 py-0.5 rounded font-semibold transition">#SR-002</a>
                        <a href="{{ route('customer.index', ['resi' => 'SR-003']) }}#lacak-service" class="bg-indigo-50 hover:bg-indigo-100 text-indigo-600 border border-indigo-200/70 px-2 py-0.5 rounded font-semibold transition">#SR-003</a>
                    </div>
                </form>

                <!-- Feedback Notifications -->
                @if(session('success'))
                    <div class="max-w-2xl mx-auto mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm rounded-xl text-center font-medium shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if($error)
                    <div class="max-w-2xl mx-auto mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 text-sm rounded-xl text-center font-medium shadow-sm">
                        {{ $error }}
                    </div>
                @endif

                <!-- ================= CARD HASIL LACAK PESANAN ================= -->
                @if($service)
                    <div class="bg-gradient-to-br from-indigo-50/90 via-white to-slate-50 rounded-2xl p-6 sm:p-10 shadow-lg border border-indigo-100">

                        <!-- Heading Nomor Pesanan -->
                        <div class="mb-8">
                            <h3 class="text-xl sm:text-2xl font-bold tracking-tight text-slate-900">
                                PESANAN <span class="text-indigo-600 font-extrabold">#{{ $service->no_resi }}</span>
                            </h3>
                        </div>

                        <!-- Stepper Progress Bar -->
                        <div class="relative mb-10 px-4 sm:px-8">
                            <!-- Background line -->
                            <div class="absolute top-4 left-10 right-10 h-2 bg-slate-200 rounded-full z-0"></div>

                            <!-- Colored active line based on current step -->
                            @php
                                $lineWidthPercent = match($service->tahap) {
                                    1 => '0%',
                                    2 => '33%',
                                    3 => '66%',
                                    4 => '100%',
                                    default => '33%'
                                };
                            @endphp
                            <div class="absolute top-4 left-10 h-2 bg-indigo-500 rounded-full z-0 transition-all duration-500 shadow-sm"
                                 style="width: {{ $lineWidthPercent }};"></div>

                            <!-- 4 Step Indicator Nodes -->
                            <div class="relative z-10 flex justify-between items-center">
                                @for($i = 1; $i <= 4; $i++)
                                    <div class="flex flex-col items-center">
                                        @if($i <= $service->tahap)
                                            <!-- Completed or Current step: indigo circle with checkmark -->
                                            <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-indigo-500 border-2 border-white flex items-center justify-center text-white shadow-md shadow-indigo-200">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5 stroke-current" fill="none" stroke-width="3" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                        @else
                                            <!-- Upcoming step: neutral slate circle with subtle dotted ring -->
                                            <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-slate-200 border-2 border-white flex items-center justify-center text-slate-400 shadow-sm">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                                    <circle cx="12" cy="12" r="2.5" />
                                                    <circle cx="12" cy="4" r="1.5" />
                                                    <circle cx="12" cy="20" r="1.5" />
                                                    <circle cx="4" cy="12" r="1.5" />
                                                    <circle cx="20" cy="12" r="1.5" />
                                                    <circle cx="6.34" cy="6.34" r="1.5" />
                                                    <circle cx="17.66" cy="17.66" r="1.5" />
                                                    <circle cx="6.34" cy="17.66" r="1.5" />
                                                    <circle cx="17.66" cy="6.34" r="1.5" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <!-- 4 Step Tabs / Labels (matching Wireframe) -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-center mb-0">
                            <!-- Tab 1: Pesanan Dibuat -->
                            <div class="py-3 px-2 flex items-center justify-center space-x-2 transition-all {{ $service->tahap == 1 ? 'bg-white rounded-t-xl shadow-sm text-indigo-900 font-bold border-t-2 border-indigo-500' : 'text-slate-600 hover:text-indigo-600' }}">
                                <div class="w-7 h-7 shrink-0 text-indigo-500 flex items-center justify-center">
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 14H6v-2h6v2zm4-4H6v-2h10v2zm0-4H6V7h10v2z"/>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold leading-tight text-left">
                                    Pesanan<br/>Dibuat
                                </span>
                            </div>

                            <!-- Tab 2: Pengecekan Perangkat -->
                            <div class="py-3 px-2 flex items-center justify-center space-x-2 transition-all {{ $service->tahap == 2 ? 'bg-white rounded-t-xl shadow-sm text-indigo-900 font-bold border-t-2 border-indigo-500' : 'text-slate-600 hover:text-indigo-600' }}">
                                <div class="w-7 h-7 shrink-0 text-indigo-500 flex items-center justify-center">
                                    <svg class="w-6 h-6 stroke-current stroke-2 fill-none" viewBox="0 0 24 24">
                                        <circle cx="11" cy="11" r="7" />
                                        <path d="M21 21l-4.35-4.35" />
                                        <path d="M11 8a2 2 0 0 1 2 2c0 1.5-2 1.5-2 2.5" />
                                        <circle cx="11" cy="14" r="0.5" fill="currentColor" />
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold leading-tight text-left">
                                    Pengecekan<br/>Perangkat
                                </span>
                            </div>

                            <!-- Tab 3: Perbaikan Perangkat -->
                            <div class="py-3 px-2 flex items-center justify-center space-x-2 transition-all {{ $service->tahap == 3 ? 'bg-white rounded-t-xl shadow-sm text-indigo-900 font-bold border-t-2 border-indigo-500' : 'text-slate-600 hover:text-indigo-600' }}">
                                <div class="w-7 h-7 shrink-0 text-indigo-500 flex items-center justify-center">
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                        <path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold leading-tight text-left">
                                    Perbaikan<br/>Perangkat
                                </span>
                            </div>

                            <!-- Tab 4: Perbaikan Selesai -->
                            <div class="py-3 px-2 flex items-center justify-center space-x-2 transition-all {{ $service->tahap == 4 ? 'bg-white rounded-t-xl shadow-sm text-indigo-900 font-bold border-t-2 border-indigo-500' : 'text-slate-600 hover:text-indigo-600' }}">
                                <div class="w-7 h-7 shrink-0 text-indigo-500 flex items-center justify-center">
                                    <svg class="w-6 h-6 stroke-current stroke-2 fill-none" viewBox="0 0 24 24">
                                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
                                        <path d="M9 19l2 2 4-4" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold leading-tight text-left">
                                    Perbaikan<br/>Selesai
                                </span>
                            </div>
                        </div>

                        <!-- ================= WHITE DETAIL CONTENT CARD ================= -->
                        <div class="bg-white rounded-b-xl rounded-tr-xl p-6 sm:p-8 shadow-sm border border-indigo-50">

                            <!-- Underlined Sub-Header -->
                            <div class="mb-6">
                                <h4 class="text-sm sm:text-base font-bold text-slate-900 border-b-2 border-indigo-500 inline-block pb-1">
                                    {{ $service->tahap_label }}
                                </h4>
                            </div>

                            <!-- Two Columns Details Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-10">

                                <!-- Left Column: Readonly Perangkat & Keluhan Info -->
                                <div class="space-y-3.5">
                                    <!-- Nama Customer -->
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 sm:gap-3">
                                        <label class="text-xs font-semibold text-slate-700 sm:w-36 shrink-0">
                                            Nama Customer
                                        </label>
                                        <input type="text"
                                               readonly
                                               value="{{ $service->nama_customer }}"
                                               class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3.5 py-2 text-xs text-slate-900 font-medium focus:ring-0 cursor-default" />
                                    </div>

                                    <!-- Jenis Perangkat -->
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 sm:gap-3">
                                        <label class="text-xs font-semibold text-slate-700 sm:w-36 shrink-0">
                                            Jenis Perangkat
                                        </label>
                                        <input type="text"
                                               readonly
                                               value="{{ $service->jenis_perangkat }}"
                                               class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3.5 py-2 text-xs text-slate-900 font-medium focus:ring-0 cursor-default" />
                                    </div>

                                    <!-- Keluhan -->
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 sm:gap-3">
                                        <label class="text-xs font-semibold text-slate-700 sm:w-36 shrink-0">
                                            Keluhan
                                        </label>
                                        <input type="text"
                                               readonly
                                               value="{{ $service->keluhan }}"
                                               class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3.5 py-2 text-xs text-slate-900 font-medium focus:ring-0 cursor-default" />
                                    </div>

                                    <!-- Masalah Ditemukan -->
                                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-1 sm:gap-3">
                                        <label class="text-xs font-semibold text-slate-700 sm:w-36 shrink-0 pt-1">
                                            Masalah Ditemukan
                                        </label>
                                        <textarea readonly
                                                  rows="3"
                                                  class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3.5 py-2 text-xs text-slate-900 font-medium leading-relaxed resize-none focus:ring-0 cursor-default">{{ $service->masalah_ditemukan }}</textarea>
                                    </div>
                                </div>

                                <!-- Right Column: Form Interaktif Status, Pengantaran & Biaya -->
                                <div>
                                    <form method="POST" action="{{ route('customer.update', $service->id) }}" class="space-y-4">
                                        @csrf

                                        <!-- Status Perbaikan -->
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 sm:gap-3">
                                            <label for="status_perbaikan" class="text-xs font-semibold text-slate-700 sm:w-32 shrink-0">
                                                Status Perbaikan
                                            </label>
                                            <div class="w-full relative">
                                                <select id="status_perbaikan"
                                                        name="status_perbaikan"
                                                        class="w-full bg-white border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-900 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 font-medium transition cursor-pointer">
                                                    <option value="Menunggu Konfirmasi" {{ $service->status_perbaikan == 'Menunggu Konfirmasi' ? 'selected' : '' }}>
                                                        Menunggu Konfirmasi
                                                    </option>
                                                    <option value="Setuju Perbaikan" {{ $service->status_perbaikan == 'Setuju Perbaikan' ? 'selected' : '' }}>
                                                        Setuju Perbaikan
                                                    </option>
                                                    <option value="Batalkan Perbaikan" {{ $service->status_perbaikan == 'Batalkan Perbaikan' ? 'selected' : '' }}>
                                                        Batalkan Perbaikan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Pengantaran -->
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 sm:gap-3">
                                            <label class="text-xs font-semibold text-slate-700 sm:w-32 shrink-0">
                                                Pengantaran
                                            </label>
                                            <div class="w-full flex items-center space-x-6">
                                                <label class="inline-flex items-center text-xs font-normal text-slate-800 cursor-pointer">
                                                    <input type="radio"
                                                           name="pengantaran"
                                                           value="Diantar"
                                                           {{ $service->pengantaran == 'Diantar' ? 'checked' : '' }}
                                                           class="mr-2 text-indigo-600 focus:ring-indigo-500 rounded" />
                                                    Diantar
                                                </label>
                                                <label class="inline-flex items-center text-xs font-normal text-slate-800 cursor-pointer">
                                                    <input type="radio"
                                                           name="pengantaran"
                                                           value="Ambil Sendiri"
                                                           {{ $service->pengantaran == 'Ambil Sendiri' ? 'checked' : '' }}
                                                           class="mr-2 text-indigo-600 focus:ring-indigo-500 rounded" />
                                                    Ambil Sendiri
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Biaya Perbaikan (Dynamic based on Edvin's note) -->
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 sm:gap-3">
                                            <label class="text-xs font-semibold text-slate-700 sm:w-32 shrink-0">
                                                Biaya Perbaikan
                                            </label>
                                            <div class="w-full">
                                                <input id="biaya_display"
                                                       type="text"
                                                       readonly
                                                       value="Rp {{ number_format($service->biaya_perbaikan, 0, ',', '.') }}"
                                                       class="w-full bg-indigo-50/80 border border-indigo-200/70 rounded-lg px-3 py-2 text-xs text-indigo-700 font-bold focus:ring-0 cursor-default" />
                                                <p id="note_batal" class="text-[11px] text-rose-600 mt-1 font-medium {{ $service->status_perbaikan == 'Batalkan Perbaikan' ? '' : 'hidden' }}">
                                                    *Jika dibatalkan, dikenakan biaya konsul sebesar Rp 50.000.
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Tombol Simpan -->
                                        <div class="pt-2 flex justify-end">
                                            <button type="submit"
                                                    class="bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 text-white px-7 py-2 rounded-lg text-xs font-semibold shadow-sm hover:shadow-indigo-200 transition-all cursor-pointer">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- ================= TENTANG KAMI SECTION ================= -->
        <section id="tentang-kami" class="w-full py-12 sm:py-16 px-4 sm:px-6 bg-slate-50/70 border-t border-slate-200/80">
            <div class="max-w-4xl mx-auto">
                <!-- Section Heading -->
                <div class="text-center mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">
                        Tentang Kami
                    </h2>
                    <div class="w-16 h-1 bg-indigo-500 rounded-full mx-auto mt-2"></div>
                </div>

                <!-- Two Box Layout: Foto & Tulisan per Wireframe -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch mb-8">
                    <!-- Foto Box (Sesuai Wireframe: Kotak Foto Elegan dengan Palet Indigo) -->
                    <div class="bg-gradient-to-br from-indigo-100/90 to-indigo-50 rounded-2xl min-h-[220px] sm:min-h-[260px] flex flex-col items-center justify-center text-center p-6 border border-indigo-200/70 shadow-sm">
                        <span class="text-2xl sm:text-3xl font-extrabold text-indigo-900 tracking-wide">
                            Foto
                        </span>
                        <span class="text-xs font-medium text-indigo-600 mt-2">
                            Dokumentasi Workshop & Servis
                        </span>
                    </div>

                    <!-- Tulisan Box (Sesuai Wireframe: Kotak Tulisan Deskripsi) -->
                    <div class="bg-white rounded-2xl p-6 sm:p-8 flex flex-col justify-center border border-slate-200 shadow-sm">
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-2">
                            Pusat Servis SudahRusak
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-3">
                            SudahRusak adalah penyedia jasa perbaikan perangkat elektronik yang menangani berbagai kendala hardware dan software pada laptop, komputer desktop, printer, dan gadget Anda.
                        </p>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Kami mengutamakan transparansi dan kepuasan pelanggan dengan jaminan garansi servis serta sistem pelacakan status perbaikan secara mandiri melalui nomor resi.
                        </p>
                    </div>
                </div>

                <!-- Galeri Servis (Sesuai Catatan Wireframe: Tanpa Icon Emojis) -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                    <h3 class="text-sm font-bold text-slate-800 mb-4 tracking-wider uppercase text-xs">
                        Galeri Servis
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="bg-slate-50 hover:bg-indigo-50/50 rounded-xl h-28 sm:h-32 flex flex-col items-center justify-center text-center p-3 border border-slate-200 hover:border-indigo-300 transition shadow-sm">
                            <span class="text-sm font-semibold text-slate-800">Foto 1</span>
                            <span class="text-xs text-indigo-600 font-medium mt-1">Servis Laptop</span>
                        </div>
                        <div class="bg-slate-50 hover:bg-indigo-50/50 rounded-xl h-28 sm:h-32 flex flex-col items-center justify-center text-center p-3 border border-slate-200 hover:border-indigo-300 transition shadow-sm">
                            <span class="text-sm font-semibold text-slate-800">Foto 2</span>
                            <span class="text-xs text-indigo-600 font-medium mt-1">Ganti Keyboard</span>
                        </div>
                        <div class="bg-slate-50 hover:bg-indigo-50/50 rounded-xl h-28 sm:h-32 flex flex-col items-center justify-center text-center p-3 border border-slate-200 hover:border-indigo-300 transition shadow-sm">
                            <span class="text-sm font-semibold text-slate-800">Foto 3</span>
                            <span class="text-xs text-indigo-600 font-medium mt-1">Motherboard & IC</span>
                        </div>
                        <div class="bg-slate-50 hover:bg-indigo-50/50 rounded-xl h-28 sm:h-32 flex flex-col items-center justify-center text-center p-3 border border-slate-200 hover:border-indigo-300 transition shadow-sm">
                            <span class="text-sm font-semibold text-slate-800">Foto 4</span>
                            <span class="text-xs text-indigo-600 font-medium mt-1">Maintenance & Thermal</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= TEMUKAN KAMI SECTION ================= -->
        <section id="temukan-kami" class="w-full py-12 sm:py-16 px-4 sm:px-6">
            <div class="max-w-4xl mx-auto">
                <!-- Section Heading -->
                <div class="text-center mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">
                        Temukan Kami
                    </h2>
                    <div class="w-16 h-1 bg-indigo-500 rounded-full mx-auto mt-2"></div>
                </div>

                <!-- Big Map Box per Wireframe (Google Maps Embed) -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 relative min-h-[300px] sm:min-h-[360px] flex items-center justify-center">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126916.03541416972!2d106.92984955!3d-6.2447952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c8c8305c45b%3A0x301576d14fed9d0!2sBekasi%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        width="100%"
                        height="360"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-80 sm:h-96">
                    </iframe>
                </div>
            </div>
        </section>

        <!-- ================= KONTAK KAMI SECTION ================= -->
        <section id="kontak-kami" class="w-full py-12 sm:py-16 px-4 sm:px-6 bg-gradient-to-b from-slate-50 to-indigo-50/50 border-t border-slate-200">
            <div class="max-w-4xl mx-auto">
                <!-- Section Heading -->
                <div class="text-center mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">
                        Kontak Kami
                    </h2>
                    <div class="w-16 h-1 bg-indigo-500 rounded-full mx-auto mt-2"></div>
                </div>

                <!-- Contact Info Cards (Clean Typography - Tanpa Icon Emojis) -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- WhatsApp / CS -->
                    <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-slate-200 hover:border-indigo-300 hover:shadow-md transition">
                        <h3 class="font-bold text-indigo-600 text-xs uppercase tracking-wider mb-1">
                            WhatsApp & Telepon
                        </h3>
                        <p class="text-xs text-slate-500 mb-3">Layanan Cepat Customer Service</p>
                        <a href="https://wa.me/6281234567890" target="_blank" class="text-sm font-bold text-slate-900 hover:text-indigo-600 transition block">
                            +62 812-3456-7890
                        </a>
                    </div>

                    <!-- Email Support -->
                    <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-slate-200 hover:border-indigo-300 hover:shadow-md transition">
                        <h3 class="font-bold text-indigo-600 text-xs uppercase tracking-wider mb-1">
                            Email Resmi
                        </h3>
                        <p class="text-xs text-slate-500 mb-3">Konsultasi & Informasi</p>
                        <a href="mailto:support@sudahrusak.com" class="text-sm font-bold text-slate-900 hover:text-indigo-600 transition block">
                            support@sudahrusak.com
                        </a>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-slate-200 hover:border-indigo-300 hover:shadow-md transition">
                        <h3 class="font-bold text-indigo-600 text-xs uppercase tracking-wider mb-1">
                            Jam Operasional
                        </h3>
                        <p class="text-xs text-slate-500 mb-1">Senin - Sabtu</p>
                        <p class="text-sm font-bold text-slate-900">09:00 - 20:00 WIB</p>
                        <p class="text-[11px] text-slate-400 mt-1">Minggu & Hari Libur Tutup</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= FOOTER ================= -->
        <footer class="w-full bg-slate-900 text-slate-400 py-8 px-6 text-center text-xs border-t border-slate-800">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3">
                <div class="flex items-center space-x-2">
                    <span class="text-base font-bold text-white tracking-tight">SudahRusak</span>
                    <span class="text-slate-600">|</span>
                    <span class="text-slate-400">Modul Customer</span>
                </div>
                <span class="text-slate-500">&copy; {{ date('Y') }} SudahRusak. All rights reserved.</span>
            </div>
        </footer>

        <!-- ================= DYNAMIC JAVASCRIPT LOGIC ================= -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const statusSelect = document.getElementById('status_perbaikan');
                const biayaDisplay = document.getElementById('biaya_display');
                const noteBatal = document.getElementById('note_batal');

                @if($service)
                    const originalBiaya = {{ $service->biaya_perbaikan > 50000 ? $service->biaya_perbaikan : 300000 }};
                    const biayaKonsul = {{ $service->biaya_konsul ?: 50000 }};

                    function updateBiaya() {
                        if (!statusSelect || !biayaDisplay) return;

                        if (statusSelect.value === 'Batalkan Perbaikan') {
                            biayaDisplay.value = 'Rp ' + Number(biayaKonsul).toLocaleString('id-ID') + ' (Biaya Konsul)';
                            if (noteBatal) noteBatal.classList.remove('hidden');
                        } else {
                            biayaDisplay.value = 'Rp ' + Number(originalBiaya).toLocaleString('id-ID');
                            if (noteBatal) noteBatal.classList.add('hidden');
                        }
                    }

                    if (statusSelect) {
                        statusSelect.addEventListener('change', updateBiaya);
                    }
                @endif
            });
        </script>
    </body>
</html>
