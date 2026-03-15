<!-- Top Bar -->
<div class="pc-topbar d-none d-lg-block" style="background: var(--pc-dark); padding: 8px 0; font-size: .85rem; margin-top: -24px;">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-4 text-white text-opacity-75">
            <span><i class="bi bi-telephone-fill me-1" style="color:#2a8547;"></i> 01719-691409</span>
            <span><i class="bi bi-envelope-fill me-1" style="color:#2a8547;"></i> info@pallichetanabd.org</span>
        </div>
        <div class="d-flex align-items-center gap-3">
            @if(application()->facebook)
            <a href="{{ application()->facebook }}" target="_blank" class="text-white text-opacity-75" style="font-size:1rem;"><i class="bi bi-facebook"></i></a>
            @endif
            @if(application()->twitter)
            <a href="{{ application()->twitter }}" target="_blank" class="text-white text-opacity-75" style="font-size:1rem;"><i class="bi bi-twitter-x"></i></a>
            @endif
            @if(application()->youtube)
            <a href="{{ application()->youtube }}" target="_blank" class="text-white text-opacity-75" style="font-size:1rem;"><i class="bi bi-youtube"></i></a>
            @endif
        </div>
    </div>
</div>

<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg pc-navbar sticky-top" style="background: white; box-shadow: var(--pc-shadow); z-index:1030; transition: all .3s ease;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center py-1" href="{{ url('/') }}">
            <img src="{{ asset('images/application/'.application()->main_logo) }}" alt="Palli Chetana" style="height: 50px; width: auto;">
            <h5 class="offcanvas-title fw-bold text-green-600"><span class="btn-lg colorName">Palli Chetana</span></h5>
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
                        <ul class="dropdown-menu border-0 shadow-lg" style="border-radius: var(--pc-radius); min-width: 240px;">
                            <li><a class="dropdown-item py-2" href="{{ route('about.us') }}">About Palli Chetana</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('vision.mission') }}">Mission, Vision & Values</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('key.focus.area') }}">Key Focus Areas</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('team.members') }}">Team Members</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('origin_affilation') }}">Origin & Legal Affiliation</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('executive.committee') }}">Executive Committee</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('cheif.message') }}">Chief Executive Message</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('partner.donor') }}">Partners & Donors</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('about.impact') }}">Our Impact</a></li>
                        </ul>
                    </li>

                    <!-- Programs -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold px-3" href="#" data-bs-toggle="dropdown" style="color: var(--pc-dark);">Programs</a>
                        <ul class="dropdown-menu border-0 shadow-lg" style="border-radius: var(--pc-radius); min-width: 220px;">
                            <li><a class="dropdown-item py-2" href="{{ route('programs.all') }}">Featured Programs</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('ongoing.project') }}">Ongoing Projects</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('project.archieve') }}">Project Archive</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('success.stories') }}">Success Stories</a></li>
                        </ul>
                    </li>

                    <!-- Get Involved -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold px-3" href="#" data-bs-toggle="dropdown" style="color: var(--pc-dark);">Get Involved</a>
                        <ul class="dropdown-menu border-0 shadow-lg" style="border-radius: var(--pc-radius); min-width: 220px;">
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
                        <ul class="dropdown-menu border-0 shadow-lg" style="border-radius: var(--pc-radius); min-width: 220px;">
                            <li><a class="dropdown-item py-2" href="{{ route('latest.news.all') }}">News & Events</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('photo.all') }}">Photo Gallery</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('youtube.video') }}">Videos</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('publication') }}">Publications</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('strategic.plan') }}">Strategic Plan</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('policy.guideline') }}">Policy & Guidelines</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link fw-semibold px-3" style="color: var(--pc-dark);">Contact</a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('donate') }}" class="btn btn-pc-primary btn-sm px-4 py-2">
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
    .pc-navbar.scrolled {
        box-shadow: var(--pc-shadow-lg) !important;
    }
    .pc-navbar .dropdown-item {
        font-size: .9rem;
        border-radius: 8px;
        margin: 0 6px;
        transition: all .2s;
    }
    .pc-navbar .dropdown-item:hover {
        background: var(--pc-primary-light);
        color: var(--pc-primary);
    }
    .pc-navbar .dropdown-menu {
        padding: 8px 0;
        animation: fadeInDown .3s ease;
    }
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .pc-navbar .nav-link:hover {
        color: var(--pc-primary) !important;
    }
    @media (min-width: 992px) {
        .pc-navbar .nav-item.dropdown:hover > .dropdown-menu {
            display: block;
        }
    }
</style>
