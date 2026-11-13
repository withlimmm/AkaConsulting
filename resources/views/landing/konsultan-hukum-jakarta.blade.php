@extends('layouts.main')

@section('title', 'Konsultan Hukum Jakarta untuk Bisnis & Perizinan | AKA Consulting')
@section('meta_description', 'Butuh konsultan hukum di Jakarta? AKA Consulting mendampingi pendirian PT/CV, perizinan OSS, PBG/SLF, merek, halal & BPOM, tender, hingga litigasi. Kantor di Jakarta Timur, konsultasi gratis.')

@php
    $mainPhone = preg_replace('/[^0-9]/', '', $settings->phone ?? '');
    if (str_starts_with($mainPhone, '0')) $mainPhone = '62' . substr($mainPhone, 1);
    $waUrl = $mainPhone
        ? 'https://wa.me/' . $mainPhone . '?text=' . urlencode('Halo AKA Consulting, saya butuh konsultan hukum di Jakarta untuk ')
        : url('/#kontak');

    $officeAddress = trim(preg_replace('/^alamat[^:]*:\s*/i', '', (string) ($settings->address ?? '')));

    $areas = [
        ['Jakarta Timur', 'Lokasi kantor kami di Cipayung — paling mudah untuk tatap muka.'],
        ['Jakarta Selatan', 'Perusahaan di kawasan SCBD, Kuningan, TB Simatupang, dan sekitarnya.'],
        ['Jakarta Pusat', 'Bisnis di Sudirman, Thamrin, Tanah Abang, dan Kemayoran.'],
        ['Jakarta Barat', 'Pelaku usaha di Kebon Jeruk, Grogol, Cengkareng, dan Puri.'],
        ['Jakarta Utara', 'Perusahaan logistik, industri, dan perdagangan di Kelapa Gading hingga Tanjung Priok.'],
        ['Bodetabek', 'Bekasi, Depok, Bogor, Tangerang, dan Tangerang Selatan.'],
    ];

    $steps = [
        ['Konsultasi awal gratis', 'Ceritakan kebutuhan atau masalah hukum bisnis Anda melalui WhatsApp, telepon, atau tatap muka di kantor kami.'],
        ['Analisis & rekomendasi', 'Tim kami memetakan regulasi yang berlaku, dokumen yang dibutuhkan, risiko, serta estimasi waktu dan biaya.'],
        ['Pengerjaan & pendampingan', 'Kami mengurus dokumen, pengajuan ke instansi terkait, dan memberi kabar progres secara berkala.'],
        ['Serah terima & aftercare', 'Dokumen legal diserahkan lengkap, disertai panduan kepatuhan agar bisnis tetap aman ke depannya.'],
    ];

    $faqs = [
        [
            'question' => 'Apa saja layanan konsultan hukum AKA Consulting di Jakarta?',
            'answer' => 'Kami membantu legalitas dan pendirian badan usaha (PT, CV, yayasan, perubahan anggaran dasar), perizinan berusaha melalui OSS, PBG dan SLF, perizinan lingkungan, PKP, pendaftaran merek, sertifikasi halal dan BPOM, pengurusan tender, pertanahan, serta layanan litigasi dan non-litigasi.',
        ],
        [
            'question' => 'Di mana lokasi kantor AKA Consulting?',
            'answer' => 'Kantor kami berada di ' . ($officeAddress ?: 'Jakarta Timur') . '. Kami melayani klien di seluruh wilayah DKI Jakarta dan Bodetabek, baik tatap muka maupun online.',
        ],
        [
            'question' => 'Apakah konsultasi awalnya gratis?',
            'answer' => 'Ya. Konsultasi awal untuk memahami kebutuhan Anda tidak dipungut biaya. Setelah itu kami memberikan rekomendasi langkah, daftar dokumen, serta penawaran biaya yang transparan sebelum pekerjaan dimulai.',
        ],
        [
            'question' => 'Apakah bisa konsultasi hukum secara online?',
            'answer' => 'Bisa. Sebagian besar proses, mulai dari konsultasi, pengumpulan dokumen, hingga pembaruan progres, dapat dilakukan secara online melalui WhatsApp dan email, sehingga cocok untuk klien yang sibuk atau berada di luar Jakarta.',
        ],
        [
            'question' => 'Berapa lama proses pendirian PT di Jakarta?',
            'answer' => 'Lamanya bergantung pada kelengkapan dokumen dan jenis perizinan yang dibutuhkan. Setelah konsultasi awal, kami akan memberikan estimasi waktu yang jelas untuk setiap tahap, mulai dari pengesahan akta hingga NIB terbit di OSS.',
        ],
        [
            'question' => 'Siapa saja klien yang dilayani AKA Consulting?',
            'answer' => 'Kami mendampingi UMKM, startup, perusahaan nasional, hingga investor asing (PMA) yang ingin menjalankan bisnis di Jakarta secara legal dan patuh regulasi.',
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">{!! \App\Support\Seo::encode(\App\Support\Seo::faqPage($faqs)) !!}</script>
<script type="application/ld+json">{!! \App\Support\Seo::encode(\App\Support\Seo::breadcrumb([
    ['Beranda', url('/')],
    ['Konsultan Hukum Jakarta', route('landing.jakarta')],
])) !!}</script>
<script type="application/ld+json">{!! \App\Support\Seo::encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Konsultan Hukum Jakarta',
    'serviceType' => 'Konsultasi hukum bisnis dan perizinan usaha',
    'provider' => ['@id' => \App\Support\Seo::businessId()],
    'areaServed' => ['@type' => 'City', 'name' => 'Jakarta'],
    'url' => route('landing.jakarta'),
]) !!}</script>
@endpush

@section('content')
<div class="pt-24 bg-[#f7f2e8]">

    {{-- HERO --}}
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(217,161,26,0.14),_transparent_38%),radial-gradient(circle_at_bottom_right,_rgba(73,53,28,0.08),_transparent_35%)]"></div>
        <div class="content-container relative z-10 py-12 md:py-20">
            <nav aria-label="Breadcrumb" class="mb-6 text-xs font-bold text-on-surface-variant">
                <a href="{{ url('/') }}" class="hover:text-[#8d6408]">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-[#8d6408]">Konsultan Hukum Jakarta</span>
            </nav>
            <div class="max-w-3xl space-y-6">
                <span class="inline-flex items-center gap-2 rounded-full border border-[#d9a11a]/25 bg-white/70 px-4 py-2 text-xs font-black uppercase tracking-[0.25em] text-[#8d6408] shadow-sm">
                    <span class="material-symbols-outlined notranslate text-[18px]" translate="no">location_on</span>
                    Jakarta &amp; Bodetabek
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-[1.05] tracking-tight text-on-surface">
                    Konsultan Hukum Jakarta untuk <span class="text-[#8d6408]">Bisnis &amp; Perizinan Usaha</span>
                </h1>
                <p class="text-base md:text-lg text-on-surface-variant leading-relaxed">
                    AKA Consulting adalah konsultan hukum dan perizinan yang berkantor di Jakarta Timur. Kami membantu pemilik usaha, perusahaan, dan investor menyelesaikan urusan legal secara tepat, cepat, dan sesuai regulasi — mulai dari pendirian PT, perizinan OSS, hingga pendampingan sengketa.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 pt-2">
                    <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#8d6408] px-7 py-4 font-black text-white shadow-[0_18px_45px_rgba(141,100,8,0.24)] transition-all duration-300 hover:-translate-y-1 hover:bg-[#6f4d05]">
                        Konsultasi Gratis via WhatsApp
                        <span class="material-symbols-outlined notranslate text-[18px]" translate="no">chat</span>
                    </a>
                    <a href="{{ route('services') }}" class="inline-flex items-center justify-center gap-2 rounded-full border border-[#8d6408]/20 bg-white/80 px-7 py-4 font-black text-[#4a3620] shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#8d6408] hover:text-[#8d6408]">
                        Lihat Semua Layanan
                        <span class="material-symbols-outlined notranslate text-[18px]" translate="no">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- INTRO --}}
    <section class="page-section bg-white">
        <div class="content-container max-w-4xl space-y-6 text-on-surface-variant leading-relaxed">
            <h2 class="section-title text-on-surface">Mengapa Bisnis di Jakarta Butuh Konsultan Hukum?</h2>
            <p>
                Sebagai pusat bisnis Indonesia, Jakarta memiliki regulasi usaha yang paling dinamis — dari Perizinan Berusaha Berbasis Risiko (OSS RBA), ketentuan tata ruang dan bangunan (PBG &amp; SLF), hingga kewajiban perpajakan dan perlindungan merek. Satu dokumen yang kurang atau salah klasifikasi KBLI bisa membuat izin tertunda, usaha tidak bisa ikut tender, bahkan berujung sanksi.
            </p>
            <p>
                Di sinilah peran konsultan hukum. Tim AKA Consulting memastikan setiap langkah legal bisnis Anda benar sejak awal, sehingga Anda bisa fokus menjalankan dan mengembangkan usaha tanpa khawatir masalah hukum di kemudian hari.
            </p>
        </div>
    </section>

    {{-- LAYANAN --}}
    @if($groupedServices->isNotEmpty())
    <section class="page-section bg-[#f7f2e8]">
        <div class="content-container space-y-10">
            <div class="max-w-3xl space-y-3">
                <span class="section-kicker">Layanan</span>
                <h2 class="section-title">Layanan Konsultan Hukum &amp; Perizinan di Jakarta</h2>
                <p class="section-subtitle">Pilih layanan sesuai kebutuhan bisnis Anda. Setiap layanan ditangani oleh tim yang memahami prosedur instansi di Jakarta.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($groupedServices as $category => $items)
                <div class="rounded-[1.75rem] border border-[#e6d7b7] bg-white p-7 shadow-sm">
                    <h3 class="text-lg font-black text-on-surface mb-4">{{ __t($category) }}</h3>
                    <ul class="space-y-2.5">
                        @foreach($items as $service)
                        <li>
                            <a href="{{ route('services.show', $service->slug) }}" class="group flex items-start gap-2 text-sm text-on-surface-variant hover:text-[#8d6408]">
                                <span class="material-symbols-outlined notranslate text-[16px] mt-0.5 text-[#d9a11a]" translate="no">check_circle</span>
                                <span>{{ __t($service->title) }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- KENAPA AKA --}}
    <section class="page-section bg-white">
        <div class="content-container space-y-10">
            <div class="max-w-3xl space-y-3">
                <span class="section-kicker">Keunggulan</span>
                <h2 class="section-title">Kenapa Memilih AKA Consulting sebagai Konsultan Hukum di Jakarta?</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach([
                    ['location_on', 'Berbasis di Jakarta', 'Kantor kami di Jakarta Timur memudahkan pertemuan tatap muka dan pengurusan langsung ke instansi di wilayah DKI Jakarta.'],
                    ['gavel', 'Hukum & perizinan dalam satu tim', 'Tidak perlu berpindah-pindah vendor: legalitas, perizinan, sertifikasi, tender, hingga sengketa ditangani dalam satu alur kerja.'],
                    ['receipt_long', 'Biaya transparan', 'Anda menerima rincian pekerjaan, dokumen, dan biaya di awal — tanpa biaya tersembunyi di tengah proses.'],
                    ['update', 'Progres yang jelas', 'Setiap tahap dilaporkan secara berkala sehingga Anda selalu tahu posisi pengurusan dokumen Anda.'],
                ] as [$icon, $title, $desc])
                <div class="flex gap-4 rounded-[1.5rem] border border-[#efe4cc] bg-[#fbf8f1] p-6">
                    <span class="material-symbols-outlined notranslate text-[28px] text-[#8d6408] shrink-0" translate="no">{{ $icon }}</span>
                    <div>
                        <h3 class="font-black text-on-surface mb-1">{{ $title }}</h3>
                        <p class="text-sm text-on-surface-variant leading-relaxed">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- AREA --}}
    <section class="page-section bg-[#f7f2e8]">
        <div class="content-container space-y-10">
            <div class="max-w-3xl space-y-3">
                <span class="section-kicker">Area Layanan</span>
                <h2 class="section-title">Melayani Seluruh Wilayah Jakarta</h2>
                <p class="section-subtitle">Konsultasi bisa dilakukan tatap muka di kantor kami, di lokasi Anda, atau sepenuhnya online.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($areas as [$area, $desc])
                <div class="rounded-[1.5rem] border border-[#e6d7b7] bg-white p-6">
                    <h3 class="font-black text-on-surface mb-1">Konsultan Hukum {{ $area }}</h3>
                    <p class="text-sm text-on-surface-variant leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PROSES --}}
    <section class="page-section bg-white">
        <div class="content-container space-y-10">
            <div class="max-w-3xl space-y-3">
                <span class="section-kicker">Proses Kerja</span>
                <h2 class="section-title">Cara Kerja Kami</h2>
            </div>
            <ol class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($steps as $i => [$title, $desc])
                <li class="rounded-[1.5rem] border border-[#efe4cc] bg-[#fbf8f1] p-6">
                    <span class="text-3xl font-black text-[#d9a11a]">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 class="mt-3 font-black text-on-surface">{{ $title }}</h3>
                    <p class="mt-2 text-sm text-on-surface-variant leading-relaxed">{{ $desc }}</p>
                </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="page-section bg-[#f7f2e8]">
        <div class="content-container max-w-3xl space-y-8">
            <div class="text-center space-y-3">
                <span class="section-kicker">F.A.Q</span>
                <h2 class="section-title">Pertanyaan Seputar Konsultan Hukum di Jakarta</h2>
            </div>
            <div class="space-y-4">
                @foreach($faqs as $faq)
                <details class="group rounded-[1.25rem] border border-[#e6d7b7] bg-white p-6 open:shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-black text-on-surface">
                        <h3 class="text-base">{{ $faq['question'] }}</h3>
                        <span class="material-symbols-outlined notranslate text-[#8d6408] transition-transform group-open:rotate-45" translate="no">add</span>
                    </summary>
                    <p class="mt-4 text-sm text-on-surface-variant leading-relaxed">{{ $faq['answer'] }}</p>
                </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- KANTOR + CTA --}}
    <section class="page-section bg-white">
        <div class="content-container grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div class="space-y-5">
                <span class="section-kicker">Kantor Kami</span>
                <h2 class="section-title">Kunjungi Kantor AKA Consulting di Jakarta</h2>
                @if($officeAddress)
                <p class="flex gap-3 text-on-surface-variant leading-relaxed">
                    <span class="material-symbols-outlined notranslate text-[#8d6408]" translate="no">location_on</span>
                    <span>{{ $officeAddress }}</span>
                </p>
                @endif
                <p class="flex gap-3 text-on-surface-variant">
                    <span class="material-symbols-outlined notranslate text-[#8d6408]" translate="no">schedule</span>
                    <span>Senin – Jumat, 08.00 – 17.00 WIB</span>
                </p>
                @if(!empty($settings->phone))
                <p class="flex gap-3 text-on-surface-variant">
                    <span class="material-symbols-outlined notranslate text-[#8d6408]" translate="no">call</span>
                    <a href="tel:{{ \App\Support\Seo::phoneE164($settings->phone) }}" class="hover:text-[#8d6408]">{{ $settings->phone }}</a>
                </p>
                @endif
                <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#8d6408] px-7 py-4 font-black text-white transition-all duration-300 hover:-translate-y-1 hover:bg-[#6f4d05]">
                    Jadwalkan Konsultasi Gratis
                    <span class="material-symbols-outlined notranslate text-[18px]" translate="no">arrow_forward</span>
                </a>
            </div>
            @if(!empty($settings->maps_url) && str_contains($settings->maps_url, '/maps/embed'))
            <div class="overflow-hidden rounded-[1.75rem] border border-[#e6d7b7] shadow-sm aspect-[4/3]">
                <iframe src="{{ $settings->maps_url }}" title="Lokasi kantor AKA Consulting di Jakarta Timur" class="h-full w-full" style="border:0" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection
