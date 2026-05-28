@extends('layouts.main')

@section('title', __('Portofolio - AKA Consulting, Konsultan Terpercaya'))
@section('meta_description', __('Galeri portofolio proyek konsultasi hukum, perizinan, sertifikasi, dan kepatuhan dari AKA Consulting untuk berbagai klien korporasi dan UMKM.'))

@section('content')
<div class="pt-24 pb-16 bg-[#f7f2e8]">

    {{-- ═══ HERO ═══ --}}
    <section class="relative overflow-hidden py-14 md:py-20">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(217,161,26,0.13),_transparent_40%),radial-gradient(circle_at_bottom_right,_rgba(73,53,28,0.07),_transparent_40%)]"></div>
        <div class="content-container relative z-10 text-center max-w-3xl mx-auto">
            <div class="inline-flex items-center gap-2 rounded-full border border-[#d9a11a]/25 bg-white/70 px-4 py-2 text-xs font-black uppercase tracking-[0.25em] text-[#8d6408] shadow-sm mb-6" data-aos="fade-up">
                <span class="material-symbols-outlined text-[16px]">workspace_premium</span>
                {{ __('Rekam Jejak Kami') }}
            </div>
            <h1 class="text-4xl md:text-6xl font-black leading-[1.05] tracking-tight text-on-surface mb-5" data-aos="fade-up" data-aos-delay="80">
                {{ __('Portofolio') }} <span class="text-[#8d6408]">{{ __('Proyek') }}</span> {{ __('Konsultasi') }}
            </h1>
            <p class="text-base md:text-lg text-on-surface-variant leading-relaxed max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="160">
                {{ __('Rekam jejak layanan hukum, perizinan, sertifikasi, dan kepatuhan yang telah kami selesaikan bersama klien dari berbagai industri.') }}
            </p>
        </div>
    </section>

    {{-- ═══ FILTER KATEGORI ═══ --}}
    <section class="py-4">
        <div class="content-container">
            <div class="sticky top-24 z-20 rounded-[1.75rem] border border-[#dccaa2] bg-white/90 px-4 py-3 shadow-sm backdrop-blur-md" data-aos="fade-up">
                <div class="flex flex-wrap gap-2 justify-center">
                    <button class="filter-btn px-5 py-2 rounded-full bg-[#8d6408] text-white text-xs font-black uppercase tracking-[0.18em] transition-all duration-200 hover:scale-105"
                            data-filter="all">
                        <span class="material-symbols-outlined text-[14px] align-middle mr-1">apps</span>
                        {{ __('Semua Karya') }}
                    </button>
                    @foreach($categories as $cat)
                    <button class="filter-btn px-5 py-2 rounded-full border border-[#e6d7b7] bg-[#fbf8f1] text-xs font-black uppercase tracking-[0.18em] text-[#5a4327] transition-all duration-200 hover:border-[#8d6408] hover:text-[#8d6408]"
                            data-filter="{{ $cat->id }}">
                        {{ __t($cat->name) }}
                    </button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ GRID PORTFOLIO ═══ --}}
    <section class="py-8">
        <div class="content-container">

            {{-- Statistik singkat --}}
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8 px-2">
                <p class="text-sm text-on-surface-variant">
                    <span class="font-black text-on-surface" id="visible-count">{{ $portfolios->count() }}</span> {{ __('proyek') }}
                </p>
                <div class="flex items-center gap-2 text-xs text-on-surface-variant">
                    <span class="material-symbols-outlined text-[16px] text-[#8d6408]">filter_list</span>
                    {{ __('Filter berdasarkan kategori') }}
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="portfolio-grid">
                @forelse($portfolios as $index => $portfolio)
                <div class="portfolio-item group relative overflow-hidden rounded-[2rem] bg-white border border-[#eadfcb] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500"
                     data-aos="fade-up" data-aos-delay="{{ ($index % 6) * 80 }}"
                     data-category="{{ $portfolio->category_id ?? 'none' }}"
                     data-category-name="{{ __t($portfolio->category->name ?? '') }}">

                    {{-- Gambar --}}
                    <div class="relative aspect-[4/3] overflow-hidden">
                        @if($portfolio->thumbnail_image)
                            <img src="{{ asset('storage/' . $portfolio->thumbnail_image) }}"
                                 alt="{{ __t($portfolio->project_name) }}"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#f7f2e8] to-[#e8dcc8] flex items-center justify-center">
                                <span class="material-symbols-outlined text-[64px] text-[#8d6408]/30">business_center</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-black/10 to-transparent"></div>

                        {{-- Badge kategori --}}
                        <div class="absolute top-4 left-4">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-white/90 px-3 py-1.5 text-[10px] font-black uppercase tracking-[0.18em] text-[#8d6408] backdrop-blur-md shadow-sm">
                                <span class="material-symbols-outlined text-[12px]">category</span>
                                {{ __t($portfolio->category->name ?? 'Lainnya') }}
                            </span>
                        </div>

                        {{-- Hover CTA --}}
                        <div class="absolute inset-x-4 bottom-4 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-400">
                            <a href="{{ route('portfolio.show', $portfolio->slug) }}"
                               class="flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3 font-black text-[11px] uppercase tracking-widest text-[#1c140c] hover:bg-[#f7f2e8] transition-colors">
                                {{ __('Lihat Detail Proyek') }}
                                <span class="material-symbols-outlined text-[18px]">arrow_outward</span>
                            </a>
                        </div>
                    </div>

                    {{-- Konten --}}
                    <div class="p-6">
                        @if($portfolio->client_name)
                        <p class="text-[10px] font-black uppercase tracking-widest text-[#8d6408]/70 mb-2">{{ $portfolio->client_name }}</p>
                        @endif
                        <h3 class="text-lg font-black text-on-surface mb-2 group-hover:text-[#8d6408] transition-colors line-clamp-2 leading-snug">
                            {{ __t($portfolio->project_name) }}
                        </h3>
                        <p class="text-sm text-on-surface-variant line-clamp-2 leading-relaxed mb-4">
                            {{ Str::limit(strip_tags(__t($portfolio->description)), 100) }}
                        </p>
                        <div class="flex items-center justify-between pt-3 border-t border-[#f0e8d8]">
                            @if($portfolio->project_date)
                            <span class="flex items-center gap-1.5 text-[10px] text-on-surface-variant">
                                <span class="material-symbols-outlined text-[14px]">calendar_today</span>
                                {{ $portfolio->project_date->format('M Y') }}
                            </span>
                            @endif
                            <a href="{{ route('portfolio.show', $portfolio->slug) }}"
                               class="text-[11px] font-black text-[#8d6408] flex items-center gap-1 hover:gap-2 transition-all">
                                {{ __('Selengkapnya') }}
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-24 text-center" data-aos="fade-up">
                    <div class="w-20 h-20 bg-[#8d6408]/10 rounded-full flex items-center justify-center mx-auto mb-5">
                        <span class="material-symbols-outlined text-[40px] text-[#8d6408]/40">folder_open</span>
                    </div>
                    <h3 class="text-xl font-black text-on-surface mb-2">{{ __('Belum ada portofolio') }}</h3>
                    <p class="text-on-surface-variant text-sm max-w-sm mx-auto">{{ __('Kami sedang mempersiapkan daftar proyek terbaik untuk ditampilkan di sini.') }}</p>
                </div>
                @endforelse
            </div>

            {{-- Empty state saat filter tidak ada hasil --}}
            <div id="empty-filter" class="hidden col-span-full py-16 text-center">
                <span class="material-symbols-outlined text-[48px] text-[#8d6408]/30 mb-3 block">search_off</span>
                <p class="font-black text-on-surface">{{ __('Tidak ada proyek dalam kategori ini') }}</p>
                <p class="text-sm text-on-surface-variant mt-1">{{ __('Coba pilih kategori lain') }}</p>
            </div>
        </div>
    </section>

    {{-- ═══ CTA ═══ --}}
    <section class="py-10">
        <div class="content-container">
            <div class="rounded-[2rem] bg-[#1c140c] text-white px-8 py-10 md:px-12 md:py-12 relative overflow-hidden shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="absolute right-0 top-0 h-48 w-48 rounded-full bg-[#d9a11a]/15 blur-3xl pointer-events-none"></div>
                <div class="relative z-10">
                    <p class="text-[10px] font-black uppercase tracking-[0.3em] text-[#d9a11a] mb-2">{{ __('Punya proyek baru?') }}</p>
                    <h2 class="text-2xl md:text-3xl font-black">{{ __('Diskusikan kebutuhan konsultasi Anda bersama kami.') }}</h2>
                </div>
                <div class="relative z-10 flex gap-3 shrink-0">
                    <a href="{{ url('/#kontak') }}"
                       class="inline-flex items-center gap-2 rounded-full bg-[#d9a11a] px-6 py-3.5 font-black text-sm text-[#1c140c] hover:-translate-y-0.5 transition-all">
                        {{ __('Konsultasi Gratis') }}
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const items      = document.querySelectorAll('.portfolio-item');
    const counter    = document.getElementById('visible-count');
    const emptyMsg   = document.getElementById('empty-filter');

    function updateCount() {
        const visible = document.querySelectorAll('.portfolio-item:not(.hidden)').length;
        if (counter) counter.textContent = visible;
        if (emptyMsg) emptyMsg.classList.toggle('hidden', visible > 0);
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            // Toggle active style
            filterBtns.forEach(b => {
                b.classList.remove('bg-[#8d6408]', 'text-white');
                b.classList.add('bg-[#fbf8f1]', 'text-[#5a4327]', 'border-[#e6d7b7]');
            });
            this.classList.add('bg-[#8d6408]', 'text-white');
            this.classList.remove('bg-[#fbf8f1]', 'text-[#5a4327]', 'border-[#e6d7b7]');

            const filter = this.getAttribute('data-filter');
            let staggerDelay = 0;

            items.forEach(item => {
                const match = filter === 'all' || item.getAttribute('data-category') === filter;
                
                if (match) {
                    item.classList.remove('hidden');
                    // Reset state before animating in
                    item.style.transition = 'none';
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(30px) scale(0.95)';
                    
                    // Force reflow
                    void item.offsetWidth;
                    
                    // Animate in with stagger
                    setTimeout(() => {
                        item.style.transition = 'all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)';
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0) scale(1)';
                    }, 50 + staggerDelay);
                    
                    staggerDelay += 75; // 75ms delay between each item
                } else {
                    item.style.transition = 'all 0.3s ease-out';
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.9)';
                    setTimeout(() => item.classList.add('hidden'), 300);
                }
            });

            setTimeout(updateCount, 350);
        });
    });

    updateCount();
});
</script>
@endsection