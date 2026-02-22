@extends('main')

@section('content')
<!-- Page Header -->
<section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">About Us</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Who We Are</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- About Us Section -->
<section class="pc-section" style="background-color: var(--pc-gray-light);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <span class="pc-badge"><i class="bi bi-info-circle me-1"></i> Who We Are</span>
                <h2 class="pc-section-title mt-3">About Palli Chetana</h2>
                <p class="text-muted">Empowering communities through sustainable development and social change.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-lg-5">
                        {{-- Decorative accent bar --}}
                        <div class="d-flex align-items-center mb-4">
                            <div style="width:5px; height:50px; background: var(--pc-primary); border-radius:3px;" class="me-3"></div>
                            <div>
                                <h4 class="fw-bold mb-0" style="color: var(--pc-primary);">Our Story</h4>
                                <small class="text-muted">Learn about our journey and purpose</small>
                            </div>
                        </div>

                        <div class="about-content" style="font-size: 1.05rem; line-height: 1.9; color: #374151;">
                            {!! $about_us->description !!}
                        </div>

                        {{-- Decorative bottom element --}}
                        <div class="mt-5 pt-4 border-top">
                            <div class="row g-4 text-center">
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                                    <div class="p-3">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width:60px; height:60px; background: rgba(42,133,71,0.1);">
                                            <i class="bi bi-people-fill fs-4" style="color: var(--pc-primary);"></i>
                                        </div>
                                        <h6 class="fw-bold">Community Focused</h6>
                                        <p class="text-muted small mb-0">Working alongside communities to create lasting impact</p>
                                    </div>
                                </div>
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                                    <div class="p-3">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width:60px; height:60px; background: rgba(42,133,71,0.1);">
                                            <i class="bi bi-globe-americas fs-4" style="color: var(--pc-primary);"></i>
                                        </div>
                                        <h6 class="fw-bold">Sustainable Growth</h6>
                                        <p class="text-muted small mb-0">Building programs that sustain beyond our involvement</p>
                                    </div>
                                </div>
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                                    <div class="p-3">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width:60px; height:60px; background: rgba(42,133,71,0.1);">
                                            <i class="bi bi-heart-fill fs-4" style="color: var(--pc-primary);"></i>
                                        </div>
                                        <h6 class="fw-bold">Driven by Passion</h6>
                                        <p class="text-muted small mb-0">A dedicated team committed to positive change</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
