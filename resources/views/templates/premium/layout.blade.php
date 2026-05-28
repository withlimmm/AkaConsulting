<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'AKA Consulting Premium - Layanan Konsultasi Terdepan')</title>
    <meta name="description" content="@yield('meta_description', $settings->about_us ?? 'AKA Consulting menyediakan layanan konsultasi hukum, perizinan, dan manajemen kepatuhan untuk membantu bisnis beroperasi sesuai regulasi dan tumbuh berkelanjutan.')">
    <meta name="keywords" content="@yield('meta_keywords', 'konsultan hukum perusahaan, jasa perizinan usaha, konsultan kepatuhan bisnis, manajemen risiko usaha, layanan konsultasi bisnis, aka consulting')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
    "name": "{{ $settings->company_name ?? 'AKA Consulting, Konsultan Terpercaya' }}",
    "alternateName": "AKA Consulting",
      "url": "{{ url('/') }}",
      "logo": "{{ isset($settings) && $settings->logo_path ? asset('storage/' . $settings->logo_path) : asset('images/logo_aka.png') }}",
    "description": "{{ $settings->about_us ?? 'AKA Consulting menyediakan layanan konsultasi hukum, perizinan, dan manajemen kepatuhan untuk membantu bisnis beroperasi sesuai regulasi dan tumbuh berkelanjutan.' }}",
      "contactPoint": {
        "@@type": "ContactPoint",
        "telephone": "+{{ $settings->phone ?? '6287868184742' }}",
        "contactType": "customer service",
        "areaServed": "ID",
        "availableLanguage": ["id", "en"]
      },
      "sameAs": [
        "https://www.instagram.com/akaconsulting"
      ]
    }
    </script>

    <!-- Google Fonts: Outfit & Sora -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Sora:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #030712; /* Tailwind gray-950 */
            color: #f3f4f6; /* Tailwind gray-100 */
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Sora', sans-serif;
        }
        /* Custom scrollbar for premium theme */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #030712;
        }
        ::-webkit-scrollbar-thumb {
            background: #1f2937;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #3b82f6;
        }
        /* Glassmorphism utility */
        .premium-glass {
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .premium-glass-card {
            background: rgba(30, 41, 59, 0.45);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .premium-glass-card:hover {
            background: rgba(30, 41, 59, 0.7);
            border-color: rgba(59, 130, 246, 0.4);
            box-shadow: 0 20px 40px -15px rgba(59, 130, 246, 0.3);
            transform: translateY(-4px);
        }
        .glow-text-cyan {
            text-shadow: 0 0 20px rgba(6, 182, 212, 0.4);
        }
        .glow-text-indigo {
            text-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
        }
        .glow-border {
            position: relative;
        }
        .glow-border::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(to bottom right, rgba(59, 130, 246, 0.4), transparent, rgba(168, 85, 247, 0.4));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }
    </style>
</head>

<body class="site-shell selection:bg-blue-600 selection:text-white">

    <!-- Floating Top Navigation Bar -->
    <div class="fixed top-4 left-0 z-50 w-full px-4 md:px-8">
        <nav class="mx-auto max-w-7xl premium-glass rounded-2xl shadow-2xl transition-all duration-300">
            <div class="flex h-20 items-center justify-between px-6 md:px-10">
                <a href="/?theme=premium" class="flex items-center group">
                    <img src="/images/logo_aka.png" alt="AKA Consulting"
                        class="h-16 w-auto object-contain transition-transform duration-300 group-hover:scale-105 md:h-20">
                </a>

                <div class="hidden items-center space-x-8 md:flex">
                    <a href="/?theme=premium"
                        class="{{ request()->is('/') ? 'text-blue-400 font-bold border-b border-blue-400' : 'text-slate-300 hover:text-white' }} transition-colors duration-300 py-1 text-sm font-medium">{{ __('Beranda') }}</a>
                    <a href="/layanan?theme=premium"
                        class="{{ request()->is('layanan*') ? 'text-blue-400 font-bold border-b border-blue-400' : 'text-slate-300 hover:text-white' }} transition-colors duration-300 py-1 text-sm font-medium">{{ __('Layanan') }}</a>
                    <a href="/portofolio?theme=premium"
                        class="{{ request()->is('portofolio*') ? 'text-blue-400 font-bold border-b border-blue-400' : 'text-slate-300 hover:text-white' }} transition-colors duration-300 py-1 text-sm font-medium">{{ __('Portofolio') }}</a>
                    <a href="/tentang-kami?theme=premium"
                        class="{{ request()->is('tentang-kami*') ? 'text-blue-400 font-bold border-b border-blue-400' : 'text-slate-300 hover:text-white' }} transition-colors duration-300 py-1 text-sm font-medium">{{ __('Tentang Kami') }}</a>
                    <a href="/blog?theme=premium"
                        class="{{ request()->is('blog*') ? 'text-blue-400 font-bold border-b border-blue-400' : 'text-slate-300 hover:text-white' }} transition-colors duration-300 py-1 text-sm font-medium">{{ __('Blog') }}</a>
                </div>

                <div class="hidden md:flex items-center gap-4">
                    <div class="relative" x-data="{ langOpen: false }" @click.away="langOpen = false">
                        <button @click="langOpen = !langOpen" class="flex items-center gap-2 border border-white/10 rounded-xl px-3 py-1.5 bg-white/5 backdrop-blur-md text-xs font-bold text-white hover:bg-white/10 transition-colors notranslate" translate="no">
                            @if(app()->getLocale() == 'id')
                                <img src="https://flagcdn.com/w20/id.png" alt="ID" class="w-4 h-3 object-cover rounded-[2px] shadow-sm">
                                <span>ID</span>
                            @else
                                <img src="https://flagcdn.com/w20/gb.png" alt="EN" class="w-4 h-3 object-cover rounded-[2px] shadow-sm">
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
                             class="absolute right-0 mt-2 w-36 bg-slate-900 rounded-2xl shadow-[0_20px_40px_rgba(0,0,0,0.5)] border border-white/10 py-2 z-50 notranslate" style="display:none;" translate="no">
                            <a href="{{ route('lang.switch', 'id') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/5 transition-colors {{ app()->getLocale() == 'id' ? 'text-blue-400 font-black bg-blue-500/10 border-l-2 border-blue-500' : 'text-slate-300 font-semibold border-l-2 border-transparent' }}">
                                <img src="https://flagcdn.com/w20/id.png" alt="ID" class="w-5 h-3.5 object-cover rounded-[3px] shadow-[0_1px_2px_rgba(0,0,0,0.3)]">
                                <span class="text-[11px] uppercase tracking-wider">Indonesia</span>
                            </a>
                            <a href="{{ route('lang.switch', 'en') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/5 transition-colors {{ app()->getLocale() == 'en' ? 'text-blue-400 font-black bg-blue-500/10 border-l-2 border-blue-500' : 'text-slate-300 font-semibold border-l-2 border-transparent' }}">
                                <img src="https://flagcdn.com/w20/gb.png" alt="EN" class="w-5 h-3.5 object-cover rounded-[3px] shadow-[0_1px_2px_rgba(0,0,0,0.3)]">
                                <span class="text-[11px] uppercase tracking-wider">English</span>
                            </a>
                        </div>
                    </div>
                    <a href="#kontak" class="relative group overflow-hidden rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3 text-sm font-bold text-white shadow-xl transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_0_25px_rgba(59,130,246,0.4)]">
                        <span class="relative z-10">{{ __('Mulai Konsultasi') }}</span>
                        <div class="absolute inset-0 bg-white/10 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                    </a>
                </div>

                <button type="button" data-mobile-nav-toggle aria-expanded="false" aria-label="Buka Menu Navigasi"
                    class="md:hidden rounded-lg p-2 text-slate-300 hover:bg-white/10">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div data-mobile-nav-panel class="mobile-nav-panel hidden !top-24 !left-4 !right-4 !inset-x-auto premium-glass !border-white/10 rounded-2xl p-6 shadow-2xl">
                <div class="flex items-center justify-between border-b border-white/5 pb-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-400">{{ __('Navigasi Premium') }}</p>
                        <p class="text-sm text-slate-400">{{ __('Jelajahi halaman dengan mudah') }}</p>
                    </div>
                    <button type="button" data-mobile-nav-close aria-label="Tutup Menu Navigasi"
                        class="rounded-lg p-2 text-slate-400 hover:bg-white/5 hover:text-white">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <div class="mt-6 grid gap-3">
                    <div class="px-4 mb-4" x-data="{ langOpenMob: false }">
                        <button @click="langOpenMob = !langOpenMob" class="flex items-center justify-between w-full rounded-xl border border-white/10 px-4 py-3 bg-white/5 text-xs font-bold text-white hover:bg-white/10 transition-colors notranslate" translate="no">
                            <div class="flex items-center gap-2.5">
                                @if(app()->getLocale() == 'id')
                                    <img src="https://flagcdn.com/w20/id.png" alt="ID" class="w-5 h-3.5 object-cover rounded-[3px] shadow-[0_1px_2px_rgba(0,0,0,0.3)]">
                                    <span>Indonesia</span>
                                @else
                                    <img src="https://flagcdn.com/w20/gb.png" alt="EN" class="w-5 h-3.5 object-cover rounded-[3px] shadow-[0_1px_2px_rgba(0,0,0,0.3)]">
                                    <span>English</span>
                                @endif
                            </div>
                            <span class="material-symbols-outlined text-[16px] transition-transform duration-200" :class="langOpenMob ? 'rotate-180' : ''">expand_more</span>
                        </button>
                        <div x-show="langOpenMob" class="mt-2 flex flex-col gap-1 pl-2 notranslate" style="display:none;" translate="no">
                            <a href="{{ route('lang.switch', 'id') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/5 {{ app()->getLocale() == 'id' ? 'text-blue-400 font-black bg-blue-500/10' : 'text-slate-300 font-semibold' }}">
                                <img src="https://flagcdn.com/w20/id.png" alt="ID" class="w-5 h-3.5 object-cover rounded-[3px] shadow-[0_1px_2px_rgba(0,0,0,0.3)]">
                                <span class="text-xs">Indonesia</span>
                            </a>
                            <a href="{{ route('lang.switch', 'en') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-white/5 {{ app()->getLocale() == 'en' ? 'text-blue-400 font-black bg-blue-500/10' : 'text-slate-300 font-semibold' }}">
                                <img src="https://flagcdn.com/w20/gb.png" alt="EN" class="w-5 h-3.5 object-cover rounded-[3px] shadow-[0_1px_2px_rgba(0,0,0,0.3)]">
                                <span class="text-xs">English</span>
                            </a>
                        </div>
                    </div>
                    <a href="/?theme=premium"
                        class="rounded-xl px-4 py-3 font-semibold text-slate-300 hover:bg-white/5 hover:text-white">{{ __('Beranda') }}</a>
                    <a href="/layanan?theme=premium"
                        class="rounded-xl px-4 py-3 font-semibold text-slate-300 hover:bg-white/5 hover:text-white">{{ __('Layanan') }}</a>
                    <a href="/portofolio?theme=premium"
                        class="rounded-xl px-4 py-3 font-semibold text-slate-300 hover:bg-white/5 hover:text-white">{{ __('Portofolio') }}</a>
                    <a href="/tentang-kami?theme=premium"
                        class="rounded-xl px-4 py-3 font-semibold text-slate-300 hover:bg-white/5 hover:text-white">{{ __('Tentang Kami') }}</a>
                    <a href="/blog?theme=premium"
                        class="rounded-xl px-4 py-3 font-semibold text-slate-300 hover:bg-white/5 hover:text-white">{{ __('Blog') }}</a>

                    <a href="#kontak" class="mt-3 flex items-center justify-center rounded-xl bg-blue-600 py-3.5 font-bold text-white shadow-lg hover:bg-blue-500">{{ __('Mulai Konsultasi') }}</a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Main Content Area -->
    <main class="min-h-screen pt-20">
        @yield('content')
    </main>

    <!-- Premium Footer -->
    <footer class="w-full border-t border-white/5 bg-[#030712] py-20 text-slate-400 relative overflow-hidden">
        <!-- Background glows -->
        <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-blue-900/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/4 w-[400px] h-[400px] bg-purple-900/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-12 px-6 md:grid-cols-4 md:px-8 lg:px-20 relative z-10">
            {{-- Col 1: Brand + Alamat + WA --}}
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-3 mb-6">
                    <img src="/images/logo_aka.png" alt="AKA Consulting" class="h-16 w-auto object-contain md:h-20">
                    <h3 class="text-2xl font-black text-white tracking-tight">{{ $settings->company_name ?? 'AKA Consulting' }}</h3>
                </div>
                @if($settings->motto)
                    <p class="text-yellow-400/80 max-w-md mb-4 italic font-medium">"{{ $settings->motto }}"</p>
                @endif
                <p class="text-slate-400 max-w-md leading-relaxed mb-6">
                    {{ $settings->about_us ?? 'Partner profesional yang membantu bisnis bertumbuh melalui solusi legal dan perizinan yang terpercaya, efektif, dan berintegritas.' }}
                </p>

                {{-- Alamat --}}
                @if($settings->address ?? null)
                <div class="flex items-start gap-2 mb-6 text-slate-400 text-sm">
                    <span class="material-symbols-outlined text-yellow-400 mt-0.5 text-base">location_on</span>
                    <span class="leading-relaxed">{{ $settings->address }}</span>
                </div>
                @endif

                {{-- Tombol WA Admin --}}
                <div class="space-y-2">
                    <p class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-3">Hubungi Admin</p>
                    <a href="https://wa.me/6282318390714?text=Halo%20Admin%201%2C%20saya%20ingin%20konsultasi%20layanan%20AKA%20Consulting."
                       target="_blank"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-green-500/10 border border-green-500/20 hover:bg-green-500/20 transition-all group w-fit">
                        <svg class="w-4 h-4 text-green-400 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        <span class="text-sm text-green-400 font-semibold group-hover:text-green-300">Admin 1 — 0823-1839-0714</span>
                    </a>
                    <a href="https://wa.me/6289609127094?text=Halo%20Admin%202%2C%20saya%20ingin%20konsultasi%20layanan%20AKA%20Consulting."
                       target="_blank"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-green-500/10 border border-green-500/20 hover:bg-green-500/20 transition-all group w-fit">
                        <svg class="w-4 h-4 text-green-400 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        <span class="text-sm text-green-400 font-semibold group-hover:text-green-300">Admin 2 — 0896-0912-7094</span>
                    </a>
                    <a href="https://wa.me/6285280980748?text=Halo%20Admin%203%2C%20saya%20ingin%20konsultasi%20layanan%20AKA%20Consulting."
                       target="_blank"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-green-500/10 border border-green-500/20 hover:bg-green-500/20 transition-all group w-fit">
                        <svg class="w-4 h-4 text-green-400 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        <span class="text-sm text-green-400 font-semibold group-hover:text-green-300">Admin 3 — 0852-8098-0748</span>
                    </a>
                </div>
            </div>

            {{-- Col 3: Layanan Dinamis dari DB --}}
            <div>
                <h4 class="font-bold mb-6 uppercase tracking-wider text-white text-sm">Layanan Kami</h4>
                <ul class="space-y-2.5 text-slate-400">
                    @php
                        $footerServices = \App\Models\Service::where('status', 'active')
                            ->orderBy('sort_order')->limit(8)->get();
                    @endphp
                    @forelse($footerServices as $fs)
                        <li>
                            <a href="/layanan/{{ $fs->slug }}?theme=premium"
                               class="hover:text-yellow-400 transition-colors text-sm leading-snug line-clamp-1">
                                {{ __t($fs->title) }}
                            </a>
                        </li>
                    @empty
                        <li><a href="/layanan?theme=premium" class="hover:text-yellow-400 transition-colors">Lihat Semua Layanan</a></li>
                    @endforelse
                    <li class="pt-1">
                        <a href="/layanan?theme=premium" class="text-yellow-400 hover:text-yellow-300 text-sm font-semibold transition-colors">
                            Lihat Semua →
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Col 4: Navigasi --}}
            <div>
                <h4 class="font-bold mb-6 uppercase tracking-wider text-white text-sm">Perusahaan</h4>
                <ul class="space-y-3 text-slate-400">
                    <li><a href="/tentang-kami?theme=premium" class="hover:text-yellow-400 transition-colors text-sm">Tentang Kami</a></li>
                    <li><a href="/portofolio?theme=premium" class="hover:text-yellow-400 transition-colors text-sm">Portofolio</a></li>
                    <li><a href="/blog?theme=premium" class="hover:text-yellow-400 transition-colors text-sm">Blog & Update</a></li>
                    <li><a href="/kontak?theme=premium" class="hover:text-yellow-400 transition-colors text-sm">Kontak Kami</a></li>
                </ul>
            </div>
        </div>

        <div class="mx-auto max-w-7xl mt-16 pt-8 border-t border-white/5 text-center text-slate-600 text-sm px-6 md:px-8">
            &copy; {{ date('Y') }} {{ $settings->company_name ?? 'AKA Consulting' }}. Hak Cipta Dilindungi.
        </div>
    </footer>


    <!-- Premium Chat Widget -->
    <div x-data="{ 
            open: false, 
            showWidget: false,
            showTooltip: false,
            init() {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 300) {
                        if (!this.showWidget) {
                            this.showWidget = true;
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
         x-transition:enter-start="opacity-0 translate-y-10 scale-90"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         class="fixed bottom-6 right-6 z-[60] md:bottom-8 md:right-8">
        
        <!-- Welcome Tooltip -->
        <div x-show="showTooltip && !open" 
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-300"
             class="absolute bottom-20 right-0 w-64 bg-slate-900 border border-white/10 p-4 rounded-2xl shadow-[0_20px_40px_rgba(0,0,0,0.5)] mb-2">
            <div class="flex items-center gap-2 mb-1.5">
                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-ping"></span>
                <span class="text-[9px] font-black text-emerald-400 uppercase tracking-widest">Premium Assistant</span>
            </div>
            <p class="text-xs text-slate-200 leading-relaxed font-semibold">Ada kebutuhan konsultasi atau perizinan? Mari diskusikan bersama tim ahli kami.</p>
            <div class="absolute bottom-[-6px] right-6 w-3 h-3 bg-slate-900 rotate-45 border-r border-b border-white/10"></div>
        </div>

        <!-- Chat Panel -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-8"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             class="absolute bottom-20 right-0 w-[320px] md:w-[360px] bg-slate-950/95 border border-white/10 rounded-[2rem] shadow-[0_30px_70px_rgba(0,0,0,0.8)] backdrop-blur-xl overflow-hidden flex flex-col">
            
            <!-- Header -->
            <div class="p-6 border-b border-white/5 bg-slate-900/50">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-emerald-400 rounded-full shadow-[0_0_8px_rgba(16,185,129,0.5)]"></span>
                        <span class="text-[10px] font-black text-emerald-400 uppercase tracking-[0.2em]">Live Consultation</span>
                    </div>
                    <button @click="open = false" aria-label="Tutup Panel Chat" class="text-slate-500 hover:text-slate-200 transition-colors">
                        <span class="material-symbols-outlined text-lg">close</span>
                    </button>
                </div>
                <h4 class="text-base font-bold text-white leading-snug">
                    Hubungi kami kapan saja untuk konsultasi gratis.
                </h4>
            </div>

            <!-- Body (Form) -->
            <div class="p-6 bg-slate-950/30">
                <form action="{{ route('konsultasi.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="sender_email" value="premium-chat@rakira.com">
                    <input type="hidden" name="service" value="Premium Hub Consultation">

                    <input type="text" name="sender_name" required placeholder="Nama Anda" 
                           class="w-full rounded-xl border border-white/10 bg-slate-900/80 px-4 py-3 text-sm text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 transition-all placeholder:text-slate-500">

                    <input type="text" name="phone" required placeholder="WhatsApp (0812...)" 
                           class="w-full rounded-xl border border-white/10 bg-slate-900/80 px-4 py-3 text-sm text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 transition-all placeholder:text-slate-500">

                    <textarea name="message_body" required placeholder="Tulis rencana proyek Anda di sini..." rows="3"
                              class="w-full rounded-xl border border-white/10 bg-slate-900/80 px-4 py-3 text-sm text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 transition-all resize-none placeholder:text-slate-500"></textarea>

                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold py-3.5 rounded-xl shadow-lg hover:shadow-[0_0_20px_rgba(59,130,246,0.3)] transition-all flex items-center justify-center gap-2 group">
                        <span class="text-sm">Mulai Konsultasi</span>
                        <span class="material-symbols-outlined text-sm group-hover:translate-x-0.5 transition-transform">send</span>
                    </button>
                </form>

                <div class="mt-6 flex flex-col items-center gap-3">
                    <p class="text-[9px] text-slate-500 font-black uppercase tracking-[0.2em]">Atau Hubungi Langsung</p>
                    <div class="grid grid-cols-2 gap-2 w-full">
                        <a href="https://wa.me/{{ $settings->phone ?? '6287868184742' }}" target="_blank" class="flex items-center justify-center gap-2 py-2.5 bg-slate-900/50 border border-white/5 rounded-lg text-[11px] font-bold text-slate-300 hover:border-emerald-500 hover:text-emerald-400 transition-all shadow-sm">
                            <img src="https://cdn-icons-png.flaticon.com/512/124/124034.png" class="w-3.5 h-3.5" alt="WA"> WhatsApp
                        </a>
                        <a href="https://www.instagram.com/akaconsulting" target="_blank" class="flex items-center justify-center gap-2 py-2.5 bg-slate-900/50 border border-white/5 rounded-lg text-[11px] font-bold text-slate-300 hover:border-primary-container hover:text-primary-container transition-all shadow-sm">
                            <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" class="w-3.5 h-3.5" alt="IG"> Instagram
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toggle Button -->
        <button @click="open = !open; showTooltip = false" aria-label="Buka Chat Layanan"
                class="w-16 h-16 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-500 text-white shadow-[0_0_20px_rgba(59,130,246,0.4)] flex items-center justify-center hover:scale-105 active:scale-95 transition-all duration-300 relative overflow-hidden group">
            <div class="absolute inset-0 bg-white/10 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            <span class="material-symbols-outlined text-2xl relative z-10" x-show="!open">chat</span>
            <span class="material-symbols-outlined text-2xl relative z-10" x-show="open">close</span>
        </button>
    </div>

    @stack('scripts')
</body>

</html>
