@extends('layouts.app')

@section('title', 'Layanan Aktif — UniRoute Kating')

@section('content')
<div class="space-y-6" x-data="{ openReportModal: false }">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Layanan Aktif</h1>
            <p class="text-sm text-slate-500">Daftar pekerjaan yang sedang Anda tangani saat ini.</p>
        </div>
        <div>
            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">3 Job Sedang Berjalan</span>
        </div>
    </div>

    <!-- Active Job Item 1 -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="bg-gradient-to-r from-teal-900 to-slate-900 p-5 text-white flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <span class="px-3 py-1 bg-emerald-500/20 text-emerald-300 text-xs font-bold rounded-full border border-emerald-500/30 uppercase tracking-wider">🏢 Apartment Check</span>
                <h3 class="text-lg font-bold mt-2">Kampvelderstraat Studio #4B</h3>
                <p class="text-xs text-slate-300">Klien: Dimas Anggara • Deadline: Hari ini, 18:00 CET</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="/kating/laporan/apartment" class="px-5 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs rounded-xl shadow-lg shadow-emerald-500/20 transition inline-flex items-center gap-1.5">
                    📝 Form Laporan Detail
                </a>
                <button onclick="document.getElementById('report-modal').classList.remove('hidden')" class="px-4 py-2.5 bg-white/10 hover:bg-white/20 text-white font-semibold text-xs rounded-xl border border-white/20 transition">
                    Quick Modal
                </button>
            </div>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-xs">
            <div>
                <span class="text-slate-400 font-semibold uppercase block mb-1">Detail Alamat</span>
                <p class="font-medium text-slate-800">Kampvelderstraat 18, 2613 HB Delft, Netherlands</p>
            </div>
            <div>
                <span class="text-slate-400 font-semibold uppercase block mb-1">Item Spesifik Ditanyakan Klien</span>
                <ul class="list-disc list-inside text-slate-700 space-y-1 font-medium">
                    <li>Kondisi jendela & isolasi dingin</li>
                    <li>Fasilitas mesin cuci bersama</li>
                    <li>Jarak jalan kaki ke halte bus</li>
                </ul>
            </div>
            <div>
                <span class="text-slate-400 font-semibold uppercase block mb-1">Status Pengerjaan</span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-800 rounded-full font-bold text-xs border border-amber-200">
                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-ping"></span> Menunggu Hasil Laporan Kating
                </span>
            </div>
        </div>
    </div>

    <!-- Active Job Item 2 -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="bg-gradient-to-r from-blue-900 to-slate-900 p-5 text-white flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <span class="px-3 py-1 bg-blue-500/20 text-blue-300 text-xs font-bold rounded-full border border-blue-500/30 uppercase tracking-wider">✈️ Airport Pickup</span>
                <h3 class="text-lg font-bold mt-2">Penjemputan Schiphol (AMS) ➔ Delft</h3>
                <p class="text-xs text-slate-300">Klien: Rania Putri • Flight: GA880 (Garuda Indonesia)</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="/kating/laporan/pickup" class="px-5 py-2.5 bg-blue-500 hover:bg-blue-400 text-white font-bold text-xs rounded-xl shadow-lg transition inline-flex items-center gap-1.5">
                    ✈️ Konfirmasi Penjemputan
                </a>
            </div>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-xs">
            <div>
                <span class="text-slate-400 font-semibold uppercase block mb-1">Jadwal Mendarat</span>
                <p class="font-medium text-slate-800">29 Agustus 2026, 06:45 AM CET</p>
            </div>
            <div>
                <span class="text-slate-400 font-semibold uppercase block mb-1">Titik Temu (Meeting Point)</span>
                <p class="font-medium text-slate-800">Meeting Point Burger King (Schiphol Plaza)</p>
            </div>
            <div>
                <span class="text-slate-400 font-semibold uppercase block mb-1">Status Pengerjaan</span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-50 text-blue-800 rounded-full font-bold text-xs border border-blue-200">
                    Jadwal Terkonfirmasi
                </span>
            </div>
        </div>
    </div>

    <!-- Active Job Item 3 -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="bg-gradient-to-r from-amber-900 to-slate-900 p-5 text-white flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <span class="px-3 py-1 bg-amber-500/20 text-amber-300 text-xs font-bold rounded-full border border-amber-500/30 uppercase tracking-wider">📦 Move-in Help</span>
                <h3 class="text-lg font-bold mt-2">Bantuan Orientasi & Pindahan Rotterdamseweg</h3>
                <p class="text-xs text-slate-300">Klien: Rania Putri • Jadwal: Besok, 10:00 CET</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="/kating/laporan/movein" class="px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs rounded-xl shadow-lg transition inline-flex items-center gap-1.5">
                    📦 Form Konfirmasi Move-in
                </a>
            </div>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-xs">
            <div>
                <span class="text-slate-400 font-semibold uppercase block mb-1">Alamat Hunian Klien</span>
                <p class="font-medium text-slate-800">Rotterdamscheweg 42, 2628 AL Delft, Netherlands</p>
            </div>
            <div>
                <span class="text-slate-400 font-semibold uppercase block mb-1">Rencana Pendampingan</span>
                <ul class="list-disc list-inside text-slate-700 space-y-1 font-medium">
                    <li>Pencatatan meteran & serah kunci</li>
                    <li>Unpacking 2 koper</li>
                    <li>Orientasi kartu OV-chipkaart & rute trem</li>
                </ul>
            </div>
            <div>
                <span class="text-slate-400 font-semibold uppercase block mb-1">Status Pengerjaan</span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-800 rounded-full font-bold text-xs border border-amber-200">
                    Menunggu Hari Kedatangan
                </span>
            </div>
        </div>
    </div>

    <!-- Modal Form Laporan Apartment Check -->
    <div id="report-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto">
        <div class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 space-y-6 border border-slate-200 shadow-2xl relative my-8">
            <button onclick="document.getElementById('report-modal').classList.add('hidden')" class="absolute top-6 right-6 text-slate-400 hover:text-slate-600 font-bold text-xl">&times;</button>

            <div>
                <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">Form Laporan Verification</span>
                <h2 class="text-xl font-extrabold text-slate-900 mt-2">Apartment Check Checklist & Gallery</h2>
                <p class="text-xs text-slate-500">Laporan ini akan diperiksa Admin lalu dikirimkan ke Klien.</p>
            </div>

            <form onsubmit="event.preventDefault(); alert('Laporan berhasil dikirim ke Admin untuk moderasi!'); document.getElementById('report-modal').classList.add('hidden');" class="space-y-5 text-xs text-slate-700">
                <!-- Checklist items -->
                <div class="space-y-3 bg-slate-50 p-4 rounded-2xl border border-slate-200">
                    <h4 class="font-bold text-slate-900 text-sm">Checklist Verifikasi Fisik</h4>
                    
                    <label class="flex items-center gap-3">
                        <input type="checkbox" checked class="w-4 h-4 text-emerald-600 rounded">
                        <span><strong>Kebersihan & Sanitasi:</strong> Tempat tinggal layak huni dan bersih</span>
                    </label>
                    <label class="flex items-center gap-3">
                        <input type="checkbox" checked class="w-4 h-4 text-emerald-600 rounded">
                        <span><strong>Kesesuaian Foto Listing:</strong> Tata letak & perabot sesuai foto</span>
                    </label>
                    <label class="flex items-center gap-3">
                        <input type="checkbox" checked class="w-4 h-4 text-emerald-600 rounded">
                        <span><strong>Fasilitas Pemeliharaan:</strong> Pemanas air & heater berfungsi baik</span>
                    </label>
                    <label class="flex items-center gap-3">
                        <input type="checkbox" checked class="w-4 h-4 text-emerald-600 rounded">
                        <span><strong>Keamanan Lingkungan:</strong> Kunci pintu kokoh & lingkungan aman</span>
                    </label>
                    <label class="flex items-center gap-3">
                        <input type="checkbox" checked class="w-4 h-4 text-emerald-600 rounded">
                        <span><strong>Kewajaran Harga:</strong> Harga sewa sesuai dengan fasilitas sekitar</span>
                    </label>
                </div>

                <!-- Rating Kating -->
                <div>
                    <label class="font-semibold text-slate-800">Rekomendasi Kating (1-5 Bintang)</label>
                    <select class="mt-1">
                        <option value="5">⭐⭐⭐⭐⭐ 5/5 — Sangat Direkomendasikan</option>
                        <option value="4">⭐⭐⭐⭐ 4/5 — Bagus dan Layak</option>
                        <option value="3">⭐⭐⭐ 3/5 — Cukup, Banyak Catatan</option>
                    </select>
                </div>

                <!-- Catatan Penilaian -->
                <div>
                    <label class="font-semibold text-slate-800">Catatan & Review Detail Kating</label>
                    <textarea rows="3" placeholder="Tuliskan ulasan langsung kondisi fisik properti..."></textarea>
                </div>

                <!-- Upload Foto Bukti Dummy -->
                <div>
                    <label class="font-semibold text-slate-800">Upload Foto Bukti Lapangan (Min. 3 Foto)</label>
                    <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center bg-slate-50">
                        <p class="text-slate-500">📷 Drag & drop foto kondisi kamar, kamar mandi, dan tampak luar di sini</p>
                        <span class="text-emerald-700 font-semibold cursor-pointer block mt-1">atau klik untuk browse file</span>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="document.getElementById('report-modal').classList.add('hidden')" class="px-5 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-xl">Batal</button>
                    <button type="submit" class="px-6 py-2.5 bg-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-emerald-600/30">Kirim Laporan Ke Moderasi Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
