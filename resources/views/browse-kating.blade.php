@extends('layouts.app')
@section('title', 'Browse Kating — UniRoute')
@section('content')

<style>
.page-hero { margin-bottom: 1.5rem; }
.page-hero h1 { font-size: clamp(1.75rem, 4vw, 2.5rem); color: var(--color-ur-white); margin: 0 0 0.375rem; }
.page-hero p  { color: var(--color-ur-gray); font-size: 0.95rem; margin: 0; }

/* ─── Filter Panel ─── */
.browse-layout { display: grid; grid-template-columns: 260px 1fr; gap: 1.5rem; align-items: start; }
.filter-panel {
    background: var(--color-ur-card); border: 1.5px solid var(--color-ur-border); border-radius: 16px;
    padding: 1.25rem; position: sticky; top: 80px;
    box-shadow: var(--shadow-card);
}
.filter-panel h3 { font-size: 0.85rem; font-weight: 700; color: var(--color-ur-gray-2); text-transform: uppercase; letter-spacing: 0.08em; margin: 0 0 1rem; }
.filter-group { margin-bottom: 1.25rem; }
.filter-group label { font-size: 0.8rem; color: var(--color-ur-gray); margin-bottom: 0.375rem; }
.filter-group select, .filter-group input { font-size: 0.875rem; }
.filter-checkboxes { display: flex; flex-direction: column; gap: 0.5rem; }
.filter-check-item { display: flex; align-items: center; gap: 0.5rem; cursor: pointer; }
.filter-check-item input[type="checkbox"] {
    width: 16px; height: 16px; accent-color: var(--color-ur-purple);
    border-radius: 4px; cursor: pointer;
    background: transparent; border: 1.5px solid var(--color-ur-border); padding: 0;
}
.filter-check-item span { font-size: 0.85rem; color: var(--color-ur-gray); }
.filter-check-item:hover span { color: var(--color-ur-white); }
.btn-reset-filter {
    width: 100%; padding: 0.6rem; border-radius: 8px; font-size: 0.8rem; font-weight: 600;
    background: var(--color-ur-navy-2); border: 1.5px solid var(--color-ur-border); color: var(--color-ur-gray);
    cursor: pointer; transition: all 0.18s; margin-top: 0.5rem;
}
.btn-reset-filter:hover { border-color: var(--color-ur-purple); color: var(--color-ur-purple); }

/* ─── Sort & Info bar ─── */
.sort-bar {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;
}
.sort-bar select { width: auto; font-size: 0.85rem; padding: 0.4rem 1.75rem 0.4rem 0.75rem; }
.results-count { font-size: 0.875rem; color: var(--color-ur-gray-2); }

/* ─── Kating Grid ─── */
.kating-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1rem; }

/* ─── Active Filter Tags ─── */
.active-filters { display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 1rem; }
.filter-tag {
    display: inline-flex; align-items: center; gap: 0.375rem;
    font-size: 0.75rem; font-weight: 600; padding: 0.25rem 0.625rem;
    border-radius: 999px; background: var(--color-ur-mint-light); border: 1px solid rgba(13,148,136,0.2);
    color: var(--color-ur-mint); cursor: pointer;
}
.filter-tag:hover { opacity: 0.85; }

/* ─── Responsive ─── */
@media (max-width: 768px) {
    .browse-layout { grid-template-columns: 1fr; }
    .filter-panel { position: static; }
}
</style>

<div class="page-hero" id="page-hero-kating">
    <h1>Browse Kating</h1>
    <p>Pilih sendiri kating yang paling cocok untuk kebutuhanmu — berdasarkan kota, layanan, dan rating</p>
</div>

<div class="browse-layout" id="browse-layout">

    <!-- ─── Filter Panel ─── -->
    <aside class="filter-panel" id="filter-panel">
        <h3>🔍 Filter</h3>

        <div class="filter-group">
            <label for="f-keyword">Cari Nama</label>
            <input type="text" id="f-keyword" placeholder="Nama kating…" oninput="applyFilters()">
        </div>

        <div class="filter-group">
            <label for="f-negara">Negara Tujuan</label>
            <select id="f-negara" onchange="applyFilters()">
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
        </div>

        <div class="filter-group">
            <label>Jenis Layanan</label>
            <div class="filter-checkboxes">
                <label class="filter-check-item" id="check-apt">
                    <input type="checkbox" value="Apartment Check" onchange="applyFilters()">
                    <span>🏠 Apartment Check</span>
                </label>
                <label class="filter-check-item" id="check-move">
                    <input type="checkbox" value="Move-in Help" onchange="applyFilters()">
                    <span>📦 Move-in Help</span>
                </label>
                <label class="filter-check-item" id="check-air">
                    <input type="checkbox" value="Airport Pickup" onchange="applyFilters()">
                    <span>✈️ Airport Pickup</span>
                </label>
            </div>
        </div>

        <div class="filter-group">
            <label for="f-rating">Rating Minimum</label>
            <select id="f-rating" onchange="applyFilters()">
                <option value="0">Semua Rating</option>
                <option value="4">4.0+</option>
                <option value="4.5">4.5+</option>
                <option value="4.8">4.8+</option>
            </select>
        </div>

        <div class="filter-group">
            <label for="f-status">Status</label>
            <select id="f-status" onchange="applyFilters()">
                <option value="">Semua</option>
                <option value="aktif">Aktif Sekarang</option>
            </select>
        </div>

        <button class="btn-reset-filter" id="btn-reset-filter" onclick="resetFilters()">↺ Reset Filter</button>
    </aside>

    <!-- ─── Main Content ─── -->
    <div id="kating-main">
        <div id="active-filters-bar" class="active-filters"></div>

        <div class="sort-bar" id="sort-bar">
            <span class="results-count" id="kating-count-display">Menampilkan <strong>12</strong> kating</span>
            <select id="f-sort" onchange="applyFilters()">
                <option value="rating">Urutkan: Rating Tertinggi</option>
                <option value="job">Urutkan: Job Terbanyak</option>
                <option value="nama">Urutkan: Nama A-Z</option>
            </select>
        </div>

        <div class="kating-grid" id="kating-grid">

            @php
            $allKating = [
                ['id'=>1,  'nama'=>'Ayu Pradnya Dewi',    'kampus'=>'Univ. of Melbourne', 'kota'=>'Melbourne', 'negara'=>'Australia', 'rating'=>4.9,'ulasan'=>31,'job_selesai'=>47,'respons_time'=>'< 1j','layanan'=>['Apartment Check','Airport Pickup'],'status'=>'aktif'],
                ['id'=>2,  'nama'=>'Budi Santoso',         'kampus'=>'Waseda University',   'kota'=>'Tokyo',     'negara'=>'Jepang',    'rating'=>4.8,'ulasan'=>24,'job_selesai'=>38,'respons_time'=>'< 2j','layanan'=>['Airport Pickup','Move-in Help'],   'status'=>'aktif'],
                ['id'=>3,  'nama'=>'Ni Made Sari',         'kampus'=>'TU Delft',            'kota'=>'Delft',     'negara'=>'Belanda',   'rating'=>5.0,'ulasan'=>19,'job_selesai'=>29,'respons_time'=>'< 3j','layanan'=>['Apartment Check','Move-in Help'],  'status'=>'aktif'],
                ['id'=>4,  'nama'=>'Komang Agus Dharma',  'kampus'=>'Univ. of Sydney',     'kota'=>'Sydney',    'negara'=>'Australia', 'rating'=>4.7,'ulasan'=>16,'job_selesai'=>24,'respons_time'=>'< 2j','layanan'=>['Apartment Check','Airport Pickup','Move-in Help'],'status'=>'aktif'],
                ['id'=>5,  'nama'=>'Putu Lestari',         'kampus'=>'Osaka University',    'kota'=>'Osaka',     'negara'=>'Jepang',    'rating'=>4.9,'ulasan'=>22,'job_selesai'=>35,'respons_time'=>'< 1j','layanan'=>['Airport Pickup'],               'status'=>'aktif'],
                ['id'=>6,  'nama'=>'Wayan Teguh',          'kampus'=>'Univ. of Edinburgh',  'kota'=>'Edinburgh', 'negara'=>'UK',        'rating'=>4.6,'ulasan'=>13,'job_selesai'=>18,'respons_time'=>'< 4j','layanan'=>['Apartment Check','Move-in Help'],  'status'=>'offline'],
                ['id'=>7,  'nama'=>'Kadek Rina Sari',      'kampus'=>'McGill University',   'kota'=>'Montreal',  'negara'=>'Kanada',    'rating'=>4.8,'ulasan'=>11,'job_selesai'=>15,'respons_time'=>'< 2j','layanan'=>['Airport Pickup','Move-in Help'],   'status'=>'aktif'],
                ['id'=>8,  'nama'=>'I Nyoman Artha',       'kampus'=>'TU Munich',           'kota'=>'München',   'negara'=>'Jerman',    'rating'=>4.7,'ulasan'=>9, 'job_selesai'=>12,'respons_time'=>'< 3j','layanan'=>['Apartment Check'],               'status'=>'aktif'],
                ['id'=>9,  'nama'=>'Luh Ayu Pradewi',      'kampus'=>'Univ. of Toronto',    'kota'=>'Toronto',   'negara'=>'Kanada',    'rating'=>5.0,'ulasan'=>7, 'job_selesai'=>10,'respons_time'=>'< 1j','layanan'=>['Airport Pickup','Apartment Check'],'status'=>'aktif'],
                ['id'=>10, 'nama'=>'Gede Wiratama',        'kampus'=>'KAIST',               'kota'=>'Daejeon',   'negara'=>'Korea',     'rating'=>4.8,'ulasan'=>8, 'job_selesai'=>11,'respons_time'=>'< 2j','layanan'=>['Airport Pickup'],               'status'=>'aktif'],
                ['id'=>11, 'nama'=>'Ni Ketut Sukma',       'kampus'=>'Univ. of Amsterdam',  'kota'=>'Amsterdam', 'negara'=>'Belanda',   'rating'=>4.6,'ulasan'=>14,'job_selesai'=>20,'respons_time'=>'< 3j','layanan'=>['Move-in Help','Apartment Check'], 'status'=>'offline'],
                ['id'=>12, 'nama'=>'Made Kusuma Artha',   'kampus'=>'Univ. of Melbourne',  'kota'=>'Melbourne', 'negara'=>'Australia', 'rating'=>4.7,'ulasan'=>18,'job_selesai'=>26,'respons_time'=>'< 2j','layanan'=>['Move-in Help'],                  'status'=>'aktif'],
            ];
            @endphp

            @foreach($allKating as $kating)
                <div class="kating-card-wrap"
                     data-nama="{{ strtolower($kating['nama']) }}"
                     data-negara="{{ $kating['negara'] }}"
                     data-layanan="{{ implode('|', $kating['layanan']) }}"
                     data-rating="{{ $kating['rating'] }}"
                     data-job="{{ $kating['job_selesai'] }}"
                     data-status="{{ $kating['status'] }}"
                     id="wrap-kating-{{ $kating['id'] }}">
                    @include('components.kating-card', ['kating' => $kating])
                </div>
            @endforeach

        </div><!-- end kating-grid -->
    </div><!-- end kating-main -->

</div><!-- end browse-layout -->

<script>
function applyFilters() {
    const keyword = document.getElementById('f-keyword').value.toLowerCase().trim();
    const negara  = document.getElementById('f-negara').value;
    const minRating = parseFloat(document.getElementById('f-rating').value || 0);
    const status  = document.getElementById('f-status').value;
    const sort    = document.getElementById('f-sort').value;

    const checkedServices = Array.from(
        document.querySelectorAll('.filter-checkboxes input[type="checkbox"]:checked')
    ).map(cb => cb.value);

    const wraps = Array.from(document.querySelectorAll('.kating-card-wrap'));
    let visible = [];

    wraps.forEach(wrap => {
        const nama    = wrap.dataset.nama || '';
        const neg     = wrap.dataset.negara || '';
        const layanan = wrap.dataset.layanan || '';
        const rating  = parseFloat(wrap.dataset.rating || 0);
        const st      = wrap.dataset.status || '';

        const matchKeyword  = !keyword || nama.includes(keyword);
        const matchNegara   = !negara  || neg === negara;
        const matchRating   = rating >= minRating;
        const matchStatus   = !status  || st === status;
        const matchLayanan  = checkedServices.length === 0 ||
            checkedServices.every(s => layanan.includes(s));

        const show = matchKeyword && matchNegara && matchRating && matchStatus && matchLayanan;
        wrap.style.display = show ? '' : 'none';
        if (show) visible.push(wrap);
    });

    // Sort
    const grid = document.getElementById('kating-grid');
    visible.sort((a, b) => {
        if (sort === 'rating') return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
        if (sort === 'job')    return parseInt(b.dataset.job) - parseInt(a.dataset.job);
        if (sort === 'nama')   return (a.dataset.nama || '').localeCompare(b.dataset.nama || '');
        return 0;
    });
    visible.forEach(el => grid.appendChild(el));

    document.getElementById('kating-count-display').innerHTML =
        `Menampilkan <strong>${visible.length}</strong> kating`;
}

function resetFilters() {
    document.getElementById('f-keyword').value = '';
    document.getElementById('f-negara').value = '';
    document.getElementById('f-rating').value = '0';
    document.getElementById('f-status').value = '';
    document.querySelectorAll('.filter-checkboxes input[type="checkbox"]').forEach(cb => cb.checked = false);
    applyFilters();
}

// Auto-select from URL param
const urlParams = new URLSearchParams(window.location.search);
const layananParam = urlParams.get('layanan');
if (layananParam) {
    const map = {'apartment-check':'Apartment Check','move-in-help':'Move-in Help','airport-pickup':'Airport Pickup'};
    const svcName = map[layananParam];
    if (svcName) {
        document.querySelectorAll('.filter-checkboxes input').forEach(cb => {
            if (cb.value === svcName) cb.checked = true;
        });
        applyFilters();
    }
}
</script>

@endsection
