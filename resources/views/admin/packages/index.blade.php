@extends('layouts.admin')

@section('title', 'Manajemen Paket - AKA Consulting CMS')
@section('page_title', 'Manajemen Paket & Harga')
@section('page_subtitle', 'Kelola paket layanan dan harga untuk ditampilkan di halaman utama.')

@section('content')
<div class="bg-white rounded-2xl border border-outline-variant/30 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-outline-variant/30 flex justify-between items-center">
        <h2 class="text-lg font-bold text-on-surface">Daftar Paket</h2>
        <a href="{{ route('admin.packages.create') }}" class="btn-primary flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span>
            Tambah Paket
        </a>
    </div>

    @if(session('success'))
    <div class="m-6 p-4 bg-green-50 text-green-700 rounded-xl border border-green-200 text-sm font-semibold flex items-center gap-3">
        <span class="material-symbols-outlined">check_circle</span>
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="text-xs text-on-surface-variant uppercase bg-slate-50/50 border-b border-outline-variant/30">
                <tr>
                    <th class="px-6 py-4 font-bold">Urutan</th>
                    <th class="px-6 py-4 font-bold">Nama Paket</th>
                    <th class="px-6 py-4 font-bold">Kategori</th>
                    <th class="px-6 py-4 font-bold">Harga</th>
                    <th class="px-6 py-4 font-bold text-center">Status</th>
                    <th class="px-6 py-4 font-bold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant/30">
                @forelse($packages as $package)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-semibold text-slate-500">{{ $package->sort_order }}</td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-on-surface flex items-center gap-2">
                            {{ $package->name }}
                            @if($package->is_popular)
                            <span class="bg-amber-100 text-amber-700 text-[10px] px-2 py-0.5 rounded-full uppercase tracking-tighter">Populer</span>
                            @endif
                        </p>
                    </td>
                    <td class="px-6 py-4 text-slate-600">{{ $package->category ?? '-' }}</td>
                    <td class="px-6 py-4 font-semibold text-primary">{{ $package->price }}</td>
                    <td class="px-6 py-4 text-center">
                        @if($package->status === 'active')
                            <span class="bg-emerald-100 text-emerald-700 text-xs px-2.5 py-1 rounded-full font-semibold">Aktif</span>
                        @else
                            <span class="bg-slate-100 text-slate-600 text-xs px-2.5 py-1 rounded-full font-semibold">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.packages.edit', $package) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </a>
                            <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus paket ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-slate-400">
                        <span class="material-symbols-outlined text-4xl block mb-2 opacity-50">inventory_2</span>
                        <p>Belum ada paket yang ditambahkan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
