@extends('layouts.app')
@section('title', 'Admin Help — UniRoute')
@section('content')

<style>
.help-layout { display:grid;grid-template-columns:1fr 340px;gap:1.5rem;align-items:start; }
.help-card { background:var(--color-ur-card);border:1.5px solid var(--color-ur-border);border-radius:20px;overflow:hidden;box-shadow:var(--shadow-card); }
.help-card-header { background:linear-gradient(135deg,var(--color-ur-navy-2),var(--color-ur-navy-3));padding:1.5rem;border-bottom:1px solid var(--color-ur-border); }
.help-card-header h1 { font-size:1.4rem;color:var(--color-ur-white);margin:0 0 0.375rem; }
.help-card-header p  { color:var(--color-ur-gray);font-size:0.875rem;margin:0; }
.help-card-body { padding:1.75rem; }
.form-group { margin-bottom:1.125rem; }
.form-row-2 { display:grid;grid-template-columns:1fr 1fr;gap:0.875rem;margin-bottom:1.125rem; }
.hint-text { font-size:0.75rem;color:var(--color-ur-gray-2);margin-top:0.25rem; }
.form-section-title { font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:var(--color-ur-gray-2);margin-bottom:1rem;padding-bottom:0.5rem;border-bottom:1px solid var(--color-ur-border); }
.btn-submit { width:100%;padding:0.875rem;border-radius:12px;font-size:0.95rem;font-weight:700;background:linear-gradient(135deg,var(--color-ur-mint-dark),var(--color-ur-mint));color:#ffffff;border:none;cursor:pointer;transition:all 0.2s;box-shadow:0 4px 14px rgba(13,148,136,0.18);margin-top:0.5rem; }
.btn-submit:hover { opacity:0.95;transform:translateY(-1px); }

/* Kategori selector */
.kategori-grid { display:grid;grid-template-columns:1fr 1fr;gap:0.625rem;margin-bottom:1.25rem; }
.kat-card { border:1.5px solid var(--color-ur-border);border-radius:12px;padding:0.875rem;cursor:pointer;text-align:center;transition:all 0.2s;background:transparent;font-family:'Plus Jakarta Sans',sans-serif; }
.kat-card .kat-icon { font-size:1.3rem;display:block;margin-bottom:0.375rem; }
.kat-card .kat-name { font-size:0.75rem;font-weight:600;color:var(--color-ur-gray-2);display:block; }
.kat-card.selected { border-color:var(--color-ur-mint);background:var(--color-ur-mint-light); }
.kat-card.selected .kat-name { color:var(--color-ur-mint); }
.kat-card:hover:not(.selected) { border-color:var(--color-ur-purple); }

/* Sidebar */
.help-sidebar { display:flex;flex-direction:column;gap:1rem; }
.sidebar-card { background:var(--color-ur-card);border:1.5px solid var(--color-ur-border);border-radius:16px;padding:1.25rem;box-shadow:var(--shadow-card); }
.sidebar-card h3 { font-size:0.875rem;font-weight:700;color:var(--color-ur-white);margin:0 0 0.875rem; }
.faq-item { margin-bottom:0.875rem; }
.faq-q { font-size:0.825rem;font-weight:600;color:var(--color-ur-gray);margin-bottom:0.25rem;cursor:pointer;transition:color 0.18s; }
.faq-q:hover { color:var(--color-ur-white); }
.faq-a { font-size:0.8rem;color:var(--color-ur-gray-2);line-height:1.55;display:none; }
.faq-a.open { display:block; }
.contact-option { display:flex;align-items:center;gap:0.75rem;padding:0.75rem;background:var(--color-ur-navy-2);border-radius:10px;margin-bottom:0.5rem;text-decoration:none;transition:background 0.18s; }
.contact-option:hover { background:var(--color-ur-navy-3); }
.co-icon { width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0; }
.co-label { font-size:0.8rem;font-weight:600;color:var(--color-ur-white); }
.co-sub   { font-size:0.7rem;color:var(--color-ur-gray-2); }

/* Tiket riwayat */
.tiket-item { padding:0.875rem;background:var(--color-ur-navy-2);border-radius:10px;border:1px solid var(--color-ur-border);margin-bottom:0.5rem; }
.tiket-top { display:flex;justify-content:space-between;align-items:center;margin-bottom:0.25rem; }
.tiket-id { font-size:0.75rem;font-weight:700;color:var(--color-ur-gray); }
.tiket-subj { font-size:0.85rem;font-weight:600;color:var(--color-ur-white);margin-bottom:0.25rem; }
.tiket-date { font-size:0.72rem;color:var(--color-ur-gray-2); }

/* Toast */
.toast { position:fixed;bottom:2rem;left:50%;transform:translateX(-50%) translateY(100px);background:var(--color-ur-card);border:1.5px solid var(--color-ur-border);border-radius:12px;padding:1rem 1.5rem;font-size:0.9rem;color:var(--color-ur-white);box-shadow:var(--shadow-card), 0 8px 32px rgba(0,0,0,0.15);display:flex;align-items:center;gap:0.625rem;transition:transform 0.4s cubic-bezier(0.34,1.56,0.64,1);z-index:200; }
.toast.show { transform:translateX(-50%) translateY(0); }

@media (max-width:768px) {
    .help-layout { grid-template-columns:1fr; }
    .kategori-grid { grid-template-columns:1fr 1fr; }
    .form-row-2 { grid-template-columns:1fr; }
}
</style>

<div style="margin-bottom:1.5rem;" id="help-page-header">
    <h1 style="font-size:clamp(1.5rem,3.5vw,2.25rem);color:var(--color-ur-white);margin:0 0 0.375rem;">Admin Help</h1>
    <p style="color:var(--color-ur-gray);font-size:0.9rem;margin:0;">Sampaikan komplain atau pertanyaan ke tim internal UniRoute</p>
</div>

<div class="help-layout" id="help-layout">

    <!-- ─── Form ─── -->
    <div class="help-card" id="help-form-card">
        <div class="help-card-header">
            <h1>📋 Buat Tiket Baru</h1>
            <p>Tim kami akan merespons dalam 1×24 jam</p>
        </div>
        <div class="help-card-body">

            <p class="form-section-title">Kategori Masalah</p>
            <div class="kategori-grid" id="kategori-grid">
                <button class="kat-card selected" id="kat-layanan" onclick="selectKat(this)">
                    <span class="kat-icon">📋</span><span class="kat-name">Masalah Layanan</span>
                </button>
                <button class="kat-card" id="kat-kating" onclick="selectKat(this)">
                    <span class="kat-icon">🎓</span><span class="kat-name">Keluhan Kating</span>
                </button>
                <button class="kat-card" id="kat-teknis" onclick="selectKat(this)">
                    <span class="kat-icon">⚙️</span><span class="kat-name">Masalah Teknis</span>
                </button>
                <button class="kat-card" id="kat-lain" onclick="selectKat(this)">
                    <span class="kat-icon">💬</span><span class="kat-name">Pertanyaan Umum</span>
                </button>
            </div>

            <form id="help-form" onsubmit="submitHelp(event)">
                <p class="form-section-title" style="margin-top:0.25rem;">Detail Laporan</p>

                <div class="form-row-2">
                    <div class="form-group" style="margin:0;">
                        <label for="h-nama">Nama Lengkap <span style="color:var(--color-ur-mint);">*</span></label>
                        <input type="text" id="h-nama" placeholder="Nama kamu">
                    </div>
                    <div class="form-group" style="margin:0;">
                        <label for="h-email">Email / WhatsApp <span style="color:var(--color-ur-mint);">*</span></label>
                        <input type="text" id="h-email" placeholder="email@gmail.com atau +62…">
                    </div>
                </div>

                <div class="form-group">
                    <label for="h-subject">Subjek <span style="color:var(--color-ur-mint);">*</span></label>
                    <input type="text" id="h-subject" placeholder="Ringkasan singkat masalahmu">
                </div>

                <div class="form-group">
                    <label for="h-req-id">ID Permintaan (jika ada)</label>
                    <input type="text" id="h-req-id" placeholder="Contoh: REQ-001, REQ-024…">
                    <p class="hint-text">Lihat di halaman "Permintaan Saya" untuk menemukan ID ini</p>
                </div>

                <div class="form-group">
                    <label for="h-detail">Detail Masalah <span style="color:var(--color-ur-mint);">*</span></label>
                    <textarea id="h-detail" rows="5" placeholder="Ceritakan secara detail apa yang terjadi, kapan, dan apa yang kamu harapkan sebagai solusi…"></textarea>
                    <p class="hint-text">Semakin detail, semakin cepat tim kami bisa membantu</p>
                </div>

                <div class="form-group">
                    <label for="h-prioritas">Tingkat Urgensi</label>
                    <select id="h-prioritas">
                        <option value="normal">Normal — butuh bantuan tapi tidak mendesak</option>
                        <option value="tinggi">Tinggi — mempengaruhi layanan aktif</option>
                        <option value="darurat">Darurat — butuh respons segera (< 2 jam)</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit" id="btn-submit-help">
                    📤 Kirim Tiket →
                </button>
            </form>
        </div>
    </div>

    <!-- ─── Sidebar ─── -->
    <div class="help-sidebar" id="help-sidebar">

        <!-- FAQ -->
        <div class="sidebar-card" id="faq-card">
            <h3>❓ Pertanyaan Umum</h3>
            @php
            $faqs = [
                ['q'=>'Berapa lama kating merespons?','a'=>'Rata-rata kating merespons dalam < 2 jam saat jam aktif (07.00–22.00 waktu setempat). Waktu respons ditampilkan di profil masing-masing kating.'],
                ['q'=>'Bagaimana jika kating tidak datang?','a'=>'Segera buat tiket dengan kategori "Keluhan Kating". Tim kami akan menindaklanjuti dalam 1 jam dan mencari solusi alternatif.'],
                ['q'=>'Bisakah saya ganti kating?','a'=>'Ya, selama permintaan masih berstatus "Menunggu", kamu bisa membatalkan dan memilih kating lain dari Browse Kating.'],
                ['q'=>'Apakah ada jaminan kualitas?','a'=>'Ya! Semua kating telah diverifikasi identitas dan status mahasiswanya. Laporan Apartment Check melalui moderasi admin sebelum dikirim ke klien.'],
            ];
            @endphp
            @foreach($faqs as $i => $faq)
            <div class="faq-item" id="faq-item-{{ $i }}">
                <div class="faq-q" onclick="toggleFaq({{ $i }})">{{ $faq['q'] }}</div>
                <div class="faq-a" id="faq-a-{{ $i }}">{{ $faq['a'] }}</div>
            </div>
            @endforeach
        </div>

        <!-- Kontak Langsung -->
        <div class="sidebar-card" id="contact-card">
            <h3>📞 Kontak Langsung</h3>
            <a href="#" class="contact-option" id="contact-wa">
                <div class="co-icon" style="background:rgba(37,211,102,0.15);">📱</div>
                <div>
                    <div class="co-label">WhatsApp Admin</div>
                    <div class="co-sub">Respons dalam 30 menit</div>
                </div>
            </a>
            <a href="#" class="contact-option" id="contact-email">
                <div class="co-icon" style="background:rgba(107,140,255,0.15);">📧</div>
                <div>
                    <div class="co-label">Email Support</div>
                    <div class="co-sub">support@uniroute.id</div>
                </div>
            </a>
        </div>

        <!-- Riwayat Tiket -->
        <div class="sidebar-card" id="tiket-riwayat-card">
            <h3>📂 Tiket Terakhirmu</h3>
            @php
            $tikets = [
                ['id'=>'TKT-024','subj'=>'Kating tidak merespons selama 12 jam','status'=>'selesai','tanggal'=>'10 Jun 2026'],
                ['id'=>'TKT-018','subj'=>'Pertanyaan: proses refund apartment check','status'=>'selesai','tanggal'=>'28 Mei 2026'],
            ];
            @endphp
            @foreach($tikets as $t)
            <div class="tiket-item" id="tiket-{{ $t['id'] }}">
                <div class="tiket-top">
                    <span class="tiket-id">{{ $t['id'] }}</span>
                    @include('components.status-badge', ['status' => $t['status'], 'size' => 'sm'])
                </div>
                <div class="tiket-subj">{{ $t['subj'] }}</div>
                <div class="tiket-date">{{ $t['tanggal'] }}</div>
            </div>
            @endforeach
        </div>

    </div>

</div>

<!-- Toast -->
<div class="toast" id="help-toast">
    <span style="font-size:1.25rem;">✅</span>
    <div><strong>Tiket Terkirim!</strong><br><span style="font-size:0.8rem;color:var(--color-ur-gray);">ID: TKT-{{ rand(100,999) }}. Tim kami akan merespons dalam 24 jam.</span></div>
</div>

<script>
function selectKat(btn) {
    document.querySelectorAll('.kat-card').forEach(k => k.classList.remove('selected'));
    btn.classList.add('selected');
}
function toggleFaq(i) {
    const el = document.getElementById('faq-a-'+i);
    el.classList.toggle('open');
}
function submitHelp(e) {
    e.preventDefault();
    const btn = document.getElementById('btn-submit-help');
    btn.textContent = '⏳ Mengirim…';
    btn.disabled = true;
    setTimeout(() => {
        const toast = document.getElementById('help-toast');
        toast.classList.add('show');
        btn.textContent = '✓ Tiket Terkirim';
        btn.style.background = 'var(--color-ur-mint-dark)';
        setTimeout(() => toast.classList.remove('show'), 4000);
        setTimeout(() => { btn.disabled=false; btn.textContent='📤 Kirim Tiket →'; btn.style.background=''; }, 4500);
    }, 1200);
}
</script>

@endsection
