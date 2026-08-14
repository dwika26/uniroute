# UniRoute — Frontend Specification v2 (UI-Only Build)

> Revisi dari spec sebelumnya, menyesuaikan arahan ketua tim: penambahan 2 layanan baru
> (Move-in Help, Airport Pickup), model pemilihan partner manual (bukan auto-match),
> dan pemisahan fitur Chat vs Admin Help.
> Salin seluruh isi dokumen ini ke Antigravity sebagai instruksi awal project.

---

## 0. BATASAN SCOPE (WAJIB DIPATUHI)

Ini adalah tahap **frontend-only / UI mockup**. Agent **DILARANG**:
- Membuat migration, model Eloquent, atau koneksi database apa pun
- Membuat sistem autentikasi/login yang sesungguhnya (cukup role-switcher dummy)
- Membangun algoritma matching/dispatch otomatis (lihat catatan poin 4 — keputusan desain sudah final: manual select, bukan auto-match)
- Memasang package backend tambahan (queue, broadcasting, payment gateway)
- Membuat API endpoint

Agent **WAJIB**:
- Laravel Blade + Tailwind CSS, mobile-first
- Semua data (daftar kating, status request, riwayat, chat) pakai **data dummy/statis**
- Struktur halaman dibuat reusable, karena 3 jenis layanan (Apartment Check, Move-in Help, Airport Pickup) berbagi alur yang sama — hindari duplikasi blade view, gunakan komponen/partial yang sama dengan parameter berbeda

---

## 1. Tentang Produk

UniRoute mendampingi mahasiswa Indonesia dari fase diterima (LoA) hingga benar-benar menetap di negara tujuan, lewat tiga layanan inti yang dijalankan oleh **Kating** (mahasiswa Indonesia yang sudah lebih dulu berada di negara/kota tujuan):

1. **Apartment Check** — verifikasi langsung kondisi tempat tinggal/listing sebelum klien membayar dari jarak jauh
2. **Move-in Help** — bantuan saat hari kepindahan (urus barang, orientasi awal di tempat tinggal baru)
3. **Airport Pickup** — penjemputan di bandara saat klien pertama kali tiba

Selain tiga layanan transaksional itu, ada **Chat dengan Kating** (komunikasi umum, tidak harus terikat satu layanan spesifik) dan **Admin Help** (jalur eskalasi ke tim internal untuk komplain/masalah di luar kapasitas kating).

---

## 2. Keputusan Desain Penting (Catatan dari Diskusi Tim)

Dua keputusan ini sengaja dicatat eksplisit di sini supaya tidak berubah tanpa sadar saat development jalan:

**a. Model pemilihan partner: Manual select, bukan auto-match.**
Klien melihat daftar Kating yang tersedia (filter kota/negara, layanan yang ditawarkan, rating), lalu memilih sendiri. Ini keputusan sadar karena dua alasan: (1) di tahap awal jumlah kating per kota masih sedikit, sehingga algoritma auto-match tidak punya cukup data untuk dioptimasi; (2) ini layanan high-trust (verifikasi tempat tinggal, jemput di bandara), klien wajar ingin tahu siapa yang menangani, bukan diacak seperti dispatch ojek online. Opsi "carikan otomatis" bisa ditambahkan belakangan sebagai shortcut, bukan pengganti.

**b. Chat dengan Kating bersifat umum, bukan cuma per-job.**
Karena model pemilihannya manual (klien browse profil kating sebelum memilih), chat dibuka dari halaman profil kating — klien bisa tanya-tanya dulu sebelum mengajukan layanan apa pun. Ini konsisten dengan alasan poin (a): klien perlu membangun trust ke kating tertentu sebelum komit memakai jasanya. Chat tetap lanjut jadi histori percakapan begitu ada layanan yang diambil.

**c. Admin Help tetap terpisah dari Chat-kating**, karena fungsinya beda kelas — eskalasi/komplain ke tim internal, bukan obrolan ke partner lapangan. Fitur "Forum" dari mockup awal dihapus, digantikan Chat-kating yang lebih personal dan punya tujuan jelas.

---

## 3. Role Pengguna

| Role | Deskripsi |
|---|---|
| **Klien** | Mahasiswa Indonesia yang memakai layanan |
| **Kating** | Mahasiswa Indonesia di negara/kota tujuan, penyedia jasa lapangan |
| **Admin** | Tim internal — moderasi, approval, support |

---

## 4. Daftar Halaman per Role

### A. Role: Klien

1. **Landing Page** — hero, 4 kartu layanan (Apartment Check, Move-in Help, Airport Pickup, Chat dengan Kating), search kampus internasional, akses ke Admin Help
2. **Search/Browse Kampus** — daftar kampus internasional dengan filter negara/jurusan (data dummy)
3. **Browse Kating** — daftar kating tersedia, filter kota/negara dan jenis layanan yang ditawarkan, kartu profil ringkas (foto, kampus asal, rating, jumlah job selesai)
4. **Profil Kating (Detail)** — bio lengkap, layanan yang ditawarkan, rating & ulasan dummy, tombol "Chat" dan "Ajukan Layanan"
5. **Form Pengajuan Layanan** — satu template form yang menyesuaikan field per jenis layanan:
   - *Apartment Check*: link listing/alamat, kota tujuan, foto dari pemilik, deadline kebutuhan
   - *Move-in Help*: tanggal kedatangan, alamat tujuan, jumlah/jenis barang bawaan, kebutuhan spesifik
   - *Airport Pickup*: tanggal & jam tiba, nomor penerbangan, bandara, jumlah penumpang, lokasi tujuan
6. **Daftar Permintaan Saya** — list status per layanan: *Menunggu Konfirmasi Kating / Sedang Berjalan / Selesai*
7. **Detail Hasil Layanan** — tampilan berbeda sesuai jenis:
   - Apartment Check → checklist verifikasi (kebersihan, kesesuaian foto, jarak kampus, keamanan, kewajaran harga) + galeri foto asli
   - Move-in Help → ringkasan bantuan yang dilakukan + foto konfirmasi
   - Airport Pickup → konfirmasi jadwal jemput + status (terkonfirmasi/selesai)
8. **Chat dengan Kating** — daftar percakapan, bisa diakses dari profil kating kapan saja
9. **Admin Help** — form/ticket terpisah untuk komplain atau pertanyaan ke tim internal
10. **Riwayat Layanan** — seluruh layanan yang pernah dipakai, lintas jenis

### B. Role: Kating

1. **Profil Saya** — data diri, kampus, kota, layanan yang ditawarkan (bisa toggle aktif/nonaktif per jenis layanan)
2. **Permintaan Masuk** — daftar pengajuan dari klien yang memilih kating ini, tombol terima/tolak
3. **Form Konfirmasi/Laporan** — template yang menyesuaikan jenis layanan (checklist untuk Apartment Check, form konfirmasi untuk Move-in Help & Airport Pickup)
4. **Layanan Aktif** — daftar job yang sedang berjalan
5. **Riwayat & Insentif** — job selesai + status komisi (dummy)
6. **Inbox Chat** — percakapan dari klien, termasuk yang belum ambil layanan (sekadar tanya-tanya)

### C. Role: Admin

1. **Dashboard Ringkas** — statistik per jenis layanan (jumlah aktif, kating aktif, rata-rata waktu penyelesaian) — dummy
2. **Approval Kating** — verifikasi pendaftar baru (dokumen identitas/status mahasiswa)
3. **Monitoring Antrian** — permintaan yang belum dikonfirmasi kating mana pun, per jenis layanan
4. **Moderasi Laporan** — review hasil Apartment Check sebelum dikirim ke klien
5. **Admin Help / Support Inbox** — daftar tiket komplain dari klien, status (Baru/Diproses/Selesai)
6. **Log Chat (read-only)** — arsip percakapan klien-kating untuk keperluan dispute

---

## 5. Navigasi & Role-Switcher (Dummy Auth)

Dropdown role switcher di navbar (Klien / Kating / Admin) — state di frontend saja, tanpa validasi backend.

---

## 6. Panduan Desain

- Palet warna mengikuti identitas UniRoute (navy gelap + aksen biru-ungu/mint, lihat referensi cover proposal)
- Komponen reusable wajib: kartu profil kating, status badge, form template multi-layanan, checklist rating
- Mobile-first (±375px), lalu sesuaikan breakpoint desktop
- Tailwind utility classes, hindari custom CSS

---

## 7. Catatan Pengembangan Lanjutan (Belum Dikerjakan Sekarang)

- Database, migration, auth sungguhan
- Logic backend untuk matching manual (query filter kota/layanan/rating)
- Real-time chat (Laravel Reverb) — saat ini cukup tampilan statis/dummy messages
- Opsi "carikan otomatis" sebagai shortcut di atas model manual select — fase lanjutan, bukan prioritas
- Modul Smart Campus Finder lengkap, Escrow Payment, role Universitas (B2B) — sesuai proposal awal, fase 2
