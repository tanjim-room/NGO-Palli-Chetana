@extends('main')

@section('title', $focus_area->title . ' - Key Focus Area')

@section('content')

<!-- ======= Page Header ======= -->
<section class="pc-page-header">
    <div class="pc-page-header-overlay"></div>
    <div class="container position-relative" style="z-index:2;">
        <h1 class="text-white fw-bold mb-3" data-aos="fade-right">{{ $focus_area->title }}</h1>
        <nav aria-label="breadcrumb" data-aos="fade-right" data-aos-delay="100">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white text-decoration-none"><i class="bi bi-house-door"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('key.focus.area') }}" class="text-white text-decoration-none">Key Focus Areas</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">{{ Str::limit($focus_area->title, 30) }}</li>
            </ol>
        </nav>
    </div>
</section>
<!-- End Page Header -->

<!-- ======= Focus Area Detail Section ======= -->
<section class="pc-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <article data-aos="fade-up">

                    <!-- Header Badge -->
                    <div class="mb-4">
                        <span class="pc-badge mb-3 d-inline-block">
                            <i class="bi bi-bullseye me-1"></i> Key Focus Area
                        </span>
                        <h2 class="fw-bold display-6 mb-3">{{ $focus_area->title }}</h2>
                    </div>

                    <!-- Featured Image -->
                    @php
                        $imageUrl = null;
                        if (!empty($focus_area->image_path)) {
                            $imageUrl = asset('storage/' . $focus_area->image_path);
                        } elseif (!empty($focus_area->default_image)) {
                            $imageUrl = asset($focus_area->default_image);
                        }
                    @endphp

                    @if($imageUrl)
                    <div class="rounded-4 overflow-hidden shadow-lg mb-5" data-aos="zoom-in">
                        <img src="{{ $imageUrl }}" alt="{{ $focus_area->title }}" class="img-fluid w-100" style="max-height: 450px; object-fit: cover;">
                    </div>
                    @endif

                    <!-- Description -->
                    <div class="card border-0 shadow-sm rounded-4 mb-5" data-aos="fade-up">
                        <div class="card-body p-4 p-lg-5">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                @php
                                    $iconClass = !empty($focus_area->icon_class) ? $focus_area->icon_class : 'bi bi-bullseye';
                                    $iconUrl = !empty($focus_area->icon_path) ? asset('storage/' . $focus_area->icon_path) : null;
                                @endphp
                                <div class="d-flex align-items-center justify-content-center rounded-3" style="width:56px; height:56px; background:rgba(42,133,71,.1); flex-shrink:0;">
                                    @if($iconUrl)
                                        <img src="{{ $iconUrl }}" alt="icon" style="width:28px; height:28px; object-fit:contain;">
                                    @else
                                        <i class="{{ $iconClass }}" style="font-size:1.4rem; color:var(--pc-primary);"></i>
                                    @endif
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0" style="color:var(--pc-primary);">About This Focus Area</h5>
                                    <small class="text-muted">Palli Chetana Initiative</small>
                                </div>
                            </div>
                            <div class="fs-6 lh-lg mb-0" style="text-align:justify; word-wrap:break-word; overflow-wrap:break-word; color:#444;">
                                {!! $focus_area->description !!}
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="my-4">

                    <!-- Back / Navigation -->
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3" data-aos="fade-up">
                        <a href="{{ route('key.focus.area') }}" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2">
                            <i class="bi bi-arrow-left"></i> Back to Focus Areas
                        </a>
                        <div class="d-flex gap-2">
                            <span class="text-muted small align-self-center me-2">Share:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:36px; height:36px;">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($focus_area->title) }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:36px; height:36px;">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                            <button onclick="navigator.clipboard.writeText(window.location.href); this.innerHTML='<i class=\'bi bi-check-lg\'></i>'; setTimeout(()=>{this.innerHTML='<i class=\'bi bi-link-45deg\'></i>';},2000);" class="btn btn-sm btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:36px; height:36px;" title="Copy link">
                                <i class="bi bi-link-45deg"></i>
                            </button>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </div>
</section>
<!-- End Focus Area Detail Section -->

@endsection
