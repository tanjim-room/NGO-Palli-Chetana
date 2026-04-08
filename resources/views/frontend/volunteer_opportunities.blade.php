@extends('main')

@section('content')
{{-- ===== PAGE HEADER ===== --}}
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Volunteer Opportunities</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Get Involved</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Volunteer</li>
            </ol>
        </nav>
    </div>
</section>

{{-- ===== INTRO SECTION ===== --}}
<section class="py-5" style="background: white;">
    <div class="container text-center text-white" data-aos="fade-up">
        <i class="bi bi-hand-thumbs-up-fill display-3 mb-3 d-block" style="color: var(--pc-accent);"></i>
        <h2 class="fw-bold mb-3">Be the Change You Want to See</h2>
        <p class="lead mb-0 mx-auto text-black" style="max-width:700px;">
            Join <strong>Palli Chetana</strong> as a volunteer and contribute your skills and time to
            uplift rural communities across the region.
        </p>
    </div>
</section>

{{-- ===== VOLUNTEER OPPORTUNITIES GRID ===== --}}
<section class="pc-section" style="background: var(--pc-gray-light);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">Open Positions</span>
            <h2 class="pc-section-title mx-auto">Current Volunteer Opportunities</h2>
        </div>

        @if(isset($volunteers) && $volunteers->count())
            <div class="row g-4">
                @foreach($volunteers as $volunteer)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="pc-card h-100 d-flex flex-column p-4">
                            {{-- Header --}}
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="fw-bold mb-0 pe-2">{{ $volunteer->title }}</h5>
                                @if(strtolower($volunteer->status) === 'open')
                                    <span class="badge rounded-pill flex-shrink-0" style="background-color:var(--pc-primary);">
                                        <i class="bi bi-check-circle me-1"></i>Open
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-secondary flex-shrink-0">
                                        <i class="bi bi-x-circle me-1"></i>Closed
                                    </span>
                                @endif
                            </div>

                            {{-- Description --}}
                            @php
                                $safeDescription = strip_tags($volunteer->description ?? '', '<p><br><strong><em><u><span><ul><ol><li><a>');
                            @endphp
                            <div class="text-muted small mb-3" style="max-height: 120px; overflow: hidden; text-align: left;">
                                {!! $safeDescription !!}
                            </div>

                            {{-- Location --}}
                            @if($volunteer->location)
                                <div class="mb-3">
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-geo-alt me-1" style="color:var(--pc-primary);"></i>{{ $volunteer->location }}
                                    </span>
                                </div>
                            @endif

                            {{-- Requirements --}}
                            @if($volunteer->requirements)
                                <div class="mb-3">
                                    <h6 class="fw-semibold small text-uppercase text-muted mb-2">
                                        <i class="bi bi-list-check me-1"></i>Requirements
                                    </h6>
                                    @php
                                        $safeRequirements = strip_tags($volunteer->requirements, '<p><br><strong><em><u><span><ul><ol><li><a>');
                                    @endphp
                                    <div class="small text-muted mb-0" style="max-height: 100px; overflow: hidden; text-align: left;">
                                        {!! $safeRequirements !!}
                                    </div>
                                </div>
                            @endif

                            {{-- Spacer + Apply Button --}}
                            <div class="mt-auto pt-3">
                                @if(strtolower($volunteer->status) === 'open')
                                    <a href="{{ route('contact') }}" class="btn btn-pc-primary w-100 rounded-pill">
                                        <i class="bi bi-send me-2"></i>Apply Now
                                    </a>
                                @else
                                    <button class="btn btn-secondary w-100 rounded-pill" disabled>
                                        <i class="bi bi-lock me-2"></i>Applications Closed
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Empty State --}}
            <div class="text-center py-5" data-aos="fade-up">
                <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow-sm"
                     style="width:100px; height:100px; background: var(--pc-gray-light); border: 2px dashed #ccc;">
                    <i class="bi bi-person-plus display-5 text-muted"></i>
                </div>
                <h4 class="fw-bold text-muted mb-3">No Opportunities Available Right Now</h4>
                <p class="text-muted mx-auto" style="max-width:500px;">
                    There are currently no volunteer opportunities listed. Please check back later or contact us
                    if you'd like to express your interest.
                </p>
                <a href="{{ route('contact') }}" class="btn btn-pc-outline rounded-pill px-4">
                    <i class="bi bi-envelope me-2"></i>Contact Us
                </a>
            </div>
        @endif
    </div>
</section>

{{-- ===== CTA SECTION ===== --}}
<section class="pc-section">
    <div class="container">
        <div class="row align-items-center g-4" data-aos="fade-up">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-2">Don't See What You're Looking For?</h3>
                <p class="text-muted mb-0">
                    We're always open to hearing from passionate individuals who want to make a difference.
                    Reach out and let us know how you'd like to contribute!
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-pc-primary btn-lg rounded-pill px-5">
                    <i class="bi bi-chat-heart me-2"></i>Get in Touch
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
