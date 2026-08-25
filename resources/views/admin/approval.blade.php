@extends('layouts.app')

@section('title', 'Approval Kating — Admin UniRoute')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Approval Kating Baru</h1>
            <p class="text-sm text-slate-500">Verifikasi berkas identitas dan status aktif mahasiswa calon Kating partner.</p>
        </div>
        <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full">4 Verifikasi Pending</span>
    </div>

    <!-- Applicants List -->
    <div class="space-y-4">
        <!-- Applicant 1 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-4 border-b border-slate-100">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-800 font-bold flex items-center justify-center text-lg">
                        RA
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Rizky Aditya</h3>
                        <p class="text-xs text-slate-500">M.Sc. Renewable Energy @ University of Edinburgh, UK</p>
                    </div>
                </div>
                <span class="px-3 py-1 bg-amber-50 text-amber-700 text-xs font-bold rounded-full border border-amber-200">Pending Review</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                <div class="bg-slate-50 p-3 rounded-xl">
                    <span class="text-slate-400 block mb-0.5">Dokumen Kartu Mahasiswa (KTM)</span>
                    <span class="font-semibold text-blue-600 cursor-pointer hover:underline">📄 ktm_rizky_edinburgh.pdf (Verified Scan)</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl">
                    <span class="text-slate-400 block mb-0.5">Paspor / LoA / Visa</span>
                    <span class="font-semibold text-blue-600 cursor-pointer hover:underline">📄 student_visa_uk.pdf</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl">
                    <span class="text-slate-400 block mb-0.5">Layanan Yang Ditawarkan</span>
                    <span class="font-semibold text-slate-800">Apartment Check, Airport Pickup</span>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2">
                <button onclick="alert('Pendaftaran ditolak')" class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 font-semibold text-xs rounded-xl border border-rose-200 transition">Tolak Pendaftaran</button>
                <button onclick="alert('Pendaftar berhasil disetujui sebagai Kating Terverifikasi!')" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl shadow-md transition">Approve & Verifikasi</button>
            </div>
        </div>

        <!-- Applicant 2 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-4 border-b border-slate-100">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-800 font-bold flex items-center justify-center text-lg">
                        NS
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Nabila Salsabila</h3>
                        <p class="text-xs text-slate-500">B.Sc. Business Admin @ National University of Singapore (NUS)</p>
                    </div>
                </div>
                <span class="px-3 py-1 bg-amber-50 text-amber-700 text-xs font-bold rounded-full border border-amber-200">Pending Review</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                <div class="bg-slate-50 p-3 rounded-xl">
                    <span class="text-slate-400 block mb-0.5">Dokumen Kartu Mahasiswa (KTM)</span>
                    <span class="font-semibold text-blue-600 cursor-pointer hover:underline">📄 ktm_nus_nabila.pdf</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl">
                    <span class="text-slate-400 block mb-0.5">Paspor / LoA / Visa</span>
                    <span class="font-semibold text-blue-600 cursor-pointer hover:underline">📄 nus_loa_2026.pdf</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl">
                    <span class="text-slate-400 block mb-0.5">Layanan Yang Ditawarkan</span>
                    <span class="font-semibold text-slate-800">Move-in Help, Airport Pickup</span>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2">
                <button onclick="alert('Pendaftaran ditolak')" class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 font-semibold text-xs rounded-xl border border-rose-200 transition">Tolak Pendaftaran</button>
                <button onclick="alert('Pendaftar berhasil disetujui sebagai Kating Terverifikasi!')" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl shadow-md transition">Approve & Verifikasi</button>
            </div>
        </div>
    </div>
</div>
@endsection
