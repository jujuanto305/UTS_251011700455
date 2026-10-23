# UTS Rekayasa Web - Portal Lowongan Kerja (NIM berakhiran 5)

## 1. Buat proyek Laravel 13
```
composer create-project laravel/laravel UTS_NIM
cd UTS_NIM
```

## 2. Salin file dari folder ini ke proyek (timpa jika diminta)
app/, database/, resources/, routes/, public/  (Bootstrap sudah ada di public/Bootstrap)

## 3. Hapus migration bawaan queue (bentrok dengan tabel `jobs`)
Hapus file: database/migrations/0001_01_01_000002_create_jobs_table.php

## 4. Edit .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_uts_NIM        # ganti NIM dengan NIM kamu
DB_USERNAME=root
DB_PASSWORD=

QUEUE_CONNECTION=sync
SESSION_DRIVER=file
CACHE_STORE=file
```
Buat database `db_uts_NIM` di phpMyAdmin/Laragon.

## 5. Jalankan
```
php artisan migrate
php artisan db:seed
php artisan serve
```
Buka http://127.0.0.1:8000
