@extends('main')

@section('content')
{{-- ===== PAGE HEADER ===== --}}
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Corporate Partnership</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Get Involved</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Corporate Partner</li>
            </ol>
        </nav>
    </div>
</section>

{{-- ===== PARTNERSHIP CONTENT ===== --}}
<section class="pc-section">
    <div class="container">
        <div class="row align-items-center g-5">
            {{-- Image --}}
            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('img/partner.png') }}" alt="Corporate Partnership"
                     class="img-fluid rounded-4 shadow-lg w-100" style="object-fit:cover;">
            </div>

            {{-- Text --}}
            <div class="col-lg-6" data-aos="fade-left">
                <span class="pc-badge">Partner With Us</span>
                <h2 class="pc-section-title">Become a Corporate Partner</h2>
                <p class="text-muted mt-3 mb-4" style="line-height:1.8;">
                    Palli Chetana welcomes corporate organizations to join hands in our mission of rural empowerment.
                    Together, we can create sustainable programs in education, healthcare, women's empowerment, and
                    environmental conservation that bring measurable impact to underserved communities.
                </p>

                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-trophy-fill fs-3" style="color:var(--pc-accent);"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Brand Visibility</h6>
                                <p class="text-muted small mb-0">Showcase your CSR commitment to the community.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-people-fill fs-3" style="color:var(--pc-primary);"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Community Impact</h6>
                                <p class="text-muted small mb-0">Directly support rural development initiatives.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-graph-up fs-3" style="color:var(--pc-secondary);"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Measurable Results</h6>
                                <p class="text-muted small mb-0">Receive regular reports on program outcomes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-shield-check fs-3" style="color:var(--pc-primary);"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Full Transparency</h6>
                                <p class="text-muted small mb-0">Every contribution tracked and accounted for.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ url('/contact') }}" class="btn btn-pc-primary btn-lg rounded-pill px-5">
                    <i class="bi bi-envelope me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ===== COMING SOON NOTICE ===== --}}
<section class="pc-section" style="background: var(--pc-gray-light);">
    <div class="container">
        <div class="text-center py-5" data-aos="fade-up">
            <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow"
                 style="width:100px; height:100px; background: linear-gradient(135deg, var(--pc-primary), var(--pc-secondary));">
                <i class="bi bi-hourglass-split display-5 text-white"></i>
            </div>
            <h3 class="fw-bold mb-3">More Details Coming Soon</h3>
            <p class="text-muted mx-auto" style="max-width:550px;">
                Content will be updated soon with detailed partnership packages, benefits, and success stories.
                Stay tuned or reach out to us directly for more information.
            </p>
            <a href="{{ url('/contact') }}" class="btn btn-pc-outline rounded-pill px-4 mt-2">
                <i class="bi bi-chat-dots me-2"></i>Inquire Now
            </a>
        </div>
    </div>
</section>
@endsection
