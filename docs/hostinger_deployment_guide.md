# 🚀 Panduan Lengkap Deployment GitHub Actions → Hostinger
### AKA Consulting · akagroupconsulting.com

> Panduan ini menjelaskan cara men-deploy aplikasi Laravel secara **otomatis** menggunakan GitHub Actions. Setiap kali Anda `git push`, pipeline akan berjalan sendiri: build → deploy → migrasi → cache.

---

## 📋 Daftar Isi

1. [Gambaran Umum Alur](#1-gambaran-umum-alur)
2. [Persiapan Awal di Hostinger (Sekali Saja)](#2-persiapan-awal-di-hostinger-sekali-saja)
3. [Setup SSH Key untuk GitHub Actions](#3-setup-ssh-key-untuk-github-actions)
4. [Konfigurasi GitHub Secrets](#4-konfigurasi-github-secrets)
5. [Push Kode ke GitHub](#5-push-kode-ke-github)
6. [Memantau Proses Deploy](#6-memantau-proses-deploy)
7. [Setup Pertama di Server (Hanya Sekali)](#7-setup-pertama-di-server-hanya-sekali)
8. [Verifikasi Website Live](#8-verifikasi-website-live)
9. [Cara Update Setelah Live](#9-cara-update-setelah-live)
10. [Troubleshooting](#10-troubleshooting)

---

## 1. Gambaran Umum Alur

```
[Komputer Lokal]
      │
      │  git push origin main
      ▼
[GitHub Repository]
      │
      │  GitHub Actions otomatis berjalan (.github/workflows/deploy.yml)
      ▼
[GitHub Actions Runner (Ubuntu)]
      │
      ├── Install PHP & Node.js
      ├── composer install
      ├── npm run build (build CSS/JS)
      ├── Buat file .env production
      └── rsync semua file ke Hostinger via SSH
      ▼
[Hostinger Server]
      │
      ├── Salin public/ ke public_html/
      ├── Perbaiki path index.php
      ├── php artisan migrate --force
      └── php artisan optimize
      ▼
[Website Live ✅]
```

**Keuntungan pendekatan ini:**
- Anda tidak perlu SSH manual setiap update
- Kode sensitif (.env, password) tersimpan di GitHub Secrets, bukan di kode
- Build asset (CSS/JS) dilakukan di server CI, bukan di laptop Anda
- Rollback mudah lewat GitHub jika ada masalah

---

## 2. Persiapan Awal di Hostinger (Sekali Saja)

### 2.1 Login hPanel

1. Buka **hpanel.hostinger.com** → login
2. Pilih domain **akagroupconsulting.com** → klik **Manage**

### 2.2 Cek & Atur PHP 8.2

1. Menu **Advanced** → **PHP Configuration**
2. Pilih **PHP 8.2** → Save

### 2.3 Aktifkan SSL

1. Menu **Security** → **SSL/TLS**
2. Klik **Install** pada domain akagroupconsulting.com
3. Tunggu hingga status **Active**

### 2.4 Aktifkan SSH Access

1. Menu **Advanced** → **SSH Access**
2. Klik **Enable**
3. Catat informasi:
   - **Hostname:** Hostname SSH (biasanya IP server, contoh: `185.x.x.x`)
   - **Port:** `65002`
   - **Username:** username Anda (contoh: `u408052271`)

### 2.5 Buat Database MySQL

1. Menu **Databases** → **MySQL Databases**
2. Klik **Create Database**
3. Isi nama, username, dan password
4. **CATAT** semua informasi ini (akan dipakai di GitHub Secrets)

Contoh hasil:
```
Database Name : u408052271_akadb
DB Username   : u408052271_akauser
DB Password   : (password yang Anda buat)
```

---

## 3. Setup SSH Key untuk GitHub Actions

GitHub Actions perlu "kunci" untuk bisa masuk ke server Hostinger Anda. Kita akan membuat SSH Key baru khusus untuk keperluan ini.

### 3.1 Buat SSH Key di Komputer Lokal

Buka terminal (PowerShell atau CMD) dan jalankan:

```bash
# Buat SSH key baru (khusus untuk GitHub Actions)
ssh-keygen -t ed25519 -C "github-actions-aka-consulting" -f ~/.ssh/aka_deploy_key

# Saat ditanya passphrase, tekan Enter (biarkan kosong)
```

Perintah ini menghasilkan 2 file:
- `~/.ssh/aka_deploy_key` → **Private Key** (untuk GitHub Secrets)
- `~/.ssh/aka_deploy_key.pub` → **Public Key** (untuk Hostinger server)

### 3.2 Daftarkan Public Key ke Hostinger

Login SSH ke server Hostinger terlebih dahulu:

```bash
ssh u408052271@IP_SERVER_ANDA -p 65002
```

Setelah masuk, jalankan perintah berikut untuk menambahkan public key:

```bash
# Buat folder .ssh jika belum ada
mkdir -p ~/.ssh
chmod 700 ~/.ssh

# Salin isi public key (ganti isinya dengan hasil cat di bawah)
nano ~/.ssh/authorized_keys
```

Di komputer lokal (terminal baru), tampilkan isi public key:

```bash
cat ~/.ssh/aka_deploy_key.pub
```

Salin seluruh output (dimulai dari `ssh-ed25519 AAAA...`), tempelkan ke file `authorized_keys` di server Hostinger.

Simpan file (Ctrl+X → Y → Enter), lalu set permission:

```bash
chmod 600 ~/.ssh/authorized_keys
```

### 3.3 Tampilkan Private Key (untuk GitHub)

Di komputer lokal, jalankan:

```bash
cat ~/.ssh/aka_deploy_key
```

Salin **seluruh isinya** termasuk baris `-----BEGIN OPENSSH PRIVATE KEY-----` dan `-----END OPENSSH PRIVATE KEY-----`. Ini akan dipakai di langkah berikutnya.

---

## 4. Konfigurasi GitHub Secrets

GitHub Secrets adalah tempat menyimpan nilai sensitif (password, kunci SSH, dll.) yang akan dipakai oleh GitHub Actions tanpa terekspos ke publik.

### 4.1 Buka Halaman Secrets di GitHub

1. Buka repository GitHub Anda
2. Klik tab **Settings** (bukan settings akun, tapi settings repository)
3. Di sidebar kiri: **Secrets and variables** → **Actions**
4. Klik **New repository secret**

### 4.2 Daftar Secrets yang Perlu Dibuat

Buat satu per satu semua secrets berikut:

| Nama Secret | Nilai | Keterangan |
|-------------|-------|------------|
| `HOSTINGER_HOST` | `185.x.x.x` | IP server Hostinger Anda |
| `HOSTINGER_PORT` | `65002` | Port SSH Hostinger |
| `HOSTINGER_USERNAME` | `u408052271` | Username SSH Anda |
| `HOSTINGER_SSH_PRIVATE_KEY` | `-----BEGIN OPENSSH...` | Isi private key dari langkah 3.3 |
| `DB_DATABASE` | `u408052271_akadb` | Nama database (dengan prefix) |
| `DB_USERNAME` | `u408052271_akauser` | Username database (dengan prefix) |
| `DB_PASSWORD` | `password_db_anda` | Password database |
| `MAIL_USERNAME` | `info@akagroupconsulting.com` | Email Hostinger |
| `MAIL_PASSWORD` | `password_email_anda` | Password email |
| `SENTRY_LARAVEL_DSN` | `https://dd15afe8...` | DSN Sentry (dari dashboard Sentry) |

### 4.3 Cara Menambahkan Setiap Secret

Untuk setiap baris di tabel atas:
1. Klik **New repository secret**
2. Isi **Name** (persis seperti di kolom "Nama Secret" — huruf besar semua)
3. Isi **Secret** (nilai dari kolom "Nilai")
4. Klik **Add secret**

> **PENTING:** Untuk `HOSTINGER_SSH_PRIVATE_KEY`, salin seluruh isi file private key termasuk baris `-----BEGIN OPENSSH PRIVATE KEY-----` dan `-----END OPENSSH PRIVATE KEY-----`

---

## 5. Push Kode ke GitHub

Setelah semua secrets terkonfigurasi, sekarang push kode:

```bash
# Pastikan semua file sudah di-commit
git add .
git commit -m "feat: setup GitHub Actions deploy pipeline"
git push origin main
```

Segera setelah push, GitHub Actions akan **otomatis berjalan**.

---

## 6. Memantau Proses Deploy

### 6.1 Lihat Progress Deploy

1. Buka repository GitHub Anda
2. Klik tab **Actions**
3. Anda akan melihat workflow yang sedang berjalan bernama **"🚀 Deploy AKA Consulting to Hostinger"**
4. Klik untuk melihat detail setiap langkah

### 6.2 Arti Status

| Status | Arti |
|--------|------|
| 🟡 Kuning (running) | Proses sedang berjalan, tunggu ~3-5 menit |
| ✅ Hijau (success) | Deploy berhasil! Website sudah terupdate |
| ❌ Merah (failed) | Ada error, klik untuk melihat log detail |

### 6.3 Estimasi Waktu

Proses deploy pertama biasanya membutuhkan waktu **3-7 menit**. Deploy berikutnya lebih cepat karena ada caching.

---

## 7. Setup Pertama di Server (Hanya Sekali)

Setelah deploy pertama berhasil (status hijau di GitHub Actions), Anda perlu melakukan satu langkah manual via SSH: **menjalankan seeder** untuk mengisi data awal.

```bash
# Login SSH ke Hostinger
ssh u408052271@IP_SERVER_ANDA -p 65002

# Masuk ke folder project
cd ~/domains/akagroupconsulting.com/CompanyProfile

# Isi data awal (admin, kategori, layanan)
php artisan db:seed --force

# Verifikasi storage link (jika belum ada)
php artisan storage:link || true
```

> **Kenapa db:seed tidak dijalankan otomatis di pipeline?** Karena seeder berisi data awal yang hanya perlu diisi sekali. Jika dijalankan otomatis setiap deploy, data yang sudah diubah admin bisa kembali ke data awal.

---

## 8. Verifikasi Website Live

Setelah seeder berjalan, cek semua ini:

### Checklist Wajib

| # | Yang Dicek | URL / Cara |
|---|------------|------------|
| 1 | Halaman utama terbuka | `https://akagroupconsulting.com` |
| 2 | HTTPS aktif (gembok hijau) | Lihat address bar browser |
| 3 | Halaman Layanan tampil | `https://akagroupconsulting.com/layanan` |
| 4 | Form konsultasi berfungsi | Isi dan submit form di homepage |
| 5 | Admin bisa login | `https://akagroupconsulting.com/admin/login` |
| 6 | Gambar upload tampil | Upload gambar dari admin, cek di frontend |

### Checklist Keamanan

| # | Tes | Hasil yang Diharapkan |
|---|-----|----------------------|
| 1 | Akses `.env` | `https://akagroupconsulting.com/.env` → **404 atau 403** |
| 2 | Akses storage | `https://akagroupconsulting.com/storage` → **403** |
| 3 | Error page | Buat URL asal-asalan → tampil halaman 404 cantik, bukan error PHP |

### Verifikasi Google Search Console

1. Buka [Google Search Console](https://search.google.com/search-console)
2. Pilih domain `akagroupconsulting.com`
3. Klik tombol **Verifikasi**
4. Harus muncul pesan **"Kepemilikan telah diverifikasi"**

---

## 9. Cara Update Setelah Live

Setelah website live, proses update sangat mudah:

### Update Kode / Tampilan / Fitur

```bash
# 1. Edit kode di komputer lokal

# 2. Simpan dan commit perubahan
git add .
git commit -m "update: deskripsi perubahan yang dilakukan"

# 3. Push ke GitHub
git push origin main

# GitHub Actions otomatis berjalan, selesai dalam ~3 menit ✅
```

### Update Database (Jika Ada Migrasi Baru)

Migrasi database sudah dijalankan **otomatis** oleh GitHub Actions (`php artisan migrate --force`). Anda tidak perlu melakukan apa pun secara manual.

### Update Konten Admin (Tambah Layanan, Blog, dll.)

Login ke `https://akagroupconsulting.com/admin/login` dan kelola konten langsung dari dashboard admin. Tidak perlu deploy ulang.

---

## 10. Troubleshooting

### ❌ Error: "Permission denied (publickey)"

**Penyebab:** Private key di GitHub Secrets tidak cocok dengan public key di server.

**Solusi:**
1. Pastikan public key sudah ada di `~/.ssh/authorized_keys` di server
2. Pastikan isi `HOSTINGER_SSH_PRIVATE_KEY` di GitHub Secrets adalah **private key** (bukan public key)
3. Pastikan private key disalin lengkap termasuk baris `-----BEGIN` dan `-----END`

### ❌ Error: "SQLSTATE: Access denied for user"

**Penyebab:** Credentials database di GitHub Secrets salah.

**Solusi:**
1. Cek kembali `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` di GitHub Secrets
2. Pastikan nama database dan username sudah menyertakan prefix Hostinger (misal: `u408052271_`)

### ❌ Error 500 Setelah Deploy

**Penyebab:** Biasanya permission folder atau `.env` belum lengkap.

**Solusi via SSH:**
```bash
cd ~/domains/akagroupconsulting.com/CompanyProfile
chmod -R 775 storage
chmod -R 775 bootstrap/cache
php artisan optimize:clear
php artisan optimize
```

### ❌ Gambar Tidak Tampil

**Penyebab:** Storage symlink belum terbuat.

**Solusi:**
```bash
cd ~/domains/akagroupconsulting.com/CompanyProfile
php artisan storage:link
```

### ❌ Workflow Tidak Berjalan Setelah Push

**Penyebab:** File `deploy.yml` tidak ada atau syntax salah.

**Solusi:**
1. Pastikan file ada di `.github/workflows/deploy.yml`
2. Cek tab **Actions** di GitHub — ada pesan error syntax?
3. Pastikan branch yang di-push adalah `main` (bukan `master`)

### ❌ Website Masih Tampil Versi Lama

**Penyebab:** Cache server belum ter-clear.

**Solusi via SSH:**
```bash
cd ~/domains/akagroupconsulting.com/CompanyProfile
php artisan optimize:clear
php artisan optimize
php artisan view:cache
```

---

## 📋 Ringkasan Semua Secrets yang Dibutuhkan

Simpan tabel ini sebagai referensi:

| GitHub Secret | Cara Mendapatkan |
|---------------|------------------|
| `HOSTINGER_HOST` | hPanel → SSH Access → Hostname |
| `HOSTINGER_PORT` | Biasanya `65002` |
| `HOSTINGER_USERNAME` | hPanel → SSH Access → Username |
| `HOSTINGER_SSH_PRIVATE_KEY` | Langkah 3: `cat ~/.ssh/aka_deploy_key` |
| `DB_DATABASE` | hPanel → MySQL Databases → nama DB |
| `DB_USERNAME` | hPanel → MySQL Databases → username |
| `DB_PASSWORD` | Password yang Anda buat saat membuat DB |
| `MAIL_USERNAME` | hPanel → Email → Email address Anda |
| `MAIL_PASSWORD` | Password email Hostinger |
| `SENTRY_LARAVEL_DSN` | Dashboard Sentry → Project Settings → Client Keys |

---

*Panduan ini dibuat untuk AKA Consulting · Versi 2.0 dengan GitHub Actions*
