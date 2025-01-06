# 🌟 **Laravel Inventory Management System** 🌟

Sistem ini adalah aplikasi manajemen inventaris berbasis Laravel. Dengan fitur CRUD lengkap untuk kategori barang, barang, satuan unit (UOM), dan inventaris masuk (inbound) serta keluar (outbound), sistem ini dirancang untuk mempermudah pengelolaan inventaris.

---

## 💻 **Teknologi yang Digunakan**

1. **Backend**: Laravel 10.x
2. **Frontend**: Blade Template dengan Bootstrap 5
3. **Database**: MySQL
4. **JavaScript Library**: jQuery dan DataTables

---


## **📂 Struktur Folder**
### **Database**
- file db_lvinventory.sql

### **Views**

- **`include/`**

  - `head.blade.php` : Template untuk CSS, JavaScript, dan navbar.
  - `footer.blade.php` : Template untuk footer dengan import script (jQuery, Bootstrap, DataTables).

- **`inventory/`**

  - `index.blade.php` : Halaman utama untuk melihat data inbound dan outbound.
  - `edit.blade.php` : Form untuk mengedit data inbound/outbound.
  - `tambah.blade.php` : Form untuk menambahkan data inbound/outbound.

- **`item/`**

  - `index.blade.php` : Halaman utama untuk melihat daftar item.
  - `edit.blade.php` : Form untuk mengedit item.
  - `tambah.blade.php` : Form untuk menambahkan item baru.

- **`item_category/`**

  - `index.blade.php` : Halaman utama untuk melihat kategori barang.
  - `edit.blade.php` : Form untuk mengedit kategori barang.
  - `tambah.blade.php` : Form untuk menambahkan kategori baru.

- **`uom/`**

  - `index.blade.php` : Halaman utama untuk melihat daftar satuan unit (UOM).
  - `edit.blade.php` : Form untuk mengedit UOM.
  - `tambah.blade.php` : Form untuk menambahkan UOM baru.

---

## 📚 **Database**

### Nama Database: **`db_lvinventory`**

Tabel yang digunakan:

1. **`item`**: Data barang (SKU, nama, kategori, stok, status).
2. **`item_category`**: Kategori barang.
3. **`uom`**: Satuan unit (Unit of Measurement).
4. **`inbound`**: Data barang masuk.
5. **`outbound`**: Data barang keluar.

---

## 📘 **Panduan Instalasi**

### **1. Clone Repository**

```bash
git clone <URL_REPOSITORY>
cd <nama_proyek>
```

### **2. Install Dependency**

- **Composer**:
  ```bash
  composer install
  ```
- **NPM**:
  ```bash
  npm install && npm run dev
  ```

### **3. Konfigurasi Environment**

1. Salin file `.env.example` ke `.env`:

   ```bash
   cp .env.example .env
   ```

2. Atur koneksi database di file `.env`:

   ```env
   DB_DATABASE=db_lvinventory
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

3. Generate application key:

   ```bash
   php artisan key:generate
   ```

### **4. Jalankan Migrasi dan Seeder**

```bash
php artisan migrate --seed
```

### **5. Jalankan Aplikasi**

```bash
php artisan serve
```

Buka di browser: [http://localhost:8000](http://localhost:8000)

---

## 🔧 **Tips Troubleshooting**

- Jika terjadi masalah cache, jalankan:

  ```bash
  php artisan config:clear
  php artisan cache:clear
  php artisan view:clear
  ```

- Pastikan environment sudah benar pada file `.env`.

---

## ✨ **Kontributor**

Terima kasih kepada saya yang telah berkontribusi untuk proyek ngebut ini. 😊

