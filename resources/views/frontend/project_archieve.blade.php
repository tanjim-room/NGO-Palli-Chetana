@extends('main')

@section('title', 'Project Archive')

@section('content')

<!-- Page Header -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Project Archive</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">What We Do</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">Project Archive</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Project Archive Section -->
<section class="pc-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="pc-badge"><i class="bi bi-archive me-1"></i> OUR LEGACY</span>
            <h2 class="pc-section-title">Project Archive</h2>
            <p class="pc-section-subtitle">A comprehensive record of all projects completed by Palli Chetana over the years.</p>
        </div>

        @if(isset($project) && count($project) > 0)
            <div class="row g-4">
                @foreach($project as $proj)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden archive-card">
                            <!-- Card Image -->
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                @if($proj->image)
                                    <img src="{{ asset('images/project/'.$proj->image) }}" alt="{{ $proj->name }}" class="w-100 h-100" style="object-fit: cover;">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, var(--pc-primary-light) 0%, #dcedc8 100%);">
                                        <i class="bi bi-archive" style="font-size: 3rem; color: var(--pc-primary); opacity: .5;"></i>
                                    </div>
                                @endif
                                <!-- Status Badge -->
                                <span class="position-absolute top-0 end-0 m-3 badge rounded-pill text-white px-3 py-2" style="background: var(--pc-primary); font-size: .75rem;">
                                    <i class="bi bi-check-circle me-1"></i> Completed
                                </span>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="card-title fw-bold mb-2" style="color: #1a1a2e; line-height: 1.4;">
                                    {{ Str::limit($proj->name, 60) }}
                                </h5>

                                @if($proj->description)
                                    <p class="card-text text-muted small mb-3 flex-grow-1">{{ Str::limit($proj->description, 100) }}</p>
                                @else
                                    <div class="flex-grow-1"></div>
                                @endif

                                <!-- Meta Info -->
                                <div class="mb-3">
                                    <div class="d-flex align-items-start gap-2 mb-2">
                                        <i class="bi bi-people-fill mt-1" style="color: var(--pc-primary); font-size: .85rem; flex-shrink: 0;"></i>
                                        <small class="text-muted">{{ Str::limit($proj->partners, 50) }}</small>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-calendar-range" style="color: var(--pc-primary); font-size: .85rem; flex-shrink: 0;"></i>
                                        <small class="text-muted">
                                            @if($proj->date)
                                                {{ $proj->date }}
                                            @elseif($proj->from_date || $proj->to_date)
                                                {{ $proj->from_date ? date('M Y', strtotime($proj->from_date)) : '?' }}
                                                &mdash;
                                                {{ $proj->to_date ? date('M Y', strtotime($proj->to_date)) : 'Present' }}
                                            @else
                                                Period not specified
                                            @endif
                                        </small>
                                    </div>
                                </div>

                                <!-- Learn More Button -->
                                <a href="{{ route('project.archive.view', $proj->id) }}" class="btn btn-outline-success btn-sm d-flex align-items-center justify-content-center gap-2 rounded-3 mt-auto">
                                    Learn More <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <p class="text-muted small">
                    <i class="bi bi-info-circle me-1"></i> Showing {{ count($project) }} archived project{{ count($project) > 1 ? 's' : '' }}
                </p>
            </div>
        @else
            <div class="text-center py-5" data-aos="fade-up">
                <i class="bi bi-archive" style="font-size: 3.5rem; color: var(--pc-gray);"></i>
                <p class="text-muted mt-3 fs-5">No archived projects found.</p>
            </div>
        @endif
    </div>
</section>

@push('css')
<style>
    .archive-card {
        transition: transform .3s ease, box-shadow .3s ease;
    }
    .archive-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 32px rgba(0,0,0,.12) !important;
    }
    .archive-card:hover img {
        transform: scale(1.05);
        transition: transform .4s ease;
    }
    .archive-card img {
        transition: transform .4s ease;
    }
</style>
@endpush

@endsection
