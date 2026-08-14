@extends('layouts.app')
@section('title', 'UniRoute — Dari Penerimaan Hingga Keberangkatan')
@section('content')

<style>
/* --- Hero --- */
.hero {
    position: relative;
    overflow: hidden;
    padding: 8rem 0 10rem;
    text-align: left;
    background: 
        radial-gradient(circle at 60% 30%, rgba(181, 137, 61, 0.18) 0%, transparent 50%),
        radial-gradient(circle at 10% 70%, rgba(44, 74, 62, 0.15) 0%, transparent 45%),
        linear-gradient(135deg, rgba(34, 56, 44, 0.68) 0%, rgba(252, 251, 247, 0.2) 60%, rgba(252, 251, 247, 0.95) 100%),
        url('https://images.unsplash.com/photo-1607237138185-eedd9c632b0b?w=1600&q=70&fit=crop') center/cover no-repeat;
    min-height: 560px;
    display: flex;
    align-items: center;
    border-radius: 32px;
    margin: 1.5rem auto 0;
    max-width: 1280px;
    width: calc(100% - 2.5rem);
    box-shadow: 0 10px 40px rgba(44, 74, 62, 0.05);
    border: 1.5px solid var(--color-ur-border);
}
.hero-inner {
    width: 100%;
    position: relative;
    z-index: 1;
    max-width: 650px;
    padding: 0 4rem;
    margin: 0;
}
.hero-glow-1 {
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(181, 137, 61, 0.2) 0%, transparent 70%);
    top: -150px; left: 60%; transform: none;
}
.hero-glow-2 {
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(44, 74, 62, 0.15) 0%, transparent 70%);
    bottom: -100px; right: -50px;
}
.hero-eyebrow {
    display: inline-flex; align-items: center; gap: 0.5rem;
    font-size: 0.8rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase;
    color: #2c4a3e; border: 1.5px solid rgba(44, 74, 62, 0.15);
    background: rgba(255, 255, 255, 0.95); padding: 0.45rem 1.1rem; border-radius: 999px;
    margin-bottom: 1.5rem;
    animation: fadeSlideDown 0.6s ease both;
}
.hero-title {
    font-family: 'Space Grotesk', sans-serif;
    font-size: clamp(2.5rem, 5.5vw, 4.25rem);
    font-weight: 800; letter-spacing: -0.03em; line-height: 1.1;
    color: #ffffff; margin: 0 0 1.25rem;
    text-shadow: 0 4px 18px rgba(34, 56, 44, 0.85), 0 2px 4px rgba(34, 56, 44, 0.9);
    animation: fadeSlideDown 0.6s 0.1s ease both;
}
.hero-title .accent { color: #ebf1eb; text-shadow: 0 4px 18px rgba(34, 56, 44, 0.85), 0 2px 4px rgba(34, 56, 44, 0.9); }
.hero-subtitle {
    font-size: clamp(0.95rem, 2vw, 1.1rem); color: rgba(255, 255, 255, 0.95); max-width: 500px;
    margin: 0 0 2.5rem; line-height: 1.8;
    text-shadow: 0 3px 12px rgba(34, 56, 44, 0.85), 0 1px 3px rgba(34, 56, 44, 0.95);
    animation: fadeSlideDown 0.6s 0.2s ease both;
}
.hero-actions {
    display: flex; justify-content: flex-start; gap: 0.875rem; flex-wrap: wrap;
    animation: fadeSlideDown 0.6s 0.3s ease both;
}
.btn-primary {
    display: inline-flex; align-items: center; gap: 0.5rem;
    padding: 0.875rem 2rem; border-radius: var(--radius-btn);
    font-weight: 700; font-size: 0.95rem;
    background: #2c4a3e; color: #ffffff;
    border: none; cursor: pointer;
    transition: all 0.2s; box-shadow: 0 4px 14px rgba(44,74,62,0.2);
    text-decoration: none;
}
.btn-primary:hover { opacity: 0.95; transform: translateY(-2px); box-shadow: 0 6px 20px rgba(20, 184, 166, 0.4); }
.btn-secondary {
    display: inline-flex; align-items: center; gap: 0.5rem;
    padding: 0.875rem 2rem; border-radius: var(--radius-btn);
    font-weight: 700; font-size: 0.95rem;
    background: var(--color-ur-card); color: var(--color-ur-white);
    border: 1.5px solid var(--color-ur-border); cursor: pointer;
    transition: all 0.2s; backdrop-filter: blur(6px);
    text-decoration: none;
    box-shadow: var(--shadow-card);
}
.btn-secondary:hover { background: var(--color-ur-navy-2); border-color: var(--color-ur-gray-2); transform: translateY(-2px); }

/* Overrides for buttons inside the dark hero section to look premium */
.hero .btn-secondary {
    background: rgba(255, 255, 255, 0.9);
    border: 1.5px solid rgba(44, 74, 62, 0.15);
    color: #2c4a3e;
    box-shadow: 0 4px 14px rgba(0,0,0,0.02);
}
.hero .btn-secondary:hover {
    background: #ffffff;
    border-color: #2c4a3e;
}
.hero .btn-primary {
    background: #2c4a3e;
    color: #ffffff;
    box-shadow: 0 4px 14px rgba(44,74,62,0.25);
}
.hero .btn-primary:hover {
    background: #1b3a2b;
    box-shadow: 0 6px 20px rgba(44,74,62,0.35);
}

/* --- Stats Bar --- */
.stats-bar {
    display: flex; justify-content: center; gap: 0; flex-wrap: wrap;
    background: var(--color-ur-card); border: 1.5px solid var(--color-ur-border); border-radius: 24px;
    padding: 0; overflow: hidden; margin: 3rem auto;
    max-width: 1200px;
    width: calc(100% - 2.5rem);
    animation: fadeIn 0.7s 0.4s ease both;
    box-shadow: var(--shadow-card);
}
.stat-block {
    flex: 1; min-width: 140px;
    padding: 1.5rem 1.5rem;
    text-align: center;
    border-right: 1px solid var(--color-ur-border);
    position: relative;
}
.stat-block:last-child { border-right: none; }
.stat-block .big-num {
    font-family: 'Space Grotesk', sans-serif;
    font-size: 2rem; font-weight: 700; color: #2c4a3e; display: block;
}
.stat-block .stat-desc { font-size: 0.8rem; color: var(--color-ur-gray-2); }

/* --- Search --- */
.search-bar {
    max-width: 780px; margin: -3.5rem auto 4rem;
    display: flex; gap: 0.5rem;
    background: #d9e6d9;
    border: 5px solid #ffffff;
    border-radius: 999px; padding: 0.625rem;
    animation: fadeIn 0.7s 0.35s ease both;
    transition: all 0.25s ease;
    box-shadow: 0 12px 36px rgba(44, 74, 62, 0.08);
    position: relative; z-index: 10;
}
.search-bar:focus-within {
    border-color: #ffffff;
    box-shadow: 0 16px 44px rgba(44, 74, 62, 0.15);
    transform: translateY(-2px);
}
.search-bar input {
    flex: 1; background: #ffffff; border: none;
    color: #2c4a3e; font-size: 0.95rem; padding: 0.75rem 1.5rem;
    border-radius: 999px;
}
.search-bar input:focus { box-shadow: none; border: none; }
.search-bar input::placeholder { color: #6d8376; }
.search-bar button {
    background: #2c4a3e; color: #ffffff; border: none; border-radius: 999px;
    padding: 0.75rem 2.25rem; font-weight: 700; font-size: 0.9rem;
    cursor: pointer; transition: all 0.2s;
    box-shadow: 0 4px 12px rgba(44, 74, 62, 0.2);
}
.search-bar button:hover {
    background: #1b3a2b;
    transform: translateY(-1px);
}

/* --- Section --- */
.section { margin-bottom: 4rem; position: relative; z-index: 1; }
.section-header {
    display: flex; align-items: flex-end; justify-content: space-between;
    margin-bottom: 1.5rem; flex-wrap: wrap; gap: 0.75rem;
}
.section-title {
    font-size: 1.5rem; font-weight: 700; color: var(--color-ur-white); margin: 0;
}
.section-subtitle { font-size: 0.875rem; color: var(--color-ur-gray-2); margin: 0.25rem 0 0; }
.see-all { font-size: 0.875rem; font-weight: 600; color: var(--color-ur-mint); text-decoration: none; transition: opacity 0.18s; }
.see-all:hover { opacity: 0.75; }

/* --- Service Cards --- */
.service-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 1rem;
}
.service-card {
    background: var(--color-ur-card); border: 1.5px solid var(--color-ur-border);
    border-radius: 16px; padding: 1.5rem;
    cursor: pointer; text-decoration: none; display: block;
    transition: all 0.22s;
    position: relative; overflow: hidden;
    box-shadow: var(--shadow-card);
}
.service-card::before {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(135deg, currentColor 0%, transparent 60%);
    opacity: 0; transition: opacity 0.22s;
    border-radius: 14px;
}
.service-card:hover { transform: translateY(-3px); }
.service-card:hover::before { opacity: 0.05; }
.service-card--apt   { color: var(--color-ur-blue); } .service-card--apt:hover   { border-color: rgba(37,99,235,0.4); box-shadow: 0 8px 32px rgba(37,99,235,0.08); }
.service-card--move  { color: var(--color-ur-mint); } .service-card--move:hover  { border-color: rgba(13,148,136,0.4); box-shadow: 0 8px 32px rgba(13,148,136,0.08); }
.service-card--air   { color: var(--color-ur-gold); } .service-card--air:hover   { border-color: rgba(217,119,6,0.4); box-shadow: 0 8px 32px rgba(217,119,6,0.08); }
.service-card--chat  { color: var(--color-ur-purple); } .service-card--chat:hover  { border-color: rgba(99,102,241,0.4); box-shadow: 0 8px 32px rgba(99,102,241,0.08); }
.svc-icon {
    width: 52px; height: 52px; border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem; margin-bottom: 1rem;
    background: currentColor;
    opacity: 0.9;
}
.svc-icon span { filter: none; }
.service-card h3 { font-size: 1.1rem; font-weight: 700; color: var(--color-ur-white); margin: 0 0 0.375rem; }
.service-card p { font-size: 0.85rem; color: var(--color-ur-gray); margin: 0 0 1rem; line-height: 1.5; }
.svc-arrow { font-size: 0.8rem; font-weight: 600; color: currentColor; }

/* --- Kating Mini Grid --- */
.kating-mini-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1rem;
}

/* --- Testimonial --- */
.testimonial-grid {
    display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1rem;
}
.testi-card {
    background: var(--color-ur-card); border: 1.5px solid var(--color-ur-border); border-radius: 16px;
    padding: 1.25rem; display: flex; flex-direction: column; gap: 0.75rem;
    transition: border-color 0.2s;
    box-shadow: var(--shadow-card);
}
.testi-card:hover { border-color: var(--color-ur-purple); }
.testi-stars { color: #fbbf24; font-size: 0.9rem; letter-spacing: -1px; }
.testi-text { font-size: 0.9rem; color: var(--color-ur-gray); line-height: 1.6; font-style: italic; flex: 1; }
.testi-author { display: flex; align-items: center; gap: 0.625rem; }
.testi-avatar { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 2px solid var(--color-ur-border); }
.testi-name { font-size: 0.85rem; font-weight: 600; color: var(--color-ur-white); }
.testi-info { font-size: 0.75rem; color: var(--color-ur-gray-2); }

/* --- How It Works --- */
.steps { display: flex; gap: 0; position: relative; flex-wrap: wrap; }
.steps::before {
    content: '';
    position: absolute; top: 32px; left: 32px; right: 32px; height: 2px;
    background: linear-gradient(90deg, var(--color-ur-border), var(--color-ur-mint-dark), var(--color-ur-border));
    z-index: 0;
}
.step {
    flex: 1; min-width: 180px;
    display: flex; flex-direction: column; align-items: center; text-align: center;
    gap: 0.75rem; padding: 0 1rem; position: relative; z-index: 1;
}
.step-num {
    width: 64px; height: 64px; border-radius: 50%;
    background: var(--color-ur-card); border: 2.5px solid var(--color-ur-border);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Space Grotesk', sans-serif; font-size: 1.25rem; font-weight: 700; color: var(--color-ur-mint);
    transition: border-color 0.2s, box-shadow 0.2s;
    box-shadow: var(--shadow-card);
}
.step:hover .step-num { border-color: var(--color-ur-mint); box-shadow: 0 0 24px rgba(13,148,136,0.15); }
.step h4 { font-size: 0.95rem; font-weight: 700; color: var(--color-ur-white); margin: 0; }
.step p { font-size: 0.8rem; color: var(--color-ur-gray-2); margin: 0; line-height: 1.5; }

/* --- Animations --- */
@keyframes fadeSlideDown { from { opacity: 0; transform: translateY(-16px); } to { opacity: 1; transform: translateY(0); } }
@keyframes fadeIn        { from { opacity: 0; } to { opacity: 1; } }

/* --- Responsive --- */
@media (max-width: 768px) {
    .hero {
        padding: 8rem 0 7rem;
        text-align: center;
        margin: 1rem auto 0;
        width: calc(100% - 1.5rem);
        border-radius: 20px;
    }
    .hero-inner {
        padding: 0 1.5rem;
        max-width: 100%;
    }
    .hero-actions {
        justify-content: center;
    }
    .search-bar {
        margin: -2.5rem auto 3rem;
        width: calc(100% - 2rem);
        padding: 0.5rem;
        flex-direction: column;
        border-radius: 20px;
    }
    .search-bar input {
        border-radius: 999px;
        padding: 0.625rem 1.25rem;
    }
    .search-bar button {
        width: 100%;
        border-radius: 999px;
    }
    .stats-bar {
        flex-direction: column;
        border-radius: 20px;
        width: calc(100% - 1.5rem);
    }
    .stat-block {
        border-right: none;
        border-bottom: 1px solid var(--color-ur-border);
    }
    .stat-block:last-child { border-bottom: none; }
    .steps::before { display: none; }
}
</style>

<!-- --- HERO --- -->
<section class="hero" id="hero-section">
    <div class="glow-spot hero-glow-1"></div>
    <div class="glow-spot hero-glow-2"></div>

    <div class="hero-inner">
        <div class="hero-eyebrow" id="hero-eyebrow">
            Pendamping Studi Luar Negeri #1
        </div>
        <h1 class="hero-title" id="hero-title">
            Dari LoA hingga<br>
            <span class="accent">Tiba di Kampus</span>
        </h1>
        <p class="hero-subtitle" id="hero-subtitle">
            UniRoute menghubungkan mahasiswa Indonesia dengan <strong style="color:#ffc107; text-shadow: 0 2px 8px rgba(34, 56, 44, 0.95);">Kating</strong> (kakak tingkat) yang sudah lebih dulu berada di negara tujuan &mdash; untuk cek apartemen, bantu pindahan, hingga jemput di bandara.
        </p>

        <div class="hero-actions" id="hero-actions">
            <a href="/browse-kating" class="btn-primary" id="btn-cari-kating">
                &#127891; Cari Kating
            </a>
            <a href="/browse-kampus" class="btn-secondary" id="btn-cari-kampus">
                &#127979; Browse Kampus
            </a>
        </div>
    </div>
</section>

<!-- Search Bar -->
<div class="search-bar" id="hero-search">
    <input type="text" id="hero-search-input" placeholder="Cari kampus tujuan, kota, atau negara&hellip;">
    <button id="hero-search-btn" onclick="window.location.href='/browse-kampus'">Cari Sekarang &rarr;</button>
</div>

<!-- --- CAMPUS CAROUSEL --- -->
<section id="campus-carousel-section" style="margin-bottom:2.5rem;">
    <div style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:1rem;flex-wrap:wrap;gap:0.5rem;">
        <div>
            <h2 style="font-size:1.25rem;font-weight:700;color:var(--color-ur-white);margin:0 0 0.25rem;">Kampus Tujuan Populer</h2>
            <p style="font-size:0.8rem;color:var(--color-ur-gray-2);margin:0;">Kating kami tersebar di kampus-kampus terbaik dunia</p>
        </div>
        <div style="display:flex;align-items:center;gap:0.5rem;">
            <button onclick="prevSlide()" id="carousel-prev" style="width:36px;height:36px;border-radius:50%;background:var(--color-ur-card);border:1.5px solid var(--color-ur-border);color:var(--color-ur-gray);cursor:pointer;font-size:0.9rem;display:flex;align-items:center;justify-content:center;transition:all 0.18s;box-shadow:var(--shadow-card);" onmouseover="this.style.borderColor='var(--color-ur-purple)';this.style.color='var(--color-ur-purple)'" onmouseout="this.style.borderColor='var(--color-ur-border)';this.style.color='var(--color-ur-gray)'">&lsaquo;</button>
            <button onclick="nextSlide()" id="carousel-next" style="width:36px;height:36px;border-radius:50%;background:var(--color-ur-card);border:1.5px solid var(--color-ur-border);color:var(--color-ur-gray);cursor:pointer;font-size:0.9rem;display:flex;align-items:center;justify-content:center;transition:all 0.18s;box-shadow:var(--shadow-card);" onmouseover="this.style.borderColor='var(--color-ur-purple)';this.style.color='var(--color-ur-purple)'" onmouseout="this.style.borderColor='var(--color-ur-border)';this.style.color='var(--color-ur-gray)'">&rsaquo;</button>
        </div>
    </div>

    <div style="position:relative;overflow:hidden;border-radius:20px;height:380px;" id="carousel-wrap">
        <!-- Slides -->
        <div id="carousel-inner" style="display:flex;height:100%;transition:transform 0.6s cubic-bezier(0.4,0,0.2,1);">

            @php
            $campuses = [
                ['name'=>'University of Melbourne','loc'=>'Melbourne, Australia','kating'=>14,'img'=>'https://images.unsplash.com/photo-1607237138185-eedd9c632b0b?w=1400&q=75&fit=crop','tag'=>'Australia'],
                ['name'=>'University of Edinburgh','loc'=>'Edinburgh, UK','kating'=>11,'img'=>'https://images.unsplash.com/photo-1583422409516-2895a77efded?w=1400&q=75&fit=crop','tag'=>'UK'],
                ['name'=>'Waseda University','loc'=>'Tokyo, Jepang','kating'=>9,'img'=>'https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?w=1400&q=75&fit=crop','tag'=>'Jepang'],
                ['name'=>'TU Delft','loc'=>'Delft, Belanda','kating'=>7,'img'=>'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1400&q=75&fit=crop','tag'=>'Belanda'],
                ['name'=>'University of Toronto','loc'=>'Toronto, Kanada','kating'=>8,'img'=>'https://images.unsplash.com/photo-1605339837222-3f59b0a81f91?w=1400&q=75&fit=crop','tag'=>'Kanada'],
                ['name'=>'University of Sydney','loc'=>'Sydney, Australia','kating'=>12,'img'=>'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1400&q=75&fit=crop','tag'=>'Australia'],
            ];
            @endphp

            @foreach($campuses as $ci => $campus)
            <div class="campus-slide" style="min-width:100%;height:100%;position:relative;flex-shrink:0;" id="campus-slide-{{ $ci }}">
                <img src="{{ $campus['img'] }}" alt="{{ $campus['name'] }}" loading="{{ $ci === 0 ? 'eager' : 'lazy' }}"
                     style="width:100%;height:100%;object-fit:cover;display:block;"
                     onerror="this.parentElement.style.background='linear-gradient(135deg,#1a1535,#3d3578)';this.style.display='none'">
                <!-- Gradient overlay -->
                <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(10,8,25,0.92) 0%,rgba(10,8,25,0.35) 50%,transparent 100%);"></div>
                <!-- Content -->                <div style="position:absolute;bottom:0;left:0;right:0;padding:2rem 2.5rem;">
                    <div style="display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
                        <div>
                            <span style="display:inline-block;font-size:0.65rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:#5eead4;background:rgba(94,234,212,0.12);border:1px solid rgba(94,234,212,0.25);border-radius:999px;padding:0.2rem 0.6rem;margin-bottom:0.625rem;">{{ $campus['tag'] }}</span>
                            <h3 style="font-family:'Space Grotesk',sans-serif;font-size:clamp(1.3rem,3vw,2rem);font-weight:700;color:#fff;margin:0 0 0.25rem;line-height:1.1;">{{ $campus['name'] }}</h3>
                            <p style="font-size:0.875rem;color:rgba(255,255,255,0.65);margin:0;">📍 {{ $campus['loc'] }}</p>
                        </div>
                        <div style="text-align:right;flex-shrink:0;">
                            <div style="font-family:'Space Grotesk',sans-serif;font-size:1.75rem;font-weight:700;color:#5eead4;line-height:1;">{{ $campus['kating'] }}</div>
                            <div style="font-size:0.75rem;color:rgba(255,255,255,0.5);">Kating Aktif</div>
                            <a href="/browse-kating?negara={{ urlencode($campus['tag']) }}" style="display:inline-block;margin-top:0.625rem;padding:0.45rem 1rem;border-radius:8px;font-size:0.78rem;font-weight:700;background:linear-gradient(135deg,#5eead4,#2dd4bf);color:#042f2e;text-decoration:none;transition:opacity 0.18s;" onmouseover="this.style.opacity='.85'" onmouseout="this.style.opacity='1'">Cari Kating →</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Dots -->
        <div id="carousel-dots" style="position:absolute;bottom:1rem;left:50%;transform:translateX(-50%);display:flex;gap:0.4rem;z-index:10;">
            @foreach($campuses as $ci => $c)
            <button onclick="goToSlide({{ $ci }})" id="dot-{{ $ci }}" style="width:{{ $ci===0?'20':'8' }}px;height:8px;border-radius:999px;background:{{ $ci===0?'#5eead4':'rgba(255,255,255,0.3)' }};border:none;cursor:pointer;transition:all 0.3s;padding:0;"></button>
            @endforeach
        </div>
    </div>
</section>

<script>
(function(){
    let cur = 0;
    const total = {{ count($campuses) }};
    const inner = document.getElementById('carousel-inner');
    let timer = setInterval(nextSlide, 4500);

    function updateCarousel() {
        if (!inner) return;
        inner.style.transform = 'translateX(-' + (cur * 100) + '%)';
        document.querySelectorAll('#carousel-dots button').forEach((d, i) => {
            d.style.width = i === cur ? '20px' : '8px';
            d.style.background = i === cur ? '#5eead4' : 'rgba(255,255,255,0.3)';
        });
    }
    window.nextSlide = function() { cur = (cur + 1) % total; updateCarousel(); resetTimer(); };
    window.prevSlide = function() { cur = (cur - 1 + total) % total; updateCarousel(); resetTimer(); };
    window.goToSlide = function(i) { cur = i; updateCarousel(); resetTimer(); };
    function resetTimer() { clearInterval(timer); timer = setInterval(nextSlide, 4500); }

    // Pause on hover
    const wrap = document.getElementById('carousel-wrap');
    if (wrap) {
        wrap.addEventListener('mouseenter', () => clearInterval(timer));
        wrap.addEventListener('mouseleave', () => { timer = setInterval(nextSlide, 4500); });
    }

    // Swipe/drag support
    let startX = 0;
    if (wrap) {
        wrap.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, {passive:true});
        wrap.addEventListener('touchend', e => {
            const diff = startX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 40) diff > 0 ? nextSlide() : prevSlide();
        }, {passive:true});
    }
})();
</script>

<!-- --- STATS BAR --- -->
<div class="stats-bar" id="stats-bar">
    <div class="stat-block" id="stat-kating">
        <span class="big-num">120+</span>
        <span class="stat-desc">Kating Aktif</span>
    </div>
    <div class="stat-block" id="stat-kota">
        <span class="big-num">38</span>
        <span class="stat-desc">Kota di 15 Negara</span>
    </div>
    <div class="stat-block" id="stat-job">
        <span class="big-num">840+</span>
        <span class="stat-desc">Job Selesai</span>
    </div>
    <div class="stat-block" id="stat-rating">
        <span class="big-num">4.9★</span>
        <span class="stat-desc">Rating Rata-rata</span>
    </div>
</div>

<!-- --- LAYANAN --- -->
<section class="section" id="section-layanan">
    <div class="section-header">
        <div>
            <h2 class="section-title">Layanan Kami</h2>
            <p class="section-subtitle">Tiga layanan inti + saluran komunikasi langsung</p>
        </div>
        <a href="/browse-kating" class="see-all" id="link-semua-layanan">Lihat semua →</a>
    </div>

    <div class="service-grid" id="service-grid">
        <a href="/browse-kating?layanan=apartment-check" class="service-card service-card--apt" id="svc-apt">
            <div class="svc-icon" style="background:rgba(107,140,255,0.12);">🏠</div>
            <h3>Apartment Check</h3>
            <p>Kating hadir langsung ke lokasi untuk verifikasi kondisi real apartemen/kos sebelum kamu bayar dari jauh.</p>
            <span class="svc-arrow">Cari Kating →</span>
        </a>

        <a href="/browse-kating?layanan=move-in-help" class="service-card service-card--move" id="svc-move">
            <div class="svc-icon" style="background:rgba(94,234,212,0.1);">📦</div>
            <h3>Move-in Help</h3>
            <p>Bantuan penuh di hari kepindahan: angkat barang, orientasi lingkungan, dan pastikan kamu nyaman di tempat baru.</p>
            <span class="svc-arrow">Cari Kating →</span>
        </a>

        <a href="/browse-kating?layanan=airport-pickup" class="service-card service-card--air" id="svc-air">
            <div class="svc-icon" style="background:rgba(255,159,103,0.1);">✈️</div>
            <h3>Airport Pickup</h3>
            <p>Disambut wajah familiar saat pertama menginjakkan kaki di negara baru — penjemputan dan antar ke tempat tujuan.</p>
            <span class="svc-arrow">Cari Kating →</span>
        </a>

        <a href="/browse-kating" class="service-card service-card--chat" id="svc-chat">
            <div class="svc-icon" style="background:rgba(192,132,252,0.1);">💬</div>
            <h3>Chat dengan Kating</h3>
            <p>Tanya-tanya dulu sebelum commit. Obrolan langsung dengan kating di kotamu tanpa harus pesan layanan terlebih dahulu.</p>
            <span class="svc-arrow">Mulai Chat →</span>
        </a>
    </div>
</section>

<!-- --- HOW IT WORKS --- -->
<section class="section" id="section-cara-kerja">
    <div class="section-header">
        <div>
            <h2 class="section-title">Cara Kerja</h2>
            <p class="section-subtitle">Empat langkah mudah, satu platform terpadu</p>
        </div>
    </div>

    <div class="steps" id="steps-grid">
        <div class="step" id="step-1">
            <div class="step-num">1</div>
            <h4>Browse Kating</h4>
            <p>Filter berdasarkan kota, negara, dan jenis layanan yang kamu butuhkan.</p>
        </div>
        <div class="step" id="step-2">
            <div class="step-num">2</div>
            <h4>Pilih & Chat Dulu</h4>
            <p>Lihat profil, baca ulasan, lalu chat dulu untuk yakinkan diri.</p>
        </div>
        <div class="step" id="step-3">
            <div class="step-num">3</div>
            <h4>Ajukan Layanan</h4>
            <p>Isi form sesuai layanan yang dipilih, kating konfirmasi & eksekusi.</p>
        </div>
        <div class="step" id="step-4">
            <div class="step-num">4</div>
            <h4>Terima Laporan</h4>
            <p>Hasil lengkap: foto, checklist, atau konfirmasi jadwal — semuanya terdokumentasi.</p>
        </div>
    </div>
</section>

<!-- --- FEATURED KATING --- -->
<section class="section" id="section-kating-unggulan">
    <div class="section-header">
        <div>
            <h2 class="section-title">Kating Unggulan</h2>
            <p class="section-subtitle">Dipilih berdasarkan rating & job selesai</p>
        </div>
        <a href="/browse-kating" class="see-all" id="link-semua-kating">Lihat semua →</a>
    </div>

    @php
    $featuredKating = [
        ['id'=>1, 'nama'=>'Ayu Pradnya Dewi', 'kampus'=>'University of Melbourne', 'kota'=>'Melbourne', 'negara'=>'Australia', 'rating'=>4.9, 'ulasan'=>31, 'job_selesai'=>47, 'respons_time'=>'< 1j', 'layanan'=>['Apartment Check','Airport Pickup'], 'status'=>'aktif'],
        ['id'=>2, 'nama'=>'Budi Santoso', 'kampus'=>'Waseda University', 'kota'=>'Tokyo', 'negara'=>'Jepang', 'rating'=>4.8, 'ulasan'=>24, 'job_selesai'=>38, 'respons_time'=>'< 2j', 'layanan'=>['Airport Pickup','Move-in Help'], 'status'=>'aktif'],
        ['id'=>3, 'nama'=>'Ni Made Sari', 'kampus'=>'TU Delft', 'kota'=>'Delft', 'negara'=>'Belanda', 'rating'=>5.0, 'ulasan'=>19, 'job_selesai'=>29, 'respons_time'=>'< 3j', 'layanan'=>['Apartment Check','Move-in Help'], 'status'=>'aktif'],
    ];
    @endphp

    <div class="kating-mini-grid" id="featured-kating-grid">
        @foreach($featuredKating as $kating)
            @include('components.kating-card', ['kating' => $kating])
        @endforeach
    </div>
</section>

<!-- --- TESTIMONIAL --- -->
<section class="section" id="section-testimonial">
    <div class="section-header">
        <div>
            <h2 class="section-title">Kata Mereka</h2>
            <p class="section-subtitle">Pengalaman nyata dari mahasiswa Indonesia</p>
        </div>
    </div>

    <div class="testimonial-grid" id="testi-grid">
        @php
        $testimoni = [
            ['nama'=>'Kadek Wirawan', 'kampus'=>'University of Melbourne, Australia', 'avatar'=>'https://i.pravatar.cc/80?u=10', 'bintang'=>5, 'teks'=>'"Lewat UniRoute saya bisa cek apartemen dari Indonesia sebelum berangkat. Katingnya profesional banget, foto lengkap + laporan detail. Harga sewa yang saya pilih terbukti worth it!"'],
            ['nama'=>'Luh Putu Anika', 'kampus'=>'Waseda University, Jepang', 'avatar'=>'https://i.pravatar.cc/80?u=11', 'bintang'=>5, 'teks'=>'"Dijemput langsung di Narita sama Kak Budi. Dia sabar dan bantu saya sampai asrama. Benar-benar nggak kerasa sendiri pertama kali ke Jepang!"'],
            ['nama'=>'I Gede Mahendra', 'kampus'=>'TU Delft, Belanda', 'avatar'=>'https://i.pravatar.cc/80?u=12', 'bintang'=>5, 'teks'=>'"Move-in help Kak Sari luar biasa. Bantu angkat koper, kenalkan lingkungan sekitar, sampai tahu di mana supermarket terdekat. Recommended banget!"'],
        ];
        @endphp
        @foreach($testimoni as $t)
        <div class="testi-card">
            <div class="testi-stars">{{ str_repeat('★', $t['bintang']) }}</div>
            <p class="testi-text">{{ $t['teks'] }}</p>
            <div class="testi-author">
                <img src="{{ $t['avatar'] }}" alt="{{ $t['nama'] }}" class="testi-avatar" loading="lazy">
                <div>
                    <div class="testi-name">{{ $t['nama'] }}</div>
                    <div class="testi-info">{{ $t['kampus'] }}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- --- CTA BANNER --- -->
<section style="background: linear-gradient(135deg, #070512 0%, #151030 50%, #0a081a 100%); border: 1.5px solid rgba(99,102,241,0.18); border-radius: 24px; padding: 4rem 2rem; text-align: center; margin-bottom: 2rem; position: relative; overflow: hidden; box-shadow: var(--shadow-card);" id="cta-banner">
    <div class="glow-spot" style="width: 350px; height: 350px; background: radial-gradient(circle, rgba(99,102,241,0.2) 0%, transparent 70%); top: -100px; left: 50%; transform: translateX(-50%); position: absolute;"></div>
    <div style="position: relative; z-index: 1;">
        <h2 style="font-size: clamp(1.5rem, 4vw, 2.5rem); font-family: 'Space Grotesk', sans-serif; font-weight: 800; color: #ffffff; margin: 0 0 0.75rem;">Butuh Admin Help?</h2>
        <p style="color: rgba(255,255,255,0.7); margin: 0 0 2rem; max-width: 480px; margin-left: auto; margin-right: auto; font-size: 0.95rem; line-height: 1.6;">Untuk pertanyaan, komplain, atau masalah yang di luar kapasitas kating — tim internal kami siap membantu.</p>
        <a href="/admin-help" class="btn-primary" id="btn-admin-help-cta" style="margin: 0 auto; box-shadow: 0 4px 18px rgba(20, 184, 166, 0.4);">
            📋 Hubungi Admin
        </a>
    </div>
</section>

@endsection


