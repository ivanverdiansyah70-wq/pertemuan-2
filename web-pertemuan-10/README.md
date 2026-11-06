Web Programming 1 - Sesi 10: CRUD Media (PHP File Upload, Validation, JavaScript DOM, Media Preview)

Cara menjalankan
1. Jalankan Apache dan MySQL pada Laragon.
2. Salin folder ini ke folder www Laragon, lalu buka http://localhost/web-programming-session10/
3. Jalankan database/database.sql di phpMyAdmin, lalu buka database/buat_user.php sekali untuk membuat akun admin (admin / admin123).

Struktur
config/        koneksi, auth, media_helper (uploadMedia, hapusMediaJikaAda)
pages/         login, dashboard, biodata, layout lab, data mahasiswa, tambah mahasiswa
crud/          CRUD Mahasiswa sesi sebelumnya
crud-media/    CRUD Media (index, tambah, edit)
proses/        proses CRUD Mahasiswa, login, logout
proses/crud-media/  proses tambah, update, hapus media
uploads/       images, audio, documents
assets/        css, js (crud.js, media.js), images
