# Aplikasi Prediksi PKH

Aplikasi ini digunakan untuk memprediksi kelayakan seseorang dalam Program Keluarga Harapan (PKH) menggunakan machine learning. Aplikasi ini dibangun menggunakan Flask sebagai backend dan Laravel sebagai frontend.

## Fitur
- Prediksi kelayakan PKH
- Integrasi Flask dan Laravel
- User authentication
- Dashboard admin

## Teknologi yang Digunakan
- Flask
- Laravel
- Python
- PHP
- HTML
- CSS
- JavaScript
- MySQL

## Instalasi
### Prasyarat
- Python 3.x
- Pip (Python package installer)
- PHP 7.x atau lebih baru
- Composer
- MySQL

### Langkah-langkah Instalasi

#### Backend (Flask)
1. Clone repository backend:
    ```sh
    git clone https://github.com/yokim05/PKH-Prediction
    cd flask
    ```

2. Buat virtual environment dan aktifkan:
    ```sh
    python -m venv venv
    source venv/bin/activate  # Pada Windows gunakan `venv\Scripts\activate`
    ```

3. Instalasi dependensi:
    ```sh
    pip install -r requirements.txt
    ```

4. Jalankan aplikasi Flask:
    ```sh
    flask run
    ```

#### Frontend (Laravel)
1. Clone repository frontend:
    ```sh
    cd pkh-jamal
    ```

2. Instalasi dependensi:
    ```sh
    composer install
    npm install
    ```

3. Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. Migrasi database:
    ```sh
    php artisan migrate
    ```

5. Jalankan aplikasi Laravel:
    ```sh
    php artisan serve
    npm run dev
    ```

## Parameter
Parameter Yang di gunakan untuk melakukan prediksi PKH meliputi
1. JUMLAH_KELUARGA
2. PENGHASILAN
3. PENDIDIKAN_TERTINGGI
4. SETATUS_RUMAH
5. PEKERJAAN
6. KONDISI_KESEHATAN

## Penggunaan
1. Akses aplikasi melalui browser dengan mengunjungi `http://localhost:8000`.
2. Login atau registrasi untuk mengakses fitur prediksi.
3. Masukkan data yang diperlukan untuk prediksi PKH.
4. Lihat hasil prediksi pada dashboard.

## Kontribusi
Jika Anda ingin berkontribusi pada proyek ini, silakan fork repository ini dan buat pull request dengan perubahan yang Anda buat.

## Penulis
- [GitHub](https://github.com/yokim05)

## Terima Kasih
Terima kasih kepada semua kontributor dan pengguna yang telah mendukung proyek ini.

