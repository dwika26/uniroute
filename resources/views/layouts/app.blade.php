<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="UniRoute — mendampingi mahasiswa Indonesia dari LoA hingga menetap di negara tujuan.">
    <title>@yield('title', 'UniRoute') — Dari Penerimaan Hingga Keberangkatan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @php
        $cssFile = 'build/assets/app-749JKdfD.css';
        $cssPath = public_path($cssFile);
        if (!file_exists($cssPath)) {
            $cssPath = base_path('../public_html/' . $cssFile);
        }
    @endphp
    @if(file_exists($cssPath))
        <style>{!! file_get_contents($cssPath) !!}</style>
    @else
        <link rel="stylesheet" href="{{ asset($cssFile) }}">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* ─── Navbar ─── */
        .navbar {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(20px);
            border: 1.5px solid var(--color-ur-border);
            border-radius: 999px;
            position: sticky;
            top: 1rem;
            z-index: 100;
            margin: 1rem auto 0;
            max-width: 1280px;
            width: calc(100% - 2rem);
            box-shadow: 0 8px 30px rgba(44, 74, 62, 0.04);
        }

        .nav-inner {
            max-width: 100%;
            margin: 0;
            padding: 0 1.5rem;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1.375rem;
            letter-spacing: -0.02em;
            color: var(--color-ur-white);
            text-decoration: none;
        }

        .logo-dot {
            color: var(--color-ur-mint);
        }

        .logo-icon {
            width: 34px;
            height: 34px;
            background: linear-gradient(135deg, var(--color-ur-mint-dark), var(--color-ur-blue));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            display: block;
            padding: 0.45rem 1rem;
            border-radius: 999px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--color-ur-gray);
            transition: color 0.18s, background 0.18s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--color-ur-mint-dark);
            background: var(--color-ur-navy-2);
        }

        /* ─── Role Switcher ─── */
        .role-switcher {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .role-badge {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 0.3rem 0.8rem;
            border-radius: 999px;
            background: rgba(44, 74, 62, 0.08);
            color: var(--color-ur-mint);
            border: 1px solid rgba(44, 74, 62, 0.15);
        }

        .role-select {
            background: var(--color-ur-navy-3);
            border: 1.5px solid var(--color-ur-border);
            border-radius: 999px;
            color: var(--color-ur-white);
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.35rem 2rem 0.35rem 1rem;
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%232c4a3e' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            transition: border-color 0.2s;
            width: auto;
        }

        .role-select:focus {
            border-color: var(--color-ur-purple);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
        }

        /* ─── Mobile Menu ─── */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--color-ur-gray);
            padding: 0.25rem;
        }

        .mobile-menu {
            display: none;
            background: rgba(255, 255, 255, 0.98);
            border-top: 1px solid var(--color-ur-border);
            padding: 1rem 1.25rem;
        }

        .mobile-menu.open {
            display: block;
        }

        .mobile-menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .mobile-menu ul li a {
            display: block;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--color-ur-border);
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--color-ur-gray);
            transition: color 0.18s;
        }

        .mobile-menu ul li a:hover {
            color: var(--color-ur-white);
        }

        /* ─── Main layout ─── */
        .page-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1.25rem;
            min-height: calc(100vh - 64px);
        }

        /* ─── Footer ─── */
        .site-footer {
            background: var(--color-ur-navy-2);
            border-top: 1px solid var(--color-ur-border);
            padding: 2.5rem 1.25rem;
            text-align: center;
            color: var(--color-ur-gray);
            font-size: 0.85rem;
        }

        .site-footer .footer-logo {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--color-ur-purple);
            margin-bottom: 0.5rem;
        }

        /* ─── Responsive ─── */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }
        }
    </style>
</head>

<body>

    <!-- ─── Navbar ─── -->
    <nav class="navbar" id="main-navbar">
        <div class="nav-inner">
            <a href="/" class="logo" id="nav-logo">
                <img src="/images/logo.png" alt="UniRoute Logo"
                    style="height: 38px; width: auto; object-fit: contain; border-radius: 8px;">
                Uni<span class="logo-dot">Route</span>
            </a>

            <ul class="nav-links" id="desktop-nav">
                @if(request()->is('kating*'))
                    <li><a href="/kating/dashboard" id="nav-kating-dash" class="{{ request()->is('kating/dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    <li><a href="/kating/permintaan" id="nav-kating-permintaan" class="{{ request()->is('kating/permintaan') ? 'active' : '' }}">Permintaan</a></li>
                    <li><a href="/kating/aktif" id="nav-kating-aktif" class="{{ request()->is('kating/aktif') ? 'active' : '' }}">Job Aktif</a></li>
                    <li><a href="/kating/riwayat" id="nav-kating-riwayat" class="{{ request()->is('kating/riwayat') ? 'active' : '' }}">Riwayat & Komisi</a></li>
                    <li><a href="/chat" id="nav-kating-chat" class="{{ request()->is('chat') ? 'active' : '' }}">Chat</a></li>
                    <li><a href="/kating/profil" id="nav-kating-profil" class="{{ request()->is('kating/profil') ? 'active' : '' }}">Profil Saya</a></li>
                @elseif(request()->is('admin*'))
                    <li><a href="/admin/dashboard" id="nav-admin-dash" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    <li><a href="/admin/approval" id="nav-admin-approval" class="{{ request()->is('admin/approval') ? 'active' : '' }}">Approval Kating</a></li>
                    <li><a href="/admin/antrian" id="nav-admin-antrian" class="{{ request()->is('admin/antrian') ? 'active' : '' }}">Antrian Job</a></li>
                    <li><a href="/admin/moderasi" id="nav-admin-moderasi" class="{{ request()->is('admin/moderasi') ? 'active' : '' }}">Moderasi Laporan</a></li>
                    <li><a href="/admin/support" id="nav-admin-support" class="{{ request()->is('admin/support') ? 'active' : '' }}">Support Ticket</a></li>
                    <li><a href="/admin/log-chat" id="nav-admin-log" class="{{ request()->is('admin/log-chat') ? 'active' : '' }}">Log Chat</a></li>
                @else
                    <li><a href="/" id="nav-home" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
                    <li><a href="/browse-kampus" id="nav-kampus" class="{{ request()->is('browse-kampus') ? 'active' : '' }}">Kampus</a></li>
                    <li><a href="/browse-kating" id="nav-kating" class="{{ request()->is('browse-kating') ? 'active' : '' }}">Kating</a></li>
                    <li><a href="/permintaan-saya" id="nav-permintaan" class="{{ request()->is('permintaan-saya') ? 'active' : '' }}">Permintaan</a></li>
                    <li><a href="/chat" id="nav-chat" class="{{ request()->is('chat') ? 'active' : '' }}">Chat</a></li>
                    <li><a href="/admin-help" id="nav-help" class="{{ request()->is('admin-help') ? 'active' : '' }}">Bantuan</a></li>
                @endif
            </ul>

            <div class="role-switcher">
                <span class="role-badge" id="current-role-badge">
                    @if(request()->is('kating*')) Kating
                    @elseif(request()->is('admin*')) Admin
                    @else Klien
                    @endif
                </span>
                <select class="role-select" id="role-switcher-select" onchange="switchRole(this.value)">
                    <option value="klien" {{ !request()->is('kating*') && !request()->is('admin*') ? 'selected' : '' }}>👤 Klien</option>
                    <option value="kating" {{ request()->is('kating*') ? 'selected' : '' }}>🎓 Kating</option>
                    <option value="admin" {{ request()->is('admin*') ? 'selected' : '' }}>🛡 Admin</option>
                </select>
            </div>

            <button class="mobile-menu-btn" id="mobile-menu-toggle" onclick="toggleMobileMenu()" aria-label="Buka menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="3" y1="6" x2="21" y2="6" />
                    <line x1="3" y1="12" x2="21" y2="12" />
                    <line x1="3" y1="18" x2="21" y2="18" />
                </svg>
            </button>
        </div>

        <div class="mobile-menu" id="mobile-menu">
            <ul>
                @if(request()->is('kating*'))
                    <li><a href="/kating/dashboard">Dashboard Kating</a></li>
                    <li><a href="/kating/permintaan">Permintaan Masuk</a></li>
                    <li><a href="/kating/aktif">Job Aktif</a></li>
                    <li><a href="/kating/riwayat">Riwayat & Komisi</a></li>
                    <li><a href="/chat">Chat</a></li>
                    <li><a href="/kating/profil">Profil Saya</a></li>
                @elseif(request()->is('admin*'))
                    <li><a href="/admin/dashboard">Dashboard Admin</a></li>
                    <li><a href="/admin/approval">Approval Kating</a></li>
                    <li><a href="/admin/antrian">Antrian Job</a></li>
                    <li><a href="/admin/moderasi">Moderasi Laporan</a></li>
                    <li><a href="/admin/support">Support Ticket</a></li>
                    <li><a href="/admin/log-chat">Log Chat</a></li>
                @else
                    <li><a href="/" id="mob-nav-home">Beranda</a></li>
                    <li><a href="/browse-kampus" id="mob-nav-kampus">Kampus</a></li>
                    <li><a href="/browse-kating" id="mob-nav-kating">Kating</a></li>
                    <li><a href="/permintaan-saya" id="mob-nav-permintaan">Permintaan Saya</a></li>
                    <li><a href="/chat" id="mob-nav-chat">Chat Kating</a></li>
                    <li><a href="/admin-help" id="mob-nav-help">Admin Help</a></li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- ─── Page Content ─── -->
    <main class="page-content" id="main-content">
        @yield('content')
    </main>

    <!-- ─── Footer ─── -->
    <footer class="site-footer" id="site-footer">
        <div class="footer-logo">UniRoute</div>
        <p>Dari Penerimaan Hingga Keberangkatan, Kami Siap Mendampingi Anda.</p>
        <p style="margin-top:0.5rem;">© 2026 UniRoute — Universitas Pendidikan Ganesha</p>
    </footer>

    <script>
        // ─── Role Switcher ───
        const roleNavLinks = {
            klien: ['/', '/browse-kampus', '/browse-kating', '/permintaan-saya', '/chat', '/admin-help'],
            kating: ['/kating/dashboard', '/kating/permintaan', '/kating/aktif', '/kating/riwayat', '/kating/chat'],
            admin: ['/admin/dashboard', '/admin/approval', '/admin/antrian', '/admin/moderasi', '/admin/support']
        };
        const roleLabels = { klien: 'Klien', kating: 'Kating', admin: 'Admin' };
        const roleColors = { klien: '#0f766e', kating: '#2563eb', admin: '#ea580c' };

        function switchRole(role) {
            localStorage.setItem('ur_role', role);
            const badge = document.getElementById('current-role-badge');
            if (badge) {
                badge.textContent = roleLabels[role];
                badge.style.color = roleColors[role];
                badge.style.background = roleColors[role] + '1a';
                badge.style.borderColor = roleColors[role] + '40';
            }
            const destinations = { klien: '/', kating: '/kating/dashboard', admin: '/admin/dashboard' };
            window.location.href = destinations[role];
        }

        // Determine active role from current URL path
        const path = window.location.pathname;
        let activeRole = 'klien';
        if (path.startsWith('/kating')) {
            activeRole = 'kating';
        } else if (path.startsWith('/admin')) {
            activeRole = 'admin';
        }

        localStorage.setItem('ur_role', activeRole);
        const sel = document.getElementById('role-switcher-select');
        if (sel) sel.value = activeRole;
        const badge = document.getElementById('current-role-badge');
        if (badge) {
            badge.textContent = roleLabels[activeRole];
            badge.style.color = roleColors[activeRole];
            badge.style.background = roleColors[activeRole] + '1a';
            badge.style.borderColor = roleColors[activeRole] + '40';
        }

        // ─── Mobile Menu ───
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('open');
        }

        // ─── Smooth fade-in on load ───
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('main-content').style.opacity = '0';
            document.getElementById('main-content').style.transform = 'translateY(8px)';
            document.getElementById('main-content').style.transition = 'opacity 0.4s ease, transform 0.4s ease';
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    document.getElementById('main-content').style.opacity = '1';
                    document.getElementById('main-content').style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>

</html>