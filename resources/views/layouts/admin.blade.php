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
            --sidebar-bg: #ffffff;
            --sidebar-hover: #f1f5f9;
            --sidebar-active: #4f46e5;
            --sidebar-text: #64748b;
            --sidebar-text-active: #1e293b;
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
            background: rgba(79,70,229,.08);
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
                link.style.color = '#4f46e5';
                link.style.fontWeight = '500';
            }
        });
    </script>
</body>

</html>