<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


### Fitur Utama (Berdasarkan Instruksi):
- **Poin 1**: Sistem Autentikasi (Login/Logout) menggunakan Laravel Breeze.
- **Poin 2**: CRUD Manajemen Siswa.
- **Poin 3**: CRUD Manajemen Kelas.
- **Poin 4**: CRUD Manajemen Guru.
- **Poin 5**: Tampilan List Siswa per Kelas (Tanpa duplikasi nama kelas).
- **Poin 6**: Tampilan List Guru per Kelas (Tanpa duplikasi nama kelas).
- **Poin 7**: **List Master** - Satu tabel tunggal yang merangkum data Kelas, Guru, dan Siswa sekaligus.

## 🚀 Stack Teknologi
- **Framework**: Laravel 12.x
- **Frontend**: Livewire 3 & Alpine.js
- **Styling**: Tailwind CSS
- **Database**: PostgreSQL

## 🛠️ Cara Instalasi

1. **Clone repository**:
   ```bash
   git clone <"https://github.com/agusmuhamadgi/manage-sekolah.git">
   cd <"manage-sekolah">

2. **Instal dependensi:**:
    ```bash
    composer install
    npm install && npm run dev

3. **Konfigurasi Database**: 
    '''bash
    Salin file .env.example ke .env

4. **Migrasi & Generate Key**:
    ```bash
    php artisan key:generate
    php artisan migrate
    php artisan db:seed

5. **Jalankan server**:
    ```bash
    php artisan serve

