@extends('layouts.app')
@section('title', 'Profil Kating — UniRoute')
@section('content')

@php
// Dummy Kating Detail Data
$katingId = request()->segment(2, 1);
$katingProfiles = [
    1 => ['id'=>1,'nama'=>'Ayu Pradnya Dewi','kampus'=>'University of Melbourne','jurusan'=>'Master of Engineering','kota'=>'Melbourne','negara'=>'Australia','rating'=>4.9,'ulasan'=>31,'job_selesai'=>47,'respons_time'=>'< 1 jam','layanan'=>['Apartment Check','Airport Pickup'],'status'=>'aktif','avatar'=>'https://i.pravatar.cc/200?u=1','bio'=>'Halo! Saya Ayu, mahasiswi S2 Teknik di University of Melbourne. Sudah tinggal di Melbourne sejak 2022 dan sudah sangat familiar dengan kawasan Carlton, Fitzroy, dan CBD. Saya menawarkan layanan Apartment Check dengan inspeksi mendalam 30+ poin, dan Airport Pickup dari Tullamarine. Bahasa: Indonesia & Inggris.','bergabung'=>'Maret 2023','badge'=>['Top Rated','Fast Responder']],
    2 => ['id'=>2,'nama'=>'Budi Santoso','kampus'=>'Waseda University','jurusan'=>'Master of International Studies','kota'=>'Tokyo','negara'=>'Jepang','rating'=>4.8,'ulasan'=>24,'job_selesai'=>38,'respons_time'=>'< 2 jam','layanan'=>['Airport Pickup','Move-in Help'],'status'=>'aktif','avatar'=>'https://i.pravatar.cc/200?u=2','bio'=>'Saya Budi, tinggal di Tokyo sejak 2021 dan sudah hafal sistem transportasi, tata cara hidup, dan area populer di sini. Sangat senang membantu teman-teman baru yang baru tiba. Airport Pickup dari Narita & Haneda, plus bantuan hari pindahan ke mana pun di Tokyo.','bergabung'=>'Januari 2022','badge'=>['Verified','Top Rated']],
];
$kating = $katingProfiles[$katingId] ?? $katingProfiles[1];

$ulasanDummy = [
    ['nama'=>'Wayan A.', 'avatar'=>'https://i.pravatar.cc/48?u=20','bintang'=>5,'teks'=>'Sangat profesional dan detail dalam melakukan inspeksi. Foto-fotonya lengkap dan membantu banget!','layanan'=>'Apartment Check','tanggal'=>'12 Jun 2026'],
    ['nama'=>'Kadek B.', 'avatar'=>'https://i.pravatar.cc/48?u=21','bintang'=>5,'teks'=>'Penjemputan tepat waktu dan sangat ramah. Bawain oleh-oleh snack Indonesia lagi, hehe!','layanan'=>'Airport Pickup','tanggal'=>'5 Jun 2026'],
    ['nama'=>'Ni Luh C.','avatar'=>'https://i.pravatar.cc/48?u=22','bintang'=>5,'teks'=>'Responsif banget waktu dihubungi. Laporan checklist sangat jelas. Highly recommend!','layanan'=>'Apartment Check','tanggal'=>'28 Mei 2026'],
];
@endphp

<style>
.profil-layout { display: grid; grid-template-columns: 320px 1fr; gap: 1.5rem; align-items: start; }
/* ─── Sidebar Profil ─── */
.profil-sidebar {
    background: var(--color-ur-card); border: 1.5px solid var(--color-ur-border); border-radius: 20px;
    overflow: hidden; position: sticky; top: 80px;
    box-shadow: var(--shadow-card);
}
.profil-header-img {
    height: 120px; background: linear-gradient(135deg, var(--color-ur-navy-2), var(--color-ur-navy-3));
    position: relative;
    display: flex; align-items: flex-end; padding: 0 1.25rem 0;
}
.profil-avatar-wrap {
    width: 90px; height: 90px; border-radius: 50%;
    border: 3px solid var(--color-ur-purple);
    overflow: hidden; transform: translateY(50%);
    flex-shrink: 0;
    box-shadow: 0 0 24px rgba(99,102,241,0.2);
}
.profil-avatar-wrap img { width: 100%; height: 100%; object-fit: cover; }
.profil-body { padding: 3.5rem 1.25rem 1.5rem; }
.profil-name { font-size: 1.25rem; font-weight: 700; color: var(--color-ur-white); margin: 0 0 0.25rem; }
.profil-kampus { font-size: 0.8rem; color: var(--color-ur-gray); margin: 0 0 0.125rem; }
.profil-loc { font-size: 0.8rem; color: var(--color-ur-blue); margin: 0 0 0.875rem; }
.profil-badges { display: flex; gap: 0.375rem; flex-wrap: wrap; margin-bottom: 0.875rem; }
.profil-badge {
    font-size: 0.65rem; font-weight: 700; letter-spacing: 0.05em;
    padding: 0.2rem 0.55rem; border-radius: 999px;
    background: var(--color-ur-mint-light); border: 1px solid rgba(13,148,136,0.3);
    color: var(--color-ur-mint);
}
.profil-stats { display: grid; grid-template-columns: 1fr 1fr; gap: 0.625rem; margin-bottom: 1rem; }
.p-stat { background: var(--color-ur-navy-2); border-radius: 10px; padding: 0.75rem; text-align: center; }
.p-stat-num { display: block; font-family: 'Space Grotesk',sans-serif; font-size: 1.25rem; font-weight: 700; color: var(--color-ur-mint); }
.p-stat-lbl { font-size: 0.7rem; color: var(--color-ur-gray-2); }
.profil-layanan-tags { display: flex; flex-wrap: wrap; gap: 0.375rem; margin-bottom: 1.25rem; }
.profil-actions { display: flex; flex-direction: column; gap: 0.625rem; }
.btn-primary-full {
    display: block; text-align: center; padding: 0.8rem 1rem; border-radius: 10px;
    font-weight: 700; font-size: 0.9rem; background: linear-gradient(135deg, var(--color-ur-mint-dark), var(--color-ur-mint)); color: #ffffff;
    border: none; cursor: pointer; transition: all 0.2s; text-decoration: none;
    box-shadow: 0 4px 14px rgba(13,148,136,0.18);
}
.btn-primary-full:hover { opacity: 0.95; transform: translateY(-1px); }
.btn-outline-full {
    display: block; text-align: center; padding: 0.8rem 1rem; border-radius: 10px;
    font-weight: 700; font-size: 0.9rem; background: transparent;
    border: 1.5px solid var(--color-ur-border); color: var(--color-ur-gray); cursor: pointer; transition: all 0.2s; text-decoration: none;
}
.btn-outline-full:hover { border-color: var(--color-ur-purple); color: var(--color-ur-purple); }

/* ─── Main Content ─── */
.profil-main { display: flex; flex-direction: column; gap: 1.25rem; }
.profil-section {
    background: var(--color-ur-card); border: 1.5px solid var(--color-ur-border); border-radius: 16px; padding: 1.5rem;
    box-shadow: var(--shadow-card);
}
.profil-section h2 { font-size: 1rem; font-weight: 700; color: var(--color-ur-white); margin: 0 0 1rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--color-ur-border); }
.bio-text { font-size: 0.9rem; color: var(--color-ur-gray); line-height: 1.75; }
.info-row { display: flex; justify-content: space-between; padding: 0.625rem 0; border-bottom: 1px solid var(--color-ur-border); font-size: 0.875rem; }
.info-row:last-child { border-bottom: none; }
.info-label { color: var(--color-ur-gray-2); }
.info-value { color: var(--color-ur-white); font-weight: 500; text-align: right; }

/* ─── Layanan Detail ─── */
.layanan-detail-list { display: flex; flex-direction: column; gap: 0.75rem; }
.layanan-detail-item {
    display: flex; align-items: flex-start; gap: 0.875rem;
    background: var(--color-ur-navy-2); border-radius: 12px; padding: 1rem;
    border: 1px solid var(--color-ur-border);
}
.ld-icon { font-size: 1.5rem; flex-shrink: 0; }
.ld-info h4 { font-size: 0.9rem; font-weight: 700; color: var(--color-ur-white); margin: 0 0 0.25rem; }
.ld-info p  { font-size: 0.8rem; color: var(--color-ur-gray-2); margin: 0; line-height: 1.4; }
.btn-ajukan {
    display: inline-block; margin-top: 0.625rem; padding: 0.375rem 0.875rem;
    border-radius: 8px; font-size: 0.78rem; font-weight: 700;
    background: transparent; border: 1.5px solid var(--color-ur-purple); color: var(--color-ur-purple);
    cursor: pointer; transition: all 0.18s; text-decoration: none;
}
.btn-ajukan:hover { background: var(--color-ur-purple); color: #ffffff; }

/* ─── Ulasan ─── */
.ulasan-list { display: flex; flex-direction: column; gap: 1rem; }
.ulasan-item {
    background: var(--color-ur-navy-2); border-radius: 12px; padding: 1rem;
    border: 1px solid var(--color-ur-border);
}
.ulasan-header { display: flex; align-items: center; gap: 0.625rem; margin-bottom: 0.625rem; }
.ulasan-avatar { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; }
.ulasan-name { font-size: 0.875rem; font-weight: 600; color: var(--color-ur-white); }
.ulasan-meta { font-size: 0.73rem; color: var(--color-ur-gray-2); }
.ulasan-stars { color: var(--color-ur-gold); font-size: 0.8rem; letter-spacing: -1px; }
.ulasan-text { font-size: 0.875rem; color: var(--color-ur-gray); line-height: 1.6; font-style: italic; }
.ulasan-svc-tag { font-size: 0.68rem; font-weight: 600; color: var(--color-ur-blue); margin-top: 0.375rem; }

/* ─── Rating Bar ─── */
.rating-overview { display: flex; align-items: center; gap: 2rem; margin-bottom: 1.25rem; }
.rating-big { text-align: center; }
.rating-big .num { font-family:'Space Grotesk',sans-serif; font-size: 3rem; font-weight:700; color:var(--color-ur-mint); line-height:1; }
.rating-big .stars { font-size: 1.1rem; color: var(--color-ur-gold); letter-spacing:-1px; display:block; margin:0.25rem 0; }
.rating-big .total { font-size:0.75rem; color:var(--color-ur-gray-2); }
.rating-bars { flex: 1; display: flex; flex-direction: column; gap: 0.375rem; }
.rbar-row { display: flex; align-items: center; gap: 0.625rem; font-size: 0.78rem; }
.rbar-label { color: var(--color-ur-gray-2); min-width: 16px; }
.rbar-bg { flex: 1; height: 6px; background: var(--color-ur-border); border-radius: 3px; overflow: hidden; }
.rbar-fill { height: 100%; background: linear-gradient(90deg, var(--color-ur-mint-dark), var(--color-ur-mint)); border-radius: 3px; }
.rbar-pct { color: var(--color-ur-gray-2); min-width: 28px; text-align: right; }

/* Responsive */
@media (max-width:768px) {
    .profil-layout { grid-template-columns: 1fr; }
    .profil-sidebar { position: static; }
}
</style>

<!-- Breadcrumb -->
<nav style="font-size:0.8rem;color:var(--color-ur-gray-2);margin-bottom:1.5rem;" id="breadcrumb">
    <a href="/browse-kating" style="color:var(--color-ur-gray);text-decoration:none;">Browse Kating</a>
    <span style="margin:0 0.5rem;">›</span>
    <span style="color:var(--color-ur-white);">{{ $kating['nama'] }}</span>
</nav>

<div class="profil-layout" id="profil-layout">

    <!-- ─── Sidebar ─── -->
    <aside class="profil-sidebar" id="profil-sidebar">
        <div class="profil-header-img">
            <div class="profil-avatar-wrap">
                <img src="{{ $kating['avatar'] }}" alt="{{ $kating['nama'] }}">
            </div>
        </div>
        <div class="profil-body">
            <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.25rem;">
                <h1 class="profil-name" style="font-size:1.1rem;">{{ $kating['nama'] }}</h1>
                @include('components.status-badge', ['status' => $kating['status'], 'size' => 'sm'])
            </div>
            <p class="profil-kampus">{{ $kating['kampus'] }}</p>
            <p class="profil-kampus" style="font-size:0.75rem;color:var(--color-ur-gray-2);">{{ $kating['jurusan'] }}</p>
            <p class="profil-loc">📍 {{ $kating['kota'] }}, {{ $kating['negara'] }}</p>

            <div class="profil-badges" id="profil-badges">
                @foreach($kating['badge'] as $b)
                <span class="profil-badge">✓ {{ $b }}</span>
                @endforeach
            </div>

            <div class="profil-stats" id="profil-stats">
                <div class="p-stat">
                    <span class="p-stat-num">{{ number_format($kating['rating'],1) }}★</span>
                    <span class="p-stat-lbl">Rating</span>
                </div>
                <div class="p-stat">
                    <span class="p-stat-num">{{ $kating['job_selesai'] }}</span>
                    <span class="p-stat-lbl">Job Selesai</span>
                </div>
                <div class="p-stat">
                    <span class="p-stat-num">{{ $kating['ulasan'] }}</span>
                    <span class="p-stat-lbl">Ulasan</span>
                </div>
                <div class="p-stat">
                    <span class="p-stat-num">{{ $kating['respons_time'] }}</span>
                    <span class="p-stat-lbl">Respons</span>
                </div>
            </div>

            <div class="profil-layanan-tags" id="profil-layanan-tags">
                @foreach($kating['layanan'] as $l)
                <span class="svc-badge svc-badge--{{ strtolower(str_replace(' ','-',$l)) }}">{{ $l }}</span>
                @endforeach
            </div>

            <div class="profil-actions" id="profil-actions">
                <a href="/ajukan-layanan/{{ $kating['id'] }}" class="btn-primary-full" id="btn-ajukan-layanan-sidebar">
                    📋 Ajukan Layanan
                </a>
                <a href="/chat/{{ $kating['id'] }}" class="btn-outline-full" id="btn-chat-sidebar">
                    💬 Chat Dulu
                </a>
            </div>

            <p style="font-size:0.72rem;color:var(--color-ur-gray-2);margin-top:0.875rem;text-align:center;">
                Bergabung sejak {{ $kating['bergabung'] }}
            </p>
        </div>
    </aside>

    <!-- ─── Main Content ─── -->
    <div class="profil-main" id="profil-main">

        <!-- Bio -->
        <div class="profil-section" id="section-bio">
            <h2>Tentang Saya</h2>
            <p class="bio-text">{{ $kating['bio'] }}</p>
        </div>

        <!-- Info -->
        <div class="profil-section" id="section-info">
            <h2>Informasi</h2>
            <div class="info-row"><span class="info-label">Kampus</span><span class="info-value">{{ $kating['kampus'] }}</span></div>
            <div class="info-row"><span class="info-label">Jurusan</span><span class="info-value">{{ $kating['jurusan'] }}</span></div>
            <div class="info-row"><span class="info-label">Kota</span><span class="info-value">{{ $kating['kota'] }}, {{ $kating['negara'] }}</span></div>
            <div class="info-row"><span class="info-label">Waktu Respons</span><span class="info-value">{{ $kating['respons_time'] }}</span></div>
            <div class="info-row"><span class="info-label">Status</span><span class="info-value">{{ ucfirst($kating['status']) }}</span></div>
            <div class="info-row"><span class="info-label">Bergabung</span><span class="info-value">{{ $kating['bergabung'] }}</span></div>
        </div>

        <!-- Layanan -->
        <div class="profil-section" id="section-layanan">
            <h2>Layanan yang Ditawarkan</h2>
            <div class="layanan-detail-list">
                @if(in_array('Apartment Check', $kating['layanan']))
                <div class="layanan-detail-item" id="ld-apt">
                    <span class="ld-icon">🏠</span>
                    <div class="ld-info">
                        <h4>Apartment Check</h4>
                        <p>Inspeksi langsung ke lokasi dengan 30+ checklist: kebersihan, kesesuaian foto, jarak kampus, keamanan, dan kewajaran harga. Laporan foto + narasi dikirim dalam 24 jam.</p>
                        <a href="/ajukan-layanan/{{ $kating['id'] }}?layanan=apartment-check" class="btn-ajukan" id="btn-ajukan-apt">Ajukan Layanan ini →</a>
                    </div>
                </div>
                @endif
                @if(in_array('Move-in Help', $kating['layanan']))
                <div class="layanan-detail-item" id="ld-move">
                    <span class="ld-icon">📦</span>
                    <div class="ld-info">
                        <h4>Move-in Help</h4>
                        <p>Bantuan penuh di hari kepindahan: angkat barang, orientasi lingkungan, supermarket terdekat, dan pastikan kamu nyaman di tempat baru. Durasi ~3-5 jam.</p>
                        <a href="/ajukan-layanan/{{ $kating['id'] }}?layanan=move-in-help" class="btn-ajukan" id="btn-ajukan-move">Ajukan Layanan ini →</a>
                    </div>
                </div>
                @endif
                @if(in_array('Airport Pickup', $kating['layanan']))
                <div class="layanan-detail-item" id="ld-air">
                    <span class="ld-icon">✈️</span>
                    <div class="ld-info">
                        <h4>Airport Pickup</h4>
                        <p>Penjemputan dari bandara ke tempat tujuanmu. Termasuk bantuan angkat koper dan orientasi singkat sistem transportasi lokal. Tersedia 24/7 sesuai jadwal penerbangan.</p>
                        <a href="/ajukan-layanan/{{ $kating['id'] }}?layanan=airport-pickup" class="btn-ajukan" id="btn-ajukan-air">Ajukan Layanan ini →</a>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Ulasan -->
        <div class="profil-section" id="section-ulasan">
            <h2>Ulasan ({{ $kating['ulasan'] }})</h2>
            <div class="rating-overview" id="rating-overview">
                <div class="rating-big">
                    <span class="num">{{ number_format($kating['rating'],1) }}</span>
                    <span class="stars">★★★★★</span>
                    <span class="total">dari {{ $kating['ulasan'] }} ulasan</span>
                </div>
                <div class="rating-bars" id="rating-bars">
                    @foreach([5=>90, 4=>8, 3=>2, 2=>0, 1=>0] as $star => $pct)
                    <div class="rbar-row">
                        <span class="rbar-label">{{ $star }}</span>
                        <div class="rbar-bg"><div class="rbar-fill" style="width:{{ $pct }}%"></div></div>
                        <span class="rbar-pct">{{ $pct }}%</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="ulasan-list" id="ulasan-list">
                @foreach($ulasanDummy as $idx => $u)
                <div class="ulasan-item" id="ulasan-{{ $idx+1 }}">
                    <div class="ulasan-header">
                        <img src="{{ $u['avatar'] }}" alt="{{ $u['nama'] }}" class="ulasan-avatar">
                        <div style="flex:1;">
                            <div style="display:flex;justify-content:space-between;align-items:center;">
                                <span class="ulasan-name">{{ $u['nama'] }}</span>
                                <span class="ulasan-stars">{{ str_repeat('★', $u['bintang']) }}</span>
                            </div>
                            <div class="ulasan-meta">{{ $u['tanggal'] }}</div>
                        </div>
                    </div>
                    <p class="ulasan-text">{{ $u['teks'] }}</p>
                    <div class="ulasan-svc-tag">via {{ $u['layanan'] }}</div>
                </div>
                @endforeach
            </div>
        </div>

    </div><!-- end profil-main -->
</div><!-- end profil-layout -->

@endsection
