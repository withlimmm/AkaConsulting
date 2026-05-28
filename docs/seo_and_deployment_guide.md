# Panduan Optimasi SEO & Auto-Deployment Hostinger
**Proyek:** Company Profile AKA Consulting
**Pembaruan Terakhir:** 28 Mei 2026

Dokumen ini adalah panduan operasional wajib bagi Admin/Pemilik Web untuk memaksimalkan fitur yang baru saja ditanamkan ke dalam sistem (SEO Skor 100) serta panduan mendeploy web dari GitHub ke Hostinger tanpa menyebabkan sistem rusak.

---

## BAGIAN 1: KONFIGURASI SEO, GEO & ANALYTICS

Sistem ini baru saja dilengkapi dengan fitur SEO berstandar tinggi yang menargetkan audiens lokal (Local SEO). Untuk mengaktifkannya, ikuti langkah berikut:

### 1. Konfigurasi Google Analytics 4 (GA4)
*   **Fungsi:** Mengetahui berapa banyak orang yang masuk ke website Anda, halaman mana yang paling disukai, dan dari mana mereka berasal (Instagram, Google, dll).
*   **Langkah Optimasi:**
    1. Kunjungi [analytics.google.com](https://analytics.google.com) dan buat properti baru untuk website AKA Consulting.
    2. Selesaikan pendaftaran hingga Anda mendapatkan kode **Measurement ID** (formatnya: `G-XXXXXXXXXX`).
    3. Buka file `.env` di panel Hostinger Anda.
    4. Tambahkan atau perbarui baris ini:
       ```env
       GA_MEASUREMENT_ID=G-XXXXXXXXXX
       ```
    5. *Script* pelacakan akan otomatis aktif di seluruh halaman website tanpa perlu mengotak-atik kodenya lagi.

### 2. Konfigurasi Google Search Console (GSC)
*   **Fungsi:** Mengirimkan *blueprint* website ke Google agar artikel dan layanan Anda muncul di halaman pertama pencarian.
*   **Langkah Optimasi:**
    1. Kunjungi [search.google.com/search-console](https://search.google.com/search-console).
    2. Tambahkan Properti baru dan pilih metode **URL Prefix** (masukkan `https://www.domainanda.com`).
    3. Pilih metode verifikasi **HTML Tag**. Anda akan diberikan sebaris kode meta seperti ini: `<meta name="google-site-verification" content="kode_rahasia_anda">`.
    4. Salin `kode_rahasia_anda` tersebut.
    5. Buka file `.env` di Hostinger dan tambahkan baris:
       ```env
       GOOGLE_SITE_VERIFICATION=kode_rahasia_anda
       ```
    6. Kembali ke GSC, klik **Verify**.
    7. **Wajib:** Di menu sebelah kiri GSC, klik menu **Sitemaps**, lalu masukkan `sitemap.xml` dan klik Submit. Ini akan memaksa Google langsung mengindeks halaman Anda karena *Sitemap* otomatis sudah tertanam di sistem.

### 3. Local SEO (GEO Tags)
*   **Fungsi:** Mendorong profil AKA Consulting muncul paling atas ketika calon klien di radius Jakarta mencari "Konsultan Hukum Terdekat".
*   **Kondisi Saat Ini:** Sudah dikonfigurasi secara baku (Hard-coded) di dalam `main.blade.php` dengan koordinat DKI Jakarta (`ID-JK`, `-6.208763, 106.845599`). Anda tidak perlu melakukan apa-apa lagi di bagian ini, cukup pastikan Alamat di halaman admin disesuaikan jika kantor Anda berpindah tempat.

---

## BAGIAN 2: PANDUAN DEPLOYMENT (GITHUB KE HOSTINGER)

Karena Anda menggunakan alur Auto-Deploy dari GitHub ke Hostinger, ada potensi website Anda "tidak berbaju" (tampilannya hancur tanpa CSS) jika tidak hati-hati, karena Vite (Tailwind) mengabaikan folder CSS dari Git. Ikuti prosedur ini agar aman:

### Langkah 1: Persiapan di Komputer Lokal (VSCode)
Sebelum melakukan `git push` ke GitHub, persiapkan *file asset*-nya:
1. Buka Terminal di VSCode dan ketik: `npm run build`. (Ini akan meng-compile *Tailwind CSS* dan JS).
2. Buka file `.gitignore` di folder utama Anda.
3. Cari tulisan `/public/build` lalu **HAPUS** baris tersebut dan simpan. (Ini berguna agar file *style* web ikut terbawa ke GitHub).
4. Di terminal, eksekusi pembaruan Git Anda:
   ```bash
   git add .
   git commit -m "Build assets and SEO security updates"
   git push origin main
   ```

### Langkah 2: Proses di Hostinger (Auto-Deploy)
Ketika Git ter-push, Hostinger otomatis menarik (*pull*) data terbaru. Sistem Anda **tidak akan rusak atau duplikat** karena lapisan keamanannya sudah kita buat tebal. Lakukan penyelesaian (*Post-Deploy*) ini:

1. Buka fitur **SSH / Terminal** di hPanel Hostinger.
2. Masuk ke direktori web Anda (contoh: `cd domains/domainanda.com/public_html`).
3. Jalankan perintah instalasi pustaka Laravel:
   ```bash
   composer install --optimize-autoloader --no-dev
   ```
4. Buat tautan gambar/penyimpanan publik:
   ```bash
   php artisan storage:link
   ```
5. Susun struktur database & suntikkan data konten profesional yang sudah kita bangun:
   ```bash
   php artisan migrate --force
   php artisan db:seed --class=ContentSeeder --force
   ```
   *(Tenang saja, karena menggunakan fitur `firstOrCreate()`, database Anda tidak akan menjadi *double* / ganda meskipun ini dijalankan berulang kali).*
6. Maksimalkan kecepatan *loading* website (Optimasi Cache):
   ```bash
   php artisan optimize
   ```

### Langkah 3: Mengunci Keamanan Server (.env)
*File* keamanan ekstra (`.htaccess`) sudah saya sediakan di dalam aplikasi Anda untuk menjaga `.env`. Hal terakhir yang perlu Anda lakukan di File Manager Hostinger adalah mengedit file `.env` di Hostinger dengan pengaturan standar *Production*:

```env
APP_NAME="AKA Consulting"
APP_ENV=production
APP_KEY=isi_dengan_key_yang_ada
APP_DEBUG=false
APP_URL=https://www.domainanda.com

# Isi kredensial Database Hostinger Anda
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=user_database_anda
DB_PASSWORD=password_database_anda

# Konfigurasi SEO Analytics Anda
GA_MEASUREMENT_ID=G-XXXXXXXXXX
GOOGLE_SITE_VERIFICATION=kode_rahasia_anda

# Jika Ingin Fitur Notifikasi Email Admin & Klien Berfungsi
MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=465
MAIL_USERNAME=admin@domainanda.com
MAIL_PASSWORD=password_email_anda
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="admin@domainanda.com"
MAIL_FROM_NAME="AKA Consulting"
```

Setelah `.env` disimpan, website Anda sudah berhasil *Go-Live* secara optimal, kencang, dan aman untuk bersaing di halaman Google!
