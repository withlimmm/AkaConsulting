<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'AKA Consulting, Konsultan Terpercaya')</title>
    <meta name="description" content="@yield('meta_description', $settings->about_us ?? 'AKA Consulting menyediakan layanan konsultasi hukum, perizinan, dan manajemen kepatuhan untuk membantu bisnis beroperasi sesuai regulasi dan tumbuh berkelanjutan.')">
    <meta name="keywords" content="@yield('meta_keywords', 'konsultan hukum perusahaan, jasa perizinan usaha, konsultan kepatuhan bisnis, manajemen risiko usaha, layanan konsultasi bisnis, aka consulting')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Google Search Console Verification -->
    @if(isset($settings) && $settings->google_site_verification)
    <meta name="google-site-verification" content="{{ $settings->google_site_verification }}">
    @endif

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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="site-shell selection:bg-primary selection:text-white">

    <!-- Top Navigation Bar -->
    <nav
        class="fixed top-0 z-50 w-full border-b border-primary/10 bg-glass-fill shadow-soft backdrop-blur-xl transition-all duration-300 data-[scrolled=true]:border-outline-variant/30 data-[scrolled=true]:bg-white/92">
        <div class="mx-auto flex h-24 max-w-7xl items-center justify-between px-4 md:px-8 lg:px-20">
            <a href="/" class="flex items-center group overflow-visible">
                <img src="/images/logo_aka.png" alt="AKA Consulting"
                    style="height: 140px; width: auto; max-width: none; object-fit: contain;">
            </a>

            <div class="hidden items-center space-x-8 md:flex">
                <a href="/"
                    class="{{ request()->is('/') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-300 py-1">{{ __('Beranda') }}</a>
                <a href="/layanan"
                    class="{{ request()->is('layanan*') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-300 py-1">{{ __('Layanan') }}</a>
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
                         class="absolute right-0 mt-2 w-36 bg-white rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.1)] border border-slate-100 py-2 z-50 notranslate" style="display:none;" translate="no">
                        <a href="{{ route('lang.switch', 'id') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-50 transition-colors {{ app()->getLocale() == 'id' ? 'text-primary font-black bg-primary/5 border-l-2 border-primary' : 'text-slate-600 font-semibold border-l-2 border-transparent' }}">
                            <img src="https://flagcdn.com/w20/id.png" alt="ID" class="w-5 h-3.5 object-cover rounded-[3px] shadow-[0_1px_2px_rgba(0,0,0,0.1)]">
                            <span class="text-[11px] uppercase tracking-wider">Indonesia</span>
                        </a>
                        <a href="{{ route('lang.switch', 'en') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-slate-50 transition-colors {{ app()->getLocale() == 'en' ? 'text-primary font-black bg-primary/5 border-l-2 border-primary' : 'text-slate-600 font-semibold border-l-2 border-transparent' }}">
                            <img src="https://flagcdn.com/w20/gb.png" alt="EN" class="w-5 h-3.5 object-cover rounded-[3px] shadow-[0_1px_2px_rgba(0,0,0,0.1)]">
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
                <span class="material-symbols-outlined">menu</span>
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
                    <span class="material-symbols-outlined">close</span>
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
                <a href="/layanan"
                    class="rounded-xl px-4 py-3 font-semibold text-on-surface-variant hover:bg-surface-container-low hover:text-primary">{{ __('Layanan') }}</a>
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

    <!-- Footer -->
    <footer class="w-full border-t border-primary/15 bg-[#15100a] py-16 text-white">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-4 md:grid-cols-4 md:px-8 lg:px-20">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ isset($settings) && $settings->logo_path ? asset('storage/' . $settings->logo_path) : asset('images/logo_aka.png') }}"
                        alt="{{ $settings->company_name ?? 'AKA Consulting, Konsultan Terpercaya' }}" class="h-10 w-auto object-contain">
                    <h3 class="text-2xl font-bold">{{ $settings->company_name ?? 'AKA Consulting, Konsultan Terpercaya' }}</h3>
                </div>
                @if($settings->motto)
                    @php $mottos = is_array($settings->motto) ? $settings->motto : [$settings->motto]; @endphp
                    @if(count($mottos) > 0)
                        <div class="relative h-6 mb-4 overflow-hidden motto-slideshow-container">
                            @foreach($mottos as $index => $m)
                                <p class="absolute top-0 left-0 w-full text-white/60 max-w-md italic text-primary-container transition-all duration-1000 motto-slide" 
                                   style="opacity: {{ $index === 0 ? '1' : '0' }}; transform: translateY({{ $index === 0 ? '0' : '10px' }});">
                                    "{{ $m }}"
                                </p>
                            @endforeach
                        </div>
                        @if(count($mottos) > 1 && !View::hasSection('motto_script_added'))
                            @section('motto_script_added', true)
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const containers = document.querySelectorAll('.motto-slideshow-container');
                                    containers.forEach(container => {
                                        const slides = container.querySelectorAll('.motto-slide');
                                        let current = 0;
                                        if (slides.length > 1) {
                                            setInterval(() => {
                                                slides[current].style.opacity = '0';
                                                slides[current].style.transform = 'translateY(-10px)';
                                                current = (current + 1) % slides.length;
                                                slides[current].style.opacity = '1';
                                                slides[current].style.transform = 'translateY(0)';
                                                setTimeout(() => {
                                                    let prev = (current === 0) ? slides.length - 1 : current - 1;
                                                    slides[prev].style.transform = 'translateY(10px)';
                                                }, 1000);
                                            }, 4000);
                                        }
                                    });
                                });
                            </script>
                        @endif
                    @endif
                @endif
                <p class="text-white/60 max-w-md">
                    {{ Str::limit($settings->about_us ?? 'AKA Consulting menyediakan layanan konsultasi hukum, perizinan, dan manajemen kepatuhan untuk membantu bisnis beroperasi sesuai regulasi dan tumbuh berkelanjutan.', 150) }}
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-4 uppercase text-primary-container">Layanan</h4>
                <ul class="space-y-2 text-white/60">
                    <li><a href="/layanan" class="hover:text-white transition-colors">Konsultasi Hukum</a></li>
                    <li><a href="/layanan" class="hover:text-white transition-colors">Perizinan Usaha</a></li>
                    <li><a href="/layanan" class="hover:text-white transition-colors">Kepatuhan Bisnis</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4 uppercase text-primary-container">Perusahaan</h4>
                <ul class="space-y-2 text-white/60">
                    <li><a href="/tentang-kami" class="hover:text-white transition-colors">Tentang Kami</a></li>
                    <li><a href="/portofolio" class="hover:text-white transition-colors">Portofolio</a></li>
                    <li><a href="/blog" class="hover:text-white transition-colors">Blog</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-12 pt-8 border-t border-white/10 text-center text-white/40 text-sm">
            &copy; {{ date('Y') }} {{ $settings->company_name ?? 'AKA Consulting, Konsultan Terpercaya' }}. Hak Cipta Dilindungi.
        </div>
    </footer>

    <!-- Rakira Smart Chat Widget -->
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
         class="fixed bottom-6 right-6 z-[60] md:bottom-8 md:right-8">
        
        <!-- Welcome Tooltip (Floating Bubble) -->
        <div x-show="showTooltip && !open" 
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             class="absolute bottom-20 right-0 w-60 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 mb-2">
            <div class="flex items-center gap-2 mb-1.5">
                <span class="w-2.5 h-2.5 bg-primary rounded-full animate-pulse shadow-[0_0_8px_rgba(141,100,8,0.5)]"></span>
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
            class="absolute bottom-20 right-0 w-[320px] md:w-[350px] bg-white rounded-[2rem] shadow-[0_20px_60px_rgba(32,22,15,0.15)] border border-slate-100 overflow-hidden flex flex-col">
            
            <!-- Header -->
            <div class="p-6 border-b border-slate-50 bg-white">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 bg-primary rounded-full shadow-[0_0_8px_rgba(141,100,8,0.4)]"></span>
                        <span class="text-[10px] font-black text-primary uppercase tracking-[0.2em]">Online Support</span>
                    </div>
                    <button @click="open = false" aria-label="Tutup Panel Chat" class="text-slate-300 hover:text-slate-600 transition-colors">
                        <span class="material-symbols-outlined text-lg">close</span>
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
                        <span class="material-symbols-outlined text-sm group-hover:translate-x-0.5 transition-transform">send</span>
                    </button>
                </form>

                <div class="mt-6 flex flex-col items-center gap-3">
                    <p class="text-[9px] text-slate-400 font-black uppercase tracking-[0.2em]">Atau Hubungi Langsung</p>
                    <div class="grid grid-cols-2 gap-2 w-full">
                        @php
                            $mainPhone = preg_replace('/[^0-9]/', '', $settings->phone ?? '');
                            if (str_starts_with($mainPhone, '0')) $mainPhone = '62' . substr($mainPhone, 1);
                        @endphp
                        @if($mainPhone)
                        <a href="https://wa.me/{{ $mainPhone }}" target="_blank" class="flex items-center justify-center gap-2 py-2.5 bg-white border border-slate-100 rounded-lg text-[11px] font-bold text-slate-600 hover:border-green-500 hover:text-green-600 transition-all shadow-sm">
                            <img src="https://cdn-icons-png.flaticon.com/512/124/124034.png" class="w-3.5 h-3.5" alt="WA"> WhatsApp
                        </a>
                        @endif
                        <a href="https://www.instagram.com/akaconsulting" target="_blank" class="flex items-center justify-center gap-2 py-2.5 bg-white border border-slate-100 rounded-lg text-[11px] font-bold text-slate-600 hover:border-primary hover:text-primary transition-all duration-300 shadow-sm">
                            <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" class="w-3.5 h-3.5" alt="IG"> Instagram
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toggle Button -->
        <button @click="open = !open; showTooltip = false" aria-label="Buka Chat Layanan"
                class="w-16 h-16 rounded-full bg-primary text-white shadow-xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all duration-300 relative overflow-hidden group">
            <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            <span class="material-symbols-outlined text-2xl relative z-10" x-show="!open">chat</span>
            <span class="material-symbols-outlined text-2xl relative z-10" x-show="open">close</span>
        </button>
    </div>

    @stack('scripts')
</body>

</html>
