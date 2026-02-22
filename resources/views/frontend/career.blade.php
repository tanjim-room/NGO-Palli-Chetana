@extends('main')

@section('content')
{{-- ===== PAGE HEADER ===== --}}
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Career Opportunities</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Get Involved</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Career</li>
            </ol>
        </nav>
    </div>
</section>

{{-- ===== INTRO ===== --}}
<section class="py-5" style="background: linear-gradient(135deg, var(--pc-primary), var(--pc-secondary));">
    <div class="container text-center text-white" data-aos="fade-up">
        <i class="bi bi-briefcase-fill display-3 mb-3 d-block" style="color: var(--pc-accent);"></i>
        <h2 class="fw-bold mb-3">Join the Palli Chetana Team</h2>
        <p class="lead mb-0 mx-auto" style="max-width:700px;">
            We're looking for passionate individuals dedicated to rural development.
            Explore our current openings and become part of a team that creates real impact.
        </p>
    </div>
</section>

{{-- ===== CAREER LISTINGS ===== --}}
<section class="pc-section" style="background: var(--pc-gray-light);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">Openings</span>
            <h2 class="pc-section-title mx-auto">Current Job Postings</h2>
            <p class="text-muted mt-3 mx-auto" style="max-width:600px;">
                Download the circular for each position to learn about qualifications, responsibilities, and how to apply.
            </p>
        </div>

        @if(isset($career) && $career->count())
            <div class="row g-4 justify-content-center">
                @foreach($career as $item)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="pc-card h-100 d-flex flex-column align-items-center text-center p-4">
                            {{-- Icon --}}
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow"
                                 style="width:80px; height:80px; background: linear-gradient(135deg, var(--pc-primary), var(--pc-secondary));">
                                <i class="bi bi-file-earmark-arrow-down fs-2 text-white"></i>
                            </div>

                            {{-- Title --}}
                            <h5 class="fw-bold mb-3">{{ $item->name }}</h5>

                            {{-- Spacer + Download --}}
                            <div class="mt-auto pt-3 w-100">
                                <a href="{{ asset('images/invoked/'.$item->file) }}" target="_blank"
                                   class="btn btn-pc-primary w-100 rounded-pill" download>
                                    <i class="bi bi-download me-2"></i>Download Circular
                                </a>
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
                    <i class="bi bi-briefcase display-5 text-muted"></i>
                </div>
                <h4 class="fw-bold text-muted mb-3">No Openings at the Moment</h4>
                <p class="text-muted mx-auto" style="max-width:500px;">
                    There are currently no job postings available. Please check back later or follow our social media
                    channels for updates on new opportunities.
                </p>
                <a href="{{ url('/contact') }}" class="btn btn-pc-outline rounded-pill px-4">
                    <i class="bi bi-envelope me-2"></i>Contact Us
                </a>
            </div>
        @endif
    </div>
</section>

{{-- ===== WHY WORK WITH US ===== --}}
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge">Why Palli Chetana?</span>
            <h2 class="pc-section-title mx-auto">Why Work With Us</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="pc-card text-center p-4 h-100">
                    <i class="bi bi-heart-pulse-fill display-4 d-block mb-3" style="color:var(--pc-primary);"></i>
                    <h5 class="fw-bold">Meaningful Work</h5>
                    <p class="text-muted small mb-0">
                        Every role at Palli Chetana directly contributes to improving lives in rural communities.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="pc-card text-center p-4 h-100">
                    <i class="bi bi-mortarboard-fill display-4 d-block mb-3" style="color:var(--pc-secondary);"></i>
                    <h5 class="fw-bold">Growth & Learning</h5>
                    <p class="text-muted small mb-0">
                        Develop your skills through hands-on experience in community development programs.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="pc-card text-center p-4 h-100">
                    <i class="bi bi-globe-americas display-4 d-block mb-3" style="color:var(--pc-accent);"></i>
                    <h5 class="fw-bold">Make a Difference</h5>
                    <p class="text-muted small mb-0">
                        Be part of an organization that creates lasting, positive change in society.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
