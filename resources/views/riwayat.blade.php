@extends('layouts.app')
@section('title', 'Riwayat Layanan — UniRoute')
@section('content')

<div class="space-y-8 max-w-6xl mx-auto">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200 mb-2">
                <span>📜 Transparansi & Arsip Layanan</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Riwayat Layanan Saya</h1>
            <p class="text-sm text-slate-500 mt-1">Daftar arsip seluruh layanan yang telah selesai maupun dibatalkan, lengkap dengan bukti verifikasi dan ulasan.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="/browse-kating" class="px-5 py-2.5 rounded-xl font-bold text-xs bg-emerald-600 hover:bg-emerald-700 text-white shadow-md shadow-emerald-600/20 transition inline-flex items-center gap-2">
                <span>➕ Ajukan Layanan Baru</span>
            </a>
            <a href="/permintaan-saya" class="px-4 py-2.5 rounded-xl font-semibold text-xs border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 transition">
                <span>⏳ Pantau Antrian</span>
            </a>
        </div>
    </div>

    <!-- Summary Statistics -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block">Total Layanan</span>
            <div class="flex items-baseline gap-2 mt-2">
                <span class="text-2xl sm:text-3xl font-extrabold text-slate-900">4</span>
                <span class="text-xs font-bold text-emerald-600">3 Sukses · 1 Batal</span>
            </div>
            <span class="text-xs text-slate-400 mt-1 block">Apartment, Pickup, Move-in</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block">Total Escrow Selesai</span>
            <div class="flex items-baseline gap-2 mt-2">
                <span class="text-2xl sm:text-3xl font-extrabold text-slate-900">Rp 4.250k</span>
            </div>
            <span class="text-xs text-emerald-600 font-semibold mt-1 block">✓ 100% Aman & Terverifikasi</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block">Rata-rata Rating</span>
            <div class="flex items-baseline gap-2 mt-2">
                <span class="text-2xl sm:text-3xl font-extrabold text-amber-500">4.9</span>
                <span class="text-xs text-slate-500 font-medium">/ 5.0 (3 Ulasan)</span>
            </div>
            <span class="text-xs text-slate-400 mt-1 block">Feedback kepuasan klien</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block">Dokumen & Bukti</span>
            <div class="flex items-baseline gap-2 mt-2">
                <span class="text-2xl sm:text-3xl font-extrabold text-teal-700">18 File</span>
            </div>
            <span class="text-xs text-slate-400 mt-1 block">Foto fisik & video tersimpan</span>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0" id="filter-tabs">
            <button onclick="filterRiwayat('semua', this)" class="filter-tab px-4 py-2 rounded-xl text-xs font-bold bg-slate-900 text-white transition">
                Semua Layanan (4)
            </button>
            <button onclick="filterRiwayat('apartment', this)" class="filter-tab px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200 transition">
                🏢 Apartment Check (2)
            </button>
            <button onclick="filterRiwayat('pickup', this)" class="filter-tab px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200 transition">
                ✈️ Airport Pickup (1)
            </button>
            <button onclick="filterRiwayat('movein', this)" class="filter-tab px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200 transition">
                📦 Move-in Help (1)
            </button>
        </div>

        <div class="relative w-full md:w-72">
            <input type="text" id="search-input" onkeyup="searchRiwayat()" placeholder="Cari kating, kota, atau ID..." class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
            <span class="absolute left-3 top-2.5 text-slate-400 text-xs">🔍</span>
        </div>
    </div>

    <!-- History List Items -->
    <div class="space-y-4" id="riwayat-container">

        <!-- Item 1: Apartment Check Selesai -->
        <div class="riwayat-card bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-5 transition hover:border-emerald-300" data-kategori="apartment" data-text="ayu pradnya dewi delft apartment check studio kampvelderstraat">
            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 border-b border-slate-100 pb-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-teal-50 border border-teal-200 flex items-center justify-center text-xl shrink-0">
                        🏢
                    </div>
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-teal-100 text-teal-800">Apartment Check</span>
                            <span class="text-xs text-slate-400">Order #UR-2026-0819</span>
                            <span class="text-xs text-slate-400">• 12 Jun 2026</span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 mt-1">Inspeksi Studio Kampvelderstraat #4B</h3>
                        <p class="text-xs text-slate-500">Delft, Belanda • 10 menit sepeda dari TU Delft</p>
                    </div>
                </div>
                <div class="flex sm:flex-col items-center sm:items-end justify-between gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full font-bold text-xs border border-emerald-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Selesai & Terverifikasi
                    </span>
                    <span class="text-xs font-bold text-slate-800">Biaya: €35.00 (~Rp 595.000)</span>
                </div>
            </div>

            <!-- Detail Pengerjaan & Kating Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs bg-slate-50 p-4 rounded-xl border border-slate-100">
                <div>
                    <span class="text-slate-400 font-semibold uppercase block mb-1">Partner Kating</span>
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full bg-emerald-700 text-white font-bold flex items-center justify-center text-xs">AP</div>
                        <div>
                            <p class="font-bold text-slate-900">Ayu Pradnya Dewi</p>
                            <p class="text-slate-500 text-[11px]">M.Sc TU Delft (Delft, NL)</p>
                        </div>
                    </div>
                </div>

                <div>
                    <span class="text-slate-400 font-semibold uppercase block mb-1">Hasil Verifikasi Fisik</span>
                    <p class="text-slate-700 font-medium">✓ 32 checklist parameter lolos</p>
                    <p class="text-slate-700 font-medium">✓ 8 foto kamar + video heater lolos uji</p>
                </div>

                <div>
                    <span class="text-slate-400 font-semibold uppercase block mb-1">Ulasan Anda</span>
                    <div class="text-amber-500 font-bold mb-0.5">⭐⭐⭐⭐⭐ (5.0/5.0)</div>
                    <p class="text-slate-600 italic">"Sangat teliti! Ayu mengecek semua jendela dan memvideokan kondisi heater dengan sangat jelas."</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between gap-3 pt-1 flex-wrap">
                <div class="flex items-center gap-2 text-xs text-slate-500">
                    <span>🛡 Pembayaran Escrow telah dirilis ke Kating</span>
                </div>
                <div class="flex items-center gap-2">
                    <a href="/detail-layanan/1" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl shadow-sm transition">
                        📄 Lihat Laporan Lengkap
                    </a>
                    <a href="/chat/1" class="px-3.5 py-2 bg-white border border-slate-200 text-slate-700 font-semibold text-xs rounded-xl hover:bg-slate-50 transition">
                        💬 Hubungi Kating Lagi
                    </a>
                    <button onclick="openReviewModal('Ayu Pradnya Dewi', 'Apartment Check #UR-2026-0819')" class="px-3.5 py-2 bg-slate-100 text-slate-700 font-semibold text-xs rounded-xl hover:bg-slate-200 transition">
                        ✏️ Edit Ulasan
                    </button>
                </div>
            </div>
        </div>

        <!-- Item 2: Airport Pickup Selesai -->
        <div class="riwayat-card bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-5 transition hover:border-blue-300" data-kategori="pickup" data-text="budi santoso tokyo jepang airport pickup narita jal720">
            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 border-b border-slate-100 pb-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-200 flex items-center justify-center text-xl shrink-0">
                        ✈️
                    </div>
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-blue-100 text-blue-800">Airport Pickup</span>
                            <span class="text-xs text-slate-400">Order #UR-2026-0720</span>
                            <span class="text-xs text-slate-400">• 1 Jul 2026</span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 mt-1">Penjemputan Narita Airport (NRT) ➔ Tokyo Tech</h3>
                        <p class="text-xs text-slate-500">Tokyo, Jepang • Flight JL720 (Japan Airlines) tiba 14:30 JST</p>
                    </div>
                </div>
                <div class="flex sm:flex-col items-center sm:items-end justify-between gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full font-bold text-xs border border-emerald-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Selesai Sukses
                    </span>
                    <span class="text-xs font-bold text-slate-800">Biaya: ¥6,500 (~Rp 680.000)</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs bg-slate-50 p-4 rounded-xl border border-slate-100">
                <div>
                    <span class="text-slate-400 font-semibold uppercase block mb-1">Partner Kating</span>
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full bg-blue-700 text-white font-bold flex items-center justify-center text-xs">BS</div>
                        <div>
                            <p class="font-bold text-slate-900">Budi Santoso</p>
                            <p class="text-slate-500 text-[11px]">Tokyo Institute of Technology</p>
                        </div>
                    </div>
                </div>

                <div>
                    <span class="text-slate-400 font-semibold uppercase block mb-1">Status Penjemputan</span>
                    <p class="text-slate-700 font-medium">✓ Bertemu di Gate 2 Terminal 2</p>
                    <p class="text-slate-700 font-medium">✓ Didampingi naik Narita Express hingga dorm</p>
                </div>

                <div>
                    <span class="text-slate-400 font-semibold uppercase block mb-1">Ulasan Anda</span>
                    <div class="text-amber-500 font-bold mb-0.5">⭐⭐⭐⭐⭐ (5.0/5.0)</div>
                    <p class="text-slate-600 italic">"Budi sangat tepat waktu dan membantu membawa koper 30kg saya sampai depan kamar asrama!"</p>
                </div>
            </div>

            <div class="flex items-center justify-between gap-3 pt-1 flex-wrap">
                <div class="flex items-center gap-2 text-xs text-slate-500">
                    <span>🛡 Konfirmasi kedatangan ditandatangani digital</span>
                </div>
                <div class="flex items-center gap-2">
                    <a href="/detail-layanan/2" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-sm transition">
                        📄 Ringkasan Penjemputan
                    </a>
                    <a href="/chat/2" class="px-3.5 py-2 bg-white border border-slate-200 text-slate-700 font-semibold text-xs rounded-xl hover:bg-slate-50 transition">
                        💬 Chat Budi
                    </a>
                </div>
            </div>
        </div>

        <!-- Item 3: Move-in Help Selesai -->
        <div class="riwayat-card bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-5 transition hover:border-amber-300" data-kategori="movein" data-text="ni made sari rotterdam belanda move-in help barang orientasi">
            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 border-b border-slate-100 pb-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center text-xl shrink-0">
                        📦
                    </div>
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-100 text-amber-800">Move-in Help</span>
                            <span class="text-xs text-slate-400">Order #UR-2026-0688</span>
                            <span class="text-xs text-slate-400">• 5 Jul 2026</span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 mt-1">Bantuan Pindahan & Orientasi Rotterdamseweg</h3>
                        <p class="text-xs text-slate-500">Delft / Rotterdam • Angkut 2 koper besar & orientasi lingkungan</p>
                    </div>
                </div>
                <div class="flex sm:flex-col items-center sm:items-end justify-between gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full font-bold text-xs border border-emerald-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Selesai Sukses
                    </span>
                    <span class="text-xs font-bold text-slate-800">Biaya: €25.00 (~Rp 425.000)</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs bg-slate-50 p-4 rounded-xl border border-slate-100">
                <div>
                    <span class="text-slate-400 font-semibold uppercase block mb-1">Partner Kating</span>
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full bg-amber-600 text-white font-bold flex items-center justify-center text-xs">NS</div>
                        <div>
                            <p class="font-bold text-slate-900">Ni Made Sari</p>
                            <p class="text-slate-500 text-[11px]">Erasmus Univ Rotterdam</p>
                        </div>
                    </div>
                </div>

                <div>
                    <span class="text-slate-400 font-semibold uppercase block mb-1">Cakupan Bantuan</span>
                    <p class="text-slate-700 font-medium">✓ Bantu lapor meteran listrik & kunci</p>
                    <p class="text-slate-700 font-medium">✓ Orientasi supermarket & stasiun trem</p>
                </div>

                <div>
                    <span class="text-slate-400 font-semibold uppercase block mb-1">Ulasan Anda</span>
                    <div class="text-amber-500 font-bold mb-0.5">⭐⭐⭐⭐⭐ (4.8/5.0)</div>
                    <p class="text-slate-600 italic">"Sari ramah sekali dan memberi banyak tips hemat belanja di Albert Heijn & registrasi BSN!"</p>
                </div>
            </div>

            <div class="flex items-center justify-between gap-3 pt-1 flex-wrap">
                <div class="flex items-center gap-2 text-xs text-slate-500">
                    <span>🛡 Durasi pengerjaan: 3.5 jam terkonfirmasi</span>
                </div>
                <div class="flex items-center gap-2">
                    <a href="/detail-layanan/3" class="px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs rounded-xl shadow-sm transition">
                        📄 Rincian Bantuan
                    </a>
                    <a href="/chat/3" class="px-3.5 py-2 bg-white border border-slate-200 text-slate-700 font-semibold text-xs rounded-xl hover:bg-slate-50 transition">
                        💬 Hubungi Sari
                    </a>
                </div>
            </div>
        </div>

        <!-- Item 4: Apartment Check Dibatalkan (Escrow Refunded) -->
        <div class="riwayat-card bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-5 transition hover:border-rose-300" data-kategori="apartment" data-text="komang agus melbourne australia central park apartment check dibatalkan scam refund">
            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 border-b border-slate-100 pb-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-rose-50 border border-rose-200 flex items-center justify-center text-xl shrink-0">
                        🛑
                    </div>
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-slate-100 text-slate-700">Apartment Check</span>
                            <span class="text-xs text-slate-400">Order #UR-2026-0511</span>
                            <span class="text-xs text-slate-400">• 20 Mei 2026</span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 mt-1">Inspeksi Unit 12 Central Park, Melbourne</h3>
                        <p class="text-xs text-slate-500">Melbourne VIC, Australia • Listing Gumtree terindikasi fiktif</p>
                    </div>
                </div>
                <div class="flex sm:flex-col items-center sm:items-end justify-between gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-rose-50 text-rose-700 rounded-full font-bold text-xs border border-rose-200">
                        <span class="w-2 h-2 rounded-full bg-rose-500"></span> Dibatalkan (100% Refunded)
                    </span>
                    <span class="text-xs font-bold text-emerald-600">Dana Dikembalikan: AU$ 50.00</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs bg-rose-50/50 p-4 rounded-xl border border-rose-100">
                <div>
                    <span class="text-slate-400 font-semibold uppercase block mb-1">Partner Kating</span>
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full bg-slate-700 text-white font-bold flex items-center justify-center text-xs">KA</div>
                        <div>
                            <p class="font-bold text-slate-900">Komang Agus</p>
                            <p class="text-slate-500 text-[11px]">Univ of Melbourne</p>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <span class="text-rose-700 font-semibold uppercase block mb-1">Temuan Tim & Alasan Pembatalan</span>
                    <p class="text-slate-700 font-medium">Kating mendatangi lokasi dan mendapati gedung tersebut adalah perkantoran, bukan unit apartemen hunian seperti yang diiklankan pemilik. Tim Admin UniRoute langsung membatalkan pesanan dan mengembalikan dana escrow Anda secara utuh ke rekening bank.</p>
                </div>
            </div>

            <div class="flex items-center justify-between gap-3 pt-1 flex-wrap">
                <div class="flex items-center gap-2 text-xs text-slate-500">
                    <span>🛡 Terlindungi sistem garansi anti-scam UniRoute Escrow</span>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="alert('Bukti Pengembalian Dana:\n\nID Transaksi: REF-2026-0511\nJumlah: AU$ 50.00 (~Rp 515.000)\nMetode: Transfer Bank BCA\nStatus: BERHASIL')" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs rounded-xl transition">
                        🧾 Unduh Bukti Refund
                    </button>
                    <a href="/admin-help" class="px-3.5 py-2 bg-white border border-slate-200 text-slate-700 font-semibold text-xs rounded-xl hover:bg-slate-50 transition">
                        🛡 Tanya Admin Support
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Empty Filter State -->
    <div id="empty-filter-state" class="hidden text-center py-16 bg-white rounded-3xl border border-slate-200 p-8">
        <span class="text-4xl block mb-2">📭</span>
        <h3 class="text-base font-bold text-slate-800">Tidak ada riwayat ditemukan</h3>
        <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto">Tidak ada layanan yang cocok dengan filter atau kata kunci pencarian Anda.</p>
        <button onclick="resetFilter()" class="mt-4 px-4 py-2 bg-emerald-600 text-white rounded-xl text-xs font-bold hover:bg-emerald-700 transition">Reset Filter</button>
    </div>
</div>

<!-- Modal Edit Ulasan -->
<div id="review-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-md w-full p-6 space-y-5 border border-slate-200 shadow-2xl relative">
        <button onclick="closeReviewModal()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-600 font-bold text-xl">&times;</button>
        <div>
            <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">Ulasan & Rating</span>
            <h2 class="text-lg font-bold text-slate-900 mt-2" id="modal-review-title">Beri Ulasan Kating</h2>
            <p class="text-xs text-slate-500" id="modal-review-subtitle">Bagikan pengalaman Anda untuk membantu mahasiswa Indonesia lainnya.</p>
        </div>

        <form onsubmit="event.preventDefault(); alert('Terima kasih! Ulasan Anda berhasil disimpan dan diperbarui.'); closeReviewModal();" class="space-y-4 text-xs">
            <div>
                <label class="font-semibold text-slate-800 block mb-1">Rating Kepuasan</label>
                <div class="flex items-center gap-2 text-2xl cursor-pointer text-amber-400" id="star-picker">
                    <span onclick="setRating(1)">★</span>
                    <span onclick="setRating(2)">★</span>
                    <span onclick="setRating(3)">★</span>
                    <span onclick="setRating(4)">★</span>
                    <span onclick="setRating(5)">★</span>
                </div>
            </div>

            <div>
                <label class="font-semibold text-slate-800 block mb-1">Ulasan Tertulis</label>
                <textarea rows="4" class="w-full p-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 text-xs" placeholder="Ceritakan ketepatan waktu, keramahan, dan ketelitian kating..."></textarea>
            </div>

            <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                <button type="button" onclick="closeReviewModal()" class="px-4 py-2 bg-slate-100 text-slate-700 font-semibold rounded-xl">Batal</button>
                <button type="submit" class="px-5 py-2 bg-emerald-600 text-white font-bold rounded-xl shadow-md shadow-emerald-600/20">Simpan Ulasan</button>
            </div>
        </form>
    </div>
</div>

<script>
let currentCategory = 'semua';

function filterRiwayat(kategori, btn) {
    currentCategory = kategori;
    
    // update buttons style
    document.querySelectorAll('.filter-tab').forEach(b => {
        b.className = 'filter-tab px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200 transition';
    });
    btn.className = 'filter-tab px-4 py-2 rounded-xl text-xs font-bold bg-slate-900 text-white transition';

    applyFilters();
}

function searchRiwayat() {
    applyFilters();
}

function applyFilters() {
    const keyword = (document.getElementById('search-input').value || '').toLowerCase().trim();
    const cards = document.querySelectorAll('.riwayat-card');
    let visibleCount = 0;

    cards.forEach(card => {
        const cat = card.getAttribute('data-kategori');
        const text = (card.getAttribute('data-text') || '').toLowerCase();

        const matchCat = (currentCategory === 'semua' || cat === currentCategory);
        const matchText = (!keyword || text.includes(keyword));

        if (matchCat && matchText) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    const empty = document.getElementById('empty-filter-state');
    if (empty) {
        empty.classList.toggle('hidden', visibleCount > 0);
    }
}

function resetFilter() {
    document.getElementById('search-input').value = '';
    const firstTab = document.querySelector('.filter-tab');
    if (firstTab) filterRiwayat('semua', firstTab);
}

function openReviewModal(kating, order) {
    document.getElementById('modal-review-title').innerText = 'Ulasan: ' + kating;
    document.getElementById('modal-review-subtitle').innerText = 'Layanan ' + order;
    document.getElementById('review-modal').classList.remove('hidden');
}

function closeReviewModal() {
    document.getElementById('review-modal').classList.add('hidden');
}

function setRating(num) {
    const stars = document.getElementById('star-picker').children;
    for (let i = 0; i < stars.length; i++) {
        stars[i].style.color = (i < num) ? '#f59e0b' : '#cbd5e1';
    }
}
</script>

@endsection
