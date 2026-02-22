@extends('main')

@section('content')

<!-- ====== Page Header ====== -->
<section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Policy & Guidelines</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item text-white-50">Stay Informed</li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Policy & Guidelines</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ====== Policy & Guideline Section ====== -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-shield-check me-1"></i> Documents</span>
            <h2 class="pc-section-title mt-3">Policy & Guidelines</h2>
            <p class="text-muted mx-auto" style="max-width:600px;">Download and review Palli Chetana's policies and guidelines that govern our operations.</p>
        </div>

        @if(isset($policy) && count($policy) > 0)
        <div class="row g-4 justify-content-center">
            @foreach ($policy as $index => $data)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <a href="{{ asset('images/policy_guideline/'.$data->file) }}" target="_blank" class="text-decoration-none">
                    <div class="pc-card h-100 border-0 shadow-sm text-center transition-all" style="transition:transform 0.3s;">
                        <div class="card-body p-4 p-lg-5">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width:80px;height:80px;background:rgba(42,133,71,0.1);">
                                <i class="bi bi-file-earmark-arrow-down fs-2" style="color:var(--pc-primary);"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-3">{{ $data->name }}</h5>
                            <span class="btn btn-pc-outline">
                                <i class="bi bi-download me-2"></i>Download PDF
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-5" data-aos="fade-up">
            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width:100px;height:100px;background:rgba(42,133,71,0.1);">
                <i class="bi bi-shield-check fs-1" style="color:var(--pc-primary);"></i>
            </div>
            <h4 class="fw-bold text-dark">No Policies Available</h4>
            <p class="text-muted fs-5">Policy and guideline documents will appear here once published.<br>Please check back later.</p>
        </div>
        @endif
    </div>
</section>

@endsection
