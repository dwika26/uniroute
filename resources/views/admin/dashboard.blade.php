@extends('layouts.app')

@section('title', 'Admin Dashboard — UniRoute')

@section('content')
<div class="space-y-8">
    <!-- Admin Header -->
    <div class="rounded-3xl p-6 sm:p-8 shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden"
         style="background: linear-gradient(135deg, #3b0764 0%, #1e1b4b 50%, #0f172a 100%); color: #ffffff;">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl"></div>
        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-2"
                 style="background: rgba(168, 85, 247, 0.2); color: #e9d5ff; border: 1px solid rgba(168, 85, 247, 0.3);">
                🛡 Internal Operational Dashboard
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white" style="color: #ffffff;">Panel Admin UniRoute</h1>
            <p class="text-sm mt-1" style="color: #e2e8f0;">Kelola pendaftaran Kating, moderasi laporan Apartment Check, antrian order, & tiket support.</p>
        </div>
        <div class="flex items-center gap-3 relative z-10">
            <a href="/admin/approval" class="px-5 py-2.5 rounded-full font-bold text-xs transition shadow-lg hover:opacity-90"
               style="background: #a855f7; color: #ffffff;">
                Pending Approval (4)
            </a>
            <a href="/admin/moderasi" class="px-5 py-2.5 rounded-full font-bold text-xs transition hover:bg-white/20"
               style="background: rgba(255, 255, 255, 0.15); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.3);">
                Moderasi Laporan (2)
            </a>
        </div>
    </div>

    <!-- Stat Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-semibold text-slate-400 uppercase">Total Kating Terverifikasi</span>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">48</h3>
            <span class="text-xs text-emerald-600 font-bold">12 Negara Tujuan</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-semibold text-slate-400 uppercase">Total Layanan Diproses</span>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">164</h3>
            <span class="text-xs text-blue-600 font-bold">Bulan Ini: +32 Job</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-semibold text-slate-400 uppercase">Moderasi Laporan Pending</span>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">2</h3>
            <span class="text-xs text-amber-600 font-bold">Butuh Review Admin</span>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-semibold text-slate-400 uppercase">Tiket Support Open</span>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">3</h3>
            <span class="text-xs text-rose-600 font-bold">Eskalasi Komplain</span>
        </div>
    </div>

    <!-- Admin Modules Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="/admin/approval" class="bg-white p-6 rounded-2xl border border-slate-200 hover:border-amber-400 transition shadow-sm group">
            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-lg mb-3">
                🎓
            </div>
            <h3 class="font-bold text-slate-900 group-hover:text-amber-600">Approval Pendaftaran Kating</h3>
            <p class="text-xs text-slate-500 mt-1">Verifikasi kartu mahasiswa & paspor pendaftar kating baru.</p>
        </a>

        <a href="/admin/moderasi" class="bg-white p-6 rounded-2xl border border-slate-200 hover:border-amber-400 transition shadow-sm group">
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-lg mb-3">
                🏢
            </div>
            <h3 class="font-bold text-slate-900 group-hover:text-blue-600">Moderasi Hasil Apartment Check</h3>
            <p class="text-xs text-slate-500 mt-1">Review checklist & foto bukti kating sebelum dikirim ke klien.</p>
        </a>

        <a href="/admin/support" class="bg-white p-6 rounded-2xl border border-slate-200 hover:border-amber-400 transition shadow-sm group">
            <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center font-bold text-lg mb-3">
                🎧
            </div>
            <h3 class="font-bold text-slate-900 group-hover:text-rose-600">Support & Complaint Inbox</h3>
            <p class="text-xs text-slate-500 mt-1">Tanggapi tiket eskalasi dan kendala transaksional klien.</p>
        </a>
    </div>
</div>
@endsection
