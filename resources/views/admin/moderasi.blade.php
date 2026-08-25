@extends('layouts.app')

@section('title', 'Moderasi Laporan — Admin UniRoute')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Moderasi Hasil Apartment Check</h1>
            <p class="text-sm text-slate-500">Tinjau checklist dan kelayakan foto bukti dari Kating sebelum dipublikasikan ke Klien.</p>
        </div>
        <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full">2 Laporan Butuh Moderasi</span>
    </div>

    <!-- Moderation Card 1 -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-4">
            <div>
                <span class="px-2.5 py-0.5 bg-teal-100 text-teal-800 font-bold text-xs rounded-full">Apartment Check Report</span>
                <h3 class="text-lg font-bold text-slate-900 mt-1">Kampvelderstraat Studio #4B, Delft</h3>
                <p class="text-xs text-slate-500">Dikirim oleh Kating: Budi Pratama • Klien Tujuan: Dimas Anggara</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 bg-amber-50 text-amber-800 font-bold text-xs rounded-full border border-amber-200">Pending Review Admin</span>
            </div>
        </div>

        <!-- Submitted Checklist Preview -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs">
            <div class="space-y-2 bg-slate-50 p-4 rounded-2xl border border-slate-200">
                <h4 class="font-bold text-slate-900 text-sm">Checklist Fisik Kating</h4>
                <div class="space-y-1.5 text-slate-700">
                    <p class="text-emerald-700 font-semibold">✅ Kebersihan & Sanitasi (Layak)</p>
                    <p class="text-emerald-700 font-semibold">✅ Kesesuaian Foto Listing (100% Sesuai)</p>
                    <p class="text-emerald-700 font-semibold">✅ Fasilitas Heater & Air Panas (Berfungsi)</p>
                    <p class="text-emerald-700 font-semibold">✅ Keamanan Lingkungan (Aman)</p>
                    <p class="text-emerald-700 font-semibold">✅ Kewajaran Harga (Wajar €550/bulan)</p>
                </div>
            </div>

            <div class="space-y-2 bg-slate-50 p-4 rounded-2xl border border-slate-200">
                <h4 class="font-bold text-slate-900 text-sm">Review & Rating Kating</h4>
                <p class="text-amber-500 font-bold">⭐⭐⭐⭐⭐ 5 / 5</p>
                <p class="text-slate-700 italic font-medium">"Studio sangat terawat. Landlord ramah. Lingkungan tenang dekat dengan kampus TU Delft (hanya 10 menit bersepeda)."</p>
            </div>
        </div>

        <!-- Foto Bukti Lapangan -->
        <div>
            <h4 class="font-bold text-slate-900 text-xs uppercase tracking-wider mb-3">Foto Bukti Lapangan (3 File)</h4>
            <div class="grid grid-cols-3 gap-3">
                <div class="bg-slate-200 h-28 rounded-2xl flex items-center justify-center font-bold text-slate-500 text-xs bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&w=400&q=80');">
                    <span class="bg-black/60 text-white px-2 py-1 rounded">Foto Kamar Utama</span>
                </div>
                <div class="bg-slate-200 h-28 rounded-2xl flex items-center justify-center font-bold text-slate-500 text-xs bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=400&q=80');">
                    <span class="bg-black/60 text-white px-2 py-1 rounded">Foto Kamar Mandi</span>
                </div>
                <div class="bg-slate-200 h-28 rounded-2xl flex items-center justify-center font-bold text-slate-500 text-xs bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=400&q=80');">
                    <span class="bg-black/60 text-white px-2 py-1 rounded">Tampak Depan</span>
                </div>
            </div>
        </div>

        <!-- Action buttons -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
            <button onclick="alert('Laporan dikembalikan ke Kating untuk revisi foto/deskripsi.')" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl">Minta Revisi ke Kating</button>
            <button onclick="alert('Laporan disetujui! Hasil verifikasi Apartment Check kini dapat diakses Klien.')" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl shadow-lg shadow-emerald-600/30">Approve & Teruskan Ke Klien</button>
        </div>
    </div>
</div>
@endsection
