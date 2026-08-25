@extends('layouts.app')

@section('title', 'Profil Saya — UniRoute Kating')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm relative">
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
            <div class="relative">
                <img src="/images/kating/kating-1.jpg" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80';" class="w-28 h-28 rounded-2xl object-cover border-4 border-slate-100 shadow-md">
                <span class="absolute -bottom-2 -right-2 bg-emerald-500 text-white text-xs px-2 py-0.5 rounded-full font-bold shadow-md">Verified ✓</span>
            </div>

            <div class="space-y-2 text-center sm:text-left flex-1">
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-3">
                    <h1 class="text-2xl font-bold text-slate-900">Budi Pratama</h1>
                    <span class="px-3 py-1 bg-emerald-100 text-emerald-800 font-semibold text-xs rounded-full">🎓 Active Senior Partner</span>
                </div>
                <p class="text-sm text-slate-600 font-medium">M.Sc. Computer Science @ TU Delft (Delft, Belanda)</p>
                <p class="text-xs text-slate-500">Angkatan 2024 • Telah menetap 2 tahun di Delft</p>
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-4 pt-2 text-xs font-semibold text-slate-700">
                    <span>⭐ 4.9 (14 Review)</span>
                    <span>•</span>
                    <span>📍 Delft & Den Haag</span>
                    <span>•</span>
                    <span class="text-emerald-700 font-bold">Respon rata-rata < 15 menit</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profil Form -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
        <h2 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-3">Pengaturan Profil & Layanan</h2>

        <form onsubmit="event.preventDefault(); alert('Profil berhasil diperbarui!');" class="space-y-6 text-xs text-slate-700">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="font-semibold text-slate-800 mb-1 block">Nama Lengkap</label>
                    <input type="text" value="Budi Pratama">
                </div>
                <div>
                    <label class="font-semibold text-slate-800 mb-1 block">Kampus Tujuan</label>
                    <input type="text" value="TU Delft (Delft University of Technology)">
                </div>
                <div>
                    <label class="font-semibold text-slate-800 mb-1 block">Kota & Negara Tempat Tinggal</label>
                    <input type="text" value="Delft, Belanda">
                </div>
                <div>
                    <label class="font-semibold text-slate-800 mb-1 block">Jurusan & Jenjang</label>
                    <input type="text" value="M.Sc. Computer Science">
                </div>
            </div>

            <div>
                <label class="font-semibold text-slate-800 mb-1 block">Bio / Deskripsi Singkat</label>
                <textarea rows="3">Halo! Saya Budi, mahasiswa master tahun ke-2 di TU Delft. Saya sudah berpengalaman membantu mahasiswa baru Indonesia mencari tempat tinggal, urus pendaftaran kotapraja (gemeente), dan penjemputan Schiphol.</textarea>
            </div>

            <div class="space-y-3 pt-4 border-t border-slate-100">
                <h3 class="font-bold text-slate-900 text-sm">Pengaturan Layanan & Tarik Insentif</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="p-4 rounded-xl border border-slate-200 bg-slate-50 space-y-2">
                        <div class="font-bold text-slate-800">Apartment Check</div>
                        <div class="text-slate-500">Fee Kating: €35</div>
                        <label class="flex items-center gap-2 mt-2">
                            <input type="checkbox" checked class="w-4 h-4 text-emerald-600">
                            <span class="font-semibold text-emerald-700">Aktif Diterima</span>
                        </label>
                    </div>
                    <div class="p-4 rounded-xl border border-slate-200 bg-slate-50 space-y-2">
                        <div class="font-bold text-slate-800">Move-in Help</div>
                        <div class="text-slate-500">Fee Kating: €25</div>
                        <label class="flex items-center gap-2 mt-2">
                            <input type="checkbox" checked class="w-4 h-4 text-emerald-600">
                            <span class="font-semibold text-emerald-700">Aktif Diterima</span>
                        </label>
                    </div>
                    <div class="p-4 rounded-xl border border-slate-200 bg-slate-50 space-y-2">
                        <div class="font-bold text-slate-800">Airport Pickup</div>
                        <div class="text-slate-500">Fee Kating: €40</div>
                        <label class="flex items-center gap-2 mt-2">
                            <input type="checkbox" class="w-4 h-4 text-emerald-600">
                            <span class="font-semibold text-slate-500">Non-Aktif</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-md transition">Simpan Perubahan Profil</button>
            </div>
        </form>
    </div>
</div>
@endsection
