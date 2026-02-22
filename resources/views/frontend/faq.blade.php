@extends('main')

@section('content')

<!-- ====== Page Header ====== -->
<section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Frequently Asked Questions</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">FAQ</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ====== FAQ Section ====== -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-question-circle me-1"></i> FAQ</span>
            <h2 class="pc-section-title mt-3">Frequently Asked Questions</h2>
            <p class="text-muted mx-auto" style="max-width:600px;">Find answers to the most commonly asked questions about Palli Chetana and our programs.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9">
                @if(isset($faqs) && count($faqs) > 0)
                    <div class="accordion" id="faqAccordion" data-aos="fade-up" data-aos-delay="100">
                        @foreach($faqs as $index => $faq)
                        <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                            <h2 class="accordion-header" id="faqHeading{{ $index }}">
                                <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }} fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="faqCollapse{{ $index }}">
                                    <i class="bi bi-patch-question me-2" style="color:var(--pc-primary);"></i>
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="faqCollapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="faqHeading{{ $index }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary">
                                    {!! nl2br(e($faq->answer)) !!}
                                    @if($faq->category)
                                    <div class="mt-3">
                                        <span class="badge rounded-pill px-3 py-1" style="background:rgba(22,163,74,0.1);color:var(--pc-primary);">
                                            <i class="bi bi-tag me-1"></i>{{ $faq->category }}
                                        </span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-5" data-aos="fade-up">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width:100px;height:100px;background:rgba(22,163,74,0.1);">
                            <i class="bi bi-question-circle fs-1" style="color:var(--pc-primary);"></i>
                        </div>
                        <h4 class="fw-bold text-dark">No FAQs Available</h4>
                        <p class="text-muted fs-5">No frequently asked questions have been added yet.<br>Please check back later.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
