@extends('layouts.app')
@section('title', 'Browse Kampus — UniRoute')
@section('content')

<style>
.page-hero { margin-bottom: 2rem; }
.page-hero h1 { font-size: clamp(1.75rem, 4vw, 2.5rem); color: var(--color-ur-white); margin: 0 0 0.5rem; }
.page-hero p  { color: var(--color-ur-gray); font-size: 0.95rem; margin: 0; }

.filter-bar {
    display: flex; gap: 0.75rem; flex-wrap: wrap; align-items: center;
    background: var(--color-ur-card); border: 1.5px solid var(--color-ur-border); border-radius: 14px;
    padding: 1rem 1.25rem; margin-bottom: 1.75rem;
    box-shadow: var(--shadow-card);
}
.filter-bar input { max-width: 280px; flex: 1; }
.filter-bar select { max-width: 180px; flex: 1; }

.kampus-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1rem;
}
.kampus-card {
    background: var(--color-ur-card); border: 1.5px solid var(--color-ur-border); border-radius: 16px;
    overflow: hidden; text-decoration: none; display: flex; flex-direction: column;
    transition: all 0.22s;
    box-shadow: var(--shadow-card);
}
.kampus-card:hover { border-color: var(--color-ur-purple); transform: translateY(-2px); box-shadow: var(--shadow-card), 0 8px 32px rgba(99,102,241,0.08); }
.kampus-img-wrap { height: 140px; overflow: hidden; background: linear-gradient(135deg, var(--color-ur-navy-2), var(--color-ur-navy-4)); display: flex; align-items: center; justify-content: center; font-size: 3rem; }
.kampus-body { padding: 1.125rem; flex: 1; display: flex; flex-direction: column; gap: 0.625rem; }
.kampus-name { font-size: 1rem; font-weight: 700; color: var(--color-ur-white); margin: 0; }
.kampus-loc { font-size: 0.8rem; color: var(--color-ur-blue); }
.kampus-meta { display: flex; gap: 0.5rem; flex-wrap: wrap; margin-top: auto; padding-top: 0.625rem; }
.kampus-tag {
    font-size: 0.68rem; font-weight: 600; padding: 0.2rem 0.55rem;
    border-radius: 999px; background: var(--color-ur-blue-light);
    border: 1px solid rgba(37,99,235,0.2); color: var(--color-ur-blue);
}
.kampus-kating-count { font-size: 0.75rem; color: var(--color-ur-gray-2); display: flex; align-items: center; gap: 0.25rem; }
.kampus-actions { display: flex; gap: 0.5rem; padding: 0 1.125rem 1.125rem; }
.btn-sm-primary {
    flex: 1; text-align: center;
    padding: 0.5rem; border-radius: 8px; font-size: 0.8rem; font-weight: 700;
    background: linear-gradient(135deg, var(--color-ur-mint-dark), var(--color-ur-mint)); color: #ffffff; border: none; cursor: pointer;
    text-decoration: none; display: block; transition: background 0.18s;
}
.btn-sm-primary:hover { opacity: 0.95; }
.btn-sm-outline {
    padding: 0.5rem 0.75rem; border-radius: 8px; font-size: 0.8rem; font-weight: 600;
    background: transparent; border: 1.5px solid var(--color-ur-border); color: var(--color-ur-gray);
    cursor: pointer; transition: all 0.18s; text-decoration: none; display: block;
}
.btn-sm-outline:hover { border-color: var(--color-ur-purple); color: var(--color-ur-purple); }

.results-info { font-size: 0.875rem; color: var(--color-ur-gray-2); margin-bottom: 1rem; }
</style>

<div class="page-hero" id="page-hero-kampus">
    <h1>Browse Kampus Internasional</h1>
    <p>Temukan kakak tingkat (Kating) di kampus dan kota tujuanmu</p>
</div>

<!-- Filter Bar -->
<div class="filter-bar" id="kampus-filter-bar">
    <input type="text" id="filter-keyword" placeholder="Cari nama kampus…" oninput="filterKampus()">
    <select id="filter-negara" onchange="filterKampus()">
        <option value="">Semua Negara</option>
        <option value="Australia">Australia</option>
        <option value="Jepang">Jepang</option>
        <option value="Belanda">Belanda</option>
        <option value="UK">United Kingdom</option>
        <option value="Amerika">Amerika Serikat</option>
        <option value="Jerman">Jerman</option>
        <option value="Kanada">Kanada</option>
        <option value="Korea">Korea Selatan</option>
    </select>
    <select id="filter-jurusan" onchange="filterKampus()">
        <option value="">Semua Jurusan</option>
        <option value="Teknik">Teknik & Sains</option>
        <option value="Bisnis">Bisnis & Ekonomi</option>
        <option value="Seni">Seni & Desain</option>
        <option value="Kesehatan">Kesehatan</option>
        <option value="Hukum">Hukum</option>
    </select>
</div>

<p class="results-info" id="results-info">Menampilkan <strong id="count-display">12</strong> kampus</p>

<div class="kampus-grid" id="kampus-grid">

    @php
    $kampusList = [
        ['id'=>1, 'nama'=>'University of Melbourne', 'negara'=>'Australia', 'kota'=>'Melbourne', 'jurusan'=>['Teknik','Bisnis','Seni'], 'kating_count'=>14, 'icon'=>'🦘', 'qs_rank'=>33],
        ['id'=>2, 'nama'=>'Waseda University', 'negara'=>'Jepang', 'kota'=>'Tokyo', 'jurusan'=>['Teknik','Bisnis','Hukum'], 'kating_count'=>9, 'icon'=>'⛩️', 'qs_rank'=>201],
        ['id'=>3, 'nama'=>'TU Delft', 'negara'=>'Belanda', 'kota'=>'Delft', 'jurusan'=>['Teknik','Sains'], 'kating_count'=>7, 'icon'=>'🌷', 'qs_rank'=>57],
        ['id'=>4, 'nama'=>'University of Edinburgh', 'negara'=>'UK', 'kota'=>'Edinburgh', 'jurusan'=>['Sains','Hukum','Bisnis'], 'kating_count'=>11, 'icon'=>'🏴󠁧󠁢󠁳󠁣󠁴󠁿', 'qs_rank'=>27],
        ['id'=>5, 'nama'=>'MIT', 'negara'=>'Amerika', 'kota'=>'Cambridge, MA', 'jurusan'=>['Teknik','Sains'], 'kating_count'=>5, 'icon'=>'🗽', 'qs_rank'=>1],
        ['id'=>6, 'nama'=>'TU Munich', 'negara'=>'Jerman', 'kota'=>'München', 'jurusan'=>['Teknik','Sains'], 'kating_count'=>6, 'icon'=>'🍺', 'qs_rank'=>37],
        ['id'=>7, 'nama'=>'University of Toronto', 'negara'=>'Kanada', 'kota'=>'Toronto', 'jurusan'=>['Bisnis','Sains','Hukum'], 'kating_count'=>8, 'icon'=>'🍁', 'qs_rank'=>25],
        ['id'=>8, 'nama'=>'KAIST', 'negara'=>'Korea', 'kota'=>'Daejeon', 'jurusan'=>['Teknik','Sains'], 'kating_count'=>4, 'icon'=>'🇰🇷', 'qs_rank'=>47],
        ['id'=>9, 'nama'=>'University of Sydney', 'negara'=>'Australia', 'kota'=>'Sydney', 'jurusan'=>['Bisnis','Kesehatan','Seni'], 'kating_count'=>12, 'icon'=>'🦘', 'qs_rank'=>18],
        ['id'=>10,'nama'=>'Osaka University', 'negara'=>'Jepang', 'kota'=>'Osaka', 'jurusan'=>['Teknik','Kesehatan'], 'kating_count'=>6, 'icon'=>'⛩️', 'qs_rank'=>80],
        ['id'=>11,'nama'=>'University of Amsterdam', 'negara'=>'Belanda', 'kota'=>'Amsterdam', 'jurusan'=>['Bisnis','Hukum','Seni'], 'kating_count'=>5, 'icon'=>'🌷', 'qs_rank'=>52],
        ['id'=>12,'nama'=>'McGill University', 'negara'=>'Kanada', 'kota'=>'Montreal', 'jurusan'=>['Kesehatan','Sains','Bisnis'], 'kating_count'=>7, 'icon'=>'🍁', 'qs_rank'=>30],
    ];
    @endphp

    @foreach($kampusList as $k)
    <div class="kampus-card"
         data-nama="{{ strtolower($k['nama']) }}"
         data-negara="{{ $k['negara'] }}"
         data-jurusan="{{ implode(',', $k['jurusan']) }}"
         id="kampus-card-{{ $k['id'] }}">
         <div class="kampus-img-wrap">{{ $k['icon'] }}</div>
         <div class="kampus-body">
             <h3 class="kampus-name">{{ $k['nama'] }}</h3>
             <p class="kampus-loc">📍 {{ $k['kota'] }}, {{ $k['negara'] }}</p>
             <div class="kampus-meta">
                 @foreach($k['jurusan'] as $j)
                 <span class="kampus-tag">{{ $j }}</span>
                 @endforeach
             </div>
             <div style="display:flex;justify-content:space-between;align-items:center;margin-top:0.5rem;">
                 <span class="kampus-kating-count">🎓 {{ $k['kating_count'] }} Kating aktif</span>
                 <span style="font-size:0.7rem;color:var(--color-ur-gray-2);">QS #{{ $k['qs_rank'] }}</span>
             </div>
         </div>
         <div class="kampus-actions">
             <a href="/browse-kating?kampus={{ urlencode($k['nama']) }}" class="btn-sm-primary" id="btn-cari-kating-kampus-{{ $k['id'] }}">
                 Cari Kating
             </a>
             <a href="#" class="btn-sm-outline" id="btn-detail-kampus-{{ $k['id'] }}">Detail</a>
         </div>
     </div>
    @endforeach
</div>

<script>
function filterKampus() {
    const keyword = document.getElementById('filter-keyword').value.toLowerCase();
    const negara  = document.getElementById('filter-negara').value;
    const jurusan = document.getElementById('filter-jurusan').value;
    const cards = document.querySelectorAll('#kampus-grid .kampus-card');
    let count = 0;
    cards.forEach(card => {
        const nama    = card.dataset.nama || '';
        const neg     = card.dataset.negara || '';
        const jur     = card.dataset.jurusan || '';
        const match =
            (!keyword || nama.includes(keyword)) &&
            (!negara  || neg === negara) &&
            (!jurusan || jur.includes(jurusan));
        card.style.display = match ? '' : 'none';
        if (match) count++;
    });
    document.getElementById('count-display').textContent = count;
}
</script>

@endsection
