@extends('main')

@section('title', 'Ongoing Projects')

@section('content')

<!-- Page Header -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Ongoing Projects</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">What We Do</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Ongoing Projects</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Ongoing Projects Section -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-rocket-takeoff me-1"></i> ACTIVE INITIATIVES</span>
            <h2 class="pc-section-title">Ongoing Projects</h2>
            <p class="pc-section-subtitle">Discover the projects Palli Chetana is currently implementing to create lasting change in communities.</p>
        </div>

        @if(isset($project) && count($project) > 0)
            <div class="row g-4">
                @foreach($project as $data)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                        <div class="pc-card h-100">
                            <div class="position-relative overflow-hidden">
                                @if($data->image)
                                    <img src="{{ asset('images/project/'.$data->image) }}" data-lightbox="{{ asset('images/project/'.$data->image) }}" alt="{{ $data->title }}" class="card-img">
                                @else
                                    <div class="card-img d-flex align-items-center justify-content-center" style="background:var(--pc-gray-light);">
                                        <i class="bi bi-image" style="font-size:3rem; color:var(--pc-gray);"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ Str::limit($data->title, 50, '...') }}</h5>
                                <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($data->description), 100, '...') }}</p>
                                <a href="{{ route('ongoing.project.view', $data->id) }}" class="card-link mt-2">
                                    Read More <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
                {{ $project->links() }}
            </div>
        @else
            <div class="text-center py-5" data-aos="fade-up">
                <i class="bi bi-folder2-open" style="font-size:3.5rem; color:var(--pc-gray);"></i>
                <p class="text-muted mt-3 fs-5">No ongoing projects at the moment.</p>
            </div>
        @endif
    </div>
</section>

@endsection
