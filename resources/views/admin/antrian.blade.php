@extends('layouts.app')

@section('title', 'Monitoring Antrian — Admin UniRoute')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Monitoring Antrian Job</h1>
            <p class="text-sm text-slate-500">Pantau seluruh permintaan dari klien per jenis layanan yang sedang menunggu respon kating.</p>
        </div>
        <div class="flex items-center gap-2 text-xs font-semibold">
            <span class="px-3 py-1 bg-amber-100 text-amber-800 rounded-full">5 Order Antrian</span>
        </div>
    </div>

    <!-- Table queue -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-semibold uppercase">
                <tr>
                    <th class="p-4">ID Job</th>
                    <th class="p-4">Jenis Layanan</th>
                    <th class="p-4">Klien</th>
                    <th class="p-4">Kating Dipilih</th>
                    <th class="p-4">Lokasi & Tanggal</th>
                    <th class="p-4">Status Respon</th>
                    <th class="p-4 text-center">Aksi Admin</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <tr>
                    <td class="p-4 font-mono font-bold text-slate-900">#REQ-8821</td>
                    <td class="p-4"><span class="px-2.5 py-1 bg-teal-50 text-teal-800 font-bold rounded-full">Apartment Check</span></td>
                    <td class="p-4 font-semibold text-slate-800">Siti Rahma</td>
                    <td class="p-4 font-semibold text-slate-800">Budi Pratama (TU Delft)</td>
                    <td class="p-4">Delft, NLD • 28 Aug 2026</td>
                    <td class="p-4"><span class="px-2.5 py-0.5 bg-amber-100 text-amber-800 font-bold rounded-full">Menunggu Respon (2 jam)</span></td>
                    <td class="p-4 text-center">
                        <button onclick="alert('Notifikasi reminder dikirim ke Kating Budi Pratama!')" class="px-3 py-1 bg-amber-50 hover:bg-amber-100 text-amber-700 font-bold rounded-lg border border-amber-200">Ping Kating</button>
                    </td>
                </tr>
                <tr>
                    <td class="p-4 font-mono font-bold text-slate-900">#REQ-8822</td>
                    <td class="p-4"><span class="px-2.5 py-1 bg-blue-50 text-blue-800 font-bold rounded-full">Move-in Help</span></td>
                    <td class="p-4 font-semibold text-slate-800">Andi Wijaya</td>
                    <td class="p-4 font-semibold text-slate-800">Budi Pratama (TU Delft)</td>
                    <td class="p-4">Delft, NLD • 30 Aug 2026</td>
                    <td class="p-4"><span class="px-2.5 py-0.5 bg-amber-100 text-amber-800 font-bold rounded-full">Menunggu Respon (5 jam)</span></td>
                    <td class="p-4 text-center">
                        <button onclick="alert('Notifikasi reminder dikirim ke Kating Budi Pratama!')" class="px-3 py-1 bg-amber-50 hover:bg-amber-100 text-amber-700 font-bold rounded-lg border border-amber-200">Ping Kating</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
