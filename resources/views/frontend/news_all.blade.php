@extends('main')

@section('content')

    <!-- ======= Page Header ======= -->
    <section class="pc-page-header">
        <div class="pc-page-header-overlay"></div>
        <div class="container position-relative" style="z-index:2;">
            <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Latest News & Events</h1>
            <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Media</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Latest News</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- End Page Header -->

    <!-- ======= News Cards Section ======= -->
    <section class="pc-section" style="background: var(--pc-gray-light);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="pc-badge mb-2 d-inline-block"><i class="bi bi-newspaper me-1"></i> Stay Informed</span>
                <h2 class="pc-section-title">Latest News & Events</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">Stay updated with the latest happenings, achievements, and events from Palli Chetana.</p>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($news as $key => $data)
                <div class="col" data-aos="fade-up" data-aos-delay="{{ ($key % 3) * 100 }}">
                    <div class="pc-card h-100">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ asset('images/news/'.$data->image) }}" data-lightbox="{{ asset('images/news/'.$data->image) }}" class="card-img" alt="{{ $data->title }}" style="height: 220px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge rounded-pill text-white px-3 py-2" style="background: var(--pc-primary);">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $data->created_at ? date('M d, Y', strtotime($data->created_at)) : 'Recent' }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ Str::limit($data->title, 50, '...') }}</h5>
                            <p class="card-text text-muted flex-grow-1">
                                {{ Str::limit(strip_tags($data->description), 100, '...') }}
                            </p>
                            <a href="{{ route('latest.news.view', $data->id) }}" class="card-link fw-semibold mt-auto" style="color: var(--pc-primary);">
                                Read More <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
                {{ $news->links() }}
            </div>
        </div>
    </section>
    <!-- End News Cards Section -->

@endsection
