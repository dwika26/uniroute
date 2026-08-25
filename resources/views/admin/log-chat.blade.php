@extends('layouts.app')

@section('title', 'Log Chat (Read-Only) — Admin UniRoute')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Arsip Log Chat (Read-Only Audit)</h1>
            <p class="text-sm text-slate-500">Monitoring & audit percakapan Klien-Kating untuk penanganan klaim dispute atau komplain.</p>
        </div>
        <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-bold rounded-full border border-slate-200">🔒 Security Audit Log</span>
    </div>

    <!-- Chat Audit Log Interface -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden grid grid-cols-1 md:grid-cols-3">
        <!-- Conversation List -->
        <div class="border-r border-slate-200 p-4 space-y-3 bg-slate-50/50 text-xs">
            <input type="text" placeholder="Cari ID Chat / Nama Klien / Kating..." class="w-full text-xs">

            <div class="space-y-2">
                <div class="p-3 bg-white rounded-xl border border-emerald-300 shadow-sm cursor-pointer">
                    <div class="flex justify-between items-center mb-1">
                        <span class="font-bold text-slate-900">Siti Rahma ↔ Budi P.</span>
                        <span class="text-slate-400 text-[10px]">10:42 AM</span>
                    </div>
                    <p class="text-slate-500 truncate">Siti: "Terima kasih kak atas foto-fotonya..."</p>
                    <span class="inline-block mt-2 px-2 py-0.5 bg-teal-50 text-teal-700 text-[10px] font-bold rounded">Job: #REQ-8821</span>
                </div>

                <div class="p-3 bg-white rounded-xl border border-slate-200 hover:border-slate-300 cursor-pointer">
                    <div class="flex justify-between items-center mb-1">
                        <span class="font-bold text-slate-900">Andi W. ↔ Budi P.</span>
                        <span class="text-slate-400 text-[10px]">Yesterday</span>
                    </div>
                    <p class="text-slate-500 truncate">Budi: "Siap, saya jemput di stasiun jam 3 sore."</p>
                    <span class="inline-block mt-2 px-2 py-0.5 bg-blue-50 text-blue-700 text-[10px] font-bold rounded">Job: #REQ-8822</span>
                </div>
            </div>
        </div>

        <!-- Chat Stream Log -->
        <div class="md:col-span-2 p-6 flex flex-col justify-between space-y-4">
            <div class="border-b border-slate-100 pb-3 flex justify-between items-center text-xs">
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Percakapan: Siti Rahma (Klien) & Budi Pratama (Kating)</h3>
                    <p class="text-slate-500">Layanan: Apartment Check (Phoenixstraat 42, Delft)</p>
                </div>
                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-800 font-bold text-[10px] rounded-full border border-emerald-200">Session Verified</span>
            </div>

            <!-- Messages Stream -->
            <div class="space-y-4 text-xs max-h-96 overflow-y-auto pr-2">
                <div class="flex gap-3">
                    <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-600 text-xs shrink-0">SR</div>
                    <div class="bg-slate-100 p-3 rounded-2xl max-w-md">
                        <span class="font-bold text-slate-900 block mb-1">Siti Rahma <span class="text-[10px] text-slate-400 font-normal">10:30 AM</span></span>
                        Halo Kak Budi, mohon maaf mengganggu. Untuk check studio Phoenixstraat besok apakah bisa dicek pemanas air di kamar mandi juga ya kak?
                    </div>
                </div>

                <div class="flex gap-3 justify-end">
                    <div class="bg-emerald-50 border border-emerald-200 p-3 rounded-2xl max-w-md">
                        <span class="font-bold text-emerald-900 block mb-1">Budi Pratama <span class="text-[10px] text-emerald-600 font-normal">10:35 AM</span></span>
                        Halo Siti! Tentu bisa sekali. Nanti saya tes langsung kran air panas dan cek meteran listriknya juga ya.
                    </div>
                    <div class="w-8 h-8 rounded-full bg-emerald-700 text-white flex items-center justify-center font-bold text-xs shrink-0">BP</div>
                </div>

                <div class="flex gap-3">
                    <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center font-bold text-slate-600 text-xs shrink-0">SR</div>
                    <div class="bg-slate-100 p-3 rounded-2xl max-w-md">
                        <span class="font-bold text-slate-900 block mb-1">Siti Rahma <span class="text-[10px] text-slate-400 font-normal">10:42 AM</span></span>
                        Wah mantap sekali kak, terima kasih banyak atas bantuannya! 🙏
                    </div>
                </div>
            </div>

            <div class="p-3 bg-amber-50 rounded-xl border border-amber-200 text-amber-900 text-xs font-semibold">
                ℹ️ Tampilan ini bersifat Read-Only untuk keperluan pengawasan keamanan dan audit kepatuhan platform UniRoute.
            </div>
        </div>
    </div>
</div>
@endsection
