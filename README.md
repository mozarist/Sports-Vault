# 🏀 Sports Vault
Aplikasi Web Manajemen Inventaris Perlengkapan Olahraga berbasis Laravel + Breeze.  
Sports Vault membantu sekolah, komunitas, atau organisasi dalam mengelola data inventaris perlengkapan olahraga dengan lebih mudah, rapi, dan efisien.

---

# 📂 Tech Stack

Laravel - Backend Framework

Laravel Breeze - Authentication Starter Kit

Tailwind CSS - Frontend Styling

[MySQL] - Database

Vite - Build Tool

---

## 🚀 Fitur Utama
- Autentikasi pengguna (Laravel Breeze).
- Manajemen data perlengkapan olahraga.
- Penyimpanan file menggunakan Laravel Storage.
- UI modern dengan Tailwind CSS.

---

## ⚙️ Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project secara lokal:

1. **Clone Repository**
   ```bash
   https://github.com/mozarist/Sports-Vault.git
   cd Sports-Vault
2. **Install Dependencies**
   ```bash
   composer install
   npm install
3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
4. **Start Local Host (using XAMPP/Laragon**
5. **Database Migration**
   ```bash
   php artisan migrate
6. **Linking Storage**
   ```bash
   php artisan storage:link
7. **Run Application**
   ```bash
   composer run dev
8. **Run the server in command with your browser**
