{{-- Komponen: Kartu Profil Kating --}}
{{-- Props: $kating (array), $compact (bool) --}}
@php
    $compact = $compact ?? false;
    $rating = $kating['rating'] ?? 4.8;
    $stars = round($rating);
@endphp
<div class="kating-card {{ $compact ? 'kating-card--compact' : '' }}" id="kating-card-{{ $kating['id'] ?? 0 }}">
    <div class="kating-card__header">
        <div class="kating-card__avatar">
            <img src="{{ $kating['avatar'] ?? 'https://i.pravatar.cc/80?u=' . ($kating['id'] ?? 1) }}"
                 alt="Foto {{ $kating['nama'] ?? 'Kating' }}"
                 loading="lazy">
            <span class="kating-card__status kating-card__status--{{ $kating['status'] ?? 'aktif' }}">
                {{ $kating['status'] === 'aktif' ? '● Aktif' : '○ Offline' }}
            </span>
        </div>
        <div class="kating-card__info">
            <h3 class="kating-card__name">{{ $kating['nama'] ?? 'Anonim' }}</h3>
            <p class="kating-card__campus">{{ $kating['kampus'] ?? '-' }}</p>
            <p class="kating-card__location">📍 {{ $kating['kota'] ?? '-' }}, {{ $kating['negara'] ?? '-' }}</p>
            <div class="kating-card__rating">
                <span class="stars">
                    @for($i = 1; $i <= 5; $i++)
                        <span style="color: {{ $i <= $stars ? 'var(--color-ur-gold)' : 'var(--color-ur-border)' }}">★</span>
                    @endfor
                </span>
                <span class="rating-num">{{ number_format($rating, 1) }}</span>
                <span class="review-count">({{ $kating['ulasan'] ?? 0 }} ulasan)</span>
            </div>
        </div>
    </div>

    @if(!$compact)
    <div class="kating-card__services">
        @foreach($kating['layanan'] ?? [] as $svc)
            <span class="svc-badge svc-badge--{{ strtolower(str_replace(' ', '-', $svc)) }}">{{ $svc }}</span>
        @endforeach
    </div>
    @endif

    <div class="kating-card__stats">
        <div class="stat-item">
            <span class="stat-num">{{ $kating['job_selesai'] ?? 0 }}</span>
            <span class="stat-label">Job Selesai</span>
        </div>
        <div class="stat-item">
            <span class="stat-num">{{ $kating['respons_time'] ?? '< 2j' }}</span>
            <span class="stat-label">Respons</span>
        </div>
    </div>

    <div class="kating-card__actions">
        <a href="/profil-kating/{{ $kating['id'] ?? 1 }}" class="btn-outline" id="btn-lihat-profil-{{ $kating['id'] ?? 1 }}">
            Lihat Profil
        </a>
        <a href="/chat/{{ $kating['id'] ?? 1 }}" class="btn-ghost" id="btn-chat-kating-{{ $kating['id'] ?? 1 }}">
            💬 Chat
        </a>
    </div>
</div>

<style>
.kating-card {
    background: var(--color-ur-card);
    border: 1.5px solid var(--color-ur-border);
    border-radius: 16px;
    padding: 1.25rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    transition: border-color 0.2s, transform 0.2s, box-shadow 0.2s;
    box-shadow: var(--shadow-card);
}
.kating-card:hover {
    border-color: var(--color-ur-purple);
    transform: translateY(-2px);
    box-shadow: var(--shadow-card), 0 0 24px rgba(99,102,241,0.08);
}
.kating-card__header { display: flex; gap: 1rem; align-items: flex-start; }
.kating-card__avatar { position: relative; flex-shrink: 0; }
.kating-card__avatar img {
    width: 64px; height: 64px;
    border-radius: 50%;
    object-fit: cover;
    border: 2.5px solid var(--color-ur-border);
}
.kating-card__status {
    position: absolute; bottom: -4px; left: 50%; transform: translateX(-50%);
    font-size: 0.55rem; font-weight: 600; letter-spacing: 0.04em;
    padding: 0.1rem 0.4rem; border-radius: 999px; white-space: nowrap;
    background: var(--color-ur-card); border: 1px solid;
}
.kating-card__status--aktif { color: var(--color-ur-mint); border-color: rgba(13,148,136,0.3); }
.kating-card__status--offline { color: var(--color-ur-gray-2); border-color: var(--color-ur-border); }
.kating-card__info { flex: 1; min-width: 0; }
.kating-card__name { font-size: 1rem; font-weight: 700; color: var(--color-ur-white); margin: 0 0 0.125rem; }
.kating-card__campus { font-size: 0.8rem; color: var(--color-ur-gray); margin: 0 0 0.125rem; }
.kating-card__location { font-size: 0.8rem; color: var(--color-ur-blue); margin: 0 0 0.375rem; }
.kating-card__rating { display: flex; align-items: center; gap: 0.375rem; }
.stars { font-size: 0.9rem; letter-spacing: -1px; color: var(--color-ur-gold); }
.rating-num { font-weight: 700; font-size: 0.875rem; color: var(--color-ur-white); }
.review-count { font-size: 0.75rem; color: var(--color-ur-gray-2); }
.kating-card__services { display: flex; flex-wrap: wrap; gap: 0.375rem; }
.svc-badge {
    font-size: 0.7rem; font-weight: 600; padding: 0.25rem 0.6rem;
    border-radius: 999px; border: 1px solid;
}
.svc-badge--apartment-check { color: var(--color-ur-blue); background: var(--color-ur-blue-light); border-color: rgba(37,99,235,0.25); }
.svc-badge--move-in-help { color: var(--color-ur-mint); background: var(--color-ur-mint-light); border-color: rgba(13,148,136,0.25); }
.svc-badge--airport-pickup { color: var(--color-ur-gold); background: #fef3c7; border-color: rgba(217,119,6,0.25); }
.kating-card__stats {
    display: flex; gap: 1rem;
    padding: 0.75rem; background: var(--color-ur-navy-2);
    border-radius: 10px;
}
.stat-item { flex: 1; text-align: center; }
.stat-num { display: block; font-family: 'Space Grotesk', sans-serif; font-size: 1.1rem; font-weight: 700; color: var(--color-ur-mint); }
.stat-label { font-size: 0.7rem; color: var(--color-ur-gray-2); }
.kating-card__actions { display: flex; gap: 0.5rem; }
.btn-outline {
    flex: 1; text-align: center;
    padding: 0.6rem 1rem; border-radius: 10px;
    font-size: 0.85rem; font-weight: 600;
    background: transparent; border: 1.5px solid var(--color-ur-purple);
    color: var(--color-ur-purple); transition: all 0.18s; cursor: pointer; display: block;
}
.btn-outline:hover { background: var(--color-ur-purple); color: #ffffff; }
.btn-ghost {
    padding: 0.6rem 0.875rem; border-radius: 10px;
    font-size: 0.85rem; font-weight: 500;
    background: var(--color-ur-navy-2); border: 1.5px solid var(--color-ur-border);
    color: var(--color-ur-gray); transition: all 0.18s; cursor: pointer; display: block;
    white-space: nowrap;
}
.btn-ghost:hover { border-color: var(--color-ur-purple); color: var(--color-ur-purple); }
</style>
