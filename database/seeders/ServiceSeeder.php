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
                'title' => ['id' => 'Pendirian PT Lengkap', 'en' => 'Complete PT Establishment'],
                'short' => ['id' => 'Pendampingan dari konsultasi awal hingga PT siap beroperasi secara legal.', 'en' => 'Assistance from initial consultation until the company is legally ready to operate.'],
                'full' => ['id' => 'Pendirian PT lengkap mencakup konsultasi, akta, NIB, NPWP hingga siap beroperasi.', 'en' => 'Complete PT establishment includes consultation, deed, NIB, NPWP until ready to operate.'],
                'benefits' => [
                    'id' => ['Akta pendirian', 'SK Kemenkumham', 'NIB OSS', 'NPWP perusahaan'],
                    'en' => ['Deed of establishment', 'Ministry of Law and Human Rights Decree', 'NIB OSS', 'Company NPWP']
                ],
                'steps' => [
                    'id' => ['Konsultasi', 'Verifikasi data', 'Penyusunan dokumen', 'Serah terima'],
                    'en' => ['Consultation', 'Data verification', 'Document preparation', 'Handover']
                ],
                'requirements' => [
                    'id' => ['KTP pendiri', 'NPWP pendiri', 'Nama PT', 'Alamat usaha'],
                    'en' => ['Founder ID Card', 'Founder NPWP', 'Company Name', 'Business Address']
                ],
                'faq' => [
                    'id' => [['Berapa lama proses?', 'Bergantung kelengkapan data.'], ['Sudah termasuk NIB?', 'Ya, termasuk NIB dan NPWP.']],
                    'en' => [['How long does the process take?', 'Depends on data completeness.'], ['Is NIB included?', 'Yes, including NIB and NPWP.']]
                ]
            ],
            [
                'slug' => 'pendirian-pt-bundling',
                'category' => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'workspace_premium',
                'sort_order' => 2,
                'title' => ['id' => 'Pendirian PT Bundling', 'en' => 'Bundling PT Establishment'],
                'short' => ['id' => 'Paket pendirian PT dengan virtual office bagi pengusaha pemula.', 'en' => 'PT establishment package with virtual office for startup entrepreneurs.'],
                'full' => ['id' => 'PT bundling menggabungkan pendirian PT dengan solusi virtual office.', 'en' => 'PT bundling combines PT establishment with a virtual office solution.'],
                'benefits' => [
                    'id' => ['Akta dan legalitas PT', 'Solusi virtual office', 'Dokumen siap pakai'],
                    'en' => ['PT deed and legality', 'Virtual office solution', 'Ready-to-use documents']
                ],
                'steps' => [
                    'id' => ['Konsultasi', 'Pemilihan domisili', 'Penyusunan akta', 'Serah terima'],
                    'en' => ['Consultation', 'Domicile selection', 'Deed preparation', 'Handover']
                ],
                'requirements' => [
                    'id' => ['KTP pendiri', 'Nama PT', 'Bidang usaha'],
                    'en' => ['Founder ID Card', 'Company Name', 'Line of Business']
                ],
                'faq' => [
                    'id' => [['Beda PT bundling dan PT lengkap?', 'Bundling menambahkan domisili/virtual office.']],
                    'en' => [['What is the difference between bundling and complete PT?', 'Bundling adds a domicile/virtual office.']]
                ]
            ],
            [
                'slug' => 'perubahan-anggaran-dasar',
                'category' => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'edit_note',
                'sort_order' => 3,
                'title' => ['id' => 'Perubahan Anggaran Dasar', 'en' => 'Articles of Association Amendment'],
                'short' => ['id' => 'Perubahan domisili, susunan pengurus, dan data perseroan di anggaran dasar.', 'en' => 'Change of domicile, board structure, and company data in the articles of association.'],
                'full' => ['id' => 'Layanan ini membantu perusahaan melakukan perubahan anggaran dasar secara tertib.', 'en' => 'This service helps companies systematically amend their articles of association.'],
                'benefits' => [
                    'id' => ['Konsultasi perubahan', 'Penyusunan dokumen', 'Pendampingan notaris'],
                    'en' => ['Amendment consultation', 'Document preparation', 'Notary assistance']
                ],
                'steps' => [
                    'id' => ['Review kebutuhan', 'Persiapan data', 'Pembuatan akta', 'Pengesahan'],
                    'en' => ['Needs review', 'Data preparation', 'Deed creation', 'Ratification']
                ],
                'requirements' => [
                    'id' => ['Akta terakhir', 'Data perubahan', 'Identitas pihak terkait'],
                    'en' => ['Latest deed', 'Amendment data', 'Related parties identity']
                ],
                'faq' => [
                    'id' => [['Perlu notaris?', 'Ya, perlu pengesahan notaris.']],
                    'en' => [['Do I need a notary?', 'Yes, notary ratification is required.']]
                ]
            ],
            [
                'slug' => 'pendirian-cv',
                'category' => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'business',
                'sort_order' => 4,
                'title' => ['id' => 'Pendirian CV', 'en' => 'CV Establishment'],
                'short' => ['id' => 'Pendirian CV lengkap dari akta hingga dokumen operasional usaha.', 'en' => 'Complete CV establishment from deed to business operational documents.'],
                'full' => ['id' => 'Pendirian CV lengkap dari konsultasi, akta, NIB, NPWP, hingga dokumen operasional.', 'en' => 'Complete CV establishment from consultation, deed, NIB, NPWP, to operational documents.'],
                'benefits' => [
                    'id' => ['Akta CV', 'NIB', 'NPWP', 'Pendampingan administrasi'],
                    'en' => ['CV Deed', 'NIB', 'NPWP', 'Administrative assistance']
                ],
                'steps' => [
                    'id' => ['Konsultasi awal', 'Data pendiri', 'Akta notaris', 'Pengajuan NIB'],
                    'en' => ['Initial consultation', 'Founder data', 'Notary deed', 'NIB submission']
                ],
                'requirements' => [
                    'id' => ['KTP pendiri', 'Nama CV', 'Alamat usaha'],
                    'en' => ['Founder ID Card', 'CV Name', 'Business Address']
                ],
                'faq' => [
                    'id' => [['CV cocok untuk usaha keluarga?', 'Ya, cocok untuk struktur sederhana.']],
                    'en' => [['Is CV suitable for family businesses?', 'Yes, it is suitable for simple structures.']]
                ]
            ],
            [
                'slug' => 'pendirian-cv-bundling',
                'category' => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'hub',
                'sort_order' => 5,
                'title' => ['id' => 'Pendirian CV Bundling', 'en' => 'Bundling CV Establishment'],
                'short' => ['id' => 'Pendirian CV dengan solusi bundling untuk domisili dan operasional awal.', 'en' => 'CV establishment with a bundling solution for domicile and initial operations.'],
                'full' => ['id' => 'CV bundling menggabungkan pendirian CV dengan virtual office dan domisili.', 'en' => 'CV bundling combines CV establishment with a virtual office and domicile.'],
                'benefits' => [
                    'id' => ['Akta CV', 'Solusi domisili', 'NIB dan NPWP'],
                    'en' => ['CV Deed', 'Domicile solution', 'NIB and NPWP']
                ],
                'steps' => [
                    'id' => ['Konsultasi', 'Data sekutu', 'Pembuatan akta', 'Legalitas'],
                    'en' => ['Consultation', 'Partner data', 'Deed creation', 'Legality']
                ],
                'requirements' => [
                    'id' => ['KTP sekutu', 'Nama CV', 'Bidang usaha'],
                    'en' => ['Partner ID Card', 'CV Name', 'Line of Business']
                ],
                'faq' => [
                    'id' => [['Ada virtual office?', 'Ya, jika dipilih dalam paket bundling.']],
                    'en' => [['Is there a virtual office?', 'Yes, if selected in the bundling package.']]
                ]
            ],
            [
                'slug' => 'pendirian-yayasan',
                'category' => 'Legalitas & Pendirian Badan Usaha',
                'icon_image' => 'church',
                'sort_order' => 6,
                'title' => ['id' => 'Pendirian Yayasan', 'en' => 'Foundation Establishment'],
                'short' => ['id' => 'Konsultasi, akta, dan pengurusan legalitas yayasan secara lengkap.', 'en' => 'Complete consultation, deed, and legality management for foundations.'],
                'full' => ['id' => 'Pendirian yayasan dari konsultasi, akta, domisili, NPWP hingga tanda daftar.', 'en' => 'Foundation establishment from consultation, deed, domicile, NPWP to registration certificate.'],
                'benefits' => [
                    'id' => ['Akta yayasan', 'Surat domisili', 'NPWP yayasan', 'Tanda daftar'],
                    'en' => ['Foundation deed', 'Domicile letter', 'Foundation NPWP', 'Registration certificate']
                ],
                'steps' => [
                    'id' => ['Konsultasi', 'Penyusunan dokumen', 'Akta notaris', 'Legalitas'],
                    'en' => ['Consultation', 'Document preparation', 'Notary deed', 'Legality']
                ],
                'requirements' => [
                    'id' => ['Data pendiri/pengurus', 'Nama yayasan', 'Alamat domisili'],
                    'en' => ['Founder/board data', 'Foundation Name', 'Domicile address']
                ],
                'faq' => [
                    'id' => [['Yayasan bisa sosial dan pendidikan?', 'Ya, sesuai ketentuan berlaku.']],
                    'en' => [['Can foundations be social and educational?', 'Yes, according to applicable regulations.']]
                ]
            ],
            [
                'slug' => 'pengurusan-izin-premium',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'verified',
                'sort_order' => 7,
                'title' => ['id' => 'Pengurusan Izin Premium', 'en' => 'Premium Permit Processing'],
                'short' => ['id' => 'Paket perizinan premium untuk SIUJK, TDUP, rekomendasi teknis, dan izin khusus.', 'en' => 'Premium licensing packages for SIUJK, TDUP, technical recommendations, and special permits.'],
                'full' => ['id' => 'Layanan izin premium untuk kebutuhan usaha sektoral yang kompleks.', 'en' => 'Premium licensing services for complex sectoral business needs.'],
                'benefits' => [
                    'id' => ['Konsultasi izin', 'Monitoring approval', 'Pendampingan regulasi'],
                    'en' => ['Permit consultation', 'Approval monitoring', 'Regulatory assistance']
                ],
                'steps' => [
                    'id' => ['Analisis usaha', 'Pemeriksaan syarat', 'Pengajuan', 'Monitoring'],
                    'en' => ['Business analysis', 'Requirement check', 'Submission', 'Monitoring']
                ],
                'requirements' => [
                    'id' => ['Data usaha', 'Dokumen legalitas', 'Persyaratan teknis'],
                    'en' => ['Business data', 'Legality documents', 'Technical requirements']
                ],
                'faq' => [
                    'id' => [['Cocok untuk konstruksi dan pariwisata?', 'Ya, disesuaikan per sektor.']],
                    'en' => [['Is it suitable for construction and tourism?', 'Yes, tailored per sector.']]
                ]
            ],
            [
                'slug' => 'pengukuhan-pengusaha-kena-pajak-pkp',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'receipt_long',
                'sort_order' => 8,
                'title' => ['id' => 'Pengukuhan Pengusaha Kena Pajak (PKP)', 'en' => 'Taxable Entrepreneur Confirmation (PKP)'],
                'short' => ['id' => 'Pengurusan PKP agar perusahaan siap tender dan transaksi bisnis profesional.', 'en' => 'PKP processing to make your company ready for tenders and professional business transactions.'],
                'full' => ['id' => 'Pengukuhan PKP untuk tender, kerjasama korporasi, dan kepatuhan pajak.', 'en' => 'PKP confirmation for tenders, corporate partnerships, and tax compliance.'],
                'benefits' => [
                    'id' => ['Penyusunan dokumen', 'Review data', 'Pengajuan ke KPP'],
                    'en' => ['Document preparation', 'Data review', 'Submission to Tax Office']
                ],
                'steps' => [
                    'id' => ['Cek kelayakan', 'Siapkan dokumen', 'Pengajuan', 'Monitoring'],
                    'en' => ['Eligibility check', 'Document preparation', 'Submission', 'Monitoring']
                ],
                'requirements' => [
                    'id' => ['NIB', 'NPWP perusahaan', 'Dokumen legalitas'],
                    'en' => ['NIB', 'Company NPWP', 'Legality documents']
                ],
                'faq' => [
                    'id' => [['PKP penting untuk tender?', 'Ya, sering menjadi syarat administrasi.']],
                    'en' => [['Is PKP important for tenders?', 'Yes, it is often an administrative requirement.']]
                ]
            ],
            [
                'slug' => 'paket-perpanjangan-perizinan-yang-telah-habis-masa-berlaku',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'autorenew',
                'sort_order' => 9,
                'title' => ['id' => 'Paket Perpanjangan Perizinan', 'en' => 'Permit Renewal Package'],
                'short' => ['id' => 'Pemulihan dan perpanjangan izin usaha yang masa berlakunya telah habis.', 'en' => 'Recovery and renewal of expired business permits.'],
                'full' => ['id' => 'Perpanjangan perizinan untuk izin yang habis masa berlaku.', 'en' => 'Permit renewal for licenses that have expired.'],
                'benefits' => [
                    'id' => ['Cek status izin', 'Konsultasi perpanjangan', 'Monitoring'],
                    'en' => ['Permit status check', 'Renewal consultation', 'Monitoring']
                ],
                'steps' => [
                    'id' => ['Audit izin', 'Cek dokumen', 'Pengajuan', 'Serah terima'],
                    'en' => ['Permit audit', 'Document check', 'Submission', 'Handover']
                ],
                'requirements' => [
                    'id' => ['Dokumen izin lama', 'Data perusahaan terbaru'],
                    'en' => ['Old permit documents', 'Latest company data']
                ],
                'faq' => [
                    'id' => [['Semua izin bisa diperpanjang?', 'Bergantung jenis izin.']],
                    'en' => [['Can all permits be renewed?', 'Depends on the permit type.']]
                ]
            ],
            [
                'slug' => 'pendaftaran-merek',
                'category' => 'Sertifikasi & Branding Legal',
                'icon_image' => 'brand_family',
                'sort_order' => 10,
                'title' => ['id' => 'Pendaftaran Merek', 'en' => 'Trademark Registration'],
                'short' => ['id' => 'Proteksi identitas brand melalui pendaftaran dan pengecekan merek.', 'en' => 'Brand identity protection through trademark registration and checking.'],
                'full' => ['id' => 'Pendaftaran merek untuk melindungi identitas dan reputasi brand.', 'en' => 'Trademark registration to protect brand identity and reputation.'],
                'benefits' => [
                    'id' => ['Pengecekan merek', 'Pengajuan merek', 'Monitoring status'],
                    'en' => ['Trademark check', 'Trademark submission', 'Status monitoring']
                ],
                'steps' => [
                    'id' => ['Cek ketersediaan', 'Review kelas', 'Siapkan dokumen', 'Ajukan'],
                    'en' => ['Availability check', 'Class review', 'Prepare documents', 'Submit']
                ],
                'requirements' => [
                    'id' => ['Nama dan logo merek', 'Identitas pemilik', 'Deskripsi produk'],
                    'en' => ['Brand name and logo', 'Owner identity', 'Product description']
                ],
                'faq' => [
                    'id' => [['Perlu cek merek dulu?', 'Ya, untuk mengurangi potensi penolakan.']],
                    'en' => [['Do I need to check the trademark first?', 'Yes, to reduce the potential for rejection.']]
                ]
            ],
            [
                'slug' => 'pengurusan-imb-pbg',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'domain',
                'sort_order' => 11,
                'title' => ['id' => 'Pengurusan IMB / PBG', 'en' => 'IMB / PBG Processing'],
                'short' => ['id' => 'Pengurusan IMB/PBG untuk bangunan usaha, kantor, dan properti operasional.', 'en' => 'IMB/PBG processing for business buildings, offices, and operational properties.'],
                'full' => ['id' => 'Pengurusan IMB/PBG agar bangunan usaha memenuhi ketentuan yang berlaku.', 'en' => 'IMB/PBG processing so that business buildings comply with applicable regulations.'],
                'benefits' => [
                    'id' => ['Review teknis', 'Pengajuan PBG', 'Monitoring izin'],
                    'en' => ['Technical review', 'PBG submission', 'Permit monitoring']
                ],
                'steps' => [
                    'id' => ['Cek bangunan', 'Siapkan gambar', 'Pengajuan', 'Pemantauan'],
                    'en' => ['Building check', 'Prepare drawings', 'Submission', 'Monitoring']
                ],
                'requirements' => [
                    'id' => ['Data bangunan', 'Gambar teknis', 'Dokumen kepemilikan'],
                    'en' => ['Building data', 'Technical drawings', 'Ownership documents']
                ],
                'faq' => [
                    'id' => [['IMB masih digunakan?', 'Banyak proses beralih ke PBG.']],
                    'en' => [['Is IMB still used?', 'Many processes have shifted to PBG.']]
                ]
            ],
            [
                'slug' => 'pengurusan-pertanahan',
                'category' => 'Tender & Pertanahan',
                'icon_image' => 'map',
                'sort_order' => 12,
                'title' => ['id' => 'Pengurusan Pertanahan', 'en' => 'Land Administration'],
                'short' => ['id' => 'Konsultasi dan pendampingan dokumen pertanahan, aset, dan legalitas lahan.', 'en' => 'Consultation and assistance for land documents, assets, and land legality.'],
                'full' => ['id' => 'Pengurusan pertanahan mencakup konsultasi sertifikat tanah dan legal review.', 'en' => 'Land administration includes land certificate consultation and legal review.'],
                'benefits' => [
                    'id' => ['Konsultasi pertanahan', 'Review dokumen aset', 'Legal aset'],
                    'en' => ['Land consultation', 'Asset document review', 'Asset legality']
                ],
                'steps' => [
                    'id' => ['Review status tanah', 'Cek dokumen', 'Administrasi', 'Serah terima'],
                    'en' => ['Land status review', 'Document check', 'Administration', 'Handover']
                ],
                'requirements' => [
                    'id' => ['Dokumen kepemilikan', 'Identitas pemilik', 'Data lokasi'],
                    'en' => ['Ownership documents', 'Owner identity', 'Location data']
                ],
                'faq' => [
                    'id' => [['Bisa untuk aset perusahaan?', 'Ya, termasuk aset korporasi.']],
                    'en' => [['Can it be for company assets?', 'Yes, including corporate assets.']]
                ]
            ],
            [
                'slug' => 'pengurusan-sertifikat-laik-fungsi-slf',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'fact_check',
                'sort_order' => 13,
                'title' => ['id' => 'Pengurusan Sertifikat Laik Fungsi (SLF)', 'en' => 'Certificate of Feasibility (SLF)'],
                'short' => ['id' => 'Pengurusan SLF untuk memastikan bangunan memenuhi persyaratan laik fungsi.', 'en' => 'SLF processing to ensure buildings meet functional feasibility requirements.'],
                'full' => ['id' => 'SLF memastikan bangunan memenuhi standar teknis dan keamanan untuk digunakan.', 'en' => 'SLF ensures buildings meet technical and safety standards for use.'],
                'benefits' => [
                    'id' => ['Review teknis', 'Pendampingan dokumen', 'Pengurusan SLF'],
                    'en' => ['Technical review', 'Document assistance', 'SLF processing']
                ],
                'steps' => [
                    'id' => ['Cek persyaratan', 'Review teknis', 'Pengajuan', 'Monitoring'],
                    'en' => ['Requirements check', 'Technical review', 'Submission', 'Monitoring']
                ],
                'requirements' => [
                    'id' => ['Data bangunan', 'Gambar teknis', 'Dokumen perizinan'],
                    'en' => ['Building data', 'Technical drawings', 'Permit documents']
                ],
                'faq' => [
                    'id' => [['Kapan SLF dibutuhkan?', 'Saat bangunan akan digunakan secara formal.']],
                    'en' => [['When is SLF needed?', 'When the building is to be formally used.']]
                ]
            ],
            [
                'slug' => 'jasa-pengurusan-tender',
                'category' => 'Tender & Pertanahan',
                'icon_image' => 'gavel',
                'sort_order' => 14,
                'title' => ['id' => 'Jasa Pengurusan Tender', 'en' => 'Tender Management Services'],
                'short' => ['id' => 'Pendampingan pengurusan dokumen tender, legal review, dan persiapan penawaran.', 'en' => 'Assistance with tender document processing, legal review, and bid preparation.'],
                'full' => ['id' => 'Jasa tender membantu menyiapkan dokumen administratif dan legal review.', 'en' => 'Tender services help prepare administrative documents and legal reviews.'],
                'benefits' => [
                    'id' => ['Pengurusan dokumen tender', 'Legal review', 'Analisis persyaratan'],
                    'en' => ['Tender document processing', 'Legal review', 'Requirements analysis']
                ],
                'steps' => [
                    'id' => ['Analisis tender', 'Persiapan dokumen', 'Review', 'Serah terima'],
                    'en' => ['Tender analysis', 'Document preparation', 'Review', 'Handover']
                ],
                'requirements' => [
                    'id' => ['Dokumen legalitas usaha', 'Data proyek', 'Syarat administrasi'],
                    'en' => ['Business legality documents', 'Project data', 'Administrative requirements']
                ],
                'faq' => [
                    'id' => [['Bisa bantu hitung RAB?', 'Ya, sesuai kebutuhan proyek.']],
                    'en' => [['Can you help calculate RAB?', 'Yes, according to project needs.']]
                ]
            ],
            [
                'slug' => 'pengurusan-perizinan-pertambangan',
                'category' => 'Perizinan & Legal Compliance',
                'icon_image' => 'precision_manufacturing',
                'sort_order' => 15,
                'title' => ['id' => 'Pengurusan Perizinan Pertambangan', 'en' => 'Mining Licensing Processing'],
                'short' => ['id' => 'Pendampingan izin usaha pertambangan, IUP, IPR, dan dokumen pendukung.', 'en' => 'Assistance for mining business permits, IUP, IPR, and supporting documents.'],
                'full' => ['id' => 'Pengurusan perizinan pertambangan untuk IUP, IPR, IUPK, dan MODI.', 'en' => 'Mining permit processing for IUP, IPR, IUPK, and MODI.'],
                'benefits' => [
                    'id' => ['IUP dan izin terkait', 'Pendampingan dokumen', 'Monitoring'],
                    'en' => ['IUP and related permits', 'Document assistance', 'Monitoring']
                ],
                'steps' => [
                    'id' => ['Cek jenis izin', 'Siapkan dokumen', 'Pengajuan', 'Pemantauan'],
                    'en' => ['Permit type check', 'Prepare documents', 'Submission', 'Monitoring']
                ],
                'requirements' => [
                    'id' => ['Data perusahaan', 'Data lokasi usaha', 'Dokumen teknis'],
                    'en' => ['Company data', 'Business location data', 'Technical documents']
                ],
                'faq' => [
                    'id' => [['Membantu MODI juga?', 'Ya, termasuk pembaruan data sistem.']],
                    'en' => [['Do you also help with MODI?', 'Yes, including system data updates.']]
                ]
            ],
            [
                'slug' => 'layanan-litigasi-non-litigasi',
                'category' => 'Konsultasi Hukum & Litigasi',
                'icon_image' => 'balance',
                'sort_order' => 16,
                'title' => ['id' => 'Layanan Litigasi & Non Litigasi', 'en' => 'Litigation & Non-Litigation Services'],
                'short' => ['id' => 'Pendampingan sengketa, mediasi, dan konsultasi hukum perusahaan.', 'en' => 'Dispute assistance, mediation, and corporate legal consultation.'],
                'full' => ['id' => 'Layanan litigasi dan non litigasi untuk konsultasi, mediasi hingga penanganan perkara.', 'en' => 'Litigation and non-litigation services for consultation, mediation to case handling.'],
                'benefits' => [
                    'id' => ['Konsultasi hukum', 'Mediasi sengketa', 'Pendampingan perkara'],
                    'en' => ['Legal consultation', 'Dispute mediation', 'Case assistance']
                ],
                'steps' => [
                    'id' => ['Analisis perkara', 'Strategi', 'Pendampingan', 'Evaluasi'],
                    'en' => ['Case analysis', 'Strategy', 'Assistance', 'Evaluation']
                ],
                'requirements' => [
                    'id' => ['Kronologi sengketa', 'Dokumen pendukung', 'Identitas para pihak'],
                    'en' => ['Dispute chronology', 'Supporting documents', 'Identity of parties']
                ],
                'faq' => [
                    'id' => [['Apakah bisa mediasi online?', 'Ya, kami mendukung mediasi online maupun tatap muka.']],
                    'en' => [['Is online mediation possible?', 'Yes, we support both online and in-person mediation.']]
                ]
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