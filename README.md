# UniRoute — Dari Penerimaan Hingga Keberangkatan

Platform pendamping mahasiswa Indonesia dari fase penerimaan (LoA) hingga menetap di negara tujuan, melalui pendampingan langsung oleh **Kating** (mahasiswa Indonesia yang sudah berada di negara/kota tujuan).

## 🚀 Layanan Utama UniRoute
1. **Apartment Check** — Verifikasi langsung kondisi fisik listing apartemen sebelum klien membayar sewa jarak jauh.
2. **Move-in Help** — Bantuan saat hari kepindahan (lapor meteran utilitas, angkut koper, orientasi hunian & lingkungan).
3. **Airport Pickup** — Penjemputan di bandara dan pendampingan perjalanan hingga tiba di akomodasi.
4. **Chat Kating & Admin Help** — Konsultasi langsung dengan kating dan pusat resolusi bantuan internal.

---

## 📂 Struktur Halaman Static (.html)

Semua halaman merupakan file HTML murni yang saling terhubung tanpa membutuhkan backend/server runtime:

### Role: Klien
- `index.html` — Landing page utama (Hero, layanan, cari kampus, kating unggulan)
- `browse-kampus.html` — Pencarian & filter kampus internasional
- `browse-kating.html` — Daftar profil kating dengan filter kota/negara & layanan
- `profil-kating.html` — Detail profil kating, portofolio, ulasan & tombol aksi
- `ajukan-layanan.html` — Form pemesanan 3 jenis layanan (Apartment / Move-in / Pickup)
- `permintaan-saya.html` — Daftar antrian pesanan aktif & status verifikasi
- `detail-layanan.html` — Laporan detail hasil inspeksi checklist & foto bukti fisik
- `chat.html` — Antarmuka obrolan langsung klien & kating
- `riwayat.html` — Histori komprehensif seluruh pesanan selesai & ulasan
- `admin-help.html` — Layanan tiket bantuan dan resolusi kendala

### Role: Kating
- `kating-dashboard.html` — Ringkasan performa, job aktif, dan pendapatan
- `kating-permintaan.html` — Permintaan order baru masuk yang butuh konfirmasi
- `kating-aktif.html` — Daftar job yang sedang ditangani saat ini
- `kating-laporan.html` — Form input laporan hasil verifikasi & konfirmasi multi-layanan
- `kating-riwayat.html` — Histori pekerjaan selesai dan rincian pencairan komisi
- `kating-profil.html` — Pengaturan profil, keahlian, dan ketersediaan layanan

### Role: Admin
- `admin-dashboard.html` — Statistik operasional dan monitoring metrik platform
- `admin-approval.html` — Verifikasi kelayakan dokumen pendaftar kating baru
- `admin-antrian.html` — Monitoring antrian job yang belum diambil kating
- `admin-moderasi.html` — Review & validasi laporan inspeksi sebelum dirilis ke klien
- `admin-support.html` — Inbox tiket pengaduan klien
- `admin-log-chat.html` — Log arsip komunikasi untuk audit kepatuhan

---

## 🎨 Asset & Styling
- **CSS**: Tailwind CSS build di `build/assets/app-749JKdfD.css` dan inline styling tema UniRoute.
- **Images**: `images/logo.png`.
- **Favicon**: `favicon.ico`.
