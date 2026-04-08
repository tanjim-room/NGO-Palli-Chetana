@extends('main')

@section('title', $project->name . ' - Project Archive')

@section('content')

<!-- Page Header -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">{{ Str::limit($project->name, 50) }}</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('project.archieve') }}" class="text-white text-decoration-none">Project Archive</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">{{ Str::limit($project->name, 30) }}</li>
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
                        <img src="{{ asset('images/project/'.$project->image) }}" alt="{{ $project->name }}" class="w-100" style="object-fit: cover; min-height: 320px;">
                    @else
                        <div class="d-flex align-items-center justify-content-center w-100" style="min-height: 320px; background: linear-gradient(135deg, var(--pc-primary-light) 0%, #dcedc8 100%);">
                            <div class="text-center">
                                <i class="bi bi-archive" style="font-size: 4rem; color: var(--pc-primary); opacity: .4;"></i>
                                <p class="text-muted mt-2 mb-0 small">No image available</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Project Info Card -->
                <div class="card border-0 shadow-sm rounded-4 mt-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3" style="color: var(--pc-primary);">
                            <i class="bi bi-info-circle me-2"></i>Project Information
                        </h6>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-start gap-3 mb-3 pb-3 border-bottom">
                                <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0" style="width: 40px; height: 40px; background: var(--pc-primary-light);">
                                    <i class="bi bi-people-fill" style="color: var(--pc-primary);"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Partners / Donors</small>
                                    <span class="fw-medium">{{ $project->partners ?? 'Not specified' }}</span>
                                </div>
                            </li>
                            <li class="d-flex align-items-start gap-3 mb-3 pb-3 border-bottom">
                                <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0" style="width: 40px; height: 40px; background: var(--pc-primary-light);">
                                    <i class="bi bi-calendar-event" style="color: var(--pc-primary);"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Project Period</small>
                                    <span class="fw-medium">
                                        @if($project->date)
                                            {{ $project->date }}
                                        @elseif($project->from_date || $project->to_date)
                                            {{ $project->from_date ? date('d M, Y', strtotime($project->from_date)) : '?' }}
                                            &mdash;
                                            {{ $project->to_date ? date('d M, Y', strtotime($project->to_date)) : 'Ongoing' }}
                                        @else
                                            Not specified
                                        @endif
                                    </span>
                                </div>
                            </li>
                            <li class="d-flex align-items-start gap-3">
                                <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0" style="width: 40px; height: 40px; background: var(--pc-primary-light);">
                                    <i class="bi bi-patch-check-fill" style="color: var(--pc-primary);"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Status</small>
                                    <span class="badge rounded-pill text-white px-3 py-2" style="background: var(--pc-primary);">
                                        <i class="bi bi-check-circle me-1"></i> Completed
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Content Column -->
            <div class="col-lg-7">
                <span class="pc-badge mb-3"><i class="bi bi-archive me-1"></i> ARCHIVED PROJECT</span>
                <h2 class="pc-section-title mb-4">{{ $project->name }}</h2>

                @if($project->description)
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4 p-lg-5">
                            <h6 class="fw-bold mb-3" style="color: var(--pc-primary);">
                                <i class="bi bi-file-text me-2"></i>About This Project
                            </h6>
                            @php
                                $safeDescription = strip_tags($project->description, '<p><br><strong><em><u><span><ul><ol><li><a>');
                            @endphp
                            <div class="text-muted lh-lg" style="text-align: justify; font-size: .98rem;">
                                {!! $safeDescription !!}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4 p-lg-5 text-center">
                            <i class="bi bi-file-earmark-text" style="font-size: 2.5rem; color: var(--pc-gray);"></i>
                            <p class="text-muted mt-3 mb-0">Detailed description for this project is not yet available.</p>
                        </div>
                    </div>
                @endif

                <!-- Divider -->
                <hr class="my-4">

                <!-- Navigation -->
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <a href="{{ route('project.archieve') }}" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2">
                        <i class="bi bi-arrow-left"></i> Back to Archive
                    </a>
                    <div class="d-flex gap-2">
                        <span class="text-muted small align-self-center me-2">Share:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($project->name) }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <button onclick="navigator.clipboard.writeText(window.location.href); this.innerHTML='<i class=\'bi bi-check-lg\'></i>'; setTimeout(()=>{this.innerHTML='<i class=\'bi bi-link-45deg\'></i>';},2000);" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" title="Copy link">
                            <i class="bi bi-link-45deg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
