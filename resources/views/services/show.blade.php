@extends('layouts.main')

@php
    $titleData = json_decode($service->title, true);
    $shortDescriptionData = json_decode($service->short_description, true);
    $fullDescriptionData = json_decode($service->full_description, true);
    $benefitsData = json_decode($service->benefits, true);
    $stepsData = json_decode($service->steps, true);
    $requirementsData = json_decode($service->requirements, true);
    $faqItemsData = json_decode($service->faq_items, true);

    $locale = app()->getLocale();
    $serviceTitle = __t($service->title);
    $serviceShortDescription = __t($service->short_description);
    $serviceFullDescription = __t($service->full_description);

    $benefits = collect(data_get($benefitsData, $locale, data_get($benefitsData, 'id', [])))->filter()->values();
    $steps = collect(data_get($stepsData, $locale, data_get($stepsData, 'id', [])))->filter()->values();
    $requirements = collect(data_get($requirementsData, $locale, data_get($requirementsData, 'id', [])))->filter()->values();
    $faqItems = collect(data_get($faqItemsData, $locale, data_get($faqItemsData, 'id', [])))
        ->map(function ($item) {
            return [
                'question' => trim((string) data_get($item, 'question', '')),
                'answer'   => trim((string) data_get($item, 'answer', '')),
            ];
        })
        ->filter(fn ($item) => $item['question'] !== '')
        ->values();

    $relatedServices = \App\Models\Service::where('status', 'active')
        ->whereNotNull('category')
        ->where('id', '!=', $service->id)
        ->when($service->category, fn ($q) => $q->where('category', $service->category))
        ->orderBy('sort_order')->latest()->take(3)->get();

    $metaTitle       = $service->meta_title ?: ($serviceTitle . ' - AKA Consulting');
    $metaDescription = $service->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($serviceShortDescription ?: $serviceFullDescription), 155);
    $metaKeywords    = $service->meta_keywords ?: ($serviceTitle . ', AKA Consulting, ' . __t('konsultasi hukum || legal consultation') . ', ' . __t('perizinan usaha || business licensing'));
    $waUrl = 'https://wa.me/' . ($settings->phone ?? '6287868184742') . '?text=' . urlencode(__t('Halo AKA Consulting, saya ingin konsultasi tentang || Hello AKA Consulting, I would like to consult about ') . $serviceTitle);
@endphp

@section('title', $metaTitle)
@section('meta_description', $metaDescription)
@section('meta_keywords', $metaKeywords)

@push('styles')
<style>
    .hero-parallax-img {
        transform: scale(1.08);
        transition: transform 8s ease-out;
    }
    .hero-parallax-img.loaded {
        transform: scale(1);
    }
    .prose-content p { margin-bottom: 1rem; line-height: 1.8; }
    .sticky-sidebar { position: sticky; top: 7rem; }

    /* ── Floating Back Button ── */
    #floating-back-btn {
        position: fixed;
        top: 5.5rem;
        left: 1.25rem;
        z-index: 50;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.55rem 1.1rem 0.55rem 0.75rem;
        border-radius: 9999px;
        background: rgba(255, 255, 255, 0.82);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(220, 202, 162, 0.55);
        box-shadow: 0 8px 28px rgba(28, 20, 12, 0.13);
        color: #4a3620;
        font-size: 0.75rem;
        font-weight: 900;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        text-decoration: none;
        cursor: pointer;
        opacity: 0;
        transform: translateY(-8px) scale(0.96);
        transition: opacity 0.3s ease, transform 0.3s ease, box-shadow 0.25s ease, background 0.25s ease;
        pointer-events: none;
    }
    #floating-back-btn.visible {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: auto;
    }
    #floating-back-btn:hover {
        background: rgba(255, 255, 255, 0.97);
        box-shadow: 0 12px 36px rgba(28, 20, 12, 0.19);
        transform: translateY(-2px) scale(1);
        color: #8d6408;
    }
    #floating-back-btn .back-icon {
        width: 1.75rem;
        height: 1.75rem;
        border-radius: 50%;
        background: #1c140c;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.25s;
        flex-shrink: 0;
    }
    #floating-back-btn:hover .back-icon {
        background: #8d6408;
    }
    #floating-back-btn .back-icon span {
        color: #fff;
        font-size: 1rem;
    }
</style>
@endpush

@section('content')

{{-- ═══════════════════════ FLOATING BACK BUTTON ═══════════════════════ --}}
<a id="floating-back-btn" href="{{ route('services') }}" aria-label="{{ __t('Kembali ke Layanan || Back to Services') }}">
    <span class="back-icon">
        <span class="material-symbols-outlined">arrow_back</span>
    </span>
    <span class="hidden sm:inline">{{ __t('Semua Layanan || All Services') }}</span>
    <span class="sm:hidden">{{ __t('Kembali || Back') }}</span>
</a>

{{-- ═══════════════════════ HERO — FULL WIDTH ═══════════════════════ --}}
<section class="relative w-full min-h-[70vh] flex items-end overflow-hidden bg-[#1c140c]">
    {{-- Background image --}}
    <div class="absolute inset-0">
        <img src="{{ $service->banner_url }}" alt="{{ $serviceTitle }}"
             class="hero-parallax-img h-full w-full object-cover opacity-50"
             onload="this.classList.add('loaded')">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0e0a06] via-[#1c140c]/70 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#0e0a06]/60 via-transparent to-transparent"></div>
    </div>

    {{-- Breadcrumb (top) --}}
    <div class="absolute top-28 left-0 right-0 z-20">
        <div class="content-container">
            <nav class="flex items-center gap-2 text-sm text-white/50" aria-label="Breadcrumb">
                <a href="/" class="hover:text-white transition-colors">{{ __t('Beranda || Home') }}</a>
                <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                <a href="{{ route('services') }}" class="hover:text-white transition-colors">{{ __t('Layanan || Services') }}</a>
                <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                <span class="text-white/80">{{ $serviceTitle }}</span>
            </nav>
        </div>
    </div>

    {{-- Hero content --}}
    <div class="content-container relative z-10 pb-16 pt-48 md:pb-24">
        <div class="max-w-4xl space-y-5">
            <div class="inline-flex items-center gap-2 rounded-full bg-[#d9a11a]/20 border border-[#d9a11a]/30 px-4 py-2 text-[10px] font-black uppercase tracking-[0.28em] text-[#f7d78a] backdrop-blur-md">
                <span class="material-symbols-outlined text-[14px]">{{ $service->icon_image ?: 'gavel' }}</span>
                {{ $service->category ?? __t('Layanan Konsultasi || Consulting Services') }}
            </div>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black leading-[1.02] tracking-tight text-white">
                {{ $serviceTitle }}
            </h1>
            <p class="max-w-2xl text-base md:text-lg leading-relaxed text-white/70">
                {{ $serviceShortDescription }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <a href="{{ $waUrl }}" target="_blank"
                   class="inline-flex items-center justify-center gap-2 rounded-full bg-[#d9a11a] px-7 py-4 font-black text-[#1c140c] shadow-[0_18px_45px_rgba(217,161,26,0.35)] transition-all duration-300 hover:-translate-y-1 hover:bg-[#f0b820]">
                    <span class="material-symbols-outlined text-[18px]">chat</span>
                    {{ __t('Konsultasi Sekarang || Consult Now') }}
                </a>
                <a href="{{ route('services') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-full border border-white/20 bg-white/5 px-7 py-4 font-black text-white backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:border-white/40 hover:bg-white/10">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    {{ __t('Semua Layanan || All Services') }}
                </a>
            </div>
        </div>
    </div>

    {{-- Bottom wave separator --}}
    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-[#f7f2e8] to-transparent"></div>
</section>

{{-- ═══════════════════════ MAIN BODY ═══════════════════════ --}}
<div class="bg-[#f7f2e8]">
    <div class="content-container py-16 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

            {{-- ── LEFT COLUMN (main content) ── --}}
            <div class="lg:col-span-8 space-y-8">

                {{-- Tentang Layanan --}}
                @if($serviceFullDescription)
                <div class="rounded-[2.25rem] border border-[#e8dfc8] bg-white p-8 md:p-12 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-2xl bg-[#8d6408]/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[#8d6408] text-[20px]">info</span>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-black text-on-surface">{{ __t('Tentang Layanan || About Service') }}</h2>
                    </div>
                    <div class="prose-content text-on-surface-variant leading-relaxed">
                        {!! nl2br(e($serviceFullDescription)) !!}
                    </div>
                </div>
                @endif

                {{-- Benefit --}}
                @if($benefits->isNotEmpty())
                <div class="rounded-[2.25rem] border border-[#e8dfc8] bg-white p-8 md:p-12 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-2xl bg-[#8d6408]/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[#8d6408] text-[20px]">verified</span>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-black text-on-surface">{{ __t('Keuntungan Layanan || Service Benefits') }}</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($benefits as $benefit)
                        <div class="flex items-start gap-4 rounded-2xl border border-[#f0e6d2] bg-[#fcfaf5] p-5 hover:border-[#d9a11a]/40 transition-colors">
                            <div class="w-8 h-8 rounded-xl bg-[#8d6408]/10 flex items-center justify-center shrink-0 mt-0.5">
                                <span class="material-symbols-outlined text-[#8d6408] text-[18px]">check</span>
                            </div>
                            <span class="text-sm leading-relaxed text-on-surface">{{ $benefit }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Langkah Pengerjaan --}}
                @if($steps->isNotEmpty())
                <div class="rounded-[2.25rem] border border-[#e8dfc8] bg-white p-8 md:p-12 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-2xl bg-[#8d6408]/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[#8d6408] text-[20px]">list_alt</span>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-black text-on-surface">{{ __t('Langkah Pengerjaan || Work Steps') }}</h2>
                    </div>
                    <div class="space-y-4">
                        @foreach($steps as $index => $step)
                        <div class="flex items-start gap-5 rounded-2xl border border-[#f0e6d2] bg-[#fcfaf5] p-5 hover:border-[#d9a11a]/40 transition-colors">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#1c140c] text-white font-black text-lg">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>
                            <div class="flex-1 pt-1.5">
                                <p class="text-sm font-bold text-on-surface leading-relaxed">{{ $step }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Persyaratan Dokumen --}}
                @if($requirements->isNotEmpty())
                <div class="rounded-[2.25rem] border border-[#e8dfc8] bg-white p-8 md:p-12 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-2xl bg-[#8d6408]/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[#8d6408] text-[20px]">folder_open</span>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-black text-on-surface">{{ __t('Persyaratan Dokumen || Document Requirements') }}</h2>
                    </div>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($requirements as $req)
                        <li class="flex items-start gap-4 rounded-2xl border border-[#f0e6d2] bg-[#fcfaf5] p-5 hover:border-[#d9a11a]/40 transition-colors">
                            <div class="w-8 h-8 rounded-xl bg-[#8d6408]/10 flex items-center justify-center shrink-0 mt-0.5">
                                <span class="material-symbols-outlined text-[#8d6408] text-[18px]">description</span>
                            </div>
                            <span class="text-sm leading-relaxed text-on-surface">{{ $req }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- FAQ --}}
                @if($faqItems->isNotEmpty())
                <div class="rounded-[2.25rem] border border-[#e8dfc8] bg-white p-8 md:p-12 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-2xl bg-[#8d6408]/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[#8d6408] text-[20px]">quiz</span>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-black text-on-surface">{{ __t('Pertanyaan Umum || FAQ') }}</h2>
                    </div>
                    <div class="space-y-3">
                        @foreach($faqItems as $faq)
                        <details class="group rounded-2xl border border-[#f0e6d2] bg-[#fcfaf5] overflow-hidden transition-all open:border-[#8d6408]/30 open:bg-white open:shadow-md">
                            <summary class="cursor-pointer list-none flex items-center justify-between gap-4 p-5 md:p-6">
                                <span class="text-sm font-bold text-on-surface">{{ $faq['question'] }}</span>
                                <span class="material-symbols-outlined text-[#8d6408] transition-transform duration-300 group-open:rotate-180 shrink-0">expand_more</span>
                            </summary>
                            @if($faq['answer'] !== '')
                            <div class="px-5 pb-5 md:px-6 md:pb-6 border-t border-[#f0e6d2]">
                                <p class="pt-4 text-sm leading-relaxed text-on-surface-variant">{{ $faq['answer'] }}</p>
                            </div>
                            @endif
                        </details>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Layanan Terkait --}}
                @if($relatedServices->isNotEmpty())
                <div class="rounded-[2.25rem] border border-[#e8dfc8] bg-white p-8 md:p-12 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-2xl bg-[#8d6408]/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[#8d6408] text-[20px]">apps</span>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-black text-on-surface">{{ __t('Layanan Terkait || Related Services') }}</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        @foreach($relatedServices as $related)
                        @php $rTitle = __t($related->title); @endphp
                        <a href="{{ route('services.show', $related->slug) }}"
                           class="group overflow-hidden rounded-[1.75rem] border border-[#eadfcb] bg-[#fcfaf5] transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-[#d9a11a]/40">
                            <div class="aspect-[4/3] overflow-hidden">
                                <img src="{{ $related->thumbnail_url }}" alt="{{ $rTitle }}"
                                     class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                            </div>
                            <div class="p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.22em] text-[#8d6408]">{{ $related->category ?? __t('Layanan || Services') }}</p>
                                <h3 class="mt-2 text-base font-black text-on-surface group-hover:text-[#8d6408] transition-colors line-clamp-2">{{ $rTitle }}</h3>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- ── RIGHT COLUMN (sticky sidebar) ── --}}
            <div class="lg:col-span-4">
                <div class="sticky-sidebar space-y-6">

                    {{-- Form Konsultasi --}}
                    <div class="rounded-[2rem] border border-[#e8dfc8] bg-white p-7 shadow-sm">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#8d6408] to-[#d9a11a] rounded-t-[2rem]" style="position:relative;width:100%;height:4px;border-radius:8px 8px 0 0;background:linear-gradient(to right,#8d6408,#d9a11a);margin:-1.75rem -1.75rem 1.5rem;width:calc(100% + 3.5rem)"></div>
                        <p class="text-[10px] font-black uppercase tracking-[0.28em] text-[#8d6408]">Quick Consult</p>
                        <h3 class="mt-2 text-xl font-black text-on-surface">{{ __t('Hubungi Tim Kami || Contact Our Team') }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-on-surface-variant">{{ __t('Sampaikan kebutuhan Anda dan tim kami akan segera merespons. || Tell us your needs and our team will respond shortly.') }}</p>

                        <form action="{{ route('konsultasi.store') }}" method="POST" class="mt-6 space-y-4">
                            @csrf
                            <input type="hidden" name="service" value="{{ $serviceTitle }}">
                            <div>
                                <label class="mb-1.5 block text-[10px] font-black uppercase tracking-widest text-slate-400">{{ __t('Nama Lengkap || Full Name') }}</label>
                                <input type="text" name="sender_name" required placeholder="{{ __t('Nama Anda || Your Name') }}"
                                       class="w-full rounded-2xl border border-[#e7dcc6] bg-[#fcfaf5] px-4 py-3 text-sm outline-none transition focus:border-[#8d6408] focus:ring-4 focus:ring-[#8d6408]/10">
                            </div>
                            <div>
                                <label class="mb-1.5 block text-[10px] font-black uppercase tracking-widest text-slate-400">Email</label>
                                <input type="email" name="sender_email" required placeholder="email@anda.com"
                                       class="w-full rounded-2xl border border-[#e7dcc6] bg-[#fcfaf5] px-4 py-3 text-sm outline-none transition focus:border-[#8d6408] focus:ring-4 focus:ring-[#8d6408]/10">
                            </div>
                            <div>
                                <label class="mb-1.5 block text-[10px] font-black uppercase tracking-widest text-slate-400">{{ __t('No. WhatsApp || WhatsApp No.') }}</label>
                                <input type="text" name="phone" required placeholder="08xx-xxxx-xxxx"
                                       class="w-full rounded-2xl border border-[#e7dcc6] bg-[#fcfaf5] px-4 py-3 text-sm outline-none transition focus:border-[#8d6408] focus:ring-4 focus:ring-[#8d6408]/10">
                            </div>
                            <div>
                                <label class="mb-1.5 block text-[10px] font-black uppercase tracking-widest text-slate-400">{{ __t('Pesan || Message') }}</label>
                                <textarea name="message_body" rows="3" placeholder="{{ __t('Ceritakan kebutuhan Anda... || Tell us your needs...') }}"
                                          class="w-full rounded-2xl border border-[#e7dcc6] bg-[#fcfaf5] px-4 py-3 text-sm outline-none transition focus:border-[#8d6408] focus:ring-4 focus:ring-[#8d6408]/10 resize-none"></textarea>
                            </div>
                            <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-[#8d6408] px-6 py-4 font-black text-white shadow-[0_14px_35px_rgba(141,100,8,0.22)] transition-all duration-300 hover:-translate-y-1 hover:bg-[#6f4d05]">
                                <span class="material-symbols-outlined text-[18px]">send</span>
                                {{ __t('Kirim Konsultasi || Send Consultation') }}
                            </button>
                        </form>
                    </div>

                    {{-- WhatsApp CTA --}}
                    <div class="rounded-[2rem] border border-[#2e1f0f] bg-[#1c140c] p-7 text-white shadow-[0_20px_55px_rgba(28,20,12,0.20)] overflow-hidden relative">
                        <div class="absolute right-0 top-0 h-40 w-40 rounded-full bg-[#d9a11a]/10 blur-2xl"></div>
                        <div class="relative z-10">
                            <p class="text-[10px] font-black uppercase tracking-[0.28em] text-[#f7d78a]">{{ __t('Respons Cepat || Fast Response') }}</p>
                            <h3 class="mt-2 text-xl font-black">Chat via WhatsApp</h3>
                            <p class="mt-3 text-sm leading-relaxed text-white/70">{{ __t('Kami siap membantu kebutuhan legal Anda dengan cepat dan profesional. || We are ready to help with your legal needs quickly and professionally.') }}</p>
                            <a href="{{ $waUrl }}" target="_blank"
                               class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-full bg-[#d9a11a] px-5 py-3.5 font-black text-[#1c140c] transition-all duration-300 hover:-translate-y-1 hover:bg-[#f0b820]">
                                <span class="material-symbols-outlined text-[18px]">chat</span>
                                {{ __t('WhatsApp Sekarang || WhatsApp Now') }}
                            </a>
                        </div>
                    </div>

                    {{-- Info ringkas --}}
                    <div class="rounded-[2rem] border border-[#e8dfc8] bg-white p-6 shadow-sm space-y-4">
                        <p class="text-[10px] font-black uppercase tracking-[0.28em] text-[#8d6408]">{{ __t('Mengapa Kami || Why Us') }}</p>
                        @foreach([
                            ['verified', __t('Terpercaya & Berpengalaman || Trusted & Experienced'), __t('Tim konsultan bersertifikat dengan rekam jejak terbukti. || Certified consultants with a proven track record.')],
                            ['schedule', __t('Respons 1×24 Jam || 24-Hour Response'), __t('Pertanyaan Anda dijawab dalam satu hari kerja. || Your questions will be answered within one business day.')],
                            ['lock', __t('Kerahasiaan Terjamin || Guaranteed Confidentiality'), __t('Data dan informasi Anda dijaga penuh. || Your data and information are fully protected.')]
                        ] as [$icon, $title, $desc])
                        <div class="flex items-start gap-4">
                            <div class="w-9 h-9 rounded-xl bg-[#8d6408]/10 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-[#8d6408] text-[18px]">{{ $icon }}</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-on-surface">{{ $title }}</p>
                                <p class="text-xs text-on-surface-variant mt-0.5 leading-relaxed">{{ $desc }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
(function() {
    const btn = document.getElementById('floating-back-btn');
    if (!btn) return;

    let ticking = false;
    const THRESHOLD = 80; // px scrolled before button appears

    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
                if (window.scrollY > THRESHOLD) {
                    btn.classList.add('visible');
                } else {
                    btn.classList.remove('visible');
                }
                ticking = false;
            });
            ticking = true;
        }
    }, { passive: true });
})();
</script>
@endpush

@endsection
