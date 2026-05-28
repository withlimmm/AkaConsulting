# Analisis Risiko dan Kesenjangan (Risk & Gap Analysis)
**Proyek:** Sistem Company Profile AKA Consulting (Laravel)
**Tanggal:** 28 Mei 2026
**Tujuan:** Evaluasi kesiapan sistem sebelum tahap *Deployment* ke *Production Server* untuk memastikan keamanan, performa, dan skalabilitas.

---

## 1. Analisis Risiko (Risk Analysis)
Berikut adalah pemetaan risiko potensial saat sistem di-deploy ke production, dampak yang ditimbulkan, dan langkah mitigasinya:

### A. Risiko Keamanan (Security Risks)
| Risiko | Deskripsi | Dampak | Mitigasi |
| :--- | :--- | :--- | :--- |
| **Eksposur Data Sensitif** | Konfigurasi `APP_DEBUG=true` tertinggal di `.env` server produksi. | Kredensial DB, struktur folder, dan variabel environment terekspos ke publik jika ada error. | Wajib memastikan `APP_ENV=production` dan `APP_DEBUG=false` sebelum rilis. |
| **Spam Form & Bot Attack** | Endpoint publik (Kontak, Konsultasi, Review) dieksploitasi oleh bot. | Database penuh dengan data *junk*, email notifikasi *spam*, beban server naik. | Implementasi Google reCAPTCHA v3 & Laravel Rate Limiting (Throttle) pada route terkait. |
| **Serangan XSS & SQL Injection** | Input dari user (misal: review/pesan) tidak disanitasi dengan benar saat ditampilkan. | Pencurian sesi user (admin) atau manipulasi database. | Selalu gunakan sintaks `{{ $data }}` di Blade untuk *auto-escaping* dan Eloquent ORM. |
| **Akses File Terlarang** | Struktur direktori server (seperti `.env` atau `/storage`) dapat diakses langsung via URL. | Kebocoran data krusial sistem dan file private. | Pastikan *document root* web server (Nginx/Apache) diarahkan tepat ke folder `/public`. |

### B. Risiko Fungsional & Operasional
| Risiko | Deskripsi | Dampak | Mitigasi |
| :--- | :--- | :--- | :--- |
| **Broken Media Links** | Path gambar/dokumen gagal dimuat setelah dipindah ke server. | UI/UX rusak, artikel dan portofolio tidak memiliki gambar. | Wajib jalankan `php artisan storage:link` di server. |
| **Timeout Upload File** | Klien mengunggah gambar/file yang melebihi batas konfigurasi server bawaan. | Muncul error 413 Payload Too Large atau *blank page*. | Sesuaikan `upload_max_filesize` dan `post_max_size` di `php.ini` (minimal 10MB). |
| **N+1 Query Problem** | Pengambilan data berelasi (seperti Kategori di Artikel) dilakukan berulang dalam *loop*. | Loading halaman melambat secara eksponensial seiring bertambahnya data. | Implementasikan *Eager Loading* (`with(['category'])`) pada query Eloquent. |
| **Hilangnya Data (Data Loss)** | Terjadi kerusakan server atau human error tanpa adanya cadangan data. | Kehilangan data klien, artikel, dan pengaturan yang sudah diinput. | Setup sistem *backup* database otomatis (harian). |

---

## 2. Analisis Kesenjangan (Gap Analysis)
Membandingkan kondisi sistem saat ini dengan kondisi ideal standar *Enterprise* / Profesional:

| Komponen | Kondisi Saat Ini (Current State) | Kondisi Ideal (Target State) | Tindakan Lanjutan (Action Plan) | Status/Prioritas |
| :--- | :--- | :--- | :--- | :--- |
| **Manajemen Notifikasi** | **(SELESAI)** Sistem sudah memiliki fitur `Mail::raw` via queue yang disiapkan di `routes/web.php` untuk Client dan Admin. | Konfirmasi masuk otomatis via Email ke Klien dan Admin (menggunakan SMTP terpercaya). | Hanya tinggal mengatur `MAIL_MAILER`, `MAIL_HOST`, dan `MAIL_USERNAME` di `.env` server. | **✔ Selesai (Menunggu .env)** |
| **Tracking & Analytics** | **(SELESAI)** Script GA4 dan Sentry SDK sudah ditambahkan di `main.blade.php`. | *Event tracking* aktif dan error tersimpan di dashboard *real-time*. | Menambahkan `GA_MEASUREMENT_ID` dan `SENTRY_DSN` di dalam `.env` server *production*. | **✔ Selesai (Menunggu .env)** |
| **Form Anti-Spam** | **(SELESAI)** Menggunakan Rate Limiting (`throttle:5,1`) dan Hidden Honeypot field (`_website_url`). | Google reCAPTCHA v3. Namun, perlindungan ganda saat ini (Honeypot + Throttle) dinilai sudah memadai secara sistem. | - | **✔ Selesai / Memadai** |
| **Proses Deployment** | Manual upload via FTP/cPanel atau `git pull` manual. | CI/CD Pipeline (GitHub Actions / GitLab CI) atau *Zero Downtime Deployment*. | Implementasi script *deployer* otomatis (seperti Laravel Envoy atau Deployer PHP). | **Rendah** |
| **Caching & Kinerja** | Menggunakan sistem *file cache* bawaan, belum ada optimasi query tingkat lanjut. | Menggunakan Redis/Memcached untuk *session* & *query caching* yang lebih cepat. | Install Redis di server jika memungkinkan, dan konversi `CACHE_DRIVER=redis`. | **Rendah** |
| **Kepatuhan Legal (Compliance)** | **(SELESAI)** Banner *Cookie Consent* sudah ditambahkan dan halaman *Privacy Policy* / *ToS* sudah aktif. | Ada *Cookie Consent Banner* untuk pengunjung dari region tertentu, dan kebijakan mengikat secara hukum. | Review konten teks dari *Privacy Policy* dan penyesuaian jika diperlukan. | **✔ Selesai** |

---

## 3. Checklist Pre-Deployment (Wajib Diikuti)
Pastikan semua langkah ini dieksekusi oleh Administrator atau Tim DevOps sebelum mengarahkan domain utama ke server produksi:

### Server & Environment (Production)
- [ ] Ubah environment: `APP_ENV=production`
- [ ] Matikan debug: `APP_DEBUG=false`
- [ ] Setel App URL: `APP_URL=https://www.akaconsulting.com` (Gunakan HTTPS!)
- [ ] Pastikan ekstensi PHP yang dibutuhkan (BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML) aktif.

### Optimasi Performa (Artisan Commands)
- [ ] Cache Konfigurasi: `php artisan config:cache`
- [ ] Cache Routing: `php artisan route:cache`
- [ ] Cache Views/Blade: `php artisan view:cache`
- [ ] Cache Event: `php artisan event:cache`

### Database & Storage
- [ ] Jalankan migrasi: `php artisan migrate --force`
- [ ] (Opsional) Jalankan *Seeder* esensial jika database kosong: `php artisan db:seed --class=DatabaseSeeder --force`
- [ ] Hubungkan storage: `php artisan storage:link`
- [ ] Periksa *Permission* folder: Folder `storage/` dan `bootstrap/cache/` harus *writable* oleh web server (775 atau 755).

### Security
- [ ] Hapus data *dummy* / *testing* yang tidak relevan.
- [ ] Ganti semua kata sandi admin default dengan kata sandi yang kuat.
- [ ] Pastikan SSL/TLS sertifikat (HTTPS) sudah terpasang dan *force redirect HTTP to HTTPS* aktif.

---
*Dokumen ini disusun secara sistematis untuk memandu tim IT dan Manajerial AKA Consulting guna meminimalisir kegagalan dan memastikan sistem stabil, aman, serta profesional di tahap produksi.*
