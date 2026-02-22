@extends('main')

@section('content')
<!-- Page Header -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Origin &amp; Affiliation</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Who We Are</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Origin &amp; Affiliation</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Origin & Affiliation Section -->
<section class="pc-section" style="background-color: var(--pc-gray-light);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <span class="pc-badge"><i class="bi bi-file-earmark-text me-1"></i> Legal Documents</span>
                <h2 class="pc-section-title mt-3">Origin &amp; Legal Affiliation</h2>
                <p class="text-muted">Official documents and registrations of Palli Chetana.</p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($affilation as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center overflow-hidden pc-card">
                    <div class="card-body p-4 p-lg-5 d-flex flex-column align-items-center">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width:80px; height:80px; background: rgba(42,133,71,0.1);">
                            <i class="bi bi-file-earmark-pdf fs-2" style="color: var(--pc-primary);"></i>
                        </div>
                        <h5 class="fw-bold mb-3">{{ $item->name }}</h5>
                        <div class="mt-auto">
                            <a href="{{ asset('images/legal_affilation/' . $item->file) }}" target="_blank" class="btn btn-pc-primary rounded-pill px-4">
                                <i class="bi bi-download me-2"></i> View Document
                            </a>
                        </div>
                    </div>
                    <div style="height:4px; background: var(--pc-primary);"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
