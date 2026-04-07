@extends('main')

@section('title', $project->title ?? 'Project Details')

@section('content')

<!-- Page Header -->
<section class="pc-page-header">
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
        @php
            $projectGallery = collect([$project->image])
                ->merge(json_decode($project->additional_images ?? '[]', true) ?? [])
                ->filter()
                ->unique()
                ->values();
        @endphp
        <div class="row g-5" data-aos="fade-up">
            <!-- Image Column -->
            <div class="col-lg-5">
                <div class="rounded-4 overflow-hidden shadow-lg">
                    @if($project->image)
                        <img src="{{ asset('images/project/'.$project->image) }}" data-lightbox="{{ asset('images/project/'.$project->image) }}" alt="{{ $project->title }}" class="w-100" style="object-fit:cover; min-height:320px;">
                    @else
                        <div class="d-flex align-items-center justify-content-center w-100" style="min-height:320px; background:var(--pc-gray-light);">
                            <i class="bi bi-image" style="font-size:4rem; color:var(--pc-gray);"></i>
                        </div>
                    @endif
                </div>

                @if($projectGallery->count() > 1)
                <div class="row g-2 mt-3">
                    @foreach($projectGallery as $galleryImage)
                    <div class="col-4">
                        <img src="{{ asset('images/project/'.$galleryImage) }}" data-lightbox="{{ asset('images/project/'.$galleryImage) }}" alt="{{ $project->title }}" class="w-100 rounded-3 shadow-sm" style="height:100px; object-fit:cover; cursor:pointer;">
                    </div>
                    @endforeach
                </div>
                @endif
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
