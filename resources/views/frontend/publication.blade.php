@extends('main')

@section('content')

<!-- ====== Page Header ====== -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Publications</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item text-white-50">Stay Informed</li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Publications</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ====== Publications Section ====== -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-journal-richtext me-1"></i> Resources</span>
            <h2 class="pc-section-title mt-3">Our Publications</h2>
            <p class="text-muted mx-auto" style="max-width:600px;">Browse and download reports, newsletters, and other publications from Palli Chetana.</p>
        </div>

        @if(isset($publications) && count($publications) > 0)
        <div class="row g-4">
            @foreach($publications as $index => $publication)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="pc-card h-100 border-0 shadow-sm overflow-hidden">
                    <!-- Thumbnail -->
                    @if($publication->thumbnail)
                        <div class="position-relative overflow-hidden" style="height:220px;">
                            <img src="{{ asset('images/publications/thumbnails/'.$publication->thumbnail) }}"
                                 class="w-100 h-100" style="object-fit:cover;"
                                 alt="{{ $publication->title }}">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge rounded-pill px-2 py-1" style="background:var(--pc-primary);">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                </span>
                            </div>
                        </div>
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light" style="height:220px;">
                            <div class="text-center">
                                <i class="bi bi-journal-richtext display-3" style="color:var(--pc-primary);opacity:0.5;"></i>
                                <p class="text-muted small mt-2 mb-0">Publication</p>
                            </div>
                        </div>
                    @endif

                    <!-- Body -->
                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="fw-bold mb-2">{{ $publication->title }}</h5>
                        @if($publication->description)
                            <p class="text-secondary small flex-grow-1">{{ Str::limit($publication->description, 120) }}</p>
                        @endif
                        @if($publication->created_at)
                            <div class="mb-3">
                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ date('M d, Y', strtotime($publication->created_at)) }}</small>
                            </div>
                        @endif
                        <div class="mt-auto">
                            @if($publication->pdf_file)
                                <a href="{{ asset('images/publications/pdfs/'.$publication->pdf_file) }}"
                                   target="_blank"
                                   class="btn btn-pc-primary w-100">
                                    <i class="bi bi-download me-2"></i>Download PDF
                                </a>
                            @else
                                <button class="btn btn-secondary w-100" disabled>
                                    <i class="bi bi-file-earmark-x me-2"></i>No PDF Available
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-5" data-aos="fade-up">
            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width:100px;height:100px;background:rgba(42,133,71,0.1);">
                <i class="bi bi-journal-richtext fs-1" style="color:var(--pc-primary);"></i>
            </div>
            <h4 class="fw-bold text-dark">No Publications Available</h4>
            <p class="text-muted fs-5">Publications will appear here once they are added.<br>Please check back later for new publications.</p>
        </div>
        @endif
    </div>
</section>

@endsection
