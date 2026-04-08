@extends('main')

@section('content')

<!-- ====== Page Header ====== -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Strategic Plan</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item text-white-50">Stay Informed</li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Strategic Plan</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ====== Strategic Plan Section ====== -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-map me-1"></i> Our Roadmap</span>
            <h2 class="pc-section-title mt-3">Strategic Plan</h2>
            <p class="text-muted mx-auto" style="max-width:600px;">Explore Palli Chetana's strategic plans that guide our mission and long-term goals.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse ($strategicPlans as $index => $plan)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="pc-card h-100 border-0 shadow-sm overflow-hidden">
                    <div class="position-relative bg-light text-center p-4" style="min-height:220px;">
                        @if (!empty($plan->image))
                            <img src="{{ asset('images/strategic_plans/images/'.$plan->image) }}" alt="{{ $plan->title }}" class="img-fluid rounded" style="max-height:200px;object-fit:contain;">
                        @else
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <div class="text-center">
                                    <i class="bi bi-file-earmark-pdf fs-1" style="color:var(--pc-primary);"></i>
                                    <p class="text-muted small mt-2 mb-0">Strategic Plan Document</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2">{{ $plan->title }}</h5>
                        @if (!empty($plan->description))
                            @php
                                $safeDescription = strip_tags($plan->description, '<p><br><strong><em><u><span><ul><ol><li><a>');
                            @endphp
                            <div class="text-secondary small mb-0" style="max-height: 120px; overflow: hidden; text-align: left;">
                                {!! $safeDescription !!}
                            </div>
                        @endif
                    </div>
                    @if(!empty($plan->pdf_file))
                    <div class="card-footer bg-white border-top p-4">
                        <a href="{{ asset('images/strategic_plans/pdfs/'.$plan->pdf_file) }}" target="_blank" download class="btn btn-pc-primary w-100">
                            <i class="bi bi-file-earmark-pdf me-2"></i>Download PDF
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="col-12">
                <div class="text-center py-5" data-aos="fade-up">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width:100px;height:100px;background:rgba(42,133,71,0.1);">
                        <i class="bi bi-map fs-1" style="color:var(--pc-primary);"></i>
                    </div>
                    <h4 class="fw-bold text-dark">No Strategic Plans Available</h4>
                    <p class="text-muted fs-5">Strategic plan documents will appear here once published.<br>Please check back later.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
