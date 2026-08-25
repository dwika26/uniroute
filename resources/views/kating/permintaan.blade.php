@extends('layouts.app')

@section('title', 'Permintaan Masuk — UniRoute Kating')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Permintaan Masuk</h1>
            <p class="text-sm text-slate-500">Tinjau dan tanggapi pengajuan dari mahasiswa/klien yang memilih Anda.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-semibold rounded-full">3 Menunggu Konfirmasi</span>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="flex border-b border-slate-200 gap-6 text-sm font-semibold">
        <button class="pb-3 border-b-2 border-emerald-600 text-emerald-700">Semua Permintaan (3)</button>
        <button class="pb-3 text-slate-500 hover:text-slate-700">Apartment Check (1)</button>
        <button class="pb-3 text-slate-500 hover:text-slate-700">Move-in Help (1)</button>
        <button class="pb-3 text-slate-500 hover:text-slate-700">Airport Pickup (1)</button>
    </div>

    <!-- List Request Cards -->
    <div class="space-y-4">
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-emerald-300 transition">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-sm">
                        SR
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Siti Rahma</h3>
                        <p class="text-xs text-slate-500">Calon Mahasiswa TU Delft • LoA Received</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 bg-teal-50 text-teal-700 text-xs font-bold rounded-full border border-teal-200">🏢 Apartment Check</span>
                    <span class="text-xs text-slate-400">2 jam lalu</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-4 text-xs">
                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                    <span class="text-slate-400 block mb-0.5 font-medium">Link Listing / Alamat</span>
                    <a href="https://kamernet.nl/dummy" target="_blank" class="font-semibold text-emerald-700 hover:underline">Phoenixstraat 42, 2611 AL Delft 🔗</a>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                    <span class="text-slate-400 block mb-0.5 font-medium">Target Deadline</span>
                    <span class="font-semibold text-slate-800">28 Agustus 2026</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                    <span class="text-slate-400 block mb-0.5 font-medium">Estimasi Fee Insentif</span>
                    <span class="font-bold text-emerald-700">€35 (~ Rp 595.000)</span>
                </div>
            </div>

            <div class="bg-amber-50/60 p-3 rounded-xl border border-amber-200/60 text-xs text-amber-900 mb-4">
                <strong>Catatan Klien:</strong> "Halo Kak Budi! Saya berencana sewa studio ini dari landlord Kamernet. Mohon bantu cek kebersihan, ketersediaan pemanas ruangan, dan pastikan tidak ada bau lembab ya kak."
            </div>

            <div class="flex items-center justify-end gap-3">
                <a href="/chat" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl transition">Chat Klien Dulu</a>
                <button onclick="alert('Permintaan ditolak')" class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 font-semibold text-xs rounded-xl transition border border-rose-200">Tolak Request</button>
                <button onclick="alert('Permintaan berhasil diterima! Job dipindahkan ke Layanan Aktif.')" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs rounded-xl transition shadow-md shadow-emerald-600/20">Terima & Kerjakan</button>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-emerald-300 transition">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-4 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-800 flex items-center justify-center font-bold text-sm">
                        AW
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Andi Wijaya</h3>
                        <p class="text-xs text-slate-500">Mahasiswa Baru TU Delft</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-full border border-blue-200">📦 Move-in Help</span>
                    <span class="text-xs text-slate-400">5 jam lalu</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-4 text-xs">
                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                    <span class="text-slate-400 block mb-0.5 font-medium">Lokasi Move-in</span>
                    <span class="font-semibold text-slate-800">Balthasar van der Polpad, Delft</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                    <span class="text-slate-400 block mb-0.5 font-medium">Tanggal Kedatangan</span>
                    <span class="font-semibold text-slate-800">30 Agustus 2026</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                    <span class="text-slate-400 block mb-0.5 font-medium">Estimasi Fee Insentif</span>
                    <span class="font-bold text-emerald-700">€25 (~ Rp 425.000)</span>
                </div>
            </div>

            <div class="bg-slate-50 p-3 rounded-xl border border-slate-200 text-xs text-slate-700 mb-4">
                <strong>Catatan Klien:</strong> "Bawa 2 koper besar. Minta bantuan angkut ke lantai 2 (tanpa lift) dan informasi toko grosir Asia terdekat."
            </div>

            <div class="flex items-center justify-end gap-3">
                <a href="/chat" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl transition">Chat Klien Dulu</a>
                <button onclick="alert('Permintaan ditolak')" class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 font-semibold text-xs rounded-xl transition border border-rose-200">Tolak Request</button>
                <button onclick="alert('Permintaan berhasil diterima! Job dipindahkan ke Layanan Aktif.')" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs rounded-xl transition shadow-md shadow-emerald-600/20">Terima & Kerjakan</button>
            </div>
        </div>
    </div>
</div>
@endsection
