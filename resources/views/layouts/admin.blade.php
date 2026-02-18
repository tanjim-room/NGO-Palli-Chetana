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
    <title>AFADBD | Admin</title>
    <style>
        :root {
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 0px;
            --header-height: 60px;
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
            --sidebar-active: #4f46e5;
            --sidebar-text: #94a3b8;
            --sidebar-text-active: #ffffff;
            --body-bg: #f1f5f9;
            --card-shadow: 0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.06);
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
            scrollbar-color: #475569 transparent;
        }
        .admin-sidebar::-webkit-scrollbar { width: 5px; }
        .admin-sidebar::-webkit-scrollbar-thumb { background: #475569; border-radius: 10px; }

        .sidebar-brand {
            height: var(--header-height);
            display: flex; align-items: center;
            padding: 0 20px; gap: 12px;
            border-bottom: 1px solid rgba(255,255,255,.08);
            position: sticky; top: 0;
            background: var(--sidebar-bg);
            z-index: 2;
        }
        .sidebar-brand img { height: 36px; width: 36px; object-fit: contain; border-radius: 8px; }
        .sidebar-brand h5 { color: #fff; font-weight: 700; margin: 0; font-size: 1.1rem; letter-spacing: .5px; }

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
            color: var(--sidebar-text-active);
            background: rgba(79,70,229,.15);
            border-left-color: var(--sidebar-active);
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
            background: rgba(0,0,0,.12);
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
            background: #64748b;
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

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
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
    </style>
</head>

<body>
    <!-- Sidebar Overlay (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/application/'.application()->fav_icon) }}" alt="Logo">
            <h5>AFADBD</h5>
            <button class="btn-close btn-close-white ms-auto d-lg-none" id="sidebarClose" aria-label="Close"></button>
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
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-sliders"></i> <span>Slider</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('slider.add') }}" class="nav-link">Add Slider</a></li>
                        <li><a href="{{ route('slider.index') }}" class="nav-link">All Slider</a></li>
                    </ul>
                </li>
                <!-- Ongoing Project -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-kanban"></i> <span>Ongoing Project</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('project.add') }}" class="nav-link">Add Project</a></li>
                        <li><a href="{{ route('project.index') }}" class="nav-link">All Project</a></li>
                    </ul>
                </li>
                <!-- Latest News -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-newspaper"></i> <span>Latest News</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('news.add') }}" class="nav-link">Add News</a></li>
                        <li><a href="{{ route('news.index') }}" class="nav-link">All News</a></li>
                    </ul>
                </li>
                <!-- Photo Gallery -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-images"></i> <span>Photo Gallery</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('gallery.add') }}" class="nav-link">Add Photo</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="nav-link">All Photo</a></li>
                    </ul>
                </li>
                <!-- Subscribe -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-bell"></i> <span>Subscribe</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('subscribe.all') }}" class="nav-link">All Subscribe</a></li>
                    </ul>
                </li>

                <li class="nav-label">Finance & Donations</li>
                <!-- Donate Now -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-heart"></i> <span>Donate Now</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.payment_methods.add') }}" class="nav-link">Add Payment Method</a></li>
                        <li><a href="{{ route('admin.payment_methods.index') }}" class="nav-link">All Payment Methods</a></li>
                        <li><a href="{{ route('admin.donations.index') }}" class="nav-link">All Donations</a></li>
                    </ul>
                </li>
                <!-- Key Focus Area -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-bullseye"></i> <span>Key Focus Area</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.focus_areas.add') }}" class="nav-link">Add Focus Area</a></li>
                        <li><a href="{{ route('admin.focus_areas.index') }}" class="nav-link">All Focus Areas</a></li>
                    </ul>
                </li>

                <li class="nav-label">Organization</li>
                <!-- Application -->
                <li class="nav-item">
                    <a href="{{ route('logo.create') }}" class="nav-link">
                        <i class="bi bi-gear"></i> <span>Application</span>
                    </a>
                </li>
                <!-- About us -->
                <li class="nav-item">
                    <a href="{{ route('about.us.create') }}" class="nav-link">
                        <i class="bi bi-info-circle"></i> <span>About Us</span>
                    </a>
                </li>
                <!-- Mission Vision -->
                <li class="nav-item">
                    <a href="{{ route('mission.vision.create') }}" class="nav-link">
                        <i class="bi bi-stars"></i> <span>Mission Vision</span>
                    </a>
                </li>
                <!-- Origin & Legal Affilation -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-file-earmark-text"></i> <span>Origin & Legal Affilation</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('origin.legal_affilation.create') }}" class="nav-link">Add Affilation</a></li>
                        <li><a href="{{ route('origin.legal_affilation.index') }}" class="nav-link">All Affilation</a></li>
                    </ul>
                </li>

                <li class="nav-label">People & Teams</li>
                <!-- Executive Committee -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-person-badge"></i> <span>Executive Committee</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('executive.add') }}" class="nav-link">Add Member</a></li>
                        <li><a href="{{ route('executive.index') }}" class="nav-link">All Members</a></li>
                    </ul>
                </li>
                <!-- Team Members -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-people"></i> <span>Team Members</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('team.add') }}" class="nav-link">Add Member</a></li>
                        <li><a href="{{ route('team.index') }}" class="nav-link">All Members</a></li>
                    </ul>
                </li>
                <!-- Programs -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-briefcase"></i> <span>Programs</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('programs.add') }}" class="nav-link">Add Program</a></li>
                        <li><a href="{{ route('programs.index') }}" class="nav-link">All Programs</a></li>
                    </ul>
                </li>
                <!-- Impact Metrics -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-graph-up-arrow"></i> <span>Impact Metrics</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('impact.add') }}" class="nav-link">Add Impact</a></li>
                        <li><a href="{{ route('impact.index') }}" class="nav-link">All Impact</a></li>
                    </ul>
                </li>
                <!-- Success Stories -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-book-half"></i> <span>Success Stories</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('stories.add') }}" class="nav-link">Add Story</a></li>
                        <li><a href="{{ route('stories.index') }}" class="nav-link">All Stories</a></li>
                    </ul>
                </li>
                <!-- Chief Executive Message -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-chat-quote"></i> <span>Chief Executive Msg</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('chief.message.add') }}" class="nav-link">Add Message</a></li>
                        <li><a href="{{ route('chief.message.index') }}" class="nav-link">All Message</a></li>
                    </ul>
                </li>
                <!-- FAQ -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-question-circle"></i> <span>FAQ</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('faq.add') }}" class="nav-link">Add FAQ</a></li>
                        <li><a href="{{ route('faq.index') }}" class="nav-link">All FAQ</a></li>
                    </ul>
                </li>
                <!-- Volunteers -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-suit-heart"></i> <span>Volunteers</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('volunteers.add') }}" class="nav-link">Add Opportunity</a></li>
                        <li><a href="{{ route('volunteers.index') }}" class="nav-link">All Opportunities</a></li>
                    </ul>
                </li>

                <li class="nav-label">Communication</li>
                <!-- User Message -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-envelope"></i> <span>User Message</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('message.index') }}" class="nav-link">All Message</a></li>
                    </ul>
                </li>
                <!-- Partners & Donor -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-person-check"></i> <span>Partners & Donor</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('partner.create') }}" class="nav-link">Add Partners & Donor</a></li>
                        <li><a href="{{ route('partner.index') }}" class="nav-link">All Partners & Donor</a></li>
                    </ul>
                </li>

                <li class="nav-label">Documents & Archives</li>
                <!-- Project Archive -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-archive"></i> <span>Project Archive</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('project.archive.create') }}" class="nav-link">Add Project</a></li>
                        <li><a href="{{ route('project.archive.index') }}" class="nav-link">All Project</a></li>
                    </ul>
                </li>
                <!-- Strategic Plan -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-clipboard-data"></i> <span>Strategic Plan</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('strategic_plans.create') }}" class="nav-link">Add Strategic Plan</a></li>
                        <li><a href="{{ route('strategic_plans.index') }}" class="nav-link">All Strategic Plan</a></li>
                    </ul>
                </li>
                <!-- Policy and Guideline -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-file-earmark-ruled"></i> <span>Policy & Guideline</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('policy.create') }}" class="nav-link">Add Policy & Guideline</a></li>
                        <li><a href="{{ route('policy.index') }}" class="nav-link">All Policy & Guideline</a></li>
                    </ul>
                </li>
                <!-- Publication -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-journal-text"></i> <span>Publication</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('publications.add') }}" class="nav-link">Add Publication</a></li>
                        <li><a href="{{ route('publications.index') }}" class="nav-link">All Publications</a></li>
                    </ul>
                </li>
                <!-- Career -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-star"></i> <span>Career</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('invoked.create') }}" class="nav-link">Add Career</a></li>
                        <li><a href="{{ route('invoked.index') }}" class="nav-link">All Career</a></li>
                    </ul>
                </li>
                <!-- Contact -->
                <li class="nav-item">
                    <a href="#" class="nav-link sidebar-dropdown-toggle">
                        <i class="bi bi-telephone"></i> <span>Contact</span>
                        <i class="bi bi-chevron-right menu-arrow"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('contact.add') }}" class="nav-link">Add Contact</a></li>
                        <li><a href="{{ route('contact.index') }}" class="nav-link">All Contact</a></li>
                    </ul>
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
        <p class="mb-0">Copyright &copy; {{ @date('Y') }}. All rights reserved <strong>AFADBD</strong></p>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                link.style.color = '#fff';
                link.querySelector('::before') && (link.querySelector('::before').style.background = '#4f46e5');
            }
        });
    </script>
</body>

</html>