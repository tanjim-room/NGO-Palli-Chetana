<!-- Newsletter Section -->
<section class="pc-section-sm" style="background: var(--pc-gradient);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 text-white mb-4 mb-lg-0">
                <h3 class="fw-bold mb-2" style="font-family:'Poppins',sans-serif;">Stay Connected</h3>
                <p class="mb-0 opacity-75">Subscribe to our newsletter for updates on our programs and impact stories.</p>
            </div>
            <div class="col-lg-7">
                @if (session()->has('success'))
                    <div class="alert alert-light mb-3 py-2 rounded-pill text-center fw-semibold text-white-50">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form action="{{ route('user.subscribe') }}" method="post">
                    @csrf
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <input type="text" name="name" class="form-control rounded-pill px-4 py-3 border-0" placeholder="Your Name" value="{{ old('name') }}" required>
                        <input type="email" name="email" class="form-control rounded-pill px-4 py-3 border-0" placeholder="Your Email" value="{{ old('email') }}" required>
                        <button type="submit" class="btn btn-pc-accent rounded-pill px-4 py-3 flex-shrink-0">
                            <i class="bi bi-send me-1"></i> Subscribe
                        </button>
                    </div>
                    @error('name')<small class="text-warning">{{ $message }}</small>@enderror
                    @error('email')<small class="text-warning">{{ $message }}</small>@enderror
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Main Footer -->
<footer style="background: var(--pc-dark); color: rgba(255,255,255,.8);">
    @php
        $footerContact = topbar_contact();
        $app = application();
    @endphp
    <div class="container py-5">
        <div class="row g-4">
            <!-- Brand -->
            <div class="col-lg-4 col-md-6">
                <img src="{{ asset('images/application/'.application()->main_logo) }}" alt="Palli Chetana" style="height: 60px; width: auto; margin-bottom: 1rem;">
                <p class="mt-2" style="font-size: .9rem; line-height: 1.7; opacity: .8;">
                    Palli Chetana is a community-driven NGO working in Bangladesh since 1999, dedicated to empowering marginalized communities through sustainable development initiatives.
                </p>
                <div class="d-flex gap-2 mt-3">
                    @if(application()->facebook)
                    <a href="{{ application()->facebook }}" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle" style="width:36px;height:36px;background:rgba(255,255,255,.1);color:#fff;transition:all .3s;">
                        <i class="bi bi-facebook"></i>
                    </a>
                    @endif
                    @if(application()->twitter)
                    <a href="{{ application()->twitter }}" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle" style="width:36px;height:36px;background:rgba(255,255,255,.1);color:#fff;transition:all .3s;">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    @endif
                    @if(application()->instagram)
                    <a href="{{ application()->instagram }}" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle" style="width:36px;height:36px;background:rgba(255,255,255,.1);color:#fff;transition:all .3s;">
                        <i class="bi bi-instagram"></i>
                    </a>
                    @endif
                    @if(application()->youtube)
                    <a href="{{ application()->youtube }}" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle" style="width:36px;height:36px;background:rgba(255,255,255,.1);color:#fff;transition:all .3s;">
                        <i class="bi bi-youtube"></i>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 col-6">
                <h6 class="text-white fw-bold mb-3">Who We Are</h6>
                <ul style="font-size:.88rem;">
                    <li class="mb-2"><a href="{{ route('about.us') }}" class="text-white text-opacity-75" style="text-decoration:none;">About Us</a></li>
                    <li class="mb-2"><a href="{{ route('vision.mission') }}" class="text-white text-opacity-75" style="text-decoration:none;">Mission & Vision</a></li>
                    <li class="mb-2"><a href="{{ route('team.members') }}" class="text-white text-opacity-75" style="text-decoration:none;">Team Members</a></li>
                    <li class="mb-2"><a href="{{ route('origin_affilation') }}" class="text-white text-opacity-75" style="text-decoration:none;">Legal Affiliation</a></li>
                    <li class="mb-2"><a href="{{ route('partner.donor') }}" class="text-white text-opacity-75" style="text-decoration:none;">Partners & Donors</a></li>
                </ul>
            </div>

            <!-- What We Do -->
            <div class="col-lg-2 col-md-6 col-6">
                <h6 class="text-white fw-bold mb-3">What We Do</h6>
                <ul style="font-size:.88rem;">
                    <li class="mb-2"><a href="{{ route('programs.all') }}" class="text-white text-opacity-75" style="text-decoration:none;">Programs</a></li>
                    <li class="mb-2"><a href="{{ route('ongoing.project') }}" class="text-white text-opacity-75" style="text-decoration:none;">Ongoing Projects</a></li>
                    <li class="mb-2"><a href="{{ route('key.focus.area') }}" class="text-white text-opacity-75" style="text-decoration:none;">Focus Areas</a></li>
                    <li class="mb-2"><a href="{{ route('project.archieve') }}" class="text-white text-opacity-75" style="text-decoration:none;">Project Archive</a></li>
                    <li class="mb-2"><a href="{{ route('success.stories') }}" class="text-white text-opacity-75" style="text-decoration:none;">Success Stories</a></li>
                </ul>
            </div>

            <!-- Get Involved -->
            <div class="col-lg-2 col-md-6 col-6">
                <h6 class="text-white fw-bold mb-3">Get Involved</h6>
                <ul style="font-size:.88rem;">
                    <li class="mb-2"><a href="{{ route('donate') }}" class="text-white text-opacity-75" style="text-decoration:none;">Donate</a></li>
                    <li class="mb-2"><a href="{{ route('volunterr.opportunities') }}" class="text-white text-opacity-75" style="text-decoration:none;">Volunteer</a></li>
                    <li class="mb-2"><a href="{{ route('invoked.career') }}" class="text-white text-opacity-75" style="text-decoration:none;">Career</a></li>
                    <li class="mb-2"><a href="{{ route('faq') }}" class="text-white text-opacity-75" style="text-decoration:none;">FAQ</a></li>
                    <li class="mb-2"><a href="{{ route('policy.guideline') }}" class="text-white text-opacity-75" style="text-decoration:none;">Policy & Guidelines</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-2 col-md-6 col-6">
                <h6 class="text-white fw-bold mb-3">Contact</h6>
                <ul style="font-size:.88rem;">
                    @if($footerContact && $footerContact->address)
                    <li class="mb-3 d-flex gap-2">
                        <i class="bi bi-geo-alt text-white-50 flex-shrink-0 mt-1"></i>
                        <span class="text-white text-opacity-75">{{ $footerContact->address }}</span>
                    </li>
                    @endif
                    @if($footerContact && $footerContact->mobile)
                    <li class="mb-3 d-flex gap-2">
                        <i class="bi bi-telephone text-white-50 flex-shrink-0"></i>
                        <span class="text-white text-opacity-75">{{ $footerContact->mobile }}</span>
                    </li>
                    @endif
                    @if($footerContact && $footerContact->email)
                    <li class="mb-3 d-flex gap-2">
                        <i class="bi bi-envelope text-white-50 flex-shrink-0"></i>
                        <span class="text-white text-opacity-75">{{ $footerContact->email }}</span>
                    </li>
                    @endif
                    @if($app && $app->facebook)
                    <li class="mb-3 d-flex gap-2">
                        <i class="bi bi-facebook text-white-50 flex-shrink-0"></i>
                        <a href="{{ $app->facebook }}" target="_blank" class="text-white text-opacity-75">Facebook</a>
                    </li>
                    @endif
                    @if($app && $app->twitter)
                    <li class="mb-3 d-flex gap-2">
                        <i class="bi bi-twitter-x text-white-50 flex-shrink-0"></i>
                        <a href="{{ $app->twitter }}" target="_blank" class="text-white text-opacity-75">Twitter/X</a>
                    </li>
                    @endif
                    @if($app && $app->instagram)
                    <li class="mb-3 d-flex gap-2">
                        <i class="bi bi-instagram text-white-50 flex-shrink-0"></i>
                        <a href="{{ $app->instagram }}" target="_blank" class="text-white text-opacity-75">Instagram</a>
                    </li>
                    @endif
                    @if($app && $app->youtube)
                    <li class="mb-3 d-flex gap-2">
                        <i class="bi bi-youtube text-white-50 flex-shrink-0"></i>
                        <a href="{{ $app->youtube }}" target="_blank" class="text-white text-opacity-75">YouTube</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div style="border-top: 1px solid rgba(255,255,255,.1); padding: 20px 0; font-size: .85rem;">
        <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center gap-2">
            <span class="text-white text-center text-opacity-50">&copy; {{ date('Y') }} Palli Chetana. All rights reserved.</span>
            <!-- <span class="text-white text-opacity-50">Developed by <strong class="text-white text-opacity-75">NSTU Software Development Team</strong></span> -->
        </div>
    </div>
</footer>

<style>
    footer a:hover { color: var(--pc-primary) !important; opacity: 1 !important; }
    footer .rounded-circle:hover { background: var(--pc-primary) !important; transform: translateY(-2px); }
</style>
