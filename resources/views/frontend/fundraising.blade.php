@extends('main')

@section('content')
{{-- ===== PAGE HEADER ===== --}}
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Fundraising Campaign</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Get Involved</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Fundraising</li>
            </ol>
        </nav>
    </div>
</section>

{{-- ===== HERO IMAGE SECTION ===== --}}
<section class="position-relative overflow-hidden" style="min-height:480px;">
    <img src="{{ asset('img/fund.jpg') }}" alt="Fundraising"
         class="position-absolute top-0 start-0 w-100 h-100" style="object-fit:cover;">
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: linear-gradient(135deg, rgba(42,133,71,0.85), rgba(27,42,107,0.80));"></div>
    <div class="container position-relative d-flex flex-column justify-content-center align-items-center text-center text-white"
         style="z-index:2; min-height:480px;">
        <i class="bi bi-megaphone-fill display-2 mb-3" data-aos="zoom-in" style="color:var(--pc-accent);"></i>
        <h2 class="display-5 fw-bold mb-3" data-aos="fade-up">Join Our Fundraising Campaign</h2>
        <p class="lead mb-4 mx-auto" data-aos="fade-up" data-aos-delay="100" style="max-width:680px;">
            Palli Chetana is committed to uplifting rural communities. Your support fuels our programs in education,
            healthcare, and livelihood development. Be a part of the change â€” start or support a fundraising initiative today!
        </p>
        <a href="{{ url('/contact') }}" class="btn btn-pc-accent btn-lg px-5 rounded-pill shadow" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-envelope-heart me-2"></i>Get in Touch to Join
        </a>
    </div>
</section>

{{-- ===== WHY FUNDRAISE ===== --}}
<section class="pc-section" style="background: var(--pc-gray-light);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">Why Fundraise?</span>
            <h2 class="pc-section-title mx-auto">Make an Impact Through Fundraising</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="pc-card h-100 text-center p-4">
                    <i class="bi bi-people-fill display-4 d-block mb-3" style="color:var(--pc-primary);"></i>
                    <h5 class="fw-bold">Community Support</h5>
                    <p class="text-muted mb-0">
                        Rally friends, family, and colleagues to raise funds for rural development projects that create lasting change.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="pc-card h-100 text-center p-4">
                    <i class="bi bi-graph-up-arrow display-4 d-block mb-3" style="color:var(--pc-secondary);"></i>
                    <h5 class="fw-bold">Track Your Impact</h5>
                    <p class="text-muted mb-0">
                        See exactly how your fundraising contributions translate into real-world results for the communities we serve.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="pc-card h-100 text-center p-4">
                    <i class="bi bi-shield-check display-4 d-block mb-3" style="color:var(--pc-accent);"></i>
                    <h5 class="fw-bold">Transparent & Trusted</h5>
                    <p class="text-muted mb-0">
                        Palli Chetana ensures full transparency. Every donation is accounted for and directed to meaningful programs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== HOW IT WORKS ===== --}}
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">Process</span>
            <h2 class="pc-section-title mx-auto">How It Works</h2>
        </div>

        <div class="row g-4 justify-content-center">
            @php
                $steps = [
                    ['icon' => 'bi-chat-left-text', 'title' => 'Reach Out', 'desc' => 'Contact us to express your interest in starting a fundraising campaign.'],
                    ['icon' => 'bi-clipboard2-check', 'title' => 'Plan Together', 'desc' => 'Our team will work with you to set goals and design the campaign strategy.'],
                    ['icon' => 'bi-share', 'title' => 'Spread the Word', 'desc' => 'Launch your campaign and share it across your network for maximum reach.'],
                    ['icon' => 'bi-trophy', 'title' => 'Celebrate Impact', 'desc' => 'Track progress and celebrate the positive change you helped create.'],
                ];
            @endphp

            @foreach($steps as $i => $step)
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="text-center">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow"
                             style="width:80px; height:80px; background:var(--pc-primary);">
                            <i class="bi {{ $step['icon'] }} fs-2 text-white"></i>
                        </div>
                        <h5 class="fw-bold">{{ $step['title'] }}</h5>
                        <p class="text-muted small">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CTA ===== --}}
<section class="py-5" style="background: linear-gradient(135deg, var(--pc-primary), var(--pc-secondary));">
    <div class="container text-center text-white" data-aos="fade-up">
        <h3 class="fw-bold mb-3">Ready to Make a Difference?</h3>
        <p class="lead mb-4 mx-auto" style="max-width:600px;">
            Whether you want to donate directly or organize a fundraiser, we'd love to hear from you.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ url('/donate') }}" class="btn btn-pc-accent btn-lg px-5 rounded-pill shadow">
                <i class="bi bi-heart-fill me-2"></i>Donate Now
            </a>
            <a href="{{ url('/contact') }}" class="btn btn-light btn-lg px-5 rounded-pill shadow">
                <i class="bi bi-envelope me-2"></i>Contact Us
            </a>
        </div>
    </div>
</section>
@endsection
