@extends('layouts.app')
@section('title', 'Chat — UniRoute')
@section('content')

@php
$chatId = request()->segment(2, null);
$conversations = [
    ['id'=>1,'nama'=>'Ayu Pradnya Dewi','avatar'=>'https://i.pravatar.cc/64?u=1','kota'=>'Melbourne','last_msg'=>'Baik, saya cek besok pagi ya kak!','time'=>'14:32','unread'=>0,'status'=>'aktif'],
    ['id'=>2,'nama'=>'Budi Santoso','avatar'=>'https://i.pravatar.cc/64?u=2','kota'=>'Tokyo','last_msg'=>'Penerbangan JL720 kan? Oke saya catat.','time'=>'12:10','unread'=>2,'status'=>'aktif'],
    ['id'=>3,'nama'=>'Ni Made Sari','avatar'=>'https://i.pravatar.cc/64?u=3','kota'=>'Delft','last_msg'=>'Siap! Untuk barang sebanyak itu sekitar 4 jam ya.','time'=>'Kemarin','unread'=>0,'status'=>'offline'],
    ['id'=>4,'nama'=>'Komang Agus','avatar'=>'https://i.pravatar.cc/64?u=4','kota'=>'Sydney','last_msg'=>'Halo kak, saya tertarik dengan layanan Apartment Check','time'=>'Kemarin','unread'=>0,'status'=>'aktif'],
];
$activeConvo = $chatId ? collect($conversations)->firstWhere('id', (int)$chatId) : ($conversations[0] ?? null);
$messages = [
    ['from'=>'kating','text'=>'Halo! Ada yang bisa dibantu?','time'=>'10:00'],
    ['from'=>'klien', 'text'=>'Kak, saya mau tanya soal apartemen di Carlton. Aman nggak area situ?','time'=>'10:02'],
    ['from'=>'kating','text'=>'Carlton sangat aman kok! Dekat kampus juga. Banyak mahasiswa Indonesia tinggal di sana.','time'=>'10:05'],
    ['from'=>'klien', 'text'=>'Oh bagus! Kalau mau pesan Apartment Check gimana prosesnya kak?','time'=>'10:07'],
    ['from'=>'kating','text'=>'Gampang banget! Kamu kasih link listing atau alamat, saya inspeksi langsung, foto 30+ sudut, lalu kirim laporan detail ke kamu dalam 24 jam.','time'=>'10:09'],
    ['from'=>'klien', 'text'=>'Wah oke banget! Saya mau coba dong kak. Link listingnya: https://airbnb.com/rooms/12345','time'=>'10:12'],
    ['from'=>'kating','text'=>'Oke siap! Saya cek besok pagi ya kak 👍 Nanti saya konfirmasi lagi sebelum berangkat.','time'=>'14:32'],
];
@endphp

<style>
.chat-layout { display:grid; grid-template-columns:300px 1fr; gap:0; height:calc(100vh - 140px); background:var(--color-ur-card); border:1.5px solid var(--color-ur-border); border-radius:20px; overflow:hidden; box-shadow:var(--shadow-card); }

/* ─── Sidebar ─── */
.chat-sidebar { border-right:1px solid var(--color-ur-border); display:flex;flex-direction:column; min-height: 0; height: 100%; }
.chat-sidebar-header { padding:1rem 1.125rem; border-bottom:1px solid var(--color-ur-border); flex-shrink:0; }
.chat-sidebar-header h2 { font-size:0.975rem;font-weight:700;color:var(--color-ur-white);margin:0 0 0.625rem; }
.chat-search input { font-size:0.85rem; }
.convo-list { flex:1;overflow-y:auto; }
.convo-item {
    display:flex;align-items:center;gap:0.75rem;padding:0.875rem 1.125rem;
    border-bottom:1px solid var(--color-ur-border);cursor:pointer;
    transition:background 0.15s;
}
.convo-item:hover { background:var(--color-ur-navy-2); }
.convo-item.active { background:var(--color-ur-navy-3); }
.convo-avatar-wrap { position:relative;flex-shrink:0; }
.convo-avatar { width:44px;height:44px;border-radius:50%;object-fit:cover;border:2px solid var(--color-ur-border); }
.convo-dot { position:absolute;bottom:1px;right:1px;width:10px;height:10px;border-radius:50%;background:var(--color-ur-mint);border:2px solid var(--color-ur-card); }
.convo-dot.offline { background:var(--color-ur-gray-2); }
.convo-info { flex:1;min-width:0; }
.convo-name { font-size:0.875rem;font-weight:700;color:var(--color-ur-white);margin-bottom:0.125rem; white-space:nowrap;overflow:hidden;text-overflow:ellipsis; }
.convo-last { font-size:0.75rem;color:var(--color-ur-gray-2);white-space:nowrap;overflow:hidden;text-overflow:ellipsis; }
.convo-meta { display:flex;flex-direction:column;align-items:flex-end;gap:0.25rem;flex-shrink:0; }
.convo-time { font-size:0.65rem;color:var(--color-ur-gray-2); }
.convo-badge { background:var(--color-ur-purple);color:#ffffff;font-size:0.65rem;font-weight:700;padding:0.1rem 0.45rem;border-radius:999px; }

/* ─── Chat Main ─── */
.chat-main { display:flex;flex-direction:column; min-height: 0; height: 100%; }
.chat-header { padding:1rem 1.25rem;border-bottom:1px solid var(--color-ur-border);display:flex;align-items:center;gap:0.875rem;flex-shrink:0; }
.chat-header img { width:40px;height:40px;border-radius:50%;object-fit:cover;border:2px solid var(--color-ur-border); }
.chat-header .ch-name { font-size:0.95rem;font-weight:700;color:var(--color-ur-white); }
.chat-header .ch-status { font-size:0.75rem;color:var(--color-ur-gray-2); }
.chat-header-actions { margin-left:auto;display:flex;gap:0.5rem; }
.chat-header-btn { background:var(--color-ur-navy-2);border:1.5px solid var(--color-ur-border);border-radius:8px;color:var(--color-ur-gray);font-size:0.8rem;font-weight:600;padding:0.375rem 0.75rem;cursor:pointer;text-decoration:none;transition:all 0.18s; }
.chat-header-btn:hover { border-color:var(--color-ur-purple);color:var(--color-ur-purple); }

/* ─── Messages ─── */
.chat-messages { flex:1;overflow-y:auto;padding:1.25rem;display:flex;flex-direction:column;gap:0.875rem; }
.msg { display:flex;gap:0.625rem;align-items:flex-end;max-width:75%; }
.msg.from-kating { align-self:flex-start; }
.msg.from-klien  { align-self:flex-end;flex-direction:row-reverse; }
.msg-avatar { width:32px;height:32px;border-radius:50%;object-fit:cover;flex-shrink:0; }
.msg-bubble {
    padding:0.7rem 1rem;border-radius:14px;font-size:0.875rem;line-height:1.55;
}
.msg.from-kating .msg-bubble { background:var(--color-ur-border);color:var(--color-ur-white);border-bottom-left-radius:4px; }
.msg.from-klien  .msg-bubble { background:linear-gradient(135deg,var(--color-ur-mint-dark),var(--color-ur-mint));color:#ffffff;border-bottom-right-radius:4px; }
.msg-time { font-size:0.65rem;color:var(--color-ur-gray-2);flex-shrink:0;margin-bottom:0.25rem; }

/* ─── Input Area ─── */
.chat-input-area { padding:1rem 1.25rem;border-top:1px solid var(--color-ur-border);flex-shrink:0; }
.chat-input-row { display:flex;gap:0.625rem;align-items:center; }
.chat-input-row input { flex:1;background:var(--color-ur-navy);border:1.5px solid var(--color-ur-border);border-radius:12px;padding:0.75rem 1rem;font-size:0.875rem;color:var(--color-ur-white);transition:border-color 0.2s; }
.chat-input-row input:focus { border-color:var(--color-ur-purple); box-shadow:0 0 0 3px rgba(99,102,241,0.1); }
.btn-send { width:44px;height:44px;border-radius:12px;background:linear-gradient(135deg,var(--color-ur-mint-dark),var(--color-ur-mint));color:#ffffff;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0;transition:all 0.18s; }
.btn-send:hover { opacity:0.95;transform:scale(1.05); }

/* ─── Responsive ─── */
@media (max-width:768px) {
    .chat-layout { grid-template-columns:1fr;height:auto; }
    .chat-sidebar { max-height:280px; }
    .chat-messages { min-height:350px; }
    .msg { max-width:90%; }
}
</style>

<div class="chat-layout" id="chat-layout">

    <!-- ─── Sidebar ─── -->
    <div class="chat-sidebar" id="chat-sidebar">
        <div class="chat-sidebar-header">
            <h2>💬 Chat Kating</h2>
            <div class="chat-search">
                <input type="text" id="chat-search-input" placeholder="Cari percakapan…" oninput="searchConvo(this.value)">
            </div>
        </div>
        <div class="convo-list" id="convo-list">
            @foreach($conversations as $c)
            <div class="convo-item {{ $activeConvo && $activeConvo['id'] == $c['id'] ? 'active' : '' }}"
                 id="convo-item-{{ $c['id'] }}"
                 onclick="window.location.href='/chat/{{ $c['id'] }}'">
                <div class="convo-avatar-wrap">
                    <img src="{{ $c['avatar'] }}" alt="{{ $c['nama'] }}" class="convo-avatar">
                    <span class="convo-dot {{ $c['status'] === 'offline' ? 'offline' : '' }}"></span>
                </div>
                <div class="convo-info">
                    <div class="convo-name">{{ $c['nama'] }}</div>
                    <div class="convo-last">{{ $c['last_msg'] }}</div>
                </div>
                <div class="convo-meta">
                    <span class="convo-time">{{ $c['time'] }}</span>
                    @if($c['unread'] > 0)
                    <span class="convo-badge">{{ $c['unread'] }}</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- ─── Chat Main ─── -->
    <div class="chat-main" id="chat-main">
        @if($activeConvo)
        <div class="chat-header" id="chat-header">
            <img src="{{ $activeConvo['avatar'] }}" alt="{{ $activeConvo['nama'] }}">
            <div>
                <div class="ch-name">{{ $activeConvo['nama'] }}</div>
                <div class="ch-status">📍 {{ $activeConvo['kota'] }} · {{ $activeConvo['status'] === 'aktif' ? '🟢 Online' : '⚫ Offline' }}</div>
            </div>
            <div class="chat-header-actions">
                <a href="/profil-kating/{{ $activeConvo['id'] }}" class="chat-header-btn" id="btn-profil-dari-chat">Profil</a>
                <a href="/ajukan-layanan/{{ $activeConvo['id'] }}" class="chat-header-btn" id="btn-ajukan-dari-chat" style="border-color:rgba(13,148,136,0.3);color:var(--color-ur-mint);">+ Ajukan</a>
            </div>
        </div>

        <div class="chat-messages" id="chat-messages">
            @foreach($messages as $m)
            <div class="msg from-{{ $m['from'] }}">
                @if($m['from'] === 'kating')
                <img src="{{ $activeConvo['avatar'] }}" class="msg-avatar" alt="{{ $activeConvo['nama'] }}">
                @endif
                <div>
                    <div class="msg-bubble">{{ $m['text'] }}</div>
                    <div class="msg-time" style="{{ $m['from']==='klien' ? 'text-align:right;' : '' }}">{{ $m['time'] }}</div>
                </div>
            </div>
            @endforeach
            <div id="typing-indicator" style="display:none;" class="msg from-kating">
                <img src="{{ $activeConvo['avatar'] }}" class="msg-avatar" alt="Kating">
                <div class="msg-bubble" style="padding:0.75rem 1rem;">
                    <span id="typing-dots" style="color:var(--color-ur-gray);font-size:1rem;letter-spacing:3px;">●●●</span>
                </div>
            </div>
        </div>

        <div class="chat-input-area" id="chat-input-area">
            <div class="chat-input-row">
                <input type="text" id="chat-input" placeholder="Ketik pesan…" onkeydown="if(event.key==='Enter') sendMsg()">
                <button class="btn-send" id="btn-send-msg" onclick="sendMsg()">➤</button>
            </div>
        </div>
        @else
        <div style="flex:1;display:flex;align-items:center;justify-content:center;color:var(--color-ur-gray-2);text-align:center;padding:2rem;">
            <div>
                <div style="font-size:3rem;margin-bottom:1rem;">💬</div>
                <h3 style="color:var(--color-ur-gray);margin:0 0 0.5rem;">Pilih percakapan</h3>
                <p style="font-size:0.875rem;">Pilih kating dari daftar untuk mulai chat</p>
            </div>
        </div>
        @endif
    </div>

</div>

<script>
function sendMsg() {
    const input = document.getElementById('chat-input');
    const text = input.value.trim();
    if (!text) return;
    input.value = '';

    const container = document.getElementById('chat-messages');
    const indicator = document.getElementById('typing-indicator');

    // Add user message
    const now = new Date().toLocaleTimeString('id-ID', {hour:'2-digit',minute:'2-digit'});
    const msgEl = document.createElement('div');
    msgEl.className = 'msg from-klien';
    msgEl.innerHTML = `<div><div class="msg-bubble">${text}</div><div class="msg-time" style="text-align:right;">${now}</div></div>`;
    container.insertBefore(msgEl, indicator);
    container.scrollTop = container.scrollHeight;

    // Show typing
    indicator.style.display = 'flex';
    container.scrollTop = container.scrollHeight;

    // Simulate reply
    setTimeout(() => {
        indicator.style.display = 'none';
        const replies = [
            'Siap, saya catat ya! 👍',
            'Oke, nanti saya konfirmasi lebih lanjut.',
            'Pertanyaan bagus! Bisa saya jelaskan lebih detail.',
            'Tidak masalah, saya siap membantu.',
        ];
        const reply = replies[Math.floor(Math.random() * replies.length)];
        const replyEl = document.createElement('div');
        replyEl.className = 'msg from-kating';
        const avatar = container.closest('.chat-main').querySelector('.chat-header img').src;
        replyEl.innerHTML = `<img src="${avatar}" class="msg-avatar"><div><div class="msg-bubble">${reply}</div><div class="msg-time">${now}</div></div>`;
        container.insertBefore(replyEl, indicator);
        container.scrollTop = container.scrollHeight;
    }, 1500);
}

function searchConvo(q) {
    const q_ = q.toLowerCase();
    document.querySelectorAll('.convo-item').forEach(item => {
        const name = item.querySelector('.convo-name').textContent.toLowerCase();
        item.style.display = !q_ || name.includes(q_) ? '' : 'none';
    });
}

// Auto-scroll to bottom
const msgs = document.getElementById('chat-messages');
if (msgs) msgs.scrollTop = msgs.scrollHeight;

// Typing animation
setInterval(() => {
    const d = document.getElementById('typing-dots');
    if (d) {
        const states = ['●○○','●●○','●●●'];
        d.dataset.i = ((parseInt(d.dataset.i || 0) + 1) % 3).toString();
        d.textContent = states[d.dataset.i];
    }
}, 500);
</script>

@endsection
