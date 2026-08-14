@extends('layouts.app')
@section('title', 'Ajukan Layanan — UniRoute')
@section('content')

@php
$katingId = request()->segment(2, 1);
$layananParam = request()->query('layanan', 'apartment-check');
$katingNames = [1 => 'Ayu Pradnya Dewi', 2 => 'Budi Santoso', 3 => 'Ni Made Sari'];
$katingName = $katingNames[$katingId] ?? 'Kating';
@endphp

<style>
.form-layout { display: grid; grid-template-columns: 1fr 340px; gap: 1.5rem; align-items: start; }

/* ─── Form Card ─── */
.form-card {
    background: var(--color-ur-card); border: 1.5px solid var(--color-ur-border); border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-card);
}
.form-card-header {
    background: linear-gradient(135deg, var(--color-ur-navy-2), var(--color-ur-navy-3));
    padding: 1.5rem; border-bottom: 1px solid var(--color-ur-border);
}
.form-card-header h1 { font-size: 1.4rem; color: var(--color-ur-white); margin: 0 0 0.375rem; }
.form-card-header p  { color: var(--color-ur-gray); font-size: 0.875rem; margin: 0; }
.form-card-body { padding: 1.75rem; }

/* ─── Service Selector ─── */
.svc-selector { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.625rem; margin-bottom: 1.75rem; }
.svc-tab {
    border: 1.5px solid var(--color-ur-border); border-radius: 12px; padding: 0.875rem 0.625rem;
    text-align: center; cursor: pointer; transition: all 0.2s; background: transparent;
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: var(--color-ur-gray);
}
.svc-tab .svc-tab-icon { font-size: 1.4rem; display: block; margin-bottom: 0.375rem; }
.svc-tab .svc-tab-name { font-size: 0.75rem; font-weight: 600; color: var(--color-ur-gray-2); display: block; }
.svc-tab.active-apt   { border-color: var(--color-ur-blue); background: var(--color-ur-blue-light); }
.svc-tab.active-apt .svc-tab-name { color: var(--color-ur-blue); }
.svc-tab.active-move  { border-color: var(--color-ur-mint); background: var(--color-ur-mint-light); }
.svc-tab.active-move .svc-tab-name { color: var(--color-ur-mint); }
.svc-tab.active-air   { border-color: var(--color-ur-gold); background: #fef3c7; }
.svc-tab.active-air .svc-tab-name { color: var(--color-ur-gold); }
.svc-tab:hover { border-color: var(--color-ur-purple); }

/* ─── Form Fields ─── */
.form-group { margin-bottom: 1.125rem; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 0.875rem; margin-bottom: 1.125rem; }
.form-section-title { font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-ur-gray-2); margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 1px solid var(--color-ur-border); }
.hint-text { font-size: 0.75rem; color: var(--color-ur-gray-2); margin-top: 0.25rem; }

/* ─── Submit Button ─── */
.btn-submit-form {
    width: 100%; padding: 0.9rem; border-radius: 12px;
    font-size: 1rem; font-weight: 700;
    background: linear-gradient(135deg, var(--color-ur-mint-dark), var(--color-ur-mint)); color: #ffffff;
    border: none; cursor: pointer; transition: all 0.2s;
    box-shadow: 0 4px 14px rgba(13,148,136,0.18);
    margin-top: 0.5rem;
}
.btn-submit-form:hover { opacity: 0.95; transform: translateY(-1px); }

/* ─── Sidebar Summary ─── */
.form-summary {
    background: var(--color-ur-card); border: 1.5px solid var(--color-ur-border); border-radius: 20px;
    padding: 1.5rem; position: sticky; top: 80px;
    display: flex; flex-direction: column; gap: 1rem;
    box-shadow: var(--shadow-card);
}
.summary-title { font-size: 0.9rem; font-weight: 700; color: var(--color-ur-white); margin: 0; }
.summary-kating { display: flex; align-items: center; gap: 0.75rem; padding: 0.875rem; background: var(--color-ur-navy-2); border-radius: 12px; }
.summary-kating img { width: 48px; height: 48px; border-radius: 50%; border: 2px solid var(--color-ur-border); object-fit: cover; }
.summary-kating .sk-name { font-size: 0.875rem; font-weight: 600; color: var(--color-ur-white); }
.summary-kating .sk-loc  { font-size: 0.75rem; color: var(--color-ur-blue); }

.summary-svc {
    padding: 1rem; border-radius: 12px; border: 1.5px solid var(--color-ur-border);
    font-size: 0.875rem;
}
.summary-svc .svc-name { font-weight: 700; color: var(--color-ur-white); margin-bottom: 0.25rem; font-size: 0.95rem; }
.summary-svc .svc-desc { color: var(--color-ur-gray-2); font-size: 0.8rem; line-height: 1.5; }

.info-box {
    background: var(--color-ur-blue-light); border: 1px solid rgba(37,99,235,0.2);
    border-radius: 10px; padding: 0.875rem; font-size: 0.8rem; color: var(--color-ur-blue); line-height: 1.5;
}

/* ─── Responsive ─── */
@media (max-width: 768px) {
    .form-layout { grid-template-columns: 1fr; }
    .form-summary { position: static; order: -1; }
    .form-row { grid-template-columns: 1fr; }
    .svc-selector { grid-template-columns: repeat(3, 1fr); gap: 0.375rem; }
}

/* ─── Success Toast ─── */
.toast {
    position: fixed; bottom: 2rem; left: 50%; transform: translateX(-50%) translateY(100px);
    background: var(--color-ur-card); border: 1.5px solid var(--color-ur-border); border-radius: 12px;
    padding: 1rem 1.5rem; font-size: 0.9rem; color: var(--color-ur-white);
    box-shadow: var(--shadow-card), 0 8px 32px rgba(0,0,0,0.15); display: flex; align-items: center; gap: 0.625rem;
    transition: transform 0.4s cubic-bezier(0.34,1.56,0.64,1);
    z-index: 200;
}
.toast.show { transform: translateX(-50%) translateY(0); }
.toast-icon { font-size: 1.25rem; }
</style>

<!-- Breadcrumb -->
<nav style="font-size:0.8rem;color:var(--color-ur-gray-2);margin-bottom:1.5rem;" id="breadcrumb-ajukan">
    <a href="/browse-kating" style="color:var(--color-ur-gray);text-decoration:none;">Browse Kating</a>
    <span style="margin:0 0.5rem;">›</span>
    <a href="/profil-kating/{{ $katingId }}" style="color:var(--color-ur-gray);text-decoration:none;">{{ $katingName }}</a>
    <span style="margin:0 0.5rem;">›</span>
    <span style="color:var(--color-ur-white);">Ajukan Layanan</span>
</nav>

<div class="form-layout" id="form-layout">

    <!-- ─── Main Form ─── -->
    <div class="form-card" id="main-form-card">
        <div class="form-card-header">
            <h1>Ajukan Layanan</h1>
            <p>ke <strong style="color:var(--color-ur-mint);">{{ $katingName }}</strong></p>
        </div>
        <div class="form-card-body">

            <!-- Service Selector -->
            <div class="svc-selector" id="svc-selector">
                <button class="svc-tab" id="tab-apt" onclick="setLayanan('apt')">
                    <span class="svc-tab-icon">🏠</span>
                    <span class="svc-tab-name">Apartment Check</span>
                </button>
                <button class="svc-tab" id="tab-move" onclick="setLayanan('move')">
                    <span class="svc-tab-icon">📦</span>
                    <span class="svc-tab-name">Move-in Help</span>
                </button>
                <button class="svc-tab" id="tab-air" onclick="setLayanan('air')">
                    <span class="svc-tab-icon">✈️</span>
                    <span class="svc-tab-name">Airport Pickup</span>
                </button>
            </div>

            <form id="layanan-form" onsubmit="submitForm(event)">
                <p class="form-section-title" id="form-section-label">Detail Permintaan</p>

                <!-- ─── APARTMENT CHECK FIELDS ─── -->
                <div id="fields-apt">
                    <div class="form-group">
                        <label for="apt-link">Link Listing / Alamat Apartemen <span style="color:var(--color-ur-mint);">*</span></label>
                        <input type="url" id="apt-link" placeholder="https://airbnb.com/rooms/... atau alamat lengkap">
                    </div>
                    <div class="form-group">
                        <label for="apt-kota">Kota Tujuan <span style="color:var(--color-ur-mint);">*</span></label>
                        <input type="text" id="apt-kota" placeholder="Contoh: Melbourne, VIC 3000">
                    </div>
                    <div class="form-group">
                        <label for="apt-deadline">Deadline Kebutuhan <span style="color:var(--color-ur-mint);">*</span></label>
                        <input type="date" id="apt-deadline">
                        <p class="hint-text">Kating butuh minimal 2 hari untuk jadwal inspeksi</p>
                    </div>
                    <div class="form-group">
                        <label for="apt-foto">URL Foto dari Pemilik (opsional)</label>
                        <input type="text" id="apt-foto" placeholder="Google Drive / Dropbox link…">
                    </div>
                    <div class="form-group">
                        <label for="apt-catatan">Fokus Inspeksi / Catatan Khusus</label>
                        <textarea id="apt-catatan" rows="3" placeholder="Contoh: cek apakah ada bocor di kamar mandi, cek jarak ke halte MRT…"></textarea>
                    </div>
                </div>

                <!-- ─── MOVE-IN HELP FIELDS ─── -->
                <div id="fields-move" style="display:none;">
                    <div class="form-row">
                        <div class="form-group" style="margin:0;">
                            <label for="move-tanggal">Tanggal Kedatangan <span style="color:var(--color-ur-mint);">*</span></label>
                            <input type="date" id="move-tanggal">
                        </div>
                        <div class="form-group" style="margin:0;">
                            <label for="move-jam">Perkiraan Jam Tiba</label>
                            <input type="time" id="move-jam">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="move-alamat">Alamat Tujuan <span style="color:var(--color-ur-mint);">*</span></label>
                        <input type="text" id="move-alamat" placeholder="Alamat lengkap tempat tinggal baru">
                    </div>
                    <div class="form-group">
                        <label for="move-barang">Deskripsi Barang Bawaan <span style="color:var(--color-ur-mint);">*</span></label>
                        <textarea id="move-barang" rows="3" placeholder="Contoh: 2 koper besar, 1 ransel, 1 tas travel. Berat total ±40kg…"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="move-kebutuhan">Kebutuhan Spesifik Tambahan</label>
                        <textarea id="move-kebutuhan" rows="2" placeholder="Contoh: minta diantarkan ke supermarket setelah pindah, orientasi rute kampus…"></textarea>
                    </div>
                </div>

                <!-- ─── AIRPORT PICKUP FIELDS ─── -->
                <div id="fields-air" style="display:none;">
                    <div class="form-row">
                        <div class="form-group" style="margin:0;">
                            <label for="air-tanggal">Tanggal Tiba <span style="color:var(--color-ur-mint);">*</span></label>
                            <input type="date" id="air-tanggal">
                        </div>
                        <div class="form-group" style="margin:0;">
                            <label for="air-jam">Jam Landing <span style="color:var(--color-ur-mint);">*</span></label>
                            <input type="time" id="air-jam">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="air-flight">Nomor Penerbangan <span style="color:var(--color-ur-mint);">*</span></label>
                        <input type="text" id="air-flight" placeholder="Contoh: QF39, JL720…" style="text-transform:uppercase;">
                    </div>
                    <div class="form-group">
                        <label for="air-bandara">Bandara <span style="color:var(--color-ur-mint);">*</span></label>
                        <input type="text" id="air-bandara" placeholder="Contoh: Melbourne Airport (MEL), Narita (NRT)…">
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="margin:0;">
                            <label for="air-penumpang">Jumlah Penumpang</label>
                            <select id="air-penumpang">
                                <option value="1">1 orang</option>
                                <option value="2">2 orang</option>
                                <option value="3">3 orang</option>
                                <option value="4">4+ orang</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin:0;">
                            <label for="air-koper">Jumlah Koper Besar</label>
                            <select id="air-koper">
                                <option value="1">1 koper</option>
                                <option value="2">2 koper</option>
                                <option value="3">3 koper</option>
                                <option value="4">4+ koper</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="air-tujuan">Lokasi Tujuan Setelah Bandara <span style="color:var(--color-ur-mint);">*</span></label>
                        <input type="text" id="air-tujuan" placeholder="Nama/alamat asrama, apartemen, atau hotel…">
                    </div>
                    <div class="form-group">
                        <label for="air-catatan">Catatan Tambahan</label>
                        <textarea id="air-catatan" rows="2" placeholder="Contoh: ada barang rapuh, butuh kursi roda, dll…"></textarea>
                    </div>
                </div>

                <!-- Common: Nama & Kontak -->
                <p class="form-section-title" style="margin-top:1.5rem;">Informasi Kontak</p>
                <div class="form-row">
                    <div class="form-group" style="margin:0;">
                        <label for="f-nama">Nama Lengkap <span style="color:var(--color-ur-mint);">*</span></label>
                        <input type="text" id="f-nama" placeholder="Nama kamu">
                    </div>
                    <div class="form-group" style="margin:0;">
                        <label for="f-wa">No. WhatsApp <span style="color:var(--color-ur-mint);">*</span></label>
                        <input type="tel" id="f-wa" placeholder="+62 8xx…">
                    </div>
                </div>

                <button type="submit" class="btn-submit-form" id="btn-submit-form">
                    📋 Kirim Permintaan →
                </button>
            </form>
        </div>
    </div>

    <!-- ─── Sidebar Summary ─── -->
    <aside class="form-summary" id="form-summary">
        <h3 class="summary-title">Ringkasan Permintaan</h3>

        <div class="summary-kating" id="summary-kating">
            <img src="https://i.pravatar.cc/96?u={{ $katingId }}" alt="{{ $katingName }}">
            <div>
                <div class="sk-name">{{ $katingName }}</div>
                <div class="sk-loc">📍 Kating UniRoute</div>
            </div>
        </div>

        <div class="summary-svc" id="summary-svc-box">
            <div class="svc-name" id="summary-svc-name">Apartment Check</div>
            <div class="svc-desc" id="summary-svc-desc">Inspeksi langsung ke lokasi dengan 30+ poin checklist. Laporan foto dikirim dalam 24 jam.</div>
        </div>

        <div class="info-box" id="summary-info-box">
            ℹ️ Permintaanmu akan dikirim ke kating. Kating memiliki 24 jam untuk mengkonfirmasi. Kamu akan mendapat notifikasi setelah dikonfirmasi.
        </div>

        <div style="font-size:0.78rem;color:var(--color-ur-gray-2);line-height:1.6;" id="summary-tips">
            <strong style="color:var(--color-ur-gray);">💡 Tips:</strong><br>
            Isi semua detail sejelas mungkin agar kating bisa langsung eksekusi tanpa perlu banyak tanya-tanya.
        </div>
    </aside>

</div><!-- end form-layout -->

<!-- Toast -->
<div class="toast" id="submit-toast">
    <span class="toast-icon">🎉</span>
    <div>
        <strong>Permintaan Terkirim!</strong><br>
        <span style="font-size:0.8rem;color:var(--color-ur-gray);">Kating akan konfirmasi dalam 24 jam.</span>
    </div>
</div>

<script>
const svcInfo = {
    apt:  { name: 'Apartment Check', desc: 'Inspeksi langsung ke lokasi dengan 30+ poin checklist. Laporan foto dikirim dalam 24 jam.' },
    move: { name: 'Move-in Help',    desc: 'Bantuan penuh di hari pindahan: angkat barang, orientasi lingkungan, dan setup awal.' },
    air:  { name: 'Airport Pickup',  desc: 'Penjemputan dari bandara dan antar ke lokasi tujuan, tersedia 24/7.' },
};
const activeMap = { apt: 'active-apt', move: 'active-move', air: 'active-air' };

function setLayanan(type) {
    // Toggle tabs
    ['apt','move','air'].forEach(t => {
        document.getElementById('tab-'+t).className = 'svc-tab';
    });
    document.getElementById('tab-'+type).className = 'svc-tab ' + activeMap[type];

    // Toggle fields
    ['apt','move','air'].forEach(t => {
        document.getElementById('fields-'+t).style.display = t === type ? '' : 'none';
    });

    // Update summary
    document.getElementById('summary-svc-name').textContent = svcInfo[type].name;
    document.getElementById('summary-svc-desc').textContent = svcInfo[type].desc;
}

function submitForm(e) {
    e.preventDefault();
    const btn = document.getElementById('btn-submit-form');
    btn.textContent = '⏳ Mengirim…';
    btn.disabled = true;
    setTimeout(() => {
        const toast = document.getElementById('submit-toast');
        toast.classList.add('show');
        btn.textContent = '✓ Permintaan Terkirim';
        btn.style.background = 'var(--color-ur-mint-dark)';
        setTimeout(() => {
            window.location.href = '/permintaan-saya';
        }, 2000);
    }, 1200);
}

// Init from URL param
const urlParams = new URLSearchParams(window.location.search);
const layananUrl = urlParams.get('layanan') || 'apartment-check';
const map = {'apartment-check':'apt','move-in-help':'move','airport-pickup':'air'};
setLayanan(map[layananUrl] || 'apt');
</script>

@endsection
