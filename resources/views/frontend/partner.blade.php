@extends('main')

@section('content')
<!-- Page Header -->
<section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Our Partners &amp; Donors</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Who We Are</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Partners &amp; Donors</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Partners Section -->
<section class="pc-section" style="background-color: var(--pc-gray-light);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <span class="pc-badge"><i class="bi bi-handshake me-1"></i> Collaboration</span>
                <h2 class="pc-section-title mt-3">Partners &amp; Donors</h2>
                <p class="text-muted">We are grateful to our partners and donors who make our work possible. Together, we create lasting impact in communities.</p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($partners as $partner)
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center overflow-hidden pc-card" style="transition: all 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width:64px; height:64px; background: rgba(42,133,71,0.1);">
                            <i class="bi bi-building fs-3" style="color: var(--pc-primary);"></i>
                        </div>
                        <h6 class="fw-bold mb-0">{{ $partner->name }}</h6>
                    </div>
                    <div style="height:3px; background: var(--pc-primary);"></div>
                </div>
            </div>
            @endforeach
        </div>

        @if($partners->isEmpty())
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-6 text-center">
                <div class="card border-0 shadow-sm rounded-4 p-5">
                    <i class="bi bi-info-circle fs-1 text-muted mb-3"></i>
                    <h5 class="fw-bold text-muted">No Partners Listed Yet</h5>
                    <p class="text-muted mb-0">Check back soon for updates on our partners and donors.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
