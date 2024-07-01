Menjalankan project Laravel memerlukan beberapa langkah utama yang mencakup pengaturan lingkungan, instalasi dependensi, konfigurasi, dan akhirnya menjalankan server aplikasi. Berikut ini adalah panduan lengkap dan menarik untuk memulai dan menjalankan proyek Laravel Anda.

### 1. Clone Repository Proyek Laravel

Jika proyek Anda berada di repository Git, clone repository tersebut ke lokal Anda:

```bash
git clone https://github.com/juanakbar/tazkiyaconnect.git
cd repository
```

### 2. Instal Composer Dependencies

Composer adalah manajer dependensi untuk PHP, yang digunakan oleh Laravel. Instal semua dependensi proyek Laravel dengan perintah berikut:

```bash
composer install
```

### 3. Menyiapkan Environment Configuration

Salin file `.env.example` ke `.env`:

```bash
cp .env.example .env
```

Buka file `.env` dan edit konfigurasi yang diperlukan, terutama untuk database. Contoh konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

### 4. Generate Application Key

Laravel membutuhkan application key yang unik. Generate key tersebut dengan perintah:

```bash
php artisan key:generate
```

### 5. Menjalankan Migrasi dan Seeding Database

Jalankan migrasi untuk membuat tabel di database:

```bash
php artisan migrate
```

Jika Anda memiliki seeder untuk mengisi database dengan data awal, jalankan perintah berikut:

```bash
php artisan migrate:fresh --seed
```

### 6. Instal Dependencies Node.js

Jika proyek Anda menggunakan frontend tools seperti Laravel Vite, Anda perlu menginstal dependensi Node.js:

```bash
npm install
```

### 7. Compile Assets (CSS/JS)

Compile asset frontend menggunakan Laravel Vite. Untuk lingkungan pengembangan, gunakan perintah berikut:

```bash
npm run dev
```


### 8. Menjalankan Server Laravel

Jalankan server aplikasi Laravel menggunakan perintah:

```bash
php artisan serve
```

Server akan berjalan di `http://127.0.0.1:8000` secara default. Anda dapat mengakses proyek Laravel Anda melalui URL ini.

### 9. (Opsional) Menggunakan Valet (MacOS) atau Homestead (Windows/Linux)

Untuk pengalaman pengembangan yang lebih baik, Anda dapat menggunakan Laravel Valet (MacOS) atau Homestead (Windows/Linux).

#### Laravel Valet (MacOS)

Instal Laravel Valet:

```bash
composer global require laravel/valet
valet install
```

Parkir direktori proyek:

```bash
cd /path/to/your/project
valet park
```

Akses proyek Anda di `http://nama-folder-proyek.test`.

#### Laravel Homestead (Windows/Linux)

Instal Laravel Homestead dengan Vagrant dan VirtualBox. Ikuti panduan resmi [Laravel Homestead](https://laravel.com/docs/11.x/homestead) untuk instalasi dan konfigurasi.

### 10. Menggunakan Tinker untuk Pengujian Interaktif

Laravel Tinker adalah alat interaktif yang memungkinkan Anda menjalankan kode PHP di dalam konteks aplikasi Laravel Anda. Untuk menjalankan Tinker:

```bash
php artisan tinker
```

Anda dapat menggunakan Tinker untuk menguji model, query database, dan banyak lagi.

### 11. Menjalankan Pengujian Otomatis

Jika proyek Anda memiliki pengujian unit atau pengujian fitur, jalankan pengujian dengan perintah:

```bash
php artisan test
```

### Kesimpulan

Dengan mengikuti langkah-langkah di atas, Anda seharusnya dapat menjalankan proyek Laravel Anda dengan lancar. Proses ini mencakup semua langkah utama mulai dari kloning repository hingga menjalankan server Laravel dan menggunakan alat pengembangan tambahan untuk pengalaman yang lebih baik. Pastikan untuk membaca dokumentasi resmi Laravel untuk informasi lebih lanjut dan praktik terbaik.

### Entity Relationship Diagram (ERD)

![ERD Diagram](/public/assets/erd.png)

This is the Entity Relationship Diagram (ERD) for my Laravel project.
