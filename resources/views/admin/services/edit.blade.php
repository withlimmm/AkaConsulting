@php
    // Ambil kategori unik dari database — tidak perlu seeder
    $existingCategories = \App\Models\Service::whereNotNull('category')
        ->where('id', '!=', $service->id)
        ->distinct()->pluck('category')
        ->push($service->category) // pastikan kategori saat ini selalu ada
        ->filter()->unique()->sort()->values();

    $icons = [
        'gavel', 'description', 'verified', 'apartment',
        'policy', 'assignment', 'fact_check', 'balance',
        'workspace_premium', 'shield', 'handshake', 'public',
        'edit_note', 'legal', 'inventory_2', 'location_city'
    ];

    $titleData = json_decode($service->title, true);
    $shortDescriptionData = json_decode($service->short_description, true);
    $fullDescriptionData = json_decode($service->full_description, true);
    $benefitsData = json_decode($service->benefits, true);
    $stepsData = json_decode($service->steps, true);
    $requirementsData = json_decode($service->requirements, true);
    $faqItemsData = json_decode($service->faq_items, true);

    $titleId = old('title_id', is_array($titleData) ? ($titleData['id'] ?? $titleData['en'] ?? $service->title) : $service->title);
    $titleEn = old('title_en', is_array($titleData) ? ($titleData['en'] ?? '') : '');
    $shortDescriptionId = old('short_description_id', is_array($shortDescriptionData) ? ($shortDescriptionData['id'] ?? $shortDescriptionData['en'] ?? $service->short_description) : $service->short_description);
    $shortDescriptionEn = old('short_description_en', is_array($shortDescriptionData) ? ($shortDescriptionData['en'] ?? '') : '');
    $fullDescriptionId = old('full_description_id', is_array($fullDescriptionData) ? ($fullDescriptionData['id'] ?? $fullDescriptionData['en'] ?? $service->full_description) : $service->full_description);
    $fullDescriptionEn = old('full_description_en', is_array($fullDescriptionData) ? ($fullDescriptionData['en'] ?? '') : '');
    $benefitsId = old('benefits_id', is_array($benefitsData) ? implode("\n", data_get($benefitsData, 'id', [])) : '');
    $stepsId = old('steps_id', is_array($stepsData) ? implode("\n", data_get($stepsData, 'id', [])) : '');
    $requirementsId = old('requirements_id', is_array($requirementsData) ? implode("\n", data_get($requirementsData, 'id', [])) : '');
    $faqItemsId = old('faq_items_id', is_array($faqItemsData) ? collect(data_get($faqItemsData, 'id', []))->map(fn ($item) => trim(($item['question'] ?? '') . ' | ' . ($item['answer'] ?? '')))->implode("\n") : '');
@endphp

@extends('layouts.admin')

@section('title', 'Edit Layanan - AKA Consulting CMS')
@section('page_title', 'Perbarui Layanan')

@section('content')
<div class="max-w-6xl mx-auto pb-20">
    <div class="mb-8 flex items-center justify-between animate-in slide-in-from-left duration-500">
        <a href="{{ route('admin.services.index') }}" class="flex items-center gap-2 text-slate-400 hover:text-slate-900 transition-colors group">
            <span class="material-symbols-outlined group-hover:-translate-x-1 transition-transform">arrow_back</span>
            <span class="text-xs font-black uppercase tracking-widest">Kembali ke Daftar</span>
        </a>
    </div>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8 animate-in fade-in duration-700">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white border border-slate-200 rounded-[2rem] p-8 md:p-10 shadow-sm space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2 md:col-span-2">
                            <label for="category" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Kategori Layanan</label>

                            <input type="text" name="category" id="category" required
                                   list="category-list"
                                   value="{{ old('category', $service->category) }}"
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
                                        class="px-3 py-1.5 rounded-full border text-[10px] font-black uppercase tracking-wider transition-all
                                               {{ $service->category === $cat ? 'border-primary bg-primary/5 text-primary' : 'border-slate-200 bg-slate-50 text-slate-500 hover:border-primary hover:text-primary hover:bg-white' }}">
                                    {{ $cat }}
                                </button>
                                @endforeach
                                <span class="px-3 py-1.5 text-[10px] text-slate-400 italic self-center">atau ketik kategori baru</span>
                            </div>
                            @endif
                        </div>

                        <div class="space-y-2">
                            <label for="title_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Judul Layanan (Indonesia)</label>
                            <input type="text" name="title_id" id="title_id" required value="{{ $titleId }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all font-bold outline-none">
                        </div>

                        <div class="space-y-2">
                            <label for="title_en" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Service Title (English)</label>
                            <input type="text" name="title_en" id="title_en" value="{{ $titleEn }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all font-bold outline-none">
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="short_description_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Deskripsi Singkat (Indonesia)</label>
                            <textarea name="short_description_id" id="short_description_id" rows="3" required class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ $shortDescriptionId }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="short_description_en" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Short Description (English)</label>
                            <textarea name="short_description_en" id="short_description_en" rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ $shortDescriptionEn }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="full_description_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Konten Detail (Indonesia)</label>
                            <textarea name="full_description_id" id="full_description_id" rows="9" required class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ $fullDescriptionId }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="full_description_en" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Full Description (English)</label>
                            <textarea name="full_description_en" id="full_description_en" rows="9" class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ $fullDescriptionEn }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="benefits_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Benefit Layanan (satu baris per poin)</label>
                            <textarea name="benefits_id" id="benefits_id" rows="5" class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ $benefitsId }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="steps_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Langkah Pengerjaan (satu baris per poin)</label>
                            <textarea name="steps_id" id="steps_id" rows="5" class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ $stepsId }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="requirements_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Persyaratan Dokumen (satu baris per poin)</label>
                            <textarea name="requirements_id" id="requirements_id" rows="5" class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ $requirementsId }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="faq_items_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">FAQ Layanan (format: Pertanyaan | Jawaban)</label>
                            <textarea name="faq_items_id" id="faq_items_id" rows="6" class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ $faqItemsId }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="meta_title_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Meta Title</label>
                            <input type="text" name="meta_title_id" id="meta_title_id" value="{{ old('meta_title_id', $service->meta_title) }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all font-bold outline-none">
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="meta_description_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Meta Description</label>
                            <textarea name="meta_description_id" id="meta_description_id" rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-[1.5rem] px-6 py-5 text-sm leading-relaxed focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all outline-none resize-none">{{ old('meta_description_id', $service->meta_description) }}</textarea>
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="meta_keywords_id" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Meta Keywords</label>
                            <input type="text" name="meta_keywords_id" id="meta_keywords_id" value="{{ old('meta_keywords_id', $service->meta_keywords) }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all font-bold outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-8">
                <div class="bg-white border border-slate-200 rounded-[2rem] p-8 shadow-sm space-y-6">
                    <label class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Thumbnail & Banner</label>

                    <div class="space-y-3">
                        <div class="rounded-2xl border border-slate-200 overflow-hidden bg-slate-50 aspect-[4/3] flex items-center justify-center">
                            <img id="thumbnailPreview" src="{{ $service->thumbnail_url }}" alt="Preview Thumbnail" class="h-full w-full object-cover">
                        </div>
                        <input type="file" name="thumbnail_image" id="thumbnail_image" accept="image/*" onchange="previewImage(this, 'thumbnailPreview')" class="w-full text-xs text-slate-500 file:mr-4 file:rounded-xl file:border-0 file:bg-primary file:px-4 file:py-2 file:text-white file:font-bold">
                    </div>

                    <div class="space-y-3">
                        <div class="rounded-2xl border border-slate-200 overflow-hidden bg-slate-50 aspect-[16/10] flex items-center justify-center">
                            <img id="bannerPreview" src="{{ $service->banner_url }}" alt="Preview Banner" class="h-full w-full object-cover">
                        </div>
                        <input type="file" name="banner_image" id="banner_image" accept="image/*" onchange="previewImage(this, 'bannerPreview')" class="w-full text-xs text-slate-500 file:mr-4 file:rounded-xl file:border-0 file:bg-slate-900 file:px-4 file:py-2 file:text-white file:font-bold">
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-[2rem] p-8 shadow-sm space-y-6">
                    <label class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Pilih Ikon Layanan</label>
                    <div class="flex items-center justify-center p-8 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-primary border border-slate-100">
                            <span id="iconPreview" class="material-symbols-outlined text-4xl">{{ $service->icon_image ?? 'category' }}</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <input type="text" name="icon_image" id="iconInput" value="{{ old('icon_image', $service->icon_image) }}" readonly class="w-full bg-slate-50 border border-slate-200 rounded-xl px-5 py-3 text-xs font-black text-center uppercase tracking-widest outline-none">
                        <div class="grid grid-cols-4 gap-2">
                            @foreach($icons as $icon)
                                <button type="button" onclick="selectIcon('{{ $icon }}')" class="h-10 rounded-lg border border-slate-100 {{ $service->icon_image == $icon ? 'border-primary text-primary bg-white shadow-md' : 'bg-slate-50/50' }} hover:border-primary hover:text-primary transition-all flex items-center justify-center hover:bg-white hover:shadow-md group">
                                    <span class="material-symbols-outlined text-xl group-hover:scale-110 transition-transform">{{ $icon }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-[2rem] p-8 shadow-sm space-y-4">
                    <label for="sort_order" class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Urutan Tampil</label>
                    <input type="number" name="sort_order" id="sort_order" min="0" value="{{ old('sort_order', $service->sort_order ?? 0) }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all font-bold outline-none">

                    <label class="text-[11px] font-black uppercase tracking-widest text-slate-400 ml-1">Status Publikasi</label>
                    <div class="grid grid-cols-1 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="status" value="active" class="peer hidden" {{ old('status', $service->status) == 'active' ? 'checked' : '' }}>
                            <div class="flex items-center gap-3 px-6 py-4 rounded-xl bg-slate-50 border border-slate-200 peer-checked:bg-primary/5 peer-checked:border-primary peer-checked:text-primary transition-all group">
                                <span class="material-symbols-outlined text-xl">public</span>
                                <span class="text-xs font-black uppercase tracking-widest">Aktif / Publik</span>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="status" value="draft" class="peer hidden" {{ old('status', $service->status) == 'draft' ? 'checked' : '' }}>
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
                <span class="material-symbols-outlined text-xl">save</span>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    function selectIcon(iconName) {
        document.getElementById('iconInput').value = iconName;
        document.getElementById('iconPreview').innerText = iconName;

        document.querySelectorAll('button[onclick^="selectIcon"]').forEach(btn => {
            btn.classList.remove('border-primary', 'text-primary', 'bg-white', 'shadow-md');
            btn.classList.add('bg-slate-50/50');
        });

        event.currentTarget.classList.add('border-primary', 'text-primary', 'bg-white', 'shadow-md');
        event.currentTarget.classList.remove('bg-slate-50/50');
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
