<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Unique image per service (keyed by slug)
        $imgs = [
            'pendirian-pt-lengkap'                                       => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&q=80&w=1600',
            'pendirian-pt-bundling'                                      => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=1600',
            'perubahan-anggaran-dasar'                                   => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80&w=1600',
            'pendirian-cv'                                               => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=80&w=1600',
            'pendirian-cv-bundling'                                      => 'https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&q=80&w=1600',
            'pendirian-yayasan'                                          => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?auto=format&fit=crop&q=80&w=1600',
            'pengurusan-izin-premium'                                    => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80&w=1600',
            'pengukuhan-pengusaha-kena-pajak-pkp'                        => 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?auto=format&fit=crop&q=80&w=1600',
            'paket-perpanjangan-perizinan-yang-telah-habis-masa-berlaku' => 'https://images.unsplash.com/photo-1568992687947-868a62a9f521?auto=format&fit=crop&q=80&w=1600',
            'pendaftaran-merek'                                          => 'https://images.unsplash.com/photo-1493612276216-ee3925520721?auto=format&fit=crop&q=80&w=1600',
            'pengurusan-imb-pbg'                                         => 'https://images.unsplash.com/photo-1486325212027-8081e485255e?auto=format&fit=crop&q=80&w=1600',
            'pengurusan-pertanahan'                                      => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&q=80&w=1600',
            'pengurusan-sertifikat-laik-fungsi-slf'                      => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&q=80&w=1600',
            'jasa-pengurusan-tender'                                     => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=1600',
            'pengurusan-perizinan-pertambangan'                          => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=1600',
            'layanan-litigasi-non-litigasi'                              => 'https://images.unsplash.com/photo-1589994965851-a8f479c573a9?auto=format&fit=crop&q=80&w=1600',
            'pengurusan-perizinan-lingkungan'                            => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&q=80&w=1600',
            'pengurusan-perizinan-oss'                                   => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1600',
            'pengurusan-sertifikasi-halal-bpom'                          => 'https://images.unsplash.com/photo-1576402187878-974f70c890a5?auto=format&fit=crop&q=80&w=1600',
        ];

        $services = [
            [
                'slug' => 'pendirian-pt-lengkap',
                'category' => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'apartment',
                'sort_order' => 1,
                'title' => 'Pendirian PT Lengkap',
                'short' => 'Pendampingan dari konsultasi awal hingga PT siap beroperasi secara legal.',
                'full' => "Pendirian PT lengkap mencakup konsultasi, akta, NIB, NPWP hingga siap beroperasi.",
                'benefits' => ['Akta pendirian', 'SK Kemenkumham', 'NIB OSS', 'NPWP perusahaan'],
                'steps' => ['Konsultasi', 'Verifikasi data', 'Penyusunan dokumen', 'Serah terima'],
                'requirements' => ['KTP pendiri', 'NPWP pendiri', 'Nama PT', 'Alamat usaha'],
                'faq' => [['Berapa lama proses?', 'Bergantung kelengkapan data.'], ['Sudah termasuk NIB?', 'Ya, termasuk NIB dan NPWP.']]
            ],

            [
                'slug' => 'pendirian-pt-bundling',
                'category' => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'workspace_premium',
                'sort_order' => 2,
                'title' => 'Pendirian PT Bundling',
                'short' => 'Paket pendirian PT dengan virtual office bagi pengusaha pemula.',
                'full' => "PT bundling menggabungkan pendirian PT dengan solusi virtual office.",
                'benefits' => ['Akta dan legalitas PT', 'Solusi virtual office', 'Dokumen siap pakai'],
                'steps' => ['Konsultasi', 'Pemilihan domisili', 'Penyusunan akta', 'Serah terima'],
                'requirements' => ['KTP pendiri', 'Nama PT', 'Bidang usaha'],
                'faq' => [['Beda PT bundling dan PT lengkap?', 'Bundling menambahkan domisili/virtual office.']]
            ],

            [
                'slug' => 'perubahan-anggaran-dasar',
                'category' => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'edit_note',
                'sort_order' => 3,
                'title' => 'Perubahan Anggaran Dasar',
                'short' => 'Perubahan domisili, susunan pengurus, dan data perseroan di anggaran dasar.',
                'full' => "Layanan ini membantu perusahaan melakukan perubahan anggaran dasar secara tertib.",
                'benefits' => ['Konsultasi perubahan', 'Penyusunan dokumen', 'Pendampingan notaris'],
                'steps' => ['Review kebutuhan', 'Persiapan data', 'Pembuatan akta', 'Pengesahan'],
                'requirements' => ['Akta terakhir', 'Data perubahan', 'Identitas pihak terkait'],
                'faq' => [['Perlu notaris?', 'Ya, perlu pengesahan notaris.']]
            ],

            [
                'slug' => 'pendirian-cv',
                'category' => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'business',
                'sort_order' => 4,
                'title' => 'Pendirian CV',
                'short' => 'Pendirian CV lengkap dari akta hingga dokumen operasional usaha.',
                'full' => "Pendirian CV lengkap dari konsultasi, akta, NIB, NPWP, hingga dokumen operasional.",
                'benefits' => ['Akta CV', 'NIB', 'NPWP', 'Pendampingan administrasi'],
                'steps' => ['Konsultasi awal', 'Data pendiri', 'Akta notaris', 'Pengajuan NIB'],
                'requirements' => ['KTP pendiri', 'Nama CV', 'Alamat usaha'],
                'faq' => [['CV cocok untuk usaha keluarga?', 'Ya, cocok untuk struktur sederhana.']]
            ],

            [
                'slug' => 'pendirian-cv-bundling',
                'category' => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'hub',
                'sort_order' => 5,
                'title' => 'Pendirian CV Bundling',
                'short' => 'Pendirian CV dengan solusi bundling untuk domisili dan operasional awal.',
                'full' => "CV bundling menggabungkan pendirian CV dengan virtual office dan domisili.",
                'benefits' => ['Akta CV', 'Solusi domisili', 'NIB dan NPWP'],
                'steps' => ['Konsultasi', 'Data sekutu', 'Pembuatan akta', 'Legalitas'],
                'requirements' => ['KTP sekutu', 'Nama CV', 'Bidang usaha'],
                'faq' => [['Ada virtual office?', 'Ya, jika dipilih dalam paket bundling.']]
            ],

            [
                'slug' => 'pendirian-yayasan',
                'category' => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'church',
                'sort_order' => 6,
                'title' => 'Pendirian Yayasan',
                'short' => 'Konsultasi, akta, dan pengurusan legalitas yayasan secara lengkap.',
                'full' => "Pendirian yayasan dari konsultasi, akta, domisili, NPWP hingga tanda daftar.",
                'benefits' => ['Akta yayasan', 'Surat domisili', 'NPWP yayasan', 'Tanda daftar'],
                'steps' => ['Konsultasi', 'Penyusunan dokumen', 'Akta notaris', 'Legalitas'],
                'requirements' => ['Data pendiri/pengurus', 'Nama yayasan', 'Alamat domisili'],
                'faq' => [['Yayasan bisa sosial dan pendidikan?', 'Ya, sesuai ketentuan berlaku.']]
            ],

            [
                'slug' => 'pengurusan-izin-premium',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'verified',
                'sort_order' => 7,
                'title' => 'Pengurusan Izin Premium',
                'short' => 'Paket perizinan premium untuk SIUJK, TDUP, rekomendasi teknis, dan izin khusus.',
                'full' => "Layanan izin premium untuk kebutuhan usaha sektoral yang kompleks.",
                'benefits' => ['Konsultasi izin', 'Monitoring approval', 'Pendampingan regulasi'],
                'steps' => ['Analisis usaha', 'Pemeriksaan syarat', 'Pengajuan', 'Monitoring'],
                'requirements' => ['Data usaha', 'Dokumen legalitas', 'Persyaratan teknis'],
                'faq' => [['Cocok untuk konstruksi dan pariwisata?', 'Ya, disesuaikan per sektor.']]
            ],

            [
                'slug' => 'pengukuhan-pengusaha-kena-pajak-pkp',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'receipt_long',
                'sort_order' => 8,
                'title' => 'Pengukuhan Pengusaha Kena Pajak (PKP)',
                'short' => 'Pengurusan PKP agar perusahaan siap tender dan transaksi bisnis profesional.',
                'full' => "Pengukuhan PKP untuk tender, kerjasama korporasi, dan kepatuhan pajak.",
                'benefits' => ['Penyusunan dokumen', 'Review data', 'Pengajuan ke KPP'],
                'steps' => ['Cek kelayakan', 'Siapkan dokumen', 'Pengajuan', 'Monitoring'],
                'requirements' => ['NIB', 'NPWP perusahaan', 'Dokumen legalitas'],
                'faq' => [['PKP penting untuk tender?', 'Ya, sering menjadi syarat administrasi.']]
            ],

            [
                'slug' => 'paket-perpanjangan-perizinan-yang-telah-habis-masa-berlaku',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'autorenew',
                'sort_order' => 9,
                'title' => 'Paket Perpanjangan Perizinan Yang Telah Habis Masa Berlaku',
                'short' => 'Pemulihan dan perpanjangan izin usaha yang masa berlakunya telah habis.',
                'full' => "Perpanjangan perizinan untuk izin yang habis masa berlaku.",
                'benefits' => ['Cek status izin', 'Konsultasi perpanjangan', 'Monitoring'],
                'steps' => ['Audit izin', 'Cek dokumen', 'Pengajuan', 'Serah terima'],
                'requirements' => ['Dokumen izin lama', 'Data perusahaan terbaru'],
                'faq' => [['Semua izin bisa diperpanjang?', 'Bergantung jenis izin.']]
            ],

            [
                'slug' => 'pendaftaran-merek',
                'category' => 'Sertifikasi & Branding Legal',
                'icon_image' => 'brand_family',
                'sort_order' => 10,
                'title' => 'Pendaftaran Merek',
                'short' => 'Proteksi identitas brand melalui pendaftaran dan pengecekan merek.',
                'full' => "Pendaftaran merek untuk melindungi identitas dan reputasi brand.",
                'benefits' => ['Pengecekan merek', 'Pengajuan merek', 'Monitoring status'],
                'steps' => ['Cek ketersediaan', 'Review kelas', 'Siapkan dokumen', 'Ajukan'],
                'requirements' => ['Nama dan logo merek', 'Identitas pemilik', 'Deskripsi produk'],
                'faq' => [['Perlu cek merek dulu?', 'Ya, untuk mengurangi potensi penolakan.']]
            ],

            [
                'slug' => 'pengurusan-imb-pbg',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'domain',
                'sort_order' => 11,
                'title' => 'Pengurusan IMB / PBG',
                'short' => 'Pengurusan IMB/PBG untuk bangunan usaha, kantor, dan properti operasional.',
                'full' => "Pengurusan IMB/PBG agar bangunan usaha memenuhi ketentuan yang berlaku.",
                'benefits' => ['Review teknis', 'Pengajuan PBG', 'Monitoring izin'],
                'steps' => ['Cek bangunan', 'Siapkan gambar', 'Pengajuan', 'Pemantauan'],
                'requirements' => ['Data bangunan', 'Gambar teknis', 'Dokumen kepemilikan'],
                'faq' => [['IMB masih digunakan?', 'Banyak proses beralih ke PBG.']]
            ],

            [
                'slug' => 'pengurusan-pertanahan',
                'category' => 'Tender & Pertanahan',
                'icon_image' => 'map',
                'sort_order' => 12,
                'title' => 'Pengurusan Pertanahan',
                'short' => 'Konsultasi dan pendampingan dokumen pertanahan, aset, dan legalitas lahan.',
                'full' => "Pengurusan pertanahan mencakup konsultasi sertifikat tanah dan legal review.",
                'benefits' => ['Konsultasi pertanahan', 'Review dokumen aset', 'Legal aset'],
                'steps' => ['Review status tanah', 'Cek dokumen', 'Administrasi', 'Serah terima'],
                'requirements' => ['Dokumen kepemilikan', 'Identitas pemilik', 'Data lokasi'],
                'faq' => [['Bisa untuk aset perusahaan?', 'Ya, termasuk aset korporasi.']]
            ],

            [
                'slug' => 'pengurusan-sertifikat-laik-fungsi-slf',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'fact_check',
                'sort_order' => 13,
                'title' => 'Pengurusan Sertifikat Laik Fungsi (SLF)',
                'short' => 'Pengurusan SLF untuk memastikan bangunan memenuhi persyaratan laik fungsi.',
                'full' => "SLF memastikan bangunan memenuhi standar teknis dan keamanan untuk digunakan.",
                'benefits' => ['Review teknis', 'Pendampingan dokumen', 'Pengurusan SLF'],
                'steps' => ['Cek persyaratan', 'Review teknis', 'Pengajuan', 'Monitoring'],
                'requirements' => ['Data bangunan', 'Gambar teknis', 'Dokumen perizinan'],
                'faq' => [['Kapan SLF dibutuhkan?', 'Saat bangunan akan digunakan secara formal.']]
            ],

            [
                'slug' => 'jasa-pengurusan-tender',
                'category' => 'Tender & Pertanahan',
                'icon_image' => 'gavel',
                'sort_order' => 14,
                'title' => 'Jasa Pengurusan Tender',
                'short' => 'Pendampingan pengurusan dokumen tender, legal review, dan persiapan penawaran.',
                'full' => "Jasa tender membantu menyiapkan dokumen administratif dan legal review.",
                'benefits' => ['Pengurusan dokumen tender', 'Legal review', 'Analisis persyaratan'],
                'steps' => ['Analisis tender', 'Persiapan dokumen', 'Review', 'Serah terima'],
                'requirements' => ['Dokumen legalitas usaha', 'Data proyek', 'Syarat administrasi'],
                'faq' => [['Bisa bantu hitung RAB?', 'Ya, sesuai kebutuhan proyek.']]
            ],

            [
                'slug' => 'pengurusan-perizinan-pertambangan',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'precision_manufacturing',
                'sort_order' => 15,
                'title' => 'Pengurusan Perizinan Pertambangan',
                'short' => 'Pendampingan izin usaha pertambangan, IUP, IPR, dan dokumen pendukung.',
                'full' => "Pengurusan perizinan pertambangan untuk IUP, IPR, IUPK, dan MODI.",
                'benefits' => ['IUP dan izin terkait', 'Pendampingan dokumen', 'Monitoring'],
                'steps' => ['Cek jenis izin', 'Siapkan dokumen', 'Pengajuan', 'Pemantauan'],
                'requirements' => ['Data perusahaan', 'Data lokasi usaha', 'Dokumen teknis'],
                'faq' => [['Membantu MODI juga?', 'Ya, termasuk pembaruan data sistem.']]
            ],

            [
                'slug' => 'layanan-litigasi-non-litigasi',
                'category' => 'Konsultasi Hukum & Litigasi',
                'icon_image' => 'balance',
                'sort_order' => 16,
                'title' => 'Layanan Litigasi & Non Litigasi',
                'short' => 'Pendampingan sengketa, mediasi, dan konsultasi hukum perusahaan.',
                'full' => "Layanan litigasi dan non litigasi untuk konsultasi, mediasi hingga penanganan perkara.",
                'benefits' => ['Konsultasi hukum', 'Mediasi sengketa', 'Pendampingan perkara'],
                'steps' => ['Analisis perkara', 'Strategi', 'Pendampingan', 'Evaluasi'],
                'requirements' => ['Kronologi kasus', 'Dokumen pendukung', 'Data pihak terkait'],
                'faq' => [['Bisa untuk sengketa perusahaan?', 'Ya, termasuk kebutuhan korporasi.']]
            ],

            [
                'slug' => 'pengurusan-perizinan-lingkungan',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'eco',
                'sort_order' => 17,
                'title' => 'Pengurusan Perizinan Lingkungan',
                'short' => 'Pengurusan dokumen lingkungan seperti AMDAL, UKL-UPL, dan SPPL.',
                'full' => "Pengurusan perizinan lingkungan mencakup AMDAL, UKL-UPL, dan SPPL.",
                'benefits' => ['Dokumen lingkungan', 'Konsultasi teknis', 'Pendampingan'],
                'steps' => ['Analisis usaha', 'Cek kewajiban', 'Penyusunan', 'Pengajuan'],
                'requirements' => ['Data usaha', 'Lokasi kegiatan', 'Dokumen teknis'],
                'faq' => [['Beda AMDAL dan UKL-UPL?', 'Bergantung skala dan dampak usaha.']]
            ],

            [
                'slug' => 'pengurusan-perizinan-oss',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'dns',
                'sort_order' => 18,
                'title' => 'Pengurusan Perizinan OSS',
                'short' => 'Pengajuan dan pembaruan perizinan berbasis OSS secara terarah dan profesional.',
                'full' => "Pengurusan perizinan OSS untuk NIB, perizinan berusaha, dan penyesuaian data.",
                'benefits' => ['NIB dan izin usaha', 'Koordinasi OSS', 'Monitoring'],
                'steps' => ['Verifikasi data', 'Siapkan dokumen', 'Pengisian OSS', 'Monitoring'],
                'requirements' => ['Data perusahaan', 'NIK penanggung jawab', 'Dokumen legalitas'],
                'faq' => [['OSS wajib untuk usaha?', 'Ya, pintu utama perizinan berusaha.']]
            ],

            [
                'slug' => 'pengurusan-sertifikasi-halal-bpom',
                'category' => 'Sertifikasi & Branding Legal',
                'icon_image' => 'verified_user',
                'sort_order' => 19,
                'title' => 'Pengurusan Sertifikasi Halal & BPOM',
                'short' => 'Pendampingan sertifikasi halal dan BPOM untuk produk makanan, kosmetik, dan lainnya.',
                'full' => "Sertifikasi halal dan BPOM untuk meningkatkan kepercayaan dan nilai jual produk.",
                'benefits' => ['Audit dokumen', 'Registrasi produk', 'Pendampingan profesional'],
                'steps' => ['Review produk', 'Siapkan dokumen', 'Pengajuan', 'Monitoring'],
                'requirements' => ['Data produk', 'Komposisi', 'Dokumen usaha'],
                'faq' => [['Cocok untuk UMKM?', 'Ya, sangat relevan untuk UMKM.']]
            ],
        ];

        foreach ($services as $s) {
            $img = $imgs[$s['slug']] ?? 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&q=80&w=1600';
            $t = fn($v) => json_encode(['id' => $v], JSON_UNESCAPED_UNICODE);
            $faqEnc = json_encode(['id' => array_map(fn($f) => ['question' => $f[0], 'answer' => $f[1]], $s['faq'])], JSON_UNESCAPED_UNICODE);

            Service::updateOrCreate(['slug' => $s['slug']], [
                'slug'              => $s['slug'],
                'category'          => $s['category'],
                'icon_image'        => $s['icon_image'],
                'thumbnail_image'   => $img,
                'banner_image'      => $img,
                'title'             => $t($s['title']),
                'short_description' => $t($s['short']),
                'full_description'  => $t($s['full']),
                'benefits'          => json_encode(['id' => $s['benefits']], JSON_UNESCAPED_UNICODE),
                'steps'             => json_encode(['id' => $s['steps']], JSON_UNESCAPED_UNICODE),
                'requirements'      => json_encode(['id' => $s['requirements']], JSON_UNESCAPED_UNICODE),
                'faq_items'         => $faqEnc,
                'meta_title'        => $s['title'] . ' - AKA Consulting',
                'meta_description'  => $s['short'],
                'meta_keywords'     => strtolower($s['title']),
                'status'            => 'active',
                'sort_order'        => $s['sort_order'],
            ]);
        }
    }
}

