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
    <body class="bg-white text-gray-900 font-sans antialiased min-h-screen flex flex-col">

        <!-- ================= NAVBAR ================= -->
        <header class="w-full bg-[#60656F] text-white py-3.5 px-6 sm:px-12 sticky top-0 z-50 shadow-md">
            <div class="max-w-6xl mx-auto flex items-center justify-between">
                <!-- Brand -->
                <a href="{{ route('customer.index') }}" class="text-xl sm:text-2xl font-bold tracking-tight text-white hover:opacity-90 transition">
                    SudahRusak
                </a>

                <!-- Nav Menu -->
                <nav class="flex items-center space-x-2 sm:space-x-4 text-sm font-medium">
                    <a href="#beranda"
                       class="bg-white text-gray-900 px-4 py-1.5 rounded-md font-semibold shadow-sm transition">
                        Beranda
                    </a>
                    <a href="#tentang-kami"
                       class="text-white hover:text-gray-200 px-3 py-1.5 rounded-md transition">
                        Tentang Kami
                    </a>
                    <a href="#kontak-kami"
                       class="text-white hover:text-gray-200 px-3 py-1.5 rounded-md transition">
                        Kontak Kami
                    </a>
                </nav>
            </div>
        </header>

        <!-- ================= HERO SECTION ================= -->
        <section id="beranda" class="w-full bg-[#D9D9D9] py-16 sm:py-20 px-6 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-2xl sm:text-4xl font-normal text-gray-900 mb-3 tracking-normal">
                    Selamat Datang
                </h1>
                <p class="text-base sm:text-lg text-gray-700 max-w-xl mx-auto font-light">
                    Solusi perbaikan perangkat elektronik terpercaya, cepat, dan transparan untuk laptop, PC, dan gadget Anda.
                </p>
            </div>
        </section>

        <!-- ================= LACAK SERVICE SECTION ================= -->
        <section id="lacak-service" class="w-full py-12 sm:py-16 px-4 sm:px-6">
            <div class="max-w-4xl mx-auto">

                <!-- Section Heading -->
                <div class="text-center mb-6">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 tracking-tight">
                        Lacak Service
                    </h2>
                    <div class="w-32 sm:w-40 h-2.5 bg-[#D1D5DB] rounded-full mx-auto mt-2"></div>
                </div>

                <!-- Search Bar Form -->
                <form method="GET" action="{{ route('customer.index') }}#lacak-service" class="max-w-2xl mx-auto mb-8">
                    <div class="flex items-center shadow-sm">
                        <input type="text"
                               name="resi"
                               value="{{ old('resi', $resi) }}"
                               placeholder="Lacak Service (Contoh: 6X752)"
                               required
                               class="flex-1 bg-[#D9D9D9] hover:bg-[#D0D0D0] focus:bg-white text-gray-900 placeholder-gray-600 px-5 py-3 rounded-l-md border-none focus:outline-none focus:ring-2 focus:ring-gray-500 text-sm sm:text-base transition" />
                        <button type="submit"
                                class="bg-[#5D5D5D] hover:bg-[#474747] active:bg-[#333333] text-white px-6 py-3 rounded-r-md flex items-center justify-center transition cursor-pointer">
                            <svg class="w-6 h-6 stroke-current text-white" fill="none" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Quick suggestions -->
                    <div class="mt-2.5 text-center text-xs text-gray-500">
                        Coba nomor resi contoh:
                        <a href="{{ route('customer.index', ['resi' => '6X752']) }}#lacak-service" class="text-blue-600 font-semibold hover:underline mr-2">#6X752</a>
                        <a href="{{ route('customer.index', ['resi' => 'SR-001']) }}#lacak-service" class="text-blue-600 font-semibold hover:underline mr-2">#SR-001</a>
                        <a href="{{ route('customer.index', ['resi' => 'SR-002']) }}#lacak-service" class="text-blue-600 font-semibold hover:underline mr-2">#SR-002</a>
                        <a href="{{ route('customer.index', ['resi' => 'SR-003']) }}#lacak-service" class="text-blue-600 font-semibold hover:underline">#SR-003</a>
                    </div>
                </form>

                <!-- Feedback Notifications -->
                @if(session('success'))
                    <div class="max-w-2xl mx-auto mb-6 p-4 bg-green-50 border border-green-200 text-green-800 text-sm rounded-lg flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if($error)
                    <div class="max-w-2xl mx-auto mb-6 p-4 bg-red-50 border border-red-200 text-red-800 text-sm rounded-lg flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ $error }}</span>
                    </div>
                @endif

                <!-- ================= CARD HASIL LACAK PESANAN ================= -->
                @if($service)
                    <div class="bg-[#D9D9D9] rounded-2xl p-6 sm:p-10 shadow-sm border border-gray-300">

                        <!-- Heading Nomor Pesanan -->
                        <div class="mb-8">
                            <h3 class="text-xl sm:text-2xl font-bold tracking-tight text-gray-900">
                                PESANAN <span class="text-[#0084FF]">#{{ $service->no_resi }}</span>
                            </h3>
                        </div>

                        <!-- Stepper Progress Bar -->
                        <div class="relative mb-10 px-4 sm:px-8">
                            <!-- Background line -->
                            <div class="absolute top-4 left-10 right-10 h-2 bg-[#9E9E9E] rounded-full z-0"></div>

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
                            <div class="absolute top-4 left-10 h-2 bg-[#5D5D5D] rounded-full z-0 transition-all duration-500"
                                 style="width: {{ $lineWidthPercent }};"></div>

                            <!-- 4 Step Indicator Nodes -->
                            <div class="relative z-10 flex justify-between items-center">
                                @for($i = 1; $i <= 4; $i++)
                                    <div class="flex flex-col items-center">
                                        @if($i <= $service->tahap)
                                            <!-- Completed or Current step: dark circle with checkmark -->
                                            <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-[#5D5D5D] border-2 border-white flex items-center justify-center text-white shadow-md">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5 stroke-current" fill="none" stroke-width="3" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                        @else
                                            <!-- Upcoming step: gray circle with dotted/spinner ring -->
                                            <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-[#A3A3A3] border-2 border-white flex items-center justify-center text-white shadow-md">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5 animate-pulse text-white/80" fill="currentColor" viewBox="0 0 24 24">
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
                            <div class="py-3 px-2 flex items-center justify-center space-x-2 transition-all {{ $service->tahap == 1 ? 'bg-white rounded-t-xl shadow-sm text-gray-900 font-bold' : 'text-gray-700' }}">
                                <div class="w-7 h-7 shrink-0 text-[#0084FF] flex items-center justify-center">
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 14H6v-2h6v2zm4-4H6v-2h10v2zm0-4H6V7h10v2z"/>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold leading-tight text-left">
                                    Pesanan<br/>Dibuat
                                </span>
                            </div>

                            <!-- Tab 2: Pengecekan Perangkat -->
                            <div class="py-3 px-2 flex items-center justify-center space-x-2 transition-all {{ $service->tahap == 2 ? 'bg-white rounded-t-xl shadow-sm text-gray-900 font-bold' : 'text-gray-700' }}">
                                <div class="w-7 h-7 shrink-0 text-[#0084FF] flex items-center justify-center">
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
                            <div class="py-3 px-2 flex items-center justify-center space-x-2 transition-all {{ $service->tahap == 3 ? 'bg-white rounded-t-xl shadow-sm text-gray-900 font-bold' : 'text-gray-700' }}">
                                <div class="w-7 h-7 shrink-0 text-[#0084FF] flex items-center justify-center">
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                        <path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/>
                                    </svg>
                                </div>
                                <span class="text-xs sm:text-sm font-semibold leading-tight text-left">
                                    Perbaikan<br/>Perangkat
                                </span>
                            </div>

                            <!-- Tab 4: Perbaikan Selesai -->
                            <div class="py-3 px-2 flex items-center justify-center space-x-2 transition-all {{ $service->tahap == 4 ? 'bg-white rounded-t-xl shadow-sm text-gray-900 font-bold' : 'text-gray-700' }}">
                                <div class="w-7 h-7 shrink-0 text-[#0084FF] flex items-center justify-center">
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
                        <div class="bg-white rounded-b-xl rounded-tr-xl p-6 sm:p-8 shadow-sm">

                            <!-- Underlined Sub-Header -->
                            <div class="mb-6">
                                <h4 class="text-sm sm:text-base font-bold text-gray-900 border-b-2 border-black inline-block pb-1">
                                    {{ $service->tahap_label }}
                                </h4>
                            </div>

                            <!-- Two Columns Details Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-10">

                                <!-- Left Column: Readonly Perangkat & Keluhan Info -->
                                <div class="space-y-3.5">
                                    <!-- Nama Customer -->
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 sm:gap-3">
                                        <label class="text-xs font-semibold text-gray-800 sm:w-36 shrink-0">
                                            Nama Customer
                                        </label>
                                        <input type="text"
                                               readonly
                                               value="{{ $service->nama_customer }}"
                                               class="w-full bg-[#D9D9D9] border-none rounded px-3 py-1.5 text-xs text-gray-900 font-medium focus:ring-0 cursor-default" />
                                    </div>

                                    <!-- Jenis Perangkat -->
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 sm:gap-3">
                                        <label class="text-xs font-semibold text-gray-800 sm:w-36 shrink-0">
                                            Jenis Perangkat
                                        </label>
                                        <input type="text"
                                               readonly
                                               value="{{ $service->jenis_perangkat }}"
                                               class="w-full bg-[#D9D9D9] border-none rounded px-3 py-1.5 text-xs text-gray-900 font-medium focus:ring-0 cursor-default" />
                                    </div>

                                    <!-- Keluhan -->
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 sm:gap-3">
                                        <label class="text-xs font-semibold text-gray-800 sm:w-36 shrink-0">
                                            Keluhan
                                        </label>
                                        <input type="text"
                                               readonly
                                               value="{{ $service->keluhan }}"
                                               class="w-full bg-[#D9D9D9] border-none rounded px-3 py-1.5 text-xs text-gray-900 font-medium focus:ring-0 cursor-default" />
                                    </div>

                                    <!-- Masalah Ditemukan -->
                                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-1 sm:gap-3">
                                        <label class="text-xs font-semibold text-gray-800 sm:w-36 shrink-0 pt-1">
                                            Masalah Ditemukan
                                        </label>
                                        <textarea readonly
                                                  rows="3"
                                                  class="w-full bg-[#D9D9D9] border-none rounded px-3 py-1.5 text-xs text-gray-900 font-medium leading-relaxed resize-none focus:ring-0 cursor-default">{{ $service->masalah_ditemukan }}</textarea>
                                    </div>
                                </div>

                                <!-- Right Column: Form Interaktif Status, Pengantaran & Biaya -->
                                <div>
                                    <form method="POST" action="{{ route('customer.update', $service->id) }}" class="space-y-4">
                                        @csrf

                                        <!-- Status Perbaikan -->
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 sm:gap-3">
                                            <label for="status_perbaikan" class="text-xs font-semibold text-gray-800 sm:w-32 shrink-0">
                                                Status Perbaikan
                                            </label>
                                            <div class="w-full relative">
                                                <select id="status_perbaikan"
                                                        name="status_perbaikan"
                                                        class="w-full bg-white border border-gray-400 rounded px-3 py-1.5 text-xs text-gray-900 focus:outline-none focus:border-black font-medium transition cursor-pointer">
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
                                            <label class="text-xs font-semibold text-gray-800 sm:w-32 shrink-0">
                                                Pengantaran
                                            </label>
                                            <div class="w-full flex items-center space-x-6">
                                                <label class="inline-flex items-center text-xs font-normal text-gray-800 cursor-pointer">
                                                    <input type="radio"
                                                           name="pengantaran"
                                                           value="Diantar"
                                                           {{ $service->pengantaran == 'Diantar' ? 'checked' : '' }}
                                                           class="mr-2 text-gray-800 focus:ring-0" />
                                                    Diantar
                                                </label>
                                                <label class="inline-flex items-center text-xs font-normal text-gray-800 cursor-pointer">
                                                    <input type="radio"
                                                           name="pengantaran"
                                                           value="Ambil Sendiri"
                                                           {{ $service->pengantaran == 'Ambil Sendiri' ? 'checked' : '' }}
                                                           class="mr-2 text-gray-800 focus:ring-0" />
                                                    Ambil Sendiri
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Biaya Perbaikan (Dynamic based on Edvin's note) -->
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 sm:gap-3">
                                            <label class="text-xs font-semibold text-gray-800 sm:w-32 shrink-0">
                                                Biaya Perbaikan
                                            </label>
                                            <div class="w-full">
                                                <input id="biaya_display"
                                                       type="text"
                                                       readonly
                                                       value="Rp {{ number_format($service->biaya_perbaikan, 0, ',', '.') }}"
                                                       class="w-full bg-[#D9D9D9] border-none rounded px-3 py-1.5 text-xs text-gray-900 font-bold focus:ring-0 cursor-default" />
                                                <p id="note_batal" class="text-[11px] text-red-600 mt-1 font-medium {{ $service->status_perbaikan == 'Batalkan Perbaikan' ? '' : 'hidden' }}">
                                                    *Jika dibatalkan, dikenakan biaya konsul sebesar Rp 50.000.
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Tombol Simpan -->
                                        <div class="pt-2 flex justify-end">
                                            <button type="submit"
                                                    class="bg-[#5D5D5D] hover:bg-[#474747] active:bg-[#333333] text-white px-7 py-2 rounded text-xs font-semibold shadow-sm transition-colors cursor-pointer">
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
        <section id="tentang-kami" class="w-full py-12 sm:py-16 px-4 sm:px-6 bg-[#F9FAFB] border-t border-gray-200">
            <div class="max-w-4xl mx-auto">
                <!-- Section Heading -->
                <div class="text-center mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 tracking-tight">
                        Tentang Kami
                    </h2>
                    <div class="w-32 sm:w-40 h-2.5 bg-[#D1D5DB] rounded-full mx-auto mt-2"></div>
                </div>

                <!-- Two Box Layout: Foto & Tulisan per Wireframe -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch mb-8">
                    <!-- Foto Box -->
                    <div class="bg-[#D9D9D9] rounded-xl p-8 min-h-[220px] flex flex-col items-center justify-center text-center shadow-sm">
                        <div class="w-14 h-14 bg-gray-400/50 rounded-full flex items-center justify-center mb-3">
                            <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-gray-800">Workshop & Teknisi</span>
                        <p class="text-xs text-gray-600 mt-1">Peralatan modern & bersertifikasi</p>
                    </div>

                    <!-- Tulisan Box -->
                    <div class="bg-[#EBEBEB] rounded-xl p-6 sm:p-8 flex flex-col justify-center shadow-sm">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Pusat Servis SudahRusak</h3>
                        <p class="text-sm text-gray-700 leading-relaxed mb-3">
                            SudahRusak adalah penyedia jasa perbaikan perangkat elektronik terkemuka yang menangani kerusakan hardware dan software mulai dari laptop, PC, smartphone, monitor, hingga konsol game.
                        </p>
                        <p class="text-sm text-gray-700 leading-relaxed">
                            Kami mengedepankan kejujuran, garansi servis, dan estimasi waktu yang transparan yang bisa dilacak kapan saja oleh pelanggan secara online.
                        </p>
                    </div>
                </div>

                <!-- Galeri Servis (Sesuai Catatan Edvin di Wireframe) -->
                <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                    <h4 class="text-sm font-bold text-gray-800 mb-4 uppercase tracking-wider">
                        Galeri Servis & Portofolio
                    </h4>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="bg-gray-100 rounded-lg p-4 text-center border border-gray-200">
                            <span class="text-2xl block mb-1">💻</span>
                            <span class="text-xs font-semibold text-gray-800">Ganti LCD & Engsel</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 text-center border border-gray-200">
                            <span class="text-2xl block mb-1">⌨️</span>
                            <span class="text-xs font-semibold text-gray-800">Keyboard & Touchpad</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 text-center border border-gray-200">
                            <span class="text-2xl block mb-1">⚡</span>
                            <span class="text-xs font-semibold text-gray-800">Motherboard & IC Power</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 text-center border border-gray-200">
                            <span class="text-2xl block mb-1">❄️</span>
                            <span class="text-xs font-semibold text-gray-800">Cleaning & Thermal Paste</span>
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
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 tracking-tight">
                        Temukan Kami
                    </h2>
                    <div class="w-32 sm:w-40 h-2.5 bg-[#D1D5DB] rounded-full mx-auto mt-2"></div>
                </div>

                <!-- Big Map Box per Wireframe -->
                <div class="bg-[#D9D9D9] rounded-2xl overflow-hidden shadow-sm border border-gray-300 relative min-h-[300px] sm:min-h-[360px] flex items-center justify-center">
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
        <section id="kontak-kami" class="w-full py-12 sm:py-16 px-4 sm:px-6 bg-[#EFEFEF] border-t border-gray-300">
            <div class="max-w-4xl mx-auto">
                <!-- Section Heading -->
                <div class="text-center mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 tracking-tight">
                        Kontak Kami
                    </h2>
                    <div class="w-32 sm:w-40 h-2.5 bg-[#D1D5DB] rounded-full mx-auto mt-2"></div>
                </div>

                <!-- Contact Info Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- WhatsApp / CS -->
                    <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <span class="text-2xl">💬</span>
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm mb-1">WhatsApp & Telepon</h4>
                        <p class="text-xs text-gray-600 mb-2">Layanan Cepat Customer Service</p>
                        <a href="https://wa.me/6281234567890" target="_blank" class="text-xs font-bold text-green-600 hover:underline">
                            +62 812-3456-7890
                        </a>
                    </div>

                    <!-- Email Support -->
                    <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <span class="text-2xl">✉️</span>
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm mb-1">Email Resmi</h4>
                        <p class="text-xs text-gray-600 mb-2">Konsultasi & Penawaran</p>
                        <a href="mailto:support@sudahrusak.com" class="text-xs font-bold text-blue-600 hover:underline">
                            support@sudahrusak.com
                        </a>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                        <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <span class="text-2xl">🕒</span>
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm mb-1">Jam Operasional</h4>
                        <p class="text-xs text-gray-600 mb-1">Senin - Sabtu: 09:00 - 20:00 WIB</p>
                        <p class="text-xs text-gray-500">Minggu & Libur Nasional Tutup</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= FOOTER ================= -->
        <footer class="w-full bg-[#60656F] text-white py-6 px-6 text-center text-xs">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
                <span class="font-semibold">SudahRusak &copy; {{ date('Y') }}. All rights reserved.</span>
                <span class="text-gray-300">Modul Customer - Pelacakan Service Elektronik</span>
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
