@extends('layouts.main')

@section('title', __('Blog & Wawasan Konsultasi - AKA Consulting'))
@section('meta_description', __('Baca artikel terbaru seputar hukum bisnis, perizinan, sertifikasi, dan kepatuhan regulasi dari tim konsultan AKA Consulting.'))
@section('meta_keywords', __('blog hukum bisnis, perizinan usaha, kepatuhan regulasi, sertifikasi halal bpom, aka consulting'))

@section('content')
<div class="pt-24 pb-16 bg-[#f7f2e8]">

    {{-- ═══ HERO ═══ --}}
    <section class="relative overflow-hidden py-14 md:py-20">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(217,161,26,0.13),_transparent_40%),radial-gradient(circle_at_bottom_right,_rgba(73,53,28,0.07),_transparent_40%)]"></div>
        <div class="content-container relative z-10 text-center max-w-3xl mx-auto">
            <div class="inline-flex items-center gap-2 rounded-full border border-[#d9a11a]/25 bg-white/70 px-4 py-2 text-xs font-black uppercase tracking-[0.25em] text-[#8d6408] shadow-sm mb-6" data-aos="fade-up">
                <span class="material-symbols-outlined text-[16px]">history_edu</span>
                {{ __('Blog & Wawasan') }}
            </div>
            <h1 class="text-4xl md:text-6xl font-black leading-[1.05] tracking-tight text-on-surface mb-5" data-aos="fade-up" data-aos-delay="80">
                {{ __('Wawasan Hukum &') }}<br><span class="text-[#8d6408]">{{ __('Perizinan') }}</span> {{ __('Terkini') }}
            </h1>
            <p class="text-base md:text-lg text-on-surface-variant leading-relaxed max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="160">
                {{ __('Temukan artikel, panduan, dan update regulasi dari tim konsultan AKA untuk membantu bisnis Anda beroperasi lebih aman dan patuh hukum.') }}
            </p>
        </div>
    </section>

    {{-- ═══ FILTER KATEGORI ═══ --}}
    <section class="py-4">
        <div class="content-container">
            <div class="sticky top-24 z-20 rounded-[1.75rem] border border-[#dccaa2] bg-white/90 px-4 py-3 shadow-sm backdrop-blur-md" data-aos="fade-up">
                <div class="flex flex-wrap gap-2 justify-center">
                    <a href="{{ route('blog') }}"
                       class="px-5 py-2 rounded-full text-xs font-black uppercase tracking-[0.18em] transition-all duration-200
                              {{ !request('category') ? 'bg-[#8d6408] text-white' : 'border border-[#e6d7b7] bg-[#fbf8f1] text-[#5a4327] hover:border-[#8d6408] hover:text-[#8d6408]' }}">
                        <span class="material-symbols-outlined text-[14px] align-middle mr-1">apps</span>
                        {{ __('Semua Artikel') }}
                    </a>
                    @foreach($categories as $cat)
                    <a href="{{ route('blog', ['category' => $cat->slug]) }}"
                       class="px-5 py-2 rounded-full text-xs font-black uppercase tracking-[0.18em] transition-all duration-200
                              {{ request('category') == $cat->slug ? 'bg-[#8d6408] text-white' : 'border border-[#e6d7b7] bg-[#fbf8f1] text-[#5a4327] hover:border-[#8d6408] hover:text-[#8d6408]' }}">
                        {{ __t($cat->name) }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ ARTIKEL GRID ═══ --}}
    <section class="py-8">
        <div class="content-container">

            {{-- Info jumlah artikel --}}
            <div class="flex items-center justify-between mb-8 px-2">
                <p class="text-sm text-on-surface-variant">
                    <span class="font-black text-on-surface">{{ $articles->count() }}</span> {{ __('artikel') }}
                    @if(request('category'))
                        {{ __('dalam kategori') }} <span class="font-black text-[#8d6408]">{{ $categories->where('slug', request('category'))->first()?->name ?? '' }}</span>
                    @endif
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($articles as $index => $article)
                <article class="group relative flex flex-col overflow-hidden rounded-[2rem] bg-white border border-[#eadfcb] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500"
                         data-aos="fade-up" data-aos-delay="{{ ($index % 6) * 80 }}">

                    {{-- Gambar --}}
                    <div class="relative aspect-[16/10] overflow-hidden">
                        @if($article->cover_image)
                            <img src="{{ asset('storage/' . $article->cover_image) }}"
                                 alt="{{ __t($article->title) }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#f7f2e8] to-[#e8dcc8] flex items-center justify-center">
                                <span class="material-symbols-outlined text-[56px] text-[#8d6408]/25">history_edu</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>

                        {{-- Badge kategori --}}
                        <div class="absolute top-4 left-4">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-white/90 px-3 py-1.5 text-[10px] font-black uppercase tracking-[0.18em] text-[#8d6408] backdrop-blur-md shadow-sm">
                                <span class="material-symbols-outlined text-[12px]">label</span>
                                {{ __t($article->category->name ?? 'Artikel') }}
                            </span>
                        </div>
                    </div>

                    {{-- Konten --}}
                    <div class="p-6 flex flex-col flex-grow">
                        {{-- Meta --}}
                        <div class="flex items-center gap-3 mb-3 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant/70">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[13px]">calendar_today</span>
                                {{ ($article->published_at ?? $article->created_at)->format('d M Y') }}
                            </span>
                            <span class="w-1 h-1 rounded-full bg-[#d9a11a]/50"></span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[13px]">person</span>
                                {{ $article->author->name ?? 'Admin' }}
                            </span>
                        </div>

                        <h2 class="text-lg font-black text-on-surface mb-3 line-clamp-2 leading-snug group-hover:text-[#8d6408] transition-colors">
                            {{ __t($article->title) }}
                        </h2>
                        <p class="text-sm text-on-surface-variant line-clamp-3 leading-relaxed mb-4 flex-grow">
                            {{ Str::limit(strip_tags(__t($article->content)), 130) }}
                        </p>

                        <div class="pt-4 border-t border-[#f0e8d8]">
                            <a href="{{ route('blog.show', $article->slug) }}"
                               class="inline-flex items-center gap-1.5 text-[11px] font-black text-[#8d6408] hover:gap-3 transition-all">
                                {{ __('Baca Selengkapnya') }}
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-full py-24 text-center" data-aos="fade-up">
                    <div class="w-20 h-20 bg-[#8d6408]/10 rounded-full flex items-center justify-center mx-auto mb-5">
                        <span class="material-symbols-outlined text-[40px] text-[#8d6408]/40">history_edu</span>
                    </div>
                    <h3 class="text-xl font-black text-on-surface mb-2">{{ __('Belum ada artikel') }}</h3>
                    <p class="text-on-surface-variant text-sm">
                        @if(request('category'))
                            {{ __('Belum ada artikel dalam kategori ini.') }}
                            <a href="{{ route('blog') }}" class="text-[#8d6408] font-bold hover:underline">{{ __('Lihat semua artikel') }}</a>
                        @else
                            {{ __('Artikel akan segera dipublikasikan.') }}
                        @endif
                    </p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ═══ CTA NEWSLETTER / KONSULTASI ═══ --}}
    <section class="py-10">
        <div class="content-container">
            <div class="rounded-[2rem] bg-[#1c140c] text-white px-8 py-10 md:px-12 md:py-12 relative overflow-hidden shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="absolute right-0 top-0 h-48 w-48 rounded-full bg-[#d9a11a]/15 blur-3xl pointer-events-none"></div>
                <div class="relative z-10">
                    <p class="text-[10px] font-black uppercase tracking-[0.3em] text-[#d9a11a] mb-2">{{ __('Ada pertanyaan hukum?') }}</p>
                    <h2 class="text-2xl md:text-3xl font-black">{{ __('Konsultasikan langsung dengan tim ahli kami.') }}</h2>
                    <p class="text-white/60 text-sm mt-2">{{ __('Gratis konsultasi awal untuk kebutuhan hukum dan perizinan bisnis Anda.') }}</p>
                </div>
                <div class="relative z-10 flex gap-3 shrink-0">
                    <a href="{{ url('/#kontak') }}"
                       class="inline-flex items-center gap-2 rounded-full bg-[#d9a11a] px-6 py-3.5 font-black text-sm text-[#1c140c] hover:-translate-y-0.5 transition-all">
                        {{ __('Konsultasi Gratis') }}
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                    @php
                        $mainPhone = preg_replace('/[^0-9]/', '', $settings->phone ?? '');
                        if (str_starts_with($mainPhone, '0')) $mainPhone = '62' . substr($mainPhone, 1);
                        $waText = $settings->whatsapp_text ?? 'Halo AKA Consulting, saya ingin konsultasi.';
                    @endphp
                    @if($mainPhone)
                    <a href="https://wa.me/{{ $mainPhone }}?text={{ urlencode(__($waText)) }}" target="_blank"
                       class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/5 px-6 py-3.5 font-black text-sm text-white hover:bg-white/10 transition-all">
                        <span class="material-symbols-outlined text-[18px]">chat</span>
                        {{ __('WhatsApp') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
