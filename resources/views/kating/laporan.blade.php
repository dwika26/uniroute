@extends('layouts.app')

@section('title', 'Form Konfirmasi & Laporan — UniRoute Kating')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto" x-data="{ jenisLayanan: '{{ $layananId ?? 'apartment' }}' }">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200 mb-2">
                <span>📝 Workspace Pelaporan Kating</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Form Konfirmasi & Laporan Layanan</h1>
            <p class="text-sm text-slate-500 mt-1">Input data hasil verifikasi lapangan atau konfirmasi pendampingan sebelum diteruskan ke Admin dan Klien.</p>
        </div>
        <a href="/kating/aktif" class="px-4 py-2 text-xs font-semibold rounded-xl border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 inline-flex items-center gap-1.5 transition">
            ← Kembali ke Job Aktif
        </a>
    </div>

    <!-- Service Type Selector Tabs -->
    <div class="bg-white p-2 rounded-2xl border border-slate-200 shadow-sm flex flex-wrap gap-2">
        <button type="button" onclick="switchForm('apartment', this)" class="form-tab-btn flex-1 py-2.5 px-4 rounded-xl text-xs font-bold transition flex items-center justify-center gap-2 bg-emerald-600 text-white shadow-sm">
            <span>🏢</span> Apartment Check
        </button>
        <button type="button" onclick="switchForm('movein', this)" class="form-tab-btn flex-1 py-2.5 px-4 rounded-xl text-xs font-semibold transition flex items-center justify-center gap-2 bg-slate-100 text-slate-600 hover:bg-slate-200">
            <span>📦</span> Move-in Help
        </button>
        <button type="button" onclick="switchForm('pickup', this)" class="form-tab-btn flex-1 py-2.5 px-4 rounded-xl text-xs font-semibold transition flex items-center justify-center gap-2 bg-slate-100 text-slate-600 hover:bg-slate-200">
            <span>✈️</span> Airport Pickup
        </button>
    </div>

    <!-- FORM 1: APARTMENT CHECK -->
    <div id="form-apartment" class="form-section bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex items-start justify-between border-b border-slate-100 pb-4">
            <div>
                <span class="px-2.5 py-0.5 bg-teal-100 text-teal-800 font-bold text-xs rounded-full">Apartment Check</span>
                <h2 class="text-xl font-bold text-slate-900 mt-2">Laporan Verifikasi Fisik Apartemen</h2>
                <p class="text-xs text-slate-500">Order: Kampvelderstraat Studio #4B, Delft • Klien: Dimas Anggara</p>
            </div>
            <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">Komisi: €35.00</span>
        </div>

        <form onsubmit="handleFormSubmit(event, 'Apartment Check');" class="space-y-6 text-xs text-slate-700">
            <!-- Checklist Parameter -->
            <div class="space-y-3 bg-slate-50 p-5 rounded-2xl border border-slate-200">
                <h4 class="font-bold text-slate-900 text-sm flex items-center gap-2">
                    <span>📋</span> Parameter Checklist Verifikasi
                </h4>
                <p class="text-slate-500 text-[11px]">Centang parameter yang memenuhi standar kelayakan dan kecocokan listing.</p>
                
                <div class="space-y-2.5 pt-2">
                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer hover:border-emerald-400 transition">
                        <input type="checkbox" checked class="w-4 h-4 text-emerald-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Kebersihan & Bebas Hama</strong>
                            <span class="text-slate-500 text-[11px]">Unit bersih, tidak berbau lembab, dan tidak ada tanda infestasi hama.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer hover:border-emerald-400 transition">
                        <input type="checkbox" checked class="w-4 h-4 text-emerald-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Kesesuaian Foto & Furnishing Listing</strong>
                            <span class="text-slate-500 text-[11px]">Luas kamar, kasur, meja belajar, dan dapur sama persis dengan yang diiklankan.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer hover:border-emerald-400 transition">
                        <input type="checkbox" checked class="w-4 h-4 text-emerald-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Fungsi Heater & Pemanas Air</strong>
                            <span class="text-slate-500 text-[11px]">Radiator/heater berfungsi maksimal dan aliran air shower panas berjalan lancar.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer hover:border-emerald-400 transition">
                        <input type="checkbox" checked class="w-4 h-4 text-emerald-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Keamanan Kunci & Jendela Ganda</strong>
                            <span class="text-slate-500 text-[11px]">Kunci pintu utama kokoh, jendela double-glazed rapat dan bebas angin dingin.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer hover:border-emerald-400 transition">
                        <input type="checkbox" checked class="w-4 h-4 text-emerald-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Kewajaran Harga Sewa & Lingkungan</strong>
                            <span class="text-slate-500 text-[11px]">Biaya sewa wajar untuk kawasan Delft, dekat halte trem dan rute kampus TU Delft.</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Rating Kating -->
            <div>
                <label class="font-bold text-slate-800 block mb-1">Rekomendasi Kelayakan Kating</label>
                <select class="w-full p-3 rounded-xl border border-slate-200 bg-white text-xs font-medium">
                    <option value="5">⭐⭐⭐⭐⭐ 5/5 — Sangat Layak & Sangat Direkomendasikan</option>
                    <option value="4">⭐⭐⭐⭐ 4/5 — Bagus dan Layak Huni</option>
                    <option value="3">⭐⭐⭐ 3/5 — Cukup Layak (Perlu Perbaikan Minor)</option>
                    <option value="2">⭐⭐ 2/5 — Kurang Direkomendasikan</option>
                    <option value="1">⭐ 1/5 — Sangat Tidak Direkomendasikan / Terindikasi Scam</option>
                </select>
            </div>

            <!-- Review Kating -->
            <div>
                <label class="font-bold text-slate-800 block mb-1">Catatan & Review Objektif Kating</label>
                <textarea rows="4" class="w-full p-3.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 text-xs" placeholder="Tuliskan ulasan langsung kondisi fisik ruangan, penerangan alami, keramahan landlord, dan tips untuk klien...">Studio dalam kondisi sangat terawat dan bersih. Landlord menyambut langsung saat inspeksi dan memberikan informasi utilitas secara transparan. Jarak ke fakultas teknik TU Delft hanya sekitar 10 menit menggunakan sepeda.</textarea>
            </div>

            <!-- Upload Foto Lapangan Dummy -->
            <div>
                <label class="font-bold text-slate-800 block mb-1">Upload Foto Bukti Fisik Lapangan (Min. 3 Foto)</label>
                <div class="border-2 border-dashed border-emerald-300 rounded-2xl p-6 text-center bg-emerald-50/40 cursor-pointer hover:bg-emerald-50 transition">
                    <span class="text-2xl block mb-1">📸</span>
                    <p class="font-bold text-slate-800">Drag & drop foto kamar, kamar mandi, jendela, dan tampak gedung</p>
                    <span class="text-emerald-700 font-semibold block mt-1">3 file foto telah terlampir (kamar-1.jpg, toilet-1.jpg, depan.jpg)</span>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="/kating/aktif" class="px-5 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-xl hover:bg-slate-200 transition">Batal</a>
                <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-600/30 transition">
                    Kirim Laporan Ke Moderasi Admin →
                </button>
            </div>
        </form>
    </div>

    <!-- FORM 2: MOVE-IN HELP -->
    <div id="form-movein" class="form-section hidden bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex items-start justify-between border-b border-slate-100 pb-4">
            <div>
                <span class="px-2.5 py-0.5 bg-amber-100 text-amber-800 font-bold text-xs rounded-full">Move-in Help</span>
                <h2 class="text-xl font-bold text-slate-900 mt-2">Form Konfirmasi Pendampingan Pindahan</h2>
                <p class="text-xs text-slate-500">Order: Rotterdamscheweg 42, Delft • Klien: Rania Putri</p>
            </div>
            <span class="text-xs font-bold text-amber-600 bg-amber-50 px-3 py-1 rounded-full border border-amber-200">Komisi: €25.00</span>
        </div>

        <form onsubmit="handleFormSubmit(event, 'Move-in Help');" class="space-y-6 text-xs text-slate-700">
            <div class="space-y-3 bg-slate-50 p-5 rounded-2xl border border-slate-200">
                <h4 class="font-bold text-slate-900 text-sm flex items-center gap-2">
                    <span>📦</span> Checklist Bantuan Hari Kepindahan
                </h4>
                <div class="space-y-2.5 pt-2">
                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer">
                        <input type="checkbox" checked class="w-4 h-4 text-amber-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Pencatatan Meteran Listrik, Gas & Air (Check-in Report)</strong>
                            <span class="text-slate-500 text-[11px]">Mendampingi klien mencatat angka awal meteran utilitas bersama landlord.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer">
                        <input type="checkbox" checked class="w-4 h-4 text-amber-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Bantuan Angkut & Unpacking Barang</strong>
                            <span class="text-slate-500 text-[11px]">Membantu membawa koper dan barang bawaan dari kendaraan hingga ke kamar.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer">
                        <input type="checkbox" checked class="w-4 h-4 text-amber-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Orientasi Fasilitas Gedung & Pembuangan Sampah</strong>
                            <span class="text-slate-500 text-[11px]">Menjelaskan jadwal buang sampah, pemilahan kardus/plastik, dan ruang laundry bersama.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer">
                        <input type="checkbox" checked class="w-4 h-4 text-amber-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Orientasi Lingkungan Sekitar (Supermarket & Halte)</strong>
                            <span class="text-slate-500 text-[11px]">Menunjukkan lokasi toko kebutuhan harian terdekat (Albert Heijn/Jumbo) & akses transportasi.</span>
                        </div>
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="font-bold text-slate-800 block mb-1">Durasi Pendampingan (Jam)</label>
                    <input type="text" value="3 Jam 30 Menit" class="w-full p-3 rounded-xl border border-slate-200 text-xs font-semibold">
                </div>
                <div>
                    <label class="font-bold text-slate-800 block mb-1">Status Penyerahan Kunci</label>
                    <select class="w-full p-3 rounded-xl border border-slate-200 text-xs font-medium">
                        <option value="complete">Kunci Utama & Akses Gedung Diterima Klien Lengkap</option>
                        <option value="pending">Ada Kunci Tambahan yang Belum Diberikan</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="font-bold text-slate-800 block mb-1">Catatan Tambahan untuk Klien</label>
                <textarea rows="3" class="w-full p-3.5 rounded-xl border border-slate-200 text-xs" placeholder="Tuliskan catatan penting mengenai tetangga, wifi password, atau tips registrasi gemeente...">Semua proses serah terima lancar. Saya sudah memandu Rania menyambungkan koneksi Wi-Fi gedung dan menunjukkan lokasi toko sepeda terdekat.</textarea>
            </div>

            <div>
                <label class="font-bold text-slate-800 block mb-1">Foto Bukti Pendampingan & Serah Terima</label>
                <div class="border-2 border-dashed border-amber-300 rounded-2xl p-6 text-center bg-amber-50/40 cursor-pointer">
                    <span class="text-2xl block mb-1">📷</span>
                    <p class="font-bold text-slate-800">Unggah foto bersama klien atau bukti check-in di lokasi</p>
                    <span class="text-amber-700 font-semibold block mt-1">2 file terlampir (checkin-meteran.jpg, serah-kunci.jpg)</span>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="/kating/aktif" class="px-5 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-xl">Batal</a>
                <button type="submit" class="px-6 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl shadow-lg transition">
                    Kirim Konfirmasi Selesai →
                </button>
            </div>
        </form>
    </div>

    <!-- FORM 3: AIRPORT PICKUP -->
    <div id="form-pickup" class="form-section hidden bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex items-start justify-between border-b border-slate-100 pb-4">
            <div>
                <span class="px-2.5 py-0.5 bg-blue-100 text-blue-800 font-bold text-xs rounded-full">Airport Pickup</span>
                <h2 class="text-xl font-bold text-slate-900 mt-2">Form Konfirmasi Penjemputan Bandara</h2>
                <p class="text-xs text-slate-500">Order: Schiphol Airport ➔ Delft • Klien: Farhan Rizky • Penerbangan: GA880</p>
            </div>
            <span class="text-xs font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-full border border-blue-200">Komisi: €40.00</span>
        </div>

        <form onsubmit="handleFormSubmit(event, 'Airport Pickup');" class="space-y-6 text-xs text-slate-700">
            <div class="space-y-3 bg-slate-50 p-5 rounded-2xl border border-slate-200">
                <h4 class="font-bold text-slate-900 text-sm flex items-center gap-2">
                    <span>✈️</span> Checklist Konfirmasi Penjemputan
                </h4>
                <div class="space-y-2.5 pt-2">
                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer">
                        <input type="checkbox" checked class="w-4 h-4 text-blue-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Tiba di Meeting Point Tepat Waktu</strong>
                            <span class="text-slate-500 text-[11px]">Kating standby di meeting point (Burger King Schiphol Plaza) sebelum penerbangan mendarat.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer">
                        <input type="checkbox" checked class="w-4 h-4 text-blue-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Verifikasi Identitas & Bagasi Klien</strong>
                            <span class="text-slate-500 text-[11px]">Klien terkonfirmasi bertemu dengan selamat dan jumlah koper lengkap.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer">
                        <input type="checkbox" checked class="w-4 h-4 text-blue-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Bantuan Tiket & Rute Transportasi Menuju Hunian</strong>
                            <span class="text-slate-500 text-[11px]">Mendampingi pembelian tiket kereta api NS atau menaiki kendaraan jemputan langsung.</span>
                        </div>
                    </label>

                    <label class="flex items-start gap-3 p-2.5 bg-white rounded-xl border border-slate-200 cursor-pointer">
                        <input type="checkbox" checked class="w-4 h-4 text-blue-600 rounded mt-0.5">
                        <div>
                            <strong class="text-slate-900 block font-semibold">Pengantaran Aman Hingga Alamat Tujuan</strong>
                            <span class="text-slate-500 text-[11px]">Klien telah sampai di depan pintu kamar akomodasi dengan selamat.</span>
                        </div>
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="font-bold text-slate-800 block mb-1">Jam Temu Aktual di Bandara</label>
                    <input type="text" value="07:15 CET (Penerbangan mendarat 06:45)" class="w-full p-3 rounded-xl border border-slate-200 text-xs font-semibold">
                </div>
                <div>
                    <label class="font-bold text-slate-800 block mb-1">Moda Transportasi Digunakan</label>
                    <input type="text" value="NS Intercity Direct Train (Schiphol ➔ Delft)" class="w-full p-3 rounded-xl border border-slate-200 text-xs font-semibold">
                </div>
            </div>

            <div>
                <label class="font-bold text-slate-800 block mb-1">Catatan Penjemputan</label>
                <textarea rows="3" class="w-full p-3.5 rounded-xl border border-slate-200 text-xs" placeholder="Kondisi perjalanan, kendala bagasi jika ada, dll...">Penerbangan mendarat tepat waktu. Klien membawa 2 koper besar dan 1 ransel. Perjalanan menuju Delft lancar menggunakan kereta api dan klien sudah aman masuk ke kamar hunian.</textarea>
            </div>

            <div>
                <label class="font-bold text-slate-800 block mb-1">Foto Bukti Penjemputan di Titik Temu</label>
                <div class="border-2 border-dashed border-blue-300 rounded-2xl p-6 text-center bg-blue-50/40 cursor-pointer">
                    <span class="text-2xl block mb-1">✈️</span>
                    <p class="font-bold text-slate-800">Unggah foto penjemputan di bandara atau di stasiun tujuan</p>
                    <span class="text-blue-700 font-semibold block mt-1">1 file foto terlampir (temu-schiphol.jpg)</span>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="/kating/aktif" class="px-5 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-xl">Batal</a>
                <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition">
                    Konfirmasi Penjemputan Selesai →
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function switchForm(jenis, btn) {
    document.querySelectorAll('.form-section').forEach(el => el.classList.add('hidden'));
    
    document.querySelectorAll('.form-tab-btn').forEach(b => {
        b.className = 'form-tab-btn flex-1 py-2.5 px-4 rounded-xl text-xs font-semibold transition flex items-center justify-center gap-2 bg-slate-100 text-slate-600 hover:bg-slate-200';
    });

    const targetForm = document.getElementById('form-' + jenis);
    if (targetForm) {
        targetForm.classList.remove('hidden');
    }

    if (btn) {
        if (jenis === 'apartment') {
            btn.className = 'form-tab-btn flex-1 py-2.5 px-4 rounded-xl text-xs font-bold transition flex items-center justify-center gap-2 bg-emerald-600 text-white shadow-sm';
        } else if (jenis === 'movein') {
            btn.className = 'form-tab-btn flex-1 py-2.5 px-4 rounded-xl text-xs font-bold transition flex items-center justify-center gap-2 bg-amber-600 text-white shadow-sm';
        } else if (jenis === 'pickup') {
            btn.className = 'form-tab-btn flex-1 py-2.5 px-4 rounded-xl text-xs font-bold transition flex items-center justify-center gap-2 bg-blue-600 text-white shadow-sm';
        }
    }
}

// Support auto select via query param ?jenis=xxx
const urlParams = new URLSearchParams(window.location.search);
const initialJenis = urlParams.get('jenis');
if (initialJenis && ['apartment', 'movein', 'pickup'].includes(initialJenis)) {
    const tabs = document.querySelectorAll('.form-tab-btn');
    if (initialJenis === 'apartment' && tabs[0]) switchForm('apartment', tabs[0]);
    if (initialJenis === 'movein' && tabs[1]) switchForm('movein', tabs[1]);
    if (initialJenis === 'pickup' && tabs[2]) switchForm('pickup', tabs[2]);
}

function handleFormSubmit(e, serviceName) {
    e.preventDefault();
    alert('Sukses! Laporan ' + serviceName + ' berhasil disubmit ke sistem UniRoute.\nStatus job diperbarui ke selesai/menunggu verifikasi moderasi Admin.');
    window.location.href = '/kating/aktif';
}
</script>
@endsection
