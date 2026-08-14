@extends('layouts.app')
@section('title', 'Detail Layanan — UniRoute')
@section('content')

@php
$id = $layananId ?? 1;
$layananData = [
    1 => ['jenis'=>'Apartment Check','icon'=>'🏠','kating'=>'Ayu Pradnya Dewi','avatar'=>'https://i.pravatar.cc/64?u=1','kota'=>'Melbourne, Australia','tanggal_eksekusi'=>'12 Jun 2026','status'=>'selesai'],
    2 => ['jenis'=>'Airport Pickup', 'icon'=>'✈️','kating'=>'Budi Santoso',     'avatar'=>'https://i.pravatar.cc/64?u=2','kota'=>'Tokyo, Jepang',   'tanggal_eksekusi'=>'30 Jun 2026','status'=>'berjalan'],
    3 => ['jenis'=>'Move-in Help',   'icon'=>'📦','kating'=>'Ni Made Sari',     'avatar'=>'https://i.pravatar.cc/64?u=3','kota'=>'Delft, Belanda', 'tanggal_eksekusi'=>'5 Jul 2026', 'status'=>'menunggu'],
];
$l = $layananData[$id] ?? $layananData[1];
@endphp

<style>
.detail-layout { display:grid;grid-template-columns:1fr 300px;gap:1.5rem;align-items:start; }
.detail-card { background:var(--color-ur-card);border:1.5px solid var(--color-ur-border);border-radius:20px;overflow:hidden;box-shadow:var(--shadow-card); }
.detail-header { background:linear-gradient(135deg,var(--color-ur-navy-2),var(--color-ur-navy-3));padding:1.5rem;display:flex;align-items:center;gap:1rem;border-bottom:1px solid var(--color-ur-border); }
.detail-header .dh-icon { font-size:2rem; }
.detail-header h1 { font-size:1.25rem;color:var(--color-ur-white);margin:0 0 0.25rem; }
.detail-header p  { font-size:0.8rem;color:var(--color-ur-gray);margin:0; }
.detail-body { padding:1.75rem; }

.checklist-item { display:flex;align-items:center;gap:0.75rem;padding:0.75rem 0;border-bottom:1px solid var(--color-ur-border); }
.checklist-item:last-child { border-bottom:none; }
.check-icon { width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.75rem;flex-shrink:0; }
.check-icon.pass { background:var(--color-ur-mint-light);color:var(--color-ur-mint);border:1.5px solid rgba(13,148,136,0.3); }
.check-icon.warn { background:#fef3c7;color:var(--color-ur-gold);border:1.5px solid rgba(217,119,6,0.3); }
.check-icon.fail { background:#fee2e2;color:#ef4444;border:1.5px solid rgba(239,68,68,0.3); }
.check-label { flex:1;font-size:0.875rem;color:var(--color-ur-white); }
.check-note  { font-size:0.75rem;color:var(--color-ur-gray-2);max-width:200px;text-align:right; }

.photo-grid { display:grid;grid-template-columns:repeat(3,1fr);gap:0.5rem;margin-top:1rem; }
.photo-item { aspect-ratio:1;border-radius:10px;overflow:hidden;background:var(--color-ur-card);cursor:pointer; }
.photo-item img { width:100%;height:100%;object-fit:cover;transition:transform 0.2s; }
.photo-item:hover img { transform:scale(1.05); }

.info-row { display:flex;justify-content:space-between;padding:0.625rem 0;border-bottom:1px solid var(--color-ur-border);font-size:0.875rem; }
.info-row:last-child { border-bottom:none; }
.info-label { color:var(--color-ur-gray-2); }
.info-value { color:var(--color-ur-white);font-weight:500;text-align:right; }

.section-card { background:var(--color-ur-card);border:1.5px solid var(--color-ur-border);border-radius:16px;padding:1.25rem;margin-bottom:1rem;box-shadow:var(--shadow-card); }
.section-card h3 { font-size:0.9rem;font-weight:700;color:var(--color-ur-white);margin:0 0 1rem;padding-bottom:0.625rem;border-bottom:1px solid var(--color-ur-border); }

.sidebar-section { display:flex;flex-direction:column;gap:1rem; }
.kating-box { background:var(--color-ur-card);border:1.5px solid var(--color-ur-border);border-radius:16px;padding:1.25rem;box-shadow:var(--shadow-card); }
.kating-box-header { display:flex;align-items:center;gap:0.75rem;margin-bottom:1rem; }
.kating-box-header img { width:48px;height:48px;border-radius:50%;object-fit:cover;border:2px solid var(--color-ur-border); }
.kb-name { font-size:0.9rem;font-weight:700;color:var(--color-ur-white); }
.kb-loc  { font-size:0.75rem;color:var(--color-ur-blue); }
.btn-action { display:block;text-align:center;padding:0.625rem;border-radius:10px;font-size:0.82rem;font-weight:700;cursor:pointer;transition:all 0.18s;text-decoration:none;border:none;width:100%; }
.btn-action-primary { background:linear-gradient(135deg,var(--color-ur-mint-dark),var(--color-ur-mint));color:#ffffff; }
.btn-action-primary:hover { opacity:0.95; }
.btn-action-outline { background:transparent;border:1.5px solid var(--color-ur-border);color:var(--color-ur-gray);margin-top:0.5rem; }
.btn-action-outline:hover { border-color:var(--color-ur-purple);color:var(--color-ur-purple); }

.score-ring { width:90px;height:90px;position:relative;margin:0 auto 1rem; }
.score-ring svg { transform:rotate(-90deg); }
.score-ring .score-text { position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center; }
.score-num { font-family:'Space Grotesk',sans-serif;font-size:1.5rem;font-weight:700;color:var(--color-ur-mint); }
.score-label { font-size:0.65rem;color:var(--color-ur-gray-2); }

@media (max-width:768px) { .detail-layout { grid-template-columns:1fr; } .photo-grid { grid-template-columns:repeat(2,1fr); } }
</style>

<!-- Breadcrumb -->
<nav style="font-size:0.8rem;color:var(--color-ur-gray-2);margin-bottom:1.5rem;" id="breadcrumb-detail">
    <a href="/permintaan-saya" style="color:var(--color-ur-gray);text-decoration:none;">Permintaan Saya</a>
    <span style="margin:0 0.5rem;">›</span>
    <span style="color:var(--color-ur-white);">Detail — {{ $l['jenis'] }}</span>
</nav>

<div class="detail-layout" id="detail-layout">

    <!-- ─── Main Content ─── -->
    <div>
        <div class="detail-card" id="detail-main-card">
            <div class="detail-header">
                <span class="dh-icon">{{ $l['icon'] }}</span>
                <div>
                    <h1>{{ $l['jenis'] }}</h1>
                    <p>Dikerjakan oleh {{ $l['kating'] }} · {{ $l['kota'] }}</p>
                </div>
                <div style="margin-left:auto;">
                    @include('components.status-badge', ['status' => $l['status']])
                </div>
            </div>
            <div class="detail-body">

                @if($l['jenis'] === 'Apartment Check' && $l['status'] === 'selesai')
                <!-- ─── APARTMENT CHECK RESULT ─── -->
                <div class="score-ring" id="apt-score-ring">
                    <svg width="90" height="90" viewBox="0 0 90 90">
                        <circle cx="45" cy="45" r="38" fill="none" stroke="var(--color-ur-border)" stroke-width="8"/>
                        <circle cx="45" cy="45" r="38" fill="none" stroke="var(--color-ur-mint)" stroke-width="8"
                            stroke-dasharray="{{ 2*pi()*38 }}" stroke-dashoffset="{{ 2*pi()*38*0.15 }}" stroke-linecap="round"/>
                    </svg>
                    <div class="score-text">
                        <span class="score-num">85</span>
                        <span class="score-label">Skor</span>
                    </div>
                </div>
                <p style="text-align:center;color:var(--color-ur-gray);font-size:0.8rem;margin-bottom:1.5rem;">
                    <strong style="color:var(--color-ur-mint);">Direkomendasikan</strong> — 28 dari 30 poin memenuhi standar
                </p>

                <h3 style="font-size:0.9rem;font-weight:700;color:var(--color-ur-white);margin-bottom:0.875rem;">Checklist Verifikasi</h3>
                @php
                $checklist = [
                    ['label'=>'Kebersihan umum','status'=>'pass','note'=>'Bersih dan terawat'],
                    ['label'=>'Kesesuaian foto dengan kondisi nyata','status'=>'pass','note'=>'Sesuai iklan'],
                    ['label'=>'Kondisi kamar mandi','status'=>'pass','note'=>'Berfungsi normal'],
                    ['label'=>'Jarak ke kampus','status'=>'pass','note'=>'±800m, bisa jalan kaki'],
                    ['label'=>'Keamanan lingkungan','status'=>'pass','note'=>'Aman, ada CCTV'],
                    ['label'=>'Kewajaran harga sewa','status'=>'pass','note'=>'Sesuai rata-rata kawasan'],
                    ['label'=>'Ventilasi dan pencahayaan','status'=>'pass','note'=>'Cukup baik'],
                    ['label'=>'Kondisi furnitur','status'=>'warn','note'=>'Kasur sedikit aus'],
                    ['label'=>'Akses internet','status'=>'pass','note'=>'Wi-Fi tersedia'],
                    ['label'=>'Ketersediaan parkir','status'=>'warn','note'=>'Terbatas, harus bayar ekstra'],
                ];
                @endphp
                @foreach($checklist as $ci => $c)
                <div class="checklist-item" id="check-{{ $ci }}">
                    <span class="check-icon {{ $c['status'] }}">
                        {{ $c['status'] === 'pass' ? '✓' : ($c['status'] === 'warn' ? '!' : '✕') }}
                    </span>
                    <span class="check-label">{{ $c['label'] }}</span>
                    <span class="check-note">{{ $c['note'] }}</span>
                </div>
                @endforeach

                <h3 style="font-size:0.9rem;font-weight:700;color:var(--color-ur-white);margin:1.5rem 0 0.875rem;">Galeri Foto Asli</h3>
                <div class="photo-grid" id="apt-photo-grid">
                    @for($i = 1; $i <= 6; $i++)
                    <div class="photo-item" id="photo-{{ $i }}">
                        <img src="https://picsum.photos/200/200?random={{ $i+10 }}" alt="Foto {{ $i }}" loading="lazy">
                    </div>
                    @endfor
                </div>

                <div style="background:var(--color-ur-mint-light);border:1px solid rgba(13,148,136,0.2);border-radius:12px;padding:1rem;margin-top:1.25rem;" id="apt-narasi">
                    <h4 style="font-size:0.875rem;font-weight:700;color:var(--color-ur-mint);margin:0 0 0.5rem;">Narasi Kating</h4>
                    <p style="font-size:0.85rem;color:var(--color-ur-gray);line-height:1.65;margin:0;">
                        Secara keseluruhan, apartemen ini dalam kondisi yang baik dan sesuai dengan foto yang diiklankan. Lokasi sangat strategis — 800 meter dari kampus bisa ditempuh jalan kaki. Catatan kecil: kasur di kamar utama sudah cukup lama dipakai, tapi masih layak. Parkir tidak termasuk sewa bulanan. Saya rekomendasikan properti ini.
                    </p>
                </div>

                @elseif($l['jenis'] === 'Airport Pickup')
                <!-- ─── AIRPORT PICKUP RESULT ─── -->
                <div style="text-align:center;padding:2rem 0;color:var(--color-ur-gray);" id="pickup-status-box">
                    <div style="font-size:3rem;margin-bottom:1rem;">✈️</div>
                    <h3 style="color:var(--color-ur-white);margin:0 0 0.5rem;">{{ $l['status'] === 'berjalan' ? 'Dijadwalkan' : 'Penjemputan Selesai' }}</h3>
                    <p style="margin:0 0 1.5rem;font-size:0.875rem;">{{ $l['tanggal_eksekusi'] }} · Narita Airport (NRT)</p>
                    @include('components.status-badge', ['status' => $l['status']])
                </div>
                <div class="info-row"><span class="info-label">Kating</span><span class="info-value">{{ $l['kating'] }}</span></div>
                <div class="info-row"><span class="info-label">Nomor Penerbangan</span><span class="info-value">JL720</span></div>
                <div class="info-row"><span class="info-label">Bandara</span><span class="info-value">Narita International (NRT)</span></div>
                <div class="info-row"><span class="info-label">Jam Landing</span><span class="info-value">14:30 JST</span></div>
                <div class="info-row"><span class="info-label">Tujuan</span><span class="info-value">Waseda University Dormitory</span></div>
                <div class="info-row"><span class="info-label">Penumpang</span><span class="info-value">1 orang, 2 koper</span></div>

                @else
                <!-- ─── MOVE-IN HELP / MENUNGGU ─── -->
                <div style="text-align:center;padding:2rem;color:var(--color-ur-gray);" id="awaiting-box">
                    <div style="font-size:3rem;margin-bottom:1rem;">⏳</div>
                    <h3 style="color:var(--color-ur-white);margin:0 0 0.5rem;">Menunggu Konfirmasi Kating</h3>
                    <p style="margin:0;font-size:0.875rem;">Kating memiliki 24 jam untuk mengkonfirmasi permintaanmu</p>
                </div>
                @endif

            </div>
        </div>
    </div>

    <!-- ─── Sidebar ─── -->
    <div class="sidebar-section" id="detail-sidebar">
        <div class="kating-box" id="kating-info-box">
            <h3 style="font-size:0.875rem;font-weight:700;color:var(--color-ur-white);margin:0 0 0.875rem;">Kating</h3>
            <div class="kating-box-header">
                <img src="{{ $l['avatar'] }}" alt="{{ $l['kating'] }}">
                <div>
                    <div class="kb-name">{{ $l['kating'] }}</div>
                    <div class="kb-loc">📍 {{ $l['kota'] }}</div>
                </div>
            </div>
            <a href="/chat/1" class="btn-action btn-action-primary" id="btn-chat-dari-detail">💬 Chat Kating</a>
            <a href="/profil-kating/1" class="btn-action btn-action-outline" id="btn-profil-dari-detail">Lihat Profil</a>
        </div>

        <div class="section-card" id="timeline-card">
            <h3>📅 Timeline</h3>
            @php
            $timeline = [
                ['label'=>'Permintaan Dibuat','time'=>'10 Jun · 09:00','done'=>true],
                ['label'=>'Dikonfirmasi Kating','time'=>'10 Jun · 11:30','done'=>true],
                ['label'=>'Sedang Diproses','time'=>'12 Jun · 08:00','done'=>$l['status']!=='menunggu'],
                ['label'=>'Laporan Dikirim','time'=>'12 Jun · 18:00','done'=>$l['status']==='selesai'],
            ];
            @endphp
            @foreach($timeline as $ti => $t)
            <div style="display:flex;gap:0.75rem;align-items:flex-start;{{ $ti < count($timeline)-1 ? 'margin-bottom:0.875rem;' : '' }}" id="timeline-{{ $ti }}">
                <div style="display:flex;flex-direction:column;align-items:center;gap:0;flex-shrink:0;">
                    <div style="width:20px;height:20px;border-radius:50%;background:{{ $t['done'] ? 'var(--color-ur-mint)' : 'var(--color-ur-border)' }};border:2px solid {{ $t['done'] ? 'var(--color-ur-mint)' : 'var(--color-ur-gray-2)' }};display:flex;align-items:center;justify-content:center;font-size:0.6rem;color:{{ $t['done'] ? '#ffffff' : 'var(--color-ur-gray-2)' }};">
                        {{ $t['done'] ? '✓' : '○' }}
                    </div>
                    @if($ti < count($timeline)-1)
                    <div style="width:2px;height:24px;background:{{ $t['done'] ? 'var(--color-ur-border)' : 'var(--color-ur-navy-2)' }};margin:2px 0;"></div>
                    @endif
                </div>
                <div>
                    <div style="font-size:0.825rem;font-weight:600;color:{{ $t['done'] ? 'var(--color-ur-white)' : 'var(--color-ur-gray-2)' }};">{{ $t['label'] }}</div>
                    <div style="font-size:0.72rem;color:var(--color-ur-gray-2);">{{ $t['time'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

@endsection
