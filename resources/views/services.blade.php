@extends('layouts.main')

@php
    // Peta gambar berdasarkan kata kunci nama kategori (dari CMS)
    // Tidak perlu seeder — kategori baru otomatis dapat gambar dari peta ini
    $categoryImageMap = [
        'legalitas'   => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&q=80&w=1600',
        'pendirian'   => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&q=80&w=1600',
        'perizinan'   => 'https://images.unsplash.com/photo-1568992687947-868a62a9f521?auto=format&fit=crop&q=80&w=1600',
        'compliance'  => 'https://images.unsplash.com/photo-1568992687947-868a62a9f521?auto=format&fit=crop&q=80&w=1600',
        'sertifikasi' => 'https://images.unsplash.com/photo-1493612276216-ee3925520721?auto=format&fit=crop&q=80&w=1600',
        'branding'    => 'https://images.unsplash.com/photo-1493612276216-ee3925520721?auto=format&fit=crop&q=80&w=1600',
        'hukum'       => 'https://images.unsplash.com/photo-1589994965851-a8f479c573a9?auto=format&fit=crop&q=80&w=1600',
        'litigasi'    => 'https://images.unsplash.com/photo-1589994965851-a8f479c573a9?auto=format&fit=crop&q=80&w=1600',
        'tender'      => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=1600',
        'pertanahan'  => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=1600',
        'pajak'       => 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?auto=format&fit=crop&q=80&w=1600',
        'konsultasi'  => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=80&w=1600',
    ];
    $defaultCategoryImage = 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=80&w=1600';

    $getCategoryImage = function(string $name) use ($categoryImageMap, $defaultCategoryImage): string {
        $lower = strtolower($name);
        foreach ($categoryImageMap as $keyword => $url) {
            if (str_contains($lower, $keyword)) return $url;
        }
        return $defaultCategoryImage;
    };

    // Group dinamis dari DB — tanpa hardcode apapun
    $groupedServices = collect($services)->sortBy('sort_order')->groupBy('category');
@endphp


@section('title', __('Layanan Profesional - AKA Consulting, Konsultan Terpercaya'))
@section('meta_description', __('Layanan konsultasi hukum, perizinan, sertifikasi, litigasi, tender, dan pertanahan dari AKA Consulting untuk membantu bisnis korporasi dan UMKM bertumbuh secara aman dan patuh regulasi.'))
@section('meta_keywords', __('konsultan hukum, perizinan usaha, pendirian pt cv, sertifikasi halal bpom, litigasi, tender, pertanahan, aka consulting'))

@section('content')
<div class="pt-24 pb-16 bg-[#f7f2e8]">
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(217,161,26,0.14),_transparent_38%),radial-gradient(circle_at_bottom_right,_rgba(73,53,28,0.08),_transparent_35%)]"></div>
        <div class="content-container grid grid-cols-1 lg:grid-cols-12 gap-10 items-center relative z-10 py-12 md:py-16">
            <div class="lg:col-span-6 space-y-8" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 120)">
                <div class="inline-flex items-center gap-2 rounded-full border border-[#d9a11a]/25 bg-white/70 px-4 py-2 text-xs font-black uppercase tracking-[0.25em] text-[#8d6408] shadow-sm backdrop-blur-md">
                    <span class="material-symbols-outlined text-[18px]">workspace_premium</span>
                    {{ __('Layanan AKA Consulting') }}
                </div>
                <div class="space-y-4 transition-all duration-700" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-[1.05] tracking-tight text-on-surface max-w-2xl">
                        {{ __('Solusi Konsultasi & Perizinan') }} <span class="text-[#8d6408]">{{ __('Terintegrasi') }}</span>
                    </h1>
                    <p class="text-base md:text-lg text-on-surface-variant max-w-2xl leading-relaxed">
                        {{ __('Pendampingan legal yang presisi untuk pendirian badan usaha, perizinan, compliance, sertifikasi, litigasi, tender, dan pertanahan. Dibangun untuk kebutuhan corporate, lembaga, dan pelaku usaha yang ingin tampil lebih siap dan kredibel.') }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 transition-all duration-700 delay-150" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                    <a href="{{ url('/#kontak') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#8d6408] px-7 py-4 font-black text-white shadow-[0_18px_45px_rgba(141,100,8,0.24)] transition-all duration-300 hover:-translate-y-1 hover:bg-[#6f4d05]">
                        {{ __('Konsultasi Gratis') }}
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                    <a href="https://wa.me/{{ $settings->phone ?? '6287868184742' }}?text={{ urlencode(__('Halo AKA Consulting, saya ingin konsultasi layanan hukum dan perizinan.')) }}" target="_blank" class="inline-flex items-center justify-center gap-2 rounded-full border border-[#8d6408]/20 bg-white/80 px-7 py-4 font-black text-[#4a3620] shadow-sm backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:border-[#8d6408] hover:text-[#8d6408]">
                        {{ __('Hubungi WhatsApp') }}
                        <span class="material-symbols-outlined text-[18px]">chat</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-6 relative" data-aos="fade-up" data-aos-duration="800">
                <div class="grid grid-cols-12 gap-4 items-stretch">
                    <div class="col-span-8 rounded-[2rem] overflow-hidden shadow-2xl border border-white/60 bg-white aspect-[4/5]">
                        <img src="https://images.unsplash.com/photo-1551836022-4c4c79ecde51?auto=format&fit=crop&q=80&w=1400" alt="Business consulting" class="h-full w-full object-cover">
                    </div>
                    <div class="col-span-4 flex flex-col gap-4">
                        <div class="rounded-[1.5rem] overflow-hidden shadow-xl border border-white/60 bg-white aspect-[1/1.1]">
                            <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=80&w=900" alt="Legal discussion" class="h-full w-full object-cover">
                        </div>
                        <div class="rounded-[1.5rem] overflow-hidden shadow-xl border border-white/60 bg-white aspect-[1/1.1]">
                            <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80&w=900" alt="Corporate meeting" class="h-full w-full object-cover">
                        </div>
                    </div>
                </div>
                <div class="absolute -bottom-6 left-6 rounded-2xl border border-white/70 bg-white/85 px-5 py-4 shadow-xl backdrop-blur-md float">
                    <p class="text-[10px] font-black uppercase tracking-[0.22em] text-[#8d6408]">{{ __('Corporate Ready') }}</p>
                    <p class="mt-1 text-sm font-bold text-on-surface">{{ __('Legal, izin, dan kepatuhan dalam satu alur.') }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section pt-6">
        <div class="content-container space-y-12">
                <div class="sticky top-24 z-20 rounded-[1.75rem] border border-[#dccaa2] bg-white/90 px-4 py-4 shadow-sm backdrop-blur-md">
                <div class="flex flex-wrap gap-2">
                    @foreach($groupedServices->keys() as $category)
                        <a href="#{{ Str::slug($category) }}" class="rounded-full border border-[#e6d7b7] bg-[#fbf8f1] px-4 py-2 text-xs font-black uppercase tracking-[0.18em] text-[#5a4327] transition-all duration-300 hover:-translate-y-0.5 hover:border-[#8d6408] hover:text-[#8d6408]">
                            {{ Str::limit($category, 30) }}
                        </a>
                    @endforeach
                </div>
            </div>

            @foreach($groupedServices as $category => $categoryServices)
                @php
                    $categoryImg = $getCategoryImage((string)$category);
                @endphp
                <section id="{{ Str::slug($category) }}" class="space-y-6 scroll-mt-32">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                        <div class="lg:col-span-4 rounded-[2rem] overflow-hidden shadow-xl border border-white/70 bg-white relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#8d6408]/15 via-transparent to-transparent"></div>
                            <img src="{{ $categoryImg }}" alt="{{ $category }}" class="h-full w-full min-h-[260px] object-cover">
                        </div>
                        <div class="lg:col-span-8 rounded-[2rem] border border-[#eadfcb] bg-white/90 p-8 md:p-10 shadow-sm backdrop-blur-sm">
                            <div class="flex flex-wrap items-center gap-3">
                                <span class="inline-flex items-center gap-2 rounded-full bg-[#8d6408]/10 px-4 py-2 text-[10px] font-black uppercase tracking-[0.22em] text-[#8d6408]">
                                    <span class="material-symbols-outlined text-[16px]">category</span>
                                    {{ $category }}
                                </span>
                                <span class="text-xs font-semibold uppercase tracking-[0.22em] text-on-surface-variant">{{ $categoryServices->count() }} {{ __('layanan') }}</span>
                            </div>
                            <h2 class="mt-5 text-3xl md:text-4xl font-black text-on-surface">{{ $category }}</h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        @foreach($categoryServices as $index => $service)
                            @php
                                $serviceTitle = __t($service->title);
                                $serviceShortDescription = __t($service->short_description);
                            @endphp
                            <a href="{{ route('services.show', $service->slug) }}" class="group relative overflow-hidden rounded-[1.9rem] border border-[#eadfcb] bg-white shadow-[0_14px_45px_rgba(72,49,18,0.08)] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_55px_rgba(72,49,18,0.16)]" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                                <div class="relative aspect-[4/3] overflow-hidden">
                                    <img src="{{ $service->thumbnail_url }}" alt="{{ $serviceTitle }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/5 to-transparent"></div>
                                    <div class="absolute left-5 top-5 inline-flex items-center gap-2 rounded-full bg-white/90 px-3 py-1.5 text-[10px] font-black uppercase tracking-[0.18em] text-[#8d6408] backdrop-blur-md">
                                        {{ $service->category ?? $category }}
                                    </div>
                                    <div class="absolute right-5 top-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-white/90 text-[#8d6408] shadow-lg backdrop-blur-md transition-transform duration-500 group-hover:scale-110 group-hover:rotate-6">
                                        <span class="material-symbols-outlined text-[26px]">{{ $service->icon_image ?: 'gavel' }}</span>
                                    </div>
                                </div>
                                <div class="p-6 md:p-7 space-y-4">
                                    <h3 class="text-xl font-black leading-tight text-on-surface transition-colors duration-300 group-hover:text-[#8d6408]">{{ $serviceTitle }}</h3>
                                    <p class="text-sm leading-relaxed text-on-surface-variant">{{ $serviceShortDescription }}</p>
                                    <div class="flex items-center justify-between pt-2">
                                        <span class="inline-flex items-center gap-2 rounded-full bg-[#fbf6ea] px-3 py-1.5 text-[10px] font-black uppercase tracking-[0.18em] text-[#7a5a16]">{{ __('Detail Lengkap') }}</span>
                                        <span class="inline-flex items-center gap-2 text-sm font-black text-[#8d6408] transition-transform duration-300 group-hover:translate-x-1">
                                            {{ __('Lihat Detail') }}
                                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endforeach

            <section class="rounded-[2.25rem] border border-[#eadfcb] bg-[#1c140c] px-8 py-10 md:px-12 md:py-14 text-white shadow-[0_24px_70px_rgba(28,20,12,0.18)] overflow-hidden relative">
                <div class="absolute right-0 top-0 h-72 w-72 rounded-full bg-[#d9a11a]/15 blur-3xl"></div>
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-8 space-y-4">
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-[#d9a11a]">{{ __('Butuh layanan kustom?') }}</p>
                        <h2 class="text-3xl md:text-5xl font-black leading-tight">{{ __('Sampaikan kebutuhan legal Anda, kami susun solusi yang paling sesuai.') }}</h2>
                        <p class="max-w-2xl text-white/75 leading-relaxed">{{ __('Jika kebutuhan Anda belum masuk daftar di atas, tim kami dapat menyiapkan penanganan khusus yang tetap rapi, responsif, dan siap untuk kebutuhan corporate.') }}</p>
                    </div>
                    <div class="lg:col-span-4 flex flex-col gap-4 lg:items-end">
                        <a href="{{ url('/#kontak') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-7 py-4 font-black text-[#1c140c] transition-all duration-300 hover:-translate-y-1 hover:bg-[#fbf8f1]">
                            {{ __('Isi Form Konsultasi') }}
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                        <a href="https://wa.me/{{ $settings->phone ?? '6287868184742' }}?text={{ urlencode(__('Halo AKA Consulting, saya ingin diskusi kebutuhan layanan khusus.')) }}" target="_blank" class="inline-flex items-center justify-center gap-2 rounded-full border border-white/20 bg-white/5 px-7 py-4 font-black text-white transition-all duration-300 hover:-translate-y-1 hover:border-white/40 hover:bg-white/10">
                            {{ __('WhatsApp Cepat') }}
                            <span class="material-symbols-outlined text-[18px]">chat</span>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
@endsection
