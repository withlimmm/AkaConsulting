@extends('layouts.main')

@section('title', __('Syarat & Ketentuan - AKA Consulting'))

@section('content')
<div class="pt-32 pb-20 bg-[#f7f2e8] min-h-[70vh]">
    <div class="content-container max-w-4xl mx-auto bg-white p-8 md:p-14 rounded-[2rem] shadow-sm border border-[#eadfcb]">
        <h1 class="text-3xl md:text-5xl font-black text-on-surface mb-8">{{ __('Syarat & Ketentuan') }}</h1>
        
        <div class="prose prose-slate max-w-none prose-headings:text-on-surface prose-a:text-[#8d6408]">
            <p><strong>Berlaku Efektif:</strong> {{ date('d F Y') }}</p>
            
            <p>Selamat datang di AKA Consulting. Dengan mengakses situs web ini, Anda setuju untuk terikat oleh Syarat dan Ketentuan Penggunaan ini, semua hukum dan peraturan yang berlaku, dan setuju bahwa Anda bertanggung jawab atas kepatuhan terhadap hukum setempat yang berlaku.</p>

            <h3>1. Layanan Konsultasi</h3>
            <p>Informasi yang disediakan di situs web ini bersifat umum dan tidak merupakan nasihat hukum formal sebelum adanya perikatan resmi (kontrak) antara klien dan AKA Consulting. Konsultasi awal gratis yang kami sediakan melalui form bertujuan untuk identifikasi masalah dasar.</p>

            <h3>2. Hak Kekayaan Intelektual</h3>
            <p>Seluruh konten yang terdapat di situs web ini, termasuk namun tidak terbatas pada teks, grafik, logo, dan gambar adalah milik AKA Consulting dan dilindungi oleh undang-undang hak cipta dan merek dagang yang berlaku.</p>

            <h3>3. Penyangkalan (Disclaimer)</h3>
            <p>Materi pada situs web AKA Consulting disediakan "sebagaimana adanya". Kami tidak memberikan jaminan, tersurat maupun tersirat, mengenai keakuratan, kemungkinan hasil, atau keandalan penggunaan materi di situs web kami.</p>

            <h3>4. Batasan Tanggung Jawab</h3>
            <p>Dalam keadaan apa pun AKA Consulting tidak bertanggung jawab atas kerusakan apa pun (termasuk hilangnya data atau keuntungan, atau karena gangguan bisnis) yang timbul dari penggunaan atau ketidakmampuan untuk menggunakan materi di situs web ini.</p>
        </div>
    </div>
</div>
@endsection
