@extends('layouts.admin')

@section('title', 'Pengaturan Perusahaan - AKA Consulting CMS')
@section('page_title', 'Pengaturan Profil')
@section('page_subtitle', 'Kelola informasi publik perusahaan Anda.')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    @if(session('success'))
    <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl text-sm font-semibold">
        <span class="material-symbols-outlined text-[20px]">check_circle</span>
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="settingsForm">
        @csrf

        {{-- ══════════════════════ INFORMASI UMUM ══════════════════════ --}}
        <div class="bg-white border border-outline-variant/30 rounded-2xl shadow-sm overflow-hidden">
            <div class="flex items-center gap-3 px-8 py-5 border-b border-outline-variant/20 bg-surface-container-lowest/50">
                <div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[20px] text-primary">corporate_fare</span>
                </div>
                <div>
                    <h3 class="text-sm font-black text-on-surface">Informasi Umum</h3>
                    <p class="text-xs text-on-surface-variant">Nama, motto, dan identitas perusahaan</p>
                </div>
            </div>
            <div class="p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label for="company_name" class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                            <span class="material-symbols-outlined text-[14px]">badge</span> Nama Perusahaan <span class="text-red-400">*</span>
                        </label>
                        <input type="text" name="company_name" id="company_name" required
                               value="{{ old('company_name', $settings->company_name) }}"
                               placeholder="Contoh: AKA Consulting"
                               class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                        @error('company_name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="space-y-1.5">
                        <label for="motto" class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                            <span class="material-symbols-outlined text-[14px]">format_quote</span> Motto / Tagline
                        </label>
                        <input type="text" name="motto" id="motto"
                               value="{{ old('motto', $settings->motto) }}"
                               placeholder="Contoh: Professional Legal Partner"
                               class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label for="about_us" class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                            <span class="material-symbols-outlined text-[14px]">info</span> Deskripsi / Tentang Kami <span class="text-red-400">*</span>
                        </label>
                        <span class="text-[10px] text-on-surface-variant" id="about_us_count">0 karakter</span>
                    </div>
                    <textarea name="about_us" id="about_us" rows="4" required
                              placeholder="Tuliskan deskripsi singkat tentang perusahaan Anda..."
                              class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all resize-none">{{ old('about_us', $settings->about_us) }}</textarea>
                    <p class="text-[11px] text-on-surface-variant">Tampil di footer dan halaman Tentang Kami.</p>
                </div>
            </div>
        </div>

        {{-- ══════════════════════ VISI & MISI ══════════════════════ --}}
        <div class="bg-white border border-outline-variant/30 rounded-2xl shadow-sm overflow-hidden">
            <div class="flex items-center gap-3 px-8 py-5 border-b border-outline-variant/20 bg-surface-container-lowest/50">
                <div class="w-9 h-9 rounded-xl bg-amber-500/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[20px] text-amber-600">auto_awesome</span>
                </div>
                <div>
                    <h3 class="text-sm font-black text-on-surface">Visi &amp; Misi Perusahaan</h3>
                    <p class="text-xs text-on-surface-variant">Ditampilkan di halaman Tentang Kami secara publik</p>
                </div>
            </div>
            <div class="p-8 space-y-6">
                {{-- VISI --}}
                <div class="rounded-2xl border border-[#d9a11a]/20 bg-[#fffbf0] p-6 space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-[#8d6408]/15 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[18px] text-[#8d6408]">visibility</span>
                        </div>
                        <div>
                            <p class="text-xs font-black uppercase tracking-widest text-[#8d6408]">Visi</p>
                            <p class="text-[11px] text-[#8d6408]/60">Tujuan jangka panjang perusahaan</p>
                        </div>
                        <span class="ml-auto text-[10px] text-[#8d6408]/60" id="vision_count">0 karakter</span>
                    </div>

                    <textarea name="vision" id="vision" rows="3"
                              placeholder="Contoh: Menjadi mitra legal terpercaya untuk kepatuhan dan pertumbuhan bisnis Indonesia."
                              class="w-full bg-white border border-[#d9a11a]/30 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-[#d9a11a]/15 focus:border-[#d9a11a] transition-all resize-none">{{ old('vision', $settings->vision) }}</textarea>

                    <div class="rounded-xl bg-[#1c140c]/90 px-5 py-4 text-white" id="vision_preview_box">
                        <p class="text-[9px] font-black uppercase tracking-[0.25em] text-[#d9a11a] mb-1.5">Preview tampilan publik</p>
                        <p class="text-sm font-bold leading-snug italic" id="vision_preview">{{ $settings->vision ?? 'Tulis visi perusahaan di atas...' }}</p>
                    </div>
                </div>

                {{-- MISI --}}
                <div class="rounded-2xl border border-primary/15 bg-surface-container-lowest/40 p-6 space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[18px] text-primary">flag</span>
                        </div>
                        <div>
                            <p class="text-xs font-black uppercase tracking-widest text-primary">Misi</p>
                            <p class="text-[11px] text-on-surface-variant">Langkah konkret untuk mencapai visi</p>
                        </div>
                        <span class="ml-auto text-[10px] text-on-surface-variant" id="mission_count">0 karakter</span>
                    </div>

                    <textarea name="mission" id="mission" rows="3"
                              placeholder="Contoh: Memberikan solusi legal yang praktis, responsif, dan berorientasi hasil nyata."
                              class="w-full bg-white border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all resize-none">{{ old('mission', $settings->mission) }}</textarea>

                    <div class="rounded-xl bg-primary/5 border border-primary/15 px-5 py-4">
                        <p class="text-[9px] font-black uppercase tracking-[0.25em] text-primary mb-1.5">Preview tampilan publik</p>
                        <p class="text-sm font-bold text-on-surface leading-snug italic" id="mission_preview">{{ $settings->mission ?? 'Tulis misi perusahaan di atas...' }}</p>
                    </div>
                </div>

                <div class="rounded-xl bg-blue-50 border border-blue-200 px-5 py-4 flex items-start gap-3">
                    <span class="material-symbols-outlined text-[18px] text-blue-500 mt-0.5 shrink-0">info</span>
                    <p class="text-xs text-blue-700 leading-relaxed">
                        Visi dan Misi akan ditampilkan secara otomatis di halaman <strong>Tentang Kami</strong>. Gunakan kalimat yang jelas, padat, dan mencerminkan nilai utama perusahaan.
                    </p>
                </div>
            </div>
        </div>

        {{-- ══════════════════════ KONTAK & LOKASI ══════════════════════ --}}
        <div class="bg-white border border-outline-variant/30 rounded-2xl shadow-sm overflow-hidden">
            <div class="flex items-center gap-3 px-8 py-5 border-b border-outline-variant/20 bg-surface-container-lowest/50">
                <div class="w-9 h-9 rounded-xl bg-emerald-500/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[20px] text-emerald-600">contact_phone</span>
                </div>
                <div>
                    <h3 class="text-sm font-black text-on-surface">Kontak &amp; Lokasi</h3>
                    <p class="text-xs text-on-surface-variant">Email, nomor telepon, dan alamat kantor</p>
                </div>
            </div>
            <div class="p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label for="email" class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                            <span class="material-symbols-outlined text-[14px]">mail</span> Email Bisnis <span class="text-red-400">*</span>
                        </label>
                        <input type="email" name="email" id="email" required
                               value="{{ old('email', $settings->email) }}"
                               placeholder="info@akaconsulting.id"
                               class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                    </div>
                    <div class="space-y-1.5">
                        <label for="phone" class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                            <span class="material-symbols-outlined text-[14px]">phone</span> Nomor WhatsApp/Telp <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">+62</span>
                            <input type="text" name="phone" id="phone" required
                                   value="{{ old('phone', $settings->phone) }}"
                                   placeholder="81234567890"
                                   class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl pl-12 pr-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                        </div>
                        <p class="text-[11px] text-on-surface-variant">Format: 628XXXXXXXXX (tanpa +)</p>
                    </div>
                </div>
                <div class="space-y-1.5">
                    <label for="address" class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">location_on</span> Alamat Kantor <span class="text-red-400">*</span>
                    </label>
                    <textarea name="address" id="address" rows="3" required
                              placeholder="Jl. Contoh No. 1, Kota, Provinsi..."
                              class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all resize-none">{{ old('address', $settings->address) }}</textarea>
                    <p class="text-[11px] text-on-surface-variant">Tampil di footer website dan halaman kontak.</p>
                </div>

                {{-- Google Maps Embed --}}
                <div class="space-y-1.5">
                    <label for="maps_url" class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">map</span> Google Maps Embed URL
                    </label>
                    <textarea name="maps_url" id="maps_url" rows="3"
                              placeholder='Paste URL embed dari Google Maps, contoh: https://www.google.com/maps/embed?pb=...'
                              class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all resize-none font-mono text-xs">{{ old('maps_url', $settings->maps_url ?? '') }}</textarea>
                    <div class="rounded-xl bg-amber-50 border border-amber-200 px-4 py-3 flex items-start gap-2.5">
                        <span class="material-symbols-outlined text-[16px] text-amber-600 mt-0.5 shrink-0">help</span>
                        <div class="text-[11px] text-amber-700 leading-relaxed space-y-1">
                            <p class="font-bold">Cara mendapatkan URL embed:</p>
                            <p>1. Buka <strong>Google Maps</strong> → cari lokasi kantor Anda</p>
                            <p>2. Klik <strong>Bagikan</strong> → pilih tab <strong>Sematkan peta</strong></p>
                            <p>3. Salin URL yang ada di dalam <code class="bg-amber-100 px-1 rounded">src="..."</code> pada kode HTML</p>
                            <p>4. Paste URL tersebut di kolom di atas</p>
                        </div>
                    </div>

                    @if(!empty($settings->maps_url ?? ''))
                    <div class="rounded-xl overflow-hidden border border-outline-variant/30 mt-2">
                        <p class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant px-3 py-2 bg-surface-container-lowest border-b border-outline-variant/20">Preview Peta</p>
                        <iframe src="{{ $settings->maps_url }}" width="100%" height="220"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="block"></iframe>
                    </div>
                    @endif
                </div>

            </div>
        </div>

        {{-- ══════════════════════ SOCIAL MEDIA ══════════════════════ --}}
        <div class="bg-white border border-outline-variant/30 rounded-2xl shadow-sm overflow-hidden">
            <div class="flex items-center gap-3 px-8 py-5 border-b border-outline-variant/20 bg-surface-container-lowest/50">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #833ab4 0%, #fd1d1d 50%, #fcb045 100%);">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-black text-on-surface">Social Media</h3>
                    <p class="text-xs text-on-surface-variant">Link media sosial yang tampil di footer website (kosongkan jika belum ada)</p>
                </div>
            </div>
            <div class="p-8 space-y-5">

                {{-- Info banner --}}
                <div class="flex items-start gap-3 rounded-xl bg-blue-50 border border-blue-200 px-4 py-3.5">
                    <span class="material-symbols-outlined text-[18px] text-blue-500 mt-0.5 shrink-0">info</span>
                    <p class="text-xs text-blue-700 leading-relaxed">Semua field social media bersifat <strong>opsional</strong>. Kosongkan jika perusahaan belum memiliki akun tersebut. Link hanya akan muncul di footer jika diisi.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Instagram --}}
                    <div class="space-y-1.5">
                        <label for="instagram_url" class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                            <span class="inline-flex w-5 h-5 rounded items-center justify-center shrink-0" style="background:linear-gradient(135deg,#fcb045,#fd1d1d,#833ab4)">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </span>
                            Instagram
                        </label>
                        <input type="url" name="instagram_url" id="instagram_url"
                               value="{{ old('instagram_url', $settings->instagram_url) }}"
                               placeholder="https://www.instagram.com/namaakun"
                               class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                        @error('instagram_url')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Facebook --}}
                    <div class="space-y-1.5">
                        <label for="facebook_url" class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                            <span class="inline-flex w-5 h-5 rounded items-center justify-center shrink-0 bg-[#1877F2]">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </span>
                            Facebook
                        </label>
                        <input type="url" name="facebook_url" id="facebook_url"
                               value="{{ old('facebook_url', $settings->facebook_url) }}"
                               placeholder="https://www.facebook.com/namahalaman"
                               class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                        @error('facebook_url')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- LinkedIn --}}
                    <div class="space-y-1.5">
                        <label for="linkedin_url" class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                            <span class="inline-flex w-5 h-5 rounded items-center justify-center shrink-0 bg-[#0A66C2]">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </span>
                            LinkedIn
                        </label>
                        <input type="url" name="linkedin_url" id="linkedin_url"
                               value="{{ old('linkedin_url', $settings->linkedin_url) }}"
                               placeholder="https://www.linkedin.com/company/namaakun"
                               class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                        @error('linkedin_url')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- TikTok --}}
                    <div class="space-y-1.5">
                        <label for="tiktok_url" class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                            <span class="inline-flex w-5 h-5 rounded items-center justify-center shrink-0 bg-[#010101]">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                            </span>
                            TikTok
                        </label>
                        <input type="url" name="tiktok_url" id="tiktok_url"
                               value="{{ old('tiktok_url', $settings->tiktok_url) }}"
                               placeholder="https://www.tiktok.com/@namaakun"
                               class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                        @error('tiktok_url')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- YouTube --}}
                    <div class="space-y-1.5">
                        <label for="youtube_url" class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                            <span class="inline-flex w-5 h-5 rounded items-center justify-center shrink-0 bg-[#FF0000]">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/></svg>
                            </span>
                            YouTube
                        </label>
                        <input type="url" name="youtube_url" id="youtube_url"
                               value="{{ old('youtube_url', $settings->youtube_url) }}"
                               placeholder="https://www.youtube.com/@namaakun"
                               class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                        @error('youtube_url')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Twitter / X --}}
                    <div class="space-y-1.5">
                        <label for="twitter_url" class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                            <span class="inline-flex w-5 h-5 rounded items-center justify-center shrink-0 bg-[#000000]">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </span>
                            Twitter / X
                        </label>
                        <input type="url" name="twitter_url" id="twitter_url"
                               value="{{ old('twitter_url', $settings->twitter_url) }}"
                               placeholder="https://twitter.com/namaakun"
                               class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                        @error('twitter_url')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                </div>

                {{-- Live preview badge --}}
                <div id="socmed_preview_row" class="hidden pt-3 border-t border-outline-variant/20">
                    <p class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant mb-3">Preview — Ikon yang akan muncul di footer:</p>
                    <div class="flex flex-wrap gap-3" id="socmed_preview_icons"></div>
                </div>

            </div>
        </div>

        {{-- ══════════════════════ WHATSAPP SETTINGS ══════════════════════ --}}
        <div class="bg-white border border-outline-variant/30 rounded-2xl shadow-sm overflow-hidden">
            <div class="flex items-center gap-3 px-8 py-5 border-b border-outline-variant/20 bg-surface-container-lowest/50">
                <div class="w-9 h-9 rounded-xl bg-emerald-500/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[20px] text-emerald-600">forum</span>
                </div>
                <div>
                    <h3 class="text-sm font-black text-on-surface">Pengaturan WhatsApp</h3>
                    <p class="text-xs text-on-surface-variant">Konfigurasi pesan default dan daftar admin CS</p>
                </div>
            </div>
            <div class="p-8 space-y-6">
                <div class="space-y-1.5">
                    <label for="whatsapp_text" class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">chat</span> Pesan Sapaan Default
                    </label>
                    <textarea name="whatsapp_text" id="whatsapp_text" rows="2"
                              placeholder="Contoh: Halo Admin, saya ingin bertanya tentang layanan AKA Consulting..."
                              class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all resize-none">{{ old('whatsapp_text', $settings->whatsapp_text) }}</textarea>
                    <p class="text-[11px] text-on-surface-variant">Teks ini akan otomatis muncul ketika pengguna mengklik tombol WhatsApp umum.</p>
                </div>

                <div class="pt-4 border-t border-outline-variant/20 space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold text-on-surface">Daftar Admin Customer Service</p>
                            <p class="text-xs text-on-surface-variant">Tambahkan admin yang akan muncul di widget chat dan footer.</p>
                        </div>
                        <button type="button" onclick="addAdminField()" class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-600 border border-emerald-200 px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-emerald-100 transition">
                            <span class="material-symbols-outlined text-[16px]">add</span> Tambah Admin
                        </button>
                    </div>

                    <div id="wa-admins-container" class="space-y-3">
                        @php $admins = old('whatsapp_admins', $settings->whatsapp_admins ?? []); @endphp
                        @if(empty($admins))
                            <div class="admin-field flex gap-3 items-start">
                                <div class="flex-1">
                                    <input type="text" name="whatsapp_admins[0][name]" placeholder="Nama Admin (mis: CS 1)" class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-2.5 text-sm">
                                </div>
                                <div class="flex-1 relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">+62</span>
                                    <input type="text" name="whatsapp_admins[0][phone]" placeholder="8123..." class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl pl-10 pr-4 py-2.5 text-sm">
                                </div>
                                <button type="button" onclick="this.parentElement.remove()" class="w-10 h-10 shrink-0 flex items-center justify-center text-red-500 hover:bg-red-50 rounded-xl border border-transparent hover:border-red-100 transition">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </div>
                        @else
                            @foreach($admins as $index => $admin)
                            <div class="admin-field flex gap-3 items-start">
                                <div class="flex-1">
                                    <input type="text" name="whatsapp_admins[{{ $index }}][name]" value="{{ $admin['name'] ?? '' }}" placeholder="Nama Admin" class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-2.5 text-sm">
                                </div>
                                <div class="flex-1 relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">+62</span>
                                    <input type="text" name="whatsapp_admins[{{ $index }}][phone]" value="{{ $admin['phone'] ?? '' }}" placeholder="8123..." class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl pl-10 pr-4 py-2.5 text-sm">
                                </div>
                                <button type="button" onclick="this.parentElement.remove()" class="w-10 h-10 shrink-0 flex items-center justify-center text-red-500 hover:bg-red-50 rounded-xl border border-transparent hover:border-red-100 transition">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════ SEO & PENGATURAN LANJUTAN ══════════════════════ --}}
        <div class="bg-white border border-outline-variant/30 rounded-2xl shadow-sm overflow-hidden">
            <div class="flex items-center gap-3 px-8 py-5 border-b border-outline-variant/20 bg-surface-container-lowest/50">
                <div class="w-9 h-9 rounded-xl bg-purple-500/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[20px] text-purple-600">search_insights</span>
                </div>
                <div>
                    <h3 class="text-sm font-black text-on-surface">SEO &amp; Pengaturan Lanjutan</h3>
                    <p class="text-xs text-on-surface-variant">Konfigurasi optimasi mesin pencari dan pihak ketiga</p>
                </div>
            </div>
            <div class="p-8 space-y-6">
                <div class="space-y-1.5">
                    <label for="google_site_verification" class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">google</span> Google Site Verification (GSC)
                    </label>
                    <input type="text" name="google_site_verification" id="google_site_verification"
                           value="{{ old('google_site_verification', $settings->google_site_verification) }}"
                           placeholder="Contoh: vH_abcdefghijklmn-12345678"
                           class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                    <p class="text-[11px] text-on-surface-variant mt-1">Masukkan ID verifikasi (huruf acak dari Google Search Console) tanpa tag HTML lengkap.</p>
                </div>
            </div>
        </div>

        {{-- ══════════════════════ SIMPAN ══════════════════════ --}}
        <div class="flex items-center justify-between bg-white border border-outline-variant/30 rounded-2xl px-8 py-5 shadow-sm">
            <p class="text-xs text-on-surface-variant">
                <span class="material-symbols-outlined text-[14px] align-middle mr-1">save</span>
                Perubahan akan langsung tampil di halaman publik setelah disimpan.
            </p>
            <button type="submit"
                    class="inline-flex items-center gap-2 bg-primary text-white px-10 py-3.5 rounded-xl font-black text-xs uppercase tracking-widest shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all">
                <span class="material-symbols-outlined text-[18px]">save</span>
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>

@push('scripts')
<script>
    let adminIndex = {{ empty($admins) ? 1 : count($admins) }};
    function addAdminField() {
        const container = document.getElementById('wa-admins-container');
        const html = `
            <div class="admin-field flex gap-3 items-start">
                <div class="flex-1">
                    <input type="text" name="whatsapp_admins[${adminIndex}][name]" placeholder="Nama Admin" class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-2.5 text-sm">
                </div>
                <div class="flex-1 relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">+62</span>
                    <input type="text" name="whatsapp_admins[${adminIndex}][phone]" placeholder="8123..." class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl pl-10 pr-4 py-2.5 text-sm">
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="w-10 h-10 shrink-0 flex items-center justify-center text-red-500 hover:bg-red-50 rounded-xl border border-transparent hover:border-red-100 transition">
                    <span class="material-symbols-outlined text-[20px]">delete</span>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        adminIndex++;
    }

    // Character counter
    function updateCount(inputId, countId) {
        const el = document.getElementById(inputId);
        const counter = document.getElementById(countId);
        if (!el || !counter) return;
        const update = () => counter.textContent = el.value.length + ' karakter';
        el.addEventListener('input', update);
        update();
    }

    // Live preview
    function livePreview(inputId, previewId, placeholder) {
        const el = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        if (!el || !preview) return;
        const update = () => {
            const val = el.value.trim();
            if (!val) { preview.innerHTML = '<span class="text-gray-400 italic">' + placeholder + '</span>'; return; }
            const lines = val.split('\n').map(l => l.trim()).filter(l => l.length > 0);
            if (lines.length > 1 && previewId === 'mission_preview') {
                preview.innerHTML = lines.map(l =>
                    `<span class="flex items-start gap-1.5 mb-1"><span class="text-green-400">✓</span><span>${l}</span></span>`
                ).join('');
            } else {
                preview.textContent = val;
            }
        };
        el.addEventListener('input', update);
        update();
    }

    // Social media live preview badges
    const socmedFields = [
        { id: 'instagram_url', label: 'Instagram',  bg: 'linear-gradient(135deg,#fcb045,#fd1d1d,#833ab4)' },
        { id: 'facebook_url',  label: 'Facebook',   bg: '#1877F2' },
        { id: 'linkedin_url',  label: 'LinkedIn',   bg: '#0A66C2' },
        { id: 'tiktok_url',    label: 'TikTok',     bg: '#010101' },
        { id: 'youtube_url',   label: 'YouTube',    bg: '#FF0000' },
        { id: 'twitter_url',   label: 'Twitter/X',  bg: '#000000' },
    ];

    function updateSocmedPreview() {
        const container = document.getElementById('socmed_preview_icons');
        const row = document.getElementById('socmed_preview_row');
        if (!container || !row) return;
        container.innerHTML = '';
        let hasAny = false;
        socmedFields.forEach(({ id, label, bg }) => {
            const val = document.getElementById(id)?.value?.trim();
            if (val) {
                hasAny = true;
                const badge = document.createElement('a');
                badge.href = val;
                badge.target = '_blank';
                badge.rel = 'noopener noreferrer';
                badge.className = 'inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-white text-[11px] font-bold no-underline';
                badge.style.background = bg;
                badge.innerHTML = `<span>${label}</span><span class="text-white/60 text-[9px]">↗</span>`;
                container.appendChild(badge);
            }
        });
        row.classList.toggle('hidden', !hasAny);
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateCount('about_us', 'about_us_count');
        updateCount('vision',   'vision_count');
        updateCount('mission',  'mission_count');

        livePreview('vision',  'vision_preview',  'Tulis visi perusahaan di atas...');
        livePreview('mission', 'mission_preview', 'Tulis misi perusahaan di atas...');

        // Social media preview
        socmedFields.forEach(({ id }) => {
            document.getElementById(id)?.addEventListener('input', updateSocmedPreview);
        });
        updateSocmedPreview();
    });
</script>
@endpush

@endsection
