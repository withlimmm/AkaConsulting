<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth{{ app()->getLocale() === 'en' ? ' notranslate' : '' }}"{!! app()->getLocale() === 'en' ? ' translate="no"' : '' !!}>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="google" content="notranslate">
    <title>@yield('title', 'AKA Consulting, Konsultan Terpercaya')</title>
    <meta name="description" content="@yield('meta_description', $settings->about_us ?? 'AKA Consulting menyediakan layanan konsultasi hukum, perizinan, dan manajemen kepatuhan untuk membantu bisnis beroperasi sesuai regulasi dan tumbuh berkelanjutan.')">
    <meta name="keywords" content="@yield('meta_keywords', 'konsultan hukum jakarta, jasa perizinan usaha jakarta, konsultan legalitas perusahaan, pendirian pt cv, konsultan hukum bisnis, jasa konsultan jakarta, konsultan kepatuhan bisnis, konsultan perizinan bandung, konsultan hukum surabaya, jasa legalitas usaha, sertifikasi halal bpom, konsultan tender, konsultasi hukum online, aka consulting, konsultan terpercaya indonesia')">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="AKA Consulting">
    
    <!-- Google Search Console Verification -->
    @if(isset($settings) && $settings->google_site_verification)
    <meta name="google-site-verification" content="{{ $settings->google_site_verification }}">
    @endif

    <!-- Local SEO (GEO Tags) -->
    <meta name="geo.region" content="ID-JK">
    <meta name="geo.placename" content="Jakarta">
    <meta name="geo.position" content="-6.208763;106.845599">
    <meta name="ICBM" content="-6.208763, 106.845599">

    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="@yield('title', 'AKA Consulting, Konsultan Terpercaya')">
    <meta property="og:description" content="@yield('meta_description', $settings->about_us ?? 'AKA Consulting menyediakan layanan konsultasi hukum, perizinan, dan manajemen kepatuhan.')">
    <meta property="og:image" content="@yield('og_image', isset($settings) && $settings->logo_path ? asset('storage/' . $settings->logo_path) : asset('images/logo_aka.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Structured Data (JSON-LD) -->
    {{-- JSON-LD: LocalBusiness Schema — Local SEO untuk semua kota target --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "LegalService",
      "name": "{{ $settings->company_name ?? 'AKA Consulting' }}",
      "alternateName": ["AKA Consulting", "AKA Group Consulting", "Konsultan AKA"],
      "url": "{{ url('/') }}",
      "logo": "{{ isset($settings) && $settings->logo_path ? asset('storage/' . $settings->logo_path) : asset('images/logo_aka.png') }}",
      "image": "{{ isset($settings) && $settings->logo_path ? asset('storage/' . $settings->logo_path) : asset('images/logo_aka.png') }}",
      "description": "{{ $settings->about_us ?? 'AKA Consulting adalah konsultan hukum dan perizinan usaha terpercaya di Indonesia. Melayani jasa pendirian PT CV, perizinan OSS, sertifikasi halal BPOM, litigasi, tender, dan pertanahan untuk seluruh wilayah Indonesia.' }}",
      "priceRange": "$$",
      "telephone": "+{{ $settings->phone ?? '6287868184742' }}",
      "email": "{{ $settings->email ?? 'info@akagroupconsulting.com' }}",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "{{ $settings->address ?? 'Jakarta' }}",
        "addressLocality": "Jakarta",
        "addressRegion": "DKI Jakarta",
        "addressCountry": "ID"
      },
      "geo": {
        "@@type": "GeoCoordinates",
        "latitude": "-6.208763",
        "longitude": "106.845599"
      },
      "areaServed": [
        { "@@type": "City", "name": "Jakarta" },
        { "@@type": "City", "name": "Jakarta Selatan" },
        { "@@type": "City", "name": "Jakarta Utara" },
        { "@@type": "City", "name": "Jakarta Barat" },
        { "@@type": "City", "name": "Jakarta Timur" },
        { "@@type": "City", "name": "Jakarta Pusat" },
        { "@@type": "City", "name": "Bogor" },
        { "@@type": "City", "name": "Depok" },
        { "@@type": "City", "name": "Tangerang" },
        { "@@type": "City", "name": "Bekasi" },
        { "@@type": "City", "name": "Bandung" },
        { "@@type": "City", "name": "Surabaya" },
        { "@@type": "City", "name": "Semarang" },
        { "@@type": "City", "name": "Yogyakarta" },
        { "@@type": "City", "name": "Medan" },
        { "@@type": "City", "name": "Makassar" },
        { "@@type": "City", "name": "Bali" },
        { "@@type": "City", "name": "Denpasar" },
        { "@@type": "City", "name": "Palembang" },
        { "@@type": "City", "name": "Batam" },
        { "@@type": "State", "name": "Jawa Barat" },
        { "@@type": "State", "name": "Jawa Tengah" },
        { "@@type": "State", "name": "Jawa Timur" },
        { "@@type": "Country", "name": "Indonesia" }
      ],
      "serviceArea": {
        "@@type": "Country",
        "name": "Indonesia"
      },
      "hasOfferCatalog": {
        "@@type": "OfferCatalog",
        "name": "Layanan Konsultasi AKA Consulting",
        "itemListElement": [
          { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Jasa Pendirian PT dan CV" } },
          { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Perizinan OSS dan NIB" } },
          { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Sertifikasi Halal BPOM" } },
          { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Konsultasi Hukum Perusahaan" } },
          { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Litigasi dan Sengketa Hukum" } },
          { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Pengurusan Tender dan Pengadaan" } },
          { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Konsultasi Pertanahan" } },
          { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Legal Compliance dan Kepatuhan" } }
        ]
      },
      "contactPoint": {
        "@@type": "ContactPoint",
        "telephone": "+{{ $settings->phone ?? '6287868184742' }}",
        "contactType": "customer service",
        "areaServed": "ID",
        "availableLanguage": ["id", "en"]
      },
      "sameAs": [
        @php $sameAs = array_filter([$settings->instagram_url ?? '', $settings->facebook_url ?? '', $settings->linkedin_url ?? '', $settings->tiktok_url ?? '', $settings->youtube_url ?? '', $settings->twitter_url ?? '']); @endphp
        {{ implode(',', array_map(fn($u) => '"'.$u.'"', $sameAs)) }}
      ],
      "openingHoursSpecification": [
        {
          "@@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"],
          "opens": "08:00",
          "closes": "17:00"
        }
      ]
    }
    </script>

    <!-- DNS Prefetch & Preconnect untuk semua resource eksternal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://flagcdn.com">
    <link rel="dns-prefetch" href="https://images.unsplash.com">
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://browser.sentry-cdn.com">

    <!-- Fonts: Inter + Plus Jakarta Sans — preload critical weights -->
    <link rel="preload" as="style"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap">
    </noscript>

    <!-- Material Symbols: load async (non-blocking) -->
    <link rel="preload" as="style"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@400,0&display=block"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@400,0&display=block">
    </noscript>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <!-- Google Tag Manager -->
    @if(env('GTM_ID'))
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ env('GTM_ID') }}');</script>
    @endif
    <!-- End Google Tag Manager -->

    <!-- Analytics & Error Monitoring (Placeholder) -->
    @if(env('GA_MEASUREMENT_ID'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GA_MEASUREMENT_ID') }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ env('GA_MEASUREMENT_ID') }}');
    </script>
    @endif
    
    @if(env('SENTRY_DSN'))
    <script defer src="https://browser.sentry-cdn.com/7.73.0/bundle.min.js" crossorigin="anonymous"></script>
    <script>
      window.addEventListener('load', function() {
        if (typeof Sentry !== 'undefined') {
          Sentry.init({ dsn: "{{ env('SENTRY_DSN') }}" });
        }
      });
    </script>
    @endif
</head>

<body class="site-shell selection:bg-primary selection:text-white">
    <!-- Google Tag Manager (noscript) -->
    @if(env('GTM_ID'))
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ env('GTM_ID') }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif
    <!-- End Google Tag Manager (noscript) -->

    <!-- Default Navigation Bar -->
    <nav class="fixed top-0 z-50 w-full border-b border-primary/10 bg-glass-fill shadow-soft backdrop-blur-xl transition-all duration-300 data-[scrolled=true]:border-outline-variant/30 data-[scrolled=true]:bg-white/92">
        <div class="mx-auto flex h-24 max-w-7xl items-center justify-between px-4 md:px-8 lg:px-20">
            <a href="/" class="flex items-center group overflow-visible">
                <img src="/images/logo_aka.png" alt="AKA Consulting Logo"
                    style="height: 140px; width: auto; max-width: none; object-fit: contain;">
            </a>
            <div class="hidden items-center space-x-8 md:flex">
                <a href="/"
                    class="{{ request()->is('/') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-300 py-1">{{ __('Beranda') }}</a>
                {{-- ═══ MEGA MENU LAYANAN ═══ --}}
                @php
                    $navServices = \App\Models\Service::where('status', 'active')
                        ->whereNotNull('category')
                        ->orderBy('sort_order')
                        ->get()
                        ->groupBy('category');
                @endphp
                <div class="relative" x-data="{ megaOpen: false }" @mouseenter="megaOpen = true" @mouseleave="megaOpen = false">
                    <div class="flex items-center gap-0.5">
                        <a href="/layanan"
                           class="{{ request()->is('layanan*') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-300 py-1">
                            {{ __('Layanan') }}
                        </a>
                        <button @click="megaOpen = !megaOpen" aria-label="Buka Menu Layanan"
                                class="flex items-center {{ request()->is('layanan*') ? 'text-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-300 py-1 px-0.5">
                            <span class="material-symbols-outlined text-[16px] transition-transform duration-200" :class="megaOpen ? 'rotate-180' : ''">expand_more</span>
                        </button>
                    </div>

                    {{-- Mega Menu Panel --}}
                    <div x-show="megaOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="fixed left-0 right-0 top-[80px] z-50 w-full bg-white border-b-2 border-[#d9a11a]/30 shadow-[0_24px_64px_rgba(0,0,0,0.18)]"
                         style="display:none;">
                        <div class="mx-auto max-w-7xl px-4 md:px-8 lg:px-20 py-8">
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <p class="text-[10px] font-black uppercase tracking-[0.3em] text-[#8d6408] mb-1">Layanan Kami</p>
                                    <h3 class="text-xl font-black text-slate-900">Pilih Layanan yang Anda Butuhkan</h3>
                                </div>
                                <a href="/layanan" class="flex items-center gap-1.5 text-[11px] font-black uppercase tracking-widest text-[#8d6408] hover:underline">
                                    Lihat Semua
                                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                                </a>
                            </div>

                            @if($navServices->isEmpty())
                                <p class="text-sm text-slate-400 py-4">Belum ada layanan tersedia.</p>
                            @else
                                <div class="grid grid-cols-2 lg:grid-cols-{{ min($navServices->count(), 4) }} gap-6">
                                    @foreach($navServices as $catName => $catServices)
                                    <div>
                                        <p class="text-[9px] font-black uppercase tracking-[0.25em] text-[#8d6408] mb-3 flex items-center gap-1.5">
                                            <span class="w-3 h-px bg-[#8d6408] inline-block"></span>
                                            {{ Str::limit($catName, 30) }}
                                        </p>
                                        <div class="flex flex-col gap-1">
                                            @foreach($catServices->take(5) as $svc)
                                            <a href="{{ route('services.show', $svc->slug) }}"
                                               class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl hover:bg-[#f7f2e8] group transition-all"
                                               @click="megaOpen = false">
                                                <span class="material-symbols-outlined text-[18px] text-[#8d6408]/50 group-hover:text-[#8d6408] transition-colors shrink-0">{{ $svc->icon_image ?: 'gavel' }}</span>
                                                <span class="text-[12px] font-semibold text-slate-700 group-hover:text-[#8d6408] leading-tight transition-colors">{{ __t($svc->title) }}</span>
                                            </a>
                                            @endforeach
                                            @if($catServices->count() > 5)
                                            <a href="/layanan#{{ Str::slug($catName) }}" class="text-[10px] font-black text-[#8d6408]/60 hover:text-[#8d6408] px-3 py-1.5 transition-colors">
                                                +{{ $catServices->count() - 5 }} lainnya →
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mt-6 pt-5 border-t border-[#f0e8d8] flex items-center gap-4">
                                <a href="/layanan" class="inline-flex items-center gap-2 rounded-full bg-[#8d6408] text-white px-5 py-2.5 text-[11px] font-black hover:bg-[#7a5a10] transition-colors">
                                    <span class="material-symbols-outlined text-[15px]">apps</span>
                                    Semua Layanan
                                </a>
                                <a href="{{ url('/#kontak') }}" class="inline-flex items-center gap-2 rounded-full border border-[#e0d0b0] bg-white text-[#8d6408] px-5 py-2.5 text-[11px] font-black hover:bg-[#f7f2e8] transition-colors">
                                    <span class="material-symbols-outlined text-[15px]">chat</span>
                                    Konsultasi Gratis
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/portofolio"
                    class="{{ request()->is('portofolio*') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-300 py-1">{{ __('Portofolio') }}</a>
                <a href="/tentang-kami"
                    class="{{ request()->is('tentang-kami*') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-300 py-1">{{ __('Tentang Kami') }}</a>
                <a href="/blog"
                    class="{{ request()->is('blog*') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-300 py-1">{{ __('Blog') }}</a>
            </div>

            <div class="hidden items-center gap-4 md:flex">
                <div class="relative" x-data="{ langOpen: false }" @click.away="langOpen = false">
                    <button @click="langOpen = !langOpen" class="flex items-center gap-2 border border-outline-variant/30 rounded-full px-3 py-1.5 bg-white/50 backdrop-blur-md text-xs font-bold text-on-surface hover:bg-surface-container-low transition-colors notranslate" translate="no">
                        @if(app()->getLocale() == 'id')
                            <img src="https://flagcdn.com/w20/id.png" alt="Bendera Indonesia" width="20" height="15" loading="lazy" class="w-4 h-3 object-cover rounded-[2px] shadow-sm">
                            <span>ID</span>
                        @else
                            <img src="https://flagcdn.com/w20/gb.png" alt="Bendera Inggris" width="20" height="15" loading="lazy" class="w-4 h-3 object-cover rounded-[2px] shadow-sm">
                            <span>EN</span>
                        @endif
                        <span class="material-symbols-outlined text-[14px] transition-transform duration-200" :class="langOpen ? 'rotate-180' : ''">expand_more</span>
                    </button>
                    <div x-show="langOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute right-0 mt-2 w-36 bg-white rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.1)] border border-slate-100 py-2 z-50 notranslate" style="display:none;" translate="no">
                        <a href="{{ route('lang.switch', 'id') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-50 transition-colors {{ app()->getLocale() == 'id' ? 'text-primary font-black bg-primary/5 border-l-2 border-primary' : 'text-slate-600 font-semibold border-l-2 border-transparent' }}">
                            <img src="https://flagcdn.com/w20/id.png" alt="Bendera Indonesia" width="20" height="15" loading="lazy" class="w-5 h-3.5 object-cover rounded-[3px] shadow-[0_1px_2px_rgba(0,0,0,0.1)]">
                            <span class="text-[11px] uppercase tracking-wider">Indonesia</span>
                        </a>
                        <a href="{{ route('lang.switch', 'en') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-50 transition-colors {{ app()->getLocale() == 'en' ? 'text-primary font-black bg-primary/5 border-l-2 border-primary' : 'text-slate-600 font-semibold border-l-2 border-transparent' }}">
                            <img src="https://flagcdn.com/w20/gb.png" alt="Bendera Inggris" width="20" height="15" loading="lazy" class="w-5 h-3.5 object-cover rounded-[3px] shadow-[0_1px_2px_rgba(0,0,0,0.1)]">
                            <span class="text-[11px] uppercase tracking-wider">English</span>
                        </a>
                    </div>
                </div>
                <a href="{{ url('/#kontak') }}" class="btn-primary shadow-md">
                    {{ __('Konsultasi Gratis') }}
                </a>
            </div>

            <button type="button" data-mobile-nav-toggle aria-expanded="false" aria-label="Buka Menu Navigasi"
                class="md:hidden rounded-lg p-2 text-on-surface hover:bg-white/60">
                <span class="material-symbols-outlined notranslate" translate="no">menu</span>
            </button>
        </div>

        <div data-mobile-nav-panel class="mobile-nav-panel hidden">
            <div class="flex items-center justify-between border-b border-outline-variant/40 pb-3">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-primary">{{ __('Menu') }}</p>
                    <p class="text-sm text-on-surface-variant">{{ __('Navigasi cepat situs') }}</p>
                </div>
                <button type="button" data-mobile-nav-close aria-label="Tutup Menu Navigasi"
                    class="rounded-lg p-2 text-on-surface-variant hover:bg-surface-container-low">
                    <span class="material-symbols-outlined notranslate" translate="no">close</span>
                </button>
            </div>

            <div class="mt-4 grid gap-2">
                <div class="px-4 mb-4" x-data="{ langOpenMob: false }">
                    <button @click="langOpenMob = !langOpenMob" class="flex items-center justify-between w-full rounded-xl border border-outline-variant/30 px-4 py-3 bg-white/50 text-xs font-bold text-on-surface hover:bg-surface-container-low transition-colors notranslate" translate="no">
                        <div class="flex items-center gap-2.5">
                            @if(app()->getLocale() == 'id')
                                <img src="https://flagcdn.com/w20/id.png" alt="ID" class="w-5 h-3.5 object-cover rounded-[3px] shadow-sm">
                                <span>Indonesia</span>
                            @else
                                <img src="https://flagcdn.com/w20/gb.png" alt="EN" class="w-5 h-3.5 object-cover rounded-[3px] shadow-sm">
                                <span>English</span>
                            @endif
                        </div>
                        <span class="material-symbols-outlined text-[16px] transition-transform duration-200" :class="langOpenMob ? 'rotate-180' : ''">expand_more</span>
                    </button>
                    <div x-show="langOpenMob" class="mt-2 flex flex-col gap-1 pl-2 notranslate" style="display:none;" translate="no">
                        <a href="{{ route('lang.switch', 'id') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-slate-50 {{ app()->getLocale() == 'id' ? 'text-primary font-black bg-primary/5' : 'text-slate-600 font-semibold' }}">
                            <img src="https://flagcdn.com/w20/id.png" alt="ID" class="w-5 h-3.5 object-cover rounded-[3px] shadow-sm">
                            <span class="text-xs">Indonesia</span>
                        </a>
                        <a href="{{ route('lang.switch', 'en') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-slate-50 {{ app()->getLocale() == 'en' ? 'text-primary font-black bg-primary/5' : 'text-slate-600 font-semibold' }}">
                            <img src="https://flagcdn.com/w20/gb.png" alt="EN" class="w-5 h-3.5 object-cover rounded-[3px] shadow-sm">
                            <span class="text-xs">English</span>
                        </a>
                    </div>
                </div>
                <a href="/"
                    class="rounded-xl px-4 py-3 font-semibold text-on-surface-variant hover:bg-surface-container-low hover:text-primary">{{ __('Beranda') }}</a>
                <div x-data="{ layananOpen: false }">
                    <div class="flex items-center justify-between rounded-xl hover:bg-surface-container-low group">
                        <a href="/layanan"
                           class="flex-1 px-4 py-3 font-semibold text-on-surface-variant group-hover:text-primary transition-colors">
                            {{ __('Layanan') }}
                        </a>
                        <button @click="layananOpen = !layananOpen" aria-label="Buka Submenu Layanan"
                                class="px-3 py-3 text-on-surface-variant group-hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-[18px] transition-transform" :class="layananOpen ? 'rotate-180' : ''">expand_more</span>
                        </button>
                    </div>
                    <div x-show="layananOpen" class="ml-4 mt-1 flex flex-col gap-1" style="display:none;">
                        @foreach($navServices as $catName => $catServices)
                            <p class="text-[9px] font-black uppercase tracking-widest text-[#8d6408] px-4 pt-3 pb-1">{{ Str::limit($catName, 30) }}</p>
                            @foreach($catServices->take(4) as $svc)
                            <a href="{{ route('services.show', $svc->slug) }}"
                               class="flex items-center gap-2 rounded-lg px-4 py-2 text-sm text-slate-600 hover:bg-[#f7f2e8] hover:text-[#8d6408] transition-all">
                                <span class="material-symbols-outlined text-[16px]">{{ $svc->icon_image ?: 'gavel' }}</span>
                                {{ __t($svc->title) }}
                            </a>
                            @endforeach
                        @endforeach
                        <a href="/layanan" class="flex items-center gap-2 rounded-xl px-4 py-3 text-[11px] font-black text-[#8d6408] hover:bg-[#f7f2e8] mt-1">
                            <span class="material-symbols-outlined text-[16px]">apps</span>
                            Lihat Semua Layanan
                        </a>
                    </div>
                </div>
                <a href="/portofolio"
                    class="rounded-xl px-4 py-3 font-semibold text-on-surface-variant hover:bg-surface-container-low hover:text-primary">{{ __('Portofolio') }}</a>
                <a href="/tentang-kami"
                    class="rounded-xl px-4 py-3 font-semibold text-on-surface-variant hover:bg-surface-container-low hover:text-primary">{{ __('Tentang Kami') }}</a>
                <a href="/blog"
                    class="rounded-xl px-4 py-3 font-semibold text-on-surface-variant hover:bg-surface-container-low hover:text-primary">{{ __('Blog') }}</a>

                <a href="{{ url('/#kontak') }}" class="btn-primary mt-2">{{ __('Konsultasi Gratis') }}</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Default Footer -->
    <footer class="w-full bg-[#0e0b07] text-white">
        {{-- ═══ TOP DIVIDER BAR ═══ --}}
        <div class="w-full h-px bg-gradient-to-r from-transparent via-[#d9a11a]/40 to-transparent"></div>

        {{-- ═══ PRE-FOOTER CTA STRIP ═══ --}}
        <div class="border-b border-white/5 bg-[#13100a]">
            <div class="mx-auto max-w-7xl px-4 md:px-8 lg:px-20 py-8 flex flex-col md:flex-row items-center justify-between gap-5">
                <div>
                    <p class="text-[10px] font-black uppercase tracking-[0.3em] text-[#d9a11a] mb-1">{{ __('Konsultasi Gratis') }}</p>
                    <p class="text-lg font-black text-white">{{ __('Siap membantu kebutuhan legal & perizinan bisnis Anda') }}</p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ url('/#kontak') }}"
                       class="inline-flex items-center gap-2 rounded-full bg-[#d9a11a] px-6 py-3 text-sm font-black text-[#1c140c] hover:-translate-y-0.5 hover:bg-[#f0c930] transition-all shadow-[0_4px_20px_rgba(217,161,26,0.3)]">
                        {{ __('Mulai Konsultasi') }}
                        <span class="material-symbols-outlined text-[17px]">arrow_forward</span>
                    </a>
                    <a href="https://wa.me/6282318390714?text={{ urlencode(__('Halo AKA Consulting, saya ingin konsultasi.')) }}" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-6 py-3 text-sm font-black text-white hover:bg-white/10 transition-all">
                        <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>

        {{-- ═══ MAIN FOOTER BODY ═══ --}}
        <div class="mx-auto max-w-7xl px-4 md:px-8 lg:px-20 pt-14 pb-10">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-16">

                {{-- Brand Column --}}
                <div class="md:col-span-4">
                    <a href="/" class="inline-flex items-center gap-3 mb-5 group">
                        <img src="{{ isset($settings) && $settings->logo_path ? asset('storage/' . $settings->logo_path) : asset('images/logo_aka.png') }}"
                             alt="{{ $settings->company_name ?? 'AKA Consulting' }}"
                             class="h-10 w-auto object-contain opacity-90 group-hover:opacity-100 transition-opacity">
                        <span class="text-lg font-black text-white tracking-tight">{{ $settings->company_name ?? 'AKA Consulting' }}</span>
                    </a>

                    @if(isset($settings) && $settings->motto)
                    <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#d9a11a] mb-3">
                        &ldquo;{{ $settings->motto }}&rdquo;
                    </p>
                    @endif

                    <p class="text-white/45 text-sm leading-relaxed mb-6 max-w-xs">
                        {{ Str::limit($settings->about_us ?? 'Mitra konsultasi strategis untuk kepatuhan hukum, perizinan, dan pertumbuhan bisnis yang berkelanjutan.', 130) }}
                    </p>

                    {{-- Trust Badges --}}
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-[#d9a11a]/25 bg-[#d9a11a]/8 px-3 py-1.5 text-[10px] font-black uppercase tracking-widest text-[#d9a11a]">
                            <span class="material-symbols-outlined text-[12px]">verified</span>
                            Legal Certified
                        </span>
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-white/8 bg-white/4 px-3 py-1.5 text-[10px] font-black uppercase tracking-widest text-white/35">
                            <span class="material-symbols-outlined text-[12px]">workspace_premium</span>
                            500+ {{ __('Klien') }}
                        </span>
                    </div>

                    {{-- Address --}}
                    @if(isset($settings) && ($settings->address ?? null))
                    <div class="flex items-start gap-2.5 text-white/35 text-xs leading-relaxed mb-5">
                        <span class="material-symbols-outlined text-[#d9a11a] mt-0.5 text-sm shrink-0">location_on</span>
                        <span>{{ $settings->address }}</span>
                    </div>
                    @endif

                    {{-- Contact Admin WA --}}
                    <div>
                        <p class="text-[9px] font-black uppercase tracking-[0.28em] text-white/20 mb-3">{{ __('Hubungi Admin via WhatsApp') }}</p>
                        <div class="flex flex-col gap-2">
                            @php
                                $footerAdmins = [
                                    ['name' => 'Admin 1', 'phone' => '0823-1839-0714', 'wa' => '6282318390714'],
                                    ['name' => 'Admin 2', 'phone' => '0896-0912-7094', 'wa' => '6289609127094'],
                                    ['name' => 'Admin 3', 'phone' => '0852-8098-0748', 'wa' => '6285280980748'],
                                ];
                            @endphp
                            @foreach($footerAdmins as $adm)
                            <a href="https://wa.me/{{ $adm['wa'] }}?text={{ urlencode('Halo ' . $adm['name'] . ', saya ingin konsultasi layanan AKA Consulting.') }}"
                               target="_blank" rel="noopener noreferrer"
                               class="group flex items-center gap-3 rounded-xl border border-white/6 bg-white/3 px-4 py-2.5 hover:border-[#25D366]/30 hover:bg-[#25D366]/5 transition-all">
                                <div class="w-7 h-7 rounded-full bg-[#25D366]/10 flex items-center justify-center shrink-0 group-hover:bg-[#25D366]/20 transition-colors">
                                    <svg class="w-3.5 h-3.5 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                </div>
                                <div>
                                    <p class="text-[11px] font-black text-white/65 group-hover:text-white transition-colors">{{ $adm['name'] }}</p>
                                    <p class="text-[10px] text-white/25 font-mono">{{ $adm['phone'] }}</p>
                                </div>
                                <span class="material-symbols-outlined text-[14px] text-white/15 group-hover:text-[#25D366] transition-colors ml-auto">arrow_forward</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Spacer --}}
                <div class="hidden md:block md:col-span-1"></div>

                {{-- Services Column --}}
                <div class="md:col-span-3">
                    <div class="flex items-center gap-2 mb-5">
                        <span class="w-4 h-px bg-[#d9a11a]"></span>
                        <h4 class="text-[9px] font-black uppercase tracking-[0.3em] text-[#d9a11a]">{{ __('Layanan') }}</h4>
                    </div>
                    <ul class="space-y-2.5">
                        @php
                            $footerServices = \App\Models\Service::where('status', 'active')
                                ->orderBy('sort_order')->limit(8)->get();
                        @endphp
                        @forelse($footerServices as $fs)
                        <li>
                            <a href="/layanan/{{ $fs->slug }}"
                               class="group flex items-center gap-2 text-white/35 hover:text-white transition-colors text-sm">
                                <span class="w-1 h-1 rounded-full bg-[#d9a11a]/30 group-hover:bg-[#d9a11a] transition-colors shrink-0"></span>
                                <span class="line-clamp-1">{{ __t($fs->title) }}</span>
                            </a>
                        </li>
                        @empty
                        <li>
                            <a href="/layanan" class="text-white/35 hover:text-white transition-colors text-sm">{{ __('Lihat Semua Layanan') }}</a>
                        </li>
                        @endforelse
                        <li class="pt-1">
                            <a href="/layanan" class="inline-flex items-center gap-1.5 text-[11px] font-black text-[#d9a11a] hover:text-[#f0c930] transition-colors">
                                {{ __('Lihat Semua') }}
                                <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Company + Stats Column --}}
                <div class="md:col-span-4">
                    <div class="flex items-center gap-2 mb-5">
                        <span class="w-4 h-px bg-[#d9a11a]"></span>
                        <h4 class="text-[9px] font-black uppercase tracking-[0.3em] text-[#d9a11a]">{{ __('Perusahaan') }}</h4>
                    </div>
                    <ul class="space-y-2.5 mb-10">
                        <li><a href="/tentang-kami" class="group flex items-center gap-2 text-white/35 hover:text-white transition-colors text-sm"><span class="w-1 h-1 rounded-full bg-[#d9a11a]/30 group-hover:bg-[#d9a11a] transition-colors shrink-0"></span>{{ __('Tentang Kami') }}</a></li>
                        <li><a href="/portofolio" class="group flex items-center gap-2 text-white/35 hover:text-white transition-colors text-sm"><span class="w-1 h-1 rounded-full bg-[#d9a11a]/30 group-hover:bg-[#d9a11a] transition-colors shrink-0"></span>{{ __('Portofolio') }}</a></li>
                        <li><a href="/blog" class="group flex items-center gap-2 text-white/35 hover:text-white transition-colors text-sm"><span class="w-1 h-1 rounded-full bg-[#d9a11a]/30 group-hover:bg-[#d9a11a] transition-colors shrink-0"></span>{{ __('Blog & Artikel') }}</a></li>
                        <li><a href="{{ url('/#kontak') }}" class="group flex items-center gap-2 text-white/35 hover:text-white transition-colors text-sm"><span class="w-1 h-1 rounded-full bg-[#d9a11a]/30 group-hover:bg-[#d9a11a] transition-colors shrink-0"></span>{{ __('Kontak Kami') }}</a></li>
                    </ul>

                    {{-- Mini Stats Grid --}}
                    <div class="grid grid-cols-3 gap-3">
                        <div class="rounded-2xl border border-white/6 bg-white/3 p-4 text-center">
                            <p class="text-xl font-black text-[#d9a11a]">500+</p>
                            <p class="text-[9px] text-white/30 uppercase tracking-widest mt-1">{{ __('Klien') }}</p>
                        </div>
                        <div class="rounded-2xl border border-white/6 bg-white/3 p-4 text-center">
                            <p class="text-xl font-black text-[#d9a11a]">19+</p>
                            <p class="text-[9px] text-white/30 uppercase tracking-widest mt-1">{{ __('Layanan') }}</p>
                        </div>
                        <div class="rounded-2xl border border-white/6 bg-white/3 p-4 text-center">
                            <p class="text-xl font-black text-[#d9a11a]">10+</p>
                            <p class="text-[9px] text-white/30 uppercase tracking-widest mt-1">{{ __('Tahun') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ WILAYAH LAYANAN (Local SEO Section) ═══ --}}
        <div class="border-t border-white/5 py-8">
            <div class="mx-auto max-w-7xl px-4 md:px-8 lg:px-20">
                <p class="text-[9px] font-black uppercase tracking-[0.3em] text-[#d9a11a]/60 mb-4">{{ __('Wilayah Layanan') }}</p>
                <p class="text-white/20 text-xs leading-relaxed max-w-5xl">
                    {{ __('AKA Consulting melayani jasa konsultasi hukum, perizinan usaha, pendirian PT dan CV, sertifikasi, litigasi, dan pertanahan di seluruh Indonesia — termasuk') }}
                    <span class="text-white/35">
                        Jakarta, Jakarta Selatan, Jakarta Utara, Jakarta Barat, Jakarta Timur, Jakarta Pusat,
                        Bogor, Depok, Tangerang, Tangerang Selatan, Bekasi,
                        Bandung, Cimahi, Karawang, Purwakarta,
                        Surabaya, Sidoarjo, Gresik, Malang,
                        Semarang, Yogyakarta, Solo,
                        Medan, Deli Serdang, Palembang, Pekanbaru, Batam,
                        Makassar, Bali, Denpasar, Balikpapan, Samarinda.
                    </span>
                    {{ __('Konsultasi online dan luar kota tersedia.') }}
                </p>
            </div>
        </div>

        {{-- ═══ BOTTOM BAR ═══ --}}
        <div class="border-t border-white/5">
            <div class="mx-auto max-w-7xl px-4 md:px-8 lg:px-20 py-5 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-white/20 text-xs">
                    &copy; {{ date('Y') }} <span class="text-white/35 font-semibold">{{ $settings->company_name ?? 'AKA Consulting' }}</span>. {{ __('Hak Cipta Dilindungi') }}.
                </p>
                <div class="flex items-center gap-3 flex-wrap justify-center md:justify-end">
                    <a href="{{ route('privacy') }}" class="text-white/20 text-[10px] hover:text-white/45 transition-colors">{{ __('Kebijakan Privasi') }}</a>
                    <span class="w-px h-3 bg-white/10"></span>
                    <a href="{{ route('terms') }}" class="text-white/20 text-[10px] hover:text-white/45 transition-colors">{{ __('Syarat & Ketentuan') }}</a>

                    {{-- Social Media Icons --}}
                    @php
                        $footerSocials = [
                            ['url' => $settings->instagram_url ?? '', 'label' => 'Instagram', 'color' => '#E1306C',
                             'icon' => '<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>'],
                            ['url' => $settings->facebook_url ?? '', 'label' => 'Facebook', 'color' => '#1877F2',
                             'icon' => '<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>'],
                            ['url' => $settings->linkedin_url ?? '', 'label' => 'LinkedIn', 'color' => '#0A66C2',
                             'icon' => '<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>'],
                            ['url' => $settings->tiktok_url ?? '', 'label' => 'TikTok', 'color' => '#ffffff',
                             'icon' => '<path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>'],
                            ['url' => $settings->youtube_url ?? '', 'label' => 'YouTube', 'color' => '#FF0000',
                             'icon' => '<path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/>'],
                            ['url' => $settings->twitter_url ?? '', 'label' => 'Twitter/X', 'color' => '#ffffff',
                             'icon' => '<path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>'],
                        ];
                        $hasAnySocial = collect($footerSocials)->some(fn($s) => !empty($s['url']));
                    @endphp
                    @if($hasAnySocial)
                    <span class="w-px h-3 bg-white/10"></span>
                    <div class="flex items-center gap-2">
                        @foreach($footerSocials as $social)
                        @if(!empty($social['url']))
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                           class="w-7 h-7 rounded-full bg-white/5 border border-white/8 flex items-center justify-center hover:border-[#d9a11a]/40 hover:bg-[#d9a11a]/10 transition-all group"
                           aria-label="{{ $social['label'] }} AKA Consulting">
                            <svg class="w-3 h-3 text-white/25 group-hover:text-[#d9a11a] transition-colors" fill="currentColor" viewBox="0 0 24 24">{!! $social['icon'] !!}</svg>
                        </a>
                        @endif
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </footer>



    <!-- Default Chat Widget -->
    <div x-data="{ 
            open: false, 
            showWidget: false,
            showTooltip: false,
            init() {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 300) {
                        if (!this.showWidget) {
                            this.showWidget = true;
                            // Show tooltip 1 second after widget appears, then hide after 8s
                            setTimeout(() => {
                                if (!this.open) this.showTooltip = true;
                                setTimeout(() => this.showTooltip = false, 8000);
                            }, 1000);
                        }
                    }
                });
            }
         }" 
         x-show="showWidget"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 translate-y-10"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="fixed bottom-6 right-6 z-[60] md:bottom-8 md:right-8" style="display: none;">
        
        <!-- Welcome Tooltip (Floating Bubble) -->
        <div x-show="showTooltip && !open" 
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             class="absolute bottom-20 right-0 w-64 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 mb-2" style="display: none;">
            <div class="flex items-center gap-2 mb-1.5">
                <span class="w-2.5 h-2.5 bg-primary rounded-full animate-pulse shadow-[0_0_8px_rgba(0,159,227,0.5)]"></span>
                <span class="text-[9px] font-black text-primary uppercase tracking-widest">Online Support</span>
            </div>
            <p class="text-[11px] text-slate-700 leading-relaxed font-semibold">Halo! Ada yang bisa kami bantu hari ini?</p>
            <div class="absolute bottom-[-6px] right-6 w-3 h-3 bg-white rotate-45 border-r border-b border-slate-100"></div>
        </div>

        <!-- Chat Panel -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-8"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             class="absolute bottom-20 right-0 w-[320px] md:w-[350px] bg-white rounded-[2rem] shadow-[0_20px_60px_rgba(0,0,0,0.15)] border border-slate-100 overflow-hidden flex flex-col" style="display: none;">
            
            <!-- Header -->
            <div class="p-6 border-b border-slate-50 bg-white">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 bg-primary rounded-full shadow-[0_0_8px_rgba(0,159,227,0.4)]"></span>
                        <span class="text-[10px] font-black text-primary uppercase tracking-[0.2em]">Online Support</span>
                    </div>
                    <button @click="open = false" aria-label="Tutup Panel Chat" class="text-slate-300 hover:text-slate-600 transition-colors">
                        <span class="material-symbols-outlined text-lg notranslate" translate="no">close</span>
                    </button>
                </div>
                <h4 class="text-lg font-bold text-slate-900 leading-snug">
                    Halo! Ada yang bisa kami bantu untuk bisnis Anda hari ini?
                </h4>
            </div>

            <!-- Body (Form) -->
            <div class="p-6 bg-slate-50/20">
                <form action="{{ route('konsultasi.store') }}" method="POST" class="space-y-3.5">
                    @csrf
                    <!-- Honeypot Anti-Spam Field (Sembunyikan dari User) -->
                    <input type="text" name="_website_url" class="hidden" style="display:none" tabindex="-1" autocomplete="off">
                    
                    <input type="hidden" name="sender_email" value="chat-widget@rakira.com">
                    <input type="hidden" name="service" value="Live Chat Consultation">

                    <input type="text" name="sender_name" required placeholder="Nama Lengkap" 
                           class="w-full rounded-xl border-slate-200 bg-white px-4 py-3 text-sm focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder:text-slate-400">

                    <input type="text" name="phone" required placeholder="No. WhatsApp (0812...)" 
                           class="w-full rounded-xl border-slate-200 bg-white px-4 py-3 text-sm focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all placeholder:text-slate-400">

                    <textarea name="message_body" required placeholder="Tulis pertanyaan Anda..." rows="3"
                              class="w-full rounded-xl border-slate-200 bg-white px-4 py-3 text-sm focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all resize-none placeholder:text-slate-400"></textarea>

                    <button type="submit" class="w-full bg-slate-900 text-white font-bold py-3.5 rounded-xl shadow-lg hover:bg-primary transition-all flex items-center justify-center gap-2 group">
                        <span class="text-sm">Kirim ke Admin</span>
                        <span class="material-symbols-outlined text-sm group-hover:translate-x-0.5 transition-transform notranslate" translate="no">send</span>
                    </button>
                </form>

                <div class="mt-6 flex flex-col gap-3" x-data="{ showAdmins: false }">
                    <p class="text-[9px] text-slate-400 font-black uppercase tracking-[0.2em] text-center">Atau Hubungi Langsung</p>

                    {{-- Tombol WhatsApp utama --}}
                    <button @click="showAdmins = !showAdmins"
                            class="flex items-center justify-center gap-2 py-3 w-full bg-[#25D366] text-white rounded-xl text-[12px] font-black shadow-sm hover:bg-[#20c05c] transition-all">
                        <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Chat WhatsApp
                        <span class="material-symbols-outlined text-[16px] transition-transform duration-300" :class="showAdmins ? 'rotate-180' : ''">expand_more</span>
                    </button>

                    {{-- Pilihan 3 Admin --}}
                    <div x-show="showAdmins"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="flex flex-col gap-2">

                        <a href="https://wa.me/6282318390714?text={{ urlencode('Halo Admin 1 AKA Consulting, saya ingin konsultasi layanan.') }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex items-center gap-3 px-4 py-3 bg-white border border-[#e8f5e9] rounded-xl hover:border-[#25D366] hover:bg-[#f0fdf4] transition-all group">
                            <div class="w-9 h-9 rounded-full bg-[#25D366]/15 flex items-center justify-center shrink-0 group-hover:bg-[#25D366]/25 transition-colors">
                                <span class="material-symbols-outlined text-[18px] text-[#25D366]">support_agent</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[12px] font-black text-slate-900">Admin 1</p>
                                <p class="text-[10px] text-slate-400">0823-1839-0714</p>
                            </div>
                            <span class="material-symbols-outlined text-[16px] text-[#25D366]">arrow_forward</span>
                        </a>

                        <a href="https://wa.me/6289609127094?text={{ urlencode('Halo Admin 2 AKA Consulting, saya ingin konsultasi layanan.') }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex items-center gap-3 px-4 py-3 bg-white border border-[#e8f5e9] rounded-xl hover:border-[#25D366] hover:bg-[#f0fdf4] transition-all group">
                            <div class="w-9 h-9 rounded-full bg-[#25D366]/15 flex items-center justify-center shrink-0 group-hover:bg-[#25D366]/25 transition-colors">
                                <span class="material-symbols-outlined text-[18px] text-[#25D366]">support_agent</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[12px] font-black text-slate-900">Admin 2</p>
                                <p class="text-[10px] text-slate-400">0896-0912-7094</p>
                            </div>
                            <span class="material-symbols-outlined text-[16px] text-[#25D366]">arrow_forward</span>
                        </a>

                        <a href="https://wa.me/6285280980748?text={{ urlencode('Halo Admin 3 AKA Consulting, saya ingin konsultasi layanan.') }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex items-center gap-3 px-4 py-3 bg-white border border-[#e8f5e9] rounded-xl hover:border-[#25D366] hover:bg-[#f0fdf4] transition-all group">
                            <div class="w-9 h-9 rounded-full bg-[#25D366]/15 flex items-center justify-center shrink-0 group-hover:bg-[#25D366]/25 transition-colors">
                                <span class="material-symbols-outlined text-[18px] text-[#25D366]">support_agent</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[12px] font-black text-slate-900">Admin 3</p>
                                <p class="text-[10px] text-slate-400">0852-8098-0748</p>
                            </div>
                            <span class="material-symbols-outlined text-[16px] text-[#25D366]">arrow_forward</span>
                        </a>
                    </div>

                    {{-- Social Media Links in Chat Widget --}}
                    @php
                        $chatSocials = [
                            ['url' => $settings->instagram_url ?? '', 'label' => 'Instagram', 'color' => '#E1306C', 'icon' => '<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>'],
                            ['url' => $settings->facebook_url ?? '', 'label' => 'Facebook', 'color' => '#1877F2', 'icon' => '<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>'],
                            ['url' => $settings->linkedin_url ?? '', 'label' => 'LinkedIn', 'color' => '#0A66C2', 'icon' => '<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>'],
                            ['url' => $settings->tiktok_url ?? '', 'label' => 'TikTok', 'color' => '#010101', 'icon' => '<path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>'],
                            ['url' => $settings->youtube_url ?? '', 'label' => 'YouTube', 'color' => '#FF0000', 'icon' => '<path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/>'],
                            ['url' => $settings->twitter_url ?? '', 'label' => 'Twitter/X', 'color' => '#000000', 'icon' => '<path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>'],
                        ];
                        $activeChatSocials = array_filter($chatSocials, fn($s) => !empty($s['url']));
                    @endphp
                    @if(count($activeChatSocials) > 0)
                    <div class="border-t border-slate-100 pt-3">
                        <p class="text-[9px] font-black uppercase tracking-widest text-slate-400 mb-2">{{ __('Ikuti Kami') }}</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($activeChatSocials as $cs)
                            <a href="{{ $cs['url'] }}" target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border border-slate-100 bg-white text-[10px] font-bold text-slate-600 hover:border-slate-300 hover:shadow-sm transition-all"
                               aria-label="{{ $cs['label'] }}">
                                <svg class="w-3 h-3 shrink-0" fill="{{ $cs['color'] }}" viewBox="0 0 24 24">{!! $cs['icon'] !!}</svg>
                                {{ $cs['label'] }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>



            </div>
        </div>

        <!-- Toggle Button -->
        <button @click="open = !open; showTooltip = false" aria-label="Buka Chat Layanan"
                class="w-16 h-16 rounded-full bg-primary text-white shadow-xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all duration-300 relative overflow-hidden group">
            <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            <span class="material-symbols-outlined text-2xl relative z-10 notranslate" translate="no" x-show="!open">chat</span>
            <span class="material-symbols-outlined text-2xl relative z-10 notranslate" translate="no" x-show="open" style="display: none;">close</span>
        </button>
    </div>

    <!-- Cookie Consent Banner -->
    <div x-data="{ showCookie: !localStorage.getItem('cookieConsent') }"
         x-show="showCookie"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 translate-y-full"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-full"
         class="fixed bottom-0 left-0 w-full z-50 bg-white border-t border-slate-200 shadow-[0_-10px_40px_rgba(0,0,0,0.05)] p-4 md:p-6" style="display: none;">
        <div class="mx-auto max-w-7xl flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex-1">
                <p class="text-sm text-slate-600 leading-relaxed">
                    Kami menggunakan cookies untuk meningkatkan pengalaman pengguna, menganalisis lalu lintas, dan menyajikan konten yang relevan. Dengan melanjutkan penggunaan situs ini, Anda menyetujui <a href="{{ route('privacy') }}" class="text-primary font-semibold hover:underline">Kebijakan Privasi</a> kami.
                </p>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <button @click="showCookie = false" class="px-5 py-2 text-sm font-semibold text-slate-500 hover:bg-slate-100 rounded-lg transition-colors">Tolak</button>
                <button @click="localStorage.setItem('cookieConsent', 'true'); showCookie = false" class="btn-primary shadow-sm px-6 py-2">Terima Cookies</button>
            </div>
        </div>
    </div>

    {{-- ═══ BACK TO TOP BUTTON (Global) ═══ --}}
    <button id="back-to-top"
            aria-label="Kembali ke atas"
            onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
            style="position:fixed;bottom:1.75rem;left:1.75rem;z-index:55;width:3rem;height:3rem;border-radius:9999px;background:rgba(28,20,12,0.88);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border:1px solid rgba(217,161,26,0.25);box-shadow:0 8px 28px rgba(28,20,12,0.28);display:flex;align-items:center;justify-content:center;cursor:pointer;opacity:0;transform:translateY(14px) scale(0.88);transition:opacity 0.35s cubic-bezier(.4,0,.2,1),transform 0.35s cubic-bezier(.4,0,.2,1),box-shadow 0.25s ease,background 0.25s ease;pointer-events:none;">
        <span class="material-symbols-outlined notranslate" translate="no"
              style="color:#f7d78a;font-size:1.3rem;line-height:1;display:block;">keyboard_arrow_up</span>
    </button>

    <script>
    (function(){
        var b=document.getElementById('back-to-top');
        if(!b)return;
        var T=400,t=false;
        function u(){
            if(window.scrollY>T){b.style.opacity='1';b.style.transform='translateY(0) scale(1)';b.style.pointerEvents='auto';}
            else{b.style.opacity='0';b.style.transform='translateY(14px) scale(0.88)';b.style.pointerEvents='none';}
        }
        window.addEventListener('scroll',function(){if(!t){window.requestAnimationFrame(function(){u();t=false;});t=true;}},{passive:true});
        b.addEventListener('mouseenter',function(){b.style.background='rgba(141,100,8,0.95)';b.style.boxShadow='0 12px 36px rgba(217,161,26,0.35),0 0 0 4px rgba(217,161,26,0.12)';if(parseFloat(b.style.opacity)>0)b.style.transform='translateY(-3px) scale(1.08)';});
        b.addEventListener('mouseleave',function(){b.style.background='rgba(28,20,12,0.88)';b.style.boxShadow='0 8px 28px rgba(28,20,12,0.28)';if(parseFloat(b.style.opacity)>0)b.style.transform='translateY(0) scale(1)';});
        b.addEventListener('mousedown',function(){b.style.transform='scale(0.94)';});
        b.addEventListener('mouseup',function(){b.style.transform='translateY(-3px) scale(1.08)';});
    })();
    </script>

    @stack('scripts')
</body>

</html>