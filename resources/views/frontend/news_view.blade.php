@extends('main')

@section('content')

    <!-- ======= Page Header ======= -->
    <section class="pc-page-header">
        <div class="pc-page-header-overlay"></div>
        <div class="container position-relative" style="z-index:2;">
            <h1 class="text-white fw-bold mb-3" data-aos="fade-right">News Detail</h1>
            <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('latest.news.all') }}" class="text-white text-decoration-none">Latest News</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- End Page Header -->

    <!-- ======= News Detail Section ======= -->
    <section class="pc-section">
        <div class="container">
            @php
                $newsGallery = collect([$news->image])
                    ->merge(json_decode($news->additional_images ?? '[]', true) ?? [])
                    ->filter()
                    ->unique()
                    ->values();
            @endphp
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <article data-aos="fade-up">
                        <!-- Article Header -->
                        <div class="mb-4">
                            <span class="pc-badge mb-3 d-inline-block">
                                <i class="bi bi-newspaper me-1"></i> Palli Chetana News
                            </span>
                            <h2 class="fw-bold display-6 mb-3">{{ $news->title }}</h2>
                            <div class="d-flex align-items-center gap-3 text-muted mb-4">
                                <span>
                                    <i class="bi bi-calendar-event me-1" style="color: var(--pc-secondary);"></i>
                                    {{ $news->created_at ? date('F d, Y', strtotime($news->created_at)) : 'Recently Published' }}
                                </span>
                                @if($news->created_at)
                                <span class="text-muted">|</span>
                                <span>
                                    <i class="bi bi-clock me-1" style="color: var(--pc-secondary);"></i>
                                    {{ date('h:i A', strtotime($news->created_at)) }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Featured Image -->
                        @if($news->image)
                        <div class="rounded-4 overflow-hidden shadow-lg mb-5" data-aos="zoom-in">
                            <img src="{{ asset('images/news/'.$news->image) }}" data-lightbox="{{ asset('images/news/'.$news->image) }}" alt="{{ $news->title }}" class="img-fluid w-100" style="max-height: 500px; object-fit: cover;">
                        </div>
                        @endif

                        @if($newsGallery->count() > 1)
                        <div class="row g-3 mb-5" data-aos="fade-up">
                            @foreach($newsGallery as $galleryImage)
                            <div class="col-md-4 col-6">
                                <img src="{{ asset('images/news/'.$galleryImage) }}" data-lightbox="{{ asset('images/news/'.$galleryImage) }}" alt="{{ $news->title }}" class="img-fluid w-100 rounded-3 shadow-sm" style="height:140px; object-fit:cover; cursor:pointer;">
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <!-- Article Body -->
                        <div class="mb-5">
                            <p class="fs-6 lh-lg" style="text-align: justify; word-wrap: break-word; overflow-wrap: break-word;">
                                {{ $news->description }}
                            </p>
                        </div>

                        <!-- Divider -->
                        <hr class="my-4">

                        <!-- Back Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('latest.news.all') }}" class="btn btn-pc-outline">
                                <i class="bi bi-arrow-left me-2"></i> Back to News & Events
                            </a>
                            <div class="d-flex gap-2">
                                <span class="text-muted small align-self-center me-2">Share:</span>
                                <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle" style="width:36px; height:36px; display:flex; align-items:center; justify-content:center;">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle" style="width:36px; height:36px; display:flex; align-items:center; justify-content:center;">
                                    <i class="bi bi-twitter-x"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle" style="width:36px; height:36px; display:flex; align-items:center; justify-content:center;">
                                    <i class="bi bi-link-45deg"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- End News Detail Section -->

@endsection
