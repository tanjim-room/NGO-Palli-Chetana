@extends('main')

@section('title', $program->title ?? 'Program Details')

@section('content')

<!-- Page Header -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">Program Details</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('programs.all') }}" class="text-white text-decoration-none">Programs</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">{{ Str::limit($program->title ?? 'Details', 30) }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Program Detail Section -->
<section class="pc-section">
    <div class="container">
        @php
            $programGallery = collect([$program->image])
                ->merge(json_decode($program->additional_images ?? '[]', true) ?? [])
                ->filter()
                ->unique()
                ->values();
        @endphp
        <div class="row g-5" data-aos="fade-up">
            <!-- Image Column -->
            <div class="col-lg-5">
                <div class="rounded-4 overflow-hidden shadow-lg">
                    @if($program->image)
                        <img src="{{ asset('images/programs/'.$program->image) }}" data-lightbox="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}" class="w-100" style="object-fit:cover; min-height:320px;">
                    @else
                        <div class="d-flex align-items-center justify-content-center w-100" style="min-height:320px; background:var(--pc-gray-light);">
                            <i class="bi bi-image" style="font-size:4rem; color:var(--pc-gray);"></i>
                        </div>
                    @endif
                </div>

                @if($programGallery->count() > 1)
                <div class="row g-2 mt-3">
                    @foreach($programGallery as $galleryImage)
                    <div class="col-4">
                        <img src="{{ asset('images/programs/'.$galleryImage) }}" data-lightbox="{{ asset('images/programs/'.$galleryImage) }}" alt="{{ $program->title }}" class="w-100 rounded-3 shadow-sm" style="height:100px; object-fit:cover; cursor:pointer;">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Content Column -->
            <div class="col-lg-7">
                <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                    @php
                        $statusColor = match($program->status ?? 'active') {
                            'active' => '--pc-primary',
                            'completed' => '--pc-gray',
                            'upcoming' => '--pc-secondary',
                            default => '--pc-gray',
                        };
                    @endphp
                    <span class="badge rounded-pill text-white px-3 py-2" style="background:var({{ $statusColor }}); font-size:.85rem;">
                        <i class="bi bi-circle-fill me-1" style="font-size:.5rem;"></i> {{ ucfirst($program->status ?? 'Active') }}
                    </span>
                    @if($program->start_date)
                        <span class="text-muted small">
                            <i class="bi bi-calendar3 me-1"></i> Started {{ \Carbon\Carbon::parse($program->start_date)->format('M d, Y') }}
                        </span>
                    @endif
                </div>

                <h2 class="pc-section-title mb-3">{{ $program->title }}</h2>

                <div class="text-muted lh-lg" style="text-align:justify; font-size:.98rem;">
                    {!! $program->description !!}
                </div>

                <div class="mt-4 pt-3 border-top">
                    <a href="{{ route('programs.all') }}" class="btn-pc-outline">
                        <i class="bi bi-arrow-left me-2"></i> Back to Programs
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
