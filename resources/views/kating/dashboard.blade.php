@extends('layouts.app')

@section('title', 'Dashboard Kating — UniRoute')

@section('content')
<div class="space-y-8">
    <!-- Header Banner -->
    <div class="rounded-3xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6"
         style="background: linear-gradient(135deg, #064e3b 0%, #047857 50%, #059669 100%); color: #ffffff;">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl"></div>
        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider mb-3"
                 style="background: rgba(16, 185, 129, 0.25); color: #a7f3d0; border: 1px solid rgba(16, 185, 129, 0.3);">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Kating Active Partner
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white" style="color: #ffffff;">Halo, Budi Pratama 👋</h1>
            <p class="text-sm sm:text-base mt-1" style="color: #d1fae5;">M.Sc. Computer Science @ TU Delft, Belanda • Rating: ⭐ 4.9 (14 Job Selesai)</p>
        </div>
        <div class="flex flex-wrap gap-3 relative z-10">
            <a href="/kating/profil" class="px-5 py-2.5 rounded-full text-sm font-semibold transition duration-200"
               style="background: rgba(255, 255, 255, 0.15); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.3);">
                Edit Profil & Services
            </a>
            <a href="/kating/permintaan" class="px-5 py-2.5 rounded-full text-sm font-bold transition duration-200 shadow-lg"
               style="background: #10b981; color: #064e3b;">
                Cek Permintaan (3)
            </a>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white p-5 rounded-2xl border border-emerald-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl font-bold">
                📥
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Permintaan Baru</p>
                <h3 class="text-2xl font-bold text-slate-800">3</h3>
                <p class="text-xs text-amber-600 font-semibold mt-0.5">Membutuhkan Konfirmasi</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-emerald-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold">
                ⚡
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Job Aktif</p>
                <h3 class="text-2xl font-bold text-slate-800">2</h3>
                <p class="text-xs text-blue-600 font-semibold mt-0.5">Sedang Berlangsung</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-emerald-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                ✅
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Selesai</p>
                <h3 class="text-2xl font-bold text-slate-800">14</h3>
                <p class="text-xs text-emerald-600 font-semibold mt-0.5">Total Dikerjakan</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-emerald-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl font-bold">
                💶
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Insentif</p>
                <h3 class="text-2xl font-bold text-slate-800">€420</h3>
                <p class="text-xs text-teal-600 font-semibold mt-0.5">~ Rp 7.140.000</p>
            </div>
        </div>
    </div>

    <!-- Toggle Status Layanan & Permintaan Masuk -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Service Availability Toggles -->
        <div class="lg:col-span-1 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm h-fit">
            <h2 class="text-lg font-bold text-slate-900 mb-2">Status Layanan Anda</h2>
            <p class="text-xs text-slate-500 mb-6">Atur status ketersediaan Anda untuk menerima pengajuan layanan baru dari klien.</p>

            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <div>
                        <div class="font-semibold text-sm text-slate-800">🏢 Apartment Check</div>
                        <div class="text-xs text-slate-500">€35 / lokasi</div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                    </label>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <div>
                        <div class="font-semibold text-sm text-slate-800">📦 Move-in Help</div>
                        <div class="text-xs text-slate-500">€25 / hari</div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                    </label>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <div>
                        <div class="font-semibold text-sm text-slate-800">✈️ Airport Pickup</div>
                        <div class="text-xs text-slate-500">€40 / trip</div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Recent Incoming Requests -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold text-slate-900">Permintaan Masuk Terbaru</h2>
                    <a href="/kating/permintaan" class="text-xs font-semibold text-emerald-700 hover:text-emerald-800">Lihat Semua →</a>
                </div>

                <div class="space-y-4">
                    <!-- Item 1 -->
                    <div class="p-4 rounded-xl border border-amber-200 bg-amber-50/40 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-0.5 bg-amber-100 text-amber-800 font-semibold text-xs rounded-full">🏢 Apartment Check</span>
                                <span class="text-xs text-slate-500">Dibuat 2 jam lalu</span>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm">Siti Rahma (Delft Center Studio)</h4>
                            <p class="text-xs text-slate-600">📍 Phoenixstraat 42, Delft • Target Deadline: 28 Agu 2026</p>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <button onclick="alert('Permintaan berhasil diterima!')" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs rounded-lg transition">Terima</button>
                            <button onclick="alert('Permintaan ditolak')" class="px-3 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold text-xs rounded-lg transition">Tolak</button>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="p-4 rounded-xl border border-amber-200 bg-amber-50/40 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-0.5 bg-blue-100 text-blue-800 font-semibold text-xs rounded-full">📦 Move-in Help</span>
                                <span class="text-xs text-slate-500">Dibuat 5 jam lalu</span>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm">Andi Wijaya (Bantu Angkut & Orientasi)</h4>
                            <p class="text-xs text-slate-600">📍 Balthasar van der Polpad, Delft • Tanggal Tiba: 30 Agu 2026</p>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <button onclick="alert('Permintaan berhasil diterima!')" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs rounded-lg transition">Terima</button>
                            <button onclick="alert('Permintaan ditolak')" class="px-3 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold text-xs rounded-lg transition">Tolak</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Jobs Overview -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold text-slate-900">Job Aktif Berjalan</h2>
                    <a href="/kating/aktif" class="text-xs font-semibold text-emerald-700 hover:text-emerald-800">Kelola Job Aktif →</a>
                </div>

                <div class="p-4 rounded-xl border border-blue-200 bg-blue-50/40 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-0.5 bg-blue-600 text-white font-semibold text-xs rounded-full">Sedang Dikerjakan</span>
                            <span class="text-xs text-slate-500">Klien: Dimas Anggara</span>
                        </div>
                        <h4 class="font-bold text-slate-900 text-sm">Apartment Check: Kampvelderstraat Studio</h4>
                        <p class="text-xs text-slate-600">Status: Verifikasi fisik & foto lokasi scheduled hari ini pukul 15:00 CET</p>
                    </div>
                    <div class="shrink-0">
                        <a href="/kating/aktif" class="inline-block px-4 py-2 bg-emerald-700 hover:bg-emerald-800 text-white font-semibold text-xs rounded-lg transition">Input Laporan Hasil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
