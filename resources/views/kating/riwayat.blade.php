@extends('layouts.app')

@section('title', 'Riwayat & Insentif — UniRoute Kating')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Riwayat Job & Insentif</h1>
            <p class="text-sm text-slate-500">Histori pekerjaan yang telah Anda selesaikan beserta rincian insentif komisi.</p>
        </div>
        <div class="bg-emerald-50 border border-emerald-200 px-4 py-2 rounded-2xl flex items-center gap-3">
            <div>
                <span class="text-xs text-emerald-700 font-semibold block">Total Akumulasi Insentif</span>
                <span class="text-lg font-bold text-emerald-900">€420.00 (~ Rp 7.140.000)</span>
            </div>
            <span class="px-2.5 py-1 bg-emerald-600 text-white text-xs font-bold rounded-lg">Cair ke Bank IDN</span>
        </div>
    </div>

    <!-- Table of History -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-700">
                <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 uppercase font-semibold">
                    <tr>
                        <th class="p-4">Tanggal</th>
                        <th class="p-4">Jenis Layanan</th>
                        <th class="p-4">Nama Klien</th>
                        <th class="p-4">Lokasi / Detail</th>
                        <th class="p-4">Rating Klien</th>
                        <th class="p-4 text-right">Fee Insentif</th>
                        <th class="p-4 text-center">Status Pencairan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="p-4 font-semibold text-slate-800">22 Agu 2026</td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 bg-teal-50 text-teal-800 rounded-full font-semibold border border-teal-200">🏢 Apartment Check</span>
                        </td>
                        <td class="p-4 font-bold text-slate-900">Kevin Sanjaya</td>
                        <td class="p-4">Mekelweg 5, Delft</td>
                        <td class="p-4 text-amber-500 font-bold">⭐⭐⭐⭐⭐ (5.0)</td>
                        <td class="p-4 text-right font-bold text-slate-900">€35.00</td>
                        <td class="p-4 text-center">
                            <span class="px-2.5 py-0.5 bg-emerald-100 text-emerald-800 font-bold rounded-full text-xs">Dicairkan</span>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="p-4 font-semibold text-slate-800">18 Agu 2026</td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 bg-blue-50 text-blue-800 rounded-full font-semibold border border-blue-200">📦 Move-in Help</span>
                        </td>
                        <td class="p-4 font-bold text-slate-900">Nadia Utami</td>
                        <td class="p-4">Prof. Schermerhornstraat, Delft</td>
                        <td class="p-4 text-amber-500 font-bold">⭐⭐⭐⭐⭐ (5.0)</td>
                        <td class="p-4 text-right font-bold text-slate-900">€25.00</td>
                        <td class="p-4 text-center">
                            <span class="px-2.5 py-0.5 bg-emerald-100 text-emerald-800 font-bold rounded-full text-xs">Dicairkan</span>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="p-4 font-semibold text-slate-800">12 Agu 2026</td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 bg-purple-50 text-purple-800 rounded-full font-semibold border border-purple-200">✈️ Airport Pickup</span>
                        </td>
                        <td class="p-4 font-bold text-slate-900">Fajar Alfian</td>
                        <td class="p-4">Schiphol Airport ➔ Delft</td>
                        <td class="p-4 text-amber-500 font-bold">⭐⭐⭐⭐⭐ (5.0)</td>
                        <td class="p-4 text-right font-bold text-slate-900">€40.00</td>
                        <td class="p-4 text-center">
                            <span class="px-2.5 py-0.5 bg-emerald-100 text-emerald-800 font-bold rounded-full text-xs">Dicairkan</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
