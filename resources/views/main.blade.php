<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Palli Chetana') | Palli Chetana</title>
    <link rel="shortcut icon" href="{{ asset('images/application/'.application()->fav_icon) }}" type="image/x-icon">

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --pc-primary: #2a8547;
            --pc-primary-dark: #1f6b38;
            --pc-primary-light: #e8f5e9;
            --pc-secondary: #1b2a6b;
            --pc-accent: #e53935;
            --pc-dark: #0f172a;
            --pc-dark-light: #1e293b;
            --pc-gray: #64748b;
            --pc-gray-light: #f1f5f9;
            --pc-body: #ffffff;
            --pc-text: #334155;
            --pc-gradient: linear-gradient(135deg, #2a8547, #1b2a6b);
            --pc-gradient-warm: linear-gradient(135deg, #e53935, #ff6b35);
            --pc-shadow: 0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -2px rgba(0,0,0,.1);
            --pc-shadow-lg: 0 10px 15px -3px rgba(0,0,0,.1), 0 4px 6px -4px rgba(0,0,0,.1);
            --pc-shadow-xl: 0 20px 25px -5px rgba(0,0,0,.1), 0 8px 10px -6px rgba(0,0,0,.1);
            --pc-radius: 12px;
            --pc-radius-lg: 20px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            top: 0 !important;
            position: static !important;
        }
        body {
            font-family: 'Inter', sans-serif;
            color: var(--pc-text);
            background: var(--pc-body);
            overflow-x: hidden;
        }
        /* Hide Google Translate / browser extension top bars */
        .goog-te-banner-frame,
        .skiptranslate,
        iframe.skiptranslate,
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
            height: 0 !important;
            visibility: hidden !important;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            color: var(--pc-dark);
        }
        a { text-decoration: none; transition: all .3s ease; }
        ul { list-style: none; padding: 0; margin: 0; }
        img { max-width: 100%; }

        /* Buttons */
        .btn-pc-primary {
            background: var(--pc-primary);
            color: #fff;
            border: none;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 600;
            font-size: .95rem;
            transition: all .3s ease;
            box-shadow: 0 4px 14px rgba(42,133,71,.3);
        }
        .btn-pc-primary:hover {
            background: var(--pc-primary-dark);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(42,133,71,.4);
        }
        .btn-pc-outline {
            background: transparent;
            color: var(--pc-primary);
            border: 2px solid var(--pc-primary);
            padding: 10px 26px;
            border-radius: 50px;
            font-weight: 600;
            font-size: .95rem;
            transition: all .3s ease;
        }
        .btn-pc-outline:hover {
            background: var(--pc-primary);
            color: #fff;
            transform: translateY(-2px);
        }
        .btn-pc-accent {
            background: var(--pc-accent);
            color: #fff;
            border: none;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 600;
            transition: all .3s ease;
            box-shadow: 0 4px 14px rgba(229,57,53,.3);
        }
        .btn-pc-accent:hover {
            background: #c62828;
            color: #fff;
            transform: translateY(-2px);
        }
        .btn-pc-white {
            background: #fff;
            color: var(--pc-primary);
            border: none;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 600;
            transition: all .3s ease;
        }
        .btn-pc-white:hover {
            background: var(--pc-primary-light);
            transform: translateY(-2px);
        }

        /* Section styles */
        .pc-section { padding: 80px 0; }
        .pc-section-sm { padding: 50px 0; }
        .pc-section-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: .5rem;
        }
        .pc-section-subtitle {
            color: var(--pc-gray);
            font-size: 1.05rem;
            max-width: 600px;
            margin: 0 auto 2.5rem;
        }
        .pc-badge {
            display: inline-block;
            background: var(--pc-primary-light);
            color: var(--pc-primary);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: .85rem;
            font-weight: 600;
            margin-bottom: .75rem;
            letter-spacing: .5px;
        }

        /* Card styles */
        .pc-card {
            background: #fff;
            border-radius: var(--pc-radius);
            overflow: hidden;
            box-shadow: var(--pc-shadow);
            transition: all .3s ease;
            border: 1px solid rgba(0,0,0,.05);
            height: 100%;
        }
        .pc-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--pc-shadow-xl);
        }
        .pc-card .card-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
        .pc-card .card-body {
            padding: 1.5rem;
        }
        .pc-card .card-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.15rem;
            color: var(--pc-dark);
            margin-bottom: .5rem;
        }
        .pc-card .card-text {
            color: var(--pc-gray);
            font-size: .92rem;
            line-height: 1.6;
        }
        .pc-card .card-link {
            color: var(--pc-primary);
            font-weight: 600;
            font-size: .9rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .pc-card .card-link:hover { gap: 10px; }
        .pc-card .card-link i { transition: transform .3s; }
        .pc-card .card-link:hover i { transform: translateX(4px); }

        /* Page Header / Breadcrumb */
        .pc-page-header {
            background: linear-gradient(135deg, #1b2a6b 0%, #2a8547 100%);
            padding: 60px 0 50px;
            position: relative;
            overflow: hidden;
        }
        .pc-page-header-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(15,23,42,.25);
            z-index: 1;
        }
        .pc-page-header::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -5%;
            width: 350px;
            height: 350px;
            background: rgba(255,255,255,.08);
            border-radius: 50%;
            z-index: 1;
        }
        .pc-page-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,.06);
            border-radius: 50%;
            z-index: 1;
        }
        .pc-page-header h1 {
            color: #fff;
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: .5rem;
        }
        .pc-page-header .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
        }
        .pc-page-header .breadcrumb-item a {
            color: rgba(255,255,255,.7);
        }
        .pc-page-header .breadcrumb-item a:hover { color: #fff; }
        .pc-page-header .breadcrumb-item.active { color: var(--pc-primary-light); }
        .pc-page-header .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255,255,255,.4);
        }

        /* Back to top */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--pc-primary);
            color: #fff;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: var(--pc-shadow-lg);
            opacity: 0;
            visibility: hidden;
            transition: all .3s ease;
            z-index: 999;
            cursor: pointer;
        }
        .back-to-top.show { opacity: 1; visibility: visible; }
        .back-to-top:hover {
            background: var(--pc-primary-dark);
            transform: translateY(-3px);
        }

        /* Responsive tweaks */
        @media (max-width: 768px) {
            .pc-section { padding: 50px 0; }
            .pc-section-title { font-size: 1.75rem; }
            .pc-page-header { padding: 40px 0 30px; }
            .pc-page-header h1 { font-size: 1.5rem; }
        }
    </style>
    @stack('css')
</head>
<body>
    @include('header')

    <main>
        @yield('content')
    </main>

    @include('footer')

    <!-- Back to Top -->
    <button class="back-to-top" id="backToTop" onclick="window.scrollTo({top:0,behavior:'smooth'})">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Bootstrap 5.3.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 700, once: true, offset: 80 });

        // Remove any top offset added by browser extensions (e.g. Google Translate)
        function resetBodyPosition() {
            document.body.style.top = '0px';
            document.body.style.position = 'static';
            document.documentElement.style.top = '0px';
            var frame = document.querySelector('.goog-te-banner-frame');
            if (frame) frame.style.display = 'none';
        }
        resetBodyPosition();
        window.addEventListener('load', resetBodyPosition);
        new MutationObserver(resetBodyPosition).observe(document.body, { attributes: true, attributeFilter: ['style', 'class'] });

        // Back to top
        window.addEventListener('scroll', function() {
            const btn = document.getElementById('backToTop');
            if (window.scrollY > 400) btn.classList.add('show');
            else btn.classList.remove('show');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('.pc-navbar');
            if (nav) {
                nav.classList.toggle('scrolled', window.scrollY > 50);
            }
        });
    </script>
    @stack('js')
</body>
</html>
