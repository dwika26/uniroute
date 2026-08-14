{{-- Komponen: Status Badge --}}
{{-- Props: $status (string), $size ('sm'|'md') --}}
@php
    $statusMap = [
        'menunggu'  => ['label' => 'Menunggu Konfirmasi', 'color' => '#ff9f67', 'bg' => 'rgba(255,159,103,0.1)', 'border' => 'rgba(255,159,103,0.25)', 'dot' => '#ff9f67'],
        'berjalan'  => ['label' => 'Sedang Berjalan',     'color' => '#6b8cff', 'bg' => 'rgba(107,140,255,0.1)', 'border' => 'rgba(107,140,255,0.25)', 'dot' => '#6b8cff'],
        'selesai'   => ['label' => 'Selesai',              'color' => '#5eead4', 'bg' => 'rgba(94,234,212,0.1)', 'border' => 'rgba(94,234,212,0.25)', 'dot' => '#5eead4'],
        'ditolak'   => ['label' => 'Ditolak',              'color' => '#ff6b6b', 'bg' => 'rgba(255,107,107,0.1)', 'border' => 'rgba(255,107,107,0.25)', 'dot' => '#ff6b6b'],
        'baru'      => ['label' => 'Baru',                 'color' => '#5eead4', 'bg' => 'rgba(94,234,212,0.1)', 'border' => 'rgba(94,234,212,0.25)', 'dot' => '#5eead4'],
        'diproses'  => ['label' => 'Diproses',             'color' => '#6b8cff', 'bg' => 'rgba(107,140,255,0.1)', 'border' => 'rgba(107,140,255,0.25)', 'dot' => '#6b8cff'],
        'aktif'     => ['label' => 'Aktif',                'color' => '#5eead4', 'bg' => 'rgba(94,234,212,0.1)', 'border' => 'rgba(94,234,212,0.25)', 'dot' => '#5eead4'],
    ];
    $s = $statusMap[$status ?? 'baru'] ?? $statusMap['baru'];
    $size = $size ?? 'md';
    $fontSize = $size === 'sm' ? '0.65rem' : '0.75rem';
    $padding = $size === 'sm' ? '0.15rem 0.45rem' : '0.25rem 0.7rem';
@endphp
<span class="status-badge"
      style="font-size:{{ $fontSize }};padding:{{ $padding }};color:{{ $s['color'] }};background:{{ $s['bg'] }};border:1px solid {{ $s['border'] }};border-radius:999px;font-weight:600;letter-spacing:0.04em;display:inline-flex;align-items:center;gap:0.3em;white-space:nowrap;">
    <span style="width:6px;height:6px;border-radius:50%;background:{{ $s['dot'] }};display:inline-block;{{ $status === 'berjalan' ? 'animation:pulse-dot 1.5s infinite;' : '' }}"></span>
    {{ $s['label'] }}
</span>
<style>
@keyframes pulse-dot { 0%,100%{opacity:1;} 50%{opacity:0.4;} }
</style>
