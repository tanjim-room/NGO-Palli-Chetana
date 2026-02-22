@extends('main')

@section('content')

    <!-- ======= Page Header ======= -->
    <section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
        <div class="pc-page-header-overlay"></div>
        <div class="container position-relative" style="z-index:2;">
            <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Success Story</h1>
            <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('success.stories') }}" class="text-white text-decoration-none">Success Stories</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Story Detail</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- End Page Header -->

    <!-- ======= Story Detail Section ======= -->
    <section class="pc-section">
        <div class="container">
            @if(isset($story))
            <div class="row g-5 align-items-start" data-aos="fade-up">
                <!-- Story Image -->
                <div class="col-lg-5">
                    @if($story->image)
                    <div class="rounded-4 overflow-hidden shadow-lg" data-aos="fade-right">
                        <img src="{{ asset('images/stories/'.$story->image) }}" alt="{{ $story->beneficiary_name }}" class="img-fluid w-100" style="object-fit: cover;">
                    </div>
                    @endif
                </div>

                <!-- Story Content -->
                <div class="col-lg-7" data-aos="fade-left" data-aos-delay="100">
                    <span class="pc-badge mb-3 d-inline-block">
                        <i class="bi bi-heart-fill me-1"></i> Palli Chetana Impact Story
                    </span>

                    <h2 class="fw-bold mb-2" style="color: var(--pc-primary);">{{ $story->beneficiary_name }}</h2>

                    @if($story->beneficiary_title)
                    <p class="text-muted fs-5 fst-italic mb-3">
                        <i class="bi bi-person-badge me-1"></i> {{ $story->beneficiary_title }}
                    </p>
                    @endif

                    <!-- Star Rating -->
                    <div class="mb-4">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $story->rating)
                                <i class="bi bi-star-fill fs-4" style="color: var(--pc-accent);"></i>
                            @else
                                <i class="bi bi-star fs-4 text-muted"></i>
                            @endif
                        @endfor
                        <span class="ms-2 text-muted">({{ $story->rating }}/5)</span>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <p class="fs-6 lh-lg" style="text-align: justify; word-wrap: break-word; overflow-wrap: break-word;">
                            {{ $story->description }}
                        </p>
                    </div>

                    <!-- Date -->
                    @if($story->date)
                    <div class="d-flex align-items-center mb-4 text-muted">
                        <i class="bi bi-calendar-event me-2 fs-5" style="color: var(--pc-secondary);"></i>
                        <span>{{ date('F d, Y', strtotime($story->date)) }}</span>
                    </div>
                    @endif

                    <!-- Back Button -->
                    <div class="pt-2">
                        <a href="{{ route('success.stories') }}" class="btn btn-pc-outline">
                            <i class="bi bi-arrow-left me-2"></i> Back to Stories
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="text-center py-5" data-aos="fade-up">
                <i class="bi bi-exclamation-circle display-1 text-muted mb-3 d-block"></i>
                <h4 class="text-muted">Story not found.</h4>
                <a href="{{ route('success.stories') }}" class="btn btn-pc-outline mt-3">
                    <i class="bi bi-arrow-left me-2"></i> Back to Stories
                </a>
            </div>
            @endif
        </div>
    </section>
    <!-- End Story Detail Section -->

@endsection
