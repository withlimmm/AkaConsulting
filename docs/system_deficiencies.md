# Evaluasi Kekurangan dan Keamanan Sistem
**Proyek:** Sistem Company Profile AKA Consulting
**Tanggal:** 28 Mei 2026
**Fokus:** Keamanan (Security), Kelengkapan Fitur (Completeness), dan Performa (Performance)

Meskipun sistem yang Anda bangun saat ini sudah sangat baik secara visual dan alur data dasar, standar sebuah sistem profesional (terutama untuk firma hukum/konsultan) masih membutuhkan beberapa penyempurnaan krusial. 

Berikut adalah evaluasi jujur dan teknis mengenai **apa yang masih kurang** dari sistem Anda saat ini:

---

## 1. Kekurangan Sisi Keamanan (Security Deficiencies)

Sistem Anda saat ini masih memiliki celah terbuka yang berpotensi dimanfaatkan oleh pihak tidak bertanggung jawab:

| Celah / Risiko Keamanan | Penjelasan | Solusi yang Dibutuhkan |
| :--- | :--- | :--- |
| **Tidak ada Anti-Spam (reCAPTCHA)** | Form konsultasi, kontak, dan ulasan (*review*) bisa diserang bot otomatis. Server bisa kebanjiran data palsu (*spamming*). | Wajib mengintegrasikan **Google reCAPTCHA v3** (invisible) di semua form publik. |
| **Rate Limiting (Pembatasan Request)** | Seseorang bisa menekan tombol submit berkali-kali per detik (DDoS level aplikasi). | Menerapkan `Route::middleware('throttle:5,1')` (maksimal 5 kali submit per menit) pada form action. |
| **Proteksi Serangan XSS pada Ulasan** | Jika sistem menampilkan ulasan klien (`{!! $review !!}`) tanpa proses *sanitasi* HTML (*HTML Purifier*), hacker bisa menyuntikkan script JS jahat. | Pastikan menggunakan `{{ $review }}` atau package `mews/purifier` untuk membersihkan tag HTML berbahaya. |
| **Tidak ada 2FA untuk Admin** | Akses ke panel admin yang berisi data klien hanya dilindungi kombinasi email dan password standar. | Menerapkan sistem *Two-Factor Authentication* (2FA) bagi akun Super Admin. |
| **Kelemahan Form Login (Brute-Force)** | Admin panel rentan ditebak passwordnya secara terus-menerus. | Memastikan Laravel `Fortify` / standard Auth memiliki batas percobaan login (*Login Throttling*). |

---

## 2. Kekurangan Sisi Kelengkapan Fungsional (Functional Deficiencies)

Secara fungsionalitas dan UX (*User Experience*), website masih kekurangan pilar-pilar penting korporasi:

1. **Halaman Legalitas yang Kosong (Sangat Krusial!)**
   Sebagai website "Konsultan Hukum dan Perizinan", Anda **wajib** memiliki dokumen legalitas website Anda sendiri. Saat ini link *Syarat & Ketentuan (T&C)* dan *Kebijakan Privasi (Privacy Policy)* di footer masih berupa teks tanpa halaman tujuan.
2. **Kustomisasi Halaman Error (404, 500)**
   Jika pengguna mengunjungi URL yang salah, mereka akan melihat halaman *Not Found* bawaan Laravel. Seharusnya ada halaman 404 yang cantik dan memiliki tombol "Kembali ke Beranda" sesuai desain brand AKA Consulting.
3. **Absennya Sistem Email Transaksional**
   Saat klien mengirim form konsultasi, idealnya mereka langsung menerima email berbunyi *"Terima kasih, tiket Anda telah kami terima..."*. Saat ini sistem baru mengarahkannya ke WhatsApp dan Database tanpa konfirmasi email otomatis (via SMTP).
4. **Pusat Bantuan / FAQ Dinamis**
   Halaman FAQ saat ini ada yang masih di-*hardcode* di template, padahal pertanyaan untuk konsultan perizinan sangat dinamis.

---

## 3. Kekurangan Sisi Performa & SEO (Performance & SEO Deficiencies)

1. **Query Database yang Belum Di-Cache**
   Data seperti *Layanan di Footer*, *Konfigurasi Nama Perusahaan*, dan *Navigasi Kategori* diambil langsung ke Database di setiap *refresh* halaman. 
   **Solusi:** Implementasi fitur `Cache::remember()` dengan usia cache misalnya 24 jam untuk mengurangi beban Database (Meringankan server hingga 60%).
2. **SEO Lanjutan (Open Graph & Twitter Cards)**
   Ketika link Artikel atau Portofolio Anda dibagikan ke WhatsApp, LinkedIn, atau Facebook, *thumbnail gambar* dan *judul* tidak akan muncul secara akurat. 
   **Solusi:** Anda belum memiliki *Dynamic Meta Tags* (seperti `og:image`, `og:title`) di komponen `<head>` pada file `main.blade.php`.
3. **Peta Situs (XML Sitemap)**
   Sistem tidak memiliki `sitemap.xml` dinamis. Ini akan membuat Google sangat kesulitan untuk menemukan dan menampilkan artikel-artikel atau layanan baru Anda di mesin pencari.

---

## Kesimpulan & Rekomendasi Langkah Selanjutnya

Jika ditanya **apa yang harus dikerjakan selanjutnya**, urutan prioritas utamanya adalah:
1. **Prioritas 1 (Keamanan):** Integrasi Google reCAPTCHA dan sistem Rate Limiting.
2. **Prioritas 2 (Kredibilitas):** Membuat halaman dinamis untuk Syarat & Ketentuan dan Kebijakan Privasi.
3. **Prioritas 3 (SEO):** Menambahkan Open Graph Tag agar website terlihat profesional saat dibagikan di WhatsApp/Sosmed.
4. **Prioritas 4 (Performa):** Mengaktifkan Query Caching.
