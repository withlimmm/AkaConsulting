@php
    // Ambil kategori unik langsung dari database — tidak perlu seeder
    $existingCategories = \App\Models\Service::whereNotNull('category')
        ->distinct()->pluck('category')->sort()->values();

    $icons = [
        'gavel', 'description', 'verified', 'apartment',
        'policy', 'assignment', 'fact_check', 'balance',
        'workspace_premium', 'shield', 'handshake', 'public',
        'edit_note', 'legal', 'inventory_2', 'location_city'
    ];
@endphp

@extends('layouts.admin')

@section('title', 'Tambah Layanan - AKA Consulting CMS')
@section('page_title', 'Tambah Layanan Baru')

@section('content')
<div class="max-w-6xl mx-auto pb-20">
    <div class="mb-8 flex items-center justify-between animate-in slide-in-from-left duration-500">
        <a href="{{ route('admin.services.index') }}" class="flex items-center gap-2 text-slate-400 hover:text-slate-900 transition-colors group">
            <span class="material-symbols-outlined group-hover:-translate-x-1 transition-transform">arrow_back</span>
            <span class="text-xs font-black uppercase tracking-widest">Kembali ke Daftar</span>
        </a>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 animate-in fade-in duration-700">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white border border-slate-200 rounded-[2rem] p-8 md:p-10 shadow-sm space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2 md:col-span-2">
                            <label for="category" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Kategori Layanan</label>

                            {{-- Input bebas + autocomplete dari DB (tidak perlu seeder) --}}
                            <input type="text" name="category" id="category" required
                                   list="category-list"
                                   value="{{ old('category') }}"
                                   placeholder="Pilih atau ketik kategori baru..."
                                   class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all font-bold outline-none">

                            <datalist id="category-list">
                                @foreach($existingCategories as $cat)
                                    <option value="{{ $cat }}">{{ $cat }}</option>
                                @endforeach
                            </datalist>

                            @if($existingCategories->isNotEmpty())
                            <div class="flex flex-wrap gap-2 mt-2">
                                @foreach($existingCategories as $cat)
                                <button type="button"
                                        onclick="document.getElementById('category').value = '{{ addslashes($cat) }}'"
                                        class="px-3 py-1.5 rounded-full border border-slate-200 bg-slate-50 text-[10px] font-black uppercase tracking-wider text-slate-500 hover:border-primary hover:text-primary hover:bg-white transition-all">
                                    {{ $cat }}
                                </button>
                                @endforeach
                                <span class="px-3 py-1.5 text-[10px] text-slate-400 italic self-center">atau ketik kategori baru</span>
                            </div>
                            @endif
                        </div>

                        <div class="space-y-2">
                            <label for="title_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Judul Layanan (Indonesia)</label>
                            <input type="text" name="title_id" id="title_id" required value="{{ old('title_id') }}" placeholder="Contoh: Pendirian PT Lengkap" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all font-bold outline-none">
                        </div>

                        <div class="space-y-2">
                            <label for="title_en" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Service Title (English)</label>
                            <input type="text" name="title_en" id="title_en" value="{{ old('title_en') }}" placeholder="Example: Complete PT Establishment" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all font-bold outline-none">
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="short_description_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Deskripsi Singkat (Indonesia)</label>
                            <textarea name="short_description_id" id="short_description_id" rows="3" required placeholder="Tuliskan 1-2 kalimat ringkas untuk kartu layanan..." class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ old('short_description_id') }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="short_description_en" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Short Description (English)</label>
                            <textarea name="short_description_en" id="short_description_en" rows="3" placeholder="Write 1-2 concise sentences for the service card..." class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ old('short_description_en') }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="full_description_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Konten Detail (Indonesia)</label>
                            <textarea name="full_description_id" id="full_description_id" rows="9" required placeholder="Jelaskan layanan, cakupan, proses, dan value utamanya..." class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ old('full_description_id') }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="full_description_en" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Full Description (English)</label>
                            <textarea name="full_description_en" id="full_description_en" rows="9" placeholder="Explain this service in detail..." class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ old('full_description_en') }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="benefits_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Benefit Layanan (satu baris per poin)</label>
                            <textarea name="benefits_id" id="benefits_id" rows="5" placeholder="Konsultasi legalitas\nPendampingan administrasi\nMonitoring progres" class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ old('benefits_id') }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="steps_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Langkah Pengerjaan (satu baris per poin)</label>
                            <textarea name="steps_id" id="steps_id" rows="5" placeholder="Konsultasi awal\nReview dokumen\nPengajuan dan monitoring" class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ old('steps_id') }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="requirements_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Persyaratan Dokumen (satu baris per poin)</label>
                            <textarea name="requirements_id" id="requirements_id" rows="5" placeholder="KTP penanggung jawab\nNPWP\nAkta atau dokumen terkait" class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ old('requirements_id') }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="faq_items_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">FAQ Layanan (format: Pertanyaan | Jawaban)</label>
                            <textarea name="faq_items_id" id="faq_items_id" rows="6" placeholder="Berapa lama prosesnya? | Tergantung jenis layanan dan kelengkapan dokumen.\nApa dokumen yang dibutuhkan? | KTP, NPWP, dan dokumen pendukung lainnya." class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ old('faq_items_id') }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="meta_title_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Meta Title</label>
                            <input type="text" name="meta_title_id" id="meta_title_id" value="{{ old('meta_title_id') }}" placeholder="Judul SEO layanan" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all font-bold outline-none">
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="meta_description_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Meta Description</label>
                            <textarea name="meta_description_id" id="meta_description_id" rows="3" placeholder="Deskripsi SEO layanan" class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ old('meta_description_id') }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="meta_keywords_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Meta Keywords</label>
                            <input type="text" name="meta_keywords_id" id="meta_keywords_id" value="{{ old('meta_keywords_id') }}" placeholder="pt, cv, izin usaha, legal compliance" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all font-bold outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-8">
                <div class="bg-white border border-slate-200 rounded-[2rem] p-8 shadow-sm space-y-6">
                    <label class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Thumbnail & Banner</label>

                    <div class="space-y-3">
                        <div class="rounded-2xl border border-slate-200 overflow-hidden bg-slate-50 aspect-[4/3] flex items-center justify-center">
                            <img id="thumbnailPreview" src="{{ asset('images/logo_aka.png') }}" alt="Preview Thumbnail" class="h-full w-full object-cover opacity-80">
                        </div>
                        <input type="file" name="thumbnail_image" id="thumbnail_image" accept="image/*" onchange="previewImage(this, 'thumbnailPreview')" class="w-full text-xs text-slate-500 file:mr-4 file:rounded-xl file:border-0 file:bg-primary file:px-4 file:py-2 file:text-white file:font-bold">
                    </div>

                    <div class="space-y-3">
                        <div class="rounded-2xl border border-slate-200 overflow-hidden bg-slate-50 aspect-[16/10] flex items-center justify-center">
                            <img id="bannerPreview" src="{{ asset('images/logo_aka.png') }}" alt="Preview Banner" class="h-full w-full object-cover opacity-80">
                        </div>
                        <input type="file" name="banner_image" id="banner_image" accept="image/*" onchange="previewImage(this, 'bannerPreview')" class="w-full text-xs text-slate-500 file:mr-4 file:rounded-xl file:border-0 file:bg-slate-900 file:px-4 file:py-2 file:text-white file:font-bold">
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-[2rem] p-8 shadow-sm space-y-6">
                    <label class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Pilih Ikon Layanan</label>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-primary border border-slate-100">
                            <span id="iconPreview" class="material-symbols-outlined text-4xl">category</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <input type="text" name="icon_image" id="iconInput" value="{{ old('icon_image', 'category') }}" readonly class="w-full bg-slate-50 border border-slate-200 rounded-xl px-5 py-3 text-xs font-black text-center uppercase tracking-widest outline-none">
                        <div class="grid grid-cols-4 gap-2">
                            @foreach($icons as $icon)
                                <button type="button" onclick="selectIcon('{{ $icon }}')" class="h-10 rounded-lg border border-slate-100 hover:border-primary hover:text-primary transition-all flex items-center justify-center bg-slate-50/50 hover:bg-white hover:shadow-md group">
                                    <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">{{ $icon }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-[2rem] p-8 shadow-sm space-y-4">
                    <label for="sort_order" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Urutan Tampil</label>
                    <input type="number" name="sort_order" id="sort_order" min="0" value="{{ old('sort_order', 0) }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all font-bold outline-none">

                    <label class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Status Publikasi</label>
                    <div class="grid grid-cols-1 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="status" value="active" class="peer hidden" {{ old('status', 'active') === 'active' ? 'checked' : '' }}>
                            <div class="flex items-center gap-3 px-6 py-4 rounded-xl bg-slate-50 border border-slate-200 peer-checked:bg-primary/5 peer-checked:border-primary peer-checked:text-primary transition-all group">
                                <span class="material-symbols-outlined text-xl">public</span>
                                <span class="text-xs font-black uppercase tracking-widest">Aktif / Publik</span>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="status" value="draft" class="peer hidden" {{ old('status') === 'draft' ? 'checked' : '' }}>
                            <div class="flex items-center gap-3 px-6 py-4 rounded-xl bg-slate-50 border border-slate-200 peer-checked:bg-slate-900 peer-checked:border-slate-900 peer-checked:text-white transition-all group">
                                <span class="material-symbols-outlined text-xl">drafts</span>
                                <span class="text-xs font-black uppercase tracking-widest">Simpan Draft</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-end gap-4 pt-6 border-t border-slate-100">
            <button type="submit" class="w-full sm:w-auto bg-slate-900 text-white px-14 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-slate-800 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-3">
                <span class="material-symbols-outlined text-xl">publish</span>
                Terbitkan Layanan
            </button>
        </div>
    </form>
</div>

<script>
    function selectIcon(iconName) {
        document.getElementById('iconInput').value = iconName;
        document.getElementById('iconPreview').innerText = iconName;
    }

    function previewImage(input, targetId) {
        if (!input.files || !input.files[0]) {
            return;
        }

        const reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById(targetId).src = event.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection
