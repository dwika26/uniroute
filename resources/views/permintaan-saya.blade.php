@extends('layouts.app')
@section('title', 'Permintaan Saya — UniRoute')
@section('content')

<style>
.page-header { margin-bottom: 1.75rem; }
.page-header h1 { font-size: clamp(1.5rem,3.5vw,2.25rem); color:var(--color-ur-white); margin:0 0 0.375rem; }
.page-header p  { color:var(--color-ur-gray); font-size:0.9rem; margin:0; }

/* ─── Tabs ─── */
.req-tabs { display:flex; gap:0.5rem; margin-bottom:1.5rem; background:var(--color-ur-card); border:1.5px solid var(--color-ur-border); border-radius:12px; padding:0.375rem; width:fit-content; flex-wrap:wrap; box-shadow:var(--shadow-card); }
.req-tab { padding:0.5rem 1.25rem; border-radius:8px; font-size:0.85rem; font-weight:600; color:var(--color-ur-gray-2); cursor:pointer; border:none; background:transparent; transition:all 0.18s; }
.req-tab.active { background:var(--color-ur-border); color:var(--color-ur-white); }
.req-tab:hover:not(.active) { color:var(--color-ur-gray); }

/* ─── Request Item ─── */
.req-list { display:flex; flex-direction:column; gap:0.875rem; }
.req-item {
    background:var(--color-ur-card); border:1.5px solid var(--color-ur-border); border-radius:16px;
    padding:1.25rem; display:flex; gap:1rem; align-items:flex-start;
    transition:all 0.2s;
    box-shadow:var(--shadow-card);
}
.req-item:hover { border-color:var(--color-ur-purple); }
.req-svc-icon { width:52px;height:52px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;flex-shrink:0; }
.req-body { flex:1; min-width:0; }
.req-top { display:flex;justify-content:space-between;align-items:flex-start;gap:0.5rem;margin-bottom:0.375rem; flex-wrap:wrap; }
.req-title { font-size:0.975rem;font-weight:700;color:var(--color-ur-white); }
.req-kating { font-size:0.8rem;color:var(--color-ur-gray);margin-bottom:0.5rem; }
.req-date  { font-size:0.78rem;color:var(--color-ur-gray-2); }
.req-actions { display:flex;gap:0.5rem;margin-top:0.875rem;flex-wrap:wrap; }
.req-btn-primary { padding:0.45rem 1rem;border-radius:8px;font-size:0.78rem;font-weight:700;background:linear-gradient(135deg,var(--color-ur-mint-dark),var(--color-ur-mint));color:#ffffff;border:none;cursor:pointer;transition:all 0.18s;text-decoration:none; }
.req-btn-primary:hover { opacity:0.95; }
.req-btn-ghost { padding:0.45rem 0.875rem;border-radius:8px;font-size:0.78rem;font-weight:600;background:transparent;border:1.5px solid var(--color-ur-border);color:var(--color-ur-gray);cursor:pointer;transition:all 0.18s;text-decoration:none; }
.req-btn-ghost:hover { border-color:var(--color-ur-purple);color:var(--color-ur-purple); }

/* ─── Empty State ─── */
.empty-state { text-align:center;padding:4rem 2rem;color:var(--color-ur-gray-2); }
.empty-state .empty-icon { font-size:3rem;margin-bottom:1rem;display:block; }
.empty-state h3 { color:var(--color-ur-gray);font-size:1.1rem;margin:0 0 0.5rem; }
.empty-state p  { font-size:0.875rem;margin:0 0 1.5rem; }
</style>

<div class="page-header" id="page-header-permintaan">
    <h1>Permintaan Saya</h1>
    <p>Pantau status semua layanan yang kamu ajukan</p>
</div>

<!-- Tabs -->
<div class="req-tabs" id="req-tabs">
    <button class="req-tab active" id="tab-semua" onclick="filterReq('semua', this)">Semua</button>
    <button class="req-tab" id="tab-menunggu" onclick="filterReq('menunggu', this)">⏳ Menunggu</button>
    <button class="req-tab" id="tab-berjalan" onclick="filterReq('berjalan', this)">🔵 Berjalan</button>
    <button class="req-tab" id="tab-selesai" onclick="filterReq('selesai', this)">✅ Selesai</button>
</div>

@php
$requests = [
    ['id'=>1,'jenis'=>'Apartment Check','icon'=>'🏠','icon_bg'=>'rgba(37,99,235,0.12)','kating'=>'Ayu Pradnya Dewi','kampus'=>'Melbourne, Australia','status'=>'selesai','tanggal'=>'12 Jun 2026','detail_url'=>'/detail-layanan/1','chat_url'=>'/chat/1','desc'=>'Inspeksi Apt. Lygon St, Carlton — 32 poin checklist'],
    ['id'=>2,'jenis'=>'Airport Pickup','icon'=>'✈️','icon_bg'=>'#fef3c7','kating'=>'Budi Santoso','kampus'=>'Tokyo, Jepang','status'=>'berjalan','tanggal'=>'30 Jun 2026','detail_url'=>'/detail-layanan/2','chat_url'=>'/chat/2','desc'=>'Narita Airport, penerbangan JL720 · 14:30'],
    ['id'=>3,'jenis'=>'Move-in Help','icon'=>'📦','icon_bg'=>'var(--color-ur-mint-light)','kating'=>'Ni Made Sari','kampus'=>'Delft, Belanda','status'=>'menunggu','tanggal'=>'5 Jul 2026','detail_url'=>'/detail-layanan/3','chat_url'=>'/chat/3','desc'=>'Kepindahan ke Apt. Rotterdamseweg — 2 koper, 1 ransel'],
    ['id'=>4,'jenis'=>'Apartment Check','icon'=>'🏠','icon_bg'=>'rgba(37,99,235,0.12)','kating'=>'Komang Agus','kampus'=>'Sydney, Australia','status'=>'selesai','tanggal'=>'2 Jun 2026','detail_url'=>'/detail-layanan/4','chat_url'=>'/chat/4','desc'=>'Inspeksi Unit 4B, Glebe NSW — 28 poin checklist'],
];
@endphp

<div class="req-list" id="req-list">
    @foreach($requests as $r)
    <div class="req-item" data-status="{{ $r['status'] }}" id="req-item-{{ $r['id'] }}">
        <div class="req-svc-icon" style="background:{{ $r['icon_bg'] }};">{{ $r['icon'] }}</div>
        <div class="req-body">
            <div class="req-top">
                <span class="req-title">{{ $r['jenis'] }}</span>
                @include('components.status-badge', ['status' => $r['status']])
            </div>
            <p class="req-kating">🎓 {{ $r['kating'] }} · {{ $r['kampus'] }}</p>
            <p class="req-date">📅 {{ $r['tanggal'] }} · {{ $r['desc'] }}</p>
            <div class="req-actions">
                <a href="{{ $r['detail_url'] }}" class="req-btn-primary" id="btn-detail-req-{{ $r['id'] }}">
                    {{ $r['status'] === 'selesai' ? '📄 Lihat Hasil' : '👁 Lihat Detail' }}
                </a>
                <a href="{{ $r['chat_url'] }}" class="req-btn-ghost" id="btn-chat-req-{{ $r['id'] }}">💬 Chat</a>
                @if($r['status'] === 'menunggu')
                <button class="req-btn-ghost" id="btn-batal-req-{{ $r['id'] }}" onclick="batalkanReq({{ $r['id'] }})">✕ Batalkan</button>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="empty-state" id="empty-state" style="display:none;">
    <span class="empty-icon">📭</span>
    <h3>Tidak ada permintaan</h3>
    <p>Belum ada layanan dengan status ini</p>
    <a href="/browse-kating" style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.75rem 1.5rem;border-radius:10px;background:linear-gradient(135deg,var(--color-ur-mint-dark),var(--color-ur-mint));color:#ffffff;font-weight:700;font-size:0.875rem;text-decoration:none;">
        🎓 Cari Kating
    </a>
</div>

<script>
function filterReq(status, btn) {
    document.querySelectorAll('.req-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');
    const items = document.querySelectorAll('.req-item');
    let count = 0;
    items.forEach(item => {
        const show = status === 'semua' || item.dataset.status === status;
        item.style.display = show ? '' : 'none';
        if (show) count++;
    });
    document.getElementById('empty-state').style.display = count === 0 ? '' : 'none';
}
function batalkanReq(id) {
    if (confirm('Batalkan permintaan ini?')) {
        const item = document.getElementById('req-item-'+id);
        item.style.opacity = '0.4';
        item.style.pointerEvents = 'none';
        setTimeout(() => { item.style.display = 'none'; }, 600);
    }
}
</script>

@endsection
