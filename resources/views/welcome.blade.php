@extends('layouts.main')

@section('title', __('AKA Consulting, Konsultan Terpercaya'))
@section('meta_description', __('AKA Consulting, Konsultan Terpercaya adalah firma konsultasi profesional yang menyediakan layanan konsultasi hukum, perizinan, dan manajemen bisnis untuk membantu pertumbuhan dan kepatuhan perusahaan.'))

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .testimonial-swiper .swiper-pagination-bullet-active {
        background: #d9a11a !important;
        width: 24px;
        border-radius: 4px;
    }
    .testimonial-swiper .swiper-pagination {
        bottom: 0 !important;
    }
    .testimonial-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .testimonial-card:hover {
        background-color: #8d6408 !important;
        transform: translateY(-8px);
    }
    .testimonial-card:hover p, 
    .testimonial-card:hover span:not(.material-symbols-outlined) {
        color: rgba(255, 255, 255, 0.9) !important;
        
    }
    .testimonial-card:hover .text-on-surface,
    .testimonial-card:hover .font-bold {
        color: #ffffff !important;
    }
    .testimonial-card:hover .text-primary {
        color: #ffffff !important;
    }
    .testimonial-card:hover .material-symbols-outlined {
        color: #ffffff !important;
    }
    .testimonial-card:hover .border-t {
        border-color: rgba(255, 255, 255, 0.2) !important;
    }
</style>
@endpush

@section('content')
@php
    $whatsAppText = __('Halo, saya ingin konsultasi layanan hukum dan perizinan untuk bisnis saya.');
    $whatsAppUrl = 'https://wa.me/' . $whatsAppNumber . '?text=' . urlencode($whatsAppText);
@endphp

{{-- ═══════════════════════════════════════════════
    HERO SECTION
═══════════════════════════════════════════════ --}}
<section class="relative min-h-[90vh] flex items-center bg-[#f7f2e8] overflow-hidden pt-24 pb-16" data-hero-parallax>
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(217,161,26,0.14),_transparent_38%),radial-gradient(circle_at_bottom_right,_rgba(73,53,28,0.08),_transparent_35%)]"></div>
        <div class="bg-grid-pattern absolute inset-0 opacity-[0.05]"></div>
    </div>
    
    <div class="content-container grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center relative z-10 py-12 md:py-16">
        {{-- Text --}}
        <div class="flex flex-col gap-6 text-center lg:text-left" 
             x-data="{ 
                text1: '', 
                fullText1: '{{ __('welcome.hero_prefix') }} ',
                showInovatif: false,
                text2: '',
                fullText2: '{{ __('welcome.hero_suffix') }}',
                init() {
                    let i = 0;
                    let timer1 = setInterval(() => {
                        this.text1 += this.fullText1.charAt(i);
                        i++;
                        if (i >= this.fullText1.length) {
                            clearInterval(timer1);
                            this.showInovatif = true;
                            setTimeout(() => {
                                let j = 0;
                                let timer2 = setInterval(() => {
                                    this.text2 += this.fullText2.charAt(j);
                                    j++;
                                    if (j >= this.fullText2.length) clearInterval(timer2);
                                }, 50);
                            }, 500);
                        }
                    }, 80);
                }
             }">
            <span class="inline-flex items-center gap-2 rounded-full border border-[#d9a11a]/25 bg-white/70 px-4 py-2 text-xs font-black uppercase tracking-[0.25em] text-[#8d6408] shadow-sm backdrop-blur-md self-center lg:self-start transition-all duration-700"
                  x-show="text1.length > 0" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <span class="material-symbols-outlined notranslate text-[18px]" translate="no">workspace_premium</span>
                AKA Consulting, Konsultan Terpercaya
            </span>
            
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-[1.05] tracking-tight text-on-surface min-h-[2.2em]">
                <span x-text="text1"></span><span class="text-[#8d6408]" x-text="text2"></span><span class="animate-pulse text-[#d9a11a]" x-show="text2.length < fullText2.length">|</span>
            </h1>

            <p class="text-base md:text-lg text-on-surface-variant max-w-xl mx-auto lg:mx-0 leading-relaxed transition-all duration-1000"
               x-show="text2.length === fullText2.length" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                {{ __('Partner profesional yang membantu bisnis bertumbuh melalui solusi legal dan perizinan yang terpercaya, efektif, dan berintegritas.') }}
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                <a href="#kontak" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#8d6408] px-7 py-4 font-black text-white shadow-[0_18px_45px_rgba(141,100,8,0.24)] transition-all duration-300 hover:-translate-y-1 hover:bg-[#6f4d05] w-full sm:w-auto text-center">
                    {{ __('Konsultasi Gratis') }}
                    <span class="material-symbols-outlined notranslate text-[18px]" translate="no">arrow_forward</span>
                </a>
                <a href="/portofolio" class="inline-flex items-center justify-center gap-2 rounded-full border border-[#8d6408]/20 bg-white/80 px-7 py-4 font-black text-[#4a3620] shadow-sm backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:border-[#8d6408] hover:text-[#8d6408] w-full sm:w-auto text-center">
                    {{ __('Lihat Portofolio') }}
                    <span class="material-symbols-outlined notranslate text-[18px]" translate="no">arrow_forward</span>
                </a>
            </div>
        </div>
        
        {{-- Visual --}}
        <div class="relative hidden lg:block" data-aos data-aos-delay="200">
            <div class="grid grid-cols-12 gap-4 items-stretch">
                <div class="col-span-8 rounded-[2rem] overflow-hidden shadow-2xl border border-white/60 bg-white aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=75&w=960"
                         alt="Tim AKA Consulting - Konsultasi Profesional"
                         width="960" height="1200"
                         fetchpriority="high"
                         loading="eager"
                         decoding="async"
                         class="h-full w-full object-cover">
                </div>
                <div class="col-span-4 flex flex-col gap-4">
                    <div class="rounded-[1.5rem] overflow-hidden shadow-xl border border-white/60 bg-white aspect-[1/1.1]">
                        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=70&w=480"
                             alt="Diskusi Legal AKA Consulting"
                             width="480" height="528"
                             loading="lazy"
                             decoding="async"
                             class="h-full w-full object-cover">
                    </div>
                    <div class="rounded-[1.5rem] overflow-hidden shadow-xl border border-white/60 bg-white aspect-[1/1.1]">
                        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=70&w=480"
                             alt="Rapat Korporat AKA Consulting"
                             width="480" height="528"
                             loading="lazy"
                             decoding="async"
                             class="h-full w-full object-cover">
                    </div>
                </div>
            </div>
            {{-- Floating stat --}}
            <div class="absolute -bottom-6 left-6 rounded-2xl border border-white/70 bg-white/85 px-5 py-4 shadow-xl backdrop-blur-md" data-float>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#8d6408]/15 flex items-center justify-center">
                        <span class="material-symbols-outlined notranslate text-[#8d6408] text-[20px]" translate="no">trending_up</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-[0.22em] text-[#8d6408]">{{ __('Konsultasi Bisnis') }}</p>
                        <p class="text-sm font-bold text-on-surface">Strategi & Kepatuhan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════
    CLIENT TRUST STRIP (Dual-Layer Infinite Marquee)
═══════════════════════════════════════════════ --}}
@if($client_logos->isNotEmpty())
<section class="page-section !py-20 bg-white border-b border-primary/10 overflow-hidden relative" data-aos>
    <div class="content-container mb-8">
        <p class="text-center text-on-surface-variant text-[10px] font-black uppercase tracking-[0.4em]">{{ __('Dipercaya Oleh Berbagai Industri') }}</p>
    </div>

    @php
        $totalLogos = $client_logos->count();
    @endphp

    @if($totalLogos <= 4)
        {{-- Statis di tengah jika logo sedikit --}}
        <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 pt-8 pb-4 px-4">
            @foreach ($client_logos as $client)
                <div class="group relative h-16 md:h-24 flex-shrink-0 flex items-center cursor-pointer">
                    @if($client->company_logo)
                        <img src="{{ asset('storage/' . $client->company_logo) }}" alt="{{ $client->company_name }}" 
                             class="h-full w-auto object-contain transition-all duration-500 group-hover:scale-110 grayscale hover:grayscale-0">
                    @else
                        <span class="text-on-surface-variant font-black text-xl tracking-tighter transition-all duration-500 group-hover:text-on-surface">{{ $client->company_name }}</span>
                    @endif
                    
                    {{-- Tooltip Nama --}}
                    <div class="absolute -top-10 left-1/2 -translate-x-1/2 px-4 py-2 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-xl opacity-0 scale-50 group-hover:opacity-100 group-hover:scale-100 transition-all duration-300 pointer-events-none whitespace-nowrap shadow-2xl z-50">
                        {{ $client->company_name }}
                        <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-primary rotate-45"></div>
                    </div>
                </div>
            @endforeach
        </div>
    @elseif($totalLogos <= 8)
        {{-- Satu Baris Marquee jika logo sedang --}}
        <div class="marquee-wrapper relative flex pt-16 pb-4">
            <div class="marquee-track flex gap-16 items-center">
                @php 
                    $displayRow = $client_logos->concat($client_logos)->concat($client_logos)->concat($client_logos); 
                @endphp
                @foreach ($displayRow as $client)
                    <div class="marquee-item group relative h-16 md:h-24 flex-shrink-0 flex items-center px-4 cursor-pointer">
                        @if($client->company_logo)
                            <img src="{{ asset('storage/' . $client->company_logo) }}" alt="{{ $client->company_name }}" 
                                 class="h-full w-auto object-contain transition-all duration-500 group-hover:scale-110">
                        @else
                            <span class="text-on-surface font-black text-xl tracking-tighter">{{ $client->company_name }}</span>
                        @endif
                        
                        <div class="absolute -top-10 left-1/2 -translate-x-1/2 px-4 py-2 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-xl opacity-0 scale-50 group-hover:opacity-100 group-hover:scale-100 transition-all duration-300 pointer-events-none whitespace-nowrap shadow-2xl z-50">
                            {{ $client->company_name }}
                            <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-primary rotate-45"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        {{-- Dua Baris Marquee jika logo sangat banyak --}}
        <div class="marquee-wrapper relative flex pt-16 pb-4">
            <div class="marquee-track flex gap-16 items-center">
                @php 
                    $row1 = $client_logos->split(2)[0] ?? collect(); 
                    $displayRow1 = $row1->concat($row1)->concat($row1)->concat($row1); 
                @endphp
                @foreach ($displayRow1 as $client)
                    <div class="marquee-item group relative h-16 md:h-24 flex-shrink-0 flex items-center px-4 cursor-pointer">
                        @if($client->company_logo)
                            <img src="{{ asset('storage/' . $client->company_logo) }}" alt="{{ $client->company_name }}" 
                                 class="h-full w-auto object-contain transition-all duration-500 group-hover:scale-110">
                        @else
                            <span class="text-on-surface font-black text-xl tracking-tighter">{{ $client->company_name }}</span>
                        @endif
                        
                        <div class="absolute -top-10 left-1/2 -translate-x-1/2 px-4 py-2 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-xl opacity-0 scale-50 group-hover:opacity-100 group-hover:scale-100 transition-all duration-300 pointer-events-none whitespace-nowrap shadow-2xl z-50">
                            {{ $client->company_name }}
                            <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-primary rotate-45"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="marquee-wrapper relative flex pt-16 pb-4">
            <div class="marquee-track-reverse flex gap-16 items-center">
                @php 
                    $row2 = $client_logos->split(2)[1] ?? collect(); 
                    $displayRow2 = $row2->concat($row2)->concat($row2)->concat($row2);
                @endphp
                @foreach ($displayRow2 as $client)
                    <div class="marquee-item group relative h-16 md:h-24 flex-shrink-0 flex items-center px-4 cursor-pointer">
                        @if($client->company_logo)
                            <img src="{{ asset('storage/' . $client->company_logo) }}" alt="{{ $client->company_name }}" 
                                 class="h-full w-auto object-contain transition-all duration-500 group-hover:scale-110">
                        @else
                            <span class="text-on-surface font-black text-xl tracking-tighter">{{ $client->company_name }}</span>
                        @endif

                        <div class="absolute -top-10 left-1/2 -translate-x-1/2 px-4 py-2 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-xl opacity-0 scale-50 group-hover:opacity-100 group-hover:scale-100 transition-all duration-300 pointer-events-none whitespace-nowrap shadow-2xl z-50">
                            {{ $client->company_name }}
                            <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-primary rotate-45"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Gradient Overlays --}}
    <div class="absolute inset-y-0 left-0 w-40 bg-gradient-to-r from-white via-white/80 to-transparent z-20 pointer-events-none"></div>
    <div class="absolute inset-y-0 right-0 w-40 bg-gradient-to-l from-white via-white/80 to-transparent z-20 pointer-events-none"></div>
</section>
@endif

<style>
    .marquee-wrapper {
        width: 100%;
        mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    }

    .marquee-track {
        display: flex;
        width: max-content;
        animation: scroll-left 60s linear infinite;
    }

    .marquee-track-reverse {
        display: flex;
        width: max-content;
        animation: scroll-right 60s linear infinite;
    }

    @keyframes scroll-left {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    @keyframes scroll-right {
        0% { transform: translateX(-50%); }
        100% { transform: translateX(0); }
    }

    .marquee-wrapper:hover .marquee-track,
    .marquee-wrapper:hover .marquee-track-reverse {
        animation-play-state: paused;
    }
</style>

{{-- ═══════════════════════════════════════════════
    TENTANG KAMI
═══════════════════════════════════════════════ --}}
<section class="page-section bg-white">
    <div class="content-container grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="space-y-6" data-aos>
            <span class="section-kicker">{{ __('Tentang AKA Consulting') }}</span>
            <h2 class="section-title">{{ __('Mitra Strategis Kepatuhan dan Pertumbuhan Bisnis') }}</h2>
            <p class="section-subtitle">
                {{ __t($settings->about_us) ?: __('AKA Consulting, Konsultan Terpercaya adalah mitra konsultasi yang berdedikasi mendampingi bisnis melalui layanan hukum, perizinan, dan kepatuhan dengan pendekatan yang jelas dan strategis.') }}
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <div class="surface-card p-6 rounded-2xl hover:shadow-2xl transition-shadow">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4 text-primary">
                        <span class="material-symbols-outlined notranslate" translate="no">visibility</span>
                    </div>
                    <h4 class="text-lg font-bold mb-1">{{ __('Visi') }}</h4>
                    <p class="text-on-surface-variant text-sm leading-relaxed">
                        {!! nl2br(e(__t($settings->vision ?? "Menjadi firma konsultan terdepan yang terpercaya dalam memberikan solusi hukum, perizinan, dan kepatuhan untuk mendukung pertumbuhan bisnis klien.||To be the leading and trusted consulting firm in providing legal, licensing, and compliance solutions to support the growth of our clients' businesses."))) !!}
                    </p>
                </div>
                <div class="surface-card p-6 rounded-2xl hover:shadow-2xl transition-shadow">
                    <div class="w-12 h-12 rounded-xl bg-primary-container/10 flex items-center justify-center mb-4 text-primary-container">
                        <span class="material-symbols-outlined notranslate" translate="no">flag</span>
                    </div>
                    <h4 class="text-lg font-bold mb-1">{{ __('Misi') }}</h4>
                    <p class="text-on-surface-variant text-sm leading-relaxed">
                        {!! nl2br(e(__t($settings->mission ?? "1. Menyediakan pendampingan perizinan dan kepatuhan regulasi yang efisien.\n2. Memberikan solusi strategis untuk meminimalisasi risiko legalitas operasional.\n3. Menjalin kemitraan jangka panjang berbasis integritas dan profesionalisme.||1. Provide efficient assistance with licensing and regulatory compliance.\n2. Deliver strategic solutions to minimize operational legality risks.\n3. Build long-term partnerships based on integrity and professionalism."))) !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="relative h-[420px] md:h-[500px] rounded-3xl overflow-hidden shadow-2xl" data-aos data-aos-delay="150">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=70&w=960"
                 alt="Tim AKA Consulting"
                 width="960" height="600"
                 loading="lazy"
                 decoding="async"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#15100a]/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-6 left-6 right-6">
                <div class="glass-panel p-5 rounded-xl">
                    <p class="text-xl font-bold text-on-surface">{{ __('50+ Proyek Sukses') }}</p>
                    <p class="text-on-surface-variant text-sm">{{ __('Diselesaikan dengan tingkat kepuasan tinggi.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════
    LAYANAN — INTERACTIVE CARDS (bento grid + selectable → ubah warna)
═══════════════════════════════════════════════ --}}
<section class="page-section bg-background">
    <div class="content-container">
        <div class="text-center max-w-2xl mx-auto space-y-3 mb-14" data-aos="fade-up">
            <span class="section-kicker">{{ __('Layanan AKA Consulting') }}</span>
            <h2 class="section-title">{{ __('Solusi Konsultasi & Perizinan Untuk Bisnis Anda') }}</h2>
            <p class="section-subtitle mx-auto">{{ __('Klik layanan untuk melihat detail dan langsung chat via WhatsApp.') }}</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $index => $service)
            <div data-aos data-aos-delay="{{ (int) $index * 100 }}" class="{{ $loop->first ? 'lg:col-span-2' : '' }}">
                <a 
                    href="{{ route('services.show', $service->slug) }}"
                    aria-label="{{ __('Detail Layanan') }}: {{ __t($service->title) }}"
                    class="interactive-card group transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_24px_60px_-20px_rgba(0,0,0,0.15)] h-full"
                >
                    <div class="interactive-card-icon w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center text-primary mb-5 transition-all duration-200 group-hover:scale-110 group-hover:rotate-6">
                        <span class="material-symbols-outlined notranslate text-3xl" translate="no">{{ $service->icon_image ?: 'settings' }}</span>
                    </div>
                    <h3 class="interactive-card-title text-xl font-bold text-on-surface mb-2 transition-colors duration-200">{{ __t($service->title) }}</h3>
                    <p class="interactive-card-description text-on-surface-variant text-sm transition-colors duration-200">{{ __t($service->short_description) }}</p>
                    
                    <div class="mt-6 flex items-center text-primary font-bold text-sm group-hover:text-white transition-colors duration-200">
                        {{ __('Lihat Detail') }}
                        <span class="material-symbols-outlined notranslate ml-2 text-sm" translate="no">arrow_forward</span>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full py-12 text-center text-on-surface-variant">
                <p>{{ __('Layanan belum tersedia.') }}</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@if(isset($packages) && $packages->isNotEmpty())
{{-- ═══════════════════════════════════════════════
    PAKET LAYANAN & HARGA (Packages)
═══════════════════════════════════════════════ --}}
<section class="page-section bg-[#fdfbf7] pt-12 pb-24 relative overflow-hidden" id="paket">
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-[#d9a11a]/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#8d6408]/5 rounded-full blur-3xl translate-y-1/3 -translate-x-1/3 pointer-events-none"></div>

    <div class="content-container relative z-10">
        <div class="text-center max-w-2xl mx-auto space-y-4 mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 rounded-full border border-[#d9a11a]/30 bg-white px-5 py-2 text-[10px] font-black uppercase tracking-[0.25em] text-[#8d6408] shadow-sm">
                <span class="material-symbols-outlined text-[16px]">local_offer</span>
                Pilihan Paket
            </span>
            <h2 class="text-4xl md:text-5xl font-black leading-tight tracking-tight text-on-surface">Paket Layanan Yang Tepat <br>Untuk Anda</h2>
            <p class="text-on-surface-variant text-base md:text-lg mx-auto">Pilih paket layanan konsultasi atau pendirian usaha yang sesuai dengan skala dan kebutuhan bisnis Anda.</p>
        </div>

        @php
            $groupedPackages = $packages->groupBy('category');
            $categories = $groupedPackages->keys();
        @endphp

        <div x-data="{ activeTab: '{{ $categories->first() }}' }">
            @if($categories->count() > 1)
            {{-- Category Tabs --}}
            <div class="flex flex-wrap justify-center gap-3 mb-16" data-aos="fade-up" data-aos-delay="100">
                @foreach($categories as $category)
                <button 
                    @click="activeTab = '{{ $category }}'"
                    :class="activeTab === '{{ $category }}' ? 'bg-[#8d6408] text-white shadow-xl shadow-[#8d6408]/20 scale-105' : 'bg-white text-on-surface hover:bg-slate-50 border border-slate-200'"
                    class="px-8 py-3.5 rounded-full font-bold text-sm md:text-base transition-all duration-300">
                    {{ $category ?: 'Semua Paket' }}
                </button>
                @endforeach
            </div>
            @endif

            {{-- Tab Contents --}}
            <div>
                @foreach($groupedPackages as $category => $categoryPackages)
                <div x-show="activeTab === '{{ $category }}'" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto items-stretch">
                        @foreach($categoryPackages as $package)
                        <div class="relative rounded-[2.5rem] p-8 md:p-10 transition-all duration-500 flex flex-col group
                            {{ $package->is_popular 
                                ? 'bg-gradient-to-br from-[#1c140c] to-[#3a2a19] text-white shadow-2xl shadow-[#1c140c]/30 scale-[1.03] lg:-translate-y-4 z-10 border border-[#4a3620]' 
                                : 'bg-white border border-slate-100 shadow-lg hover:shadow-2xl hover:-translate-y-2' }}">
                            
                            @if($package->is_popular)
                            <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-[#d9a11a] to-[#b38515] text-white text-[10px] font-black uppercase tracking-[0.2em] px-5 py-2.5 rounded-full shadow-[0_8px_20px_rgba(217,161,26,0.3)] flex items-center gap-1.5 z-20 whitespace-nowrap border border-[#f4c85c]/30">
                                <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">star</span> PALING POPULER
                            </div>
                            @endif

                            <div class="mb-6 {{ $package->is_popular ? 'mt-4' : '' }}">
                                <h3 class="text-2xl font-black mb-3 tracking-tight {{ $package->is_popular ? 'text-white' : 'text-on-surface' }}">{{ $package->name }}</h3>
                                <p class="text-sm leading-relaxed h-12 {{ $package->is_popular ? 'text-white/70' : 'text-on-surface-variant' }}">{{ $package->description }}</p>
                            </div>

                            <div class="mb-8 pb-8 border-b {{ $package->is_popular ? 'border-white/10' : 'border-slate-100' }}">
                                <div class="flex items-baseline gap-1">
                                    <span class="text-4xl font-black tracking-tighter {{ $package->is_popular ? 'text-white' : 'text-on-surface' }}">{{ $package->price }}</span>
                                </div>
                            </div>

                            <div class="flex-1 mb-10">
                                <ul class="space-y-5 text-sm font-medium">
                                    @if(is_array($package->features))
                                        @foreach($package->features as $feature)
                                        <li class="flex items-start gap-3">
                                            <div class="w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 {{ $package->is_popular ? 'bg-[#d9a11a]/20 text-[#d9a11a]' : 'bg-emerald-50 text-emerald-500' }}">
                                                <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">check</span>
                                            </div>
                                            <span class="leading-relaxed {{ $package->is_popular ? 'text-white/90' : 'text-slate-600' }}">{{ $feature }}</span>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>

                            <a href="https://wa.me/{{ $whatsAppNumber }}?text={{ urlencode('Halo, saya tertarik dengan layanan ' . $package->name . '. Mohon info lebih lanjut.') }}" 
                               target="_blank" 
                               class="w-full py-4 rounded-2xl text-center font-bold flex items-center justify-center gap-2 transition-all duration-300 text-sm tracking-wide
                               {{ $package->is_popular 
                                  ? 'bg-[#d9a11a] text-white hover:bg-[#b38515] shadow-[0_8px_25px_rgba(217,161,26,0.25)] hover:shadow-[0_12px_35px_rgba(217,161,26,0.35)] hover:-translate-y-1' 
                                  : 'bg-white border-2 border-slate-200 text-slate-700 hover:border-[#8d6408] hover:text-[#8d6408] hover:bg-slate-50' }}">
                                Pilih Paket Ini
                                <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════
    TESTIMONIAL CLIENTS (Dinamis dari Admin)
═══════════════════════════════════════════════ --}}
<section class="page-section bg-white">
    <div class="content-container">
        @if($clients->isNotEmpty())
        <div class="text-center max-w-2xl mx-auto space-y-3 mb-14" data-aos>
            <span class="section-kicker">{{ __('Kata Mereka') }}</span>
            <h2 class="section-title">{{ __('Testimoni Klien AKA Consulting') }}</h2>
        </div>
        {{-- Testimonial Slider --}}
        <div class="relative px-4 md:px-10">
            <div class="swiper testimonial-swiper pb-16">
                <div class="swiper-wrapper">
                    @foreach($clients as $index => $client)
                    <div class="swiper-slide h-auto">
                        <div class="surface-card p-8 rounded-[2.5rem] border border-slate-100 shadow-sm testimonial-card group">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center font-bold text-lg shadow-lg group-hover:bg-white group-hover:text-primary transition-colors">
                                    {{ $client['initial'] }}
                                </div>
                                <div>
                                    <p class="font-bold text-on-surface transition-colors">{{ __t($client['name']) }}</p>
                                    <p class="text-[10px] text-on-surface-variant uppercase font-black tracking-widest transition-colors">{{ __t($client['company']) }}</p>
                                </div>
                            </div>

                            <div class="flex text-amber-400 mb-4 transition-colors">
                                @for($i=0; $i<($client['rating'] ?? 5); $i++)
                                    <span class="material-symbols-outlined notranslate text-[16px] fill-1 transition-colors" translate="no">star</span>
                                @endfor
                            </div>

                            <p class="text-on-surface-variant text-sm leading-relaxed italic flex-1 transition-colors">"{{ __t($client['testimonial']) }}"</p>
                            
                            <div class="mt-6 pt-6 border-t border-slate-50 transition-colors">
                                <span class="text-[10px] font-black uppercase tracking-widest text-primary transition-colors">{{ __('Verified Client') }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                {{-- Pagination --}}
                <div class="swiper-pagination"></div>
            </div>

            {{-- Custom Navigation --}}
            <button aria-label="Slide Testimoni Sebelumnya" class="swiper-prev absolute left-0 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white border border-slate-100 shadow-xl z-20 flex items-center justify-center text-slate-400 hover:text-primary transition-all active:scale-90">
                <span class="material-symbols-outlined notranslate" translate="no">arrow_back</span>
            </button>
            <button aria-label="Slide Testimoni Selanjutnya" class="swiper-next absolute right-0 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white border border-slate-100 shadow-xl z-20 flex items-center justify-center text-slate-400 hover:text-primary transition-all active:scale-90">
                <span class="material-symbols-outlined notranslate" translate="no">arrow_forward</span>
            </button>
        </div>

        @endif

        {{-- Review Form (Integrated) --}}
        <div class="{{ $clients->isNotEmpty() ? 'mt-20' : '' }} max-w-4xl mx-auto">
            <div class="glass-panel p-8 md:p-12 rounded-[2.5rem] shadow-2xl relative overflow-hidden" data-aos="fade-up">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-primary-container"></div>
                
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
                    <div class="lg:col-span-2 space-y-4">
                        <h3 class="text-2xl font-black text-on-surface">{{ __('Berikan Ulasan Anda') }}</h3>
                        <p class="text-on-surface-variant text-sm leading-relaxed">
                            {{ __('Punya pengalaman bekerja dengan kami? Bagikan ulasan Anda di sini untuk membantu kami terus berkembang.') }}
                        </p>
                        <div class="flex items-center gap-2 text-primary font-bold text-sm pt-4">
                            <span class="material-symbols-outlined notranslate" translate="no">verified</span>
                            {{ __('Moderasi Admin Aktif') }}
                        </div>
                    </div>

                    <div class="lg:col-span-3">
                        @if(session('success_review'))
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl text-sm font-semibold flex items-center gap-3 animate-pulse [animation-duration:4s]">
                            <span class="material-symbols-outlined notranslate" translate="no">check_circle</span>
                            {{ __(session('success_review')) }}
                        </div>
                        @endif

                        <form action="{{ route('review.store') }}" method="POST" class="space-y-4">
                            @csrf
                            {{-- Honeypot Anti-Spam --}}
                            <input type="text" name="_website_url" style="display:none" tabindex="-1" autocomplete="off">
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <input type="text" name="name" required placeholder="{{ __('Nama Lengkap *') }}" 
                                    class="w-full rounded-xl border border-outline-variant/50 px-4 py-3 text-sm focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all">
                                <input type="text" name="company" placeholder="{{ __('Instansi/Perusahaan') }}" 
                                    class="w-full rounded-xl border border-outline-variant/50 px-4 py-3 text-sm focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all">
                            </div>
                            
                            <div x-data="{ rating: 5, hover: 0 }">
                                <label class="block text-[10px] font-black uppercase tracking-widest text-on-surface-variant mb-2 pl-1">{{ __('Penilaian Anda') }}</label>
                                <div class="flex gap-2">
                                    <input type="hidden" name="rating" :value="rating">
                                    @for($i=1; $i<=5; $i++)
                                    <button type="button" 
                                        @click="rating = {{ $i }}" 
                                        @mouseenter="hover = {{ $i }}" 
                                        @mouseleave="hover = 0"
                                        aria-label="Bintang {{ $i }}"
                                        class="cursor-pointer transition-transform hover:scale-110 active:scale-95 outline-none focus:outline-none">
                                        <span class="material-symbols-outlined notranslate text-4xl transition-colors duration-200" translate="no"
                                            :class="(hover || rating) >= {{ $i }} ? 'text-amber-400 fill-1' : 'text-slate-300'">
                                            star
                                        </span>
                                    </button>
                                    @endfor
                                </div>
                            </div>

                            <textarea name="comment" required rows="3" placeholder="{{ __('Tuliskan ulasan Anda di sini... *') }}"
                                class="w-full rounded-xl border border-outline-variant/50 px-4 py-3 text-sm focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all resize-none"></textarea>

                            <button type="submit" class="btn-primary w-full !py-4 shadow-xl">
                                <span class="material-symbols-outlined notranslate" translate="no">send</span>
                                {{ __('Kirim Ulasan') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($faqs->isNotEmpty())
{{-- ═══════════════════════════════════════════════
    FAQ (Dinamis dari Admin)
|--------------------------------------------------------------------------
--}}
<section class="page-section bg-background">
    <div class="content-container max-w-3xl">
        <div class="text-center space-y-3 mb-14" data-aos>
            <span class="section-kicker">F.A.Q</span>
            <h2 class="section-title">{{ __('Pertanyaan Umum') }}</h2>
            <p class="section-subtitle mx-auto">{{ __('Pertanyaan yang sering ditanyakan tentang layanan AKA Consulting.') }}</p>
        </div>

        <div class="space-y-4">
            @foreach($faqs as $index => $faq)
            @php
                $faqQuestion = __t(is_array($faq)
                    ? ($faq['question'] ?? $faq['title'] ?? '')
                    : (is_object($faq)
                        ? ($faq->question ?? $faq->title ?? '')
                        : ''));

                $faqAnswer = __t(is_array($faq)
                    ? ($faq['answer'] ?? '')
                    : (is_object($faq)
                        ? ($faq->answer ?? '')
                        : ''));
            @endphp
            <details class="faq-item group" data-aos data-aos-delay="{{ (int) $index * 80 }}">
                <summary class="flex items-center justify-between cursor-pointer px-6 py-5 md:px-8 md:py-6 select-none list-none">
                    <span class="font-bold text-on-surface group-open:text-white transition-colors pr-4">{{ $faqQuestion }}</span>
                    <span class="material-symbols-outlined notranslate faq-icon text-on-surface-variant group-open:text-white transition-all duration-300 flex-shrink-0" translate="no">add</span>
                </summary>
                <div class="faq-answer px-6 pb-6 md:px-8 md:pb-8 text-on-surface-variant text-sm leading-relaxed transition-colors">
                    {{ $faqAnswer }}
                </div>
            </details>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════
    FORM KONSULTASI
═══════════════════════════════════════════════ --}}
<section class="page-section bg-white" id="kontak">
    <div class="content-container grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">
        {{-- Info --}}
        <div class="space-y-6" data-aos>
            <span class="section-kicker">{{ __('Konsultasi Gratis') }}</span>
            <h2 class="section-title">{{ __('Mulai Konsultasi Anda Sekarang') }}</h2>
            <p class="section-subtitle">
                {{ __('Isi formulir di samping dan tim AKA Consulting akan menghubungi Anda dalam waktu 1×24 jam untuk membahas kebutuhan bisnis dan legalitas Anda.') }}
            </p>
            <div class="space-y-5 pt-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                        <span class="material-symbols-outlined notranslate" translate="no">schedule</span>
                    </div>
                    <div>
                        <p class="font-bold text-on-surface">{{ __('Respons Cepat') }}</p>
                        <p class="text-on-surface-variant text-sm">{{ __('Balasan dalam 1×24 jam kerja') }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-success/10 flex items-center justify-center text-success flex-shrink-0">
                        <span class="material-symbols-outlined notranslate" translate="no">verified</span>
                    </div>
                    <div>
                        <p class="font-bold text-on-surface">{{ __('Konsultasi Tanpa Biaya') }}</p>
                        <p class="text-on-surface-variant text-sm">{{ __('Diskusi awal 100% gratis') }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-primary-container/10 flex items-center justify-center text-primary-container flex-shrink-0">
                        <span class="material-symbols-outlined notranslate" translate="no">lock</span>
                    </div>
                    <div>
                        <p class="font-bold text-on-surface">{{ __('Data Aman') }}</p>
                        <p class="text-on-surface-variant text-sm">{{ __('Informasi Anda dijaga kerahasiaannya') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <div data-aos data-aos-delay="150">
            {{-- Success message --}}
            @if(session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-2xl border border-green-200 bg-green-50 px-6 py-4 text-sm font-semibold text-green-700">
                <span class="material-symbols-outlined notranslate text-green-600" translate="no">check_circle</span>
                {{ __(session('success')) }}
            </div>
            @endif

            <form action="{{ route('konsultasi.store') }}" method="POST" class="surface-card rounded-3xl p-6 md:p-8 space-y-5">
                @csrf
                {{-- Honeypot Anti-Spam --}}
                <input type="text" name="_website_url" style="display:none" tabindex="-1" autocomplete="off">

                {{-- Nama --}}
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-on-surface mb-2" for="sender_name">{{ __('Nama Lengkap *') }}</label>
                    <input type="text" id="sender_name" name="sender_name" value="{{ old('sender_name') }}" required
                        class="w-full rounded-xl border border-outline-variant/50 px-4 py-3 text-sm transition-all focus:border-primary focus:ring-4 focus:ring-primary/10"
                        placeholder="{{ __('Nama lengkap Anda') }}">
                    @error('sender_name') <p class="text-error text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-on-surface mb-2" for="sender_email">{{ __('Email Aktif *') }}</label>
                    <input type="email" id="sender_email" name="sender_email" value="{{ old('sender_email') }}" required
                        class="w-full rounded-xl border border-outline-variant/50 px-4 py-3 text-sm transition-all focus:border-primary focus:ring-4 focus:ring-primary/10"
                        placeholder="{{ __('email@anda.com') }}">
                    @error('sender_email') <p class="text-error text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- WhatsApp --}}
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-on-surface mb-2" for="phone">{{ __('No. WhatsApp *') }}</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                        class="w-full rounded-xl border border-outline-variant/50 px-4 py-3 text-sm transition-all focus:border-primary focus:ring-4 focus:ring-primary/10"
                        placeholder="08xx-xxxx-xxxx">
                    @error('phone') <p class="text-error text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Layanan --}}
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-on-surface mb-2" for="service">{{ __('Layanan yang Dibutuhkan *') }}</label>
                    <select id="service" name="service" required
                        class="w-full rounded-xl border border-outline-variant/50 px-4 py-3 text-sm transition-all focus:border-primary focus:ring-4 focus:ring-primary/10 bg-white">
                        <option value="">-- {{ __('Pilih Layanan') }} --</option>
                        @foreach($services as $srv)
                            @php
                                $srvTitle = __t(is_array($srv) ? ($srv['title'] ?? '') : ($srv->title ?? ''));
                            @endphp
                            @if($srvTitle)
                                <option value="{{ $srvTitle }}" {{ old('service') == $srvTitle ? 'selected' : '' }}>{{ $srvTitle }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('service') <p class="text-error text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Pesan --}}
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-on-surface mb-2" for="message_body">{{ __('Pesan Tambahan') }} <span class="font-normal text-on-surface-variant">({{ __('opsional') }})</span></label>
                    <textarea id="message_body" name="message_body" rows="3"
                        class="w-full rounded-xl border border-outline-variant/50 px-4 py-3 text-sm transition-all focus:border-primary focus:ring-4 focus:ring-primary/10 resize-none"
                        placeholder="{{ __('Ceritakan sedikit tentang kebutuhan Anda...') }}">{{ old('message_body') }}</textarea>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-primary w-full !py-4 !text-base shadow-lg">
                    <span class="material-symbols-outlined notranslate" translate="no">send</span>
                    {{ __('Kirim Konsultasi') }}
                </button>
            </form>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════
    CTA
═══════════════════════════════════════════════ --}}
<section class="page-section bg-background">
    <div class="content-container max-w-5xl">
        <div class="rounded-[2.25rem] border border-[#eadfcb] bg-[#1c140c] p-10 md:p-16 text-center text-white shadow-[0_24px_70px_rgba(28,20,12,0.18)] relative overflow-hidden" data-aos="fade-up" data-aos-duration="800">
            <div class="absolute right-0 top-0 h-72 w-72 rounded-full bg-[#d9a11a]/15 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#d9a11a]/8 rounded-full blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(217,161,26,0.10),_transparent_35%)]"></div>
            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-bold mb-5">{{ __('Siap Meningkatkan Kepatuhan & Pertumbuhan Bisnis Anda?') }}</h2>
                <p class="text-base md:text-lg text-white/85 max-w-2xl mx-auto mb-8 leading-relaxed">
                    {{ __('Jangan biarkan bisnis Anda tertinggal. Jadwalkan sesi konsultasi gratis dengan tim expert AKA Consulting hari ini.') }}
                </p>
                <a href="{{ $whatsAppUrl ?? '#kontak' }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-[#d9a11a] text-white font-bold px-8 py-4 rounded-full hover:shadow-[0_8px_25px_rgba(217,161,26,0.3)] hover:scale-105 transition-all duration-300">
                    {{ __('Mulai Konsultasi Sekarang') }}
                    <span class="material-symbols-outlined notranslate" translate="no">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.testimonial-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.swiper-next',
                prevEl: '.swiper-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    });
</script>
@endpush