<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} Community</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        <style>
            :root {
                color-scheme: light;
                --primary-50: #f2f7ff;
                --primary-100: #e3efff;
                --primary-200: #c1dbff;
                --primary-400: #5d9dff;
                --primary-500: #3a7bff;
                --primary-600: #1f5fde;
                --ink-900: #0f1a3a;
                --ink-700: #1c2d54;
                --ink-500: #3f5177;
                --ink-300: #6f82aa;
                --surface: #ffffff;
                --muted: #f7f9fc;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: 'Inter', sans-serif;
                background: linear-gradient(180deg, var(--primary-50), #fafdff 45%, #ffffff 100%);
                color: var(--ink-700);
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            header {
                position: sticky;
                top: 0;
                z-index: 10;
                backdrop-filter: blur(24px);
                background: rgba(255, 255, 255, 0.85);
                border-bottom: 1px solid rgba(61, 116, 255, 0.08);
            }

            .container {
                width: min(1120px, 92vw);
                margin: 0 auto;
            }

            .nav-bar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px 0;
            }

            .nav-left,
            .nav-right {
                display: flex;
                align-items: center;
                gap: 24px;
            }

            .logo {
                display: flex;
                align-items: center;
                gap: 12px;
                font-weight: 600;
                color: var(--primary-600);
                font-size: 1.1rem;
            }

            .logo-badge {
                display: grid;
                place-items: center;
                width: 40px;
                height: 40px;
                background: radial-gradient(circle at 30% 30%, var(--primary-200), var(--primary-600));
                border-radius: 12px;
                color: white;
                font-weight: 700;
                letter-spacing: 0.04em;
            }

            .nav-link {
                font-weight: 500;
                font-size: 0.95rem;
                color: var(--ink-500);
                transition: color 0.2s ease;
            }

            .nav-link:hover {
                color: var(--primary-500);
            }

            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 10px 18px;
                border-radius: 999px;
                font-weight: 600;
                font-size: 0.95rem;
                transition: all 0.2s ease;
            }

            .btn-primary {
                background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
                color: white;
                box-shadow: 0 10px 24px rgba(36, 102, 255, 0.18);
            }

            .btn-primary:hover {
                transform: translateY(-1px);
                box-shadow: 0 14px 32px rgba(36, 102, 255, 0.25);
            }

            .btn-outline {
                border: 1px solid rgba(30, 70, 150, 0.18);
                color: var(--primary-600);
                background: rgba(255, 255, 255, 0.7);
            }

            .hero {
                padding: 88px 0 72px;
                text-align: center;
            }

            .hero-badge {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: rgba(89, 143, 255, 0.12);
                color: var(--primary-600);
                padding: 8px 16px;
                border-radius: 999px;
                font-weight: 600;
                font-size: 0.85rem;
                letter-spacing: 0.02em;
            }

            .hero h1 {
                margin: 18px auto 16px;
                max-width: 720px;
                font-size: clamp(2.4rem, 4vw + 1rem, 3.6rem);
                color: var(--ink-900);
                line-height: 1.15;
            }

            .hero p {
                margin: 0 auto;
                max-width: 600px;
                font-size: 1.05rem;
                color: var(--ink-500);
                line-height: 1.7;
            }

            .hero-actions {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 14px;
                margin-top: 32px;
            }

            .content {
                display: grid;
                gap: 48px;
                padding-bottom: 120px;
            }

            .section-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 24px;
            }

            .section-header h2 {
                margin: 0;
                font-size: 1.8rem;
                color: var(--ink-900);
            }

            .section-description {
                margin: 4px 0 0;
                color: var(--ink-500);
                font-size: 0.98rem;
            }

            .card-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
                gap: 24px;
            }

            .card {
                background: var(--surface);
                border-radius: 20px;
                padding: 26px;
                box-shadow: 0 18px 38px rgba(63, 104, 177, 0.08);
                border: 1px solid rgba(90, 140, 255, 0.08);
            }

            .card h3 {
                margin: 0;
                font-size: 1.2rem;
                color: var(--ink-900);
            }

            .card p {
                margin: 12px 0 0;
                color: var(--ink-500);
                line-height: 1.6;
                font-size: 0.95rem;
            }

            .tag-row {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                margin-top: 16px;
            }

            .tag {
                padding: 6px 14px;
                border-radius: 999px;
                background: rgba(66, 126, 255, 0.12);
                color: var(--primary-600);
                font-size: 0.85rem;
                font-weight: 600;
            }

            .post-card {
                display: flex;
                flex-direction: column;
                gap: 18px;
            }

            .post-meta {
                display: flex;
                align-items: center;
                gap: 12px;
                color: var(--ink-300);
                font-size: 0.88rem;
            }

            .post-meta span {
                display: inline-flex;
                align-items: center;
                gap: 6px;
            }

            .post-title {
                font-size: 1.15rem;
                font-weight: 600;
                color: var(--ink-900);
                margin: 0;
            }

            .post-actions {
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
            }

            .chip {
                padding: 8px 14px;
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.85);
                border: 1px solid rgba(74, 124, 255, 0.18);
                font-weight: 500;
                font-size: 0.85rem;
                color: var(--primary-600);
            }

            .community-stats {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 20px;
            }

            .stat-card {
                padding: 26px;
                border-radius: 20px;
                background: linear-gradient(160deg, rgba(90, 145, 255, 0.12), rgba(255, 255, 255, 0.9));
                border: 1px solid rgba(89, 143, 255, 0.16);
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .stat-value {
                font-size: 2rem;
                font-weight: 700;
                color: var(--primary-600);
            }

            .stat-label {
                color: var(--ink-500);
                font-size: 0.95rem;
            }

            .cta {
                position: relative;
                overflow: hidden;
                background: linear-gradient(120deg, rgba(93, 157, 255, 0.24), rgba(58, 123, 255, 0.62));
                border-radius: 26px;
                padding: 48px;
                color: white;
                display: grid;
                grid-template-columns: 1fr auto;
                gap: 40px;
                align-items: center;
            }

            .cta::after {
                content: "";
                position: absolute;
                inset: 0;
                background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.55), rgba(255, 255, 255, 0));
                opacity: 0.6;
            }

            .cta > * {
                position: relative;
                z-index: 1;
            }

            .cta h2 {
                margin: 0;
                font-size: 2rem;
                color: #f8fbff;
            }

            .cta p {
                margin: 12px 0 0;
                color: rgba(248, 251, 255, 0.85);
            }

            footer {
                padding: 48px 0;
                text-align: center;
                color: var(--ink-300);
                font-size: 0.9rem;
            }

            @media (max-width: 768px) {
                .nav-bar {
                    flex-direction: column;
                    gap: 18px;
                }

                .hero-actions {
                    flex-direction: column;
                }

                .section-header {
                    flex-direction: column;
                    gap: 12px;
                    text-align: center;
                }

                .cta {
                    grid-template-columns: 1fr;
                    text-align: center;
                }
            }
        </style>
    </head>
    <body>
        <header>
            <div class="container nav-bar">
                <div class="nav-left">
                    <a href="#" class="logo">
                        <span class="logo-badge">RD</span>
                        Red Delights
                    </a>
                    <a href="#topics" class="nav-link">Topik</a>
                    <a href="#trending" class="nav-link">Sedang Hangat</a>
                    <a href="#stats" class="nav-link">Statistik</a>
                    <a href="#join" class="nav-link">Bergabung</a>
                </div>
                <div class="nav-right">
                    <a href="#" class="nav-link">Masuk</a>
                    <a href="#" class="btn btn-primary">Daftar Gratis</a>
                </div>
            </div>
        </header>

        <main>
            <section class="hero">
                <div class="container">
                    <span class="hero-badge">✨ Komunitas diskusi modern</span>
                    <h1>Bangun diskusi bermakna dengan komunitas yang hangat dan inspiratif.</h1>
                    <p>
                        Red Delights adalah rumah bagi para kreator, pembelajar, dan penjelajah ide. Temukan komunitas yang relevan, diskusi yang sehat, dan insight yang bisa langsung dipraktikkan.
                    </p>
                    <div class="hero-actions">
                        <a href="#join" class="btn btn-primary">Mulai Bergabung</a>
                        <a href="#trending" class="btn btn-outline">Lihat Diskusi Populer</a>
                    </div>
                </div>
            </section>

            <section id="topics" class="container content">
                <div>
                    <div class="section-header">
                        <div>
                            <h2>Kategori Unggulan</h2>
                            <p class="section-description">Jelajahi ruang diskusi sesuai minatmu, mulai dari teknologi hingga gaya hidup.</p>
                        </div>
                        <a href="#" class="btn btn-outline">Telusuri semua</a>
                    </div>
                    <div class="card-grid">
                        <article class="card">
                            <h3>Teknologi & Start-up</h3>
                            <p>Kupas tuntas tren terbaru, rilis produk, hingga taktik membangun start-up yang berkelanjutan.</p>
                            <div class="tag-row">
                                <span class="tag">#buildinpublic</span>
                                <span class="tag">#ai</span>
                                <span class="tag">#saas</span>
                            </div>
                        </article>
                        <article class="card">
                            <h3>Karier & Produktivitas</h3>
                            <p>Tingkatkan kualitas kerja dengan teknik manajemen waktu, studi kasus karier, dan mentoring komunitas.</p>
                            <div class="tag-row">
                                <span class="tag">#remotework</span>
                                <span class="tag">#career</span>
                                <span class="tag">#deepwork</span>
                            </div>
                        </article>
                        <article class="card">
                            <h3>Kreasi & Hiburan</h3>
                            <p>Bagikan karya terbaikmu, temukan inspirasi, dan kolaborasi dengan kreator lain di seluruh Nusantara.</p>
                            <div class="tag-row">
                                <span class="tag">#design</span>
                                <span class="tag">#music</span>
                                <span class="tag">#film</span>
                            </div>
                        </article>
                    </div>
                </div>

                <div id="trending">
                    <div class="section-header">
                        <div>
                            <h2>Diskusi Terhangat</h2>
                            <p class="section-description">Ikuti percakapan aktif dengan komunitas yang suportif.</p>
                        </div>
                        <a href="#" class="btn btn-outline">Lihat lebih banyak</a>
                    </div>
                    <div class="card-grid">
                        <article class="card post-card">
                            <div class="post-meta">
                                <span>🔥 Tren Minggu Ini</span>
                                <span>·</span>
                                <span>4k anggota terlibat</span>
                            </div>
                            <h3 class="post-title">Bagaimana cara tim kecil merilis fitur AI dalam 2 minggu?</h3>
                            <p>Para founder membagikan proses mereka mengintegrasikan AI tanpa mengorbankan pengalaman pengguna.</p>
                            <div class="post-actions">
                                <span class="chip">+256 upvote</span>
                                <span class="chip">128 komentar</span>
                                <span class="chip">Simpan</span>
                            </div>
                        </article>
                        <article class="card post-card">
                            <div class="post-meta">
                                <span>💡 Tips Komunitas</span>
                                <span>·</span>
                                <span>Moderator pilihan</span>
                            </div>
                            <h3 class="post-title">Checklist rapat mingguan yang bikin tim remote makin solid</h3>
                            <p>Dari ritual on-boarding hingga retrospektif, cek template yang bisa langsung kamu adaptasi.</p>
                            <div class="post-actions">
                                <span class="chip">+189 upvote</span>
                                <span class="chip">76 komentar</span>
                                <span class="chip">Bagikan</span>
                            </div>
                        </article>
                        <article class="card post-card">
                            <div class="post-meta">
                                <span>🌱 Cerita Anggota</span>
                                <span>·</span>
                                <span>Community spotlight</span>
                            </div>
                            <h3 class="post-title">Dari hobi jadi profesi: perjalanan ilustrator digital</h3>
                            <p>Kenalan dengan Adira yang berhasil mengembangkan portofolio dari challenge komunitas.</p>
                            <div class="post-actions">
                                <span class="chip">+145 upvote</span>
                                <span class="chip">64 komentar</span>
                                <span class="chip">Ikuti kreator</span>
                            </div>
                        </article>
                    </div>
                </div>

                <div id="stats">
                    <div class="section-header">
                        <div>
                            <h2>Statistik Komunitas</h2>
                            <p class="section-description">Pertumbuhan sehat yang didukung anggota aktif setiap hari.</p>
                        </div>
                    </div>
                    <div class="community-stats">
                        <div class="stat-card">
                            <span class="stat-value">128K+</span>
                            <span class="stat-label">Anggota aktif bulanan dari 24 negara</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-value">8.4K</span>
                            <span class="stat-label">Diskusi baru setiap pekan dengan moderasi positif</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-value">92%</span>
                            <span class="stat-label">Anggota merasa mendapat insight bernilai setelah bergabung</span>
                        </div>
                    </div>
                </div>

                <div id="join" class="cta">
                    <div>
                        <h2>Siap jadi bagian dari Red Delights?</h2>
                        <p>Bergabung hanya dengan satu klik. Dapatkan akses eksklusif ke ruang diskusi premium, acara komunitas, dan newsletter mingguan.</p>
                    </div>
                    <a href="#" class="btn btn-primary">Daftar Sekarang</a>
                </div>
            </section>
        </main>

        <footer>
            <div class="container">
                © {{ date('Y') }} Red Delights Community. Dibangun dengan semangat kolaborasi.
            </div>
        </footer>
    </body>
</html>
