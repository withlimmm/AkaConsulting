@extends('layouts.main')

@section('title', __('500 - Terjadi Kesalahan Server'))

@section('content')
<div class="min-h-screen bg-[#f7f2e8] flex items-center justify-center pt-20">
    <div class="content-container text-center px-4">
        <div class="inline-block relative">
            <h1 class="text-[120px] md:text-[180px] font-black text-red-900/10 leading-none select-none">500</h1>
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="material-symbols-outlined text-[60px] md:text-[80px] text-red-700">warning</span>
            </div>
        </div>
        
        <h2 class="text-3xl md:text-4xl font-black text-on-surface mt-6 mb-4">{{ __('Terjadi Kesalahan Server') }}</h2>
        <p class="text-base text-on-surface-variant max-w-lg mx-auto mb-10 leading-relaxed">
            {{ __('Sistem kami sedang mengalami kendala teknis. Tim kami telah diberitahu dan sedang berusaha memperbaiki masalah ini.') }}
        </p>
        
        <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-[#8d6408] text-[#8d6408] px-8 py-4 font-black transition-all hover:bg-[#8d6408] hover:text-white">
            <span class="material-symbols-outlined text-[18px]">refresh</span>
            {{ __('Coba Muat Ulang') }}
        </a>
    </div>
</div>
@endsection
