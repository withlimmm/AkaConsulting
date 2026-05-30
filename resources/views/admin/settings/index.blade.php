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
                    <h3 class="text-sm font-black text-on-surface">Visi & Misi Perusahaan</h3>
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

                    {{-- Preview --}}
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

                    {{-- Preview --}}
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
                    <h3 class="text-sm font-black text-on-surface">Kontak & Lokasi</h3>
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
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </div>
                <div>
                    <h3 class="text-sm font-black text-on-surface">Social Media</h3>
                    <p class="text-xs text-on-surface-variant">Link media sosial yang tampil di footer dan widget chat</p>
                </div>
            </div>
            <div class="p-8 space-y-4">
                <div class="space-y-1.5">
                    <label for="instagram_url" class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-on-surface-variant">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        Instagram URL
                    </label>
                    <input type="url" name="instagram_url" id="instagram_url"
                           value="{{ old('instagram_url', $settings->instagram_url) }}"
                           placeholder="https://www.instagram.com/namaakun"
                           class="w-full bg-surface-container-lowest border border-outline-variant/50 rounded-xl px-4 py-3 text-sm focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all">
                    @error('instagram_url')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    <p class="text-[11px] text-on-surface-variant">
                        Kosongkan jika belum ada akun Instagram. Link akan tampil di footer dan widget chat saat diisi.
                    </p>
                </div>

                {{-- Preview --}}
                @if($settings->instagram_url)
                <div class="flex items-center gap-3 rounded-xl bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-100 px-4 py-3">
                    <svg class="w-5 h-5 shrink-0" style="fill: url(#ig-gradient)" viewBox="0 0 24 24">
                        <defs><linearGradient id="ig-gradient" x1="0%" y1="100%" x2="100%" y2="0%"><stop offset="0%" stop-color="#fcb045"/><stop offset="50%" stop-color="#fd1d1d"/><stop offset="100%" stop-color="#833ab4"/></linearGradient></defs>
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                    <div class="flex-1 min-w-0">
                        <p class="text-[11px] font-black text-slate-700">Link aktif</p>
                        <p class="text-[10px] text-slate-400 truncate">{{ $settings->instagram_url }}</p>
                    </div>
                    <a href="{{ $settings->instagram_url }}" target="_blank" rel="noopener noreferrer"
                       class="text-[10px] font-black text-purple-600 hover:underline shrink-0">Buka ↗</a>
                </div>
                @endif
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
    // Character counter
    function updateCount(inputId, countId, placeholder) {
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


    document.addEventListener('DOMContentLoaded', () => {
        updateCount('about_us', 'about_us_count');
        updateCount('vision',   'vision_count');
        updateCount('mission',  'mission_count');

        livePreview('vision',  'vision_preview',  'Tulis visi perusahaan di atas...');
        livePreview('mission', 'mission_preview', 'Tulis misi perusahaan di atas...');
    });
</script>
@endpush

@endsection
