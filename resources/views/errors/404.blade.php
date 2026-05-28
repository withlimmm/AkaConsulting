@extends('layouts.main')

@section('title', __('404 - Halaman Tidak Ditemukan'))

@section('content')
<div class="min-h-screen bg-[#f7f2e8] flex items-center justify-center pt-20">
    <div class="content-container text-center px-4">
        <div class="inline-block relative">
            <h1 class="text-[120px] md:text-[180px] font-black text-[#8d6408]/10 leading-none select-none">404</h1>
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="material-symbols-outlined text-[60px] md:text-[80px] text-[#8d6408]">search_off</span>
            </div>
        </div>
        
        <h2 class="text-3xl md:text-4xl font-black text-on-surface mt-6 mb-4">{{ __('Halaman Tidak Ditemukan') }}</h2>
        <p class="text-base text-on-surface-variant max-w-lg mx-auto mb-10 leading-relaxed">
            {{ __('Maaf, halaman yang Anda cari mungkin telah dihapus, namanya diubah, atau sementara tidak tersedia.') }}
        </p>
        
        <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#8d6408] px-8 py-4 font-black text-white shadow-xl transition-all hover:-translate-y-1 hover:bg-[#6f4d05]">
            <span class="material-symbols-outlined text-[18px]">home</span>
            {{ __('Kembali ke Beranda') }}
        </a>
    </div>
</div>
@endsection
