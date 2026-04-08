@extends('main')

@section('title', 'Featured Programs')

@section('content')

<!-- Page Header -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Featured Programs</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Programs</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Featured Programs</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Programs Section -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-grid me-1"></i> OUR PROGRAMS</span>
            <h2 class="pc-section-title">Featured Programs</h2>
            <p class="pc-section-subtitle">Explore the impactful programs Palli Chetana is running to transform communities and uplift lives.</p>
        </div>

        @if(isset($programs) && count($programs) > 0)
            <div class="row g-4">
                @foreach($programs as $program)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                        <div class="pc-card h-100">
                            <div class="position-relative overflow-hidden">
                                @if($program->image)
                                    <img src="{{ asset('images/programs/'.$program->image) }}" data-lightbox="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}" class="card-img">
                                @else
                                    <div class="card-img d-flex align-items-center justify-content-center" style="background:var(--pc-gray-light);">
                                        <i class="bi bi-image" style="font-size:3rem; color:var(--pc-gray);"></i>
                                    </div>
                                @endif
                                <div class="position-absolute top-0 end-0 m-3">
                                    @php
                                        $statusColor = match($program->status) {
                                            'active' => 'background:var(--pc-primary);',
                                            'completed' => 'background:var(--pc-gray);',
                                            'upcoming' => 'background:var(--pc-secondary);',
                                            default => 'background:var(--pc-gray);',
                                        };
                                    @endphp
                                    <span class="badge rounded-pill text-white px-3 py-2" style="{{ $statusColor }} font-size:.8rem;">
                                        <i class="bi bi-circle-fill me-1" style="font-size:.5rem;"></i> {{ ucfirst($program->status) }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $program->title }}</h5>
                                @php
                                    $programCardText = html_entity_decode(strip_tags($program->description ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8');
                                    $programCardText = str_replace("\u{00A0}", ' ', $programCardText);
                                    $programCardText = preg_replace('/\s+/u', ' ', $programCardText);
                                @endphp
                                <p class="card-text flex-grow-1">{{ Str::limit(trim($programCardText), 120) }}</p>
                                <a href="{{ route('programs.view', $program->id) }}" class="card-link mt-2">
                                    View Details <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5" data-aos="fade-up">
                <i class="bi bi-clipboard-x" style="font-size:3.5rem; color:var(--pc-gray);"></i>
                <p class="text-muted mt-3 fs-5">No programs available at the moment.</p>
                <a href="{{ url('/') }}" class="btn-pc-outline mt-2">
                    <i class="bi bi-house-door me-1"></i> Back to Home
                </a>
            </div>
        @endif
    </div>
</section>

@endsection
