@extends('layouts.main')

@section('title', __('Kebijakan Privasi - AKA Consulting'))

@section('content')
<div class="pt-32 pb-20 bg-[#f7f2e8] min-h-[70vh]">
    <div class="content-container max-w-4xl mx-auto bg-white p-8 md:p-14 rounded-[2rem] shadow-sm border border-[#eadfcb]">
        <h1 class="text-3xl md:text-5xl font-black text-on-surface mb-8">{{ __('Kebijakan Privasi') }}</h1>
        
        <div class="prose prose-slate max-w-none prose-headings:text-on-surface prose-a:text-[#8d6408]">
            <p><strong>Pembaruan Terakhir:</strong> {{ date('d F Y') }}</p>
            
            <p>AKA Consulting ("kami", "milik kami", atau "kita") mengoperasikan situs web ini. Halaman ini memberi tahu Anda tentang kebijakan kami terkait pengumpulan, penggunaan, dan pengungkapan data pribadi saat Anda menggunakan Layanan kami.</p>

            <h3>1. Pengumpulan Data Informasi</h3>
            <p>Kami mengumpulkan beberapa jenis informasi berbeda untuk berbagai tujuan guna menyediakan dan meningkatkan Layanan kami kepada Anda, termasuk:</p>
            <ul>
                <li>Nama Lengkap</li>
                <li>Alamat Email</li>
                <li>Nomor Telepon / WhatsApp</li>
                <li>Detail Perusahaan (Opsional)</li>
            </ul>

            <h3>2. Penggunaan Data</h3>
            <p>AKA Consulting menggunakan data yang terkumpul untuk berbagai tujuan:</p>
            <ul>
                <li>Menyediakan dan memelihara Layanan</li>
                <li>Memberi tahu Anda tentang perubahan pada Layanan kami</li>
                <li>Memberikan dukungan dan layanan konsultasi pelanggan</li>
                <li>Memantau penggunaan Layanan untuk pengembangan sistem</li>
            </ul>

            <h3>3. Kerahasiaan Data (Client Privilege)</h3>
            <p>Sebagai firma konsultan hukum dan bisnis, kami terikat pada kode etik kerahasiaan. Seluruh informasi dan diskusi awal yang Anda sampaikan melalui form situs kami dienkripsi dan tidak akan dibagikan kepada pihak ketiga tanpa persetujuan tertulis dari Anda.</p>

            <h3>4. Hubungi Kami</h3>
            <p>Jika Anda memiliki pertanyaan tentang Kebijakan Privasi ini, silakan hubungi kami melalui halaman kontak atau email resmi kami.</p>
        </div>
    </div>
</div>
@endsection
