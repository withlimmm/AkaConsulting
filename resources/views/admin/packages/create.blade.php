@extends('layouts.admin')

@section('title', 'Tambah Paket - AKA Consulting CMS')
@section('page_title', 'Tambah Paket')
@section('page_subtitle', 'Tambahkan paket layanan dan harga baru.')

@section('content')
<div class="bg-white rounded-2xl border border-outline-variant/30 shadow-sm p-6">
    <form action="{{ route('admin.packages.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-on-surface mb-2">Nama Paket *</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full rounded-xl border border-outline-variant/50 px-4 py-2.5 focus:border-primary focus:ring-2 focus:ring-primary/20">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-on-surface mb-2">Kategori (Tab) *</label>
                <input type="text" name="category" value="{{ old('category') }}" placeholder="Contoh: Pendirian Badan Usaha" required
                    class="w-full rounded-xl border border-outline-variant/50 px-4 py-2.5 focus:border-primary focus:ring-2 focus:ring-primary/20">
                @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-on-surface mb-2">Harga *</label>
                <input type="text" name="price" value="{{ old('price') }}" placeholder="Contoh: Rp 1.500.000 / Bulan" required
                    class="w-full rounded-xl border border-outline-variant/50 px-4 py-2.5 focus:border-primary focus:ring-2 focus:ring-primary/20">
                @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-on-surface mb-2">Urutan (Sort Order)</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
                    class="w-full rounded-xl border border-outline-variant/50 px-4 py-2.5 focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-on-surface mb-2">Deskripsi Singkat</label>
            <textarea name="description" rows="2"
                class="w-full rounded-xl border border-outline-variant/50 px-4 py-2.5 focus:border-primary focus:ring-2 focus:ring-primary/20">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-on-surface mb-2">Daftar Fitur (Satu baris per fitur)</label>
            <textarea name="features" rows="5" placeholder="Fitur 1&#10;Fitur 2&#10;Fitur 3"
                class="w-full rounded-xl border border-outline-variant/50 px-4 py-2.5 focus:border-primary focus:ring-2 focus:ring-primary/20">{{ old('features') }}</textarea>
            <p class="text-xs text-slate-500 mt-1">Pisahkan setiap fitur dengan baris baru (Enter).</p>
            @error('features') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-6">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}
                    class="rounded border-outline-variant/50 text-amber-500 focus:ring-amber-500 w-5 h-5">
                <span class="text-sm font-bold text-on-surface">Tandai sebagai Populer (Highlight)</span>
            </label>

            <div class="flex items-center gap-3 ml-auto">
                <label class="text-sm font-bold text-on-surface">Status:</label>
                <select name="status" class="rounded-xl border border-outline-variant/50 px-4 py-2 focus:border-primary focus:ring-2 focus:ring-primary/20">
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
        </div>

        <div class="pt-6 border-t border-outline-variant/30 flex justify-end gap-3">
            <a href="{{ route('admin.packages.index') }}" class="px-6 py-2.5 rounded-xl font-bold text-slate-600 hover:bg-slate-100 transition-colors">Batal</a>
            <button type="submit" class="btn-primary px-8">Simpan Paket</button>
        </div>
    </form>
</div>
@endsection
