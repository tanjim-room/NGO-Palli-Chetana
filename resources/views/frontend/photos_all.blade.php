@extends('main')

@section('content')

    <!-- ======= Page Header ======= -->
    <section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
        <div class="pc-page-header-overlay"></div>
        <div class="container position-relative" style="z-index:2;">
            <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Photo Gallery</h1>
            <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Gallery</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Photos</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- End Page Header -->

    <!-- ======= Photo Gallery Section ======= -->
    <section class="pc-section" style="background: var(--pc-gray-light);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="pc-badge mb-2 d-inline-block"><i class="bi bi-camera-fill me-1"></i> Visual Stories</span>
                <h2 class="pc-section-title">Photo Gallery</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">Capturing moments of change, hope, and community impact across Palli Chetana's programs.</p>
            </div>

            <!-- Masonry Gallery Grid -->
            <div class="row g-3" data-masonry='{"percentPosition": true}'>
                @foreach ($photos as $key => $data)
                <div class="col-6 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($key % 6) * 50 }}">
                    <div class="position-relative rounded-3 overflow-hidden shadow-sm gallery-item" style="cursor: pointer;">
                        <img src="{{ asset('images/gallery/'.$data->image) }}" class="img-fluid w-100" alt="Gallery Image" style="transition: transform 0.4s ease;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(22,163,74,0); transition: background 0.3s ease;">
                            <i class="bi bi-zoom-in text-white fs-1" style="opacity: 0; transition: opacity 0.3s ease;"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
                {{ $photos->links() }}
            </div>
        </div>
    </section>
    <!-- End Photo Gallery Section -->

    <!-- Gallery Hover Effect Styles -->
    <style>
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        .gallery-item:hover .position-absolute {
            background: rgba(22,163,74,0.4) !important;
        }
        .gallery-item:hover .bi-zoom-in {
            opacity: 1 !important;
        }
    </style>

@endsection
