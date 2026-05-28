# Panduan Deployment & Hardening Keamanan Server
**Proyek:** Sistem Company Profile AKA Consulting (Laravel)
**Tanggal:** 28 Mei 2026
**Target:** Lingkungan Server Produksi (VPS / Shared Hosting / Cloud)

Dokumen ini berisi panduan teknis langkah demi langkah untuk melakukan instalasi sistem di server asli, dengan fokus utama pada **Keamanan Tingkat Lanjut (Security Hardening)** untuk mencegah peretasan, pencurian data, dan serangan DDoS.

---

## 1. Persiapan Deployment (Dari Lokal ke Server)
Sebelum memindahkan file, pastikan Anda telah menyiapkan aset berikut dari laptop/komputer lokal (Laragon):

1. **Database Export:** Buka phpMyAdmin / HeidiSQL, ekspor database `rakiradigital` menjadi file `.sql`.
2. **Compress File Sistem:** Jadikan seluruh folder `companyprofile` menjadi format `.zip` (Kecuali folder `node_modules` dan `.git` jika ada, untuk menghemat ukuran).

---

## 2. Standar Keamanan Infrastruktur (Server & Network)

### A. Konfigurasi WAF (Web Application Firewall)
Karena website konsultasi berisiko menerima serangan siber atau *spamming*, penggunaan WAF sangat diwajibkan.
*   **Implementasi Cloudflare (Rekomendasi Utama):**
    1. Arahkan *Nameserver* domain Anda ke Cloudflare.
    2. Aktifkan mode **"Proxy (Orange Cloud)"** agar IP asli server Anda tersembunyi dari publik.
    3. Di menu *Security > WAF*, aktifkan **"Bot Fight Mode"** untuk memblokir bot berbahaya.
    4. Atur *Security Level* menjadi **Medium** atau **High**.
    5. Paksa penggunaan HTTPS dengan mengaktifkan **"Always Use HTTPS"**.

### B. Proteksi Direktori & File Permissions (Linux/Unix)
Pastikan kepemilikan file di server (VPS) sudah benar agar *hacker* tidak bisa menanamkan *malware* (backdoor) ke dalam server:
*   Setel *owner* folder ke user web server (misal: `www-data` atau `nginx`):
    ```bash
    chown -R www-data:www-data /var/www/companyprofile
    ```
*   Setel hak akses folder ke `755` (Hanya pemilik yang bisa memodifikasi, orang lain hanya bisa membaca/mengeksekusi):
    ```bash
    find /var/www/companyprofile -type d -exec chmod 755 {} \;
    ```
*   Setel hak akses file ke `644`:
    ```bash
    find /var/www/companyprofile -type f -exec chmod 644 {} \;
    ```
*   **Pengecualian Mutlak:** Folder `storage` dan `bootstrap/cache` WAJIB memiliki akses tulis (`775`):
    ```bash
    chmod -R 775 /var/www/companyprofile/storage
    chmod -R 775 /var/www/companyprofile/bootstrap/cache
    ```

---

## 3. Hardening Keamanan Aplikasi (Laravel)

### A. Hashing & Kriptografi
Secara default Laravel menggunakan algoritma Bcrypt. Untuk keamanan tingkat militer, pastikan konfigurasi *hashing* tidak pernah diturunkan standar keamanannya.
*   **Algoritma Sandi:** Pastikan di file `config/hashing.php`, `driver` di-set ke `bcrypt` dengan pengaturan *rounds* minimum `12`, atau gunakan algoritma `argon2id` jika server Anda sangat mumpuni.
*   **APP_KEY:** File `.env` di server produksi harus menggunakan kunci rahasia (*cipher*) yang unik. Jalankan perintah ini di server **hanya sekali** saat instalasi:
    ```bash
    php artisan key:generate
    ```

### B. Proteksi Environment (.env)
File `.env` berisi seluruh kata sandi database dan SMTP. File ini **haram** untuk bisa diakses melalui browser (contoh: `domain.com/.env`).
*   **Document Root:** Pastikan web server (Apache/Nginx) Anda mengarahkan *Document Root* ke folder `public/`, BUKAN ke *root* folder aplikasi.
    * *Benar:* `/var/www/companyprofile/public`
    * *Salah:* `/var/www/companyprofile`
*   Setel di dalam `.env` server:
    ```env
    APP_ENV=production
    APP_DEBUG=false
    ```

### C. Keamanan Database
*   **Disable Remote Root Access:** Pastikan user `root` MySQL tidak bisa diakses dari luar IP server (127.0.0.1).
*   **Buat Dedicated User:** Jangan gunakan user `root` di dalam file `.env`. Buat *user* MySQL khusus (contoh: `aka_dbuser`) yang hanya memiliki hak akses penuh (*GRANT ALL*) khusus ke database proyek ini saja.

### D. Keamanan HTTP Headers
Tambahkan konfigurasi di Nginx (`nginx.conf`) atau Apache (`.htaccess`) untuk memaksa browser menerapkan *Security Headers*:
```apache
# Contoh di .htaccess (jika memakai Apache)
Header set X-Frame-Options "SAMEORIGIN"
Header set X-XSS-Protection "1; mode=block"
Header set X-Content-Type-Options "nosniff"
Header set Strict-Transport-Security "max-age=31536000; includeSubDomains"
# Sembunyikan versi PHP
Header unset X-Powered-By
```

---

## 4. Langkah Akhir di Server Produksi
Setelah seluruh konfigurasi di atas diterapkan, jalankan perintah final ini di terminal server Anda untuk mengoptimalkan performa dan menginstal *package* yang sebelumnya gagal di OS Windows (Spatie Backup):

```bash
# 1. Install seluruh dependensi, termask Spatie Backup (berfungsi baik di Linux)
composer install --optimize-autoloader --no-dev

# 2. Aktifkan Symlink untuk gambar/media
php artisan storage:link

# 3. Optimasi Cache (Routing, Config, Views) untuk mempercepat loading web hingga 70%
php artisan optimize

# 4. (Opsional) Setup Crontab Linux untuk menjalankan Backup Otomatis
# Tambahkan baris ini ke crontab server:
# * * * * * cd /var/www/companyprofile && php artisan schedule:run >> /dev/null 2>&1
```

Sistem kini siap diluncurkan ke publik dengan arsitektur korporat yang kokoh dan kebal dari eksploitasi peretas standar.
