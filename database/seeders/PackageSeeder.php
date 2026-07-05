<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Paket Basic (PT Perorangan)',
                'category' => 'Pendirian Badan Usaha',
                'price' => 'Mulai Rp 1.500.000',
                'description' => 'Solusi legalitas awal untuk UMKM dan perorangan.',
                'features' => ['Pendirian PT Perorangan', 'NIB', 'NPWP Badan', 'Konsultasi Dasar'],
                'is_popular' => false,
                'sort_order' => 1,
            ],
            [
                'name' => 'Paket Pro (PT Umum)',
                'category' => 'Pendirian Badan Usaha',
                'price' => 'Mulai Rp 4.500.000',
                'description' => 'Paket lengkap pendirian perusahaan skala kecil hingga menengah.',
                'features' => ['Akta Notaris', 'SK Kemenkumham', 'NIB', 'NPWP Badan', 'Pembuatan Rekening Bank', 'Konsultasi Legal 1 Bulan'],
                'is_popular' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Paket Enterprise (PMA)',
                'category' => 'Pendirian Badan Usaha',
                'price' => 'Hubungi Kami',
                'description' => 'Pendampingan penuh untuk perusahaan asing dan korporasi besar.',
                'features' => ['Setup Full PMA', 'KITAS', 'Izin Operasional Khusus', 'Pendampingan Hukum Tahunan'],
                'is_popular' => false,
                'sort_order' => 3,
            ],
            [
                'name' => 'Basic Review',
                'category' => 'Layanan Kepatuhan',
                'price' => 'Rp 500.000 / Dok',
                'description' => 'Review dokumen legal kontrak bisnis.',
                'features' => ['Review 1 Dokumen Kontrak', 'Revisi 1x', 'Konsultasi via Zoom'],
                'is_popular' => false,
                'sort_order' => 4,
            ],
            [
                'name' => 'Retainer Bulanan',
                'category' => 'Layanan Kepatuhan',
                'price' => 'Mulai Rp 3.000.000 / Bln',
                'description' => 'Jasa konsultan hukum in-house untuk perusahaan Anda.',
                'features' => ['Konsultasi Hukum Unlimited', 'Drafting 5 Kontrak/Bulan', 'Pendampingan RUPS/Rapat Eksternal'],
                'is_popular' => true,
                'sort_order' => 5,
            ]
        ];

        foreach ($packages as $package) {
            \App\Models\Package::create($package);
        }
    }
}
