<!-- Top Bar -->
<div class="pc-topbar d-none d-lg-block" style="background: var(--pc-dark); padding: 8px 0; font-size: .85rem; margin-top: -24px;">
    @php
        $topbarContact = topbar_contact();
        $app = application();
    @endphp
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-4 text-white text-opacity-75">
            @if($topbarContact && $topbarContact->mobile)
            <span><i class="bi bi-telephone-fill me-1" style="color:#2a8547;"></i>{{ $topbarContact->mobile }}</span>
            @endif
            @if($topbarContact && $topbarContact->email)
            <span><i class="bi bi-envelope-fill me-1" style="color:#2a8547;"></i>{{ $topbarContact->email }}</span>
            @endif
        </div>
        <div class="d-flex align-items-center gap-3">
            @if($app && $app->facebook)
            <a href="{{ $app->facebook }}" target="_blank" class="text-white text-opacity-75" style="font-size:1rem;"><i class="bi bi-facebook"></i></a>
            @endif
            @if($app && $app->twitter)
            <a href="{{ $app->twitter }}" target="_blank" class="text-white text-opacity-75" style="font-size:1rem;"><i class="bi bi-twitter-x"></i></a>
            @endif
            @if($app && $app->instagram)
            <a href="{{ $app->instagram }}" target="_blank" class="text-white text-opacity-75" style="font-size:1rem;"><i class="bi bi-instagram"></i></a>
            @endif
            @if($app && $app->youtube)
            <a href="{{ $app->youtube }}" target="_blank" class="text-white text-opacity-75" style="font-size:1rem;"><i class="bi bi-youtube"></i></a>
            @endif
        </div>
    </div>
</div>

<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg pc-navbar sticky-top" style="background: white; box-shadow: var(--pc-shadow); z-index:1030; transition: all .3s ease;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center py-1 gap-2" href="{{ url('/') }}">
            <img class="pc-brand-logo" src="{{ main_logo_url() }}" alt="Palli Chetana" style="height: 50px; width: auto;">
            <h5 class="pc-brand-title offcanvas-title fw-bold text-green-600 mb-0"><span class="colorName">Palli Chetana</span></h5>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#pcNavbar" aria-controls="pcNavbar">
            <i class="bi bi-list" style="font-size: 1.6rem;"></i>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="pcNavbar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fw-bold"><i class="bi bi-list me-2"></i> Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body justify-content-end align-items-center">
                <ul class="navbar-nav gap-1">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link fw-semibold px-3" style="color: var(--pc-dark);">Home</a>
                    </li>

                    <!-- About Us -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold px-3" href="#" data-bs-toggle="dropdown" style="color: var(--pc-dark);">About Us</a>
                        <ul class="dropdown-menu border-0 shadow-lg" style="border-radius: var(--pc-radius); min-width: 220px;">
                            <li><a class="dropdown-item py-2" href="{{ route('about.us') }}">About Palli Chetana</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('vision.mission') }}">Mission, Vision & Values</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('key.focus.area') }}">Key Focus Areas</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('team.members') }}">Team Members</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('origin_affilation') }}">Origin & Legal Affiliation</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('executive.committee') }}">Executive Committee</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('cheif.message') }}">Chief Executive Message</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('policy.guideline') }}">Our Policy</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('partner.donor') }}">Partners & Donors</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('about.impact') }}">Our Impact</a></li>
                        </ul>
                    </li>

                    <!-- Programs -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold px-3" href="#" data-bs-toggle="dropdown" style="color: var(--pc-dark);">Programs</a>
                        <ul class="dropdown-menu border-0 shadow-lg" style="border-radius: var(--pc-radius); min-width: 190px;">
                            <li><a class="dropdown-item py-2" href="{{ route('programs.all') }}">Featured Programs</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('ongoing.project') }}">Ongoing Projects</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('project.archieve') }}">Project Archive</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('success.stories') }}">Success Stories</a></li>
                        </ul>
                    </li>

                    <!-- Get Involved -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold px-3" href="#" data-bs-toggle="dropdown" style="color: var(--pc-dark);">Get Involved</a>
                        <ul class="dropdown-menu border-0 shadow-lg" style="border-radius: var(--pc-radius); min-width: 190px;">
                            <li><a class="dropdown-item py-2" href="{{ route('volunterr.opportunities') }}">Volunteer</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('donate') }}">Donate</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('fundraising') }}">Fundraising</a></li>
                            <!-- <li><a class="dropdown-item py-2" href="{{ route('corporate.partnership') }}">Corporate Partnership</a></li> -->
                            <li><a class="dropdown-item py-2" href="{{ route('invoked.career') }}">Career</a></li>
                        </ul>
                    </li>

                    <!-- News & Media -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold px-3" href="#" data-bs-toggle="dropdown" style="color: var(--pc-dark);">News & Media</a>
                        <ul class="dropdown-menu border-0 shadow-lg" style="border-radius: var(--pc-radius); min-width: 190px;">
                            <li><a class="dropdown-item py-2" href="{{ route('latest.news.all') }}">News & Events</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('photo.all') }}">Photo Gallery</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('youtube.video') }}">Videos</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('publication') }}">Publications</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('strategic.plan') }}">Strategic Plan</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link fw-semibold px-3" style="color: var(--pc-dark);">Contact</a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('donate') }}" class="btn btn-pc-primary btn-sm px-4 py-2 d-none d-xl-inline-flex">
                            <i class="bi bi-heart-fill me-1"></i> Donate Now
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<style>
    .colorName {
        color: #2a8547 !important;
    }
    .pc-brand-title {
        line-height: 1.1;
    }
    .pc-navbar.scrolled {
        box-shadow: var(--pc-shadow-lg) !important;
    }
    .pc-navbar .dropdown-item {
        font-size: .9rem;
        border-radius: 8px;
        margin: 0;
        transition: all .2s;
    }
    .pc-navbar .dropdown-item:hover {
        background: var(--pc-primary-light);
        color: var(--pc-primary);
    }
    .pc-navbar .dropdown-menu {
        padding: 8px 0;
        animation: fadeInDown .3s ease;
        overflow: hidden;
    }
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .pc-navbar .nav-link:hover {
        color: var(--pc-primary) !important;
    }
    @media (min-width: 992px) {
        .pc-navbar .container {
            column-gap: 1.25rem;
        }
        .pc-navbar .navbar-brand {
            margin-right: 0;
            padding-right: .5rem;
        }
        .pc-navbar .offcanvas-body {
            padding-left: 0;
        }
        .pc-navbar .navbar-nav {
            margin-left: .35rem;
        }
        .pc-navbar .navbar-nav .nav-link {
            font-size: .92rem;
            padding-left: .7rem !important;
            padding-right: .7rem !important;
        }
    }
    @media (min-width: 992px) {
        .pc-navbar .nav-item.dropdown:hover > .dropdown-menu {
            display: block;
        }
          .pc-navbar .navbar-nav {
            gap: .20rem !important;
        }
        .pc-topbar{
            display: hidden !important;
        }
    }
    @media (max-width: 991.98px) {
        .pc-navbar .container {
            padding-top: .45rem;
            padding-bottom: .45rem;
        }
        .pc-brand-logo {
            height: 42px !important;
        }
        .pc-brand-title {
            font-size: 1.05rem;
            margin-left: .2rem;
        }
        .pc-navbar .offcanvas {
            width: min(84vw, 360px);
        }
        .pc-navbar .offcanvas-body {
            padding-top: .75rem;
            padding-left: .9rem;
            padding-right: .9rem;
        }
        .pc-navbar .navbar-nav {
            gap: .35rem !important;
        }
        .pc-navbar .navbar-nav .nav-link {
            padding: .62rem .95rem !important;
            border-radius: 10px;
        }
        .pc-navbar .navbar-nav .dropdown-menu {
            margin-top: .2rem;
            margin-bottom: .25rem;
        }
        .pc-navbar .navbar-nav .dropdown-item {
            margin: 0;
            padding: .5rem .95rem;
        }
        .pc-navbar .navbar-nav .nav-item.ms-lg-2 {
            margin-top: .35rem;
        }
        .pc-navbar .navbar-nav .btn {
            width: 100%;
            justify-content: center;
        }
    }
    @media (max-width: 767.98px) {
        .pc-navbar .offcanvas {
            width: 100vw;
            max-width: 100vw;
        }
    }
    @media (max-width: 575.98px) {
        .pc-brand-logo {
            height: 36px !important;
        }
        .pc-brand-title {
            font-size: .95rem;
        }
        .pc-navbar .navbar-toggler {
            padding: .35rem .5rem;
        }
        .pc-navbar .offcanvas {
            width: 100vw;
            max-width: 100vw;
        }
    }
</style>
