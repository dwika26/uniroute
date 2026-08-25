@extends('layouts.app')

@section('title', 'Support Tickets — Admin UniRoute')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Admin Support & Tiket Eskalasi</h1>
            <p class="text-sm text-slate-500">Kelola pertanyaan umum, bantuan darurat, dan tiket komplain dari Klien & Kating.</p>
        </div>
        <span class="px-3 py-1 bg-rose-100 text-rose-800 text-xs font-bold rounded-full">3 Tiket Open</span>
    </div>

    <!-- Ticket list -->
    <div class="space-y-4 text-xs">
        <!-- Ticket 1 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <span class="px-2.5 py-0.5 bg-rose-100 text-rose-800 font-bold rounded-full">#TCK-9901</span>
                    <h3 class="font-bold text-slate-900 text-sm">Kendala Penjemputan Bandara (Airport Pickup)</h3>
                </div>
                <span class="text-slate-400">Pengirim: Dimas Anggara (Klien) • 1 Jam lalu</span>
            </div>

            <p class="text-slate-700 bg-slate-50 p-4 rounded-xl border border-slate-200">
                "Penerbangan saya mengalami delay 2 jam dari jadwal awal. Saya sudah kirim pesan ke Kating tapi belum dibalas. Mohon bantuan admin untuk menghubungi Kating terdekat."
            </p>

            <div class="flex items-center justify-between pt-2">
                <span class="px-3 py-1 bg-amber-50 text-amber-800 font-semibold rounded-full border border-amber-200">Status: Diproses Admin</span>
                <div class="flex items-center gap-2">
                    <button onclick="alert('Balasan tiket berhasil dikirim ke Klien!')" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-md">Balas Tiket Support</button>
                </div>
            </div>
        </div>

        <!-- Ticket 2 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <span class="px-2.5 py-0.5 bg-blue-100 text-blue-800 font-bold rounded-full">#TCK-9892</span>
                    <h3 class="font-bold text-slate-900 text-sm">Pertanyaan Pembayaran & Insentif Kating</h3>
                </div>
                <span class="text-slate-400">Pengirim: Budi Pratama (Kating) • 4 Jam lalu</span>
            </div>

            <p class="text-slate-700 bg-slate-50 p-4 rounded-xl border border-slate-200">
                "Bagaimana prosedur pengubahan nomor rekening pencairan insentif dari BCA ke Mandiri?"
            </p>

            <div class="flex items-center justify-between pt-2">
                <span class="px-3 py-1 bg-emerald-50 text-emerald-800 font-semibold rounded-full border border-emerald-200">Status: Selesai</span>
                <button onclick="alert('Tiket dibuka kembali untuk ditindaklanjuti')" class="px-4 py-2 bg-slate-100 text-slate-700 font-semibold rounded-xl">Lihat Detail Chat</button>
            </div>
        </div>
    </div>
</div>
@endsection
