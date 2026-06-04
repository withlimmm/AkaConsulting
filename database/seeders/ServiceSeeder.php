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
            // ============================================================
            // 1. PENDIRIAN PT LENGKAP
            // ============================================================
            [
                'slug'      => 'pendirian-pt-lengkap',
                'category'  => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'apartment',
                'sort_order' => 1,
                'title' => ['id' => 'Pendirian PT Lengkap', 'en' => 'Complete PT Establishment'],
                'short' => [
                    'id' => 'Pendampingan pendirian PT mulai dari konsultasi, pengecekan nama, akta pendirian, hingga perizinan usaha (NIB, NPWP, SIUP, BPJS Tenaga Kerja) siap beroperasi secara legal.',
                    'en' => 'Full PT establishment assistance from consultation, name checking, deed of establishment, to business licensing (NIB, NPWP, SIUP, BPJS) ready to operate legally.',
                ],
                'full' => [
                    'id' => 'Pendirian PT lengkap yang dimaksud adalah pendirian PT mulai dari memberikan konsultasi, pengecekan nama PT yang akan didirikan, menyusun draft akta pendirian PT, menghadap Notaris, mengurus perizinan usaha (NIB, Izin Lokasi, NPWP, SIUP, Komitmen Prasarana Usaha, BPJS Tenaga Kerja).',
                    'en' => 'Complete PT establishment covers consultation, company name verification, drafting the deed of establishment, meeting with a Notary, and processing business licenses including NIB, Location Permit, NPWP, SIUP, Business Infrastructure Commitment, and BPJS Manpower.',
                ],
                'benefits' => [
                    'id' => ['Akta pendirian PT', 'SK Kemenkumham', 'NIB OSS', 'NPWP perusahaan', 'SIUP & Izin Lokasi', 'BPJS Tenaga Kerja'],
                    'en' => ['Deed of establishment', 'Ministry of Law and Human Rights Decree', 'NIB OSS', 'Company NPWP', 'SIUP & Location Permit', 'BPJS Manpower'],
                ],
                'steps' => [
                    'id' => ['Konsultasi awal', 'Pengecekan nama PT', 'Penyusunan draft akta', 'Penandatanganan akta di Notaris', 'Pengurusan perizinan usaha', 'Serah terima dokumen'],
                    'en' => ['Initial consultation', 'Company name verification', 'Draft deed preparation', 'Deed signing at Notary', 'Business permit processing', 'Document handover'],
                ],
                'requirements' => [
                    'id' => ['KTP para pendiri & pengurus', 'NPWP para pendiri', 'Nama PT yang diusulkan', 'Alamat & domisili usaha', 'Bidang usaha (KBLI)'],
                    'en' => ['Founders & directors ID Cards', 'Founders NPWP', 'Proposed company name', 'Business address & domicile', 'Line of business (KBLI)'],
                ],
                'faq' => [
                    'id' => [
                        ['Berapa lama proses pendirian PT?', 'Bergantung kelengkapan dokumen, umumnya 7–14 hari kerja.'],
                        ['Apakah sudah termasuk NIB dan NPWP?', 'Ya, layanan ini sudah mencakup pengurusan NIB OSS dan NPWP perusahaan.'],
                        ['Minimal berapa orang untuk mendirikan PT?', 'PT membutuhkan minimal 2 (dua) orang pendiri.'],
                    ],
                    'en' => [
                        ['How long does the PT establishment process take?', 'Depending on document completeness, generally 7–14 working days.'],
                        ['Does it include NIB and NPWP?', 'Yes, this service covers NIB OSS and company NPWP processing.'],
                        ['What is the minimum number of founders for a PT?', 'A PT requires a minimum of 2 (two) founders.'],
                    ],
                ],
            ],

            // ============================================================
            // 2. PENDIRIAN PT BUNDLING
            // ============================================================
            [
                'slug'      => 'pendirian-pt-bundling',
                'category'  => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'workspace_premium',
                'sort_order' => 2,
                'title' => ['id' => 'Pendirian PT Bundling', 'en' => 'Bundling PT Establishment'],
                'short' => [
                    'id' => 'Paket pendirian PT lengkap dengan nilai tambah berupa domisili Virtual Office untuk pengusaha pemula yang belum memiliki kantor.',
                    'en' => 'Complete PT establishment package with added value of Virtual Office domicile for new entrepreneurs without an office.',
                ],
                'full' => [
                    'id' => 'Varian PT Bundling yang dimaksud sama seperti layanan pendirian PT lengkap namun, nilai tambah yang diberikan adalah memberikan paket tambahan berupa domisili Virtual Office bagi Pengusaha Pemula yang belum memiliki domisili kantor.',
                    'en' => 'The PT Bundling variant is the same as the complete PT establishment service, but with an added bonus of a Virtual Office domicile package for startup entrepreneurs who do not yet have an office domicile.',
                ],
                'benefits' => [
                    'id' => ['Akta dan legalitas PT', 'Domisili Virtual Office', 'NIB OSS', 'NPWP perusahaan', 'Dokumen siap pakai'],
                    'en' => ['PT deed and legality', 'Virtual Office domicile', 'NIB OSS', 'Company NPWP', 'Ready-to-use documents'],
                ],
                'steps' => [
                    'id' => ['Konsultasi awal', 'Pemilihan paket Virtual Office', 'Penyusunan akta', 'Pengurusan perizinan', 'Serah terima'],
                    'en' => ['Initial consultation', 'Virtual Office package selection', 'Deed preparation', 'Permit processing', 'Handover'],
                ],
                'requirements' => [
                    'id' => ['KTP para pendiri', 'NPWP pendiri', 'Nama PT', 'Bidang usaha (KBLI)'],
                    'en' => ['Founders ID Cards', 'Founders NPWP', 'Company Name', 'Line of Business (KBLI)'],
                ],
                'faq' => [
                    'id' => [
                        ['Apa perbedaan PT Bundling dan PT Lengkap?', 'PT Bundling menambahkan layanan domisili Virtual Office sehingga cocok bagi pengusaha yang belum punya alamat kantor.'],
                        ['Virtual Office-nya di mana?', 'Lokasi Virtual Office tersedia di area strategis sesuai kebutuhan usaha Anda.'],
                    ],
                    'en' => [
                        ['What is the difference between Bundling PT and Complete PT?', 'PT Bundling adds a Virtual Office domicile service, ideal for entrepreneurs without a physical office address.'],
                        ['Where is the Virtual Office located?', 'Virtual Office locations are available in strategic areas according to your business needs.'],
                    ],
                ],
            ],

            // ============================================================
            // 3. PERUBAHAN ANGGARAN DASAR
            // ============================================================
            [
                'slug'      => 'perubahan-anggaran-dasar',
                'category'  => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'edit_note',
                'sort_order' => 3,
                'title' => ['id' => 'Perubahan Anggaran Dasar', 'en' => 'Articles of Association Amendment'],
                'short' => [
                    'id' => 'Alternatif legalitas bagi pengusaha yang ingin melegalkan perubahan domisili, susunan pemegang saham, Direksi & Komisaris, atau maksud dan tujuan perusahaan.',
                    'en' => 'Legal alternative for entrepreneurs wishing to formalize changes in domicile, shareholder structure, Board of Directors & Commissioners, or company objectives.',
                ],
                'full' => [
                    'id' => 'Perubahan Anggaran Dasar merupakan alternatif yang valuable bagi pengusaha yang ingin melegalkan setiap pernyataan Pemegang Saham terkait perubahan yang akan dilakukan. Misalkan perubahan domisili, susunan pemegang saham, susunan Direksi dan Komisaris, dan bahkan sampai perubahan maksud dan tujuan PT yang tercatat pada Anggaran Dasar atau Akta Pendirian.',
                    'en' => 'Articles of Association Amendment is a valuable alternative for entrepreneurs who want to legalize every statement of the Shareholders regarding changes to be made, such as changes in domicile, shareholder structure, Board of Directors and Commissioners, and even changes in the PT\'s objectives as recorded in the Articles of Association or Deed of Establishment.',
                ],
                'benefits' => [
                    'id' => ['Konsultasi perubahan', 'Penyusunan akta perubahan', 'Pendampingan notaris', 'Pengesahan Kemenkumham'],
                    'en' => ['Amendment consultation', 'Amendment deed preparation', 'Notary assistance', 'Ministry of Law ratification'],
                ],
                'steps' => [
                    'id' => ['Review kebutuhan perubahan', 'Persiapan data & dokumen', 'Pembuatan akta perubahan', 'Pengesahan & pendaftaran'],
                    'en' => ['Amendment needs review', 'Data & document preparation', 'Amendment deed creation', 'Ratification & registration'],
                ],
                'requirements' => [
                    'id' => ['Akta terakhir & SK Kemenkumham', 'Data perubahan yang dimaksud', 'Identitas pemegang saham & pengurus'],
                    'en' => ['Latest deed & Ministry of Law Decree', 'Details of the intended changes', 'Shareholder & board identity'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah perlu lewat notaris?', 'Ya, perubahan anggaran dasar wajib disahkan melalui notaris.'],
                        ['Apa saja yang bisa diubah?', 'Domisili, nama PT, susunan direksi/komisaris, pemegang saham, modal, hingga maksud dan tujuan perusahaan.'],
                    ],
                    'en' => [
                        ['Is a notary required?', 'Yes, articles of association amendments must be ratified through a notary.'],
                        ['What can be changed?', 'Domicile, company name, board of directors/commissioners, shareholders, capital, and company objectives.'],
                    ],
                ],
            ],

            // ============================================================
            // 4. PENDIRIAN CV
            // ============================================================
            [
                'slug'      => 'pendirian-cv',
                'category'  => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'business',
                'sort_order' => 4,
                'title' => ['id' => 'Pendirian CV', 'en' => 'CV Establishment'],
                'short' => [
                    'id' => 'Pendirian CV lengkap dari konsultasi, penyusunan akta, pengurusan perizinan usaha (NIB, NPWP-SKT, SIUP & NIB) hingga dokumen operasional siap.',
                    'en' => 'Complete CV establishment from consultation, deed drafting, business permit processing (NIB, NPWP-SKT, SIUP & NIB) to operational documents ready.',
                ],
                'full' => [
                    'id' => 'Pendirian CV lengkap yang dimaksud adalah pendirian CV mulai dari memberikan konsultasi, menyusun draft akta pendirian CV, menghadap Notaris, mengurus perizinan usaha (NIB, NPWP-SKT, SIUP & NIB).',
                    'en' => 'Complete CV establishment covers consultation, drafting the CV deed of establishment, meeting with a Notary, and processing business licenses including NIB, NPWP-SKT, SIUP & NIB.',
                ],
                'benefits' => [
                    'id' => ['Akta pendirian CV', 'NIB & SIUP', 'NPWP-SKT perusahaan', 'Pendampingan administrasi'],
                    'en' => ['CV Deed of Establishment', 'NIB & SIUP', 'Company NPWP-SKT', 'Administrative assistance'],
                ],
                'steps' => [
                    'id' => ['Konsultasi awal', 'Pengumpulan data pendiri', 'Penyusunan & penandatanganan akta', 'Pengajuan NIB & perizinan'],
                    'en' => ['Initial consultation', 'Founder data collection', 'Deed preparation & signing', 'NIB & permit submission'],
                ],
                'requirements' => [
                    'id' => ['KTP sekutu aktif & sekutu pasif', 'NPWP pendiri', 'Nama CV', 'Alamat usaha', 'Bidang usaha (KBLI)'],
                    'en' => ['Active & passive partner ID Cards', 'Founders NPWP', 'CV Name', 'Business address', 'Line of business (KBLI)'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah CV cocok untuk usaha keluarga?', 'Ya, CV sangat cocok untuk struktur usaha keluarga atau usaha skala kecil-menengah.'],
                        ['Apa perbedaan CV dan PT?', 'CV tidak berbadan hukum dan modalnya tidak terbagi atas saham, sementara PT berbadan hukum dengan saham.'],
                    ],
                    'en' => [
                        ['Is CV suitable for family businesses?', 'Yes, CV is very suitable for family business structures or small-medium scale businesses.'],
                        ['What is the difference between CV and PT?', 'CV is not a legal entity and its capital is not divided into shares, while PT is a legal entity with shares.'],
                    ],
                ],
            ],

            // ============================================================
            // 5. PENDIRIAN CV BUNDLING
            // ============================================================
            [
                'slug'      => 'pendirian-cv-bundling',
                'category'  => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'hub',
                'sort_order' => 5,
                'title' => ['id' => 'Pendirian CV Bundling', 'en' => 'Bundling CV Establishment'],
                'short' => [
                    'id' => 'Paket pendirian CV lengkap dengan nilai tambah berupa domisili Virtual Office bagi pengusaha pemula yang belum memiliki domisili kantor.',
                    'en' => 'Complete CV establishment package with added value of Virtual Office domicile for startup entrepreneurs without a physical office.',
                ],
                'full' => [
                    'id' => 'Varian CV Bundling yang dimaksud sama seperti layanan pendirian CV lengkap namun, nilai tambah yang diberikan adalah memberikan paket tambahan berupa domisili Virtual Office bagi Pengusaha Pemula yang belum memiliki domisili kantor.',
                    'en' => 'The CV Bundling variant is the same as the complete CV establishment service, but with an added bonus of a Virtual Office domicile package for startup entrepreneurs who do not yet have an office domicile.',
                ],
                'benefits' => [
                    'id' => ['Akta pendirian CV', 'Domisili Virtual Office', 'NIB & SIUP', 'NPWP perusahaan'],
                    'en' => ['CV Deed of Establishment', 'Virtual Office domicile', 'NIB & SIUP', 'Company NPWP'],
                ],
                'steps' => [
                    'id' => ['Konsultasi', 'Pemilihan paket Virtual Office', 'Data sekutu', 'Pembuatan akta', 'Pengurusan legalitas'],
                    'en' => ['Consultation', 'Virtual Office package selection', 'Partner data', 'Deed creation', 'Legality processing'],
                ],
                'requirements' => [
                    'id' => ['KTP para sekutu', 'NPWP pendiri', 'Nama CV', 'Bidang usaha'],
                    'en' => ['Partners ID Cards', 'Founders NPWP', 'CV Name', 'Line of Business'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah ada layanan Virtual Office?', 'Ya, paket bundling sudah termasuk domisili Virtual Office di lokasi strategis.'],
                        ['Apakah CV Bundling cocok untuk pemula?', 'Ya, sangat cocok bagi pengusaha baru yang belum memiliki alamat kantor fisik.'],
                    ],
                    'en' => [
                        ['Is there a Virtual Office service?', 'Yes, the bundling package already includes a Virtual Office domicile at a strategic location.'],
                        ['Is CV Bundling suitable for beginners?', 'Yes, it is very suitable for new entrepreneurs who do not yet have a physical office address.'],
                    ],
                ],
            ],

            // ============================================================
            // 6. PENDIRIAN YAYASAN
            // ============================================================
            [
                'slug'      => 'pendirian-yayasan',
                'category'  => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'church',
                'sort_order' => 6,
                'title' => ['id' => 'Pendirian Yayasan', 'en' => 'Foundation Establishment'],
                'short' => [
                    'id' => 'Pendirian yayasan mulai dari konsultasi, pembuatan akta, pengurusan Surat Domisili, NPWP Yayasan, hingga Tanda Daftar Yayasan.',
                    'en' => 'Foundation establishment from consultation, deed creation, Domicile Letter, Foundation NPWP, to Foundation Registration Certificate.',
                ],
                'full' => [
                    'id' => 'Pendirian Yayasan dimaksud mulai dari konsultasi, pembuatan akta, pengurusan Surat Domisili Yayasan, NPWP Yayasan, sampai dengan Tanda Daftar Yayasan.',
                    'en' => 'Foundation establishment covers consultation, deed creation, processing of the Foundation Domicile Letter, Foundation NPWP, through to the Foundation Registration Certificate.',
                ],
                'benefits' => [
                    'id' => ['Akta yayasan', 'Surat Domisili Yayasan', 'NPWP yayasan', 'Tanda Daftar Yayasan'],
                    'en' => ['Foundation deed', 'Foundation Domicile Letter', 'Foundation NPWP', 'Foundation Registration Certificate'],
                ],
                'steps' => [
                    'id' => ['Konsultasi tujuan yayasan', 'Penyusunan draft akta', 'Akta di hadapan notaris', 'Pengurusan domisili & NPWP', 'Tanda daftar yayasan'],
                    'en' => ['Foundation purpose consultation', 'Deed draft preparation', 'Deed before notary', 'Domicile & NPWP processing', 'Foundation registration certificate'],
                ],
                'requirements' => [
                    'id' => ['Data pendiri & pengurus yayasan', 'Nama yayasan', 'Alamat domisili', 'Maksud & tujuan yayasan'],
                    'en' => ['Founder & board data', 'Foundation name', 'Domicile address', 'Foundation objectives'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah yayasan bisa bergerak di bidang sosial dan pendidikan?', 'Ya, yayasan dapat bergerak di berbagai bidang seperti sosial, keagamaan, dan pendidikan sesuai ketentuan yang berlaku.'],
                        ['Apakah yayasan bisa menjalankan usaha?', 'Yayasan dapat melakukan kegiatan usaha tertentu, sepanjang seluruh hasilnya digunakan untuk mendukung tujuan yayasan.'],
                    ],
                    'en' => [
                        ['Can foundations operate in social and educational fields?', 'Yes, foundations can operate in various fields such as social, religious, and education according to applicable regulations.'],
                        ['Can a foundation run a business?', 'A foundation can conduct certain business activities, as long as all proceeds are used to support the foundation\'s objectives.'],
                    ],
                ],
            ],

            // ============================================================
            // 7. PENGURUSAN IZIN PREMIUM
            // ============================================================
            [
                'slug'      => 'pengurusan-izin-premium',
                'category'  => 'Perizinan & Legal Compliance',
                'icon_image' => 'verified',
                'sort_order' => 7,
                'title' => ['id' => 'Pengurusan Izin Premium', 'en' => 'Premium Permit Processing'],
                'short' => [
                    'id' => 'Pengurusan izin sektoral khusus: SIUJK, TDUP, Rekomendasi Teknis Dirjen Perkebunan, SKT Minerba, API, NIK, KITAS & KITAB (RPTKA & IMTA).',
                    'en' => 'Special sectoral permit processing: SIUJK, TDUP, Plantation Directorate General Technical Recommendations, SKT Minerba, API, NIK, KITAS & KITAB (RPTKA & IMTA).',
                ],
                'full' => [
                    'id' => 'Jasa Konstruksi (SIUJK), Tanda Daftar Usaha Pariwisata (TDUP) bagi Travel, Event Organizer, Resto, Catering, Rekomendasi Teknis Dirjen Perkebunan, SKT Minerba, Angka Pengenal Importir (API), Nomor Induk Kepabeanan (NIK), KITAS dan KITAB (RPTKA & IMTA) dan lain-lain.',
                    'en' => 'Construction Services (SIUJK), Tourism Business Registration Certificate (TDUP) for Travel, Event Organizers, Restaurants, Catering, Technical Recommendations from the Director General of Plantations, SKT Minerba, Importer Identification Number (API), Customs Identification Number (NIK), KITAS and KITAB (RPTKA & IMTA), and others.',
                ],
                'benefits' => [
                    'id' => ['Konsultasi jenis izin', 'Pemeriksaan persyaratan teknis', 'Pengajuan & monitoring', 'Pendampingan regulasi sektoral'],
                    'en' => ['Permit type consultation', 'Technical requirements check', 'Submission & monitoring', 'Sectoral regulatory assistance'],
                ],
                'steps' => [
                    'id' => ['Analisis jenis usaha', 'Pemeriksaan syarat izin', 'Penyusunan dokumen', 'Pengajuan & monitoring'],
                    'en' => ['Business type analysis', 'Permit requirement check', 'Document preparation', 'Submission & monitoring'],
                ],
                'requirements' => [
                    'id' => ['Data perusahaan & legalitas', 'Dokumen teknis sesuai jenis izin', 'Persyaratan sektoral yang berlaku'],
                    'en' => ['Company & legality data', 'Technical documents per permit type', 'Applicable sectoral requirements'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah melayani SIUJK untuk kontraktor?', 'Ya, termasuk SIUJK untuk jasa konstruksi umum maupun spesialis.'],
                        ['Apakah TDUP bisa untuk usaha restoran dan katering?', 'Ya, kami melayani TDUP untuk travel, event organizer, restoran, katering, dan lainnya.'],
                    ],
                    'en' => [
                        ['Do you serve SIUJK for contractors?', 'Yes, including SIUJK for general and specialist construction services.'],
                        ['Can TDUP be applied for restaurant and catering businesses?', 'Yes, we serve TDUP for travel, event organizers, restaurants, catering, and others.'],
                    ],
                ],
            ],

            // ============================================================
            // 8. PENGUKUHAN PENGUSAHA KENA PAJAK (PKP)
            // ============================================================
            [
                'slug'      => 'pengukuhan-pengusaha-kena-pajak-pkp',
                'category'  => 'Perizinan & Legal Compliance',
                'icon_image' => 'receipt_long',
                'sort_order' => 8,
                'title' => ['id' => 'Pengukuhan Pengusaha Kena Pajak (PKP)', 'en' => 'Taxable Entrepreneur Confirmation (PKP)'],
                'short' => [
                    'id' => 'Pengurusan PKP untuk memudahkan pengusaha mengikuti tender/proyek pemerintah, mencakup penyusunan dokumen, review, pengisian formulir, dan pendampingan ke KPP.',
                    'en' => 'PKP processing to facilitate entrepreneurs participating in government tenders/projects, covering document preparation, review, form filling, and assistance to the Tax Office.',
                ],
                'full' => [
                    'id' => 'Pengurusan PKP sangat memudahkan bagi Pengusaha yang ingin mengikuti tender/proyek dari Instansi Pemerintah. Ruang lingkup yang diberikan mulai dari menyusun dokumen, melakukan review, mengisi form, serta menghadap Kantor Pelayanan Pajak setempat.',
                    'en' => 'PKP (Taxable Entrepreneur) confirmation greatly facilitates entrepreneurs who want to participate in tenders/projects from Government Agencies. The scope of services includes document preparation, review, form filling, and attending the local Tax Service Office.',
                ],
                'benefits' => [
                    'id' => ['Penyusunan dokumen PKP', 'Review kelengkapan data', 'Pengisian formulir', 'Pendampingan ke KPP'],
                    'en' => ['PKP document preparation', 'Data completeness review', 'Form filling', 'Tax Office attendance assistance'],
                ],
                'steps' => [
                    'id' => ['Cek kelayakan PKP', 'Siapkan dokumen persyaratan', 'Pengajuan ke KPP', 'Monitoring & serah terima'],
                    'en' => ['PKP eligibility check', 'Prepare required documents', 'Submission to Tax Office', 'Monitoring & handover'],
                ],
                'requirements' => [
                    'id' => ['NIB aktif', 'NPWP perusahaan', 'Dokumen legalitas badan usaha', 'Omset usaha (minimal Rp 4,8 M/tahun)'],
                    'en' => ['Active NIB', 'Company NPWP', 'Business entity legality documents', 'Business turnover (minimum Rp 4.8 B/year)'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah PKP penting untuk mengikuti tender pemerintah?', 'Ya, PKP sering menjadi syarat administrasi wajib dalam tender dan proyek pemerintah.'],
                        ['Apakah semua pengusaha bisa mengajukan PKP?', 'PKP diperuntukkan bagi pengusaha dengan omset minimal Rp 4,8 miliar per tahun, namun dapat juga dikukuhkan secara sukarela.'],
                    ],
                    'en' => [
                        ['Is PKP important for participating in government tenders?', 'Yes, PKP is often a mandatory administrative requirement in government tenders and projects.'],
                        ['Can all entrepreneurs apply for PKP?', 'PKP is intended for entrepreneurs with a minimum turnover of Rp 4.8 billion per year, but can also be confirmed voluntarily.'],
                    ],
                ],
            ],

            // ============================================================
            // 9. PAKET PERPANJANGAN PERIZINAN
            // ============================================================
            [
                'slug'      => 'paket-perpanjangan-perizinan-yang-telah-habis-masa-berlaku',
                'category'  => 'Perizinan & Legal Compliance',
                'icon_image' => 'autorenew',
                'sort_order' => 9,
                'title' => ['id' => 'Paket Perpanjangan Perizinan Yang Telah Habis Masa Berlaku', 'en' => 'Expired Permit Renewal Package'],
                'short' => [
                    'id' => 'Perpanjangan izin usaha yang habis masa berlaku: SKA, SBU, SIUJK, TDUP, API, NIK, KITAS, KITAB, dan berbagai izin sektoral lainnya.',
                    'en' => 'Renewal of expired business permits: SKA, SBU, SIUJK, TDUP, API, NIK, KITAS, KITAB, and various other sectoral licenses.',
                ],
                'full' => [
                    'id' => 'Pengurusan Izin Premium dimaksud seperti Sertifikasi Keahlian (SKA), Sertifikasi Badan Usaha (SBU), Surat Izin Usaha Jasa Konstruksi (SIUJK), Tanda Daftar Usaha Pariwisata (TDUP) bagi Travel, Event Organizer, Resto, Catering, Rekomendasi Teknis Dirjen Perkebunan, SKT Minerba, Angka Pengenal Importir (API), Nomor Induk Kepabeanan (NIK), KITAS dan KITAB (RPTKA & IMTA) dan lain-lain.',
                    'en' => 'Premium permit processing covers Professional Competency Certificates (SKA), Business Entity Certification (SBU), Construction Services Business License (SIUJK), Tourism Business Registration Certificate (TDUP) for Travel, Event Organizers, Restaurants, Catering, Technical Recommendations from the Director General of Plantations, SKT Minerba, Importer Identification Number (API), Customs Identification Number (NIK), KITAS and KITAB (RPTKA & IMTA), and others.',
                ],
                'benefits' => [
                    'id' => ['Audit status perizinan', 'Konsultasi perpanjangan', 'Penyusunan dokumen', 'Monitoring pengajuan'],
                    'en' => ['Permit status audit', 'Renewal consultation', 'Document preparation', 'Submission monitoring'],
                ],
                'steps' => [
                    'id' => ['Audit izin yang kadaluarsa', 'Cek dokumen terbaru', 'Pengajuan perpanjangan', 'Monitoring & serah terima'],
                    'en' => ['Expired permit audit', 'Latest document check', 'Renewal submission', 'Monitoring & handover'],
                ],
                'requirements' => [
                    'id' => ['Dokumen izin lama yang kadaluarsa', 'Data perusahaan terbaru', 'Dokumen pendukung sesuai jenis izin'],
                    'en' => ['Expired old permit documents', 'Latest company data', 'Supporting documents per permit type'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah semua jenis izin bisa diperpanjang?', 'Bergantung jenis izin dan ketentuan yang berlaku, kami akan menganalisis dan memberikan solusi terbaik.'],
                        ['Berapa lama proses perpanjangan?', 'Bervariasi tergantung jenis izin dan instansi yang berwenang.'],
                    ],
                    'en' => [
                        ['Can all types of permits be renewed?', 'Depending on the permit type and applicable regulations, we will analyze and provide the best solution.'],
                        ['How long does the renewal process take?', 'It varies depending on the permit type and the authorized agency.'],
                    ],
                ],
            ],

            // ============================================================
            // 10. PENDAFTARAN MEREK
            // ============================================================
            [
                'slug'      => 'pendaftaran-merek',
                'category'  => 'Sertifikasi & Branding Legal',
                'icon_image' => 'brand_family',
                'sort_order' => 10,
                'title' => ['id' => 'Pendaftaran Merek', 'en' => 'Trademark Registration'],
                'short' => [
                    'id' => 'Layanan eksklusif pendaftaran merek dagang setara Konsultan HKI, mencakup penelusuran merek dan pendaftaran resmi untuk melindungi identitas brand Anda.',
                    'en' => 'Exclusive trademark registration service equivalent to an Intellectual Property Consultant, covering trademark research and official registration to protect your brand identity.',
                ],
                'full' => [
                    'id' => 'Kami memberikan layanan eksklusif setara dengan Konsultan HKI yang biasanya memberikan biaya mahal. Layanan yang diberikan bukan hanya pendaftaran atas Merek Dagang, namun juga melakukan penelusuran atas merek yang akan didaftarkan.',
                    'en' => 'We provide an exclusive service equivalent to an Intellectual Property (HKI) Consultant that usually charges high fees. The service provided is not only registration of Trademarks, but also conducting research on the trademark to be registered.',
                ],
                'benefits' => [
                    'id' => ['Penelusuran merek (trademark search)', 'Konsultasi kelas merek', 'Pengajuan pendaftaran merek', 'Monitoring status permohonan'],
                    'en' => ['Trademark search', 'Trademark class consultation', 'Trademark registration submission', 'Application status monitoring'],
                ],
                'steps' => [
                    'id' => ['Cek ketersediaan merek', 'Review kelas merek yang tepat', 'Siapkan dokumen pendaftaran', 'Ajukan ke Dirjen KI', 'Monitoring & terima sertifikat'],
                    'en' => ['Trademark availability check', 'Appropriate trademark class review', 'Prepare registration documents', 'Submit to Directorate General of IP', 'Monitoring & certificate receipt'],
                ],
                'requirements' => [
                    'id' => ['Nama dan logo/gambar merek', 'Identitas pemilik merek', 'Deskripsi produk/jasa yang dilindungi'],
                    'en' => ['Trademark name and logo/image', 'Trademark owner identity', 'Description of protected products/services'],
                ],
                'faq' => [
                    'id' => [
                        ['Mengapa perlu penelusuran merek terlebih dahulu?', 'Penelusuran merek dilakukan untuk mengurangi potensi penolakan karena persamaan dengan merek yang sudah terdaftar.'],
                        ['Berapa lama proses pendaftaran merek?', 'Proses pendaftaran merek umumnya memakan waktu 12–24 bulan untuk mendapatkan sertifikat.'],
                    ],
                    'en' => [
                        ['Why is a trademark search needed first?', 'A trademark search is conducted to reduce the potential for rejection due to similarity with already registered trademarks.'],
                        ['How long does the trademark registration process take?', 'The trademark registration process generally takes 12–24 months to obtain a certificate.'],
                    ],
                ],
            ],

            // ============================================================
            // 11. PENGURUSAN IMB / PBG
            // ============================================================
            [
                'slug'      => 'pengurusan-imb-pbg',
                'category'  => 'Perizinan & Legal Compliance',
                'icon_image' => 'domain',
                'sort_order' => 11,
                'title' => ['id' => 'Pengurusan IMB / PBG', 'en' => 'IMB / PBG Processing'],
                'short' => [
                    'id' => 'Pengurusan Izin Mendirikan Bangunan (IMB) atau Persetujuan Bangunan Gedung (PBG) untuk membangun baru, mengubah, memperluas, mengurangi, atau merawat bangunan.',
                    'en' => 'Processing Building Construction Permits (IMB) or Building Approval (PBG) for new construction, modification, expansion, reduction, or maintenance of buildings.',
                ],
                'full' => [
                    'id' => 'Pengurusan Izin Mendirikan Bangunan (IMB) atau Persetujuan Bangunan Gedung (PBG) dimaksud perizinan yang diberikan kepada pemilik Bangunan Gedung untuk membangun baru, mengubah, memperluas, mengurangi, dan/atau merawat bangunan gedung sesuai dengan standar teknis bangunan gedung. Izin PBG ini untuk menggantikan Izin Mendirikan Bangunan (IMB).',
                    'en' => 'IMB/PBG processing covers permits granted to building owners to construct new buildings, alter, expand, reduce, and/or maintain buildings in accordance with the technical standards of buildings. The PBG permit replaces the Building Construction Permit (IMB).',
                ],
                'benefits' => [
                    'id' => ['Review persyaratan teknis', 'Persiapan gambar & dokumen', 'Pengajuan PBG ke Dinas', 'Monitoring persetujuan'],
                    'en' => ['Technical requirements review', 'Drawing & document preparation', 'PBG submission to Agency', 'Approval monitoring'],
                ],
                'steps' => [
                    'id' => ['Cek kondisi bangunan', 'Siapkan gambar teknis', 'Penyusunan dokumen', 'Pengajuan IMB/PBG', 'Monitoring & serah terima'],
                    'en' => ['Building condition check', 'Prepare technical drawings', 'Document preparation', 'IMB/PBG submission', 'Monitoring & handover'],
                ],
                'requirements' => [
                    'id' => ['Data & spesifikasi bangunan', 'Gambar arsitektur dan teknis', 'Dokumen kepemilikan tanah/bangunan'],
                    'en' => ['Building data & specifications', 'Architectural and technical drawings', 'Land/building ownership documents'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah IMB masih berlaku atau sudah diganti PBG?', 'Saat ini banyak proses telah beralih ke PBG (Persetujuan Bangunan Gedung) sebagai pengganti IMB.'],
                        ['Apakah renovasi bangunan juga perlu IMB/PBG?', 'Ya, perubahan atau renovasi bangunan juga memerlukan izin PBG.'],
                    ],
                    'en' => [
                        ['Is IMB still valid or has it been replaced by PBG?', 'Currently, many processes have shifted to PBG (Building Approval) as a replacement for IMB.'],
                        ['Does building renovation also require IMB/PBG?', 'Yes, building changes or renovations also require a PBG permit.'],
                    ],
                ],
            ],

            // ============================================================
            // 12. PENGURUSAN PERTANAHAN
            // ============================================================
            [
                'slug'      => 'pengurusan-pertanahan',
                'category'  => 'Tender & Pertanahan',
                'icon_image' => 'map',
                'sort_order' => 12,
                'title' => ['id' => 'Pengurusan Pertanahan', 'en' => 'Land Administration'],
                'short' => [
                    'id' => 'Jasa pengurusan pertanahan profesional meliputi AJB, APHB, APHT, SKMHT, PPJB, HGB, peningkatan/penurunan hak, permohonan sertifikat pertama kali, hingga pertimbangan teknis.',
                    'en' => 'Professional land administration services covering AJB, APHB, APHT, SKMHT, PPJB, HGB, rights upgrade/downgrade, first certificate application, to technical considerations.',
                ],
                'full' => [
                    'id' => 'Kami menyediakan jasa pengurusan pertanahan secara profesional dan sesuai dengan ketentuan peraturan perundang-undangan yang berlaku, meliputi pengurusan Akta Jual Beli (AJB), Akta Pembagian Hak Bersama (APHB), Akta Pemberian Hak Tanggungan (APHT), Surat Kuasa Membebankan Hak Tanggungan (SKMHT), Perjanjian Pengikatan Jual Beli (PPJB), perpanjangan dan pemberian Hak Guna Bangunan (HGB), peningkatan hak, penurunan hak, permohonan sertifikat tanah pertama kali, hingga pengurusan pertimbangan teknis pertanahan. Kami membantu setiap proses mulai dari pemeriksaan dokumen, pengecekan sertifikat, pengurusan administrasi, pendampingan hukum, hingga penyelesaian proses pada instansi terkait secara cepat, tepat, dan transparan guna memberikan kepastian hukum serta kemudahan bagi perorangan maupun badan hukum dalam pengurusan hak atas tanah dan bangunan.',
                    'en' => 'We provide professional land administration services in accordance with applicable laws and regulations, covering the processing of Sale and Purchase Deeds (AJB), Joint Rights Distribution Deeds (APHB), Mortgage Grant Deeds (APHT), Power of Attorney to Impose Mortgage (SKMHT), Sale and Purchase Binding Agreements (PPJB), extension and granting of Building Use Rights (HGB), rights upgrade, rights downgrade, first-time land certificate applications, and technical land considerations. We assist in every process from document inspection, certificate verification, administrative processing, legal assistance, to completion at relevant agencies quickly, accurately, and transparently to provide legal certainty and convenience for both individuals and legal entities in the management of land and building rights.',
                ],
                'benefits' => [
                    'id' => ['Pengurusan AJB & PPJB', 'Pendampingan APHT & SKMHT', 'Permohonan sertifikat tanah', 'Peningkatan & penurunan hak', 'Perpanjangan HGB'],
                    'en' => ['AJB & PPJB processing', 'APHT & SKMHT assistance', 'Land certificate application', 'Rights upgrade & downgrade', 'HGB extension'],
                ],
                'steps' => [
                    'id' => ['Review status & dokumen tanah', 'Pengecekan sertifikat', 'Pengurusan administrasi', 'Pendampingan hukum', 'Penyelesaian di instansi terkait'],
                    'en' => ['Land status & document review', 'Certificate verification', 'Administrative processing', 'Legal assistance', 'Completion at relevant agencies'],
                ],
                'requirements' => [
                    'id' => ['Dokumen kepemilikan tanah/bangunan', 'Identitas pemilik (KTP & NPWP)', 'Data lokasi & luas tanah', 'Sertifikat tanah (jika ada)'],
                    'en' => ['Land/building ownership documents', 'Owner identity (ID Card & NPWP)', 'Location data & land area', 'Land certificate (if any)'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah bisa mengurus aset pertanahan untuk perusahaan?', 'Ya, kami melayani pengurusan pertanahan untuk perorangan maupun badan hukum/perusahaan.'],
                        ['Berapa lama proses penerbitan sertifikat tanah pertama kali?', 'Tergantung lokasi dan kondisi tanah, namun umumnya memakan waktu beberapa bulan.'],
                    ],
                    'en' => [
                        ['Can you handle land assets for companies?', 'Yes, we serve land administration for both individuals and legal entities/companies.'],
                        ['How long does the first-time land certificate issuance process take?', 'It depends on the location and condition of the land, but generally takes several months.'],
                    ],
                ],
            ],

            // ============================================================
            // 13. PENGURUSAN SERTIFIKAT LAIK FUNGSI (SLF)
            // ============================================================
            [
                'slug'      => 'pengurusan-sertifikat-laik-fungsi-slf',
                'category'  => 'Perizinan & Legal Compliance',
                'icon_image' => 'fact_check',
                'sort_order' => 13,
                'title' => ['id' => 'Pengurusan Sertifikat Laik Fungsi (SLF)', 'en' => 'Certificate of Feasibility (SLF) Processing'],
                'short' => [
                    'id' => 'Pengurusan SLF untuk bangunan gedung yang telah selesai dibangun dan memenuhi persyaratan kelaikan teknis, termasuk perencanaan arsitektur, struktur, MEP, dan SBUJPTL.',
                    'en' => 'SLF processing for completed buildings that meet technical feasibility requirements, including architectural, structural, MEP planning, and SBUJPTL.',
                ],
                'full' => [
                    'id' => 'Pengurusan Sertifikat Laik Fungsi (SLF) yang dimaksud merupakan layanan sertifikat terhadap bangunan gedung yang telah selesai dibangun dan telah memenuhi persyaratan kelaikan teknis sesuai fungsi bangunan. Layanan ini juga mencakup perencanaan arsitektur, struktur, dan MEP (Mekanikal, Elektrikal, Plumbing) secara terintegrasi, pengurusan SBUJPTL (Sertifikat Badan Usaha Jasa Penunjang Tenaga Listrik), serta Sertifikat Laik Sehat untuk hotel dan restoran.',
                    'en' => 'SLF (Certificate of Feasibility) processing covers certification for buildings that have been completed and have met technical feasibility requirements according to the building\'s function. The service also includes integrated architectural, structural, and MEP (Mechanical, Electrical, Plumbing) planning, SBUJPTL (Electricity Support Services Business Entity Certificate) processing, and Health Feasibility Certificates for hotels and restaurants.',
                ],
                'benefits' => [
                    'id' => ['Pengurusan SLF bangunan', 'Perencanaan arsitektur, struktur & MEP', 'Pengurusan SBUJPTL', 'Sertifikat Laik Sehat hotel/restoran'],
                    'en' => ['Building SLF processing', 'Architectural, structural & MEP planning', 'SBUJPTL processing', 'Health Feasibility Certificate for hotels/restaurants'],
                ],
                'steps' => [
                    'id' => ['Cek persyaratan teknis bangunan', 'Review arsitektur, struktur & MEP', 'Penyusunan dokumen SLF', 'Pengajuan & monitoring', 'Serah terima sertifikat'],
                    'en' => ['Building technical requirements check', 'Architectural, structural & MEP review', 'SLF document preparation', 'Submission & monitoring', 'Certificate handover'],
                ],
                'requirements' => [
                    'id' => ['Data & gambar teknis bangunan', 'Dokumen perizinan bangunan (PBG)', 'Laporan hasil pengawasan konstruksi'],
                    'en' => ['Building data & technical drawings', 'Building permit documents (PBG)', 'Construction supervision report'],
                ],
                'faq' => [
                    'id' => [
                        ['Kapan SLF dibutuhkan?', 'SLF dibutuhkan saat bangunan gedung telah selesai dibangun dan akan digunakan secara formal/operasional.'],
                        ['Apakah hotel dan restoran memerlukan SLF?', 'Ya, selain SLF bangunan, hotel dan restoran juga memerlukan Sertifikat Laik Sehat dari Dinas Kesehatan.'],
                    ],
                    'en' => [
                        ['When is SLF needed?', 'SLF is needed when a building has been completed and will be formally/operationally used.'],
                        ['Do hotels and restaurants need SLF?', 'Yes, in addition to the building SLF, hotels and restaurants also require a Health Feasibility Certificate from the Health Department.'],
                    ],
                ],
            ],

            // ============================================================
            // 14. JASA PENGURUSAN TENDER
            // ============================================================
            [
                'slug'      => 'jasa-pengurusan-tender',
                'category'  => 'Tender & Pertanahan',
                'icon_image' => 'gavel',
                'sort_order' => 14,
                'title' => ['id' => 'Jasa Pengurusan Tender', 'en' => 'Tender Management Services'],
                'short' => [
                    'id' => 'Pendampingan profesional penyusunan dokumen tender, analisis persyaratan, dokumen teknis dan harga, serta pembuatan penawaran dan perhitungan RAB.',
                    'en' => 'Professional assistance in tender document preparation, requirements analysis, technical and pricing documents, as well as bid preparation and RAB calculation.',
                ],
                'full' => [
                    'id' => 'Konsultan pembuatan dokumen tender adalah penyedia layanan profesional yang membantu perusahaan dalam mempersiapkan dan menyusun seluruh dokumen yang diperlukan untuk mengikuti proses tender, baik dari sisi pemilik proyek maupun kontraktor. Jasa yang ditawarkan mencakup analisis persyaratan, penyusunan dokumen teknis dan harga, serta bimbingan dalam proses lelang, yang dapat meningkatkan peluang kemenangan tender. Kami juga melayani pembuatan dokumen penawaran dan perhitungan RAB (Rencana Anggaran Biaya) untuk seluruh wilayah Indonesia.',
                    'en' => 'Tender document preparation consultants are professional service providers who assist companies in preparing and compiling all documents required to participate in the tender process, both from the project owner\'s and contractor\'s perspective. Services offered include requirements analysis, technical and pricing document preparation, and guidance in the bidding process, which can increase the chances of winning tenders. We also serve the preparation of bid documents and RAB (Budget Cost Plan) calculations for all regions of Indonesia.',
                ],
                'benefits' => [
                    'id' => ['Analisis persyaratan tender', 'Penyusunan dokumen teknis', 'Penyusunan dokumen harga/RAB', 'Bimbingan proses lelang'],
                    'en' => ['Tender requirements analysis', 'Technical document preparation', 'Pricing/RAB document preparation', 'Bidding process guidance'],
                ],
                'steps' => [
                    'id' => ['Analisis dokumen tender', 'Persiapan dokumen administrasi', 'Penyusunan dokumen teknis & harga', 'Review & finalisasi', 'Serah terima dokumen'],
                    'en' => ['Tender document analysis', 'Administrative document preparation', 'Technical & pricing document preparation', 'Review & finalization', 'Document handover'],
                ],
                'requirements' => [
                    'id' => ['Dokumen legalitas usaha (aktif)', 'Dokumen tender/lelang dari panitia', 'Data teknis proyek', 'Harga satuan upah & bahan (untuk RAB)'],
                    'en' => ['Active business legality documents', 'Tender/auction documents from committee', 'Project technical data', 'Unit prices for labor & materials (for RAB)'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah bisa membantu menghitung RAB?', 'Ya, kami melayani perhitungan RAB sesuai kebutuhan proyek di seluruh wilayah Indonesia.'],
                        ['Apakah layanan tender untuk pemerintah dan swasta?', 'Ya, kami melayani tender dari instansi pemerintah maupun swasta.'],
                    ],
                    'en' => [
                        ['Can you help calculate RAB?', 'Yes, we provide RAB calculation services according to project needs throughout Indonesia.'],
                        ['Does the tender service cover both government and private sectors?', 'Yes, we serve tenders from both government agencies and private companies.'],
                    ],
                ],
            ],

            // ============================================================
            // 15. PENGURUSAN PERIZINAN PERTAMBANGAN
            // ============================================================
            [
                'slug'      => 'pengurusan-perizinan-pertambangan',
                'category'  => 'Perizinan & Legal Compliance',
                'icon_image' => 'precision_manufacturing',
                'sort_order' => 15,
                'title' => ['id' => 'Pengurusan Perizinan Pertambangan', 'en' => 'Mining Licensing Processing'],
                'short' => [
                    'id' => 'Konsultan pengurusan Izin Usaha Pertambangan (IUP), IPR, IUPK, dan pengurusan MODI (Minerba One Data Indonesia) untuk kepatuhan regulasi pertambangan.',
                    'en' => 'Consulting for Mining Business License (IUP), IPR, IUPK processing, and MODI (Minerba One Data Indonesia) management for mining regulatory compliance.',
                ],
                'full' => [
                    'id' => 'Jasa konsultan pengurusan Izin Usaha Pertambangan (IUP). IUP adalah izin yang diberikan oleh pemerintah untuk melaksanakan kegiatan pertambangan, dengan tiga jenis utama: Izin Usaha Pertambangan (IUP) untuk mineral atau batubara, Izin Pertambangan Rakyat (IPR) untuk skala yang lebih kecil dan terbatas, dan Izin Usaha Pertambangan Khusus (IUPK). IUP diberikan oleh Menteri kepada badan usaha, koperasi, atau perusahaan perseorangan setelah memenuhi persyaratan administratif, teknis, lingkungan, dan finansial. Kami juga melayani pengurusan MODI (Minerba One Data Indonesia) yaitu proses pendaftaran dan pengelolaan data perusahaan mineral dan batubara pada sistem aplikasi Kementerian ESDM.',
                    'en' => 'Mining Business License (IUP) consulting services. IUP is a permit granted by the government to carry out mining activities, with three main types: Mining Business License (IUP) for minerals or coal, People\'s Mining Permit (IPR) for smaller and limited scale, and Special Mining Business License (IUPK). IUP is granted by the Minister to business entities, cooperatives, or individual companies after meeting administrative, technical, environmental, and financial requirements. We also serve MODI (Minerba One Data Indonesia) management, which is the process of registering and managing mineral and coal company data in the Ministry of Energy and Mineral Resources application system.',
                ],
                'benefits' => [
                    'id' => ['Pengurusan IUP, IPR, IUPK', 'Pendampingan dokumen persyaratan', 'Pengurusan MODI', 'Monitoring & pembaruan data'],
                    'en' => ['IUP, IPR, IUPK processing', 'Requirements document assistance', 'MODI processing', 'Monitoring & data updates'],
                ],
                'steps' => [
                    'id' => ['Identifikasi jenis izin yang dibutuhkan', 'Siapkan dokumen persyaratan', 'Pengajuan ke instansi berwenang', 'Pengurusan MODI', 'Monitoring & serah terima'],
                    'en' => ['Identify required permit type', 'Prepare required documents', 'Submit to authorized agency', 'MODI processing', 'Monitoring & handover'],
                ],
                'requirements' => [
                    'id' => ['Data perusahaan & legalitas', 'Data lokasi wilayah pertambangan', 'Dokumen teknis & lingkungan', 'Data finansial perusahaan'],
                    'en' => ['Company & legality data', 'Mining area location data', 'Technical & environmental documents', 'Company financial data'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah juga membantu pengurusan MODI?', 'Ya, kami melayani pengurusan MODI termasuk pendaftaran akun, pengisian data, perizinan, hingga pembaruan data direksi dan pemegang saham.'],
                        ['Apa perbedaan IUP dan IPR?', 'IUP untuk badan usaha/perusahaan skala besar, sedangkan IPR untuk pertambangan rakyat skala lebih kecil dan terbatas.'],
                    ],
                    'en' => [
                        ['Do you also help with MODI processing?', 'Yes, we serve MODI processing including account registration, data filling, licensing, to updates of director and shareholder data.'],
                        ['What is the difference between IUP and IPR?', 'IUP is for large-scale business entities/companies, while IPR is for smaller and limited scale people\'s mining.'],
                    ],
                ],
            ],

            // ============================================================
            // 16. LAYANAN LITIGASI & NON LITIGASI
            // ============================================================
            [
                'slug'      => 'layanan-litigasi-non-litigasi',
                'category'  => 'Konsultasi Hukum & Litigasi',
                'icon_image' => 'balance',
                'sort_order' => 16,
                'title' => ['id' => 'Layanan Litigasi & Non Litigasi', 'en' => 'Litigation & Non-Litigation Services'],
                'short' => [
                    'id' => 'Pendampingan hukum mencakup litigasi (sengketa di pengadilan) dan non-litigasi (konsultasi, legal drafting, negosiasi, mediasi, arbitrase, pengurusan perizinan).',
                    'en' => 'Legal assistance covering litigation (court disputes) and non-litigation (consultation, legal drafting, negotiation, mediation, arbitration, permit processing).',
                ],
                'full' => [
                    'id' => 'Jasa pendampingan hukum yang baik mencakup dua jenis layanan utama: litigasi (penyelesaian sengketa di pengadilan) dan non-litigasi (penyelesaian sengketa di luar pengadilan). Jasa non-litigasi meliputi konsultasi hukum, legal drafting, negosiasi, mediasi, arbitrase, serta pengurusan perizinan, sementara jasa litigasi berfokus pada representasi di pengadilan untuk sengketa perdata, pidana, atau tata usaha negara.',
                    'en' => 'Good legal assistance services cover two main types of services: litigation (dispute resolution in court) and non-litigation (dispute resolution outside of court). Non-litigation services include legal consultation, legal drafting, negotiation, mediation, arbitration, and permit processing, while litigation services focus on court representation for civil, criminal, or administrative disputes.',
                ],
                'benefits' => [
                    'id' => ['Konsultasi hukum', 'Legal drafting', 'Negosiasi & mediasi', 'Arbitrase', 'Pendampingan perkara pengadilan'],
                    'en' => ['Legal consultation', 'Legal drafting', 'Negotiation & mediation', 'Arbitration', 'Court case assistance'],
                ],
                'steps' => [
                    'id' => ['Analisis perkara & strategi', 'Persiapan dokumen & bukti', 'Negosiasi/mediasi (non-litigasi)', 'Representasi pengadilan (litigasi)', 'Evaluasi & penutupan perkara'],
                    'en' => ['Case analysis & strategy', 'Document & evidence preparation', 'Negotiation/mediation (non-litigation)', 'Court representation (litigation)', 'Case evaluation & closure'],
                ],
                'requirements' => [
                    'id' => ['Kronologi lengkap sengketa', 'Dokumen pendukung kasus', 'Identitas para pihak yang bersengketa'],
                    'en' => ['Complete dispute chronology', 'Case supporting documents', 'Identity of the disputing parties'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah bisa mediasi online?', 'Ya, kami mendukung proses mediasi secara online maupun tatap muka.'],
                        ['Apa itu legal drafting?', 'Legal drafting adalah penyusunan dokumen hukum seperti perjanjian, kontrak, MOU, dan dokumen hukum lainnya.'],
                    ],
                    'en' => [
                        ['Is online mediation possible?', 'Yes, we support both online and in-person mediation processes.'],
                        ['What is legal drafting?', 'Legal drafting is the preparation of legal documents such as agreements, contracts, MOUs, and other legal documents.'],
                    ],
                ],
            ],

            // ============================================================
            // 17. PENGURUSAN PERIZINAN LINGKUNGAN
            // ============================================================
            [
                'slug'      => 'pengurusan-perizinan-lingkungan',
                'category'  => 'Perizinan & Legal Compliance',
                'icon_image' => 'eco',
                'sort_order' => 17,
                'title' => ['id' => 'Pengurusan Perizinan Lingkungan', 'en' => 'Environmental Licensing Processing'],
                'short' => [
                    'id' => 'Pengurusan perizinan lingkungan mencakup dokumen Andalalin, SPPL, UKL-UPL, dan AMDAL sesuai skala dan dampak kegiatan usaha.',
                    'en' => 'Environmental licensing processing covers Andalalin documents, SPPL, UKL-UPL, and AMDAL according to the scale and impact of business activities.',
                ],
                'full' => [
                    'id' => 'Layanan pengurusan perizinan lingkungan kami mencakup: (1) Dokumen Andalalin (Analisis Dampak Lalu Lintas) yang wajib disusun untuk rencana pembangunan yang berdampak pada lalu lintas; (2) SPPL, UKL-UPL, dan AMDAL sebagai dokumen lingkungan wajib sebelum menjalankan usaha — AMDAL untuk kegiatan berdampak penting, UKL-UPL untuk kegiatan berdampak sedang, dan SPPL untuk kegiatan berdampak kecil; serta (3) Laporan implementasi UKL-UPL dan AMDAL yang disusun secara periodik (minimal 6 bulan sekali) sebagai bukti kepatuhan perusahaan terhadap peraturan lingkungan.',
                    'en' => 'Our environmental licensing services cover: (1) Andalalin Documents (Traffic Impact Analysis) which must be prepared for development plans that impact traffic; (2) SPPL, UKL-UPL, and AMDAL as mandatory environmental documents before operating a business — AMDAL for activities with significant impact, UKL-UPL for moderate impact, and SPPL for minor impact activities; and (3) UKL-UPL and AMDAL implementation reports prepared periodically (at least every 6 months) as evidence of company compliance with environmental regulations.',
                ],
                'benefits' => [
                    'id' => ['Penyusunan dokumen Andalalin', 'Pengurusan SPPL', 'Penyusunan UKL-UPL', 'Penyusunan dokumen AMDAL', 'Laporan implementasi periodik'],
                    'en' => ['Andalalin document preparation', 'SPPL processing', 'UKL-UPL preparation', 'AMDAL document preparation', 'Periodic implementation reports'],
                ],
                'steps' => [
                    'id' => ['Identifikasi jenis dokumen lingkungan', 'Pengumpulan data & survei lapangan', 'Penyusunan dokumen', 'Pengajuan ke Dinas Lingkungan', 'Monitoring & pelaporan berkala'],
                    'en' => ['Identify environmental document type', 'Data collection & field survey', 'Document preparation', 'Submission to Environmental Agency', 'Monitoring & periodic reporting'],
                ],
                'requirements' => [
                    'id' => ['Data kegiatan/usaha yang direncanakan', 'Lokasi & luas area kegiatan', 'Data teknis rencana pembangunan'],
                    'en' => ['Planned activity/business data', 'Activity area location & size', 'Technical data of the development plan'],
                ],
                'faq' => [
                    'id' => [
                        ['Apa perbedaan AMDAL, UKL-UPL, dan SPPL?', 'AMDAL untuk kegiatan berdampak lingkungan besar, UKL-UPL untuk dampak sedang, dan SPPL untuk kegiatan berdampak kecil yang tidak memerlukan AMDAL atau UKL-UPL.'],
                        ['Apa itu Andalalin?', 'Andalalin (Analisis Dampak Lalu Lintas) adalah kajian untuk mengevaluasi dampak suatu pembangunan terhadap kondisi lalu lintas di sekitarnya dan menjadi salah satu syarat perizinan pembangunan.'],
                    ],
                    'en' => [
                        ['What is the difference between AMDAL, UKL-UPL, and SPPL?', 'AMDAL is for activities with major environmental impact, UKL-UPL for moderate impact, and SPPL for minor impact activities that do not require AMDAL or UKL-UPL.'],
                        ['What is Andalalin?', 'Andalalin (Traffic Impact Analysis) is a study to evaluate the impact of a development on surrounding traffic conditions and is one of the requirements for building permits.'],
                    ],
                ],
            ],

            // ============================================================
            // 18. PENGURUSAN PERIZINAN OSS
            // ============================================================
            [
                'slug'      => 'pengurusan-perizinan-oss',
                'category'  => 'Perizinan & Legal Compliance',
                'icon_image' => 'language',
                'sort_order' => 18,
                'title' => ['id' => 'Pengurusan Perizinan OSS', 'en' => 'OSS Business Licensing Processing'],
                'short' => [
                    'id' => 'Pengurusan perizinan berusaha berbasis OSS: NIB, PKKPR/KKKPR, PKKPR Penilaian, dan Sertifikat Standar untuk berbagai bidang usaha secara efektif dan transparan.',
                    'en' => 'OSS-based business licensing: NIB, PKKPR/KKKPR, PKKPR Assessment, and Standard Certificates for various business sectors effectively and transparently.',
                ],
                'full' => [
                    'id' => 'Kami menyediakan jasa pengurusan perizinan berusaha berbasis Online Single Submission (OSS) secara profesional dan sesuai dengan ketentuan peraturan perundang-undangan yang berlaku, meliputi penerbitan Nomor Induk Berusaha (NIB), pengurusan Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (PKKPR/KKKPR), PKKPR Penilaian, serta penerbitan Sertifikat Standar untuk berbagai bidang usaha. Kami membantu proses mulai dari pemeriksaan dan penyusunan dokumen persyaratan, konsultasi perizinan, penginputan data pada sistem OSS, koordinasi dengan instansi terkait, hingga terbitnya izin usaha secara efektif, cepat, dan transparan guna memberikan kemudahan serta kepastian hukum bagi pelaku usaha perorangan maupun badan usaha dalam menjalankan kegiatan usahanya.',
                    'en' => 'We provide professional Online Single Submission (OSS)-based business licensing services in accordance with applicable laws and regulations, covering the issuance of Business Identification Numbers (NIB), processing of Space Utilization Activity Compliance Approvals (PKKPR/KKKPR), PKKPR Assessment, and issuance of Standard Certificates for various business sectors. We assist in the entire process from document requirement inspection and preparation, licensing consultation, data input in the OSS system, coordination with relevant agencies, to the effective, fast, and transparent issuance of business licenses to provide convenience and legal certainty for individual entrepreneurs and business entities in conducting their business activities.',
                ],
                'benefits' => [
                    'id' => ['Penerbitan NIB (Nomor Induk Berusaha)', 'Pengurusan PKKPR/KKKPR', 'PKKPR Penilaian', 'Penerbitan Sertifikat Standar', 'Koordinasi dengan instansi terkait'],
                    'en' => ['NIB (Business Identification Number) issuance', 'PKKPR/KKKPR processing', 'PKKPR Assessment', 'Standard Certificate issuance', 'Coordination with relevant agencies'],
                ],
                'steps' => [
                    'id' => ['Pemeriksaan dokumen persyaratan', 'Konsultasi jenis perizinan OSS', 'Penginputan data di sistem OSS', 'Koordinasi instansi terkait', 'Terbitnya izin usaha'],
                    'en' => ['Document requirement inspection', 'OSS licensing type consultation', 'Data input in the OSS system', 'Relevant agency coordination', 'Business license issuance'],
                ],
                'requirements' => [
                    'id' => ['Akta pendirian & dokumen legalitas', 'Data usaha & KBLI', 'Dokumen lokasi usaha', 'NPWP perusahaan/perorangan'],
                    'en' => ['Deed of establishment & legality documents', 'Business data & KBLI', 'Business location documents', 'Company/individual NPWP'],
                ],
                'faq' => [
                    'id' => [
                        ['Apa itu OSS dan mengapa penting?', 'OSS (Online Single Submission) adalah sistem terintegrasi untuk perizinan berusaha di Indonesia. NIB yang diterbitkan melalui OSS menjadi identitas tunggal bagi pelaku usaha.'],
                        ['Apakah semua jenis usaha harus memiliki NIB?', 'Ya, semua pelaku usaha baik perorangan maupun badan usaha wajib memiliki NIB sebagai identitas berusaha.'],
                    ],
                    'en' => [
                        ['What is OSS and why is it important?', 'OSS (Online Single Submission) is an integrated system for business licensing in Indonesia. The NIB issued through OSS becomes the single identity for business actors.'],
                        ['Do all types of businesses need to have a NIB?', 'Yes, all business actors, both individuals and business entities, are required to have a NIB as a business identity.'],
                    ],
                ],
            ],

            // ============================================================
            // 19. PENGURUSAN SERTIFIKASI HALAL & BPOM
            // ============================================================
            [
                'slug'      => 'pengurusan-sertifikasi-halal-bpom',
                'category'  => 'Sertifikasi & Branding Legal',
                'icon_image' => 'verified_user',
                'sort_order' => 19,
                'title' => ['id' => 'Pengurusan Sertifikasi Halal & BPOM', 'en' => 'Halal Certification & BPOM Licensing'],
                'short' => [
                    'id' => 'Jasa pengurusan Sertifikat Halal dan izin BPOM untuk produk makanan, minuman, kosmetik, dan produk lainnya agar memenuhi standar legalitas dan kepercayaan konsumen.',
                    'en' => 'Halal Certificate and BPOM permit processing for food, beverages, cosmetics, and other products to meet legality standards and consumer trust.',
                ],
                'full' => [
                    'id' => 'Kami menyediakan jasa pengurusan sertifikasi halal dan perizinan BPOM secara profesional untuk membantu pelaku usaha memenuhi standar legalitas, keamanan, dan kepercayaan konsumen terhadap produk yang dipasarkan. Layanan kami meliputi pendampingan pengurusan Sertifikat Halal, mulai dari pemeriksaan dokumen, pemenuhan persyaratan, pendaftaran melalui sistem yang berlaku, hingga proses pendampingan sertifikasi sampai sertifikat diterbitkan. Selain itu, kami juga melayani pengurusan izin BPOM untuk produk makanan, minuman, kosmetik, dan produk lainnya, termasuk konsultasi persyaratan, penyusunan dokumen administrasi, registrasi produk, serta koordinasi dengan instansi terkait secara cepat, tepat, dan transparan guna memberikan kemudahan serta kepastian hukum bagi pelaku usaha dalam mengembangkan usahanya secara legal dan terpercaya.',
                    'en' => 'We provide professional halal certification and BPOM licensing services to help business actors meet the standards of legality, safety, and consumer trust for their marketed products. Our services include assistance with Halal Certificate processing, from document inspection, requirement fulfillment, registration through the applicable system, to certification assistance until the certificate is issued. In addition, we also serve BPOM permit processing for food, beverage, cosmetic, and other products, including requirements consultation, administrative document preparation, product registration, and coordination with relevant agencies quickly, accurately, and transparently to provide convenience and legal certainty for business actors in developing their businesses legally and trustworthily.',
                ],
                'benefits' => [
                    'id' => ['Pendampingan Sertifikat Halal', 'Pemeriksaan & pemenuhan persyaratan', 'Izin BPOM (makanan, minuman, kosmetik)', 'Registrasi produk', 'Koordinasi dengan instansi terkait'],
                    'en' => ['Halal Certificate assistance', 'Requirements inspection & fulfillment', 'BPOM permits (food, beverages, cosmetics)', 'Product registration', 'Coordination with relevant agencies'],
                ],
                'steps' => [
                    'id' => ['Konsultasi jenis sertifikasi yang dibutuhkan', 'Pemeriksaan dokumen persyaratan', 'Pemenuhan persyaratan produk', 'Pendaftaran & registrasi produk', 'Pendampingan hingga sertifikat terbit'],
                    'en' => ['Consultation on required certification type', 'Requirements document inspection', 'Product requirements fulfillment', 'Product registration', 'Assistance until certificate is issued'],
                ],
                'requirements' => [
                    'id' => ['Data perusahaan & legalitas usaha', 'Informasi produk (nama, komposisi, proses produksi)', 'Dokumen fasilitas produksi', 'Sertifikat/izin yang sudah dimiliki (jika ada)'],
                    'en' => ['Company & business legality data', 'Product information (name, composition, production process)', 'Production facility documents', 'Existing certificates/permits (if any)'],
                ],
                'faq' => [
                    'id' => [
                        ['Apakah sertifikasi halal wajib?', 'Sertifikasi halal wajib bagi produk yang beredar di Indonesia sesuai ketentuan UU No. 33 Tahun 2014 dan turunannya.'],
                        ['Produk apa saja yang perlu izin BPOM?', 'Produk yang perlu izin BPOM antara lain makanan olahan, minuman, obat-obatan, kosmetik, dan suplemen kesehatan.'],
                    ],
                    'en' => [
                        ['Is halal certification mandatory?', 'Halal certification is mandatory for products circulating in Indonesia according to Law No. 33 of 2014 and its derivatives.'],
                        ['What products require BPOM permits?', 'Products requiring BPOM permits include processed foods, beverages, medicines, cosmetics, and health supplements.'],
                    ],
                ],
            ],
        ];

        foreach ($services as $service) {
            // Map seeder keys → actual DB column names
            if (isset($service['short'])) {
                $service['short_description'] = $service['short'];
                unset($service['short']);
            }
            if (isset($service['full'])) {
                $service['full_description'] = $service['full'];
                unset($service['full']);
            }

            $service['faq_items'] = $service['faq'] ?? [];
            unset($service['faq']);

            // Encode JSON fields if they are arrays
            foreach (['title', 'short_description', 'full_description', 'benefits', 'steps', 'requirements', 'faq_items'] as $field) {
                if (isset($service[$field]) && is_array($service[$field])) {
                    $service[$field] = json_encode($service[$field], JSON_UNESCAPED_UNICODE);
                }
            }

            // Set thumbnail from $imgs if available
            if (isset($imgs[$service['slug']])) {
                $service['thumbnail_image'] = $imgs[$service['slug']];
            }

            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}