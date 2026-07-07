@extends('layouts.main')

@section('title', __('Tentang Kami - AKA Consulting, Konsultan Terpercaya'))
@section('meta_description', __('Kolektif profesional AKA Consulting yang berdedikasi mendampingi bisnis melalui layanan konsultasi hukum, perizinan, dan kepatuhan yang strategis.'))

@section('content')
<div class="pt-24 pb-16 bg-[#f7f2e8]">

    {{-- ═══════════════════════════════════════ HERO ═══════════════════════════════════════ --}}
    <section class="relative overflow-hidden py-16 md:py-24">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(217,161,26,0.14),_transparent_40%),radial-gradient(circle_at_bottom_right,_rgba(73,53,28,0.08),_transparent_40%)]"></div>

        <div class="content-container relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Teks --}}
                <div data-aos="fade-right" data-aos-duration="800">
                    <div class="inline-flex items-center gap-2 rounded-full border border-[#d9a11a]/25 bg-white/70 px-4 py-2 text-xs font-black uppercase tracking-[0.25em] text-[#8d6408] shadow-sm backdrop-blur-md mb-6">
                        <span class="material-symbols-outlined text-[18px]">corporate_fare</span>
                        {{ __('Tentang AKA Consulting') }}
                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-[1.05] tracking-tight text-on-surface mb-6">
                        {{ __('Partner Legal') }}<br>
                        <span class="text-[#8d6408]">{{ __('Terpercaya') }}</span> {{ __('untuk') }}<br>{{ __('Bisnis Anda') }}
                    </h1>

                    <p class="text-base md:text-lg text-on-surface-variant leading-relaxed mb-8 max-w-lg">
                        {{ __('AKA Consulting hadir sebagai mitra strategis yang membantu bisnis bertumbuh dengan pondasi legal yang kokoh — mulai dari pendirian usaha, perizinan, kepatuhan, hingga penyelesaian sengketa.') }}
                    </p>

                    <div class="flex flex-wrap gap-4">
                        <a href="{{ url('/#kontak') }}"
                           class="inline-flex items-center gap-2 rounded-full bg-[#8d6408] px-7 py-4 font-black text-white shadow-[0_18px_45px_rgba(141,100,8,0.24)] transition-all duration-300 hover:-translate-y-1 hover:bg-[#6f4d05]">
                            {{ __('Konsultasi Gratis') }}
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                        <a href="/layanan"
                           class="inline-flex items-center gap-2 rounded-full border border-[#8d6408]/30 bg-white/80 px-7 py-4 font-black text-[#4a3620] backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:border-[#8d6408]">
                            {{ __('Lihat Layanan') }}
                            <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                        </a>
                    </div>
                </div>

                {{-- Gambar --}}
                <div class="relative" data-aos="fade-left" data-aos-duration="800" data-aos-delay="150">
                    <div class="absolute -inset-6 rounded-[3rem] bg-[#d9a11a]/10 blur-3xl"></div>
                    <div class="relative grid grid-cols-12 gap-4">
                        <div class="col-span-8 rounded-[2rem] overflow-hidden shadow-2xl border border-white/60 bg-white aspect-[4/5]">
                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=1600"
                                 alt="AKA Consulting Team" class="h-full w-full object-cover">
                        </div>
                        <div class="col-span-4 flex flex-col gap-4">
                            <div class="rounded-[1.5rem] overflow-hidden shadow-xl border border-white/60 bg-white flex-1">
                                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80&w=900"
                                     alt="Legal Documents" class="h-full w-full object-cover">
                            </div>
                            <div class="rounded-[1.5rem] overflow-hidden shadow-xl border border-white/60 bg-white flex-1">
                                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=80&w=900"
                                     alt="Business Handshake" class="h-full w-full object-cover">
                            </div>
                        </div>
                    </div>

                    {{-- Badge mengambang --}}
                    <div class="absolute -bottom-4 -left-4 rounded-2xl bg-white/90 px-5 py-4 shadow-xl backdrop-blur-md border border-[#eadfcb]">
                        <p class="text-[10px] font-black uppercase tracking-[0.22em] text-[#8d6408]">{{ __('Legal Partner') }}</p>
                        <p class="mt-1 text-sm font-bold text-on-surface">{{ __('Konsultasi, Izin & Kepatuhan') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════ STATISTIK ═══════════════════════════════════════ --}}
    <section class="py-12">
        <div class="content-container">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @php
                    $stats = [
                        ['icon' => 'workspace_premium', 'number' => '500+', 'label' => __('Klien Dilayani')],
                        ['icon' => 'gavel',             'number' => '19+',  'label' => __('Jenis Layanan')],
                        ['icon' => 'verified',          'number' => '5+',   'label' => __('Kategori Hukum')],
                        ['icon' => 'handshake',         'number' => '100%', 'label' => __('Komitmen Klien')],
                    ];
                @endphp
                @foreach($stats as $i => $stat)
                <div class="rounded-[1.75rem] bg-white border border-[#eadfcb] p-6 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md"
                     data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-full bg-[#8d6408]/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[24px] text-[#8d6408]">{{ $stat['icon'] }}</span>
                    </div>
                    <p class="text-3xl font-black text-[#4a3620]">{{ $stat['number'] }}</p>
                    <p class="mt-1 text-sm text-on-surface-variant font-semibold">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════ VISI & MISI ═══════════════════════════════════════ --}}
    <section class="py-12">
        <div class="content-container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="rounded-[2rem] bg-[#1c140c] text-white p-8 md:p-10 relative overflow-hidden shadow-xl"
                 data-aos="fade-up" data-aos-duration="700">
                <div class="absolute top-0 right-0 w-56 h-56 rounded-full bg-[#d9a11a]/15 blur-3xl"></div>
                {{-- Dekorasi tanda kutip besar --}}
                <div class="absolute top-4 right-6 text-[120px] leading-none text-[#d9a11a]/10 font-black select-none pointer-events-none">"</div>
                <div class="relative z-10">
                    <div class="mb-5 inline-flex items-center gap-2 rounded-full bg-[#d9a11a]/20 px-4 py-1.5 text-xs font-black uppercase tracking-widest text-[#d9a11a]">
                        <span class="material-symbols-outlined text-[14px]">visibility</span>
                        {{ __('Visi Perusahaan') }}
                    </div>

                    <div class="mb-4 w-8 h-0.5 bg-[#d9a11a]/40 rounded-full"></div>

                    <p class="text-white/90 text-base md:text-lg leading-relaxed font-medium italic mb-6">
                        "{{ __t($settings->vision ?? 'Menjadi mitra strategis terdepan dalam solusi hukum, perizinan, dan kepatuhan yang membantu bisnis Indonesia berkembang dengan aman dan berintegritas.||To be the leading strategic partner in legal, licensing, and compliance solutions that help Indonesian businesses grow safely and with integrity.') }}"
                    </p>

                    <div class="flex items-center gap-3 pt-4 border-t border-white/10">
                        <div class="w-8 h-8 rounded-full bg-[#d9a11a]/20 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[16px] text-[#d9a11a]">corporate_fare</span>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-[#d9a11a]">{{ $settings->company_name ?? 'AKA Consulting' }}</p>
                            <p class="text-[11px] text-white/40">{{ __('Konsultan Hukum & Perizinan') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-[2rem] bg-white border border-[#eadfcb] p-8 md:p-10 shadow-sm"
                 data-aos="fade-up" data-aos-delay="150" data-aos-duration="700">
                <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-[#8d6408]/10 px-4 py-1.5 text-sm font-bold text-[#8d6408]">
                    <span class="material-symbols-outlined text-[16px]">flag</span>
                    {{ __('Misi') }}
                </div>
                @php
                    $misiText = __t($settings->mission ?? "Memberikan solusi legal yang praktis, responsif, dan berorientasi hasil nyata.||Deliver practical, responsive, and result-oriented legal solutions.");
                    $misiLines = $misiText ? array_filter(array_map('trim', explode("\n", $misiText))) : [];
                @endphp

                @if(count($misiLines) > 1)
                    {{-- Mode bullet checklist --}}
                    <ul class="space-y-3">
                        @foreach($misiLines as $line)
                        <li class="flex items-start gap-2.5">
                            <span class="material-symbols-outlined text-[18px] text-[#8d6408] mt-0.5 shrink-0">check_circle</span>
                            <span class="text-sm leading-relaxed text-on-surface-variant">{{ $line }}</span>
                        </li>
                        @endforeach
                    </ul>
                @else
                    {{-- Mode paragraf biasa --}}
                    <h2 class="text-2xl md:text-3xl font-black text-on-surface mb-4 leading-snug">
                        {{ $misiText }}
                    </h2>
                @endif
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════ NILAI INTI ═══════════════════════════════════════ --}}
    <section class="py-12">
        <div class="content-container">
            <div class="text-center mb-12" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 rounded-full border border-[#d9a11a]/25 bg-white/70 px-4 py-2 text-xs font-black uppercase tracking-[0.25em] text-[#8d6408] mb-4">
                    <span class="material-symbols-outlined text-[16px]">diamond</span>
                    {{ __('Prinsip Kami') }}
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-on-surface">{{ __('Prinsip yang Mendasari Setiap Layanan') }}</h2>
                <p class="mt-3 text-on-surface-variant max-w-xl mx-auto text-sm">{{ __('Enam nilai inti yang menjadi fondasi dalam setiap pendampingan dan layanan konsultasi kami.') }}</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $values = [
                        [
                            'icon' => 'shield',
                            'title' => __('Integritas'),
                            'desc' => __('Kami menjunjung kejujuran dan etika profesional dalam setiap tahap layanan. Kepercayaan klien adalah aset utama yang selalu kami jaga.'),
                        ],
                        [
                            'icon' => 'workspace_premium',
                            'title' => __('Profesionalisme'),
                            'desc' => __('Setiap konsultan kami memiliki kompetensi mendalam di bidangnya — memberikan analisis hukum dan perizinan yang akurat, terstruktur, dan dapat diandalkan.'),
                        ],
                        [
                            'icon' => 'lock',
                            'title' => __('Kerahasiaan'),
                            'desc' => __('Seluruh data, dokumen, dan informasi klien dijaga ketat kerahasiaannya sesuai prinsip client privilege yang berlaku dalam praktik konsultasi hukum.'),
                        ],
                        [
                            'icon' => 'speed',
                            'title' => __('Responsif'),
                            'desc' => __('Kami berkomitmen untuk merespons kebutuhan klien secara cepat dan proaktif, memastikan setiap proses berjalan tepat waktu dan tanpa hambatan.'),
                        ],
                        [
                            'icon' => 'fact_check',
                            'title' => __('Kepatuhan'),
                            'desc' => __('Solusi yang kami berikan selalu mengacu pada regulasi dan ketentuan hukum yang berlaku, memastikan klien beroperasi dalam koridor legal yang aman.'),
                        ],
                        [
                            'icon' => 'balance',
                            'title' => __('Akuntabilitas'),
                            'desc' => __('Kami bertanggung jawab penuh atas setiap rekomendasi dan tindakan yang diambil — memberikan laporan yang jelas, transparan, dan dapat dipertanggungjawabkan.'),
                        ],
                    ];
                @endphp

                @foreach($values as $i => $val)
                <div class="group rounded-[2rem] bg-white border border-[#eadfcb] p-7 shadow-sm transition-all duration-400 hover:-translate-y-2 hover:shadow-lg hover:border-[#d9a11a]/40"
                     data-aos="fade-up" data-aos-delay="{{ $i * 80 }}" data-aos-duration="700">
                    <div class="mb-5 w-14 h-14 rounded-2xl bg-[#8d6408]/10 flex items-center justify-center transition-all duration-300 group-hover:bg-[#8d6408]/20 group-hover:scale-110">
                        <span class="material-symbols-outlined text-[28px] text-[#8d6408]">{{ $val['icon'] }}</span>
                    </div>
                    <h4 class="text-lg font-black text-on-surface mb-2 group-hover:text-[#8d6408] transition-colors">{{ $val['title'] }}</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">{{ $val['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════ TIM ═══════════════════════════════════════ --}}
    @if($teams->isNotEmpty())
    <section class="py-12">
        <div class="content-container">
            <div class="text-center mb-12" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 rounded-full border border-[#d9a11a]/25 bg-white/70 px-4 py-2 text-xs font-black uppercase tracking-[0.25em] text-[#8d6408] mb-4">
                    <span class="material-symbols-outlined text-[16px]">groups</span>
                    {{ __('Tim Kami') }}
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-on-surface">{{ __('Profesional di Balik Layanan Kami') }}</h2>
                <p class="mt-3 text-on-surface-variant max-w-xl mx-auto">{{ __('Kolektif konsultan berpengalaman yang siap mendampingi Anda dari awal hingga selesai.') }}</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($teams as $index => $team)
                <div class="group rounded-[2rem] bg-white border border-[#eadfcb] p-6 text-center shadow-sm transition-all duration-400 hover:-translate-y-2 hover:shadow-xl"
                     data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="650">
                    <div class="relative mx-auto mb-5 w-28 h-28">
                        <div class="absolute inset-0 rounded-full bg-[#d9a11a]/20 blur-xl scale-110 group-hover:scale-125 transition-transform duration-500"></div>
                        <div class="relative w-28 h-28 rounded-full overflow-hidden border-4 border-[#d9a11a]/30 group-hover:border-[#8d6408]/50 transition-all duration-300">
                            <img src="{{ $team->photo ? asset('storage/' . $team->photo) : asset('images/default-avatar.png') }}"
                                 alt="{{ $team->name }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                    </div>
                    <h3 class="text-lg font-black text-on-surface mb-1 group-hover:text-[#8d6408] transition-colors">{{ $team->name }}</h3>
                    <p class="text-[#8d6408] font-bold text-sm mb-3">{{ __t($team->position) }}</p>
                    <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3">{{ __t($team->description) }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ═══════════════════════════════════════ LAYANAN POPULER ═══════════════════════════════════════ --}}
    <section class="py-12">
        <div class="content-container">
            <div class="text-center mb-10" data-aos="fade-up">
                <h2 class="text-3xl font-black text-on-surface">{{ __('Layanan Unggulan Kami') }}</h2>
                <p class="mt-2 text-on-surface-variant">{{ __('Berbagai solusi legal yang siap kami dampingi untuk Anda') }}</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @php
                    $popularServices = \App\Models\Service::where('status','active')->orderBy('sort_order')->limit(6)->get();
                @endphp
                @foreach($popularServices as $i => $ps)
                <a href="{{ route('services.show', $ps->slug) }}"
                   class="group rounded-[1.5rem] bg-white border border-[#eadfcb] p-5 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-[#8d6408]/40"
                   data-aos="fade-up" data-aos-delay="{{ $i * 70 }}">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-xl bg-[#8d6408]/10 flex items-center justify-center group-hover:bg-[#8d6408]/20 transition-colors">
                        <span class="material-symbols-outlined text-[24px] text-[#8d6408]">{{ $ps->icon_image ?: 'gavel' }}</span>
                    </div>
                    <p class="text-xs font-black text-on-surface leading-tight group-hover:text-[#8d6408] transition-colors">{{ Str::limit(__t($ps->title), 32) }}</p>
                </a>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="/layanan" class="inline-flex items-center gap-2 rounded-full bg-[#8d6408]/10 px-6 py-3 text-sm font-black text-[#8d6408] hover:bg-[#8d6408]/20 transition-all">
                    {{ __('Lihat Semua Layanan') }}
                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════ LOKASI ═══════════════════════════════════════ --}}
    @if(!empty($settings->maps_url ?? ''))
    <section class="py-12">
        <div class="content-container">
            <div class="text-center mb-10" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 rounded-full border border-[#d9a11a]/25 bg-white/70 px-4 py-2 text-xs font-black uppercase tracking-[0.25em] text-[#8d6408] mb-4">
                    <span class="material-symbols-outlined text-[16px]">location_on</span>
                    {{ __('Lokasi Kami') }}
                </div>
                <h2 class="text-3xl font-black text-on-surface">{{ __('Temukan Kantor Kami') }}</h2>
                @if($settings->address ?? null)
                <p class="mt-2 text-on-surface-variant text-sm max-w-lg mx-auto">{{ $settings->address }}</p>
                @endif
            </div>

            <div class="rounded-[2rem] overflow-hidden shadow-xl border border-[#eadfcb] bg-white" data-aos="fade-up">
                {{-- Header strip --}}
                <div class="flex items-center gap-3 px-6 py-4 bg-[#1c140c] text-white">
                    <div class="w-8 h-8 rounded-lg bg-[#d9a11a]/20 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px] text-[#d9a11a]">map</span>
                    </div>
                    <div>
                        <p class="text-sm font-black">{{ $settings->company_name ?? 'AKA Consulting' }}</p>
                        @if($settings->address ?? null)
                        <p class="text-[11px] text-white/50 line-clamp-1">{{ $settings->address }}</p>
                        @endif
                    </div>
                    <a href="https://maps.google.com/?q={{ urlencode($settings->address ?? '') }}"
                       target="_blank"
                       class="ml-auto inline-flex items-center gap-1.5 rounded-full bg-[#d9a11a]/20 px-3 py-1.5 text-[11px] font-black text-[#d9a11a] hover:bg-[#d9a11a]/30 transition-colors">
                        <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                        {{ __('Buka di Maps') }}
                    </a>
                </div>

                {{-- Iframe maps --}}
                <iframe
                    src="{{ $settings->maps_url }}"
                    width="100%"
                    height="420"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="block w-full">
                </iframe>
            </div>
        </div>
    </section>
    @endif

    {{-- ═══════════════════════════════════════ CTA ═══════════════════════════════════════ --}}

    <section class="py-12">
        <div class="content-container">
            <div class="rounded-[2.25rem] bg-[#1c140c] text-white px-8 py-12 md:px-14 md:py-16 relative overflow-hidden shadow-[0_24px_70px_rgba(28,20,12,0.18)]"
                 data-aos="fade-up">
                <div class="absolute right-0 top-0 h-72 w-72 rounded-full bg-[#d9a11a]/15 blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-[#d9a11a]/10 blur-3xl pointer-events-none"></div>
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-[#d9a11a] mb-3">{{ __('Mulai Sekarang') }}</p>
                        <h2 class="text-3xl md:text-4xl font-black leading-tight mb-4">
                            {{ __('Siap Berkonsultasi dengan Tim AKA?') }}
                        </h2>
                        <p class="text-white/70 leading-relaxed">
                            {{ __('Tim konsultan kami siap membantu kebutuhan legal, perizinan, dan kepatuhan bisnis Anda secara profesional dan responsif.') }}
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row lg:flex-col xl:flex-row gap-4 lg:justify-end">
                        <a href="{{ url('/#kontak') }}"
                           class="inline-flex items-center justify-center gap-2 rounded-full bg-[#d9a11a] px-7 py-4 font-black text-[#1c140c] transition-all duration-300 hover:-translate-y-1 hover:bg-[#f0b820]">
                            {{ __('Isi Form Konsultasi') }}
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                        @php
                            $mainPhone = preg_replace('/[^0-9]/', '', $settings->phone ?? '');
                            if (str_starts_with($mainPhone, '0')) $mainPhone = '62' . substr($mainPhone, 1);
                            $waText = $settings->whatsapp_text ?? 'Halo AKA Consulting, saya ingin konsultasi layanan hukum dan perizinan.';
                        @endphp
                        @if($mainPhone)
                        <a href="https://wa.me/{{ $mainPhone }}?text={{ urlencode(__($waText)) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center justify-center gap-2 rounded-full border border-white/20 bg-white/5 px-7 py-4 font-black text-white transition-all duration-300 hover:-translate-y-1 hover:bg-white/10">
                            {{ __('WhatsApp Admin') }}
                            <span class="material-symbols-outlined text-[18px]">chat</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection