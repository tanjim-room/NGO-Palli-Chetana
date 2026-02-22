@extends('main')

@section('title', $project->title ?? 'Project Details')

@section('content')

<!-- Page Header -->
<section class="pc-page-header" style="background-image: url('{{ asset('frontend/img/page-header-bg.jpg') }}');">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Project Details</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ongoing.project') }}" class="text-white text-decoration-none">Ongoing Projects</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">{{ Str::limit($project->title ?? 'Details', 30) }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Project Detail Section -->
<section class="pc-section">
    <div class="container">
        <div class="row g-5" data-aos="fade-up">
            <!-- Image Column -->
            <div class="col-lg-5">
                <div class="rounded-4 overflow-hidden shadow-lg">
                    @if($project->image)
                        <img src="{{ asset('images/project/'.$project->image) }}" alt="{{ $project->title }}" class="w-100" style="object-fit:cover; min-height:320px;">
                    @else
                        <div class="d-flex align-items-center justify-content-center w-100" style="min-height:320px; background:var(--pc-gray-light);">
                            <i class="bi bi-image" style="font-size:4rem; color:var(--pc-gray);"></i>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Content Column -->
            <div class="col-lg-7">
                <span class="pc-badge mb-3"><i class="bi bi-rocket-takeoff me-1"></i> ONGOING PROJECT</span>
                <h2 class="pc-section-title mb-3">{{ $project->title }}</h2>

                <div class="text-muted lh-lg" style="text-align:justify; font-size:.98rem;">
                    {!! nl2br(e($project->description)) !!}
                </div>

                <div class="mt-4 pt-3 border-top">
                    <a href="{{ route('ongoing.project') }}" class="btn-pc-outline">
                        <i class="bi bi-arrow-left me-2"></i> Back to Ongoing Projects
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
