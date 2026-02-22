@extends('main')

@section('content')
<!-- Page Header -->
<section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Mission, Vision &amp; Values</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Who We Are</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Mission, Vision &amp; Values</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Mission, Vision & Values Section -->
<section class="pc-section" style="background-color: var(--pc-gray-light);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <span class="pc-badge"><i class="bi bi-compass me-1"></i> Our Direction</span>
                <h2 class="pc-section-title mt-3">What Guides Us</h2>
                <p class="text-muted">Our mission, vision, and values form the foundation of everything we do at Palli Chetana.</p>
            </div>
        </div>

        <div class="row g-4">
            {{-- Mission Card --}}
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                    <div class="card-body p-4 p-lg-5 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width:80px; height:80px; background: rgba(42,133,71,0.1);">
                            <i class="bi bi-rocket-takeoff fs-2" style="color: var(--pc-primary);"></i>
                        </div>
                        <h4 class="fw-bold mb-3" style="color: var(--pc-primary);">Our Mission</h4>
                        <div class="text-muted" style="line-height: 1.8;">
                            {!! $mission_vision->mission !!}
                        </div>
                    </div>
                    <div style="height:4px; background: var(--pc-primary);"></div>
                </div>
            </div>

            {{-- Vision Card --}}
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                    <div class="card-body p-4 p-lg-5 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width:80px; height:80px; background: rgba(37,99,235,0.1);">
                            <i class="bi bi-eye fs-2" style="color: var(--pc-secondary);"></i>
                        </div>
                        <h4 class="fw-bold mb-3" style="color: var(--pc-secondary);">Our Vision</h4>
                        <div class="text-muted" style="line-height: 1.8;">
                            {!! $mission_vision->vision !!}
                        </div>
                    </div>
                    <div style="height:4px; background: var(--pc-secondary);"></div>
                </div>
            </div>

            {{-- Values Card --}}
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                    <div class="card-body p-4 p-lg-5 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width:80px; height:80px; background: rgba(245,158,11,0.1);">
                            <i class="bi bi-heart-pulse fs-2" style="color: var(--pc-accent);"></i>
                        </div>
                        <h4 class="fw-bold mb-3" style="color: var(--pc-accent);">Our Values</h4>
                        <div class="text-muted" style="line-height: 1.8;">
                            {!! $mission_vision->values !!}
                        </div>
                    </div>
                    <div style="height:4px; background: var(--pc-accent);"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
