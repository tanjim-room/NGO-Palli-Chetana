<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/application/'.application()->fav_icon) }}" type="image/png" />
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Palli Chetana | Admin</title>
    <style>
        :root {
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 0px;
            --header-height: 60px;
            --primary-color: #2a8547;
            --primary-hover: #1f6b38;
            --primary-navy: #1b2a6b;
            --primary-red: #e53935;
            --sidebar-bg: #ffffff;
            --sidebar-hover: #f0faf3;
            --sidebar-active: #2a8547;
            --sidebar-text: #64748b;
            --sidebar-text-active: #1e293b;
            --body-bg: #f1f5f9;
            --card-shadow: 0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.06);
            --bs-primary: #2a8547;
            --bs-primary-rgb: 42,133,71;
            --bs-success: #2a8547;
            --bs-success-rgb: 42,133,71;
            --bs-info: #1b2a6b;
            --bs-info-rgb: 27,42,107;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg);
            overflow-x: hidden;
        }

        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0; left: 0; bottom: 0;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            z-index: 1040;
            transition: transform .3s ease;
            overflow-y: auto;
            overflow-x: hidden;
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 transparent;
            border-right: 1px solid #e2e8f0;
        }
        .admin-sidebar::-webkit-scrollbar { width: 5px; }
        .admin-sidebar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

        .sidebar-brand {
            height: var(--header-height);
            display: flex; align-items: center;
            padding: 0 20px; gap: 12px;
            border-bottom: 1px solid #e2e8f0;
            position: sticky; top: 0;
            background: var(--sidebar-bg);
            z-index: 2;
        }
        .sidebar-brand img { height: 36px; width: 36px; object-fit: contain; border-radius: 8px; }
        .sidebar-brand h5 { color: #1e293b; font-weight: 700; margin: 0; font-size: 1.1rem; letter-spacing: .5px; }

        .sidebar-nav { padding: 12px 0; }
        .sidebar-nav .nav-label {
            padding: 18px 20px 6px;
            font-size: .65rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #64748b;
            font-weight: 600;
        }

        .sidebar-nav .nav-item > .nav-link {
            display: flex; align-items: center; gap: 12px;
            padding: 9px 20px;
            color: var(--sidebar-text);
            font-size: .85rem; font-weight: 400;
            text-decoration: none;
            transition: all .2s;
            border-left: 3px solid transparent;
        }
        .sidebar-nav .nav-item > .nav-link:hover {
            color: var(--sidebar-text-active);
            background: var(--sidebar-hover);
        }
        .sidebar-nav .nav-item > .nav-link.active,
        .sidebar-nav .nav-item.menu-open > .nav-link {
            color: var(--primary-color);
            background: rgba(42,133,71,.08);
            border-left-color: var(--sidebar-active);
            font-weight: 500;
        }
        .sidebar-nav .nav-link .bi { font-size: 1.1rem; min-width: 20px; text-align: center; }
        .sidebar-nav .nav-link .menu-arrow {
            margin-left: auto;
            transition: transform .25s;
            font-size: .7rem;
        }
        .sidebar-nav .nav-item.menu-open > .nav-link .menu-arrow { transform: rotate(90deg); }

        .sidebar-nav .sub-menu {
            list-style: none; padding: 0; margin: 0;
            max-height: 0; overflow: hidden;
            transition: max-height .35s ease;
            background: #f8fafc;
        }
        .sidebar-nav .nav-item.menu-open > .sub-menu { max-height: 500px; }
        .sidebar-nav .sub-menu .nav-link {
            display: flex; align-items: center; gap: 10px;
            padding: 7px 20px 7px 55px;
            color: var(--sidebar-text);
            font-size: .8rem;
            text-decoration: none;
            transition: all .2s;
        }
        .sidebar-nav .sub-menu .nav-link:hover { color: var(--sidebar-text-active); }
        .sidebar-nav .sub-menu .nav-link::before {
            content: '';
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #cbd5e1;
            flex-shrink: 0;
            transition: background .2s;
        }
        .sidebar-nav .sub-menu .nav-link:hover::before { background: var(--sidebar-active); }

        /* Header */
        .admin-header {
            position: fixed; top: 0; right: 0;
            left: var(--sidebar-width);
            height: var(--header-height);
            background: #fff;
            z-index: 1030;
            border-bottom: 1px solid #e2e8f0;
            display: flex; align-items: center;
            padding: 0 24px;
            transition: left .3s ease;
            box-shadow: 0 1px 2px rgba(0,0,0,.04);
        }

        /* Main */
        .admin-main {
            margin-left: var(--sidebar-width);
            margin-top: var(--header-height);
            padding: 24px;
            min-height: calc(100vh - var(--header-height));
            transition: margin-left .3s ease;
        }

        /* Footer */
        .admin-footer {
            margin-left: var(--sidebar-width);
            padding: 16px 24px;
            background: #fff;
            border-top: 1px solid #e2e8f0;
            font-size: .8rem;
            color: #64748b;
            transition: margin-left .3s ease;
        }

        /* Mobile overlay */
        .sidebar-overlay {
            display: none; position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,.5);
            z-index: 1035;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .admin-sidebar { transform: translateX(-100%); }
            .admin-sidebar.show { transform: translateX(0); }
            .sidebar-overlay.show { display: block; }
            .admin-header { left: 0; }
            .admin-main { margin-left: 0; }
            .admin-footer { margin-left: 0; }
        }

        /* Cards & Components refinement */
        .card {
            border: none;
            box-shadow: var(--card-shadow);
            border-radius: .75rem;
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid #f1f5f9;
            font-weight: 600;
        }

        /* Toggler */
        .sidebar-toggler {
            background: none; border: none;
            font-size: 1.3rem; color: #475569;
            cursor: pointer; padding: 4px 8px;
            border-radius: .375rem;
        }
        .sidebar-toggler:hover { background: #f1f5f9; }

        /* User dropdown */
        .user-dropdown .dropdown-toggle::after { display: none; }
        .user-dropdown .user-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: var(--primary-color);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-weight: 600; font-size: .85rem;
        }

        /* Scrollbar for body */
        .admin-main::-webkit-scrollbar { width: 6px; }
        .admin-main::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

        /* Alert / Notification styling */
        .alert { border-radius: .5rem; border: none; }

        /* Bootstrap color overrides to match logo */
        .btn-primary { background-color: var(--primary-color) !important; border-color: var(--primary-color) !important; }
        .btn-primary:hover, .btn-primary:focus { background-color: var(--primary-hover) !important; border-color: var(--primary-hover) !important; }
        .btn-outline-primary { color: var(--primary-color) !important; border-color: var(--primary-color) !important; }
        .btn-outline-primary:hover { background-color: var(--primary-color) !important; color: #fff !important; }
        .bg-primary { background-color: var(--primary-color) !important; }
        .text-primary { color: var(--primary-color) !important; }
        .btn-success { background-color: var(--primary-color) !important; border-color: var(--primary-color) !important; }
        .btn-success:hover { background-color: var(--primary-hover) !important; border-color: var(--primary-hover) !important; }
        .bg-success { background-color: var(--primary-color) !important; }
        .text-success { color: var(--primary-color) !important; }
        .btn-info { background-color: var(--primary-navy) !important; border-color: var(--primary-navy) !important; color: #fff !important; }
        .btn-info:hover { background-color: #142050 !important; border-color: #142050 !important; color: #fff !important; }
        .bg-info { background-color: rgba(27,42,107,.12) !important; color: var(--primary-navy) !important; }
        .text-info { color: var(--primary-navy) !important; }
        .btn-danger { background-color: var(--primary-red) !important; border-color: var(--primary-red) !important; }
        .btn-danger:hover { background-color: #c62828 !important; border-color: #c62828 !important; }
        .text-danger { color: var(--primary-red) !important; }
        .badge.bg-info { background-color: rgba(27,42,107,.12) !important; color: var(--primary-navy) !important; }
        .badge.bg-primary { background-color: var(--primary-color) !important; color: #fff !important; }
        .badge.bg-success { background-color: var(--primary-color) !important; color: #fff !important; }

        /* Link color */
        a { color: var(--primary-color); }
        a:hover { color: var(--primary-hover); }

        /* Focus ring */
        .btn:focus, .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 .25rem rgba(42,133,71,.25) !important;
            border-color: var(--primary-color) !important;
        }
        .form-check-input:checked {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }

        /* ===== Enhanced Admin Form Styles ===== */

        /* Page heading redesign */
        .admin-main > .row > .col-xl-9 > h6.text-uppercase,
        .admin-main > .row > [class*='col-'] > h6.text-uppercase {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-navy);
            letter-spacing: 1px;
            position: relative;
            padding-bottom: 12px;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .admin-main > .row > .col-xl-9 > h6.text-uppercase::before,
        .admin-main > .row > [class*='col-'] > h6.text-uppercase::before {
            content: '';
            width: 4px;
            height: 24px;
            background: linear-gradient(180deg, var(--primary-color), var(--primary-navy));
            border-radius: 4px;
            flex-shrink: 0;
        }
        .admin-main > .row > .col-xl-9 > hr,
        .admin-main > .row > [class*='col-'] > hr {
            border: none;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-navy), transparent);
            opacity: .3;
            margin: 12px 0 20px;
        }

        /* Card redesign */
        .admin-main .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,.06), 0 0 0 1px rgba(0,0,0,.03);
            overflow: hidden;
            transition: box-shadow .3s ease;
        }
        .admin-main .card:hover {
            box-shadow: 0 8px 30px rgba(0,0,0,.08), 0 0 0 1px rgba(0,0,0,.04);
        }
        .admin-main .card > .card-body {
            padding: 0;
        }

        /* Remove the inner border box — make it seamless */
        .admin-main .card .p-4.border.rounded {
            border: none !important;
            border-radius: 0 !important;
            padding: 32px !important;
            position: relative;
        }
        .admin-main .card .p-4.border.rounded::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-navy), var(--primary-red));
        }

        /* Success alert redesign */
        .admin-main .alert-success {
            background: linear-gradient(135deg, #e8f5e9, #f1f8e9);
            color: #1b5e20;
            border: 1px solid rgba(42,133,71,.15);
            border-radius: 12px;
            padding: 14px 20px;
            font-weight: 500;
            font-size: .9rem;
            margin: 20px 32px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: alertSlideIn .4s ease;
        }
        .admin-main .alert-success::before {
            content: '\F26A';
            font-family: 'bootstrap-icons';
            font-size: 1.2rem;
            color: var(--primary-color);
        }
        @keyframes alertSlideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Form labels */
        .admin-main .form-label {
            font-weight: 600;
            font-size: .85rem;
            color: #334155;
            margin-bottom: 6px;
            letter-spacing: .2px;
            transition: color .3s;
        }
        .admin-main .form-label .text-danger {
            margin-left: 2px;
        }

        /* Form controls */
        .admin-main .form-control,
        .admin-main .form-select {
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            padding: 10px 16px;
            font-size: .9rem;
            background: #f8fafc;
            transition: all .25s ease;
            color: #1e293b;
        }
        .admin-main .form-control:hover,
        .admin-main .form-select:hover {
            border-color: #cbd5e1;
        }
        .admin-main .form-control:focus,
        .admin-main .form-select:focus {
            border-color: var(--primary-color) !important;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(42,133,71,.08) !important;
        }
        .admin-main .form-control::placeholder {
            color: #94a3b8;
        }
        .admin-main textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        /* File input (custom dropzone) */
        .admin-main .pch-file-wrapper {
            position: relative;
            border: 2px dashed #d1d5db;
            border-radius: 12px;
            padding: 28px 20px;
            text-align: center;
            background: #fafbfc;
            transition: all .3s ease;
            cursor: pointer;
        }
        .admin-main .pch-file-wrapper:hover,
        .admin-main .pch-file-wrapper.dragover {
            border-color: var(--primary-color);
            background: rgba(42,133,71,.03);
        }
        .admin-main .pch-file-wrapper .pch-file-icon {
            font-size: 2rem;
            color: #94a3b8;
            margin-bottom: 8px;
            transition: color .3s;
        }
        .admin-main .pch-file-wrapper:hover .pch-file-icon {
            color: var(--primary-color);
        }
        .admin-main .pch-file-wrapper .pch-file-text {
            font-size: .85rem;
            color: #64748b;
        }
        .admin-main .pch-file-wrapper .pch-file-text strong {
            color: var(--primary-color);
        }
        .admin-main .pch-file-wrapper input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            z-index: 2;
        }
        .admin-main .pch-file-wrapper .pch-file-name {
            font-size: .8rem;
            color: var(--primary-color);
            font-weight: 600;
            margin-top: 8px;
            display: none;
            word-break: break-all;
        }
        .admin-main .pch-file-wrapper .pch-file-name.show {
            display: block;
        }

        /* Image preview */
        .admin-main .pch-img-preview {
            margin-top: 12px;
            display: none;
            position: relative;
        }
        .admin-main .pch-img-preview.show {
            display: block;
            animation: previewFadeIn .4s ease;
        }
        .admin-main .pch-img-preview img {
            max-width: 200px;
            max-height: 120px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0,0,0,.08);
        }
        @keyframes previewFadeIn {
            from { opacity: 0; transform: scale(.9); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Image dimension hint */
        .admin-main .text-info {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: .78rem;
            font-weight: 500;
            background: rgba(27,42,107,.06);
            color: var(--primary-navy) !important;
            padding: 4px 10px;
            border-radius: 6px;
            margin-top: 8px;
        }

        /* Validation errors */
        .admin-main .text-danger:not(.form-label .text-danger) {
            font-size: .8rem;
            font-weight: 500;
            margin-top: 4px;
            animation: shakeError .4s ease;
        }
        @keyframes shakeError {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-3px); }
        }
        .admin-main .is-invalid {
            border-color: var(--primary-red) !important;
            box-shadow: 0 0 0 3px rgba(229,57,53,.1) !important;
        }

        /* Submit button redesign */
        .admin-main .card form > .col-12:last-child .btn-primary,
        .admin-main .pch-submit-btn {
            padding: 12px 36px;
            border-radius: 12px;
            font-weight: 600;
            font-size: .95rem;
            letter-spacing: .3px;
            background: linear-gradient(135deg, var(--primary-color), #1f7a3a) !important;
            border: none !important;
            box-shadow: 0 4px 14px rgba(42,133,71,.25);
            transition: all .3s ease;
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .admin-main .card form > .col-12:last-child .btn-primary:hover,
        .admin-main .pch-submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(42,133,71,.35);
        }
        .admin-main .card form > .col-12:last-child .btn-primary:active,
        .admin-main .pch-submit-btn:active {
            transform: translateY(0);
        }

        /* Form button group (submit + back) */
        .pch-btn-group {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            padding-top: 8px;
        }
        .pch-form-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 12px 28px;
            border-radius: 12px;
            font-size: .95rem;
            font-weight: 600;
            color: #475569;
            background: #f1f5f9;
            border: 2px solid #e2e8f0;
            text-decoration: none;
            transition: all .25s ease;
            cursor: pointer;
            letter-spacing: .3px;
        }
        .pch-form-back-btn:hover {
            color: var(--primary-navy);
            background: #e2e8f0;
            border-color: #cbd5e1;
            transform: translateX(-3px);
        }
        .pch-form-back-btn i {
            font-size: 1rem;
            transition: transform .25s;
        }
        .pch-form-back-btn:hover i {
            transform: translateX(-3px);
        }

        /* Loading spinner for submit */
        .admin-main .pch-btn-spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255,255,255,.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: pchSpin .6s linear infinite;
        }
        .admin-main .btn-primary.pch-loading .pch-btn-spinner { display: inline-block; }
        .admin-main .btn-primary.pch-loading .pch-btn-label { display: none; }
        @keyframes pchSpin {
            to { transform: rotate(360deg); }
        }

        /* Ripple effect */
        .pch-ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,.25);
            transform: scale(0);
            animation: pchRipple .5s linear;
            pointer-events: none;
        }
        @keyframes pchRipple {
            to { transform: scale(4); opacity: 0; }
        }

        /* Old image preview (edit pages) */
        .admin-main .card img[src*="images/"] {
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
            transition: transform .3s;
        }
        .admin-main .card img[src*="images/"]:hover {
            transform: scale(1.05);
        }

        /* Form row spacing */
        .admin-main .card form.row.g-3 > [class*='col-'] {
            margin-bottom: 4px;
        }

        /* Back button */
        .pch-page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }
        .pch-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 18px;
            border-radius: 10px;
            font-size: .85rem;
            font-weight: 600;
            color: var(--primary-navy);
            background: #fff;
            border: 2px solid #e2e8f0;
            text-decoration: none;
            transition: all .25s ease;
            white-space: nowrap;
            cursor: pointer;
        }
        .pch-back-btn:hover {
            color: #fff;
            background: var(--primary-navy);
            border-color: var(--primary-navy);
            transform: translateX(-3px);
            box-shadow: 0 4px 12px rgba(27,42,107,.2);
        }
        .pch-back-btn i {
            font-size: 1rem;
            transition: transform .25s;
        }
        .pch-back-btn:hover i {
            transform: translateX(-3px);
        }

        /* Responsive tweaks */
        @media (max-width: 768px) {
            .admin-main .card .p-4.border.rounded {
                padding: 20px !important;
            }
            .pch-back-btn {
                padding: 6px 14px;
                font-size: .8rem;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar Overlay (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/application/'.application()->fav_icon) }}" alt="Logo">
            <h5>Palli Chetana</h5>
            <button class="btn-close ms-auto d-lg-none" id="sidebarClose" aria-label="Close"></button>
        </div>
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-label">Main</li>
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
                        <i class="bi bi-house"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-label">Content Management</li>
                <!-- Slider -->
                <li class="nav-item">
                    <a href="{{ route('slider.index') }}" class="nav-link {{ request()->routeIs('slider.*') ? 'active' : '' }}">
                        <i class="bi bi-sliders"></i> <span>Slider</span>
                    </a>
                </li>
                <!-- Ongoing Project -->
                <li class="nav-item">
                    <a href="{{ route('project.index') }}" class="nav-link {{ request()->routeIs('project.index', 'project.add', 'project.edit') ? 'active' : '' }}">
                        <i class="bi bi-kanban"></i> <span>Ongoing Project</span>
                    </a>
                </li>
                <!-- Latest News -->
                <li class="nav-item">
                    <a href="{{ route('news.index') }}" class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}">
                        <i class="bi bi-newspaper"></i> <span>Latest News</span>
                    </a>
                </li>
                <!-- Photo Gallery -->
                <li class="nav-item">
                    <a href="{{ route('gallery.index') }}" class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}">
                        <i class="bi bi-images"></i> <span>Photo Gallery</span>
                    </a>
                </li>
                <!-- Subscribe -->
                <li class="nav-item">
                    <a href="{{ route('subscribe.all') }}" class="nav-link {{ request()->routeIs('subscribe.*') ? 'active' : '' }}">
                        <i class="bi bi-bell"></i> <span>Subscribe</span>
                    </a>
                </li>

                <li class="nav-label">Finance & Donations</li>
                <!-- Donate Now (dropdown kept - has 2 entity types) -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-heart"></i> <span>Donate Now</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.payment_methods.index') }}" class="nav-link">Payment Methods</a></li>
                        <li><a href="{{ route('admin.donations.index') }}" class="nav-link">Donations</a></li>
                    </ul>
                </li>
                <!-- Fundraising Campaigns -->
                <li class="nav-item">
                    <a href="{{ route('fundraising_campaigns.index') }}" class="nav-link {{ request()->routeIs('fundraising_campaigns.*') ? 'active' : '' }}">
                        <i class="bi bi-megaphone"></i> <span>Fundraising Campaigns</span>
                    </a>
                </li>
                <!-- Key Focus Area -->
                <li class="nav-item">
                    <a href="{{ route('admin.focus_areas.index') }}" class="nav-link {{ request()->routeIs('admin.focus_areas.*') ? 'active' : '' }}">
                        <i class="bi bi-bullseye"></i> <span>Key Focus Area</span>
                    </a>
                </li>

                <li class="nav-label">Organization</li>
                <!-- Application -->
                <li class="nav-item">
                    <a href="{{ route('logo.create') }}" class="nav-link {{ request()->routeIs('logo.*') ? 'active' : '' }}">
                        <i class="bi bi-gear"></i> <span>Application</span>
                    </a>
                </li>
                <!-- About us -->
                <li class="nav-item">
                    <a href="{{ route('about.us.create') }}" class="nav-link {{ request()->routeIs('about.us.*') ? 'active' : '' }}">
                        <i class="bi bi-info-circle"></i> <span>About Us</span>
                    </a>
                </li>
                <!-- Mission Vision -->
                <li class="nav-item">
                    <a href="{{ route('mission.vision.create') }}" class="nav-link {{ request()->routeIs('mission.vision.*') ? 'active' : '' }}">
                        <i class="bi bi-stars"></i> <span>Mission Vision</span>
                    </a>
                </li>
                <!-- Origin & Legal Affilation -->
                <li class="nav-item">
                    <a href="{{ route('origin.legal_affilation.index') }}" class="nav-link {{ request()->routeIs('origin.legal_affilation.*') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i> <span>Origin & Legal Affilation</span>
                    </a>
                </li>

                <li class="nav-label">People & Teams</li>
                <!-- Executive Committee -->
                <li class="nav-item">
                    <a href="{{ route('executive.index') }}" class="nav-link {{ request()->routeIs('executive.*') ? 'active' : '' }}">
                        <i class="bi bi-person-badge"></i> <span>Executive Committee</span>
                    </a>
                </li>
                <!-- Team Members -->
                <li class="nav-item">
                    <a href="{{ route('team.index') }}" class="nav-link {{ request()->routeIs('team.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i> <span>Team Members</span>
                    </a>
                </li>
                <!-- Programs -->
                <li class="nav-item">
                    <a href="{{ route('programs.index') }}" class="nav-link {{ request()->routeIs('programs.*') ? 'active' : '' }}">
                        <i class="bi bi-briefcase"></i> <span>Programs</span>
                    </a>
                </li>
                <!-- Impact Metrics -->
                <li class="nav-item">
                    <a href="{{ route('impact.index') }}" class="nav-link {{ request()->routeIs('impact.*') ? 'active' : '' }}">
                        <i class="bi bi-graph-up-arrow"></i> <span>Impact Metrics</span>
                    </a>
                </li>
                <!-- Success Stories -->
                <li class="nav-item">
                    <a href="{{ route('stories.index') }}" class="nav-link {{ request()->routeIs('stories.*') ? 'active' : '' }}">
                        <i class="bi bi-book-half"></i> <span>Success Stories</span>
                    </a>
                </li>
                <!-- Chief Executive Message -->
                <li class="nav-item">
                    <a href="{{ route('chief.message.index') }}" class="nav-link {{ request()->routeIs('chief.message.*') ? 'active' : '' }}">
                        <i class="bi bi-chat-quote"></i> <span>Chief Executive Msg</span>
                    </a>
                </li>
                <!-- FAQ -->
                <li class="nav-item">
                    <a href="{{ route('faq.index') }}" class="nav-link {{ request()->routeIs('faq.*') ? 'active' : '' }}">
                        <i class="bi bi-question-circle"></i> <span>FAQ</span>
                    </a>
                </li>
                <!-- Volunteers -->
                <li class="nav-item">
                    <a href="{{ route('volunteers.index') }}" class="nav-link {{ request()->routeIs('volunteers.*') ? 'active' : '' }}">
                        <i class="bi bi-suit-heart"></i> <span>Volunteers</span>
                    </a>
                </li>

                <li class="nav-label">Communication</li>
                <!-- User Message -->
                <li class="nav-item">
                    <a href="{{ route('message.index') }}" class="nav-link {{ request()->routeIs('message.*') ? 'active' : '' }}">
                        <i class="bi bi-envelope"></i> <span>User Message</span>
                    </a>
                </li>
                <!-- Partners & Donor -->
                <li class="nav-item">
                    <a href="{{ route('partner.index') }}" class="nav-link {{ request()->routeIs('partner.*') ? 'active' : '' }}">
                        <i class="bi bi-person-check"></i> <span>Partners & Donor</span>
                    </a>
                </li>

                <li class="nav-label">Documents & Archives</li>
                <!-- Project Archive -->
                <li class="nav-item">
                    <a href="{{ route('project.archive.index') }}" class="nav-link {{ request()->routeIs('project.archive.*') ? 'active' : '' }}">
                        <i class="bi bi-archive"></i> <span>Project Archive</span>
                    </a>
                </li>
                <!-- Strategic Plan -->
                <li class="nav-item">
                    <a href="{{ route('strategic_plans.index') }}" class="nav-link {{ request()->routeIs('strategic_plans.*') ? 'active' : '' }}">
                        <i class="bi bi-clipboard-data"></i> <span>Strategic Plan</span>
                    </a>
                </li>
                <!-- Policy and Guideline -->
                <li class="nav-item">
                    <a href="{{ route('policy.index') }}" class="nav-link {{ request()->routeIs('policy.*') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-ruled"></i> <span>Policy & Guideline</span>
                    </a>
                </li>
                <!-- Publication -->
                <li class="nav-item">
                    <a href="{{ route('publications.index') }}" class="nav-link {{ request()->routeIs('publications.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-text"></i> <span>Publication</span>
                    </a>
                </li>
                <!-- Career -->
                <li class="nav-item">
                    <a href="{{ route('invoked.index') }}" class="nav-link {{ request()->routeIs('invoked.*') ? 'active' : '' }}">
                        <i class="bi bi-star"></i> <span>Career</span>
                    </a>
                </li>
                <!-- Contact -->
                <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                        <i class="bi bi-telephone"></i> <span>Contact</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Header -->
    <header class="admin-header">
        <button class="sidebar-toggler d-lg-none" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </button>
        <button class="sidebar-toggler d-none d-lg-block" id="sidebarToggleDesktop">
            <i class="bi bi-list"></i>
        </button>

        <div class="d-flex align-items-center ms-auto gap-3">
            <!-- User Dropdown -->
            <div class="dropdown user-dropdown">
                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="d-none d-md-block">
                        <span class="fw-semibold text-dark" style="font-size:.85rem;">{{ Auth::user()->name }}</span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="admin-main">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="admin-footer">
        <p class="mb-0">Copyright &copy; {{ @date('Y') }}. All rights reserved <strong>Palli Chetana</strong></p>
    </footer>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <div class="d-flex align-items-center">
                        <div class="confirm-icon-wrapper bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                            <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 1.4rem;"></i>
                        </div>
                        <h5 class="modal-title fw-semibold mb-0" id="confirmModalLabel">Confirm Action</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-2 pb-1">
                    <p class="text-muted mb-0" id="confirmModalMessage">Are you sure you want to proceed?</p>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger px-4" id="confirmModalAction">
                        <i class="bi bi-trash me-1"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Interactive confirmation modal
        (function() {
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            const modalMessage = document.getElementById('confirmModalMessage');
            const modalAction = document.getElementById('confirmModalAction');
            const modalTitle = document.getElementById('confirmModalLabel');
            let pendingAction = null;

            document.addEventListener('click', function(e) {
                const trigger = e.target.closest('[data-confirm]');
                if (!trigger) return;
                e.preventDefault();

                const message = trigger.getAttribute('data-confirm');
                const actionType = trigger.getAttribute('data-confirm-type') || 'delete';
                const actionLabel = trigger.getAttribute('data-confirm-label') || 'Delete';

                modalMessage.textContent = message;

                // Style based on action type
                const btnClasses = {
                    'delete': 'btn-danger',
                    'verify': 'btn-success',
                    'reject': 'btn-warning'
                };
                const btnIcons = {
                    'delete': 'bi-trash',
                    'verify': 'bi-check-circle',
                    'reject': 'bi-x-circle'
                };
                const iconBg = {
                    'delete': 'bg-danger',
                    'verify': 'bg-success',
                    'reject': 'bg-warning'
                };
                const iconClass = {
                    'delete': 'text-danger',
                    'verify': 'text-success',
                    'reject': 'text-warning'
                };
                const titles = {
                    'delete': 'Confirm Delete',
                    'verify': 'Confirm Verification',
                    'reject': 'Confirm Rejection'
                };

                modalTitle.textContent = titles[actionType] || 'Confirm Action';
                modalAction.className = 'btn px-4 ' + (btnClasses[actionType] || 'btn-danger');
                modalAction.innerHTML = '<i class="bi ' + (btnIcons[actionType] || 'bi-check-lg') + ' me-1"></i> ' + actionLabel;

                const iconWrapper = document.querySelector('.confirm-icon-wrapper');
                iconWrapper.className = 'confirm-icon-wrapper bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3 ' + (iconBg[actionType] || 'bg-danger');
                iconWrapper.style.cssText = 'width: 48px; height: 48px;';
                iconWrapper.querySelector('i').className = 'bi ' + (btnIcons[actionType] || 'bi-exclamation-triangle-fill') + ' ' + (iconClass[actionType] || 'text-danger');
                iconWrapper.querySelector('i').style.fontSize = '1.4rem';

                // Determine action: form submit or link navigation
                const form = trigger.closest('form');
                if (trigger.tagName === 'BUTTON' && form) {
                    pendingAction = function() { form.submit(); };
                } else if (trigger.tagName === 'A' && trigger.href) {
                    pendingAction = function() { window.location.href = trigger.href; };
                }

                modal.show();
            });

            modalAction.addEventListener('click', function() {
                if (pendingAction) {
                    pendingAction();
                    pendingAction = null;
                }
                modal.hide();
            });
        })();
    </script>
    <script>
        // Sidebar dropdown toggle
        document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const parent = this.closest('.nav-item');
                // Close all other open menus
                document.querySelectorAll('.sidebar-nav .nav-item.menu-open').forEach(function(item) {
                    if (item !== parent) item.classList.remove('menu-open');
                });
                parent.classList.toggle('menu-open');
            });
        });

        // Mobile sidebar toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('adminSidebar').classList.toggle('show');
            document.getElementById('sidebarOverlay').classList.toggle('show');
        });

        // Close sidebar on overlay click
        document.getElementById('sidebarOverlay').addEventListener('click', function() {
            document.getElementById('adminSidebar').classList.remove('show');
            this.classList.remove('show');
        });

        // Close button inside sidebar (mobile)
        document.getElementById('sidebarClose').addEventListener('click', function() {
            document.getElementById('adminSidebar').classList.remove('show');
            document.getElementById('sidebarOverlay').classList.remove('show');
        });

        // Desktop sidebar toggle (collapse/expand)
        document.getElementById('sidebarToggleDesktop').addEventListener('click', function() {
            const sidebar = document.getElementById('adminSidebar');
            const header = document.querySelector('.admin-header');
            const main = document.querySelector('.admin-main');
            const footer = document.querySelector('.admin-footer');

            sidebar.classList.toggle('collapsed');
            if (sidebar.classList.contains('collapsed')) {
                sidebar.style.transform = 'translateX(-100%)';
                header.style.left = '0';
                main.style.marginLeft = '0';
                footer.style.marginLeft = '0';
            } else {
                sidebar.style.transform = 'translateX(0)';
                header.style.left = 'var(--sidebar-width)';
                main.style.marginLeft = 'var(--sidebar-width)';
                footer.style.marginLeft = 'var(--sidebar-width)';
            }
        });

        // Auto-open submenu based on current URL
        document.querySelectorAll('.sub-menu .nav-link').forEach(function(link) {
            if (link.href === window.location.href) {
                link.closest('.nav-item').classList.add('menu-open');
                link.style.color = '#2a8547';
                link.style.fontWeight = '500';
            }
        });
    </script>

    <script>
    (function() {
        'use strict';

        // ===== Enhanced File Upload with Drag & Drop + Preview =====
        document.querySelectorAll('.admin-main input[type="file"]').forEach(function(fileInput) {
            // Skip if already wrapped
            if (fileInput.closest('.pch-file-wrapper')) return;

            // Create wrapper
            var wrapper = document.createElement('div');
            wrapper.className = 'pch-file-wrapper';

            // Icon
            var icon = document.createElement('div');
            icon.className = 'pch-file-icon';
            icon.innerHTML = '<i class="bi bi-cloud-arrow-up"></i>';

            // Text
            var text = document.createElement('div');
            text.className = 'pch-file-text';
            text.innerHTML = '<strong>Click to upload</strong> or drag & drop<br><small>Supports images & documents</small>';

            // File name display
            var fileName = document.createElement('div');
            fileName.className = 'pch-file-name';

            // Image preview
            var preview = document.createElement('div');
            preview.className = 'pch-img-preview';
            var previewImg = document.createElement('img');
            previewImg.alt = 'Preview';
            preview.appendChild(previewImg);

            // Insert wrapper before file input
            fileInput.parentNode.insertBefore(wrapper, fileInput);
            wrapper.appendChild(icon);
            wrapper.appendChild(text);
            wrapper.appendChild(fileName);
            wrapper.appendChild(fileInput);

            // Add preview after wrapper
            wrapper.parentNode.insertBefore(preview, wrapper.nextSibling);

            // Drag & drop events
            ['dragenter', 'dragover'].forEach(function(evt) {
                wrapper.addEventListener(evt, function(e) {
                    e.preventDefault();
                    wrapper.classList.add('dragover');
                });
            });
            ['dragleave', 'drop'].forEach(function(evt) {
                wrapper.addEventListener(evt, function(e) {
                    e.preventDefault();
                    wrapper.classList.remove('dragover');
                });
            });

            // File change handler
            fileInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    var file = this.files[0];
                    fileName.textContent = file.name + ' (' + (file.size / 1024).toFixed(1) + ' KB)';
                    fileName.classList.add('show');

                    // Image preview
                    if (file.type.startsWith('image/')) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            previewImg.src = e.target.result;
                            preview.classList.add('show');
                        };
                        reader.readAsDataURL(file);
                    } else {
                        preview.classList.remove('show');
                    }
                } else {
                    fileName.classList.remove('show');
                    preview.classList.remove('show');
                }
            });
        });

        // ===== Submit Button Enhancement =====
        // Detect page type from heading
        var pageHeading = document.querySelector('.admin-main h6.text-uppercase');
        var pageText = pageHeading ? pageHeading.textContent.trim().toLowerCase() : '';
        var isEditPage = pageText.indexOf('edit') === 0 || pageText.indexOf('update') === 0;
        var isAddPage = pageText.indexOf('add') === 0 || pageText.indexOf('create') === 0;

        document.querySelectorAll('.admin-main .card form').forEach(function(form) {
            var btn = form.querySelector('button[type="submit"]');
            if (!btn) return;

            // Rename button based on page type
            var btnLabel = 'Submit';
            var btnIcon = 'bi-check-lg';
            if (isEditPage) {
                btnLabel = 'Update';
                btnIcon = 'bi-arrow-repeat';
            } else if (isAddPage) {
                btnLabel = 'Add';
                btnIcon = 'bi-plus-lg';
            }

            // Rebuild button HTML
            btn.innerHTML = '<span class="pch-btn-spinner"></span><span class="pch-btn-label"><i class="bi ' + btnIcon + '"></i> ' + btnLabel + '</span>';

            // Create button group wrapper with Back button
            var btnCol = btn.closest('.col-12');
            if (btnCol && (isAddPage || isEditPage)) {
                var group = document.createElement('div');
                group.className = 'pch-btn-group';
                btnCol.innerHTML = '';
                group.appendChild(btn);

                var backBtn = document.createElement('a');
                backBtn.className = 'pch-form-back-btn';
                backBtn.href = 'javascript:void(0)';
                backBtn.onclick = function() { window.history.back(); };
                backBtn.innerHTML = '<i class="bi bi-arrow-left"></i> Back';
                group.appendChild(backBtn);

                btnCol.appendChild(group);
            }

            // Ripple effect
            btn.addEventListener('mousedown', function(e) {
                var ripple = document.createElement('span');
                ripple.className = 'pch-ripple';
                var rect = btn.getBoundingClientRect();
                var size = Math.max(rect.width, rect.height);
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = (e.clientX - rect.left - size/2) + 'px';
                ripple.style.top = (e.clientY - rect.top - size/2) + 'px';
                btn.appendChild(ripple);
                setTimeout(function() { ripple.remove(); }, 500);
            });

            // Loading on submit
            form.addEventListener('submit', function() {
                btn.classList.add('pch-loading');
                btn.disabled = true;
            });
        });

        // ===== Auto-dismiss success alerts =====
        document.querySelectorAll('.admin-main .alert-success').forEach(function(alert) {
            setTimeout(function() {
                alert.style.transition = 'opacity .5s, transform .5s';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-10px)';
                setTimeout(function() { alert.remove(); }, 500);
            }, 5000);
        });

        // ===== Auto-inject Back Button on Add/Edit pages =====
        document.querySelectorAll('.admin-main h6.text-uppercase').forEach(function(heading) {
            var text = heading.textContent.trim().toLowerCase();
            if (text.indexOf('add') === 0 || text.indexOf('edit') === 0 || text.indexOf('update') === 0 || text.indexOf('create') === 0) {
                // Wrap heading + button in a flex row
                var wrapper = document.createElement('div');
                wrapper.className = 'pch-page-header';
                heading.parentNode.insertBefore(wrapper, heading);
                wrapper.appendChild(heading);

                var backBtn = document.createElement('a');
                backBtn.className = 'pch-back-btn';
                backBtn.href = 'javascript:void(0)';
                backBtn.onclick = function() { window.history.back(); };
                backBtn.innerHTML = '<i class="bi bi-arrow-left"></i> Back';
                wrapper.appendChild(backBtn);
            }
        });

        // ===== Input focus label coloring =====
        document.querySelectorAll('.admin-main .form-control, .admin-main .form-select').forEach(function(input) {
            input.addEventListener('focus', function() {
                var label = this.closest('[class*="col-"]');
                if (label) {
                    var lbl = label.querySelector('.form-label');
                    if (lbl) lbl.style.color = '#2a8547';
                }
            });
            input.addEventListener('blur', function() {
                var label = this.closest('[class*="col-"]');
                if (label) {
                    var lbl = label.querySelector('.form-label');
                    if (lbl) lbl.style.color = '#334155';
                }
            });
        });
    })();
    </script>
</body>

</html>