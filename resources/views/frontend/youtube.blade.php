@extends('main')

@section('content')

    <!-- ======= Page Header ======= -->
    <section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
        <div class="pc-page-header-overlay"></div>
        <div class="container position-relative" style="z-index:2;">
            <h1 class="text-white fw-bold mb-3" data-aos="fade-right"><i class="bi bi-youtube me-2"></i>Video Gallery</h1>
            <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Media</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">YouTube Videos</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- End Page Header -->

    <!-- ======= YouTube Videos Section ======= -->
    <section class="pc-section" style="background: var(--pc-gray-light);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="pc-badge mb-2 d-inline-block"><i class="bi bi-play-circle-fill me-1"></i> Watch & Learn</span>
                <h2 class="pc-section-title">Our YouTube Videos</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">Watch our videos to learn more about Palli Chetana's mission, programs, and community impact.</p>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Video 1 -->
                <div class="col" data-aos="fade-up">
                    <div class="pc-card h-100">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/3FmhcHp1baU" title="Palli Chetana Video" allowfullscreen loading="lazy"></iframe>
                        </div>
                        <div class="card-body text-center">
                            <span class="badge rounded-pill px-3 py-2" style="background: var(--pc-primary);">
                                <i class="bi bi-play-fill me-1"></i> Video 1
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="col" data-aos="fade-up" data-aos-delay="100">
                    <div class="pc-card h-100">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/ZYMpWO66pJA" title="Palli Chetana Video" allowfullscreen loading="lazy"></iframe>
                        </div>
                        <div class="card-body text-center">
                            <span class="badge rounded-pill px-3 py-2" style="background: var(--pc-primary);">
                                <i class="bi bi-play-fill me-1"></i> Video 2
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Video 3 -->
                <div class="col" data-aos="fade-up" data-aos-delay="200">
                    <div class="pc-card h-100">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/FOXArgMqOcc" title="Palli Chetana Video" allowfullscreen loading="lazy"></iframe>
                        </div>
                        <div class="card-body text-center">
                            <span class="badge rounded-pill px-3 py-2" style="background: var(--pc-primary);">
                                <i class="bi bi-play-fill me-1"></i> Video 3
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Video 4 -->
                <div class="col" data-aos="fade-up">
                    <div class="pc-card h-100">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/5Plplf6bPHg" title="Palli Chetana Video" allowfullscreen loading="lazy"></iframe>
                        </div>
                        <div class="card-body text-center">
                            <span class="badge rounded-pill px-3 py-2" style="background: var(--pc-primary);">
                                <i class="bi bi-play-fill me-1"></i> Video 4
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Video 5 -->
                <div class="col" data-aos="fade-up" data-aos-delay="100">
                    <div class="pc-card h-100">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/I07NA-IF4NQ" title="Palli Chetana Video" allowfullscreen loading="lazy"></iframe>
                        </div>
                        <div class="card-body text-center">
                            <span class="badge rounded-pill px-3 py-2" style="background: var(--pc-primary);">
                                <i class="bi bi-play-fill me-1"></i> Video 5
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Video 6 -->
                <div class="col" data-aos="fade-up" data-aos-delay="200">
                    <div class="pc-card h-100">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/tXGx0-DDCSU" title="Palli Chetana Video" allowfullscreen loading="lazy"></iframe>
                        </div>
                        <div class="card-body text-center">
                            <span class="badge rounded-pill px-3 py-2" style="background: var(--pc-primary);">
                                <i class="bi bi-play-fill me-1"></i> Video 6
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End YouTube Videos Section -->

@endsection
